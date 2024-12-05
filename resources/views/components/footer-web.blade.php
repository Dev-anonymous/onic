<footer class="footer-main">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="about-widget">
                        <div class="footer-logo">
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
                                    <img src="{{ $logo }}" alt="" width="130" height="70px" style="object-fit: contain" />
                                </a>
                            </figure>
                        </div>
                        <p>
                            {{ @getappconfig()->description }}
                        </p>

                        <ul class="list-inline social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h6></h6>
                    <ul class="location-link">
                        <li class="item">
                            <i class="fa fa-map-marker"></i>
                            <p>{{ @getappconfig()->adresse }}</p>
                        </li>
                        <li class="item">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="#">
                                <p>{{ @getappconfig()->email }}</p>
                            </a>
                        </li>
                        <li class="item">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <p>{{ @getappconfig()->tel }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container clearfix">
            <div class="copyright-text">
                <p>
                    &copy; Copyright {{ date('Y') }}
                </p>
            </div>

        </div>
    </div>
</footer>
