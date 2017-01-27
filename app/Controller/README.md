- RecipeController:

  - Display :
    - Affiche la view

  - written :
    - Affiche la page pour ajouter une recette
    - Recupere et affiche les differents themes dans des checkbox
    - Recupere et affiche les types des recettes dans un select
    - Utilise l'autocompletion des ingredients

  - addWritten :
    - Controller qui appel les differentes method pour ajouter une recette en BDD

  - findIngredient :
    - Controller pour les requetes AJAX d'ajout d'ingredients au panier

  - autoComplete :
    - Controller  pour les requetes AJAX d'autocompletion des ingredients

  - findRecipe :
    - Controller pour les requestes AJAX qui permette de trouver les recettes en fonction du panier

  - showRecipe :
    - Controller pour afficher la recette selectionner 
