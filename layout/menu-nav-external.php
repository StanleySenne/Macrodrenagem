<nav class="navbar nav-home">
    <ul class="ul-menu">
        <li class="nav-item-menu-img img-plan-logo">
            <a href="./index.php">
                <img alt="logo plano diretor" data-name="img-logo" onclick="eventClick(this)"
                     src="resources/images/logo.png" class="logo-img">
            </a>
        </li>
        <li class="nav-item-menu">
            <a class="menu-nav-link" data-name="about" onclick="eventClick(this)"
               href="./index.php#about">O Plano Diretor</a>
        </li>
        <li class="nav-item-menu">
            <a class="menu-nav-link" data-name="news" onclick="eventClick(this)"
               href="./news.php">Notícias</a>
        </li>
        <li class="nav-item-menu">
            <a class="menu-nav-link" data-name="phases" onclick="eventClick(this)"
               href="./phases.php?fase-1">Fases</a>
        </li>
        <li class="nav-item-menu">
            <a class="menu-nav-link" data-name="participate" onclick="eventClick(this)"
               href="./participate.php">Participe</a>
        </li>
        <li class="nav-item-menu">
            <a class="menu-nav-link" data-name="contact" onclick="eventClick(this)"
               href="./index.php#contact">Contato</a>
        </li>
    </ul>
    <!--    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-links">-->
    <!--        <span class="sr-only">Toggle navigation</span>-->
    <!--        <span class="icon-bar"></span>-->
    <!--        <span class="icon-bar"></span>-->
    <!--        <span class="icon-bar"></span>-->
    <!--    </button>-->
    <div class="container-fluid">
        <a href="#menu-links">
            <div id="menu-side-dash" class="text-center">
                <a class="glyphicon glyphicon-arrow-up" href="#menu-links" onclick="topFunction()"></a>
            </div>
        </a>
    </div>
</nav>