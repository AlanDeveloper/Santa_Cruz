@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de pacientes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @for ($i = 0; $i < count($pacients); $i++)
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $pacients[$i]->name }}</td>
                    <td>{{ $pacients[$i]->email }}</td>
                    <td>{{ $pacients[$i]->telephone }}</td>
                @endfor
                @if (count($pacients) == 0)
                    <th class="text-center" colspan="4" scope="row">Nenhum paciente cadastrado.</th>
                @endif
            </tr>
        </tbody>
    </table>
@endsection