@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de recepcionistas</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar recepcionista</button>
    @include('barSearch')
    @include('modal', ['type' => 'receptionist'])
    
    @if ($errors->any())
        <div class="alert alert-danger mt-2 mb-2">Houve um erro ao cadastrar o recepcionista!</div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">CPF</th>
                
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($receptionists); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $receptionists[$i]->name }}</td>
                    <td>{{ $receptionists[$i]->email }}</td>
                    <td>{{ $receptionists[$i]->telephone }}</td>
                    <td>{{ $receptionists[$i]->cpf }}</td>
                    <td> 
                        <form method="post" class="delete_form" action="/receptionist/{{ $receptionists[$i]->cpf }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($receptionists) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="5" scope="row">Nenhum recepcionista cadastrado.</th>
                </tr>
            @endif
        </tbody>
    </table>

@endsection