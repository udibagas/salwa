@extends('layouts.user')

@section('title', 'Notifikasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'NOTIFIKASI',
		]
	])

@stop

@section('user-content')

<div class="panel panel-default">
    <div class="panel-heading">
		<div class="pull-right">
			@if (auth()->user()->unreadNotifications->count() > 0)
			<a href="/notifikasi/read-all">Tandai semua sudah dibaca</a> &bull;
			@endif
			@if (auth()->user()->notifications->count() > 0)
			<a href="/notifikasi/delete-all" class="confirm">Hapus semua notifikasi</a>
			@endif
		</div>
        <i class="fa fa-envelope"></i> NOTIFIKASI
    </div>
    @if ($notifications->total() == 0)
    <div class="panel-body text-center">
        <p>
            Tidak ada notifikasi.
        </p>
    </div>
    @endif
    <ul class="list-group">
        @foreach($notifications as $n)
        <li class="list-group-item @if ($n->read_at == NULL) disabled @endif">
            <div class="text-muted pull-right">
                @if ($n->read_at == NULL)
                <a href="/notifikasi/baca/{{ $n->id }}" title="Tandai sudah dibaca">
                    Tandai sudah dibaca
                </a> &bull;
                @endif

                <a href="/notifikasi/hapus/{{ $n->id }}" class="confirm" title="Hapus">
                    Hapus
                </a>
            </div>
            <a href="/notifikasi/baca/{{ $n->id }}?redirect={{ $n->data['url'] }}" class="@if ($n->read_at == NULL) text-bold @endif">
                {{ $n->data['subject'] }}:
				{{ $n->data['message'] }}
            </a><br>
			{{ $n->created_at->diffForHumans() }}
        </li>
        @endforeach
    </ul>
    @if ($notifications->total() > 0)
    <div class="panel-footer">
        <div class="pull-right">
            Showing {{ $notifications->firstItem() }} to {{ $notifications->lastItem() }} of {{ $notifications->total() }} entries
        </div>
        {!! $notifications->links() !!}
        <div class="clearfix"></div>
    </div>
    @endif
</div>

@endsection
