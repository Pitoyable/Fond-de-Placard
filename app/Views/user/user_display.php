<?php $this->layout('layout', ['title' => 'Mon compte']) ?>

<?php $this->start('main_content') ?>

<!-- Page mon compte / modification des infos -->
<!-- div global de tout le contenu -->
<div class="container container_mon_compte">
  <div class="ribbon both_ribbon">
    <h1>Mon compte</h1>
  </div>
  <h2><?= $_SESSION['user']['use_pseudo'] ?></h2><!--mettre le pseudo du user en cour-->

  <nav id="tabs" class="nav-tab">
    <ul>
      <a class="nav-a onfocus" href="#information" id="button_information"><li>Modifier mes infos</li></a>
      <a class="nav-a" href="#receipe" id="button_receipe"><li>Mes recettes</li></a>
    </ul>
  </nav>

  <div id="information" class="tabs block">
    <h3>Modifier mes infos :</h3>
    <!-- formulaire de modification des infos user -->
    <form class="form form_update_user" action="<?= $this->url('User_update') ?>" method="post">

      <p class="form-input">
        <label for="update_mail">Adresse Mail :</label>
        <input id="update_mail" type="text" name="use_email" value="<?= $_SESSION['user']['use_email'] ?>" required>
      </p>

      <p class="form-input">
        <label for="update_old_password">Ancien mot de passe :</label>
        <input id="update_old_password" type="password" name="old_use_password" placeholder="Ancien mot de passe" required>
      </p>

      <p class="form-input">
        <label for="update_new_password">Nouveau mot de passe :</label>
        <input id="update_new_password" type="password" name="use_password" placeholder="Nouveau mot de passe" required>
      </p>

      <button type="submit" name="update_user_submit">Valider</button>
    </form>
    <div id="erreurMonCompte" class="error">

    </div>
  </div> <!-- fin information -->

  <div id="receipe" class="tabs admin-nav ">
    <h3>Mes recettes</h3>
    <table>
      <tr>
        <th>Nom</th>
        <th>Type</th>
        <th>Validée</th>
      </tr>
      <?php for ($i=0; $i <count($array) ; $i++) { ?>
        <tr>
          <td><?= $array[$i]['rec_name']?></td>
          <td><?= $array[$i]['rec_type']?></td>
          <?php
          if($array[$i]['rec_valide'] == 0){
            $valide = 'Non';
          }else{
            $valide = 'Oui';
          } ?>
          <td><?= $valide ?></td>
        </tr>

    <?php  } ?>
    </table>
  </div> <!-- fin receipe -->

</div> <!-- fin de container -->

<?php $this->stop('main_content') ?>
