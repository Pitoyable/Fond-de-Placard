<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<div class="container admin-nav">
  <div class="ribbon both_ribbon">
    <h1>Gestion des thèmes</h1>
  </div>
  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>


  <h2>Theme</h2>
  <!-- Boucle sur les utilisateurs -->
    <form class="" action="<?= $this -> url('Administration_addTheme') ?>" method="post">
      <label for="">Nom :
        <input type="text" name="name" value="">
      </label>
      <input type="submit" name="" value="Ajouter">
    </form>

    <table>
      <tr>
        <th>Nom</th>
        <th>Action</th>
      </tr>
      <?php
      for ($i=0; $i <count($array) ; $i++) { ?>
      <tr>
        <td><?= $array[$i]['the_name'] ?></td>
        <td>
          <form class="" action="<?= $this -> url('Administration_editTheme') ?>" method="post">
            <label for="">
              <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
              <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
            </label>
          </form>
          <form class="" action="<?= $this -> url('Administration_deleteTheme') ?>" method="post">
            <label for="">
              <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
              <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
            </label>
          </form>
        </td>
      </tr>
      <?php } ?>
    </table>
</div>
<?php $this->stop('main_content') ?>
