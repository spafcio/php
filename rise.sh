#!/bin/sh

echo ">>> clearing cache"
php symfony cc
echo ">>> building model"
php symfony propel:build-all-load --no-confirmation
echo ">>> creating user managment"
php symfony guard:create-user admin admin1
php symfony guard:promote admin
echo ">>> clearing cache"
php symfony cc
echo ">>> end."
