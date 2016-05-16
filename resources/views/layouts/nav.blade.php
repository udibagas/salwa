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
		  <img src="/images/logo-putih.png" alt="" style="height:40px;" />
	  </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <form class="navbar-form navbar-left" method="GET" action="/" style="margin-left:10px;">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="form-control search-nav" style="width:200px;">
      </form>

      <ul class="nav navbar-nav navbar-right">
          <li class="@if (url()->current() == url('video')) active @endif"><a href="/video">Salwa Video</a></li>
		  <li class="@if (url()->current() == url('artikel')) active @endif"><a href="/artikel">Salwa Aktual</a></li>
		  <li class="@if (url()->current() == url('pertanyaan')) active @endif"><a href="/pertanyaan">Tanya Ustadz</a></li>
		  <li class="@if (url()->current() == url('forum')) active @endif"><a href="/forum">Salwa Forum</a></li>
		  <li class="@if (url()->current() == url('produk')) active @endif"><a href="/produk">Salwa Market</a></li>
		  <li class="@if (url()->current() == url('peduli')) active @endif"><a href="/peduli">Salwa Peduli</a></li>
		  @if (Auth::guest())
		  <li class="@if (url()->current() == url('register')) active @endif"><a href="/register">Daftar/Masuk</a></li>
		  @else
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/me"><i class="fa fa-user"></i> Profile</a></li>
			@if (Auth::user()->user_status == \App\User::ROLE_ADMIN)
  		  <li class="@if (url()->current() == url('cms')) active @endif"><a href="/cms"><i class="fa fa-th"></i> CMS</a></li>
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
