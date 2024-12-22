<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Article Blog | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Article Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Article Blog</div>

                                <div class="m-2">
                                    <button
                                        class="btn badd btn-outline-dark btn-sm btn-wave waves-effect waves-light">Ajouter
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr></span></th>
                                                <th></th>
                                                <th>Article</th>
                                                <th>Détails</th>
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

                    <div class="col-xl-12" style="display: none" id="adddiv">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Nouvel article Blog</div>
                                <div class="m-2">
                                    <button
                                        class="btn bcan btn-outline-danger btn-sm btn-wave waves-effect waves-light">Annuler
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="#" id="f-add">
                                        <div class="col-xl-6 mb-3">
                                            <label for="signin-username"
                                                class="form-label text-default">Catégorie</label>
                                            <select name="categoriepublication_id" required="" class="form-control">
                                                @foreach ($category as $el)
                                                    <option value="{{ $el->id }}">{{ $el->categorie }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="signin-username" class="form-label text-default">Titre de
                                                l'article</label>
                                            <input required type="text" name="titre"
                                                class="form-control form-control-sm" id="signin-username">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="text-area" class="form-label">Image</label>
                                            <input type="file" class="filepond1" required name="image"
                                                accept="image/png, image/jpeg" data-max-file-size="500KB"
                                                data-max-files="1">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <div class="summernote"></div>
                                        </div>
                                        <div class="mt-2">
                                            <div id="rep"></div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12" style="display: none" id="editdiv">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Modification article Blog</div>
                                <div class="m-2">
                                    <button
                                        class="btn bcan btn-outline-danger btn-sm btn-wave waves-effect waves-light">Annuler
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="#" id="f-edit">
                                        <input type="hidden" name="id">
                                        <div class="col-xl-6 mb-3">
                                            <label for="signin-username"
                                                class="form-label text-default">Catégorie</label>
                                            <select name="categoriepublication_id" required="" class="form-control">
                                                @foreach ($category as $el)
                                                    <option value="{{ $el->id }}">{{ $el->categorie }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="signin-username" class="form-label text-default">Titre de
                                                l'article</label>
                                            <input required type="text" name="titre"
                                                class="form-control form-control-sm" id="signin-username">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="text-area" class="form-label">Image (optionnel)</label>
                                            <input type="file" class="filepond2" name="image"
                                                accept="image/png, image/jpeg" data-max-file-size="500KB"
                                                data-max-files="1">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <div class="summernote2"></div>
                                        </div>
                                        <div class="mt-2">
                                            <div id="rep"></div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('ressources/summernote/summernote.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('ressources/summernote/summernote.min.css') }}">

    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

    <script>
        $(document).ready(function() {
            var table = $('#table');
            table.DataTable();

            FilePond.registerPlugin(
                FilePondPluginImagePreview
            );

            pond1 = FilePond.create($('.filepond1')[0]);
            pond2 = FilePond.create($('.filepond2')[0]);

            $('.badd').click(function() {
                var d = $('#adddiv')
                d.stop().toggle('scale');
                if (d.is(':visible')) {
                    $('.summernote').summernote('destroy');
                    $('.summernote').summernote({
                        height: 500,
                        placeholder: "Votre article ...",
                    });
                    var noteBar = $('.note-toolbar');
                    noteBar.find('[data-toggle]').each(function() {
                        $(this).attr('data-bs-toggle', $(this).attr('data-toggle'))
                            .removeAttr('data-toggle');
                    });
                    $('.note-btn[data-toggle="dropdown"]').each(function() {
                        $(this).attr('data-bs-toggle', 'dropdown').removeAttr(
                            'data-toggle');
                    });
                    setTimeout(() => {
                        $("html, body").animate({
                                scrollTop: $('#adddiv').offset().top - 50
                            },
                            1200
                        );
                    }, 1000);
                } else {
                    $('.summernote').summernote('destroy');
                }
            });
            $('.bcan').click(function() {
                $('#adddiv').stop().slideUp();
                $('#editdiv').stop().slideUp();
            });

            function getdata() {
                $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '{{ route('publication.index') }}',
                    success: function(res) {
                        table.DataTable().destroy();
                        var html = '';
                        res.data.forEach((el, i) => {
                            html += `<tr>
                            <td>${i+1}</td>
                            <td><img src="${el.image}" alt="img" width="32" height="32" class="rounded-circle"></td>
                            <td>
                                ${el.titre} <br>
                                <i class='text-secondary'>Catégorie : ${el.categoriepublication.categorie}</i>
                            </td>
                            <td>
                                Publié par : ${el.user.name} <br>
                                Modifié par : ${el.editepar ?? '-'}
                            </td>
                            <td>
                                Date publication : ${el.date} <br>
                                Date modification : ${el.datemaj ?? '-'}
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
                            var mdl = $('#f-edit')
                            var data = JSON.parse(unescape($(this).attr('data')));
                            $('[name=id]', mdl).val(data.id);
                            $('[name=titre]', mdl).val(data.titre);
                            $('[name=categoriepublication_id]', mdl).val(data
                                .categoriepublication_id);
                            $('#adddiv').hide();
                            $('.summernote2').summernote('destroy');
                            $('.summernote2').html(data.text);
                            $('.summernote2').summernote({
                                height: 500,
                                placeholder: "Votre article ...",
                            });
                            var noteBar = $('.note-toolbar');
                            noteBar.find('[data-toggle]').each(function() {
                                $(this).attr('data-bs-toggle', $(this).attr(
                                        'data-toggle'))
                                    .removeAttr('data-toggle');
                            });
                            $('.note-btn[data-toggle="dropdown"]').each(function() {
                                $(this).attr('data-bs-toggle', 'dropdown')
                                    .removeAttr(
                                        'data-toggle');
                            });
                            $('#editdiv').slideDown();
                            setTimeout(() => {
                                $("html, body").animate({
                                        scrollTop: $('#editdiv').offset().top - 50
                                    },
                                    1200
                                );
                            }, 1000);

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
                var text = $('.summernote').summernote('code');
                if (text.trim().length < 20) {
                    rep.removeClass().addClass('text-danger');
                    rep.html("Veuillez saisir un article valide.");
                    return;
                }

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var data = new FormData(form[0]);
                let pondFiles = pond1.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    data.append('image', pondFiles[i].file);
                }
                data.append('text', text);

                $.ajax({
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    url: '{{ route('publication.store') }}',
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            form.get(0).reset();
                            $('.summernote').summernote('reset');

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
                    url: '{{ route('publication.destroy', '') }}/' + id,
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
                var text = $('.summernote2').summernote('code');
                if (text.trim().length < 20) {
                    rep.removeClass().addClass('text-danger');
                    rep.html("Veuillez saisir un article valide.");
                    return;
                }

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var data = new FormData(form[0]);
                let pondFiles = pond2.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    data.append('image', pondFiles[i].file);
                }
                data.append('text', text);

                var id = $('[name=id]', form).val();
                $.ajax({
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    url: '{{ route('publication.store', '') }}/' + id,
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
