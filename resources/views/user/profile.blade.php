<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Profil | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="accordion accordion-primary" id="accordionPrimaryExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPrimaryOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsePrimaryOne" aria-expanded="true"
                                                aria-controls="collapsePrimaryOne">
                                                Mon Profil
                                            </button>
                                        </h2>
                                        <div id="collapsePrimaryOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingPrimaryOne" style="">
                                            <div class="accordion-body">
                                                @php
                                                    $user = auth()->user();
                                                    $img = userimage($user);
                                                    $profil = $user->profils->first();
                                                @endphp
                                                <div class="card custom-card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <span class="avatar avatar-xl">
                                                                    <img src="{{ $img }}" alt="img">
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <p class="card-text text-info mb-1 fs-14 fw-semibold">
                                                                    {{ $user->name }}
                                                                </p>
                                                                <div class="card-title fs-12 mb-1">
                                                                    <p class="m-0">{{ $user->phone }}</p>
                                                                    <p class="m-0">{{ $user->email }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Niveau d'étude</td>
                                                                    <td>{{ @$profil?->niveauetude ?? '-' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Genre</td>
                                                                    <td>{{ @$profil?->genre }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Etat civil</td>
                                                                    <td>{{ @$profil?->etatcivil }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date de naissance</td>
                                                                    <td>{{ @$profil?->datenaissance?->format('d-m-Y') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Numéro d'ordre</td>
                                                                    <td>{{ @$profil?->numeroordre }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Adresse</td>
                                                                    <td>{{ @$profil?->adresse }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Structure de santé</td>
                                                                    <td>{{ @$profil?->structuresante->structure }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Zone de santé</td>
                                                                    <td>{{ @$profil?->structuresante->airesante->zonesante->zonesante }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Aire de santé</td>
                                                                    <td>{{ @$profil?->structuresante->airesante->airesante }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Diplôme de médecine</td>
                                                                    <td>
                                                                        <a target='_blank'
                                                                            href="{{ asset('storage/' . @$profil?->fichier) }}"
                                                                            class='btn p-0 btn-link {{ @$profil?->fichier ? '' : 'd-none' }}'>
                                                                            <i class='bx bxs-file-pdf'></i> Fichier
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" href="#mdledit" data-bs-toggle="modal">
                                    <i class="bx bx-edit"></i> Modifier mes infos
                                </button>

                                <button type="button" class="btn btn-danger" href="#mdlpass" data-bs-toggle="modal">
                                    <i class="bx bx-lock"></i> Changer mot de passe
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <x-footer />

        <div class="modal fade" id="mdlpass">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Changer mon mot de passe </h6><button aria-label="Close"
                            class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form action="#" id="f-pass">
                        <div class="modal-body text-start">
                            <div class="col-xl-12 mb-1 mt-2">
                                <label for="signin-password" class="form-label text-default d-block">Mot de passe actuel
                                </label>
                                <div class="input-group">
                                    <input required autocomplete="off" type="password" name="password"
                                        class="form-control form-control-sm" id="signin-password"
                                        placeholder="Mot de passe">
                                    <button class="btn btn-light" type="button"
                                        onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                            class="ri-eye-line align-middle"></i></button>
                                </div>
                            </div>

                            <div class="col-xl-12 mb-1 mt-2">
                                <label for="signin-password2" class="form-label text-default d-block">Nouveau Mot de
                                    passe
                                </label>
                                <div class="input-group">
                                    <input required autocomplete="off" type="password" minlength="6"
                                        name="npassword" class="form-control form-control-sm" id="signin-password2"
                                        placeholder="Mot de passe">
                                    <button class="btn btn-light" type="button"
                                        onclick="createpassword('signin-password2',this)" id="button-addon2"><i
                                            class="ri-eye-line align-middle"></i></button>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-1 mt-2">
                                <label for="signin-password3" class="form-label text-default d-block">Confirmer mot de
                                    passe
                                </label>
                                <div class="input-group">
                                    <input required autocomplete="off" type="password" minlength="6"
                                        name="cpassword" class="form-control form-control-sm" id="signin-password3"
                                        placeholder="Mot de passe">
                                    <button class="btn btn-light" type="button"
                                        onclick="createpassword('signin-password3',this)" id="button-addon2"><i
                                            class="ri-eye-line align-middle"></i></button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div id="rep"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mdledit">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Changer mes informations </h6><button aria-label="Close"
                            class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form action="#" id="f-info">
                        <div class="modal-body text-start">

                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">Nom complet</label>
                                <input required type="text" name="name" value="{{ $user->name }}"
                                    class="form-control " id="signin-username" placeholder="Nom complet">
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label text-default">Téléphone</label>
                                    <input required type="text" minlength="9" id="phone"
                                        value="{{ $user->phone }}" class="form-control phone"
                                        placeholder="Téléphone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label for="signin-username" class="form-label text-default">Email</label>
                                    <input required type="email" name="email" class="form-control "
                                        value="{{ $user->email }}" id="signin-username" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label text-default">Genre</label>
                                    <select name="genre" required id="" class="form-control">
                                        <option {{ @$profil->genre == 'M' ? 'selected' : '' }}>M</option>
                                        <option {{ @$profil->genre == 'F' ? 'selected' : '' }}>F</option>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label text-default">Niveau d'étude</label>
                                    <select focus="{{ @$profil->niveauetude }}" name="niveauetude" required
                                        id="" class="form-control">
                                        <option value=""></option>
                                        @foreach (getlevel() as $el)
                                            <option value="{{ $el }}">{{ $el }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-label text-default">
                                            Etat Civil
                                        </label>
                                        <select focus="{{ @$profil->etatcivil }}" name="etatcivil" required
                                            class="form-control">
                                            <option value=""></option>
                                            @foreach (getstate() as $el)
                                                <option value="{{ $el }}">{{ $el }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-label text-default">
                                            Date de naissance
                                        </label>
                                        <input name="datenaissance" required class="form-control"
                                            value="{{ @$profil?->datenaissance?->format('Y-m-d') }}"
                                            placeholder="Date de naissance" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">
                                    Numéro d'ordre (optionnel)</label>
                                <input name="numeroordre" class="form-control " id="signin-username"
                                    value="{{ @$profil->numeroordre }}" placeholder="Numéro d'ordre">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-username" class="form-label text-default">
                                    Adresse physique
                                </label>
                                <input required name="adresse" class="form-control " id="signin-username"
                                    value="{{ @$profil->adresse }}" placeholder="Adresse physique">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <div class="col-xl-12 mb-3">
                                    <label for="text-area" class="form-label">Diplôme de médecine (.PDF)
                                        (optionnel)</label>
                                    <input type="file" class="filepond1" name="file" accept=".pdf"
                                        data-max-files="1">
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="text-area" class="form-label">Image de profil (png, jpg,
                                        jpg) (optionnel)</label>
                                    <input type="file" class="filepond2" name="image" accept=".png,.jpg,.jpeg"
                                        data-max-files="1">
                                </div>
                            </div>
                            <div class="mt-2">
                                <div id="rep"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary" type="submit"><span></span> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="responsive-overlay"></div>

    <x-js-file />
    <script src="{{ asset('assets/phone/intlTelInput.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/phone/intlTelInput.css') }}">
    <style>
        .iti--separate-dial-code {
            width: 100% !important
        }
    </style>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

    <script>
        $(document).ready(function() {
            $('.phone').mask('0000000000000000');
            var input = document.querySelector("#phone");
            var iti = intlTelInput(input, {
                geoIpLookup: function(callback) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "CD";
                        callback(countryCode);
                    });
                },
                preferredCountries: ["cd"],
                initialCountry: "auto",
                separateDialCode: true,
            });

            $('[focus]').each(function() {
                var v = $(this).attr('focus');
                $(this).val(v);
            })

            FilePond.registerPlugin(
                FilePondPluginImagePreview
            );

            pond1 = FilePond.create($('.filepond1')[0]);
            pond2 = FilePond.create($('.filepond2')[0]);

            $('#f-pass').submit(function() {
                event.preventDefault();
                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var d = new FormData(this);

                $.ajax({
                    type: 'post',
                    url: '{{ route('updatepass') }}',
                    data: d,
                    contentType: false,
                    processData: false,
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            setTimeout(() => {
                                location.reload();
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
                        alert("une erreur s'est produite");
                    }
                });
            });

            $('#f-info').submit(function() {
                event.preventDefault();

                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var dial = $('.iti__selected-dial-code', form).html() + '';
                if (!dial) {
                    alert("Veuillez sélectionner l'indicatif du pays a cote du champs téléphone.");
                    return false;
                }
                var tl = $("#phone").val() + '';
                var tel = dial + tl + '';

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var d = new FormData(this);

                let pondFiles = pond1.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    d.append('file', pondFiles[i].file);
                }
                pondFiles = pond2.getFiles();
                for (var i = 0; i < pondFiles.length; i++) {
                    d.append('image', pondFiles[i].file);
                }
                d.append('phone', (tel));

                $.ajax({
                    type: 'post',
                    url: '{{ route('updateinfo') }}',
                    data: d,
                    contentType: false,
                    processData: false,
                    success: function(r) {
                        if (r.success) {
                            btn.hide();
                            rep.removeClass().addClass('text-success');
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-danger');
                        }
                        btn.find('span').removeClass();
                        rep.html(r.message);
                    },
                    error: function(r) {
                        btn.attr('disabled', false);
                        alert("une erreur s'est produite");
                    }
                });
            });

        });
    </script>

</body>

</html>
