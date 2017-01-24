Partie recipeModel :

  - insertBDD :
    - Method deriver de la method insert() de base du framework, la principal difference est quel ne return pas d'id

  - createThemeList :
    - Method créer pour recuperer l'integralité des themes present en BDD
    - Les insert dans des checkbox

  - findIngredient :
    - Method pour retourner les ingredients trouver par l'autocomplementation

  - autoFindIngredient :
    - Method pour l'autocomplementation
    - Return les ingredients trouver en BDD avec une requete SQL LIKE

  - addRecipe :
    - Method pour ajouter des recettes en BDD
    - Obligation de rentré la recipe en premier pour recuperé son ID
    - Differente boucle pour les table link_rec_the et link_ing_rec afin d'effectuer plusieurs requete SQL en fonction du nombre d'element selectionner
