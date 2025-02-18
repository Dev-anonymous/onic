<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Structure de santé | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Structure de santé</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Structure de santé</div>

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
                                    <table id="table" class="table table-hover text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr></span></th>
                                                <th>Structre de santé</th>
                                                <th>Type</th>
                                                <th>Adresse</th>
                                                <th>Contact</th>
                                                <th>Détails</th>
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

        <div class="modal fade" id="mdl">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Nouvelle structure de santé </h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="#" id="f-add">
                        <div class="modal-body text-start">
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Aire de santé</label>
                                <select name="airesante_id" required="" class="form-control">
                                    @foreach ($aires as $el)
                                        <option value="{{ $el->id }}">{{ $el->airesante }}
                                            ({{ $el->zonesante->zonesante }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.healtharea') }}" class="btn btn-link my-2">Ajouter une
                                    aire</a>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Nom de la structure</label>
                                <input type="text" name="structure" class="form-control form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Type</label>
                                <select name="type" required="" class="form-control">
                                    @foreach (gettypes() as $el)
                                        <option value="{{ $el }}">{{ $el }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Adresse de la
                                    structure</label>
                                <input type="text" name="adresse" class="form-control form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Contact de la
                                    structure</label>
                                <input type="text" name="contact" class="form-control phone form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="col-xl-12 mb-3 bg-gray-200 p-3">
                                <label for="text-area" class="form-label">Ou importer un fichier Excel</label>
                                <input type="file" class="filepond1" name="file" accept=".xls,.xlsx"
                                    data-max-files="1">
                                <a href="{{ asset('ModeleStructure.xlsx') }}" class="btn btn-link btn-sm">
                                    <i class="bx bx-file"></i>
                                    Fichier Modèle
                                </a>
                            </div>
                            <div class="mt-2">
                                <div id="rep"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal" type="button">Fermer</button>
                            <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editmdl">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Modification </h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form action="#" id="f-edit">
                        <div class="modal-body text-start">
                            <input type="hidden" name="id">
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Nom de la
                                    structure</label>
                                <input required type="text" name="structure" class="form-control form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Type</label>
                                <select name="type" required="" class="form-control">
                                    @foreach (gettypes() as $el)
                                        <option value="{{ $el }}">{{ $el }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Adresse de la
                                    structure</label>
                                <input type="text" name="adresse" class="form-control form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label  text-default">Contact de la
                                    structure</label>
                                <input type="text" name="contact" class="form-control phone form-control-sm"
                                    id="signin-username">
                            </div>
                            <div class="mt-2">
                                <div id="rep"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal" type="button">Fermer</button>
                            <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        <x-footer />
    </div>

    <div id="responsive-overlay"></div>

    <x-js-file />
    <x-datatable />

    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}">
    <script>
        $(document).ready(function() {
            $('.phone').mask('0000000000');
            var table = $('#table');
            table.DataTable();
            pond1 = FilePond.create($('.filepond1')[0]);


            function getdata() {
                $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '{{ route('structuresante.index') }}',
                    success: function(res) {
                        table.DataTable().destroy();
                        var html = '';
                        res.data.forEach((el, i) => {
                            html += `<tr>
                            <td>${i+1}</td>
                            <td>${el.structure}</td>
                            <td>${el.type??''}</td>
                            <td>${el.adresse??''}</td>
                            <td>${el.contact??''}</td>
                            <td>
                                Aire de sante : ${el.airesante} <br>
                                Infirmiers : ${el.infirmier}
                            </td>
                            <td>
                                <div class='d-flex justify-content-end'>
                                    <button class="btn btn-primary btn-sm m-1" data="${escape(JSON.stringify(el))}"  value="${el.id}" bedit><i class='bx bx-edit'></i></button>
                                    <button class="btn btn-outline-danger btn-sm m-1"  value="${el.id}" bdel ><i class='bx bx-trash'></i></button>
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
                        $('[bedit]').off('click').click(function() {
                            event.preventDefault();
                            var mdl = $('#editmdl')
                            var data = JSON.parse(unescape($(this).attr('data')));
                            $('[name=id]', mdl).val(data.id);
                            $('[name=structure]', mdl).val(data.structure);
                            $('[name=adresse]', mdl).val(data.adresse);
                            $('[name=contact]', mdl).val(data.contact);
                            $('[name=type]', mdl).val(data.type);
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


            $('#f-add').submit(function() {
                event.preventDefault();
                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var data = new FormData(this);
                let pondFiles = pond1.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    data.append('file', pondFiles[i].file);
                }

                $.ajax({
                    type: 'post',
                    data: data,
                    url: '{{ route('structuresante.store') }}',
                    contentType: false,
                    processData: false,
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            form.get(0).reset();
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
                    url: '{{ route('structuresante.destroy', '') }}/' + id,
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

            $('#f-edit').submit(function() {
                event.preventDefault();
                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var data = form.serialize();

                var id = $('[name=id]', form).val();
                $.ajax({
                    type: 'put',
                    data: data,
                    url: '{{ route('structuresante.store', '') }}/' + id,
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            form.get(0).reset();
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
