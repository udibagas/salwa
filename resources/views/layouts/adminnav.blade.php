<div class="list-group">
	<a class="list-group-item @if (url()->current() == url('cms')) active @endif" href="/cms" >
		<i class="fa fa-dashboard"></i> Dashboard
	</a>
	<a class="list-group-item @if (url()->current() == url('artikel/admin')) active @endif" href="/artikel/admin">
		<i class="fa fa-file-text"></i> Aktual
	</a>
	<a class="list-group-item @if (url()->current() == url('informasi/admin')) active @endif" href="/informasi/admin">
		<i class="fa fa-newspaper-o"></i> Salwa Info
	</a>
	<a class="list-group-item @if (url()->current() == url('peduli/admin')) active @endif" href="/peduli/admin">
		<i class="fa fa-heart-o"></i> Salwa Peduli
	</a>
	<a class="list-group-item @if (url()->current() == url('pertanyaan/admin')) active @endif" href="/pertanyaan/admin">
		<i class="fa fa-question-circle"></i> Tanya Ustadz
	</a>
	<a class="list-group-item @if (url()->current() == url('buku/admin')) active @endif" href="/buku/admin">
		<i class="fa fa-book"></i> Kitab & Terjemahan
	</a>
	<a class="list-group-item @if (url()->current() == url('forum/admin')) active @endif" href="/forum/admin">
		<i class="fa fa-comments-o"></i> Forum
	</a>
	<a class="list-group-item @if (url()->current() == url('promo/admin')) active @endif" href="/promo/admin">
		<i class="fa fa-list"></i> Salwa Promo
	</a>
	<a class="list-group-item @if (url()->current() == url('produk/admin')) active @endif" href="/produk/admin">
		<i class="fa fa-tags"></i> Produk
	</a>
	<a class="list-group-item @if (url()->current() == url('doa/admin')) active @endif" href="/doa/admin">
		<i class="fa fa-heartbeat"></i> Do'a
	</a>
	<a class="list-group-item @if (url()->current() == url('dzikir/admin')) active @endif" href="/dzikir/admin">
		<i class="fa fa-hand-stop-o"></i> Dzikir
	</a>
	<a class="list-group-item @if (url()->current() == url('hadist/admin')) active @endif" href="/hadist/admin">
		<i class="fa fa-list-alt"></i> Hadits
	</a>
	<a class="list-group-item @if (url()->current() == url('video/admin')) active @endif" href="/video/admin">
		<i class="fa fa-video-camera"></i> Video
	</a>
	<a class="list-group-item @if (url()->current() == url('mp3/admin')) active @endif" href="/mp3/admin">
		<i class="fa fa-music"></i> Audio
	</a>
	<a class="list-group-item @if (url()->current() == url('murottal/admin')) active @endif" href="/mrottal/admin">
		<i class="fa fa-microphone"></i> Murottal Al Qur'an
	</a>
	<a class="list-group-item @if (url()->current() == url('image/admin')) active @endif" href="/image/admin">
		<i class="fa fa-image"></i> Salwa Image
	</a>
	<a class="list-group-item @if (url()->current() == url('group')) active @endif" href="/group">
		<i class="fa fa-tags"></i> Group
	</a>
	<a class="list-group-item @if (url()->current() == url('user')) active @endif" href="/user">
		<i class="fa fa-users"></i> Users
	</a>
</div>
