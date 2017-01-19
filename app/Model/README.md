

Partie recipeModel :
  - Method findIngredient() :
    - Permet de trouver un ingredient en base de donnée
    - Transmet le resulstat trouver à la method addIngPanier()

  - Method addIngPanier() :
    - Prend un argument qui est le resultat retournée par findIngredient()
    - Communique en AJAX avec le javascript pour transmettre l'ingredient dans le panier
