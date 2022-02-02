@extends('app')

@section('title', 'Criar diarista')

@section('content')
    <h1>Criar diarista</h1>

    <form action="{{ route('professionals.store') }}" method="POST" enctype="multipart/form-data">
        @include('_form');
    </form>

@endsection
