<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}">Accueil</a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}">Connexion</a>
                    </li>
                @endguest
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                    <a href="#" id="bcont">Contact</a>
                </li>
                {{-- <li>
                    <a href="#">A propos</a>
                </li> --}}
                @auth
                    @auth
                        @php
                            $user = auth()->user();
                            $img = userimage($user);
                            $href = '';
                            $dah = '';
                            if ($user->user_role == 'admin') {
                                $href = route('admin.profile');
                                $dah = route('admin.home');
                            }
                            if ($user->user_role == 'nurse') {
                                $href = route('nurse.profile');
                                $dah = route('nurse.home');
                            }
                        @endphp
                    @endauth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"> {{ $user->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ $dah }}" style="color: #000; padding: 10px;">Mon Panel</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ $href }}" style="color: #000; padding: 10px;">Profil</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#" logout style="color: #000; padding: 10px;">Déconnexion</a>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>