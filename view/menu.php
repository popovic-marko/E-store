<style>
    @media (min-width: 768px) {
        .navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }
        .navbar {
            padding: 20px;
        }
    }

    .dropdown-menu {
        border-radius: 0px;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
        margin-left: -1px;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .dropdown-submenu:hover > .dropdown-menu {
        display: block;
    }

    .dropdown-submenu > a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover > a:after {
        border-left-color: #fff;
    }
    li .dropdown-submenu.active > a{
        background: rgb(217, 217, 217) !important;
        color: rgb(51, 51, 51);
    }
    .dropdown-menu li.active > a {
        background: rgb(217, 217, 217) !important;
        color: rgb(51, 51, 51);
    }
</style>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Phone store</a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-center">
            <li><a href="/">Početna</a></li>
            <li><a href="/vesti/">Novosti</a></li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proizvodi <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mobilni telefoni</a>
                        <ul class="dropdown-menu">
                            <li><a href="/telefoni/">Prikaz svih</a></li>
                            <li><a href="/unosTelefona/">Unos novog</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>