                CHANGE APACHE ROOT DIRECTORY
                            CARD
                       ORKHAN ALIBAYLI


ABOUT:

 This program used for changing apache server root directory. Program
get directory as string from user and process apache config files.The
name of program is card. card was written in php ( php 7.3 ) and there
are bash script files (setup.sh, card) for executing and installing 
program.

---------------------------------------------------------------------

WARNING:
 
 CARD program only work in Linux based systems ( no Windows OS ).
However program did not tested in all Linux distros. This version of
program tested in Kali Linux. But should work in Debian based systems.

----------------------------------------------------------------------

INSTALLING:

 - step1:  go to directory where you want to download source code files.
 - step2:  git clone https://github.com/OrxanElibeyli/Change-Apache-Root-Directory.git
 - step3:  cd Change-Apache-Root-Directory
 - step4:  chmod +x setup.sh
 - step5:  ./setup.sh

-----------------------------------------------------------------------

USAGE:

card [-c]
   - if -c do not given then program ask for directory from user.
   - if -c is given then current directory setting up as apache root directory


for details you can see man page of CARD program: man card

-----------------------------------------------------------------------

AUTHOR

ORKHAN ALIBAYLI

-----------------------------------------------------------------------

COPYRIGHT

ALL right reserved.

AZERBAIJAN, BAKU, 2020
