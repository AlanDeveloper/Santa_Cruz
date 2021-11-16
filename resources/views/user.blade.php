<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Santa Cruz</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">  
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
    </head>
    <style>
        body > div {
            margin-top: 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <body>
        <div>
            <h1>Acesso restrito</h1>
            @if ($errors->any())
                <div class="alert alert-danger">Erro: CPF não cadastrado!</div>
            @endif
            <form method="POST" action="\user-area">
                @csrf
                <label for="cpf" class="form-label"></label>
                <input type="text" name="cpf" class="form-control cpf-mask" id="cpf" placeholder="Insira seu CPF" required>
                <div class="modal-footer">
                    <a href="\" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Acessar</button>
                </div>
            </form>
        </div>
    </body>
</html>

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
