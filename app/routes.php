<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		//utilisateur
		['GET|POST', '/utilisateur_inscription', 'User#signIn', 'User_signIn'],//inscription
		['GET|POST', '/utilisateur_connexion', 'User#login', 'User_login'],//connexion
		['GET|POST', '/utilisateur_déconnexion', 'User#logout', 'User_logout'],//déconnexion
		['GET|POST', '/utilisateur_valide', 'User#valide', 'User_valide'],//valider email
		['GET|POST', '/utilisateur_mise_a_jour', 'User#update', 'User_update'],//mise à jour
		//connexion a la partie administration du site
		['GET|POST', '/administration_connexion', 'administration#connection', 'administration_connection'],
		//recette
		['GET|POST', '/recette_afficher', 'Recipe#display', 'Recipe_display'],// montrer
		['GET|POST', '/recette_mise_a_jour', 'Recipe#update', 'Recipe_update'],//mise à jour
		['GET|POST', '/recette_cree', 'Recipe#written', 'Recipe_written'],// crée

		//theme
		['GET|POST', '/theme_afficher', 'Theme#display', 'Theme_display'],// montrer

		//Info
		['GET|POST', '/info_afficher', 'Info#display', 'Info_display'],

		//Se fournir
		['GET|POST', '/fournir_afficher', 'Provide#display', 'Provide_display'],
	);
