<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Accueil | {{ config('app.name') }}</title>
    <x-css-file-web />
</head>

<body>
    <div class="page-wrapper">
        <div class="preloader"></div>

        <section class="header-uper" style="padding: 10px 0;">
            <div class="container clearfix">
                <div class="logo">
                    <figure>
                        <a href="index-2.html">
                            @php
                                $logo = @getappconfig()->logo;
                                if (!$logo) {
                                    $logo = 'ressources/images/logo.png';
                                } else {
                                    $logo = asset('storage/' . $logo);
                                }
                            @endphp
                            <img src="{{ $logo }}" alt="" width="130" height="70px"
                                style="object-fit: contain" />
                        </a>
                    </figure>
                </div>
                <div class="right-side">
                    <ul class="contact-info">
                        <li class="item">
                            <div class="icon-box">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <strong>Email</strong>
                            <br />
                            <a href="#">
                                <span>{{ @getappconfig()->email }}</span>
                            </a>
                        </li>
                        <li class="item">
                            <div class="icon-box">
                                <i class="fa fa-phone"></i>
                            </div>
                            <strong>Phone</strong>
                            <br />
                            <span>{{ @getappconfig()->tel }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <x-nav />

        <div class="hero-slider">
            @if (count($banner))
                @foreach ($banner as $el)
                    <div class="slider-item slide1" style="background-image: url({{ asset('storage/' . $el->image) }})">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="content style text-center">
                                        <h2 class="text-white text-bold mb-2">{{ $el->titre }}</h2>
                                        <p class="tag-text mb-5">{{ $el->description }}</p>
                                        {{-- <a href="#" class="btn btn-main btn-white">explore</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="slider-item slide1"
                    style="background-image: url({{ asset('ressources/images/slider/slider-bg-1.jpg') }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content style text-center">
                                    <h2 class="text-white text-bold mb-2">Our Best Surgeons</h2>
                                    <p class="tag-text mb-5">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel
                                        sunt animi sequi ratione quod at earum. <br />
                                        Quis quos officiis numquam!
                                    </p>
                                    <a href="#" class="btn btn-main btn-white">explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- <div class="slider-item"
                style="background-image: url({{ asset('ressources/images/slider/slider-bg-2.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content style text-right">
                                <h2 class="text-white">We Care About <br />Your Health</h2>
                                <p class="tag-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <a href="#" class="btn btn-main btn-white">about us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item"
                style="background-image: url({{ asset('ressources/images/slider/slider-bg-3.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content text-center style">
                                <h2 class="text-white text-bold mb-2">
                                    Best Medical Services
                                </h2>
                                <p class="tag-text mb-5">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Beatae deserunt, <br />eius pariatur minus itaque nostrum.
                                </p>
                                <a href="shop.html" class="btn btn-main btn-white">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


        <section class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cta-block">
                            <div class="emmergency item">
                                <i class="fa fa-phone"></i>
                                <h2>Emegency Cases</h2>
                                <a href="#">1-800-700-6200</a>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                </p>
                            </div>
                            <div class="top-doctor item">
                                <i class="fa fa-stethoscope"></i>
                                <h2>24 Hour Service</h2>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Inventore dignissimos officia dicta suscipit vel eum
                                </p>
                                <a href="#" class="btn btn-main">Read more</a>
                            </div>
                            <div class="working-time item">
                                <i class="fa fa-hourglass-o"></i>
                                <h2>Working Hours</h2>
                                <ul class="w-hours">
                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>
                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>
                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section section bg-gray p-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="image-content">
                            <div class="section-title text-center">
                                <h3>
                                    Best Features
                                    <span>of Our Hospital</span>
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Ipsam magni in at debitis <br />
                                    nam error officia vero tempora alias? Sunt?
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('ressources/images/resource/1.png') }}"
                                                        alt="" />
                                                </a>
                                            </figure>
                                        </div>
                                        <h6>Orthopedics</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Nihil ducimus veniam illo quibusdam pariatur ex sunt,
                                            est aspernatur at debitis eius vitae vel nostrum dolorem
                                            labore autem corrupti odit mollitia?
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('ressources/images/resource/2.png') }}"
                                                        alt="" />
                                                </a>
                                            </figure>
                                        </div>
                                        <h6>Diaginostic</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Nihil ducimus veniam illo quibusdam pariatur ex sunt,
                                            est aspernatur at debitis eius vitae vel nostrum dolorem
                                            labore autem corrupti odit mollitia?
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('ressources/images/resource/3.png') }}"
                                                        alt="" />
                                                </a>
                                            </figure>
                                        </div>
                                        <h6>Psycology</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Nihil ducimus veniam illo quibusdam pariatur ex sunt,
                                            est aspernatur at debitis eius vitae vel nostrum dolorem
                                            labore autem corrupti odit mollitia?
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('ressources/images/resource/4.png') }}"
                                                        alt="" />
                                                </a>
                                            </figure>
                                        </div>
                                        <h6>General Treatment</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Nihil ducimus veniam illo quibusdam pariatur ex sunt,
                                            est aspernatur at debitis eius vitae vel nostrum dolorem
                                            labore autem corrupti odit mollitia?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="service-tab-section section">
            <div class="outer-box clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#dormitory" data-toggle="tab">dormitory</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#orthopedic" data-toggle="tab">orthopedic</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#sonogram" data-toggle="tab">sonogram</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#x-ray" data-toggle="tab">x-ray</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#diagnostic" data-toggle="tab">diagnostic</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="service-box tab-pane fade in active row" id="dormitory">
                                    <div class="col-md-6">
                                        <img class="img-responsive"
                                            src="{{ asset('ressources/images/services/service-one.jpg') }}"
                                            alt="service-image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contents">
                                            <div class="section-title">
                                                <h3>dormitory</h3>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                            </div>
                                            <ul class="content-list">
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Whitening is among
                                                    the most popular dental
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-style-one">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box tab-pane fade in" id="orthopedic">
                                    <div class="col-md-6">
                                        <img class="img-responsive"
                                            src="{{ asset('ressources/images/services/service-two.jpg') }}"
                                            alt="service-image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contents">
                                            <div class="section-title">
                                                <h3>orthopedic</h3>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                            </div>
                                            <ul class="content-list">
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Whitening is among
                                                    the most popular dental
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-style-one">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box tab-pane fade in" id="sonogram">
                                    <div class="col-md-6">
                                        <img class="img-responsive"
                                            src="{{ asset('ressources/images/services/service-three.jpg') }}"
                                            alt="service-image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contents">
                                            <div class="section-title">
                                                <h3>sonogram</h3>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                            </div>
                                            <ul class="content-list">
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Whitening is among
                                                    the most popular dental
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-style-one">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box tab-pane fade in" id="x-ray">
                                    <div class="col-md-6">
                                        <img class="img-responsive"
                                            src="{{ asset('ressources/images/services/service-four.jpg') }}"
                                            alt="service-image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contents">
                                            <div class="section-title">
                                                <h3>x-ray</h3>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                            </div>
                                            <ul class="content-list">
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Whitening is among
                                                    the most popular dental
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-style-one">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box tab-pane fade in" id="diagnostic">
                                    <div class="col-md-6">
                                        <img class="img-responsive"
                                            src="{{ asset('ressources/images/services/service-five.jpg') }}"
                                            alt="service-image" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contents">
                                            <div class="section-title">
                                                <h3>diagnostic</h3>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                                <p>
                                                    The implant fixture is first placed, so that it
                                                    ilikely to osseointegrate, then a dental prosthetic
                                                    is added. then a dental prosthetic is added.then a
                                                    dental pros- thetic is added.
                                                </p>
                                            </div>
                                            <ul class="content-list">
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Whitening is among
                                                    the most popular dental
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                                <li>
                                                    <i class="fa fa-dot-circle-o"></i>Teeth cleaning is
                                                    part of oral hygiene and involves
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-style-one">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="service-section bg-gray section p-0">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        Provided
                        <span>Services</span>
                    </h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem
                        ipsum dolor sit amet. qui suscipit atque <br />
                        fugiat officia corporis rerum eaque neque totam animi, sapiente
                        culpa. Architecto!
                    </p>
                </div>
                <div class="row items-container clearfix">
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/1.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Dormitory</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/2.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Germs Protection</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/3.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Psycology</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/1.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Dormitory</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/2.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Germs Protection</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="inner-box">
                            <div class="img_holder">
                                <a href="service.html">
                                    <img src="{{ asset('ressources/images/gallery/3.jpg') }}" alt="images"
                                        class="img-responsive" />
                                </a>
                            </div>
                            <div class="image-content text-center">
                                <span>Better Service At Low Cost</span>
                                <a href="service.html">
                                    <h6>Psycology</h6>
                                </a>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Suscipit, vero.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section section pb-0">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        Nos
                        <span>Docteurs</span>
                    </h3>
                </div>
                <div style="background: rgba(0,0,0,.05); border-radius: 10px; padding: 1rem;">
                    <p class="m-0 p-0">Besoin de trouver un docteur ?</p>
                    <small>
                        <i class="fa fa-info-circle"></i>
                        Vous pouvez rechercher par : nom du doctor, numéro de téléphone, zone de santé, ...
                    </small>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-inline">
                                <input type="text" id="search" class="form-control"
                                    placeholder="Votre recherche" />
                                <i ldr style="display: none" class="fa fa-spin fa-spinner"></i>
                            </div>
                            <b nodata style="display: none" class="text-danger">Aucune donnée trouvée.</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="resdata"></div>
                    <div id="defdata">
                        @if (count($docta))
                            @foreach ($docta as $el)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    @php
                                        $pro = $el->profils()->first();
                                    @endphp
                                    <div class="team-member">
                                        <img src="{{ asset('storage/' . $el->image) }}" alt="doctor"
                                            class="img-responsive" style="object-fit: contain; height: 400px;" />
                                        <div class="contents text-center">
                                            <h4>{{ $el->name }}</h4>
                                            <p>
                                                <b>Grade : {{ $pro?->niveauetude }}</b> <br>
                                                <b>Structure : {{ $pro?->structuresante?->structure }}</b> <br>
                                                <b>Numéro d'ordre : {{ $pro?->numeroordre ?? '-' }}</b> <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="team-member">
                                    <img src="{{ asset('ressources/images/team/doctor-2.jpg') }}" alt="doctor"
                                        class="img-responsive" />
                                    <div class="contents text-center">
                                        <h4>Dr. Robert Barrethion</h4>
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Dignissimos, aspernatur.
                                        </p>
                                        <a href="#" class="btn btn-main">read more</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="testimonial-section"
            style="background: url({{ asset('ressources/images/testimonials/1.jpg') }})">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        What Our
                        <span>Patients Says</span>
                    </h3>
                </div>
                <div class="testimonial-carousel">
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/1.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Adam Rose</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/2.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>David Warner</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/3.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Amy Adams</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/1.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Adam Rose</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/2.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>David Warner</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/3.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Amy Adams</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/1.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Adam Rose</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/2.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>David Warner</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="inner-box text-center">
                            <div class="image-box">
                                <figure>
                                    <img src="{{ asset('ressources/images/testimonials/3.png') }}" alt="" />
                                </figure>
                            </div>
                            <h6>Amy Adams</h6>
                            <p>
                                Neque porro quisquam est, qui dolorem ipsum quia consectetur,
                                dolor sit amet, consectetur, numquam Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Molestias, at?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="appoinment-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="contact">
                        <div class="contact-area">
                            <div class="section-title text-center">
                                <h3>
                                    Nous contacter
                                </h3>
                            </div>
                            <form action="#" id="fcont" class="default-form contact-form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="nom" placeholder="Votre nom"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Tel." required="" class="phone"
                                                id="phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" maxlength="100" name="sujet" placeholder="Sujet"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <textarea name="message" maxlength="300" placeholder="Message" required=""></textarea>
                                        </div>
                                        <div class="py-3 w-100">
                                            <div id="rep"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn-style-one">
                                                <span></span> Envoyer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-footer-web />
    </div>

    <x-js-file-web />
    <script src="{{ asset('assets/phone/intlTelInput.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/phone/intlTelInput.css') }}">
    <style>
        .iti--separate-dial-code {
            width: 100% !important
        }
    </style>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
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

        $('#fcont').submit(function() {
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
            btn.find('span').removeClass().addClass('fa fa-spin fa-spinner');
            var d = form.serialize() + '&telephone=' + tel;

            $.ajax({
                type: 'post',
                url: '{{ route('contact') }}',
                data: d,
                success: function(r) {
                    if (r.success) {
                        rep.removeClass().addClass('text-success');
                        form[0].reset();
                        setTimeout(() => {
                            rep.html('');
                        }, 5000);
                    } else {
                        btn.attr('disabled', false);
                        rep.removeClass().addClass('text-danger');
                    }
                    rep.html(r.message);
                },
                error: function(r) {
                    alert("une erreur s'est produite");
                }
            }).always(function() {
                btn.find('span').removeClass();
                btn.attr('disabled', false);
            });
        });

        $('#search').on('keyup change focus', function() {
            var v = this.value.trim();
            if (!v) {
                this.value = '';
                $('#resdata').fadeOut();
                $('#defdata').fadeIn();
                return;
            }

            $('[ldr]').fadeIn();
            $('[nodata]').fadeOut();
            $.ajax({
                type: 'post',
                url: '{{ route('search') }}',
                data: {
                    q: v
                },
                success: function(r) {

                    if (r.length) {
                        var str = '';
                        $(r).each(function(i, e) {
                            str += `
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="team-member">
                                        <img src="{{ asset('storage') }}/${e.image}" alt="doctor"
                                            class="img-responsive" style="object-fit: contain; height: 400px;" />
                                        <div class="contents text-center">
                                            <h4>${e.name}</h4>
                                            <p>
                                                <b>Grade : ${ e.profils[0]?.niveauetude }</b> <br>
                                                <b>Structure : ${ e.profils[0]?.structuresante?.structure } </b> <br>
                                                <b>Numéro d'ordre : ${ e.profils[0]?.numeroordre ?? '-' }</b> <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        })
                        $('#defdata').fadeOut();
                        $('#resdata').html(str).fadeIn();
                        $('[nodata]').fadeOut();
                    } else {
                        $('#resdata').fadeOut();
                        $('#defdata').fadeIn();
                        $('[nodata]').fadeIn();
                        setTimeout(() => {
                            $('[nodata]').fadeOut();
                        }, 3000);
                    }
                },

            }).always(function() {
                $('[ldr]').fadeOut();
            });

        })
    </script>

</body>

</html>
