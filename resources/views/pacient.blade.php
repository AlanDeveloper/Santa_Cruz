@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de pacientes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($pacients as $pac) 
                    <th scope="row">{{ $pac->id }}</th>
                    <td>{{ $pac->name }}</td>
                    <td>{{ $pac->email }}</td>
                @endforeach
                @if (count($pacients) == 0)
                    <th class="text-center" colspan="3" scope="row">Nenhum paciente cadastrado.</th>
                @endif
            </tr>
        </tbody>
    </table>
@endsection