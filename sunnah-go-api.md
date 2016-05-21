## API LIST APLIKASI SUNNAH GO SALAMDAKWAH

| Modul | Fungsi | URL | Parameter | Return Value |
| :--- | :--- | :--- | :--- | :--- |
| Kajian | List Kajian : Menampilkan daftar kajian mulai dari yang terbaru 10 kajian per halaman berdasarkan parameter yang diminta | http://www.salamdakwah/api/kajian/ | ``page={integer}, id_lokasi={int}, id_area={int}, kajian_ustadz_id={int}, kajian_tema={sting}, today={boolean}`` | ``{"data" : [{"kajian_id":1, "kajian_tema": "AAA"}]}`` |
| Kajian | Show Kajian : Menampilkan detail kajian berdasarkan id | http://www.salamdakwah.com/api/kajian/{id=integer} | - | JSON |
| Kajian | Add Kajian : Menambahkan informasi kajian | http://www.salamdakwah.com/api/kajian/store/ | - | JSON |
| Kajian | Delete Kajian : Menghapus data kajian berdasarkan id | http://www.salamdakwah.com/api/kajian/{id=integer}/delete | - | JSON |
