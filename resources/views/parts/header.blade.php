<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        @guest
            <li><a href="{{ route('login') }}">Se connecter</a></li>
            <li><a href="{{ route('register') }}">S'enregistrer</a></li>
        @else
            <li>{{ Auth::user()->name }}</li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        <li><a href="/albums">Liste des albums</a></li>
        <li><a href="/album/insert">Ajouter un album</a></li>
    </ul>
</nav>