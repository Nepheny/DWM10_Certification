<h2>header</h2>
<nav>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">Se connecter</a></li>
            <li><a href="{{ route('register') }}">S'enregistrer</a></li>
            <li><a href="/albums">Liste des albums</a></li>
        @else
            <li>
                <div><a href="#">{{ Auth::user()->name }}</a></div>
                <div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>