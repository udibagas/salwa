#!/bin/bash
cd quran_audio/misyari

for i in `seq 1 99`;
do
	a=`printf %03d $i`;
	mv $i $a;
	cd $a;
	for f in `seq 1 99`;
	do
		n=`printf %03d $f`;
		mv $f.mp3 $n.mp3;
	done
	cd ..
done

for i in `seq 100 114`;
do
	cd $i;
	for f in `seq 1 99`;
	do
		n=`printf %03d $f`;
		mv $f.mp3 $n.mp3;
	done
	cd ..
done
