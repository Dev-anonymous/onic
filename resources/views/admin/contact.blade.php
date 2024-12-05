<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Contact | {{ config('app.name') }} </title>
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
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Contacts & Suggestions ({{ count($data) }})</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Utilisateur</th>
                                                <th>Suject</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $k => $el)
                                                <tr>
                                                    <td>{{ 1 + $k }}</td>
                                                    <td>
                                                        {{ $el->nom }} <br>
                                                        {{ $el->email }} <br>
                                                        {{ $el->telephone }}
                                                    </td>
                                                    <td>
                                                        {{ $el->sujet }}
                                                    </td>
                                                    <td>
                                                        {{ $el->message }}
                                                    </td>
                                                    <td>{{ $el->date?->format('d-m-Y H:i:s') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
    <script></script>

</body>

</html>
