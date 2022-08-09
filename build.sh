#!/bin/bash

composer install
npm install
npm run prod
./vendor/bin/jigsaw build production
