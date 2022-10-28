#!/bin/bash

cd main
composer install
ret=$?
if [ $ret != 0 ]
then
    exit $ret
fi

composer2 run tests
ret=$?
if [ $ret != 0 ]
then
    exit $ret
fi

docker-compose build
ret=$?
if [ $ret != 0 ]
then
    exit $ret
fi

docker-compose stop
docker-compose create
ret=$?
if [ $ret != 0 ]
then
    exit $ret
fi

docker-compose start
ret=$?
if [ $ret != 0 ]
then
    exit $ret
fi