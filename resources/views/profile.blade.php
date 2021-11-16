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
    <body>
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
        <div class="center">
            <div>
                <h2>Olá {{ $patient->name }}</h2>
            </div>
            <div>
                <div>
                    <h1> Consultas </h1>
                    @foreach ($appointments as $app)
                        <div>
                        <p>Consulta {{ converteData($app->datePerforms) }} </p>
                        <p>Médico: {{ $app->nameMed }}</p>
                        <p>Diagnóstico: {{ $app->diagnosis }}</p>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h1> Exames </h1>
                    @foreach ($takeExams as $exam)
                    <div>
                    <p>Exame {{ converteData($exam->dateExam) }} </p>
                    <p>Tipo: {{ $exam->nameExam}}</p>
                    <p>Enfermeiro: {{ $exam->nameNurse}}</p>
                    <p>Resultado: {{ $exam->result}}</p>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </body>
</html>