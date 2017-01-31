<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<div class="container admin-nav">
  <div class="ribbon both_ribbon">
    <h1>Gestion des recettes :</h1>
  </div>
  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>

    <h2>Recette valide : </h2>
    <table>
      <tr>
        <th>Nom de la recette</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
  <?php
  for ($i=0; $i <count($array) ; $i++) {
    if($array[$i]['rec_valide'] == 1) { ?>
        <tr>
          <td><?= $array[$i]['rec_name'] ?></td>
          <td><?= $array[$i]['rec_type'] ?></td>
          <td>
            <form class="" action="<?= $this -> url('Administration_editRecipe') ?>" method="post">
              <label for="">
                <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form>
            <!-- <form class="" action="<?= $this -> url('Administration_deleteRecipe') ?>" method="post">
              <label for="">
                <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
              </label>
            </form> -->
          </td>
        </tr>
    <?php }
  } ?>
    </table>
    <h2>Recette non valide :</h2>
    <table>
      <tr>
        <th>Nom de la recette</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    <?php
    for ($i=0; $i <count($array) ; $i++) {
      if($array[$i]['rec_valide'] == 0) { ?>
      <tr>
        <td><?= $array[$i]['rec_name'] ?></td>
        <td><?= $array[$i]['rec_type'] ?></td>
        <td>
          <form class="" action="<?= $this -> url('Administration_editRecipe') ?>" method="post">
            <label for="">
              <button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
              <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
            </label>
          </form>
          <form class="" action="<?= $this -> url('Administration_deleteRecipe') ?>" method="post">
            <label for="">
              <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
              <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
            </label>
          </form>
          <!-- <form class="" action="<?= $this -> url('Administration_validateRecipe') ?>" method="post">
            <label for="">
              <button type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
              <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
            </label>
          </form> -->
        </td>
      </tr>
      <?php }
    } ?>
  </table>
</div>
<?php $this->stop('main_content') ?>
