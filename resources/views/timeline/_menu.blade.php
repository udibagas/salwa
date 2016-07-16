<div class="list-group" id="sidr">
	<a class="list-group-item" href="/timeline" style="border-radius:0;">
		<i class="fa fa-home"></i> HOME
	</a>
	<a class="list-group-item @if (request('type') == 'artikel') active @endif" href="/timeline?type=artikel">
		<i class="fa fa-file-text"></i> ARTIKEL
	</a>
	<a class="list-group-item @if (request('type') == 'audio') active @endif" href="/timeline?type=audio">
		<i class="fa fa-music"></i> AUDIO
	</a>
	<a class="list-group-item @if (request('type') == 'forum') active @endif" href="/timeline?type=forum">
		<i class="fa fa-comments-o"></i> FORUM
	</a>
	<a class="list-group-item @if (request('type') == 'hadist') active @endif" href="/timeline?type=hadist">
		<i class="fa fa-heartbeat"></i> HADIST, DO'A, DZIKIR
	</a>
	<a class="list-group-item @if (request('type') == 'image') active @endif" href="/timeline?type=image">
		<i class="fa fa-image"></i> IMAGES
	</a>
	<a class="list-group-item @if (request('type') == 'informasi') active @endif" href="/timeline?type=informasi">
		<i class="fa fa-newspaper-o"></i> INFORMASI
	</a>
	<a class="list-group-item @if (request('type') == 'kajian') active @endif" href="/timeline?type=kajian">
		<i class="fa fa-edit"></i> KAJIAN
	</a>
	<a class="list-group-item @if (request('type') == 'kitab') active @endif" href="/timeline?type=kitab">
		<i class="fa fa-book"></i> KITAB & TERJEMAHAN
	</a>
	<a class="list-group-item @if (request('type') == 'produk') active @endif" href="/timeline?type=produk">
		<i class="fa fa-shopping-cart"></i> MARKET
	</a>
	<a class="list-group-item @if (request('type') == 'peduli') active @endif" href="/timeline?type=peduli">
		<i class="fa fa-heart-o"></i> PEDULI
	</a>
	<a class="list-group-item @if (request('type') == 'pertanyaan') active @endif" href="/timeline?type=pertanyaan">
		<i class="fa fa-question-circle"></i> TANYA USTADZ
	</a>
	<a class="list-group-item @if (request('type') == 'video') active @endif" href="/timeline?type=video" style="border-radius:0;">
		<i class="fa fa-video-camera"></i> VIDEO
	</a>
</div>
