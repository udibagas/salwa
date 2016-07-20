<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title text-center">
			<span class="surah s{{ $surah->id }}"></span><br>
			{{ strtoupper($surah->nama) }} ({{ strtoupper($surah->arti) }})
		</h3>
	</div>
	<table class="table table-striped table-bordered table-condensed">
		<tbody>
			<tr>
				<td>Jumlah Ayat</td>
				<td>{{ $surah->ayat }} ayat</td>
			</tr>
			<tr>
				<td>Urutan Penulisan</td>
				<td>{{ $surah->id }}</td>
			</tr>
			<tr>
				<td>Urutan Penurunan</td>
				<td>{{ $surah->urutan }}</td>
			</tr>
			<tr>
				<td>Tempat Turun</td>
				<td>{{ $surah->tempat }}</td>
			</tr>
			<tr>
				<td>Jenis Surat</td>
				<td>{{ $surah->jenis }}</td>
			</tr>
		</tbody>
	</table>
</div>
