@extends('layouts.layoutpublic')

@section('content')
    <h1>Error</h1>
    <div>{{$exception->getMessage()}}</div>
@endsection