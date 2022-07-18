<?php
include("layout/header-external.php");
?>
    <section id="oficial-docs-page">
        <h1>Documentos <p class="font-rage">Oficiais</p></h1>
        <div class="row">
            <div class="col-sm-12">
                <p class="p-white">Tenha acesso a todos os documentos oficiais (Versões prévias, Justificadas, Oficiais,
                    Memoriais Técnicos e Produtos) de Plano Diretor Participativo.</p>
            </div>
        </div>
        <div class="row margin-bottom-20 margin-top-10">
            <div class="col-sm-6 col-sm-offset-3">
                <img class="img" src="./resources/images/docs-image.png" alt="docs">
            </div>
        </div>
        <!--  INÍCIO MENU FILTER   -->
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar">
                    <div class="mini-submenu">
                        <i class="glyphicon glyphicon-filter"></i>
                    </div>
                    <div class="list-group menu_filtro">
                        <div class="head_filtro list-group-item active">
                            Filtrar por
                            <span class="pull-right" id="slide-submenu">
                                <i class="glyphicon glyphicon-remove"></i>
                            </span>
                        </div>
                        <div class="text-center">
                            <h4 class="black_steps">Fases</h4>
                            <hr class="no-margin">
                        </div>
                        <div class="body_filtro">
                            <div class="steps">
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Fase 1</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Fase 1" name="fase-1" id="fase-1">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Fase 2</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Fase 2" name="fase-2" id="fase-2">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Fase 3</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Fase 3" name="fase-3" id="fase-3">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Fase 4</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Fase 4" name="fase-4" id="fase-4">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <hr class="no-margin">
                                <h4 class="black_steps">Categorias</h4>
                                <hr class="no-margin">
                            </div>
                            <div class="tags">
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Versão Prévia</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Versão Prévia" name="versao-previa"
                                                   id="versao-previa">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Versão Justificada</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Versão Justificada"
                                                   name="versao-justificada" id="versao-justificada">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10 margin-bottom-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>Versão Oficial</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="Versão Oficial" name="versao-oficial"
                                                   id="versao-oficial">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top-10 margin-bottom-10">
                                    <div class="col-xs-7 col-xs-offset-1">
                                        <span>MTACs</span>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="switch">
                                            <input type="checkbox" data-name="MTACs" name="mtac" id="mtac">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center margin-bottom-10">
                                <a class="btn btn-primary menu-nav-link" onclick="filter('#documents')">Filtrar</a>
                                <a class="btn btn-default menu-nav-link" onclick="clearFilters('#documents')">Limpar
                                    Filtros</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  FIM MENU FILTER   -->
        <div class="row margin-top-10">
            <div class="col-sm-12">
                <h5>Filtros</h5>
                <div class="filters-applied">
                </div>
            </div>
        </div>

        <!--Bloco para mostrar os documentos-->
        <div id="documents">
        </div>
    </section>
    <script src="js/oficial-docs.js"></script>
    <script>
        window.onload = function () {
            loadSteps();
            sortSteps();
        };
    </script>
<?php
include("layout/footer.php");