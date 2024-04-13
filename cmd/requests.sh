#!/bin/bash

# just to test if rate limiting works or not

if [ -z "$1" ]; then
    echo "Provide number of requests to send"
    echo "Exiting..."
    exit 1
fi

url="http://127.0.0.1:8000/"

for (( i=1; i <= "$1"; i++ )); do
    curl -s -o /dev/null -w "%{http_code}\n" $url
done
