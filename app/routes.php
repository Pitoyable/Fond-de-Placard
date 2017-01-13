<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		//user
		['GET|POST', '/user_signIn/', 'User#signIn', 'User_signIn'],//inscription
		['GET|POST', '/user_login/', 'User#login', 'User_login'],//connexion
		['GET|POST', '/user_logout/', 'User#logout', 'User_logout'],//déconnexion
		['GET|POST', '/user_update/', 'User#update', 'User_update'],//mise à jour
		['GET|POST', '/user_valide/', 'User#valide', 'User_valide'],//valider email

		//recipe
		['GET|POST', '/recipe_show/', 'recipe#afficher', 'recipe_afficher'],// montrer
		['GET|POST', '/recipe_update/', 'recipe#update', 'recipe_update'],//mise à jour
		['GET|POST', '/recipe_written/', 'recipe#written', 'recipe_written'],// crée

		//trader_ht_trendmode
			['GET|POST', '/theme_show/', 'theme#afficher', 'theme_afficher'],// montrer
	);
