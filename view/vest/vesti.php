<?php
$title = 'Novosti';
ob_start();
?>

<h2>Novosti</h2>

<?php if (empty($vesti)) { ?>
    <p class="vest h4">Trenutno ne postoji ni jedna novost.</p>
<?php } ?>

<div class="news-wrapper">
    <div class="row col-md-offset-2">
        <button type="button" class="add btn btn-default">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;Dodajte novu vest
        </button>
    </div>
    <?php foreach ($vesti as $vest) { ?>
        <div class="row vestDiv">
            <div class="naslovVesti col-md-offset-2  col-md-7">
                <p><h4><a href="/prikaziVest?id=<?=$vest->getId()?>"><?=$vest->getNaslov()?></a></h4></p>
                <p><?=substr(strip_tags($vest->getTekst()), 0, 50) . '...'; ?></p>
            </div>
            <div class="col-md-2">
                <button data-id="<?=$vest->getId()?>"
                        class="edit btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil" title="Izmeni"></span>
                </button>
                <button data-id="<?=$vest->getId()?>"
                        class="delete btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-trash" title="Obrisi"></span>
                </button>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Potvrda brisanja vesti</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
                <button type="button" class="delete-confirmed btn btn-primary">Da</button>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>

<?php
$content = ob_get_clean();
ob_start();
?>

<style>
    h2
    {
        text-align: center;
        color: gray;
        margin-top: 3%;
    }

    a, a:hover
    {
        text-decoration: none;
        color: #424242;
    }

    .vest
    {
        padding-top: 1%;
        text-align: center;
    }

    .vestDiv
    {
        padding-top: 2%;
    }

    .naslovVesti
    {
        background-color: #E6E6E6;
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
        $('.add').on('click', function() {
            window.location = '/unosVesti/';
        });

        $('.edit').on('click', function () {
            var id = $(this).attr('data-id');
            window.location = '/azurirajVest?id=' + id;
        });

        $('.delete').on('click', function () {
            var id = $(this).attr('data-id');
            var modal = $('#myModal');
            modal.find('.modal-body').text('Da li ste sigurni da želite da obrišete vest?');
            modal.find('.delete-confirmed').attr('data-id', id);
            modal.modal('show');
        });

        $('.delete-confirmed').on('click', function () {
            $.post('/obrisiVest/', {id: $(this).attr('data-id')}, function () {
                window.location = '/vesti/';
            });
        });
    });
</script>

<?php
$js = ob_get_clean();

include ROOT . 'view/layout.php';
?>
