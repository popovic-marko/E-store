<?php
$title = 'Phone store';
ob_start();
?>

<section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="view/resources/samsung-naslovna.jpg" alt="Samsung Galaxy S8">
            </div>
            <div class="item">
                <img src="view/resources/iphone-naslovna.jpg" alt="Apple iPhone 7">
            </div>
        </div>
    </div>
</section>

<section class="separatedSection">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>&nbsp&nbspNajskuplji proizvodi</h3>
            </div>
        </div>
        <?php foreach ($najSkuplji as $telefon) { ?>
            <div class="col-md-3 col-xs-6">
                <div class="col-item">
                    <div class="photo">
                        <img src="/view/resources/<?=$telefon->getModel()?>.jpg" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-8">
                                <h4><?= $telefon->getProizvodjac() . ' ' . $telefon->getModel(); ?></h4>
                                <h4 class="price-text-color"><?= $telefon->getCena(); ?> €</h4>
                            </div>
                        </div>
                        <br>
                        <div class="separator">
                            <p>
                                <a href="/prikaziTelefon.php?id=<?= $telefon->getId(); ?>">
                                    Više detalja <span class="glyphicon glyphicon-search"></span></a>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


    <section class="separatedSection">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3>&nbsp&nbspNajjeftiniji proizvodi</h3>
                </div>
            </div>
            <?php foreach ($najJefitniji as $telefon) { ?>
                <div class="col-md-3 col-xs-6">
                    <div class="col-item">
                        <div class="photo">
                            <img src="/view/resources/<?=$telefon->getModel()?>.jpg" class="img-responsive" alt="a" />
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-8">
                                    <h4><?= $telefon->getProizvodjac() . ' ' . $telefon->getModel(); ?></h4>
                                    <h4 class="price-text-color"><?= $telefon->getCena(); ?> €</h4>
                                </div>
                            </div>
                            <br>
                            <div class="separator">
                                <p>
                                    <a href="/prikaziTelefon.php?id=<?= $telefon->getId(); ?>">Više detalja <span class="glyphicon glyphicon-search"></span></a>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

<br><br><br><br><br><br><br><br>

<?php
$content = ob_get_clean();
ob_start();
?>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height:100px;
        }
        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
        #myCarousel {
            z-index: -1;
        }

        .col-item
        {
            border: 1px solid #E1E1E1;
            border-radius: 5px;
            background: #FFF;
        }
        .col-item .photo img
        {
            margin: 0 auto;
            width: 100%;
        }

        .col-item .info
        {
            padding: 10px;
            border-radius: 0 0 5px 5px;
            margin-top: 1px;
        }

        .col-item:hover .info {
            background-color: #F5F5DC;
        }
        .col-item .price
        {
            /*width: 50%;*/
            float: left;
            margin-top: 5px;
        }

        .col-item .price h5
        {
            line-height: 20px;
            margin: 0;
        }

        .price-text-color
        {
            color: #219FD1;
        }

        .col-item .separator
        {
            border-top: 1px solid #E1E1E1;
        }

        .col-item .separator p
        {
            line-height: 20px;
            margin-bottom: 0;
            margin-top: 10px;
            text-align: center;
        }

        .separatedSection {
            padding-top: 3%;
        }

        footer{
            background: lightgray;
            color: dimgrey;
            padding:30px 0 20px 0;
        }
        .copy {
            padding-top: 25%;
        }
    </style>
<?php
$css = ob_get_clean();

include ROOT . 'view/layout.php';
?>