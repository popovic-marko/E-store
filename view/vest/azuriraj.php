<?php
$title = 'Ažuriranje vesti';
ob_start();
?>

<div class="wrapper">
<div class="container">
    <h2>Ažuriranje vesti</h2>

    <div style="padding-top: 5%">
        <form class="form-horizontal" enctype="multipart/form-data" action="#" method="post">
            <input name="id"
                   value="<?php if(isset($vest)) {
                       echo $vest->getId();
                   } ?>" hidden>
            <div class="form-group">
            <input name="nazivSlike"
                   value="<?php if(isset($vest)) {
                            echo $vest->getNazivSlike();
                        } ?>" hidden>
            <div class="form-group">
                <label class="control-label col-md-3">Naslov</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="naslov" maxlength="100" required
                           value="<?php if(isset($vest)) {
                               echo $vest->getNaslov();
                           } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Tekst</label>
                <div class="col-md-5">
                    <textarea cols="63" rows="10" name="tekst" maxlength="2000"><?php if(isset($vest)) {
                            echo str_replace('<br />', '', $vest->getTekst());
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
