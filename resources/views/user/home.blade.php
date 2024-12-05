<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Paiement et Transactions | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Paiement et Transactions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Transactions</div>
                                <div class="m-2">
                                    <select name="" id="" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-hover w-100">
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
                    </div>
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Paiements</div>
                                <div class="m-2">
                                    <button
                                        class="modal-effect btn btn-outline-dark btn-sm btn-wave waves-effect waves-light"
                                        data-bs-effect="effect-flip-vertical" data-bs-toggle="modal"
                                        href="#mdl">Ajouter
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr></span></th>
                                                <th>Montant</th>
                                                <th>Description</th>
                                                <th>Date</th>
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

        <div class="modal fade" id="mdl" data-bs-backdrop="static">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Nouvelle transaction</h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="#" id="f-pay">
                        <input type="hidden" name="paiement_id">
                        <div class="modal-body text-start">
                            <div class="col-xl-12">
                                <div class="text-center">
                                    <b>Nous acceptons les paiements par </b>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a class="m-1">
                                        <img class="img-thumbnail shadow-lg"
                                            src="{{ asset('img/payment-method/airtel.png') }}" width="100px"
                                            height="50px" alt="" />
                                    </a>
                                    <a class="m-1">
                                        <img class="img-thumbnail shadow-lg"
                                            src="{{ asset('img/payment-method/vodacom.png') }}" width="100px"
                                            height="50px" alt="" />
                                    </a>
                                    <a class="m-1">
                                        <img class="img-thumbnail shadow-lg"
                                            src="{{ asset('img/payment-method/orange.png') }}" width="100px"
                                            height="50px" alt="" />
                                    </a>
                                    <a class="m-1">
                                        <img class="img-thumbnail shadow-lg"
                                            src="{{ asset('img/payment-method/afrimoney.png') }}" width="100px"
                                            height="50px" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-3 mt-3">
                                <label for="signin-username" class="form-label text-default">
                                    Numéro Mobile Money
                                </label>
                                @php
                                    $phone = auth()->user()->phone;
                                    $phone = '0' . substr($phone, -9);
                                @endphp
                                <input required type="text" minlength="10" maxlength="10" name="phone"
                                    class="form-control form-control-sm phone" value="{{ $phone }}"
                                    id="signin-username" placeholder="Téléphone, Ex: 099xxx">
                                <h6 class="mt-1">Montant de paiement : <span mt></span></h6>
                            </div>
                            <div class="mt-2">
                                <div id="rep"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                            <button cancelbtn style="display: none"
                                class="btn m-2 btn-warning btn-wave waves-effect waves-light" type="button">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <x-footer />
    </div>

    <div id="responsive-overlay"></div>

    <x-js-file />
    <x-datatable />

    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script>
        $('.phone').mask('0000000000');

        $(document).ready(function() {
            var table = $('#table');
            table.DataTable();
            var table2 = $('#table2');
            table2.DataTable();

            function getdata() {
                $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '{{ route('paiement.index') }}',
                    success: function(res) {
                        table.DataTable().destroy();
                        var html = '';
                        res.data.forEach((el, i) => {
                            var btn = el.canpay ? `
                            <button class="btn btn-danger btn-sm m-1"  value="${el.id}" mt="${el.fmontant}" bpay ><i class='bx bxs-dollar-circle'></i> Payer</button>
                            ` : '';
                            html += `<tr>
                            <td>${i+1}</td>
                            <td>${el.fmontant}</td>
                            <td>${el.description}</td>
                            <td>${el.date}</td>
                            <td>
                                <div class='d-flex justify-content-end'>
                                    ${btn}
                                </div>
                            </td>
                        </tr>
                        `;
                        });

                        table.find('tbody').html(html);

                        $('[bpay]').off('click').click(function() {
                            event.preventDefault();
                            var v = this.value;
                            var mdl = $('#mdl');
                            $('[name=paiement_id]', mdl).val(v);
                            $('span[mt]').html($(this).attr('mt'));
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

            function getdata2() {
                $('span[ldr2]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '{{ route('transaction.index') }}',
                    success: function(res) {
                        table2.DataTable().destroy();
                        var html = '';
                        res.data.forEach((el, i) => {
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

                        table2.find('tbody').html(html);
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
                    },
                    error: function(res) {

                    }
                }).always(function() {
                    $('span[ldr2]').removeClass();
                })
            }
            getdata2();

            var formpay = $('#f-pay');
            var cancelbtn = $('[cancelbtn]');

            formpay.submit(function() {
                event.preventDefault();
                var data = formpay.serialize();
                var re = $('#rep', formpay);
                re.removeClass().html('');

                $(':input', formpay).attr('disabled', true);
                var btn = $(':submit', formpay);
                btn.find('span').removeClass().addClass('bx bx-loader bx-spin');

                $.ajax({
                    type: 'post',
                    url: '{{ route('fpi') }}',
                    data: data,
                    success: function(r) {
                        if (r.success) {
                            re.removeClass().removeClass().addClass('alert alert-success');
                            REF = r.myref;
                            callback();
                            btn.html(
                                '<span class="bx bx-loader bx-spin"></span> En attente de validation'
                            );
                            cancelbtn.slideDown().attr('disabled', false);

                        } else {
                            $(':input', formpay).attr('disabled', false);
                            btn.find('span').removeClass();
                            re.removeClass().addClass('alert alert-danger').addClass(
                                'alert alert-danger');
                        }
                        re.html(r.message);
                    },
                    error: function(r) {
                        $(':input', formpay).attr('disabled', false);
                        btn.find('span').removeClass();
                        re.removeClass().addClass('alert alert-danger').html(
                            "une erreur s'est produite");
                    }
                });
            });

            cancelbtn.click(function() {
                var ok = confirm("Voulez vous annuler la transaction ?");
                if (ok) {
                    location.reload();
                }
            });

            REF = '';
            var callback = function() {
                $.ajax({
                    url: '{{ route('fpc') }}',
                    data: {
                        myref: REF
                    },
                    success: function(res) {
                        var trans = res.transaction;
                        var status = trans?.status;
                        if (status === 'success') {
                            var btn = $(':submit', formpay);
                            cancelbtn.slideUp();
                            btn.slideUp();

                            var re = $('#rep', formpay);
                            re.removeClass().addClass('alert alert-success');
                            re.html(res.message);

                            getdata();
                            getdata2();

                        } else if (status === 'failed') {
                            var btn = $(':submit', formpay);
                            cancelbtn.slideUp().attr('disabled', false);
                            $(':input', formpay).attr('disabled', false);

                            var re = $('#rep', formpay);
                            re.removeClass().addClass('alert alert-danger');
                            re.html(
                                "La transaction a échouée. Vous avez peut-être saisi un mauvais pin ou votre solde est insuffisant. Merci de réessayer.");
                            btn.html('<span></span> Valider');

                        } else {
                            setTimeout(() => {
                                callback();
                            }, 2000);
                        }
                    },
                    error: function() {
                        setTimeout(() => {
                            callback();
                        }, 2000);
                    }
                });
            }

        });
    </script>

</body>

</html>
