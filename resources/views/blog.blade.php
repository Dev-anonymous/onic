<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Blog | {{ config('app.name') }}</title>
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
                    <h1>En Construction</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="{{ route('home') }}">home &nbsp;/</a>
                        </li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="blog-section section style-four style-five">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="right-side">
                            {{-- <div class="text-title">
                                <h6>Search</h6>
                            </div>
                            <div class="search-box">
                                <form method="post" action="https://themewagon.github.io/medic/index.html">
                                    <input type="search" name="search" placeholder="Enter to Search" required="">
                                </form>
                            </div> --}}
                            <div class="categorise-menu">
                                <div class="text-title">
                                    <h6>Categories</h6>
                                </div>
                                <ul class="categorise-list">
                                    @foreach ($categorie as $el)
                                        <li><a>{{ $el->categorie }} <span>({{ $el->publications_count }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="tag-list">
                                <div class="text-title">
                                    <h6>Tags</h6>
                                </div>
                                <a href="#">Dental</a><a href="#">Root</a>
                                <a href="#">Clean</a><a href="#">Rehabilitation</a>
                                <a href="#">Surgery</a><a href="#">Doctor</a><a href="#">Pediatric</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">

                        <div class="left-side" insertdata>
                        </div>
                        <div class="auto-load text-center mt-5"></div>
                        <div class="div-observer"></div>
                    </div>

                </div>
            </div>
        </section>

        <x-footer-web />
    </div>

    <x-js-file-web />

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });
        $(function() {

            spin = `<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60"
                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <path fill="#000"
                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML"
                            type="rotate" dur="1s" from="0 50 50" to="360 50 50"
                            repeatCount="indefinite" />
                    </path>
                </svg>`;

            function getParam(segment) {
                var url_s = new URL(location.href);
                return url_s.searchParams.get(segment);
            }

            var ENDPOINT = "{{ route('api.blog') }}";

            var page = 1;
            var can = true;
            var p = getParam('page');

            if (Number(p)) {
                page = p;
            };

            removeIfEmpty = false;

            function getData(append = true) {
                if (can) {
                    var _url;
                    var p = getParam('page');
                    if (p == null) {
                        _url = ENDPOINT + "?page=" + page;
                    } else {
                        var u = new URL(location.href);
                        var s = u.search.replace(`page=${p}`, `page=${page}`);
                        _url = ENDPOINT + s;
                    }

                    $('[loader]').fadeIn();
                    $.ajax({
                            url: _url,
                            datatype: "html",
                            beforeSend: function() {
                                $('.auto-load').html(spin).show();
                            }
                        })
                        .done(function(response) {
                            $('[searchtext]').html(response.searchtext);
                            if (response.data.length == 0 && response.next_page_url == null) {
                                var p = getParam('page');
                                if (removeIfEmpty && p == 1) {
                                    $("[insertdata]").html('');
                                }
                                can = false;
                                removeIfEmpty = false;
                                return;
                            }
                            removeIfEmpty = false;

                            window.history.pushState({}, null, _url.replace('api/', ''));
                            str1 = '';
                            $(response.data).each(function(i, el) {
                                var ed = '';
                                if (el.editepar) {
                                    ed = `| Edité par : ${el.editepar}, ${el.datemaj}`;
                                }
                                var href = "{{ route('blog', ['item' => '']) }}" + el.id;
                                str1 += `
                                    <div class="item-holder">
                                        <div class="image-box">
                                            <figure>
                                                <a href="${href}" >
                                                    <img src="${el.image}" style="height:400px; width:100%; object-fil:cover;" alt=""></a>
                                            </figure>
                                        </div>
                                        <div class="content-text">
                                            <a href="${href}">
                                                <h6>${el.titre}</h6>
                                            </a>
                                            <i class='mb-3'>Ecrit par ${el.user.name}, ${el.date} ${ed} </i>
                                            <div style="max-height:200px;overflow:hidden;border-image:linear-gradient(red, transparent) 1; margin-bottom:10px;">
                                                ${el.text}
                                            </div>
                                            <div class="link-btn">
                                                <a href="${href}" class="btn-style-one">Lire la suite</a>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                            })
                            if (append) {
                                $("[insertdata]").append(str1);
                            } else {
                                $("[insertdata]").html(str1);
                            }

                        }).always(function() {
                            $('[loader]').fadeOut();
                            $('.auto-load').hide();
                        });
                }
            }

            (new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        getData();
                        page++;
                    }
                });
            }, {})).observe(document.querySelectorAll('.div-observer')[0]);
        })
    </script>

</body>

</html>
