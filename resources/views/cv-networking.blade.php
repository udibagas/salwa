@extends('layouts.cv')

@section('content')

<h1 class="text-center">CURRICULUM VITAE</h1>
<br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">BIODATA</h3>
    </div>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td rowspan="7" style="width:180px;">
                    <img src="/images/2x3bgs.JPG" alt="" style="width:170px;" />
                </td>
                <th>Nama Lengkap</th>
                <td>: Bagas Udi Sahsangka</td>
            </tr>
            <tr>
                <th>TTL (Umur)</th>
                <td>: Semarang, 10 April 1987 (29 tahun)</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>: Islam</td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td>: STM Pembangunan Semarang Jurusan Elektronika Industri (2006)</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: Kel. Kalisari Kec. Pasar Rebo Jakarta Timur</td>
            </tr>
            <tr>
                <th>Phone/WA</th>
                <td>: 081574379362</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>: udibagas@gmail.com</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">PENGALAMAN KERJA</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:130px;">Tahun</th>
                <th>Perusahaan</th>
                <th>Bidang</th>
                <th>Posisi</th>
                <th>Tugas & Tanggungjawab</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2006 - 2007</td>
                <td>PT. Bintang Komunikasi Utama</td>
                <td>Komunikasi (Satelit)</td>
                <td>Field Technician (VSAT)</td>
                <td>
                    Melakukan instalasi & maintenance VSAT di perbankan, tambang, perkebunan
                </td>
            </tr>
            <tr>
                <td>2008 - 2010</td>
                <td>PT. Bintang Komunikasi Utama</td>
                <td>Komunikasi (Satelit)</td>
                <td>IT Staff</td>
                <td>
                    Melakukan instalasi, maintenance, monitoring perangkat network & server. Merancang dan membuat sistem informasi sederhana untuk kebutuhan internal perusahaan.
                </td>
            </tr>
            <tr>
                <td>2010</td>
                <td>iTutor</td>
                <td>Software House (Education)</td>
                <td>System Administrator & Web Developer</td>
                <td>
                    Melakukan instalasi, maintenance, monitoring servers (Linux based). Merancang dan membuat sistem informasi untuk dipublish ke khalayak umum.
                </td>
            </tr>
            <tr>
                <td>2011</td>
                <td>PT Jaya Aditya Komunika</td>
                <td>Software House</td>
                <td>Web Developer</td>
                <td>
                    Merancang dan membuat beberapa aplikasi web based untuk instansi pemerintahan (Kementrian Perindustrian Ditjend Industri Agro)
                </td>
            </tr>
            <tr>
                <td>2011</td>
                <td>PT AG Tech</td>
                <td>Komunikasi</td>
                <td>System Administrator</td>
                <td>
                    Melakukan instalasi & maintenance server untuk operator (Bakrie, Telkomsel)
                </td>
            </tr>
            <tr>
                <td>2012</td>
                <td>PT Mobitell Systems</td>
                <td>System Integrator</td>
                <td>IT Engineer</td>
                <td>
                    Melakukan integrasi system komunikasi (Mobile VSAT, Rapid Development Unit, Mini BTS), penyadap (GSM, CDMA, Telepon Satelit) di Lembaga Sandi Negara
                </td>
            </tr>
            <tr>
                <td>2013</td>
                <td>PT Opensynergy Indonesia</td>
                <td>IT Consultant</td>
                <td>System Administrator</td>
                <td>
                    Melakukan instalasi, maintenance, monitoring servers (Linux based)
                </td>
            </tr>
            <tr>
                <td>2014 - 2016</td>
                <td>PT Lintas Mandiri Surya</td>
                <td>Komunikasi (Satelit)</td>
                <td>Network Engineer</td>
                <td>
                    Melakukan instalasi, maintenance, monitoring HUB (Shiron), perangkat network & server
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">SKILLS</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:150px;">Skill</th>
                <th>Detail</th>
                <th>Level</th>
                <th>Pengalaman</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>RF</th>
                <td>Memahami konsep RF (Radio Frequency). Mampu melakukan instalasi & maintenance RF (VSAT, Radio). Mampu melakukan troubleshoot permasalahan RF. Bisa mengoperasikan Spectrum Analyzer.</td>
                <td>Intermediate</td>
                <td>7 tahun</td>
            </tr>
            <tr>
                <th>Networking</th>
                <td>Memahami konsep TCP/IP, IP Address, Routing, dsb. Menguasai perangkat jaringan seperti Mikrotik, Cisco, Radio Wireless, VSAT, HUB System (Shiron). Mampu melakukan troublesoot permasalahan networking.</td>
                <td>Intermediate</td>
                <td>7 tahun</td>
            </tr>
            <tr>
                <th>Server</th>
                <td>Menguasai administrasi server linux based (Web, Database, Mail, Proxy, FTP, Samba) berbagai distro (Centos, Redhat, Debian, Ubuntu). Terbiasa dengan command line.</td>
                <td>Intermediate</td>
                <td>7 tahun</td>
            </tr>
            <tr>
                <th>Programming</th>
                <td>Menguasai pemrograman web dengan PHP (Laravel, Codeigniter, Yii), Javascript (jQuery, Vue.js), CSS, HTML. Memahami konsep OOP. Mampu membuat full featured application berbasis web. Terbiasa dengan bekerja dengan version control (Git)</td>
                <td>Intermediate</td>
                <td>5 tahun</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
