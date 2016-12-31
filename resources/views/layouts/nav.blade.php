<div style="position:fixed;top:0;right:0;left:0;z-index:1030;background-color:#eee;height:30px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-4">

			</div>
			<div class="col-sm-4 col-md-4 text-center" style="margin-top:5px;">
				<i class="fa fa-pause" class="text-primary"></i> SALWA RADIO - Menebar Salam, Menyebar Dakwah
			</div>
			<div class="col-sm-4 col-md-4 text-right">
				<span style="font-size:13px;">Stay in touch with us:</span>
				<span style="font-size:20px;">
					<a href="https://www.facebook.com/Salamdakwah-287022414764661/?ref=hl" target="_blank" class="fa fa-facebook-square"> </a>
					<a href="https://twitter.com/salamdakwah" target="_blank" class="fa fa-twitter-square"> </a>
					<a href="https://www.youtube.com/user/salamdakwah" target="_blank" class="fa fa-youtube-square"> </a>
					<a href="https://www.instagram.com/salamdakwah" target="_blank" class="fa fa-instagram"> </a>
				</span>
			</div>
		</div>
	</div>
</div>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
		  <img src="/images/logo-shadow.png" alt="" style="height:80px;" />
	  </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <form class="navbar-form navbar-left" method="GET" action="/search" style="margin-left:120px;">
			<input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="form-control search-field" style="width:200px;">
      </form>

      <ul class="nav navbar-nav navbar-right">
          <li class="@if (url()->current() == url('video')) active @endif"><a href="/video">SALWA VIDEO</a></li>
		  <li class="@if (url()->current() == url('artikel')) active @endif"><a href="/artikel">SALWA AKTUAL</a></li>
		  <li class="@if (url()->current() == url('pertanyaan')) active @endif"><a href="/pertanyaan">TANYA USTADZ</a></li>
		  <li class="@if (url()->current() == url('forum')) active @endif"><a href="/forum">SALWA FORUM</a></li>
		  <li class="@if (url()->current() == url('informasi')) active @endif"><a href="/informasi">SALWA INFO</a></li>
		  <li class="@if (url()->current() == url('quran')) active @endif"><a href="/quran">AL QURAN <sup>BETA</sup></a></li>
		  <!-- <li class="@if (url()->current() == url('kajian')) active @endif"><a href="/kajian">Kajian</a></li> -->
		  <li class="dropdown no-hover">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <!-- &bull; &bull; &bull; -->
				  <i class="fa fa-bars"></i>
				  <!-- MORE -->
				  <!-- <span class="caret"></span> -->
			  </a>
		      <ul class="dropdown-menu">
		        <!-- <li><a href="/radio">SALWA RADIO</a></li> -->
		        <li><a href="/kitab">KITAB & TERJEMAHAN</a></li>
				<li><a href="/kajian">KAJIAN</a></li>
		        <li><a href="/doa">DOA</a></li>
		        <li><a href="/dzikir">DZIKIR</a></li>
				<li><a href="/hadist">HADIST</a></li>
				<li><a href="/audio">SALWA AUDIO</a></li>
		        <li><a href="/murottal">MUROTTAL</a></li>
		        <li><a href="/image">SALWA IMAGE</a></li>
				<li class="@if (url()->current() == url('peduli')) active @endif"><a href="/peduli">SALWA PEDULI</a></li>
				<li class="@if (url()->current() == url('produk')) active @endif"><a href="/produk">SALWA MARKET</a></li>
		      </ul>
        </li>
		  @if (auth()->guest())
		  <li class="@if (url()->current() == url('login')) active @endif"><a href="/login">LOGIN</a></li>
		  <li class="@if (url()->current() == url('register')) active @endif"><a href="/register">REGISTER</a></li>
		  @else
			  @if (auth()->user()->img_user)
			  <li class="no-hover">
				  <a href="/me" style="padding:5px 0 0 10px;">
					  <span style="background-image:url('/{{ auth()->user()->img_user }}');width:40px;height:40px;border-radius:50%;background-size:40px;background-repeat:no-repeat;display:inline-block;"></span>
				  </a>
			  </li>
			  @endif
		  <li class="dropdown no-hover" style="border-left:none;">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  {{ explode(' ', auth()->user()->name)[0] }}
				  <span class="caret"></span>
			  </a>
		      <ul class="dropdown-menu">
		        <li><a href="/me"><i class="fa fa-user"></i> PROFILE</a></li>
		        <!-- <li><a href="/message"><i class="fa fa-inbox"></i> Inbox <span class="badge">1</span></a></li> -->
		        <li><a href="/pertanyaan-saya"><i class="fa fa-question-circle"></i> PERTANYAAN SAYA</a></li>
		        <li><a href="/forum-saya"><i class="fa fa-comments"></i> FORUM SAYA</a></li>
				@if (auth()->user()->isAdmin())
				  <li class="@if (url()->current() == url('cms')) active @endif"><a href="/cms"><i class="fa fa-th"></i> CMS</a></li>
				  @endif
				@if (auth()->user()->isUstadz())
				  <li class="@if (url()->current() == url('pertanyaan/admin-ustadz')) active @endif"><a href="/pertanyaan/admin-ustadz"><i class="fa fa-inbox"></i> PERTANYAAN MASUK</a></li>
				  @endif
		        <!-- <li role="separator" class="divider"></li> -->
		        <!-- <li><a href="/logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li> -->
				<li>
					<a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> LOGOUT
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</li>
		      </ul>
        </li>
		<li class="dropdown">
		   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			   <i class="fa fa-envelope"></i>
			   <sup><span class="badge" style="font-size:8px;background-color:#236C9E;">{{ auth()->user()->unreadNotifications->count() }}</span></sup>

		   </a>

		   <ul class="dropdown-menu" role="menu">
			   @foreach (auth()->user()->unreadNotifications->take(5) as $n)
			   <li>
				   <a href="/notifikasi/baca/{{ $n->id }}?redirect={{ $n->data['url'] }}">
					   <strong>{{ $n->data['subject'] }}</strong><br>
					   {{ str_limit($n->data['message'], 75) }}<br>
					   <small>{{ $n->created_at->diffForhumans() }}</small>
				   </a>
			   </li>
			   @endforeach
			   <li><a href="/notifikasi">Lihat Semua Notifikasi</a></li>
		   </ul>
	   </li>
		 @endif
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
