{{ include ('layouts/header.php', {title:'Livre'})}}

<body>
    <h1>Livre créé</h1>
    <a href="livre-index.php" class="btn bleu">Retour aux livres</a>

    <div class="conteneur">
        <form action="livre-delete.php" method="post">
            <p><strong>Titre: </strong>{{ livre.titre }}</p>
            <p><strong>Auteur: </strong>{{ livre.auteur }}</p>
            <p><strong>Année de publication: </strong>{{ client.name }}></p>
            <p><strong>Genre: </strong><?= $livre['genre']; ?></p>
            <p><strong>Catégorie: </strong><?= $categorie['nom']; ?></p>
            <p><strong>Éditeur: </strong><?= $editeur['nom']; ?></p>
            <a href="{{ base }}/livre/edit?id={{livre.id}}" class="btn bleu">Modifier</a>

            <input type="hidden" name="id" value="{{ livre.id }}">
            <button type="submit" class="btn rouge">Supprimer</button>
        </form>
    </div>
</body>
{{ include ('layouts/footer.php')}}