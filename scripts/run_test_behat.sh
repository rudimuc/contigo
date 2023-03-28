#!/bin/bash

mkdir -p tests/reports

php vendor/bin/behat  -f pretty -o tests/reports/behat.txt -f progress -o std
