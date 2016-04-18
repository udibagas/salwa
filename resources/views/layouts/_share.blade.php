Share:
<div class="btn-group">
	<a href="https://www.facebook.com/sharer.php?u={{ $url or url('/') }}" class="btn btn-warning" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/share?url={{ $url or url('/') }}" class="btn btn-warning"><i class="fa fa-twitter" target="_blank"></i></a>
	<a href="https://plus.google.com/share?url={{ $url or url('/') }}" class="btn btn-warning"><i class="fa fa-google-plus" target="_blank"></i></a>
	<a href="mailto:?Subject={{ $subject or "Salamdakwah" }}&Body={{ $body or "Artikel Menarik" }}" class="btn btn-warning"><i class="fa fa-envelope" target="_blank"></i></a>
	<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp" target="_blank"></i></a>
</div>
