Page J'ai Faim :

  - Recherche d'ingredients (formulaire en auto completion)

  - Recherche des recettes par ingredients

  - Fonction pour reset panier (supression de la variable $sql)



  -- Page recette à definir

  - Affichage de la recette une fois selectionner (uniquement si elle est valide)

  - Ajout et supression des favoris

  - Gestion de ses commentaires (création, modification et supression)


Page Log-in :

  - L'inscription d'un utilisateur

  - Envoie d'un email de validation

  - Connect d'un utilisateur

  - (fonction de Mot de passe perdu)


Mon compte :

  - Modification des informations du compte (Pseudo, (Email à definir selon le timing), Password)

  - Affichage des favoris

  - Option de deconnect


Page soirée :

  - Affichage des themes

  - Affichage des recettes lier au themes selectionner

  - (Ajout de recette)


Page admin :

  - Gestion des groupes utilisateurs

  - Gestion des utilisateurs

    - Create utilisateur

      $sql = "INSERT INTO user (use_pseudo, use_email, use_password, group_gro_id)
      VALUES (:use_pseudo, :use_email, :use_password, :group_gro_id)";

      array(
        "use_pseudo" => " ",
        "use_email" => " ",
        "use_password" => " ",
        "group_gro_id" => ,
      )

    - Modifier un utilisateur

      $sql =

  - Liste des recettes à validé

  - Possibilité de modifier une recette valide ou non
