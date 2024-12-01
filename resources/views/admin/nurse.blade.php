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

    <x-js-file />
    <x-datatable />


    <script>
        $(document).ready(function() {

            var table = $('#table');
            table.DataTable();

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
                                Genre : ${user.profil?.genre} <br>
                                Date de naisssance : ${user.profil?.datenaissance} <br>
                                Age : ${user.profil?.age} <br>
                            </td>
                            <td>
                                Numéro d'ordre : ${user.profil?.numeroordre } <br>
                                Tél : ${user.phone } <br>
                                Email : ${user.email } <br>
                                Adresse : ${user.profil?.adresse } <br>
                            </td>
                            <td>${user.profil.structure}</td>
                            <td class='d-none'>
                                <div class='d-flex justify-content-end'>
                                    <button class="btn btn-primary btn-sm m-1" data="${escape(JSON.stringify(user))}"  value="${user.id}" bedit><i class='bx bx-edit'></i></button>
                                    <button class="btn btn-outline-danger btn-sm m-1"  value="${user.id}" bdel ><i class='bx bx-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                        `;
                        });

                        table.find('tbody').html(html);

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

        });
    </script>

</body>

</html>
