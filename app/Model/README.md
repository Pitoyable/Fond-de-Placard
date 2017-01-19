

Partie recipeModel :
  - Method findIngredient() :
    - Permet de trouver un ingredient en base de donnée
    - Transmet le resulstat trouver à la method addIngPanier()

  - Method addIngPanier() :
    - Prend un argument qui est le resultat retournée par findIngredient()
    - Communique en AJAX avec le javascript pour transmettre l'ingredient dans le panier

  - Method findRecipe();
    - Recupere les données du panier (Ingredients)
    - Trouve les recettes en fonction des ingredients
    - Tri les recette en fonction du type (Entrées, Plat, Dessert)
    - Renvoie les données en Ajax pour un resultat dynamique
