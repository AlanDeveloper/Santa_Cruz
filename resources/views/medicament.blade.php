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
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Preencha com o nome do medicamento" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Quantidade</label>
                            <div class="input-group has-validation">
                                <input type="number" name="amount" class="form-control" id="validationCustom02" placeholder="Preencha a quantidade do medicamento" required>
                                <div class="invalid-feedback">
                                    É necessário preencher o campo corretamente!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Enfermeiro Responsável</label>
                            <select name="cpfNurse" id="validationCustom03" class="form-select" required>
                                <option value="">Selecione um enfermeiro</option>
                                @foreach ($nurses as $nurse)
                                    <option value="{{ $nurse->cpf }}"> {{ $nurse->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Descrição</label>
                            <textarea name="description" id="validationCustom04" class="form-control" rows="5" placeholder="Preencha com uma breve descrição" required></textarea>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário de atualização</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/medicament" class="row g-3 needs-validation" novalidate>
                        @method('PUT')
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom05" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom05" placeholder="Preencha com o nome do medicamento" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom06" class="form-label">Quantidade</label>
                            <div class="input-group has-validation">
                                <input type="number" name="amount" class="form-control" id="validationCustom06" placeholder="Preencha a quantidade do medicamento" required>
                                <div class="invalid-feedback">
                                    É necessário preencher o campo corretamente!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Enfermeiro Responsável</label>
                            <select name="cpfNurse" id="validationCustom07" class="form-select" required>
                                <option value="">Selecione um enfermeiro</option>
                                @foreach ($nurses as $nurse)
                                    <option value="{{ $nurse->cpf }}"> {{ $nurse->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom08" class="form-label">Descrição</label>
                            <textarea name="description" id="validationCustom08" class="form-control  textarea" rows="5" placeholder="Preencha com uma breve descrição" required></textarea>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
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
                    <td>{{ $medicaments[$i]->nameNurse }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-light modalEdit" data-bs-toggle="modal" data-bs-target="#modal-editar" data-bs-content="{{ json_encode($medicaments[$i]) }}">Editar</button>
                    </td>
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
        let openModalInputs = document.querySelectorAll('.modalEdit');
        openModalInputs.forEach(i => {
            i.addEventListener('click', (e) => {
                let data = JSON.parse(i.getAttribute('data-bs-content'));
                let inputs = document.querySelectorAll('#modal-editar input');
                document.querySelector('#modal-editar form').setAttribute('ACTION', `${window.location.href}/${data.id}`);
                inputs.forEach(inp => {
                    for (let key in data) {
                        if (inp.getAttribute('name') === key) {
                            inp.value = data[key];
                        }
                    }
                });
                document.querySelector('.textarea').value = data['description'];

                let options = document.querySelectorAll('option');
                options.forEach(opt => {
                    if (opt.getAttribute('value') === data.cpfNurse) opt.setAttribute('selected', 'true');
                });
            });
        });
    </script>

@endsection