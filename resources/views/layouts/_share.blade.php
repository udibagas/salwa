<div class="btn-group">
	<!-- <span class="btn btn-primary"><i class="fa fa-share-alt"></i></span> -->
	<a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-default" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/share?url={{ url()->current() }}" class="btn btn-default"><i class="fa fa-twitter" target="_blank"></i></a>
	<a href="https://plus.google.com/share?url={{ url()->current() }}" class="btn btn-default"><i class="fa fa-google-plus" target="_blank"></i></a>
	<a href="mailto:?Subject={{ $subject or "Salamdakwah" }}&Body={{ $body or "Artikel Menarik" }}" class="btn btn-default"><i class="fa fa-envelope" target="_blank"></i></a>
	<a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share" class="btn btn-default"><i class="fa fa-whatsapp" target="_blank"></i></a>
</div>
