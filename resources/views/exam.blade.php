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
                        {{  csrf_field() }}
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Preencha com o nome do exame" required>
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
                        <form method="post" class="delete_form" action="/exams/{{ $exams[$i]->id }}">
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

@endsection