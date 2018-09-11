<?php
$title = 'Vesti';
ob_start();
?>
<div class="vestDiv">
    <h1><?=$vest->getNaslov()?></h1>
    <br />
    <?php if($vest->getNazivSlike() != '/') { ?>
        <img id="img" src="/view/resources/<?=$vest->getNazivSlike();?>" alt="img" class="pull-left img-responsive postImg img-thumbnail margin10">
        <!--<img src="http://joern-duwe.de/aquaristik/images/skalare00.jpg" alt="post img" class="pull-left img-responsive postImg img-thumbnail margin10">-->
    <?php } ?>
    <article>
        <p><?=$vest->getTekst()?></p>
    </article>
</div>
<?php
$content = ob_get_clean();
ob_start();
?>

<style>
    .vestDiv
    {
        margin-top: 5%;
        margin-left:10%;
        margin-right:10%;
        margin-bottom:10%
    }
    #img
    {
        border: 0;
    }
    footer
    {
        background: lightgray;
        color: dimgrey;
        padding:30px 0 20px 0;
    }
    .copy
    {
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
