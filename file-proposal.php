<?php
include("layout/header-external.php");
?>
    <section id="proposal-page">
        <div class="container">
            <div class="container-fluid">
                <h1>Proposta de Alteração</h1>
                <b>
                    Você tem uma proposta de alteração no Plano Diretor?
                    Basta ler as instruções e preencher o Formulário de Proposta de Alteração do Produto.
                </b>
                <p>
                    Os Produtos estão disponíveis no site na aba “Fases” devem ser usados para orientar
                    a proposta de alteração.
                    Para que a proposta seja aceita e levada para análise, é necessário que todas as informações sejam
                    preenchidas corretamente, com o número do Produto, Capítulo, Subcapítulo e Página onde se deseja
                    incluir a proposta de alteração.
                    É importante preencher o formulário de maneira que a proposta de alteração tenha justificativa
                    coerente e aceitável. Se for necessário, é possível anexar documentos para auxiliar na ilustração da
                    proposta.
                </p>
                <p><b>Atenção!</b> Este formulário é para proposta de alteração de produtos que já foram lançados no
                    site.</p>

                <form enctype="multipart/form-data" id="myform" method="post">
                    <input type="hidden" name="planName" value="Plano Diretor - Éloi Mendes" id="planName"/>
                    <input type="hidden" name="plan" value="PD/EM" id="plan"/>
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Nome</label>
                            <div class="col-md-9 col-xl-8">
                                <input type="text" class="form-control input-proposal" name="name" placeholder="Nome"
                                       id="name">
                                <div id="error-name"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <input type="email" class="form-control input-proposal" name="email" placeholder="Email"
                                       id="email">
                                <div id="error-email"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Telefone</label>
                            <div class="col-md-9 col-xl-8">
                                <input id="phone" name="phone" type="text" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"
                                       placeholder="Telefone" class="form-control input-proposal">
                                <script type="text/javascript">$("#phone").mask("(00) 0000-00009");</script>
                                <div id="error-phone"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Representação de Entidade
                                Civil:</label>
                            <div class="col-md-9 col-xl-8">
                                <input id="entity" type="text" class="form-control input-proposal" name="entity"
                                       placeholder="Entidade Civil. Exemplo: OAB (Ordem Brasileira dos Advogados), Sindicato dos Produtores Rurais, etc.">
                                <div id="error-entity"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Tipo de Proposta:</label>
                            <div class="col-md-9 col-xl-8">
                                <select class="form-control input-proposal" name="proptype" id="proptype">
                                    <option value="">Selecione um tipo</option>
                                    <option value="Aditiva">Aditiva</option>
                                    <option value="Gramatical">Gramatical</option>
                                    <option value="Modificativa">Modificativa</option>
                                    <option value="Redação">Redação</option>
                                    <option value="Supressiva">Supressiva</option>
                                </select>
                                <div id="error-proptype"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Produto:</label>
                            <div class="col-md-9 col-xl-8">
                                <select class="form-control input-proposal" name="product" id="product">
                                    <option value="1">Produto 1</option>
                                    <option value="2">Produto 2</option>
                                    <option value="3">Produto 3</option>
                                    <option value="4">Produto 4</option>
                                    <option value="5">Produto 5</option>
                                    <option value="6">Produto 6</option>
                                    <option value="7">Produto 7</option>
                                    <option value="8">Produto 8</option>
                                    <option value="9">Produto 9</option>
                                    <option value="10">Produto 10</option>
                                </select>
                                <div id="error-product"></div>
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label class="col-form-label text-md-right col-md-2">Capítulo:</label>
                            <div class="col-md-9 col-xl-8">
                                <input id="chapter" type="number" class="form-control input-proposal" name="chapter"
                                       value="0" placeholder="Capítulo" min="1">
                                <div id="error-chapter"></div>
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label class="col-form-label text-md-right col-md-2">Sub capítulo:</label>
                            <div class="col-md-9 col-xl-8">
                                <input id="subchapter" type="number" class="form-control input-proposal"
                                       name="subchapter" value="0"
                                       placeholder="Sub Capítulo">
                                <div id="error-subchapter"></div>
                            </div>
                        </div>
                        <div class="form-group row" style="display: none;">
                            <label class="col-form-label text-md-right col-md-2">Página:</label>
                            <div class="col-md-9 col-xl-8">
                                <input class="form-control input-proposal" type="number" name="page" value="0" id="page"
                                       placeholder="Página">
                                <div id="error-page"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Texto da Proposta:</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea name="text" class="form-control input-proposal" id="text"></textarea>
                                <div id="error-text"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Justificativa:</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea name="justify" class="form-control input-proposal" id="justify"></textarea>
                                <div id="error-justify"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-2">Arquivo:</label>
                            <div class="col-md-9 col-xl-8">
                                <input class="form-control-file input-proposal input-file-proposal" id="path"
                                       name="path" type="file">
                                <div id="error-path"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row center-align">
                        <input id="formSubmitBtn" type="submit" name="submit" class="btn btn-submit-proposal" value="Enviar Proposta">
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
include("layout/footer.php");