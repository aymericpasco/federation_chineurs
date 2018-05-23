<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h4 class="title is-4">
                {{ $team->name }}
            </h4>
            <h6 class="subtitle is-6">
                <a href="{{ route('team.edit', ['teamId' => $team->id]) }}">Editer les infos</a>
            </h6>
        </div>
    </div>
</section>

<nav class="level">
    <p class="level-item has-text-centered">
        <a class="link is-info" href="{{ route('team.members.list', ['teamId' => $team->id]) }}">Gestion des membres</a>
    </p>
    <p class="level-item has-text-centered">
        <a class="link is-info">Liste des associations</a>
    </p>
    <p class="level-item has-text-centered">
        <a class="link is-info">Projets archivés</a>
    </p>
</nav>
<hr>