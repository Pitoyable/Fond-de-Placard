<?php $this->layout('layout', ['title' => 'Gestion des utilisateurs']) ?>

<?php $this->start('main_content') ?>
<h1>Gestion des utilisateurs</h1>

<table>
  <tr>
    <th>Pseudo</th>
    <th>Mot de passe</th>
    <th>Email</th>
    <th>Valide</th>
    <th>Groupe</th>
    <th>Actions</th>
  </tr>
  <!-- Boucle sur les utilisateurs -->
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <!-- A revoir la pertinence des boutons -->
    <td><button type="submit" name="modif">Modifier</button>
        <button type="submit" name="delete">Supprimer</button></td>
  </tr>
</table>
<?php $this->stop('main_content') ?>
