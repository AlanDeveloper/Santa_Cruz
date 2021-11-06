@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de enfermeiros</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar enfermeiro</button>
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
                    <form method="post" action="/nurse" class="row g-3 needs-validation" novalidate>
                        {{  csrf_field() }}
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nome completo</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Preencha com seu nome" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="example@example.com" required>
                                <div class="invalid-feedback">
                                    É necessário preencher o campo corretamente!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control cpf-mask" id="validationCustom03" placeholder="XXX.XXX.XXX-XX" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom06" class="form-label">Telefone</label>
                            <input type="text" name="telephone" class="form-control" id="validationCustom06" placeholder="(XX)XXXXX-XXXX" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom05" class="form-label">Endereço</label>
                            <input type="text" name="address" class="form-control" id="validationCustom05" placeholder="Preencha com seu endereço" required>
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
        <div class="alert alert-danger">Houve um erro ao cadastrar o enfermeiro!</div>
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
        })()
    </script>
@endsection