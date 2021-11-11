@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de pacientes</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar paciente</button>

    @include('barSearch')
    @include('modalAdd', ['type' => 'patient'])
    
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
            @for ($i = 0; $i < count($patients); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $patients[$i]->name }}</td>
                    <td>{{ $patients[$i]->email }}</td>
                    <td>{{ $patients[$i]->telephone }}</td>
                    <td>{{ $patients[$i]->cpf }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-light modalEdit" data-bs-toggle="modal" data-bs-target="#modal-editar" data-bs-content="{{ json_encode($patients[$i]) }}">Editar</button>
                    </td>
                    <td> 
                        <form method="post" class="delete_form" action="/patient/{{ $patients[$i]->cpf }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($patients) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="5" scope="row">Nenhum paciente cadastrado.</th>
                </tr>
            @endif
        </tbody>
    </table>

    @include('modalEdit', ['type' => 'patient'])

    <!-- <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script> -->
@endsection