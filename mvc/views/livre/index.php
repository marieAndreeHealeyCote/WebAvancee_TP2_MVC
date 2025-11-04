{{ include ('layouts/header.php', {title:'Livre'}) }}

<body>
    <h1>Librairie - Gestion de livres</h1>
    <a href="{{base}}/livre/create" class="btn bleu"> Ajouter un livre</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
                <th>Genre</th>
                <th>Actions</th>
                <th>Catégorie</th>
                <th>Éditeur</th>
            </tr>
        </thead>
        <tbody>
            {% for livre in livres %}
            <tr>
                <td>{{ livre.id }}</td>
                <td>{{ livre.titre }}</td>
                <td>{{ auteurNom }}</td>
                <td>{{ livre.annee_publication }}</td>
                <td>{{ livre.genre }}</td>
                <td>
                    <a href="{{base}}/livre/show?id={{livre.id}}" class="btn vert">Modifier</a>
                    <a href="{{base}}/livre/delete?id={{livre.id}}" class="btn rouge" onclick="return confirm('Supprimer ce livre ?')">Supprimer</a>
                </td>
                <td>{{ categorieObj->getById(livre.categorie_id).nom }}</td>
                <td>{{ editeurObj->getById(livre.editeur_id).nom }}</td>
            </tr>
        </tbody>
    </table>

    {{ include ('layouts/footer.php') }}