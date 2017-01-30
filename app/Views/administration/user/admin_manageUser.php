<?php $this->layout('layout', ['title' => 'Gestion des utilisateurs']) ?>




<?php $this->start('main_content') ?>
<div class="container admin-nav">

  <div class="ribbon both_ribbon">
    <h1>Gestion des utilisateurs</h1>
  </div>
  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>
  <table>
    <h2>Admin</h2>
    <tr>
      <th>Pseudo</th>
      <th>Email</th>
      <th>Valide</th>
      <th>Actions</th>
    </tr>
    <!-- Boucle sur les utilisateurs -->

    <?php

    for ($i=0; $i <count($array) ; $i++) {
      if($array[$i]['group_id'] == 1) { ?>
        <tr>
          <td><?= $array[$i]['use_pseudo'] ?></td>
          <td><?= $array[$i]['use_email'] ?></td>
          <td><?= $array[$i]['use_valide'] ?></td>

          <td>
            <form class="" action="<?= $this -> url('Administration_editUser') ?>" method="post">
              <label for="">
                <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form>
            <form class="" action<?= $this -> url('Administration_deleteUser') ?> method="post">
              <label for="">
                <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form>
          </td>
        </tr>
      <?php }
    } ?>
  </table>

  <table>
    <h2>Utilisateur</h2>
    <tr>
      <th>Pseudo</th>
      <th>Email</th>
      <th>Valide</th>
      <th>Actions</th>
    </tr>
    <!-- Boucle sur les utilisateurs -->
    <?php for ($i=0; $i <count($array) ; $i++) {
      if($array[$i]['group_id'] == 2){ ?>
        <tr>
          <td><?= $array[$i]['use_pseudo'] ?></td>
          <td><?= $array[$i]['use_email'] ?></td>
          <td><?= $array[$i]['use_valide'] ?></td>
          <td>
            <form class="" action="<?= $this -> url('Administration_editUser') ?>" method="post">
              <label for="">
                <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form>
            <form class="" action="<?= $this -> url('Administration_deleteUser') ?>" method="post">
              <label for="">
                <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form>
          </td>
        </tr>
      <?php }
    } ?>
  </table>
</div>
<?php $this->stop('main_content') ?>
