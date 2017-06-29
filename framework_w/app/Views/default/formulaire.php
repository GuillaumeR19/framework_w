<?php $this->layout('layout', ['title' => 'Formulaire']) ?>

<?php $this->start('main_content') ?>
<h2>Let's code.</h2>
<p>Vous avez atteint le formulaire. Bravo.</p>
<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>


<hr>
<?php
    if(!empty($formErrors)){
        echo '<p style="color:red";>'.implode('<br>', $formErrors);
    }
    if($formValid == true){
        echo '<p style="color:green";>Vous êtes désormais inscrit</p>';
    }
    ?>
<form style="text-align:center;" method="POST">
    <input type="text" placeholder="firstname" name="firstname"><br>
    <input type="text" placeholder="lastname" name="lastname"><br>
    <input type="text" placeholder="username" name="username"><br>
    <input type="text" placeholder="email" name="email"><br>
    <input type="text" placeholder="password" name="password"><br>
    <select name="role" id="">
        <option value="" selected><option>
        <option value="Admin">Admin<option>
        <option value="Editor">Editor<option>
        <option value="User">User<option>
    </select><br>
    <button type="submit">Envoyer</button>
</form>


<?php $this->stop('main_content') ?>