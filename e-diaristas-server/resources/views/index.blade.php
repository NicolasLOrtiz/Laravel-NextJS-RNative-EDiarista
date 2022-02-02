@extends('app')

   @section('title', 'Página Inicial')

@section('content')
    <h1>Lista de Diaristas</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>

        @forelse($professionals as $professional)
            <tr>
                <th scope="row">{{ $professional->id }}</th>
                <td>{{ $professional->full_name }}</td>
                <td>{{ $professional->phone }}</td>
                <td>
                    <a href="{{ route('professionals.edit', $professional) }}" class="btn btn-primary">Atualizar</a>
                    <a href="{{ route('professionals.destroy', $professional) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Apagar</a>
                </td>
            </tr>
        @empty
            <tr>
                <th></th>
                <td>Nenhum registro cadastrado</td>
                <td></td>
                <td></td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('professionals.create') }}" class="btn btn-success">Nova Diarista</a>
@endsection

