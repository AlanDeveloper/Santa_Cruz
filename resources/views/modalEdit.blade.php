<div class="modal fade" id="modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulário de atualização</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3 needs-validation" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Nome completo</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" maxlength="100" placeholder="Preencha com seu nome" required>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" name="email" class="form-control" id="validationCustomUsername" maxlength="100" aria-describedby="inputGroupPrepend" placeholder="example@example.com" @if ($type != 'patient') required @endif>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control cpf-mask" id="validationCustom03" maxlength="14" placeholder="XXX.XXX.XXX-XX" data-mask="000.000.000-00" required>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom05" class="form-label">Endereço</label>
                        <input type="text" name="address" class="form-control" id="validationCustom05" maxlength="100" placeholder="Preencha com seu endereço" required>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom06" class="form-label">Telefone</label>
                        <input type="text" name="telephone" class="form-control tel-mask" id="validationCustom06" maxlength="14" placeholder="(XX)XXXXX-XXXX" @if ($type != 'patient') required @endif>
                        <div class="invalid-feedback">
                            É necessário preencher o campo corretamente!
                        </div>
                    </div>

                    @if ($type == 'patient')

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Data de nascimento</label>
                            <input type="date" name="birth_date" class="form-control" id="validationCustom07" placeholder="Preencha com sua data de nascimento" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                    @endif

                    @if ($type == 'medic')
                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Especialiade</label>
                            <input type="text" name="speciality" class="form-control" id="validationCustom08" maxlength="50" placeholder="Preencha com sua especialiade" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">CRM</label>
                            <input type="text" name="crm" class="form-control" id="validationCustom07" maxlength="10" placeholder="Preencha com seu CRM" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                    @endif

                    @if ($type == 'receptionist')
                        <div class="col-md-6">
                            <label for="validationCustom06" class="form-label">Conhecimentos</label>
                            <input type="text" name="knowledge" class="form-control" id="validationCustom06" maxlength="500" placeholder="Preencha com seus conhecimentos" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Experiência</label>
                            <select multiple class="form-control" name="experience" id="exampleFormControlSelect2">
                                <option value="true">Sim</option>
                                <option value="false">Não</option>
                            </select>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                    @endif

                    @if ($type == 'nurse')
                        <div class="col-md-6">
                            <label for="validationCustom06" class="form-label">Endereço da faculdade</label>
                            <input type="text" name="collegeAddress" class="form-control" id="validationCustom06" maxlength="100" placeholder="Preencha com endereço da faculdade" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Semestre</label>
                            <input type="number" name="semester" class="form-control" id="validationCustom07" maxlength="1" placeholder="Preencha com seu semestre" required>
                            <div class="invalid-feedback">
                                É necessário preencher o campo corretamente!
                            </div>
                        </div>
                    @endif


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function formatCPF(cpf){
        if (cpf.length > 14) cpf = cpf.slice(0, 14);
        cpf = cpf.replace(/[^\d]/g, "");
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

    let inputEdit = document.querySelector('.cpf-mask');
    inputEdit.addEventListener('keyup', e => {
        let res = formatCPF(e.target.value);
        e.target.value = res;
    });

    function formatTEL(tel){
        if (tel.length > 14) tel = tel.slice(0, 14);
        tel = tel.replace(/[^\d]/g, "");
        return tel.replace(/(\d{2})(\d{5})(\d{4})/, "($1)$2-$3");
    }

    inputEdit = document.querySelector('.tel-mask');
    inputEdit.addEventListener('keyup', e => {
        let res = formatTEL(e.target.value);
        e.target.value = res;
    });


    let openModalInputs = document.querySelectorAll('.modalEdit');
    openModalInputs.forEach(i => {
        i.addEventListener('click', (e) => {
            let data = JSON.parse(i.getAttribute('data-bs-content'));
            let inputs = document.querySelectorAll('#modal-editar input');
            document.querySelector('#modal-editar form').setAttribute('ACTION', `${window.location.href}/${data.cpf}`);
            inputs.forEach(inp => {
                for (let key in data) {
                    if (inp.getAttribute('name') === key) {
                        inp.value = data[key];
                    }
                }
            });
        });
    });
</script>