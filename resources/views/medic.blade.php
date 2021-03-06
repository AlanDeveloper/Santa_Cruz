@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de médicos</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar médico</button>
    @include('barSearch')
    @include('modalAdd', ['type' => 'medic'])
    
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
                <th scope="col">Especialidade</th>
                
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($medics); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $medics[$i]->name }}</td>
                    <td>{{ $medics[$i]->email }}</td>
                    <td>{{ $medics[$i]->telephone }}</td>
                    <td>{{ $medics[$i]->cpf }}</td>
                    <td>{{ $medics[$i]->speciality }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-light modalEdit" data-bs-toggle="modal" data-bs-target="#modal-editar" data-bs-content="{{ json_encode($medics[$i]) }}">Editar</button>
                    </td>
                    <td> 
                        <form method="post" class="delete_form" action="/medic/{{ $medics[$i]->cpf }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($medics) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="6" scope="row">Nenhum médico cadastrado.</th>
                </tr>
            @endif
        </tbody>
    </table>

    @include('modalEdit', ['type' => 'medic'])

@endsection