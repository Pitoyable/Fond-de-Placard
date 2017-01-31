Partie recipeModel :

  - insertBDD :
    - Method dériver de la méthode insert() de base du Framework, la principal différence est qu'elle ne retourne pas l'id

  - createThemeList :
    - Method créé pour récupérer l'intégralité des thèmes présents en BDD
    - Les insert dans des checkbox

  - findIngredient :
    - Method pour retourner les ingrédients trouvés en BDD pour l'ajout au panier

  - autoFindIngredient :
    - Method pour l'auto complétion
    - Return les ingrédients trouvés en BDD avec une requête SQL LIKE

  - addRecipe :
    - Method pour ajouter des recettes en BDD
    - Obligation de rentré la recette en premier pour récupérer son ID
    - Différente boucle pour les tables link_rec_the et link_ing_rec afin d'effectuer plusieurs requêtes SQL en fonction du nombre d'élément sélectionner

  - recipeNameExists :
    - Method qui vérifie si le nom d'une recette existe déjà en BDD

  - checkInfoRec :
    - Vérifie les infos envoyées au moment de l'ajout de recette

  - addRecipe BDD :
    - Ajoute la recette en BDD dans la partie recette, récupère son ID

  - addIngUserRecipeBdd :
    - Ajout les ingrédients et l'id de la recette en BDD dans la table de liaison 'link_ing_rec'
    - Ajout de l'utilisateur id en BDD dans la table de liaison 'link_rec_use'

  - checkThemeSelectedRecipe
    - Si des thèmes on était sélectionner, les ajoutent en BDD dans la table 'link_rec_the'

  - findRecipe :
    - Method pour trouver une recette en fonction des ingrédients du panier
    - Comporte une requete SQL de base si un seul ingrédient est sélectionné
    - Si plusieurs ingrédients sont sélectionnés, concatène

  - showRecipe :
    - method pour afficher les recettes sélectionnées

Partie User:

  - signUp :
    - méthode qui vérifie que :
                                - la taille du pseudo est bonne
                                - que les 2 mdp sont identique
                                - que la longueur du mdp est bonne
                                - que le pseudo et l'email n'existe pas déjà en bdd
    - si tous est bon on crée une clef crypter et on hash le mdp et on rentre toute ces information en bdd
    - on envoie un email avec un lien pour valider le compte

  - login :
    - on vérifie que l'email et le mdp existe ensemble en bdd
    - si oui on cherche l'utilisateur en base de donner avec son email
    - on vérifie si le compte a bien été validé
    - si tous est ok on rentre les valeurs en session

  - updateUser :
    - on vérifie que l'ancien et le nouveau mdp ne sont pas identiques
    - vérifier que le nouvel email et mdp n'existe pas déjà en bdd
    - on met à jouer les donner de l'utilisateur

  - validate :
    - avec la clef récupérer dans l'url on cherche si un utilisateur a cette clef si oui on valide le compte
