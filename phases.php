<?php
include("layout/header-external.php");
?>
    <section class="phases-section">
        <div class="container" style="background-color: #FFFFFF">
            <div class="phases-content">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="table-methodology-content">
                            <h4 title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-1')"
                                style="text-decoration: none; cursor:hand"
                                data-phase="phase1"
                                class="phases methodology-marker">Planejamento
                                <br>
                                <p class="center-align" style="font-size: 10px; margin-bottom: unset">(Em andamento)</p>
                            </h4>
                        </div>
                        <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-1')"
                                                               style="text-decoration: none; cursor:hand"
                                                               data-phase="phase1"
                                                               class="phases methodology-marker"><i id="marker-phase-1"
                                                                                                    class="fa fa-map-marker"
                                                                                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="table-methodology-content">
                            <h4 title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-2')"
                                style="text-decoration: none; cursor:hand"
                                data-phase="phase2"
                                class="phases methodology-marker">Execução
                                <br>
                                <p class="center-align" style="font-size: 10px; margin-bottom: unset">(A fazer)</p>
                            </h4>
                        </div>
                        <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-2')"
                                                               style="text-decoration: none; cursor:hand"
                                                               data-phase="phase2"
                                                               class="phases methodology-marker"><i id="marker-phase-2"
                                                                                                    class="fa fa-map-marker"
                                                                                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="table-methodology-content">
                            <h4 title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-3')"
                                style="text-decoration: none; cursor:hand"
                                data-phase="phase3"
                                class="phases methodology-marker">Consolidação
                                <br>
                                <p class="center-align" style="font-size: 10px; margin-bottom: unset">(A fazer)</p>
                            </h4>
                        </div>
                        <div class="table-methodology-icon"><a title="Ver detalhes!" onclick="loadPhaseAndDoc('fase-3')"
                                                               style="text-decoration: none; cursor:hand"
                                                               data-phase="phase3"
                                                               class="phases methodology-marker"><i id="marker-phase-3"
                                                                                                    class="fa fa-map-marker"
                                                                                                    aria-hidden="true"></i></a>
                        </div>
                    
                    
                </div>
                <svg id="svg-browser-phases" style="height: 1%;width: 100%;">
                        <line id="gray-line" x1="12.5%" y1="0" x2="87.5%" y2="0"/>
                    </svg>
                <div class="description-area" style="display: none">
                    <!-- Tab panes -->
                    <div class="tab-content ofical-docs-text"></div>
                </div>
            </div>
            <div class="div-docs" style="display: none">
                <div class="fase-title">Documentos Oficiais</div>

                <!--Bloco para mostrar os documentos-->
                <div id="documents">
                </div>
            </div>
            <div id="loading-doc-div" style="min-height: 50vh"></div>
        </div>
    </section>

    <script src="js/phases.js"></script>
    <script src="js/oficial-docs.js"></script>
    <script>

        function loadPhaseAndDoc(data) {
            changeStep(data);
        }

        function changeStep(step) {
            if (step == 'fase-1') {
                $(`#fase-1`).show(500);
                $(`#fase-2`).hide(500);
                $(`#fase-3`).hide(500);
                
                $(`#documents .fase-1`).show(500);
                $(`#documents .fase-2`).hide(500);
                $(`#documents .fase-3`).hide(500);
                
            } else {
                if (step == 'fase-2') {
                    $(`#fase-1`).hide(500);
                    $(`#fase-2`).show(500);
                    $(`#fase-3`).hide(500);
                    
                    $(`#documents .fase-1`).hide(500);
                    $(`#documents .fase-2`).show(500);
                    $(`#documents .fase-3`).hide(500);
                    
                } else {
                    if (step == 'fase-3') {
                        $(`#fase-1`).hide(500);
                        $(`#fase-2`).hide(500);
                        $(`#fase-3`).show(500);
                        
                        $(`#documents .fase-1`).hide(500);
                        $(`#documents .fase-2`).hide(500);
                        $(`#documents .fase-3`).show(500);
                        
                    } else {
                        $(`#fase-1`).hide(500);
                        $(`#fase-2`).hide(500);
                        $(`#fase-3`).hide(500);
                        
                        $(`#documents .fase-1`).hide(500);
                        $(`#documents .fase-2`).hide(500);
                        $(`#documents .fase-3`).hide(500);
                        
                    }
                }
            }
        }

        async function treatAPI() {
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
                case "phase 4":
                    // $('#green-line')[0].setAttribute('x2', '87.5%')
                    $('#marker-phase-1')[0].classList.add('methodology-done-marker')
                    $('#marker-phase-2')[0].classList.add('methodology-done-marker')
                    $('#marker-phase-3')[0].classList.add('methodology-done-marker')
                    
                    break
            }
            var step = location.search.slice(1);
            changeStep(step);
            $('.description-area').show();
            $('.div-docs').show();
            $('#loading-doc-div').hide();
        }

        window.onload = async function () {
            await loadPhases();
            await loadSteps();
            await treatAPI();
        };
    </script>
<?php
include("layout/footer.php");