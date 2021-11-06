@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de medicamentos</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar medicamento</button>
    @include('barSearch')
    <!-- Modal -->
    <div class="modal fade" id="modal-cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/medicament" class="row g-3 needs-validation" novalidate>
                        {{  csrf_field() }}
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Preencha com o nome do medicamentamento" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Quantidade</label>
                            <div class="input-group has-validation">
                                <input type="text" name="amount" class="form-control" id="validationCustom02" placeholder="0" required>
                                <div class="invalid-feedback">
                                    É necessário preencher o campo corretamente!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">CPF do enfermeiro</label>
                            <input type="text" name="cpfNurse" class="form-control" id="validationCustom03" placeholder="000.000.000-00" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Descrição</label>
                            <textarea name="description" id="validationCustom04" class="form-control" rows="10" required></textarea>
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
        <div class="alert alert-danger">Houve um erro ao cadastrar o medicamento!</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Enfermeiro</th>
                
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($medicaments); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $medicaments[$i]->name }}</td>
                    <td>{{ $medicaments[$i]->amount }}</td>
                    <td><!-- {{ $medicaments[$i]->nameNurse }} --></td>
                    <td> 
                        <form method="post" class="delete_form" action="/medicament/{{ $medicaments[$i]->id }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($medicaments) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="4" scope="row">Nenhum medicamento cadastrado.</th>
                </tr>
            @endif
        </tbody>
    </table>

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