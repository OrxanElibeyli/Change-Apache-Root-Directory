#!/bin/bash

echo "SETUP:  setting up CARD program";
echo "SETUP:  creating $HOME/card directory";

mkdir $HOME/card;

echo "SETUP:  copying card.php to $HOME/card";

cp card.php $HOME/card

echo "SETUP:  changing mode of card command";

chmod +x card


echo "SETUP:  adding card command to /usr/bin";
echo "SETUP:  some commands need root privilages";

sudo cp card /usr/bin

echo "SETUP:  changing mode of /etc/apache2/apache2.conf file";
sudo chmod o+w /etc/apache2/apache2.conf
echo "SETUP:  changing mode of /etc/apache2/sites-available/000-default.conf file";
sudo chmod o+w /etc/apache2/sites-available/000-default.conf

echo "SETUP:  setting up man page";
sudo cp card.1 /usr/share/man/man1
