{!! Form::open(['method' => 'GET', 'url' => '/salwa.id']) !!}
{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
{!! Form::close() !!}
