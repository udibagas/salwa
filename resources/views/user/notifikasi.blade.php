@extends('layouts.main')

@section('title', 'Notifikasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'NOTIFIKASI',
		]
	])

@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
		<div class="pull-right">
			<a href="/notifikasi/read-all">Tandai Semua Sudah Dibaca</a> |
			<a href="/notifikasi/delete-all" class="confirm">Hapus Semua Notifikasi</a>
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
        <li class="list-group-item @if ($n->read_at == NULL) text-bold @endif">
            <div class="text-muted pull-right">
                @if ($n->read_at == NULL)
                <a href="/notifikasi/baca/{{ $n->id }}" title="Tandai sudah dibaca">
                    <i class="fa fa-check"></i>
                </a>
                @endif

                <a href="/notifikasi/hapus/{{ $n->id }}" class="confirm" title="Hapus">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
            <a href="/notifikasi/baca/{{ $n->id }}?redirect={{ $n->data['url'] }}">
                {{ $n->data['subject'] }}:
				{{ $n->data['message'] }} <small>- {{ $n->created_at->diffForHumans() }}</small>
            </a>
        </li>
        @endforeach
    </ul>
    @if ($notifications->total() > 1)
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
