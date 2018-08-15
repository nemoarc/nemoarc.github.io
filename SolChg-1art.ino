/*
   My PWM Charger v4
   Created in Dec 2017 by Patrick McGillan

*/

#include <SPI.h>
#include <RF24.h>

boolean DBG = true;
boolean SETUP = false;

// if AGM or SLA select true, otherwise it is a FLA battery and should be set to false
boolean AGM = true;

// pin defines
#define PWM    3   // PWM output control pin to MOSFET
#define Batt   A0  // the battery volt sensor
#define Therm  A2

// other stuff
int TSR = 9810; // thermistor serias resistor - adj as measured
int HST; // heat sink temperature
int BPinVal;

int Maxx = 0; // when maxpoint exceeded, then Maxx = 1
int PulseWidth = 0;

float PinVoltage;
float BVoltage;
float StrPoint;
float FltPoint;
float MaxPoint;
float RstPoint = 13.0;

// timer setup stuff
unsigned long previousMillis = 0;
const long interval = 1000;
int mys, mym, myh;
int TCNT = 60;

// radio network stuff
RF24 myRadio (9,10);
byte addresses[][6] = {"1Node"};
char MyBuf[32];

void setup() {

  if (AGM) {
    StrPoint = 13.25; // start solar starting voltage
    FltPoint = 13.7;  // Float point charge voltage
    MaxPoint = 14.2;  // hi charge voltage
  } else {
    StrPoint = 13.35; // start solar starting voltage
    FltPoint = 13.82; // Float point charge voltage
    MaxPoint = 14.5;  // hi charge voltage
  }

  myRadio.begin();  // Start up the physical nRF24L01 Radio
  myRadio.setChannel(108);  // Above most Wifi Channels
  myRadio.setDataRate(RF24_250KBPS);
  myRadio.setPALevel(RF24_PA_MAX);
  myRadio.openWritingPipe( addresses[0]);

  if (DBG) {
    Serial.begin(9600);
    delay(1000);  // Let the system settle down
    Serial.println ("Monitor Program");
  }
  delay(1000);  // Let the system settle down
}

void loop() {
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;

    ++mys; //update the seconds

    DoPWM();

  }

  if (mys == TCNT) {
    ++mym;
    mys = 0;
    Serial.println("");
    xmitdata();
  }

  if (mym == 60) {
    ++myh;
    mym = 0;
  }

  if (myh == 12) { // force reset every 12 hours
    myh = 0;
    Maxx = 0;
  }
}

void DoPWM() {
  //read thermistor on analog pin
  int RawADC = analogRead(Therm);
  float Temp = log(((10240000 / RawADC) - TSR));
  Temp = 1 / (0.001129148 + (0.000234125 + (0.0000000876741 * Temp * Temp ))* Temp );
  Temp = Temp - 273.15;            // Convert Kelvin to Celcius
  HST = (Temp * 9.0) / 5.0 + 32.0; // Convert Celcius to Fahrenheit
 
  // check bat voltage and display
  BPinVal = analogRead(Batt);
  PinVoltage = BPinVal * 0.00488;
  BVoltage = PinVoltage * 4.26; // adjust as needed to make output look like what your voltmeter says

  if (BVoltage > FltPoint) {
    if (BVoltage > MaxPoint) {
      Maxx = 1;
      PulseWidth -= 20;
    } else {
      if (Maxx) {
        PulseWidth -= 5;
      } else {
        PulseWidth += 5;
      }
    }
  } else {
    PulseWidth += 5;
  }
  
  if (BVoltage < RstPoint) Maxx = 0;

  if (PulseWidth > 255) PulseWidth = 255;
  if (PulseWidth < 0) PulseWidth = 0;
  
  if (SETUP) PulseWidth = 0;
  if (HST > 120) PulseWidth = 0;
  
  analogWrite(PWM, PulseWidth);

  if (DBG) {
    Serial.print ("HST: ");
    Serial.println (HST);
    Serial.print ("Pulse: ");
    Serial.println(PulseWidth);
    Serial.print ("Maxx: ");
    Serial.println (Maxx);
    Serial.print ("Battery: ");
    Serial.println (BVoltage);
  }
}


void xmitdata() {
  // create data string with 2 digit node number
  String TmpBuf = "SC1";  // used by node 0 to differentiate who sent the data
  TmpBuf += ":";

  TmpBuf += String(HST);
  TmpBuf += ":";

  TmpBuf += String(PulseWidth);
  TmpBuf += ":";
  
  if (Maxx) {
    TmpBuf += "OK:";
  } else {
    TmpBuf += "CHG:";
  }
  
  TmpBuf += String(BVoltage);

  // got TmpBuf data now convert to MyBuf for sending
  TmpBuf.toCharArray(MyBuf, 32);

  if (DBG) {
    Serial.print ("Sending: ");
    Serial.println(MyBuf);
  }

  myRadio.write(&MyBuf,sizeof(MyBuf));
  
  if (DBG) {
    Serial.println("Send Complete");
  }

  return;
}

