<nav class="navbar is-transparent is-fixed-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('welcome') }}">
                <b>Fédération <span class="is-hidden-touch">des Chineurs</span></b>
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
                @auth
                    @if(Auth::user()->activated)
                        <a class="navbar-item" href="#">
                            Tableau de bord
                        </a>
                    @endif
                    @if(Auth::user()->hasTeam() and Auth::user()->activated)
                        <a class="navbar-item" href="{{ route('team.show', ['teamId' => Auth::user()->team->id]) }}">
                            {!! Auth::user()->team->name !!}
                        </a>
                    @endif
                @endauth
            </div>

            <div class="navbar-end">
                @guest
                    <a class="navbar-item" href="{{ route('login.social', ['provider' => 'facebook']) }}">
                        <span class="icon"><i class="fab fa-facebook-f"></i></span>
                        Connexion
                    </a>
                @else
                    <a class="navbar-item" href="{{ route('login.social', ['provider' => 'facebook']) }}">
                        {{ Auth::user()->name }}
                    </a>
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>

<script defer>
    document.addEventListener('DOMContentLoaded', function () {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>