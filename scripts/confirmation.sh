#!/usr/bin/env bash

QUESTION='Are You Sure?'

if [ -n "$1" ]; then
    QUESTION=$1
fi

while true
do
   read -r -p "$QUESTION [Yes/No] " RESPONSE
   case $RESPONSE in
       [yY][eE][sS]|[yY])
           break
           ;;
       [nN][oO]|[nN])
           exit 1
           break
           ;;
       *)
           echo "Invalid input..."
           ;;
   esac
done
