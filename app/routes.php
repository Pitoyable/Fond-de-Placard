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
		['GET|POST', '/administration_admin_user', 'administration#manageUser', 'Administration_user'],
		['GET|POST', '/administration_valideRecette', 'administration#validRecipe', 'Administration_validRecipe'],

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
			//montrer
		['GET|POST', '/recette_ajax', 'Recipe#findIngredient', 'Recipe_findIngredient'],
	);
