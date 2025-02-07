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


{{--        <section class="cta">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="cta-block">--}}
{{--                            <div class="emmergency item">--}}
{{--                                <i class="fa fa-phone"></i>--}}
{{--                                <h2>Emegency Cases</h2>--}}
{{--                                <a href="#">1-800-700-6200</a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="top-doctor item">--}}
{{--                                <i class="fa fa-stethoscope"></i>--}}
{{--                                <h2>24 Hour Service</h2>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.--}}
{{--                                    Inventore dignissimos officia dicta suscipit vel eum--}}
{{--                                </p>--}}
{{--                                <a href="#" class="btn btn-main">Read more</a>--}}
{{--                            </div>--}}
{{--                            <div class="working-time item">--}}
{{--                                <i class="fa fa-hourglass-o"></i>--}}
{{--                                <h2>Working Hours</h2>--}}
{{--                                <ul class="w-hours">--}}
{{--                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>--}}
{{--                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>--}}
{{--                                    <li>Mon - Fri - <span>8:00 - 17:00</span></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        <section class="feature-section section bg-gray p-0">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-xs-12">--}}
{{--                        <div class="image-content">--}}
{{--                            <div class="section-title text-center">--}}
{{--                                <h3>--}}
{{--                                    Consultez--}}
{{--                                    <span>les meilleurs</span>--}}
{{--                                </h3>--}}
{{--                                <p>--}}
{{--                                    Nous sommes déterminés à simplifier la recherche et la mise en relation des patients--}}
{{--                                    avec des infirmiers qualifiés. <br> Notre objectif est de rendre le processus de--}}
{{--                                    soins plus accessible et efficace. <br>La plateforme incontournable pour connecter--}}
{{--                                    les--}}
{{--                                    infirmiers et les patients--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="icon-box">--}}
{{--                                            <figure>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="{{ asset('ressources/images/resource/1.png') }}"--}}
{{--                                                        alt="" />--}}
{{--                                                </a>--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}
{{--                                        <h6>Accès rapide</h6>--}}
{{--                                        <p>--}}
{{--                                            aux infirmiers qualifiés.--}}
{{--                                            Notre plateforme regroupe une vaste communauté d'infirmiers permanents,--}}
{{--                                            permettant aux patients de trouver facilement le professionnel de santé le--}}
{{--                                            plus adapté à leurs besoins.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="icon-box">--}}
{{--                                            <figure>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="{{ asset('ressources/images/resource/2.png') }}"--}}
{{--                                                        alt="" />--}}
{{--                                                </a>--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}
{{--                                        <h6>Recherche simplifiée</h6>--}}
{{--                                        <p>--}}
{{--                                            Utilisez notre fonction de recherche intuitive pour filtrer les infirmiers--}}
{{--                                            par spécialité, localisation, et disponibilités, afin de trouver exactement--}}
{{--                                            ce que vous recherchez.--}}
{{--                                            La Plateforme de Regroupement des Infirmiers Permanents a pour but de--}}
{{--                                            faciliter la mise en relation entre les infirmiers permanents et les--}}
{{--                                            patients.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="icon-box">--}}
{{--                                            <figure>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="{{ asset('ressources/images/resource/3.png') }}"--}}
{{--                                                        alt="" />--}}
{{--                                                </a>--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}
{{--                                        <h6>Actualités du Secteur</h6>--}}
{{--                                        <p>--}}
{{--                                            Restez informé des dernières actualités et évolutions dans le monde de la--}}
{{--                                            santé et des soins infirmiers grâce à notre section d'actualités--}}
{{--                                            régulièrement mise à jour.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="item">--}}
{{--                                        <div class="icon-box">--}}
{{--                                            <figure>--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="{{ asset('ressources/images/resource/4.png') }}"--}}
{{--                                                        alt="" />--}}
{{--                                                </a>--}}
{{--                                            </figure>--}}
{{--                                        </div>--}}
{{--                                        <h6>Disponibilité Flexibles</h6>--}}
{{--                                        <p>--}}
{{--                                            Les infirmiers peuvent gérer leurs horaires de--}}
{{--                                            disponibilité en temps réel, permettant ainsi aux patients de choisir un--}}
{{--                                            créneau qui leur convient.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

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

{{--        <section class="service-section bg-gray section p-0">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title text-center">--}}
{{--                    <h3>--}}
{{--                        Provided--}}
{{--                        <span>Services</span>--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem--}}
{{--                        ipsum dolor sit amet. qui suscipit atque <br />--}}
{{--                        fugiat officia corporis rerum eaque neque totam animi, sapiente--}}
{{--                        culpa. Architecto!--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="row items-container clearfix">--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/1.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Dormitory</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/2.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Germs Protection</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/3.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Psycology</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/1.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Dormitory</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/2.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Germs Protection</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="inner-box">--}}
{{--                            <div class="img_holder">--}}
{{--                                <a href="service.html">--}}
{{--                                    <img src="{{ asset('ressources/images/gallery/3.jpg') }}" alt="images"--}}
{{--                                        class="img-responsive" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="image-content text-center">--}}
{{--                                <span>Better Service At Low Cost</span>--}}
{{--                                <a href="service.html">--}}
{{--                                    <h6>Psycology</h6>--}}
{{--                                </a>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                                    Suscipit, vero.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="team-section section pb-0">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        Infirmiers
                    </h3>
                </div>
                <div style="background: rgba(0,0,0,.05); border-radius: 10px; padding: 1rem;">
                    <p class="m-0 p-0">Recherche ?</p>
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
                                <h4>
                                    Nous contacter
                                </h4>
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

    <div class="modal fade" id="mdlwelcome">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="text-center">TUTORIEL APPLICATION ONIC URBAIN LUBUMBASHI</h5>
                    <hr>
                    <ul>
                        <li>
                            1. SALUTATIONS CONFRATERNELLES A TOUS LES INFIRMIERS ET INFIRMIERES DE LA
                            VILLE DE
                            LUBUMBASHI.
                            EN PRESIDENT AUX DESTINES DU CONSEIL URBAIN DE L'ONIC - LUBUMBASHI, NOUS AVONS FIXE 4
                            OBJECTIFS
                            GENERAUX.
                            POUR Y PARVENIR, NOUS AVONS MIS LES MOYENS AFIN DE NOUS DOTER D'UN OUTIL INFORMATISE QUI EST
                            DÉJÀ
                            FONCTIONNEL A 30% ET QUI NOUS PERMET DE POURSUIVRE NOTRE PREMIER OBJECTIFS : <br>
                            - LA MAITRISE DES EFFECTIFS DES INFIRMIERS DE LUBUMBASHI. <br>
                            <span class="text-danger">L'APPLICATION DONT LE LIEN EST A PARTAGER A TOUS LES INFIRMIERS
                                DE
                                LUBUMBASHI.</span>
                        </li>
                        <br>

                            2. CE TUTORIEL EXPLIQUE LA PROCEDURE DE CREATION DE VOTRE COMPTE ET VOTRE ENREGISTREMENT
                            DANS LA
                            BASE DES DONNEES.<br/>
                            - DOIVENT S'ENREGISTRER TOUS LES INFIRMIERS AVEC OU SANS NUMERO DE L'ONIC.<br/>
                            - APRES L'ENREGISTREMENT, CEUX N'AYANT PAS DE NUMEROS DE L'ONIC, DONC LES NON INSCRITS AU
                            TABLEAU DE
                            L'ORDRE RECEVRONT DES INVITATIONS POUR FINALISER LA PROCEDURE D'OBTENTION DES NUMERO ET DES
                            CARTES.
                        </li>
                        <br>
                        <li>
                            <br/>
                            3. CEUX D'ENTRE VOUS QUI N'ARRIVENT PAS A S'ENREGISTRER, SOLLICITEZ L'ASSISTANCE
                            DE VOS COLLEGUES OU DU PRESIDENT SECTIONNAIRE DE VOTRE ZONE DE SANTE. (SSP).
                        </li>
                        <br>
                    </ul>
                    <hr>

                    <ul>
                        <li>1. OUVREZ UN NAVIGATEUR COMME GOOGLE CHROME.</li>
                        <li>2. DANS LA BARRE DE RECHERCHE : SAISISSEZ : ONICRDCURBAIN.ORG</li>
                        <li>3. DANS LA PAGE D'ACCEUIL : CLIQUER SUR LES 3 BARRES QUI SONT AU COIN SUPERIEUR DROIT PUIS
                            SUR
                            CONNEXION</li>
                        <li>4. CLIQUE SUR CRÉER UN COMPTE.</li>
                        <li>5. REMPLISSEZ LE FOURMULAIRE.</li>
                        <li>6. POUR OUVRIR VOTRE COMPTE, REPRENDRE LA PROCEDURE EN VOUS CONNECTANT AVEC SOIT VOTRE
                            NUMERO DE
                            TELEPHONE (WATSP) SOIT VOTRE ADRESSE Email ET VO5TRE MOT DE PASS (8 CARACTERES=
                            LETTRE+CHIFFRE+CARACTER SPECIAUX).</li>
                    </ul>

                    <p class="text-center">
                        <b>PONYO KABEMBA Benjamin</b> <br>
                        <b> PRESIDENT ONIC-LUBUMBASHI</b>
                    <h3 class="text-danger" style="text-align: center">L'ENREGISTREMENT PRENDRA FIN LE 31/03/2025</h3>
                    </p>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" data-dismiss="modal" type="button">D'ACCORD</button>
                </div>
            </div>
        </div>
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
        var i = Number(localStorage.getItem('i'));
        var wmdl = $('#mdlwelcome');
        if (i < 3) {
            wmdl.modal('show');
        }

        wmdl.on('hide.bs.modal', function() {
            // var i = Number(localStorage.getItem('i')) + 1;
            // localStorage.setItem('i', i);
        })

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
                                                <b>Grade : ${ e?.niveauetude }</b> <br>
                                                <b>Structure : ${ e?.structure } </b> <br>
                                                <b>Numéro d'ordre : ${ e?.numeroordre ?? '-' }</b> <br>
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
