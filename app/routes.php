<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		//utilisateur
			//inscription
		['GET|POST', '/utilisateur_inscription', 'User#signUp', 'User_signUp'],
			//connexion
		['GET|POST', '/utilisateur_connexion', 'User#login', 'User_login'],
			//déconnexion
		['GET|POST', '/utilisateur_deconnexion', 'User#logout', 'User_logout'],
			//valider email
		['GET|POST', '/utilisateur_valide', 'User#valide', 'User_valide'],
			//mise à jour
		['GET|POST', '/utilisateur_mise_a_jour', 'User#update', 'User_update'],
			//Afficher
		['GET|POST', '/utilisateur_afficher', 'User#display', 'User_display'],
		 //Page avec les formulaire de d'inscription et connexion
	 	['GET|POST', '/utilisateur_acces', 'User#acess', 'User_acess'],


		//connexion a la partie administration du site
		['GET|POST', '/administration_admin_home', 'administration#adminHome', 'Administration_home'],
			//admin - user
				//gerer les utililsateur et leur droit
			['GET|POST', '/administration_gerer_user', 'administration#manageUser', 'Administration_manageUser'],
				//route pour formulaire de modification de l'user
			['GET|POST', '/administration_gerer_user/modifier', 'administration#editUser', 'Administration_editUser'],
				//mettre à jour es information de l'utilisateur
			['GET|POST', '/administration_gerer_user/mise_a_jour', 'administration#updateUser', 'Administration_updateUser'],
				//supprimer l'utilisateur
			['GET|POST', '/administration_gerer_user/supprimer', 'administration#deleteUser', 'Administration_deleteUser'],

			//Admin - theme
				//gerer les themes
			['GET|POST', '/administration_gerer_theme', 'administration#manageTheme', 'Administration_manageTheme'],
			// ajouter theme
			['GET|POST', '/administration_gerer_theme/ajouter', 'administration#addTheme', 'Administration_addTheme'],
				// modifier theme
			['GET|POST', '/administration_gerer_theme/modifier', 'administration#editTheme', 'Administration_editTheme'],
				// mise à jour theme
			['GET|POST', '/administration_gerer_theme/mise_a_jour', 'administration#updateTheme', 'Administration_updateTheme'],
				// supprimer theme
			['GET|POST', '/administration_gerer_theme/supprimer', 'administration#deleteTheme', 'Administration_deleteTheme'],

			//Admin - Recette
				// affiche les recettes valide et non-valide
			['GET|POST', '/administration_gerer_Recette', 'administration#manageRecipe', 'Administration_manageRecipe'],
				// modifier recette
			['GET|POST', '/administration_gerer_Recette/modifier', 'administration#editRecipe', 'Administration_editRecipe'],
				// mise à jour recette
			['GET|POST', '/administration_gerer_Recette/mise_a_jour', 'administration#updateRecipe', 'Administration_updateRecipe'],
				// supprimer recette
			['GET|POST', '/administration_gerer_Recette/supprimer', 'administration#deleteRecipe', 'Administration_deleteRecipe'],
			// valider recette
			['GET|POST', '/administration_gerer_Recette/valider', 'administration#validateRecipe', 'Administration_validateRecipe'],

		//recette
			// montrer
		['GET|POST', '/recette_afficher', 'Recipe#display', 'Recipe_display'],
			//mise à jour
		['GET|POST', '/recette_mise_a_jour', 'Recipe#update', 'Recipe_update'],
			// crée
		['GET|POST', '/recette_cree', 'Recipe#written', 'Recipe_written'],
			// crée test de theo
		['GET|POST', '/recette_confirme', 'Recipe#addWritten', 'Recipe_addWritten'],

		//theme
			// montrer
		['GET|POST', '/theme_afficher', 'Theme#display', 'Theme_display'],

		//Info
			//montrer
		['GET|POST', '/info_afficher', 'Info#display', 'Info_display'],

		//Se fournir
			//montrer
		['GET|POST', '/fournir_afficher', 'Provide#display', 'Provide_display'],

		//Ajax
			//Ajouter Ingredients panier
		['GET|POST', '/recipe_ajaxFind', 'Recipe#findIngredient', 'Recipe_findIngredient'],
			//autocomplementation
		['GET|POST', '/recipe_ajaxComplete', 'Recipe#autoComplete', 'Recipe_autocomplete'],
			//Recherche de recette
		['GET|POST', '/recipe_ajaxFindRecipe', 'Recipe#findRecipe', 'Recipe_findRecipe'],
	);
