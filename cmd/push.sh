#!/bin/bash

if [ -z "$1" ]; then
    echo "Provide commit message"
    echo "exiting..."
    exit 1
fi

git add .
git commit -m "$1"
git push origin master
