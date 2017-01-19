<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>

<!-- Page mon compte / modification des infos -->
<h1>Mon compte</h1>
<!-- div global de tout le contenu -->
<div class="container container_mon_compte">
  <h3><?= $_SESSION['user']['use_pseudo'] ?></h3><!--mettre le pseudo du user en cour-->
  <h5>Modifier mes infos :</h5>
  <!-- formulaire de modification des infos user -->
  <form class="form form_update_user" action="<?= $this->url('User_update') ?>" method="post">

    <div class="form_update_user_mail">
      <label for="update_mail">Adresse Mail :</label>
      <input id="update_mail" type="text" name="email" value="<?= $_SESSION['user']['use_email'] ?>" required>
    </div>

    <div class="form_update_user_old_password">
      <label for="update_old_password">Ancien mot de passe :</label>
      <input id="update_old_password" type="password" name="update_old_password" placeholder="Ancien mot de passe" required>
    </div>

    <div class="form_update_user_new_password">
      <label for="update_new_password">Nouveau mot de passe :</label>
      <input id="update_new_password" type="password" name="update_new_password" placeholder="Nouveau mot de passe" required>
    </div>

    <button type="submit" name="update_user_submit">Valider</button>
  </form>
</div>

<?php $this->stop('main_content') ?>
