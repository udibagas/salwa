@foreach ($banner as $b)
<p><a href="{{ $b->url }}"><img src="/{{ $b->img_banner }}" alt="" class="img img-responsive img-thumbnail" /></a></p>
@endforeach
