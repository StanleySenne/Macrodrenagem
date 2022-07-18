<section id="contact" class="padding-15">
    <div class="container">
        <div class="row">
            <h1 class="text-center text-black">Contato</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="text-black text-justify">
                    Em caso de dúvidas e/ou sugestões, fale conosco através do formulário abaixo:
                </p>
                <div class="form-horizontal" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input id="name" name="name" type="text" placeholder="Nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="phone" name="phone" type="text" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"
                                   placeholder="Telefone" class="form-control">
                            <script type="text/javascript">$("#phone").mask("(00) 0000-00009");</script>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="Mensagem"
                                  rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-sitekey="6LfrfuoUAAAAAOJdBbc7KpuWfqgdwE9FjLWGOdma"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <a class="btn btn-contact" onclick="eventClick(this); sendContact();"
                                   data-name="contact">Enviar</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 alert contact-response" style="display: none" role="alert">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6 container">
                <div class="row blue-session">
                    <h5 class="text-black">Pela internet:</h5>
                    <p class="text-black">Você pode enviar um e-mail com sua sugestão para
                        <b>planomacrodrenagem.saolourenco@neiru.org</b> ou através
                        do formulário.</p>
                </div>
                <div class="row blue-session">
                    <h5 class="text-black">Por telefone:</h5>
                    <p class="text-black">Você pode tirar suas dúvidas ou registrar sua sugestão pelo número <b>(35)
                            9999-9999</b></p>
                </div>
                <div class="row blue-session">
                    <h5 class="text-black">Pessoalmente:</h5>
                    <p class="text-black">Compareça a <b>Prefeitura Municipal de São Lourenço (Praça Duque de Caxias, 61 )</b>, obtenha mais informações e registre sua sugestão.</p>
                </div>
            </div>
        </div>
    </div>
</section>