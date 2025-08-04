#!/bin/bash


BUILD_ENVIRONMENT="$1"
if [[ -z "BUILD_ENVIRONMENT" ]]; then
    BUILD_ENVIRONMENT=production
fi


composer install
npm install
npm run prod
./vendor/bin/jigsaw build $BUILD_ENVIRONMENT
