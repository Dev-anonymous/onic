<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Configuration | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Configuration</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="accordion accordion-primary" id="accordionPrimaryExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPrimaryOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsePrimaryOne" aria-expanded="true"
                                                aria-controls="collapsePrimaryOne">
                                                Paramètre application
                                            </button>
                                        </h2>
                                        <div id="collapsePrimaryOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingPrimaryOne" style="">
                                            <div class="accordion-body">
                                                <div class="card custom-card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            @if (@$conf->logo)
                                                                <div class="me-3">
                                                                    <span class="avatar avatar-xl">
                                                                        <img src="{{ asset('storage/' . $conf->logo) }}"
                                                                            alt="img">
                                                                    </span>
                                                                </div>
                                                            @endif
                                                            <div>
                                                                <div class="card-title fs-12 mb-1">
                                                                    <p class="m-0">Email : {{ @$conf->email }}</p>
                                                                    <p class="m-0">Tel. : {{ @$conf->tel }}</p>
                                                                    <p class="m-0">Adresse : {{ @$conf->adresse }}
                                                                    </p>
                                                                    <p class="m-0">Description :
                                                                        {{ @$conf->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="py-2">
                                                            <a data-bs-effect="effect-flip-vertical"
                                                                data-bs-toggle="modal" href="#mdl"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="bx bx-paint"></i> Modifier
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />

        <div class="modal fade" id="mdl">
            <div class="modal-dialog  text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Modification </h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <form action="#" id="f-edit">
                        <div class="modal-body text-start">
                            <input type="hidden" name="user_role" value="admin">
                            <div class="col-xl-12 mb-2">
                                <label for="signin-username" class="form-label text-default">Email</label>
                                <input type="text" name="email" value="{{ @$conf->email }}"
                                    class="form-control form-control-sm" id="signin-username" placeholder="Email">
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-username" class="form-label text-default">Téléphone</label>
                                <input type="text" minlength="9" id="phone" value="{{ @$conf->tel }}"
                                    class="form-control phone" placeholder="Téléphone">
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-username" class="form-label text-default">Adresse</label>
                                <textarea name="adresse" id="" placeholder="Adresse" class="form-control" maxlength="100" rows="3">{{ @$conf->adresse }}</textarea>
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-username" class="form-label text-default">Description</label>
                                <textarea name="description" id="" placeholder="Description" maxlength="255" class="form-control"
                                    rows="3">{{ @$conf->description }}</textarea>
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="text-area" class="form-label">Logo</label>
                                <input type="file" class="filepond1" name="logo"
                                    accept="image/png, image/jpeg" data-max-file-size="500KB" data-max-files="1">
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

        FilePond.registerPlugin(
            FilePondPluginImagePreview
        );

        pond1 = FilePond.create($('.filepond1')[0]);

        $('#f-edit').submit(function() {
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
            d.append('tel', (tel));

            let pondFiles = pond1.getFiles();
            for (var i = 0; i < pondFiles.length; i++) {
                d.append('logo', pondFiles[i].file);
            }

            $.ajax({
                type: 'post',
                url: '{{ route('appconfig') }}',
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
    </script>

</body>

</html>
