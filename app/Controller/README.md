- RecipeController:

  - Display :
    - On affiche la view

  - written :
    - Affiche la page pour ajouter une recette
    - Récupère et affiche les différents thèmes dans des checkbox
    - Récupère et affiche les types des recettes dans un select
    - Utilise l'auto complétion des ingrédients

  - addWritten :
    - Controller qui appel les différentes méthodes pour ajouter une recette en BDD

  - findIngredient :
    - Controller pour les requêtes AJAX d'ajout d'ingrédients au panier

  - autoComplete :
    - Controller  pour les requêtes AJAX d'auto complétion des ingrédients

  - findRecipe :
    - Controller pour les requêtes AJAX qui permette de trouver les recettes en fonction du panier

  - showRecipe :
    - Controller pour afficher la recette sélectionnée


- User controller:

  - signUp:
    - Envoie les informations reçues en AJAX du formulaire d'inscription vers la méthode
    - Retourne la réponse en JSON pour l'AJAX

  - login:
    - Envoie les informations reçues en AJAX du formulaire de connexion vers la méthode
    - Retourne la réponse en JSOn pour l'AJAX

  - logout:
    - Appelle la méthode pour vers fermer la session et affiche au home du site

  - display :
    - Vérifier que la SESSION existe, et affiche la page du compte si c'est le cas

  - update :
    - Envoie les informations reçues en AJAX du formulaire de mise à jour du compte vers la méthode
    - Retourne la réponse en JSON pour l'AJAX

  - validate :
    - Il envoie la valeur de GET['clef'] qui est dans l'url a la méthode
    - Il contrôle la réponse pour afficher la bonne page


- Administration controller:
  Toutes les méthodes du contrôleur, appelle le model pour vérifier que l'on a bien les droit pour ce trouver sur ses pages

  - adminHome:
    - Affiche le home admin

  - manageUser:  
    - Appelle la méthode pour avoir la liste de tous les utilisateurs de la bdd

  - editUser:
    - On récupère tous les informations de l'utilisateur que l'on veut modifier avec son id

  - updateUser:
    - On met à jour les informations de l'utilisateur

  - deleteUser:
    - On appelle la méthode pour supprimer  le compte de l'utilisateur sélectionné

  - manageRecipe
    - Appelle la méthode pour avoir la liste de toutes les recettes de la bdd

  - editRecipe:
    - On récupère tous les informations de la recette que l'on veut modifier avec son id

  - updateRecipe:
    - On met à jour les informations de la recette, en vérifiant que le nous nom n'existe pas dans la bdd

  - deleteRecipe:
    - On appelle la méthode pour supprimer  la recette sélectionné

  - validateRecipe:
    - On met a jour les information de la recette sélectionner pour la valider

  - manageTheme:  
    - Appelle la méthode pour avoir la liste de tous les thèmes de la bdd

  - addTheme:
    - On appelle la méthode pour crée un thème

  - editTheme:
    - On récupère tous les informations du thème que l'on veut modifier avec son id

  - updateTheme:
    - On met à jour les informations du thème

    - deleteTheme:
      - On appelle la méthode pour supprimer  le thème sélectionner
