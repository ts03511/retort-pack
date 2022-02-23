#!/bin/bash
sudo rm -rf /var/www/retort-pack
sudo rm -rf /var/www/credential.php
sudo mkdir -p /var/www/retort-pack
sudo rsync -av . /var/www/retort-pack > /dev/null
sudo cp credential.php.sample /var/www/credential.php
sudo chown -R apache:apache /var/www/retort-pack
sudo chown apache:apache /var/www/credential.php
echo retort-pack Initialize complete.
echo please create Databse and edit /var/www/retort-pack/credential.php
