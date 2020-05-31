#!/bin/bash

if [ "$XDEBUG_EXTENSION" = "enable" ]
then
    docker-php-ext-enable xdebug
fi

exec "$@"
