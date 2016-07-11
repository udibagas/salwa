{!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
