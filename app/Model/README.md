Partie recipeModel :

  - insertBDD :
    - Method deriver de la method insert() de base du framework, la principal difference est qu'elle ne retourne pas l'id

  - createThemeList :
    - Method créer pour recuperer l'integralité des themes present en BDD
    - Les insert dans des checkbox

  - findIngredient :
    - Method pour retourner les ingredients trouver en BDD pour l'ajout au panier

  - autoFindIngredient :
    - Method pour l'autocompletion
    - Return les ingredients trouver en BDD avec une requete SQL LIKE

  - addRecipe :
    - Method pour ajouter des recettes en BDD
    - Obligation de rentré la recipe en premier pour recuperé son ID
    - Differente boucle pour les table link_rec_the et link_ing_rec afin d'effectuer plusieurs requete SQL en fonction du nombre d'element selectionner

  - recipeNameExists :
    - Method qui verifie si le nom d'une recette existe deja en BDD

  - checkInfoRec :
    - Verifie les info envoyer au moment de l'ajout de recette

  - addRecipe BDD :
    - Ajoute la recette en BDD dans la partie recette, recupere son ID

  - addIngUserRecipeBdd :
    - Ajout les ingredients et l'id de la recette en BDD dans la table de liaison 'link_ing_rec'
    - Ajout de l'utilisateur id en BDD dans la table de liaison 'link_rec_use'

  - checkThemeSelectedRecipe
    - Si des themes on était selectionner, les ajoutent en BDD dans la table 'link_rec_the'

  - findRecipe :
    - Method pour trouver une recette en fonction des ingredients du panier
    - Comporte une requete SQL de base si un seul ingredient est selectionner
    - Si plusieurs ingredients sont selectionner, concatene

  - showRecipe :
    - method pour afficher les recette selectionner
