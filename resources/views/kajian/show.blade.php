@extends('layouts.main')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian' => 'KAJIAN',
			'#' => str_limit($kajian->kajian_tema)
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('kajian._group')
		</div>
		<div class="col-md-6">
			<h2 style="margin-top:0;">{{ $kajian->kajian_tema }}</h2>
			<hr>
			@include('layouts._share')
			<hr>
			<div class="row">
				<div class="col-md-6">
					@if ($kajian->img_kajian_photo)
					<img src="/{{ $kajian->img_kajian_photo}}" alt="{{ $kajian->kajian_tema }}" class="img-responsive" style="width:100%" />
					@endif
				</div>
				<div class="col-md-6">
					<p>
						Pemateri:<br />
						<strong>{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : ''}}</strong>
					</p>
					<p>
						Jenis Kajian:<br />
						<strong>{{ $kajian->jenis_kajian == '1' ? 'Tematik' : 'Rutin' }}</strong>
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

					<p>
						Contact Person:<br />
						<strong>
							@if ($kajian->pic1)
							{{ $kajian->pic1->pic_name }} - {{ $kajian->pic1->pic_phone }} <br />
							@endif

							@if ($kajian->pic2)
							{{ $kajian->pic2->pic_name }} - {{ $kajian->pic2->pic_phone }} <br />
							@endif
						</strong>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h4 class="title">Kajian Terkait</h4>
			@each('kajian._list-side', $terkait, 'kajian')
		</div>
	</div>

@stop
