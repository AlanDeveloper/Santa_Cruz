@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de enfermeiros</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar enfermeiro</button>
    @include('barSearch')
    @include('modalAdd', ['type' => 'nurse'])
    
    @if ($errors->any())
        <div class="alert alert-danger mt-2 mb-2">Houve um erro ao cadastrar o paciente!</div>
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
            @for ($i = 0; $i < count($nurses); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $nurses[$i]->name }}</td>
                    <td>{{ $nurses[$i]->email }}</td>
                    <td>{{ $nurses[$i]->telephone }}</td>
                    <td>{{ $nurses[$i]->cpf }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-light modalEdit" data-bs-toggle="modal" data-bs-target="#modal-editar" data-bs-content="{{ json_encode($nurses[$i]) }}">Editar</button>
                    </td>
                    <td> 
                        <form method="post" class="delete_form" action="/nurse/{{ $nurses[$i]->cpf }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($nurses) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="5" scope="row">Nenhum enfermeiro cadastrado.</th>
                </tr>
            @endif
        </tbody>
    </table>

    @include('modalEdit', ['type' => 'nurse'])

@endsection