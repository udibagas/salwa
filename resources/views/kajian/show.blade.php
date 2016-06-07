@extends('layouts.main')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian' => 'KAJIAN'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('kajian._group')
		</div>
		<div class="col-md-9">
			<h1>{{ $kajian->kajian_tema }}</h1>

			<p>
				Pemateri:<br />
				<strong>{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : ''}}</strong>
			</p>
			<p>
				Waktu:<br />
				<strong>
					@if ($kajian->jenis_kajian == 1)
					{{ $kajian->kajian_dates }}
					@elseif ($kajian->jenis_kajian == 2)
					{{ \App\Kajian::getHari($kajian->setiap_hari) }}, {{ $kajian->setiap_jam }}
					@else
					{{ $kajian->setiap_tanggal }}
					@endif
				</strong>
			</p>
			<p>
				Tempat:<br />
				<strong>
					{{ $kajian->kajian_tempat }}<br>
					{{ $kajian->area ? $kajian->area->nama_area : '' }} - {{ $kajian->lokasi ? $kajian->lokasi->nama_lokasi : '' }}
				</strong>
			</p>

			@if ($kajian->img_kajian_photo)
			<img src="/{{ $kajian->img_kajian_photo}}" alt="{{ $kajian->kajian_tema }}" />
			@endif
		</div>
	</div>

@stop
