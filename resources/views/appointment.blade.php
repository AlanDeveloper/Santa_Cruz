@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de consultas</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar Consulta</button>

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
                            <label for="validationCustom03" class="form-label">Recepcionista Responsável</label>
                            <select name="cpfRec" id="validationCustom03" class="form-select form-control" required>
                                @foreach ($recepcionistas as $recepcionista)
                                    <option value="{{ $recepcionista->cpf }}"> {{ $recepcionista->nameRec }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Médico</label>
                            <select name="cpfMed" id="validationCustom03" class="form-select form-control" required>
                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico->cpfMed }}"> {{ $medico->nameMed }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">CPF Paciente</label>
                            <input type="text" name="cpfPac" class="form-control cpf-mask" id="validationCustom03" placeholder="XXX.XXX.XXX-XX" data-mask="000.000.000-00" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Data</label>
                            <input type="text" name="data" class="form-control" id="validationCustom03" placeholder="__/__/____" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Hora</label>
                            <input type="text" name="hora" class="form-control" id="validationCustom03" placeholder="__:__" required>
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
        <div class="alert alert-danger">Houve um erro ao cadastrar a consulta!</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Paciente</th>
                <th scope="col">Médico</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 0; $i < count($appointments); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $appointments[$i]->date }}</td>
                    <td>{{ $appointments[$i]->namePac }}</td>
                    <td>{{ $appointments[$i]->nameMed }}</td>
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
    function formatCPF(cpf){
        if (cpf.length > 14) cpf = cpf.slice(0, 14);
        cpf = cpf.replace(/[^\d]/g, "");
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

    let input = document.querySelector('.cpf-mask');
    input.addEventListener('keyup', e => {
        let res = formatCPF(e.target.value);
        e.target.value = res;
    });
</script>
@endsection