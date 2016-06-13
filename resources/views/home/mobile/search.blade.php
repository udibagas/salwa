@extends('layouts.main')

@section('title', 'Search : {{ request("search") }}')

@section('content')

@include('home.mobile._search-result')

@stop
