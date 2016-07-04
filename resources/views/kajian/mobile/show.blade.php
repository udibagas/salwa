@extends('layouts.main')

@section('title', 'Kajian : '.$kajian->kajian_tema)

@section('content')

	<div class="row-post">
		<h3>{{ $kajian->kajian_tema }}</h3>

		<div class="">
			<p>
				<i class="fa fa-user"></i> Pemateri:<br />
				<strong>{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : ''}}</strong>
			</p>
			<p>
				<i class="fa fa-edit"></i> Jenis Kajian:<br />
				<strong>{{ $kajian->jenis_kajian == '1' ? 'Tematik' : 'Rutin' }}</strong>
			</p>

			<p>
				<i class="fa fa-clock-o"></i> Waktu:<br />
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
				<i class="fa fa-map-marker"></i> Tempat:<br />
				<strong>
					{{ $kajian->kajian_tempat }}<br>
					{{ $kajian->area ? $kajian->area->nama_area : '' }} - {{ $kajian->lokasi ? $kajian->lokasi->nama_lokasi : '' }}
				</strong>
			</p>

			<p>
				<i class="fa fa-mobile"></i> Contact Person:<br />
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

	@if ($kajian->img_kajian_photo)
	<div class="row-post">
		<img src="/{{ $kajian->img_kajian_photo}}" alt="{{ $kajian->kajian_tema }}" class="img-responsive" />
	</div>
	@endif

	<div class="row-post text-center">
		@include('layouts._share')
	</div>

	@include('kajian._group')

	@if (auth()->check() && auth()->user()->isAdmin())
		{!! Form::open(['method' => 'DELETE']) !!}
			{!! Form::hidden('redirect', '/kajian') !!}
			@include('layouts.delete-btn-mobile')
			@include('layouts.edit-btn-mobile')
			<a href="/kajian/create">@include('layouts.add-btn-mobile')</a>
		{!! Form::close() !!}
	@endif

@stop
