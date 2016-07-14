{!! Form::open(['method' => 'GET', 'url' => '/timeline']) !!}
{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
