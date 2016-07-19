#!/bin/bash

cd quran_audio

qari=("Hudhaify_64kbps" "Husary_64kbps" "Saood_ash-Shuraym_64kbps" "Abdullah_Matroud_128kbps" "Abdurrahmaan_As-Sudais_64kbps" "Ghamadi_40kbps" "Hani_Rifai_64kbps");

#urls=("http://www.everyayah.com/data/Hudhaify_64kbps/zips/" "http://www.everyayah.com/data/Husary_64kbps/zips/" "http://www.everyayah.com/data/Saood_ash-Shuraym_64kbps/zips/" "http://www.everyayah.com/data/Abdullah_Matroud_128kbps/zips/" "http://www.everyayah.com/data/Abdurrahmaan_As-Sudais_64kbps/zips/" "http://www.everyayah.com/data/Ghamadi_40kbps/zips/" "http://www.everyayah.com/data/Hani_Rifai_64kbps/zips/");

for i in "${qari[@]}"
do
	mkdir $i;
	cd $i;
	for a in $(seq -f "%03g" 1 114)
	do
		wget http://www.everyayah.com/data/$i/zips/$a.zip;
	done
done
