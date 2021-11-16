<div class="modal fade" id="modal-performs-cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="\appointment\performs" class="row g-3 needs-validation" novalidate>
                    {{  csrf_field() }}
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Médico Responsável</label>
                        <select name="cpfMed" id="validationCustom01" class="form-select" required>
                            <option value="">Selecione um médico</option>
                            @foreach ($medics as $medic)
                                <option value="{{ $medic->cpfMed }}"> {{ $medic->nameMed }}</option>
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
                        <label for="validationCustom04" class="form-label">Data</label>
                        <input class="form-control" type="date" name="data" id="data" required maxlength="10">
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom05" class="form-label">Hora</label>
                        <input class="hour-mask form-control" type="text" name="hora" id="hora" required maxlength="5" placeholder="__:__">
                    </div>                    

                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Diagnóstico</label>
                        <textarea name="diagnosis" id="validationCustom03" class="form-control textarea" maxlength="500" placeholder="Preencha com uma breve descrição" rows="5" required></textarea>
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
</script>