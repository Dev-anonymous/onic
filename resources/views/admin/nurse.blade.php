<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Infirmiers | {{ config('app.name') }} </title>
    <x-css-file />
</head>

<body>
    <x-switcher />
    <div class="page">
        <x-header />
        <x-aside />

        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0"></h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Infirmiers</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-2">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Comptes Infirmiers</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr></span></th>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Personnalité</th>
                                                <th>Détails</th>
                                                <th>Structure</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </div>

    <div id="responsive-overlay"></div>
    <div class="modal fade" id="delmdl">
        <div class="modal-dialog  text-center" role="document">
            <div class="modal-content modal-content-demo">
                <form action="#" id="fdel">
                    <div class="modal-body text-start">
                        <input type="hidden" name="id">
                        <h3>Confirmer la suppression ?</h3>
                        <div class="mt-2">
                            <div id="rep"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light btn-sm" data-bs-dismiss="modal" type="button">NON</button>
                        <button class="btn btn-primary btn-sm" type="submit"><span></span> OUI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showmdl">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <form action="#" id="fdel">
                    <div class="modal-body text-start">
                        <input type="hidden" name="id">
                        <h6>Transaction (<span n></span>)</h6>
                        <hr>
                        <div class="mt-2">
                            <div class="table-responsive">
                                <table class="table table-hover w-100" id="table2">
                                    <thead>
                                        <tr>
                                            <th style="width:5px!important"><span ldr2></span></th>
                                            <th>Infirmier</th>
                                            <th>Montant</th>
                                            <th>Référence</th>
                                            <th>Description</th>
                                            <th>Date paiement</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light btn-sm" data-bs-dismiss="modal" type="button">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-js-file />
    <x-datatable />


    <script>
        $(document).ready(function() {

            var table = $('#table');
            table.DataTable();
            var table2 = $('#table2');
            table2.DataTable();

            function getdata() {
                $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '{{ route('users.index', ['type' => 'nurse']) }}',
                    success: function(res) {
                        table.DataTable().destroy();
                        var html = '';
                        res.data.forEach((user, i) => {
                            html += `<tr>
                            <td>${i+1}</td>
                            <td><img src="${user.image}" alt="img" width="32" height="32" class="rounded-circle"></td>
                            <td>${user.name}</i></td>
                            <td>
                                Niveau d'Etude : ${user.profil?.niveauetude??'-'} <br>
                                Genre : ${user.profil?.genre??'-'} <br>
                                Date de naisssance : ${user.profil?.datenaissance??'-'} <br>
                                Age : ${user.profil?.age??'-'} <br>
                                Etat Civil : ${user.profil?.etatcivil??'-'} <br>
                                <a target='_blank' href="${user.profil?.fichier ??'-'}" class='btn p-0 btn-link ${user.profil?.fichier?'':'d-none'}' ><i class='bx bxs-file-pdf'></i> Fichier</a>
                            </td>
                            <td>
                                Numéro d'ordre : ${user.profil?.numeroordre ??'-'} <br>
                                Tél : ${user.phone ??'-'} <br>
                                Email : ${user.email ??'-'} <br>
                                Adresse : ${user.profil?.adresse ??'-'} <br>
                            </td>
                            <td>
                                Structure : ${user.profil.structure??'-'}<br>
                                Zone de sante : ${user.profil.zone??'-'}<br>
                                Aire de sante : ${user.profil.aire??'-'}<br>
                                </td>
                            <td>
                                <div class='d-flex justify-content-end'>
                                    <button class="btn btn-primary btn-sm m-1" data="${escape(JSON.stringify(user))}"  value="${user.id}" btrans><i class='bx bx-dollar'></i></button>
                                    <button class="btn btn-outline-danger btn-sm m-1"  value="${user.id}" bdel ><i class='bx bx-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                        `;
                        });

                        table.find('tbody').html(html);
                        $('[bdel]').off('click').click(function() {
                            event.preventDefault();
                            var v = this.value;
                            var mdl = $('#delmdl')
                            $('[name=id]', mdl).val(v);
                            mdl.modal('show');
                        });
                        $('[btrans]').off('click').click(function() {
                            event.preventDefault();
                            var data = JSON.parse(unescape($(this).attr('data')));
                            var t = data.trans;
                            var mdl = $('#showmdl');
                            var html = '';
                            t.forEach((el, i) => {
                                html += `<tr>
                                    <td>${i+1}</td>
                                    <td>${el.infirmier}</td>
                                    <td>${el.montant}</td>
                                    <td>${el.ref}</td>
                                    <td>${el.description}</td>
                                    <td>${el.date}</td>
                                </tr>
                                `;
                            });

                            table2.DataTable().destroy();
                            table2.find('tbody').html(html);
                            $('span[n]').html(t.length);
                            table2.DataTable({
                                order: [],
                                dom: 'Bflrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ],
                                layout: {
                                    topStart: 'buttons'
                                }
                            });
                            mdl.modal('show');
                        });

                        table.DataTable({
                            order: [],
                            dom: 'Bflrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],
                            layout: {
                                topStart: 'buttons'
                            }
                        });
                    },
                    error: function(res) {

                    }
                }).always(function() {
                    $('span[ldr]').removeClass();
                })
            }
            getdata();

            $('#fdel').submit(function() {
                event.preventDefault();
                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var id = $('[name=id]', form).val();

                $.ajax({
                    type: 'delete',
                    url: '{{ route('users.destroy', '') }}/' + id,
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            getdata();
                            setTimeout(() => {
                                $('.modal').modal('hide');
                            }, 2000);
                        } else {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-danger');
                        }
                        btn.find('span').removeClass();
                        rep.html(r.message);
                    },
                    error: function(r) {
                        btn.attr('disabled', false);
                        btn.find('span').removeClass();
                        alert("une erreur s'est produite");
                    }
                });
            });

        });
    </script>

</body>

</html>
