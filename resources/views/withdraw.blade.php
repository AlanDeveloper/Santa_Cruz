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
    <h1 class="mt-5 mb-5">Registro de retiradas</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Retirar Medicamento</button>
    <!-- Modal -->
    <div class="modal fade" id="modal-cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/withdraw" class="row g-3 needs-validation" novalidate>
                        {{  csrf_field() }}
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Paciente</label>
                            <select name="cpfPac" id="validationCustom03" class="form-select form-control" required>
                                <option>Selecione o paciente</option>
                                @foreach ($patients as $pat)
                                    <option value="{{ $pat->cpfPac }}">{{ $pat->namePac }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Enfermeiro</label>
                            <select name="cpfNurse" id="validationCustom02" class="form-select form-control" required>
                                <option>Selecione um enfermeiro</option>
                                @foreach ($nurses as $nurse)
                                    <option value="{{ $nurse->cpf }}"> {{ $nurse->nameNurse }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Medicamento</label>
                            <select name="idMedicament" id="validationCustom03" class="form-select form-control" required>
                                <option>Selecione o medicamento</option>
                                @foreach ($medicaments as $med)
                                    <option value="{{ $med->idMed }}">{{ $med->nameMed }}({{ $med->amountMed }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Quantidade</label>
                            <input type="text" name="amount" class="form-control" id="validationCustom04" placeholder="Preencha a quantidade para retirada" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Data</label>
                            <input type="date" name="data" class="form-control" id="validationCustom03" placeholder="__/__/____" maxlength="10" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Hora</label>
                            <input type="text" name="hora" class="form-control time-mask" id="validationCustom03" maxlength="5" placeholder="__:__" required>
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
        <div class="alert alert-danger">Houve um erro ao retirar o medicamento!
        <!-- @if ($errors->amount)
            Erro: quantidade inválida.
        @endif -->
        @if ($errors->negativo)
            {{ $errors->first('negativo') }}
        @endif
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Paciente</th>
                <th scope="col">Medicamento</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Enfermeiro</th>
                
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($withdraws); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ converteData($withdraws[$i]->date) }}</td>
                    <td>{{ $withdraws[$i]->namePac }}</td>
                    <td>{{ $withdraws[$i]->nameMed }}</td>
                    <td>{{ $withdraws[$i]->amount }}</td>
                    <td>{{ $withdraws[$i]->nameNurse }}</td>
                    <td> 
                        <form method="post" class="delete_form" action="/withdraw/{{ $withdraws[$i]->cpfNurse }}x{{ $withdraws[$i]->cpfPac }}x{{ $withdraws[$i]->idMed }}x{{ $withdraws[$i]->date }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($withdraws) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="6" scope="row">Nenhum retirada cadastrada.</th>
                </tr>
            @endif
        </tbody>
    </table>

<script>
    function formatTime(t){
        if (t.length > 5) t = t.slice(0, 5);
        t = t.replace(/[^\d]/g, "");
        return t.replace(/(\d{2})(\d{2})/, "$1:$2");
    }

    input = document.querySelector('.time-mask');
    input.addEventListener('keyup', e => {
        let res = formatTime(e.target.value);
        e.target.value = res;
    });
</script>
@endsection