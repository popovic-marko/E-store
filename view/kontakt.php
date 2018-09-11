<?php
$title = 'Kontakt';
ob_start();
?>

<div class="container">
    <h2>Porudžbina</h2>

    <div style="padding-top: 5%">
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label class="control-label col-md-4">Proizvođač</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="proizvodjac" readonly
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getProizvodjac();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Model</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="model" readonly
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getModel();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Ukupno</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="ukupno" readonly
                           value="<?php if(isset($telefon)) {
                               echo $telefon->getCena();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Količina</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="kolicina" maxlength="4"  required
                           pattern="[1-9]{1,4}" value="1">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Ime</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="ime" maxlength="50" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Prezime</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="prezime" maxlength="50" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">E-mail</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" name="e-mail" maxlength="50" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Adresa</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="adresa" maxlength="200" required>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn btn-basic">Pošalji</button>
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
        var cena = $('input[name=ukupno]').val();
        $('input[name=kolicina]').change(function() {
           var vrednost = $('input[name=kolicina]').val();
            if($.isNumeric(vrednost)) {
                $('input[name=ukupno]').val(cena * vrednost);
            } else {
                $('input[name=kolicina]').val(1);
                $('input[name=ukupno]').val(cena);
                alert('Morate uneti broj');
            }
        });
    });
</script>

<?php
$js = ob_get_clean();

include ROOT . 'view/layout.php';
?>
