<div class="modal fade" id="modal-exam-cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="\appointment\exam" class="row g-3 needs-validation" novalidate>
                    {{  csrf_field() }}
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Enfermeiro Responsável</label>
                        <select name="cpfNurse" id="validationCustom01" class="form-select" required>
                            <option value="">Selecione um enfermeiro</option>
                            @foreach ($nurses as $nurse)
                                <option value="{{ $nurse->cpfNurse }}"> {{ $nurse->nameNurse }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Consulta</label>
                        <select name="idAppointment" id="validationCustom02" class="form-select" required>
                            <option value="">Selecione a consulta</option>
                            @foreach ($appointments as $appointment)
                                <option value="{{ $appointment->id }}"> {{ $appointment->id }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Exame</label>
                        <select name="idExam" id="validationCustom03" class="form-select" required>
                            <option value="">Selecione o exame</option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->idExam }}"> {{ $exam->nameExam }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>

                        <label for="validationCustom04" class="form-label">Data</label>
                        <input class="form-control" type="date" name="data" id="data" required maxlength="10">
      
                        <label for="validationCustom05" class="form-label">Hora</label>
                        <input class="hour-mask form-control" type="text" name="hora" id="hora" required maxlength="5" placeholder="__:__">

                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Resultado</label>
                        <textarea name="result" id="validationCustom04" class="form-control textarea" maxlength="500" placeholder="Preencha com uma breve descrição" rows="5" required></textarea>
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

    function formatTEL(tel){
        if (tel.length > 14) tel = tel.slice(0, 14);
        tel = tel.replace(/[^\d]/g, "");
        return tel.replace(/(\d{2})(\d{5})(\d{4})/, "($1)$2-$3");
    }

    input = document.querySelector('.tel-mask');
    input.addEventListener('keyup', e => {
        let res = formatTEL(e.target.value);
        e.target.value = res;
    });

    function formatHour(hour){
        if (hour.length > 5) hour = hour.slice(0, 5);
        hour = hour.replace(/[^\d]/g, "");
        return hour.replace(/(\d{2})(\d{2})/, "$1:$2");
    }

    input = document.querySelector('.hour-mask');
    input.addEventListener('keyup', e => {
        let res = formathour(e.target.value);
        e.target.value = res;
    });
</script>