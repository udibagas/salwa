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
		  <img src="/images/logo-shadow.png" alt="" style="height:40px;display:inline-block;" />
	  </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <form class="navbar-form navbar-left" method="GET" action="/quran">
			<input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik [surat]:[dari]-[sampai] atau keyword" class="form-control search-field">
      </form>

      <ul class="nav navbar-nav navbar-right">
		  <li class="@if (url()->current() == url('informasi')) active @endif"><a href="/informasi">SALWA INFO</a></li>
		  <li class="dropdown no-hover">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <i class="fa fa-cogs"></i> SETTINGS
			  </a>
		      <ul class="dropdown-menu">
		        <li><a href="/kitab">KITAB & TERJEMAHAN</a></li>
				<li><a href="/kajian">KAJIAN</a></li>
		        <li><a href="/doa">DOA</a></li>
		      </ul>
        </li>
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
