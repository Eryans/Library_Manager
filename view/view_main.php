<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Résumé</th>
            <th>Date de Parution</th>
            <th>Catégorie</th>
            <th>18+ ?</th>
            <th>Disponible</th>
            <th>Emprunteur Actuel</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($Library as $book) {
            echo $book->showBookInfo();
        } ?>
    </tbody>
</table>