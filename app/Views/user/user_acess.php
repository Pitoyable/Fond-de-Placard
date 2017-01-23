<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>

<div class="container">

    <!-- div global de tout le contenu -->
    <div class="container_connection_subscribe">
      <!-- div de la carte connection -->
      <div class="container_connection">
        <h3>Connexion</h3>
        <!-- formulaire de connexion avec des div pour chaque couple label/input pour le placement css -->
        <form class="form from_connection" action="<?= $this->url('User_login') ?>" method="post">
          <fieldset>
            <p>
              <input type="email" name="email" placeholder="Adresse e-mail" required>
            </p>
            <p>
              <input type="password" name="password" placeholder="Mot de passe" required>
            </p>
          </fieldset>

          <button class="form_button" type="submit" name="connection_button">Se connecter</button>

        </form>
      </div>
    <!-- div de la carte inscription -->
      <div class="container_subscribe">
        <h3>S'inscrire</h3>
        <!-- formulaire d'inscription avec des div pour chaque couple label/input pour le placement css -->
        <form class="form form_subscribe" action="<?= $this->url('User_signUp') ?>" method="post">
          <fieldset>
            <p>
              <input type="text" name="pseudo" placeholder="Pseudo" required>
            </p>
            <p>
              <input type="email" name="email" placeholder="Adresse e-mail" required>
            </p>
            <p>
              <input  type="password" name="password" placeholder="Mot de passe" required>
            </p>
            <p>
              <input type="password" name="password_check" placeholder="Confirmer votre mot de passe" required>
            </p>
          </fieldset>
          <button class="form_button" type="submit" name="subscribe_button">S'inscrire</button>
        </form>
      </div>
    </div> <!-- container_connection_subscribe -->

</div> <!-- fin container -->

<?php $this->stop('main_content') ?>
