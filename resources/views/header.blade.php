<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <img id="logo" src="https://img.icons8.com/ios-filled/50/000000/s-symbol.png"/>
            <span class="fs-4">Santa Cruz</span>
        </a>
        @php
            $route = Route::getFacadeRoot()->current()->uri();;
        @endphp
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto menu">
            <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'appointment']) href="{{ url('appointment') }}">Consultas</a>
            <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'patient']) href="{{ url('patient') }}">Pacientes</a>
            <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'withdraw']) href="{{ url('withdraw') }}">Retiradas</a>
        </nav>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto menu">
            <!-- <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'nurse']) href="{{ url('nurse') }}">Enfermeiros</a> -->
            <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'exam']) href="{{ url('exam') }}">Exames</a>
            <!-- <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'medic']) href="{{ url('medic') }}">Médicos</a> -->
            <!-- <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'receptionist']) href="{{ url('receptionist') }}">Receptionistas</a> -->
            <a class="dropdown">
                <a @class(['dropdown-toggle', 'me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'medic' || $route == 'receptionist' || $route == 'nurse'])
                 href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Funcionários
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ url('nurse') }}">Enfermeiros</a></li>
                    <li><a class="dropdown-item" href="{{ url('medic') }}">Médicos</a></li>
                    <li><a class="dropdown-item" href="{{ url('receptionist') }}">Recepcionistas</a></li>
                </ul>
            </a>

             <a @class(['me-3', 'py-2', 'text-decoration-none', 'active' => $route == 'medicament']) href="{{ url('medicament') }}">Medicamentos</a>
                    
        </nav>
        
    </div>
</header>
