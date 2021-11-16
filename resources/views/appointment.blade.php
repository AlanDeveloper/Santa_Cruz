@extends('layout')
<?php 
    function converteData($dataHora) {
        $p = explode(' ', $dataHora);
        $data = $p[0];
        $hora = $p[1];
        $hora = substr($hora,0,5);

        $p = explode('-', $data);
        $data = $p[2] . '/' . $p[1] . '/' . $p[0];
        return $data . ' ' . $hora;
    }
?>
@section('content')
    <h1 class="mt-5 mb-5">Lista de consultas</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar Consulta</button>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-exam-cadastrar">Fazer exame</button>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-performs-cadastrar">Fazer consulta</button>
    @include('modalPerforms')
    @include('modalExam')

    <!-- Modal -->
    <div class="modal fade" id="modal-cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/appointment" class="row g-3 needs-validation" novalidate>
                        {{  csrf_field() }}
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Recepcionista Responsável</label>
                            <select name="cpfRec" id="validationCustom01" class="form-select" required>
                                <option value="">Selecione um recepcionista</option>
                                @foreach ($receptionists as $receptionist)
                                    <option value="{{ $receptionist->cpf }}"> {{ $receptionist->nameRec }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Paciente</label>
                            <select name="cpfPac" id="validationCustom02" class="form-select" required>
                                <option value="">Selecione um paciente</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->cpfPac }}"> {{ $patient->namePac }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">Houve um erro ao cadastrar a consulta!
            @if ($errors->cpfPac)
                    Erro: Paciente não cadastrado.
            @endif
        </div>
    @endif
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Recepcionista</th>
                <th scope="col">Paciente</th>
                <th scope="col">Data</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 0; $i < count($appointments); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $appointments[$i]->nameRec }}</td>
                    <td>{{ $appointments[$i]->namePac }}</td>
                    <td>{{ converteData($appointments[$i]->date) }}</td>
                    <td> 
                        <form method="post" class="delete_form" action="/appointment/{{ $appointments[$i]->id }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($appointments) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="5" scope="row">Nenhuma consulta cadastrada.</th>
                </tr>
            @endif
        </tbody>
    </table>

<script>
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
    })();
</script>
@endsection