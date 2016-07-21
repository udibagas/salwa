#!/bin/bash

cd quran_audio

qari=("Hudhaify_64kbps" "Husary_64kbps" "Saood_ash-Shuraym_64kbps" "Abdullah_Matroud_128kbps" "Abdurrahmaan_As-Sudais_64kbps" "Ghamadi_40kbps" "Hani_Rifai_64kbps");


for i in "${qari[@]}"
do
	cd $i;
	for a in $(seq -f "%03g" 1 114)
	do
		unzip $a.zip;
		rm *.html;
		mkdir $a;
		for f in `ls *.mp3`
		do
			mv $f $a/${$f:3}
		done
	done
	cd ..
done
