- RecipeController:

  - Display :
    - Affiche la view

  - findIngredient :
    - Controller pour les traite les requetes AJAX pour l'ajout d'ingredients au panier

  - autoComplete :
    - Controller pour traite les requetes AJAX l'autocomplementation des ingredients

  - written :
    - Affiche la page pour ajouter une recette
    - Recupere et affiche les differents themes dans des checkbox
    - Recupere et affiche les types des recettes dans un select
    - Utilise l'autocomplementation des ingredients

  - addWritten :
    - Traite le formulaire envoyer par written
    - Verifie si les champs son remplis
    - Ajoute les données en BDD
