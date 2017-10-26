<html>
<head>
<title>NBEMS Info</title>
<link rel="stylesheet" type="text/css" href="Mac.css" />

</head>

<body>
<center>
<h1>Northeast Missouri Amateur Radio Club</h1>
<h2>ARES Section</h2>

<?php include 'menu.php';?>

<br>
<br>
<pre>
NBEMS  a Digital Emcomm Tool

Narrow Band Emergency Messaging System

Easily works on HF or VHF.

Basic mode only needs a radio and a computer.

A dedicated digital modem is optional, but does make it easier to use.

------------------------------------------------------------

The NBEMS system is comprised of a number of programs that work together:

fldigi -  digital modem
flmsg - ARRL Radiogram, ICS213 messages, actually lots of premade or custom forms
flwrap - file encapsulation / compression
flamp - computers will talk to each other and attempt to pass a message
flarq - computers will talk to each other until a message is passed 100%
flrig - rig control program, cooperates with fldigi

------------------------------------------------------------

Modes to be used depends on band conditions.

Most HF are using Olivia 8-500 moving to 16-500 as band gets worse.
MARS uses Olvia 16-1000 only

Better HF or VHF might use MT63-2000L, 1000, 500 as band gets worse.
Mars uses MT63-1000L as a standard

Best VHF might use PSK-500R

MFSK-16 fits in here somewhere

Might use FSQ for keboard to keyboard comms, sort of like txt messaging
Multiple people can be useing/listening at same time

All digital modes use USB, unlike LSB for voice on 40 and 80.

------------------------------------------------------------

Fldigi uses your computer's sound card to generate and decode digital signals.

Flmsg talks to Fldigi to send and receive messages.

All work is done by your computer, don't need an external Terminal Node Controller.

Audio from your computer speakers go into your radio's mike input for transmission.

Audio from your radio goes into your computer's mike or line-in for decoding.

Don't need an extremely powerful new computer, older machines work just fine.

Our strength is the ability to turn fun activities into powerful emcomm tools.

If you're ready for your daily hamming, you will be more prepared for emergencies.

Be active, and on the day you're needed, you'll feel right at home.
</pre>
<?php include 'footer.php';?>

</body>
</html>
