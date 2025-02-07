<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $pub->titre }} | {{ config('app.name') }}</title>
    <x-css-file-web />
</head>

<body>
    <div class="page-wrapper">
        <div class="preloader"></div>

        <x-nav />

        <section class="page-title text-center"
            style="background-image:url({{ asset('ressources/images/background/3.jpg') }});">
            <div class="container">
                <div class="title-text">
                    <h1>Blog</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="{{ route('home') }}">home &nbsp;/</a>
                        </li>
                        <li>{{ $pub->titre }} | Par {{ $pub->user->name }}</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="blog-section section style-four style-five">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="left-side">
                            <div class="item-holder">
                                <div class="image-box">
                                    <figure>
                                        <a>
                                            <img src="{{ asset('storage/' . $pub->image) }}"
                                                style="height:400px; width:100%; object-fil:cover;" alt=""></a>
                                    </figure>
                                </div>
                                <div class="content-text">
                                    <a>
                                        <h6>{{ $pub->titre }}</h6>
                                    </a>
                                    @php
                                        $ed = '';
                                        if ($pub->editepar) {
                                            $ed = "| Edité par : {$pub->editepar}, {$pub->datemaj?->format(
        'd-m-Y H:i:s',
    )}";
                                        }
                                    @endphp
                                    <i class='mb-3'>Ecrit par {{ $pub->user->user }},
                                        {{ $pub->date?->format('d-m-Y H:i:s') }} {{ $ed }} </i>
                                    <div>
                                        {!! $pub->text !!}
                                    </div>
                                    <div class="link-btn">
                                        <a href="{{ route('blog') }}" class="btn-style-one">Retour</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <x-footer-web />
    </div>

    <x-js-file-web />

</body>

</html>
