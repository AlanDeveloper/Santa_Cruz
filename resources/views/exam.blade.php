@extends('layout')

@section('content')
    <h1 class="mt-5 mb-5">Lista de exames</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-cadastrar">Cadastrar exame</button>
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
                    <form method="post" action="/exam" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Preencha com o nome do exame" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>                  

                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Descrição</label>
                            <textarea name="description" id="validationCustom02" class="form-control" placeholder="Preencha com uma breve descrição" rows="5" required></textarea>
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
                    <form method="post" action="/exam" class="row g-3 needs-validation" novalidate>
                        @method('PUT')
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom03" placeholder="Preencha com o nome do exame" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>                  

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Descrição</label>
                            <textarea name="description" id="validationCustom04" class="form-control textarea" placeholder="Preencha com uma breve descrição" rows="5" required></textarea>
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
        <div class="alert alert-danger">Houve um erro ao cadastrar o exame!</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($exams); $i++)
                <tr class="align-middle">
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $exams[$i]->name }}</td>
                    <td>
                        <button type="button" class="btn btn-warning text-light modalEdit" data-bs-toggle="modal" data-bs-target="#modal-editar" data-bs-content="{{ json_encode($exams[$i]) }}">Editar</button>
                    </td>
                    <td> 
                        <form method="post" class="delete_form" action="/exam/{{ $exams[$i]->id }}">
                            {{ method_field('DELETE') }}
                            {{  csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endfor

            @if (count($exams) == 0)
                <tr class="align-middle">
                    <th class="text-center" colspan="2" scope="row">Nenhum exame cadastrado.</th>
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
            });
        });
    </script>

@endsection