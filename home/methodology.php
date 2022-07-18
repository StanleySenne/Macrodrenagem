<style>
    .phases:hover {
        cursor: pointer;
    }
</style>
<section class="gray-session" style="box-shadow: unset !important;">
    <div class="">
        <h1 class="text-center padding-bottom-15px">Onde estamos?</h1>
        <div class="col-xs-4">
            <div class="table-methodology-content"><h4 title="Ver detalhes!" onclick="goPhasesPage('fase-1')"
                                                       style="text-decoration: none"
                                                       data-phase="phase1"
                                                       class="phases methodology-marker">Planejamento</h4></div>
            <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="goPhasesPage('fase-1')"
                                                   style="text-decoration: none"
                                                   data-phase="phase1"
                                                   class="phases methodology-marker"><i id="marker-phase-1"
                                                                                        class="fa fa-map-marker"
                                                                                        aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="table-methodology-content"><h4 title="Ver detalhes!" onclick="goPhasesPage('fase-2')"
                                                       style="text-decoration: none"
                                                       data-phase="phase2"
                                                       class="phases methodology-marker">Execução</h4></div>
            <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="goPhasesPage('fase-2')"
                                                   style="text-decoration: none"
                                                   data-phase="phase2"
                                                   class="phases methodology-marker"><i id="marker-phase-2"
                                                                                        class="fa fa-map-marker"
                                                                                        aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="table-methodology-content"><h4 title="Ver detalhes!" onclick="goPhasesPage('fase-3')"
                                                       style="text-decoration: none"
                                                       data-phase="phase3"
                                                       class="phases methodology-marker">Consolidação</h4></div>
            <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="goPhasesPage('fase-3')"
                                                   style="text-decoration: none"
                                                   data-phase="phase3"
                                                   class="phases methodology-marker"><i id="marker-phase-3"
                                                                                        class="fa fa-map-marker"
                                                                                        aria-hidden="true"></i></a>
            </div>
        </div>
        
        </div>
        <svg id="svg-browser" style="height: 1%;width: 100%">
            <line id="gray-line" x1="12.5%" y1="0" x2="87.5%" y2="0"/>
        </svg>
        <div>
            <div class="col-xs-3">
                <div class="center-align">
                    <p id="we-are-here-1" class="padding-top-5 here-indicator" style="color: black">Estamos
                        Aqui!!!</p>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="center-align">
                    <p id="we-are-here-2" hidden class="padding-top-5 here-indicator" style="color: black">Estamos
                        Aqui!!!</p>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="center-align">
                    <p id="we-are-here-3" hidden class="padding-top-5 here-indicator" style="color: black">Estamos
                        Aqui!!!</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<script src="js/hearing.js"></script>

<script>
    function goPhasesPage(data) {
        window.location.href = 'phases.php?' + data;
    }

    function showActualPhase() {
        let phase = "phase 1"
        switch (phase) {
            case "phase 1":
                // $('#green-line')[0].setAttribute('x2', '12.5%')
                $('#marker-phase-1')[0].classList.add('methodology-active-marker')
                $('#marker-phase-2')[0].classList.add('methodology-todo-marker')
                $('#marker-phase-3')[0].classList.add('methodology-todo-marker')
                
                break
            case "phase 2":
                // $('#green-line')[0].setAttribute('x2', '37.5%')
                $('#marker-phase-1')[0].classList.add('methodology-done-marker')
                $('#marker-phase-2')[0].classList.add('methodology-active-marker')
                $('#marker-phase-3')[0].classList.add('methodology-todo-marker')
                
                break
            case "phase 3":
                // $('#green-line')[0].setAttribute('x2', '62.5%')
                $('#marker-phase-1')[0].classList.add('methodology-done-marker')
                $('#marker-phase-2')[0].classList.add('methodology-done-marker')
                $('#marker-phase-3')[0].classList.add('methodology-active-marker')
                
                break
        }
    }

    window.onload = function () {
        loadLastHearing();
        loadBanner();
        showActualPhase();
    };
</script>