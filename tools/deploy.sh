#!/bin/bash
sudo rm -rf /var/www/retort-pack
sudo mkdir -p /var/www/retort-pack
sudo rsync -av .. /var/www/retort-pack > /dev/null
sudo chown apache:apache /var/www/retort-pack
echo deploy complete.
