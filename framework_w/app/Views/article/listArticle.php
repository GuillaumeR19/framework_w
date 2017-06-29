<?php $this->layout('layout', ['title' => 'Article']) ?>
<?php session_start(); ?>

<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint la page d'article. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<hr>
<a href="addArticle">Ajouter un article</a>
<a href="">Déconnexion</a>
<hr>

<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
        <th>Contenu</th>
        <th>Lien</th>
    </tr>
    <?php foreach($articleList as $article): ?>
    <tr>
        <td><?=$article['title']; ?></td>
        <td><?=$article['idUsers']; ?></td>
        <td><?=$article['date_publi']; ?></td>
        <td><?=$article['content']; ?></td>
        <td>
            <a href="viewArticle?id=<?=$article['id']; ?>">Lien vers l'article</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>




<?php $this->stop('main_content') ?>