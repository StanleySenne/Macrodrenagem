    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="h-footer">Realização:</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 text-center">
                    <a target="_blank" href="https://www.campodomeio.mg.gov.br/home/"><img src="resources/images/sl_brasao.jpg" class="img img-footer-1" alt="Prefeitura"></a>
                </div>
                <div class="col-sm-3 text-center">
                    <a target="_blank" href="http://www.neiru.org/"><img src="resources/images/neiru.png" class="img img-footer-2" alt="Neiru"></a>
                </div>
                <div class="col-sm-3 text-center">
                    <a target="_blank" href="https://www.fupai.com.br/"><img src="resources/images/fupai.png" class="img img-footer-3" alt="Fupai"></a>
                </div>
                <div class="col-sm-3 text-center">
                    <a target="_blank" href="https://unifei.edu.br/"><img src="resources/images/unifei.png" class="img img-footer-4" alt="Unifei"></a>
                </div>
            </div>
        </div>
    </footer>
    <div class="text-center">
        © 2020 - Desenvolvido e mantido por NEIRU
    </div>
<script>
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("menu-side-dash").style.display = "block";
        } else {
            document.getElementById("menu-side-dash").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    function scrollNav() {
        $('nav a').click(function () {
            //Toggle Class
            $("#menu-side .active").removeClass("active");
            $(this).closest('li').addClass("active");
            $(this).closest('li').children('a').addClass("active");
            //Animate
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top - 50
            }, 400);
            return false;
        });
    }

    scrollNav();
</script>
</body>
</html>