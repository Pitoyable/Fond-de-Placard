<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>
<h1>Mon compte</h1>
<h3>Se connecter</h3>
<?php if (!empty($_SESSION)){ ?>
  <form class="" action="<?= $this->url('User_logout') ?>" method="post">
    <button type="submit" >Se déconnecter</button>
  </form>


  <form class="" action="<?= $this->url('User_update') ?>" method="post">
    <p>
      <label for="">Pseudo :
        <input type="text" name="pseudo" value="<?= $_SESSION['user']['use_pseudo'] ?>">
      </label>
    </p>
    <p>
      <label for="">Email :
        <input type="text" name="email" value="<?= $_SESSION['user']['use_email'] ?>">
      </label>
    </p>
    <p>
      <label for="">Ancien password :
        <input type="text" name="ancien_password" value="">
      </label>
    </p>
    <p>
      <label for="">Nouveau password :
        <input type="text" name="nouveau_password" value="">
      </label>
    </p>
    <button type="submit">Mise à jour</button>
  </form>
<?php }else { ?>

  <form class="login form" action="<?= $this->url('User_login') ?>" method="post">
    <label for="pseudo_login">Pseudo : </label>
    <input id="pseudo_login" type="text" name="pseudo" value=""><br>
    <label for="password_login">Mot de passe :</label>
    <input id="password_login" type="password" name="password" value=""><br>
    <button type="submit">Se connecter</button>
  </form>

<?php } ?>

<h3>S'inscrire</h3>
<form class="signup form" action="<?= $this->url('User_signUp') ?>" method="post">
  <label for="pseudo_signup">Pseudo :</label>
  <input id="pseudo_signup" type="text" name="pseudo" value=""><br>
  <label for="email_signup">Email :</label>
  <input id="email_signup" type="email" name="email" value=""><br>
  <label for="password_signup">Mot de passe :</label>
  <input id="password_signup" type="password" name="password" value=""><br>
  <label for="password_signup_check">Confirmation du mot de passe :</label>
  <input id="password_signup_check" type="password" name="password_check" value=""><br>
  <button type="submit">S'inscrire</button>
</form>
<?php $this->stop('main_content') ?>
