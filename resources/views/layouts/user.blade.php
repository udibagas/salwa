@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-3 col-sm-4">
			<div class="panel panel-default">
				<div class="list-group">
					<a class="list-group-item @if (url()->current() == url('me')) active @endif" href="/me"><i class="fa fa-user"></i> PROFILE</a>

					<a class="list-group-item @if (url()->current() == url('notifikasi')) active @endif" href="/notifikasi">
						<i class="fa fa-envelope"></i> NOTIFIKASI
						<span class="badge">{{ auth()->user()->unreadNotifications->count() }}</span>
					</a>

					<a class="list-group-item @if (url()->current() == url('forum-saya')) active @endif" href="/forum-saya"><i class="fa fa-comments-o"></i> FORUM SAYA</a>

					<a class="list-group-item @if (url()->current() == url('post-saya')) active @endif" href="/post-saya"><i class="fa fa-comments-o"></i> KOMENTAR FORUM SAYA</a>

					<a class="list-group-item @if (url()->current() == url('komentar-saya')) active @endif" href="/komentar-saya"><i class="fa fa-comments-o"></i> KOMENTAR SAYA</a>

					<a class="list-group-item @if (url()->current() == url('pertanyaan-saya')) active @endif" href="/pertanyaan-saya"><i class="fa fa-question-circle"></i> PERTANYAAN SAYA</a>

					@if (auth()->user()->isUstadz())
					<a class="list-group-item @if (url()->current() == url('pertanyaan/admin-ustadz')) active @endif" href="/pertanyaan/admin-ustadz"><i class="fa fa-inbox"></i> PERTANYAAN MASUK</a>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-9 col-sm-8">
			@yield('user-content')
		</div>
	</div>
@endsection

@if (!$isMobile)
	@section('footer')
		@include('layouts.footer')
	@endsection
@endif
