<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>FLDIGI Info</title>

<link rel="stylesheet" type="text/css" href="Mac.css">
</head>
<body>
<center>
<h1>Northeast Missouri Amateur Radio Club</h1>
<h2>ARES Section</h2>
<?php include 'menu.php';?>
<br>
<br>
Modes to be used depends on band conditions.<br><br>Most HF are using Olivia 8-500 moving to 16-500 as band gets worse.<br>MARS uses Olvia 16-1000 only<br><br>Better HF or VHF might use MT63-2000L, 1000, 500 as band gets worse.<br>Mars uses MT63-1000L as a standard<br><br>Best VHF might use PSK-500R<br><br>MFSK-16 fits in here somewhere<br><br>Might use FSQ for keboard to keyboard comms, sort of like txt messaging, but multiple people can be used<br><br>All digital modes use USB, unlike LSB for voice on 40 and 80.<br>------------------------------------------------------------<br><br>The NBEMS system is comprised of a number of programs that work together:<br><br>fldigi - digital modem<br>flmsg - ARRL Radiogram, ICS213 messages, actually lots of premade or custom forms<br>flwrap - file encapsulation / compression<br>flamp - amateur multicast protocol<br>flarq - ARQ file transfer<br>flrig - rig control program, cooperates with fldigi<br><br>------------------------------------------------------------<br><br>Disable
all filtering and noise filters on your radio. While some of them will
work with digital modes, more testing as to which one can be used is
needed.<br>RF and most touchpads don't work together. Use wired mouse if you run in to problems.<br><br>------------------------------------------------------------<br>
<h3>FLDIGI</h3>
First time FLDIGI is run, it will put itself in configure mode to help
set up certain configurations.<br>
<br>
Use the menu Configure-&gt;Operator item to set the operator name,
callsign, locator and so on.<br>
<br>
Modem selection with Configure - Modems<br>
<br>
Configure - Misc<br>NBEMS tab<br>
Check needed boxes<br>You may not want "Open in Browser", it is more for Comm center use.<br>
Enter path to flmsg.exe file - use locate button<br>
<br>
Click the RXID &amp; TXID in top right of screen<br>
Unselect Configure - MISC - Sweet Spot<br>
<br>
Reset waterfall with Configure - UI - Restart<br>
Configure - Save Config<br>
View - Logbook<br>
<br>
Rig Control - Use the menu Configure-&gt;Rig Control item to set
how you will control the rig. <br>
<br>
If you will key the rig via a serial port, in the Hardware PTT tab
select Use serial port PTT, <br>
the device name you will use, and which line controls PTT. If in doubt,
check both RTS and DTR. <br>
You must then press the Initialize button.<br>
If you plan to use CAT control of the rig via the COM port, check Use
Hamlib in the Hamlib tab. <br>
Select your rig model from the drop-down menu and set the serial port
device name, baud rate, <br>
and RTS/CTS options as needed. If in addition you wish to use PTT
control via CAT, also check <br>
PTT via Hamlib command. You must then press the Initialize button.<br>
<h3>Sound Card Setup</h3>
Setting the proper levels on your computer sound input/output and your
interface card will most likely<br>
be your toughest setup job. Lots of little small changes can go a long
way. NOTE: There is no perfect<br>
setting and you should expect to adjust as needed when band conditions
change, bands change or<br>
modes change. Settings good for Olvia on 40m today will need tweaking
for 2m psk tomorrow.<br>
<br>
The people who are writing the fldigi software suite have just release
a new comprehensive web<br>
page on how to adjust everything for max performance. Give it a try at
this link.<br>
<a href="http://www.w1hkj.com/FldigiHelp-3.23/audio_adjust_page.html">FLDIGI
RX/TX Audio Adjustments</a>
------------------------------------------------------------
Important MT63 configurations
Under Modems - MT-63
Check use of 8-bit extended characters
Uncheck 'Allow manual tuning' when used on VHF/UHF radios
Leave 'Allow manual tuning' checked for HF Modes <br>
<h3>FLMSG</h3>
This program works in conjunction with fldigi, to easily send 'nicely'
formatted messages. These messages are normally sent between served
agencies and all are based on premade templates in the Template menu.<br><br>First
time FLMSG is run, it will put itself in configure mode to help set up
certain configurations. That mode can be entered anytime by clicking on
the Config menu and selecting one of the drop downs. Each drop down
menu items cooresponds to a tab on the config screen. The first menu
option for personal data is the most important. The rest of the
tabs/menus can be left in default mode.<br><br>The BLANK Message Form can be used for general utility/question messages. <br>To send a CSV style file:
Click on Form -&nbsp;CSV.
Drag and drop your CSV file in to large box and click on AutoSend.
<br>When receiving a CSV file, flmsg will auto open in a screen to save from. Push export CSV button
Save to desired location<br>To send a file of your own choosing, click Form - Transfer.<br>When the file is received, flmsg will open a screen allowing you to save it with the file name already filled in.<br><br>A
checksum is sent with every message by flmsg and receiving station
checks against that number to verify good copy. It doesn't correct
anything, but does let you know about bad copy.<br><br>IF you have
pre-created a message or have one to resend that message can be drag
and dropped on the blue dot in the upper right corner of flmsg.<br><br><h3>FLWRAP</h3><br>FLDIGI can auto capture and save wrapped files
Simple to use with drag and drop to wrap/unwrap&nbsp;
<br><br><h3>FLARQ</h3>Transfers blocks of data with checksums
Blocks are automatically repeated if not confirmed
Sending and receiving stations are locked in a hand shake mode until done
Use FLARQ to ensure 100% copy received over and above the checksum,<br><br><?php include 'footer.php';?>
</center>
</body></html>