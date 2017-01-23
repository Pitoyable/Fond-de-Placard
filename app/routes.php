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
			//gerer les utililsateur et leur droit
		['GET|POST', '/administration_gerer_user', 'administration#manageUser', 'Administration_manageUser'],
			//route pour formulaire de modification de l'user
		['GET|POST', '/administration_gerer_user/modifier', 'administration#editUser', 'Administration_editUser'],
			//mettre à jour es information de l'utilisateur
		['GET|POST', '/administration_gerer_user/mise_a_jour', 'administration#updateUser', 'Administration_updateUser'],
			//supprimer l'utilisateur
		['GET|POST', '/administration_gerer_user/supprimer', 'administration#removeUser', 'Administration_removeUser'],
			//gerer les themes
		['GET|POST', '/administration_gerer_theme', 'administration#manageTheme', 'Administration_manageTheme'],
			// valider et modifier less recettes
		['GET|POST', '/administration_gerer_Recette', 'administration#manageRecipe', 'Administration_manageRecipe'],

		//recette
			// montrer
		['GET|POST', '/recette_afficher', 'Recipe#display', 'Recipe_display'],
			//mise à jour
		['GET|POST', '/recette_mise_a_jour', 'Recipe#update', 'Recipe_update'],
			// crée
		['GET|POST', '/recette_cree', 'Recipe#written', 'Recipe_written'],

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
	);
