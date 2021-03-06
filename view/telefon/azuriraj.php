<?php
$title = 'Azuriranje telefona';
ob_start();
?>

<div class="container">
    <h2>Ažuriranje telefona</h2>

    <div style="padding-top: 5%">
        <form class="form-horizontal" enctype="multipart/form-data" action="#" method="post">
            <input type="hidden" name="id" value="<?=$telefon->getId();?>">
            <div class="form-group">
                <label class="control-label col-md-3">Proizvođač</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="proizvodjac" maxlength="20" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getProizvodjac();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Cena</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="cena" maxlength="4"
                           pattern="[0-9]{2,4}" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getCena();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Model</label>
                <div class="col-md-5">
                    <input id="model" type="text" class="form-control" name="model" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getModel();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Ekran</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="ekran" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getEkran();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Kamera</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="kamera" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getKamera();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Procesor</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="procesor" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getProcesor();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Operativni sistem</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="os" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getOs();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Interna memorija</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="memorija" maxlength="30" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getMemorija();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Količina</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="kolicina" maxlength="4"
                           pattern="[0-9]{1,4}" required
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getKolicina();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Dodatni opis</label>
                <div class="col-md-5">
                    <textarea cols="63" rows="5" name="dodatniOpis" maxlength="255"><?php if(isset($telefon)) {
                            echo $telefon->getDodatniOpis();
                        } ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Slika</label>
                <div class="col-md-5">
                    <input name="file" type="file" accept=".jpg">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-offset-3 col-md-4">
                    <button type="submit" class="btn btn-basic">Unesi</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php
$content = ob_get_clean();
ob_start();
?>

<style>
    h2 {
        text-align: center;
        color: gray;
    }

    form {
        color: gray;
        padding-bottom: 5%;
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
