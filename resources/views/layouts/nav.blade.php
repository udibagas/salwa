<div style="position:fixed;top:0;right:0;width:100%;z-index:1030;">
	<div class="container-fluid" style="background-color:#eee;text-align:right;height:30px;">
		<span style="font-size:13px;">Stay in touch with us:</span>
		<span style="font-size:20px;">
			<a href="https://www.facebook.com/Salamdakwah-287022414764661/?ref=hl" target="_blank" class="fa fa-facebook-square"> </a>
			<a href="https://twitter.com/salamdakwah" target="_blank" class="fa fa-twitter-square"> </a>
			<a href="https://www.youtube.com/user/salamdakwah" target="_blank" class="fa fa-youtube-square"> </a>
			<a href="https://www.instagram.com/salamdakwah" target="_blank" class="fa fa-instagram"> </a>
		</span>
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

      <form class="navbar-form navbar-left" method="GET" action="/" style="margin-left:120px;">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="form-control search-nav" style="width:200px;">
      </form>

      <ul class="nav navbar-nav navbar-right">
          <li class="@if (url()->current() == url('video')) active @endif"><a href="/video">Salwa Video</a></li>
		  <li class="@if (url()->current() == url('artikel')) active @endif"><a href="/artikel">Salwa Aktual</a></li>
		  <li class="@if (url()->current() == url('pertanyaan')) active @endif"><a href="/pertanyaan">Tanya Ustadz</a></li>
		  <li class="@if (url()->current() == url('forum')) active @endif"><a href="/forum">Salwa Forum</a></li>
		  <li class="@if (url()->current() == url('produk')) active @endif"><a href="/produk">Salwa Market</a></li>
		  <li class="@if (url()->current() == url('peduli')) active @endif"><a href="/peduli">Salwa Peduli</a></li>
		  <li class="@if (url()->current() == url('kajian')) active @endif"><a href="/kajian">Kajian</a></li>
		  @if (auth()->guest())
		  <li class="@if (url()->current() == url('login')) active @endif"><a href="/login">Login</a></li>
		  <li class="@if (url()->current() == url('register')) active @endif"><a href="/register">Register</a></li>
		  @else
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/me"><i class="fa fa-user"></i> Profile</a></li>
			@if (auth()->user()->isAdmin())
  		  <li class="@if (url()->current() == url('cms')) active @endif"><a href="/cms"><i class="fa fa-th"></i> CMS</a></li>
  		  @endif
			@if (auth()->user()->isUstadz())
  		  <li class="@if (url()->current() == url('pertanyaan/admin-ustadz')) active @endif"><a href="/pertanyaan/admin-ustadz"><i class="fa fa-inbox"></i> Pertanyaan Masuk</a></li>
  		  @endif
            <!-- <li role="separator" class="divider"></li> -->
            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
		  @endif
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
