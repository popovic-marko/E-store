<?php
$title = 'Show telefona';
ob_start();
?>


<div class="container-fluid">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-5">
                  <!--  <img src="http://placehold.it/350x260" alt=""></img> -->
                  <img src="/view/resources/<?=$telefon->getModel();?>.jpg" alt=""></img>
                </div>
                <div class="col-md-7">
                    <div class="product-title"><?= $telefon->getProizvodjac() . ' ' . $telefon->getModel(); ?></div>
                    <br>
                    <div class="product-price"><?= $telefon->getCena(); ?> €</div>
                    <hr>
                    <div class="product-stock">
                        Status:
                        <?php if($telefon->getKolicina() > 0) { ?>
                            <span class="product-stock-status-green">U ponudi</span>
                        <?php } else {?>
                            <span class="product-stock-status-red">Nema na stanju</span>
                        <?php }?>

                    </div>
                    <hr>
                    <form action="/kontakt" method="post" class="form-inline">
                        <div class="btn-group cart">
                            <?php if($telefon->getKolicina() > 0) { ?>
                                <input type="hidden" name="id" value="<?=$telefon->getId()?>">
                                <input type="hidden" name="proizvodjac" value="<?=$telefon->getProizvodjac()?>">
                                <input type="hidden" name="model" value="<?=$telefon->getModel()?>">
                                <input type="hidden" name="cena" value="<?=$telefon->getCena()?>">
                                <button type="submit" class="naruci btn btn-success">Naruči</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 product-info">
                <ul id="myTab" class="nav nav-tabs nav_tabs">

                    <li class="active"><a href="#service-one" data-toggle="tab">SPECIFIKACIJA</a></li>
                    <li><a href="#service-two" data-toggle="tab">DODATNI OPIS</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">

                        <section class="container product-info">

                            <div class="row" style="padding-left: 1.5%;">
                                <table class="table table-bordered" style="font-size: small;">
                                    <tbody>
                                    <tr>
                                        <td class="col-md-3"><strong>Proizvođač:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getProizvodjac(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Model:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getModel(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Ekran:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getEkran(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Kamera:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getKamera(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Procesor:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getProcesor(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Operativni sistem:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getOs(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><strong>Memorija:</strong></td>
                                        <td class="col-md-7"><?= $telefon->getMemorija(); ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </section>

                    </div>
                    <div class="tab-pane fade" id="service-two">

                        <section class="container">
                            <br>
                            <?= $telefon->getDodatniOpis(); ?>
                        </section>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
ob_start();
?>

<style>
    .product>img{
        max-width: 230px;
    }

    .product-title{
        font-size: 20px;
    }

    .product-price{
        font-size: 22px;
    }

    .product-stock {
        font-size: 20px;
    }

    .product-stock-status-green{
        color: #74DF00;
        margin-top: 10px;
    }

    .product-stock-status-red{
        color: #FF0000;
        margin-top: 10px;
    }

    .product-info{
        margin-top: 50px;
    }

    .content-wrapper {
        max-width: 1140px;
        background: #fff;
        margin: 0 auto;
        margin-top: 25px;
        margin-bottom: 10px;
        border: 0px;
        border-radius: 0px;
    }

    .container-fluid{
        max-width: 1140px;
        margin: 0 auto;
    }

    .container {
        padding-left: 0px;
        padding-right: 0px;
        max-width: 100%;
    }

    .table{
        background-color:#fff;
        box-shadow:0px 2px 2px #aaa;
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
ob_start();
?>

<script>
    $(document).ready(function () {

    });
</script>

<?php
$js = ob_get_clean();

include ROOT . 'view/layout.php';
?>
