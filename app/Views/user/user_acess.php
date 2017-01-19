<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>


<!-- page connexion / inscription -->
<h1>Connexion / Inscription</h1>
<!-- div global de tout le contenu -->
<div class="container container_connection_subscribe">
  <!-- div de la carte connection -->
  <div class="container container_connection">
    <h3>Connection</h3>
    <!-- formulaire de connexion avec des div pour chaque couple label/input pour le placement css -->
    <form class="form from_connection" action="<?= $this->url('User_login') ?>" method="post">

      <div class="form_connection_mail">
        <label for="connection_mail">E-mail :</label>
        <input id="connection_mail" type="mail" name="email" placeholder="1234@mail.com" required>
      </div>

      <div class="form_connection_password">
        <label for="connection_password">Mot de Passe :</label>
        <input id="connection_password" type="password" name="password" placeholder="mot de passe" required>
      </div>

      <button class="form_connection_button" type="submit" name="connection_button">Se connecter</button>

    </form>
  </div>
<!-- div de la carte inscription -->
  <div class="container container_subscribe">
    <h3>S'inscrire</h3>
    <!-- formulaire d'inscription avec des div pour chaque couple label/input pour le placement css -->
    <form class="form form_subscribe" action="<?= $this->url('User_signUp') ?>" method="post">

      <div class="form_subscribe_pseudo">
        <label for="subscribe_pseudo">Pseudo :</label>
        <input id="subscribe_pseudo" type="text" name="pseudo" placeholder="Pseudo" required>
      </div>

      <div class="form_subscribe_mail">
        <label for="subscribe_mail">E-mail :</label>
        <input id="subscribe_mail" type="email" name="email" placeholder="1234@mail.com" required>
      </div>

      <div class="form_subscribe_password">
        <label for="subscribe_password">Mot de passe :</label>
        <input id="subscribe_password" type="password" name="password" placeholder="mot de passe" required>
      </div>

      <div class="form_subscribe_password_confirm">
        <label for="subscribe_password_confirm">Confirmation Mot de Passe :</label>
        <input id="subscribe_password_confirm" type="password" name="password_check" placeholder="mot de passe" required>
      </div>

      <button class="form_subscribe_button" type="submit" name="subscribe_button">S'inscrire</button>
    </form>
  </div>
</div>

<?php $this->stop('main_content') ?>
