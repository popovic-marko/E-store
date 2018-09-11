<?php
$title = 'Telefoni';
ob_start();
?>

<div class="container">
    <div id="divProizvodjac" class="col-md-3">
        <h4>Izaberite proivođača</h4>
        <div id="checkboxProizvodjac">
            <label><input type="checkbox" value="Samsung"/>&nbsp;<span>Samsung</span></label><br>
            <label><input type="checkbox" value="iPhone"/>&nbsp;<span>iPhone</span></label><br>
            <label><input type="checkbox" value="Sony"/>&nbsp;<span>Sony</span></label><br>
            <label><input type="checkbox" value="Huawei"/>&nbsp;<span>Huawei</span></label><br>
        </div>
    </div>

    <div id="firstLineDiv" class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <h3>Telefoni</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

                <form action="/telefoni" method="post" class="form-inline">
                    <input type="text" class="form-control" name="search"
                           placeholder="Претражите..."/>
                    <button class="searchButton btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <div class="form-group">
                    <select class="kriterijum form-control">
                        <option value="cena-opadajuce" selected="selected">Cena opadajuće</option>
                        <option value="cena-rastuce">Cena rastuće</option>
                        <option value="naziv-AZ">Naziv proizvodjača A-Z</option>
                        <option value="naziv-ZA">Naziv proizvodjača Z-A</option>
                    </select>
                </div>
            </div>
        </div>

        <?php if (empty($telefoni)) { ?>
            <p class="telefon h4">Ne postoji ni jedan telefon za zadati kriterijum.</p>
        <?php } ?>
        <div id="load" class="row" hidden>
            <img id="loadPicture" src="/view/resources/ajax-loader.gif">
        </div>
        <div class="wrapperTelefona">
        <div class="telefoni row" <?php if (empty($telefoni)) echo "hidden"; ?>>
            <?php foreach ($telefoni as $telefon) {    ?>
                <div class="telefon col-md-4 col-xs-6">
                    <div class="col-item">
                        <div class="photo">
                           <!-- <img src="http://placehold.it/350x260" class="img-responsive" alt="a" /> -->
                            <img src="/view/resources/<?=$telefon->getModel()?>.jpg" class="img-responsive" alt="a"/>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="price col-md-12">
                                    <h4><?= $telefon->getProizvodjac() . ' ' . $telefon->getModel(); ?></h4>
                                    <h4 class="price-text-color"><?= $telefon->getCena(); ?> €</h4>
                                </div>
                            </div>
                            <div class="separator clear-left">
                                <p class="btn-add">
                                    <a href="/prikaziTelefon.php?id=<?= $telefon->getId(); ?>">
                                        Više detalja <span class="glyphicon glyphicon-search"></span></a></p>
                                <p class="btn-details" style="text-align: center;">
                                    <a href="/azurirajTelefon.php?id=<?= $telefon->getId(); ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>&nbsp&nbsp&nbsp
                                    <a class="delete" data-id="<?= $telefon->getId(); ?>"
                                                      data-name="<?=$telefon->getModel()?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a></p>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Potvrda brisanja telefona</h4>
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
</div>


<br><br><br><br><br><br><br><br>

<?php
$content = ob_get_clean();
ob_start();
?>

    <style>
        #firstLineDiv
        {
            margin-top: 4%;
        }

        .kriterijum
        {
            background: #F2F2F2;
        }

        .searchButton
        {
            background: #F2F2F2;
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

        .clear-left
        {
            clear: left;
        }
        .col-item .separator p
        {
            line-height: 20px;
            margin-bottom: 0;
            margin-top: 10px;
            text-align: center;
        }

        .col-item .separator p i
        {
            margin-right: 5px;
        }
        .col-item .btn-add
        {
            width: 50%;
            float: left;
        }

        .col-item .btn-add
        {
            border-right: 1px solid #E1E1E1;
        }

        .col-item .btn-details
        {
            width: 50%;
            float: left;
            padding-left: 10px;
        }

        #checkboxProizvodjac {
            padding-left: 10%;
            border: 1px solid lightgray;
            background: #F2F2F2;
        }

        #divProizvodjac {
            margin-top: 12%;
        }

        .telefon {
            padding-top: 3%;
            padding-left:3%;
        }

        #load {
            text-align: center;
        }
        #loadPicture {
            vertical-align: middle;
            padding-top: 10%;
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
        $('.kriterijum').change(function() {
            var krit = $('.kriterijum option:selected').text();
            $('.telefoni').remove();

            $(document)
                .ajaxStart(function () {
                    $('#load').show();
                })
                .ajaxStop(function () {
                    $('#load').hide();
                });

            $.get("/telefoni.php", {kriterijum: krit}, function(data) {
                var niz = JSON.parse(data);
                $('.wrapperTelefona').append('<div class="telefoni row"></div>');

                if(niz.length < 1) {
                    $('.telefoni').append('<p class="telefon h4">Ne postoji ni jedan telefon za zadati kriterijum.</p>');
                } else {
                    for (i = 0; i < niz.length; i++) {
                        $('.telefoni').append(
                            '<div class="telefon col-md-4 col-xs-6">' +
                            '<div class="col-item">' +
                            '<div class="photo">' +
                            '<img src="/view/resources/' + niz[i].model + '" class="img-responsive" alt="a" />' +
                            '</div>' +
                            '<div class="info">' +
                            '<div class="row">' +
                            '<div class="price col-md-12">' +
                            '<h4>' + niz[i].proizvodjac + ' ' + niz[i].model + '</h4>' +
                            '<h4 class="price-text-color">' + niz[i].cena +'€</h4>' +
                            '</div>' +
                            '</div>' +
                            '<div class="separator clear-left">' +
                            '<p class="btn-add">' +
                            '<a href="/prikaziTelefon.php?id=' + niz[i].id +'">' +
                            'Više detalja <span class="glyphicon glyphicon-search"></span></a></p>' +
                            '<p class="btn-details" style="text-align: center;">' +
                            '<a href="/azurirajTelefon.php?id=' + niz[i].id +'">' +
                            '<span class="glyphicon glyphicon-pencil"></span>' +
                            '</a>&nbsp&nbsp&nbsp' +
                            '<a class="delete" data-id="' + niz[i].id +'">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</a>' +
                            '</p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="clearfix">' +
                            '</div>' +
                            '</div>' +
                            '</div>');
                    }
                }
            });
        });

        $('#checkboxProizvodjac :checkbox').change(function() {
            var brojSelektovanih = $('input:checked').length;
            if(brojSelektovanih > 0) {
                var proizvodjaci = [];
                for(i = 0; i < brojSelektovanih; i++) {
                    proizvodjaci.push($($('input:checked')[i]).val());
                }
            } else {
                var brojProizvodjaca = $('input:checkbox').length;
                var proizvodjaci = [];
                for(i = 0; i < brojProizvodjaca; i++) {
                    proizvodjaci.push($($('input:checkbox')[i]).val());
                }
            }

            $('.telefoni').remove();

            $(document)
                .ajaxStart(function () {
                    $('#load').show();
                })
                .ajaxStop(function () {
                    $('#load').hide();
                });

            $.get("/telefoni.php", {proizvodjaci: proizvodjaci}, function(data) {
                var niz = JSON.parse(data);
                $('.wrapperTelefona').append('<div class="telefoni row"></div>');

                if(niz.length < 1) {
                    $('.telefoni').append('<p class="telefon h4">Ne postoji ni jedan telefon za zadati kriterijum.</p>');
                } else {
                    for (i = 0; i < niz.length; i++) {
                        $('.telefoni').append(
                            '<div class="telefon col-md-4 col-xs-6">' +
                            '<div class="col-item">' +
                            '<div class="photo">' +
                            '<img src="/view/resources/' + niz[i].model + '" class="img-responsive" alt="a" />' +
                            '</div>' +
                            '<div class="info">' +
                            '<div class="row">' +
                            '<div class="price col-md-12">' +
                            '<h4>' + niz[i].proizvodjac + ' ' + niz[i].model + '</h4>' +
                            '<h4 class="price-text-color">' + niz[i].cena +'€</h4>' +
                            '</div>' +
                            '</div>' +
                            '<div class="separator clear-left">' +
                            '<p class="btn-add">' +
                            '<a href="/prikaziTelefon.php?id=' + niz[i].id +'">' +
                            'Više detalja <span class="glyphicon glyphicon-search"></span></a></p>' +
                            '<p class="btn-details" style="text-align: center;">' +
                            '<a href="/azurirajTelefon.php?id=' + niz[i].id +'">' +
                            '<span class="glyphicon glyphicon-pencil"></span>' +
                            '</a>&nbsp&nbsp&nbsp' +
                            '<a class="delete" data-id="' + niz[i].id +'" data-name="'+ niz[i].model +'">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</a>' +
                            '</p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="clearfix">' +
                            '</div>' +
                            '</div>' +
                            '</div>');
                    }
                }

            });
        });

        $('.wrapperTelefona').on('click', '.delete' ,function () {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var modal = $('#myModal');
            modal.find('.modal-body').text('Da li ste sigurni da želite da obrišete telefon ' + name + '?');
            modal.find('.delete-confirmed').attr('data-id', id);
            modal.modal('show');
        });

        $('.delete-confirmed').on('click', function () {
            $.post('/obrisiTelefon/', {id: $(this).attr('data-id')}, function () {
                window.location = '/telefoni/';
            });
        });
    });
</script>

<?php
$js = ob_get_clean();

include ROOT . 'view/layout.php';
?>
