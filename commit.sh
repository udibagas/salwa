#!/bin/bash

#if [-z "$1"]; then
#	echo "ditulis mas keterangan commit-nya!!"
#	exit 0
#fi

git add .
git commit -m "$1"
git push -u origin master
envoy run pull
