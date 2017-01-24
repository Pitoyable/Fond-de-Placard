<?php $this->layout('layout', ['title' => 'Gestion des utilisateurs']) ?>




<?php $this->start('main_content') ?>
<h1>Gestion des utilisateurs</h1>
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
            <input type="hidden" name="id" value="<?=$array[$i]['id']?>">
            <button type="submit" name="modif">Modifier</button>
          </form>
          <form class="" action<?= $this -> url('Administration_deleteUser') ?> method="post">
            <input type="hidden" name="id" value="<?=$array[$i]['id']?>">
            <button type="submit" name="delete">Supprimer</button>
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
        <td><?= $array[$i]['group_id'] ?></td>
        <td>
          <form class="" action="<?= $this -> url('Administration_editUser') ?>" method="post">
            <input type="hidden" name="id" value="<?=$array[$i]['id']?>">
            <button type="submit" name="modif">Modifier</button>
          </form>
          <form class="" action="<?= $this -> url('Administration_deleteUser') ?>" method="post">
            <input type="hidden" name="id" value="<?=$array[$i]['id']?>">
            <button type="submit" name="delete">Supprimer</button>
          </form>
        </td>
      </tr>
    <?php }
  } ?>
</table>
<?php $this->stop('main_content') ?>
