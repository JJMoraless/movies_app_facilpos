<nav class="container">
    <ul>
        <li><strong style="font-size: 50px">🍿</strong></li>
    </ul>
    <ul>
        <li>
            <form method="GET" action="{{ route('movies.get') }}">
                @csrf
                <button href="#" role="button">Generar peliculas</button>
            </form>
        </li>
    </ul>
</nav>
