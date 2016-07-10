<table class="table table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td colspan="2" class="text-center">
				<h4>{{ $surah->nama }}/{{ $surah->arab }} ({{ $surah->arti }})</h4>
			</td>
		</tr>
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
