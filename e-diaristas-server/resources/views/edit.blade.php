@extends('app')

@section('title', 'Editar diarista')

@section('content')
    <h1>Editar diarista</h1>

    <form action="{{ route('professionals.update', $professional) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('_form')
    </form>

@endsection
