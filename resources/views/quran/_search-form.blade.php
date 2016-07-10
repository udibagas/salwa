{!! Form::open(['method' => 'GET', 'url' => '/quran']) !!}
{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Ketik [surat]:[dari]-[sampai] (2:11-20 untuk melihat Al-Baqarah ayat 11 s.d 20) atau keyword']) !!}
{!! Form::close() !!}
