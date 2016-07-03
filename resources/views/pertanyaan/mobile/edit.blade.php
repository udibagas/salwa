@extends('layouts.main')

@section('title', 'Tanya Ustadz : Edit Pertanyaan')

@section('content')

<h4 class="title">EDIT PERTANYAAN</h4>
@include('pertanyaan.mobile._form', ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id, 'method' => 'PUT'])
@include('pertanyaan._panduan')
@include('pertanyaan._group')

@stop
