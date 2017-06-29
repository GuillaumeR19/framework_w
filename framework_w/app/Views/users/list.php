<?php $this->layout('layout', ['title' => 'Liste']) ?>

<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint le formulaire. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<hr>

<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    <?php foreach($usersList as $user): ?>
    <tr>
        <td><?=$user['firstname']; ?></td>
        <td><?=$user['lastname']; ?></td>
        <td><?=$user['username']; ?></td>
        <td><?=$user['email']; ?></td>
        <td><?=$user['role']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>


<?php $this->stop('main_content') ?>