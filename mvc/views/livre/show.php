{{ include ('layouts/header.php', {title:'Livre'})}}
<h1>Livre créé</h1>
<a href="{{ base }}/livres" class="btn bleu">Retour aux livres</a>

<div class="conteneur">
    <form method="post">
        <p><strong>Titre: </strong>{{ livre.titre }}</p>
        <p><strong>Auteur: </strong>{{ livre.auteur_nom }}</p>
        <p><strong>Année de publication: </strong>{{ livre.annee_publication }}</p>
        <p><strong>Catégorie: </strong>{{ livre.categorie_nom }}</p>
        <p><strong>Éditeur: </strong>{{ livre.editeur_nom }}</p>
        <a href="{{ base }}/livre/edit?id={{livre.id}}" class="btn bleu">Modifier</a>

        <input type="hidden" name="id" value="{{ livre.id }}">
        <button type="submit" class="btn rouge">Supprimer</button>
    </form>
</div>
{{ include ('layouts/footer.php')}}