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
			<input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="form-control search-field">

			{!! Form::select('qari', \App\Ayah::getQariList(), request('qari'), ['class' => 'form-control']) !!}

			<div class="btn-group">
				<a href="#" class="btn btn-info prev">
					<i class="fa fa-step-backward"></i>
				</a>
				<a href="#" class="btn btn-info pause">
					<i class="fa fa-pause"></i>
				</a>
				<a href="#" class="btn btn-info play">
					<i class="fa fa-play"></i>
				</a>
				<a href="#" class="btn btn-info next">
					<i class="fa fa-step-forward"></i>
				</a>
			</div>
      </form>

      <ul class="nav navbar-nav navbar-right">
		  <li class="@if (url()->current() == url('quran/about')) active @endif"><a href="#"><i class="fa fa-home"></i></a></li>
		  <li class="@if (url()->current() == url('quran/about')) active @endif"><a href="#"><i class="fa fa-folder-open"></i> ABOUT</a></li>
		  <li class="@if (url()->current() == url('quran/help')) active @endif"><a href="#"><i class="fa fa-support"></i> HELP</a></li>
		  <li class="@if (url()->current() == url('quran/contact')) active @endif"><a href="#"><i class="fa fa-envelope"></i> CONTACT</a></li>
		  <li class="@if (url()->current() == url('quran/feedback')) active @endif"><a href="#"><i class="fa fa-commenting"></i> FEEDBACK</a></li>
		  <!-- <li class="@if (url()->current() == url('quran/donate')) active @endif"><a href="/quran/donate"><i class="fa fa-money"></i> DONATE</a></li> -->
		  <!-- <li class="dropdown no-hover">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <i class="fa fa-cogs"></i> SETTINGS
			  </a>
		      <ul class="dropdown-menu">
		        <li><a href="/kitab">KITAB & TERJEMAHAN</a></li>
				<li><a href="/kajian">KAJIAN</a></li>
		        <li><a href="/doa">DOA</a></li>
		      </ul>
        </li> -->
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>
