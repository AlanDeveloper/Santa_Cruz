<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Cruz</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100%;
        }

        html {
            height: 100%;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .links {
            margin-top: 20px;  
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: black;
            opacity: .8;    
        }

        footer {
            padding: 25px;        
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Santa Cruz</h1>

        <div class="links">
            <a href="#">Cadastro de funcionário</a>    
            <a href="#">Cadastro de paciente</a>    
        </div>
    </div>
    <footer>@2021 AlanDeveloper</footer>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>