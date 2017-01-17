-- Création de la base de donnée fond de placard

CREATE SCHEMA IF NOT EXISTS `fond_de_placard` DEFAULT     CHARACTER SET utf8 ;
USE `fond_de_placard` ;



-- Création de la table ingredients

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`ingredients` (
  `ing_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `ing_name` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`ing_id`)  COMMENT '',
  UNIQUE INDEX `ing_name_UNIQUE` (`ing_name` ASC)  COMMENT '')
  ENGINE = InnoDB;



-- // Création de la table picture

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`picture` (
  `pic_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pic_name` VARCHAR(255) NOT NULL COMMENT '',
  `pic_alt` VARCHAR(255) NOT NULL COMMENT '',
  `pic_description` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`pic_id`)  COMMENT '',
  UNIQUE INDEX `img_name_UNIQUE` (`pic_name` ASC)  COMMENT '')
ENGINE = InnoDB;



-- // Création de la table recipe

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`recipe` (
  `rec_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `rec_name` VARCHAR(255) NOT NULL COMMENT '',
  `rec_html` TEXT NOT NULL COMMENT '',
  `rec_type` VARCHAR(45) NOT NULL COMMENT '',
  `rec_valide` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  `picture_pic_id` INT NOT NULL DEFAULT 1 COMMENT '',
  PRIMARY KEY (`rec_id`)  COMMENT '',
  UNIQUE INDEX `rec_name_UNIQUE` (`rec_name` ASC)  COMMENT '',
  INDEX `fk_recipe_picture1_idx` (`picture_pic_id` ASC)  COMMENT '',
  CONSTRAINT `fk_recipe_picture1`
    FOREIGN KEY (`picture_pic_id`)
    REFERENCES `fond_de_placard`.`picture` (`pic_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- // Création de la table link_ing_rec

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`link_ing_rec` (
  `ingredients_ing_id` INT NOT NULL COMMENT '',
  `recipe_rec_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`ingredients_ing_id`, `recipe_rec_id`)  COMMENT '',
  INDEX `fk_ingredients_has_recipe_recipe1_idx` (`recipe_rec_id` ASC)  COMMENT '',
  INDEX `fk_ingredients_has_recipe_ingredients_idx` (`ingredients_ing_id` ASC)  COMMENT '',
  CONSTRAINT `fk_ingredients_has_recipe_ingredients`
    FOREIGN KEY (`ingredients_ing_id`)
    REFERENCES `fond_de_placard`.`ingredients` (`ing_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredients_has_recipe_recipe1`
    FOREIGN KEY (`recipe_rec_id`)
    REFERENCES `fond_de_placard`.`recipe` (`rec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- // Création de la table group

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`group` (
  `gro_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `gro_name` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`gro_id`)  COMMENT '',
  UNIQUE INDEX `gro_name_UNIQUE` (`gro_name` ASC)  COMMENT '')
ENGINE = InnoDB;



-- // Création de la table User

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`user` (
  `use_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `use_pseudo` VARCHAR(45) NOT NULL COMMENT '',
  `use_email` VARCHAR(45) NOT NULL COMMENT '',
  `use_password` VARCHAR(60) NOT NULL COMMENT '',
  `use_valide` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  `group_gro_id` INT NOT NULL DEFAULT 1 COMMENT '',
  PRIMARY KEY (`use_id`)  COMMENT '',
  UNIQUE INDEX `use_pseudo_UNIQUE` (`use_pseudo` ASC)  COMMENT '',
  UNIQUE INDEX `use_email_UNIQUE` (`use_email` ASC)  COMMENT '',
  INDEX `fk_user_group1_idx` (`group_gro_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_group1`
    FOREIGN KEY (`group_gro_id`)
    REFERENCES `fond_de_placard`.`group` (`gro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- // Création de la table link_rec_use

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`link_rec_use` (
  `recipe_rec_id` INT NOT NULL COMMENT '',
  `user_use_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`recipe_rec_id`, `user_use_id`)  COMMENT '',
  INDEX `fk_recipe_has_user_user1_idx` (`user_use_id` ASC)  COMMENT '',
  INDEX `fk_recipe_has_user_recipe1_idx` (`recipe_rec_id` ASC)  COMMENT '',
  CONSTRAINT `fk_recipe_has_user_recipe1`
    FOREIGN KEY (`recipe_rec_id`)
    REFERENCES `fond_de_placard`.`recipe` (`rec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_user_user1`
    FOREIGN KEY (`user_use_id`)
    REFERENCES `fond_de_placard`.`user` (`use_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- // Création de la table comment

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`comment` (
  `com_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `com_content` TEXT NULL DEFAULT NULL COMMENT '',
  `com_fav` TINYINT(1) NULL DEFAULT NULL COMMENT '',
  `com_date` DATETIME NULL DEFAULT NULL COMMENT '',
  `com_rec_id` INT NOT NULL COMMENT '',
  `com_use_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`com_id`)  COMMENT '',
  INDEX `fk_comment_recipe_has_user1_idx` (`com_rec_id` ASC, `com_use_id` ASC)  COMMENT '',
  CONSTRAINT `fk_comment_recipe_has_user1`
    FOREIGN KEY (`com_rec_id` , `com_use_id`)
    REFERENCES `fond_de_placard`.`link_rec_use` (`recipe_rec_id` , `user_use_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- // Création de la table theme

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`theme` (
  `the_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `the_name` VARCHAR(45) NOT NULL COMMENT '',
  `the_valide` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`the_id`)  COMMENT '',
  UNIQUE INDEX `the_name_UNIQUE` (`the_name` ASC)  COMMENT '')
ENGINE = InnoDB;



-- // Création de la table link_rec_the

CREATE TABLE IF NOT EXISTS `fond_de_placard`.`link_rec_the` (
  `recipe_rec_id` INT NOT NULL COMMENT '',
  `theme_the_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`recipe_rec_id`, `theme_the_id`)  COMMENT '',
  INDEX `fk_recipe_has_theme_theme1_idx` (`theme_the_id` ASC)  COMMENT '',
  INDEX `fk_recipe_has_theme_recipe1_idx` (`recipe_rec_id` ASC)  COMMENT '',
  CONSTRAINT `fk_recipe_has_theme_recipe1`
    FOREIGN KEY (`recipe_rec_id`)
    REFERENCES `fond_de_placard`.`recipe` (`rec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_has_theme_theme1`
    FOREIGN KEY (`theme_the_id`)
    REFERENCES `fond_de_placard`.`theme` (`the_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- // Fin de création de la base de donnée

-- // Debut d instruction de la base de donnée

-- //Ajout des ingredients

  -- //Créaton du tableau des ingredients

  INSERT INTO ingredients (ing_name)  VALUES
    ('ail cultivé '),
    ('asperge '),
    ('ail d\'Orient '),
    ('ail rocambole '),
    ('amarante '),
    ('ansérine bon-henri '),
    ('añu'),
    ('arachide '),
    ('arroche '),
    ('artichaut '),
    ('aubergine '),
    ('avocat '),
    ('azuki '),
    ('bambou'),
    ('banane plantain '),
    ('bardane '),
    ('baselle '),
    ('basilic '),
    ('bénincasa '),
    ('bette à carde '),
    ('betterave '),
    ('blette '),
    ('brèdes '),
    ('brocoli '),
    ('brocoli chinois '),
    ('bunias d\'Orient '),
    ('calebasse '),
    ('canna comestible '),
    ('capucine tubéreuse '),
    ('cardon '),
    ('carotte '),
    ('céleri '),
    ('céleri-rave '),
    ('cerfeuil tubéreux '),
    ('châtaigne d\'eau '),
    ('châtaigne de terre '),
    ('chayote '),
    ('chénopode Bon-Henri '),
    ('chervis '),
    ('chia '),
    ('chicon '),
    ('chicorée '),
    ('chou '),
    ('chou de Bruxelles '),
    ('chou cabus '),
    ('chou chinois '),
    ('chou-fleur '),
    ('chou frisé '),
    ('chou-navet '),
    ('chou palmier '),
    ('chou palmiste '),
    ('chou de Pékin '),
    ('chou-rave '),
    ('chou romanesco '),
    ('christophine '),
    ('ciboule '),
    ('ciboule de Chine '),
    ('ciboulette '),
    ('citrouille '),
    ('claytone de Cuba '),
    ('coqueret du Pérou '),
    ('concombre '),
    ('cornichon '),
    ('courge '),
    ('courgette '),
    ('courge cireuse '),
    ('courge musquée '),
    ('courge de Siam '),
    ('cresson alénois '),
    ('cresson de fontaine '),
    ('cresson des jardins '),
    ('cresson de terre '),
    ('cresson d\'hiver '),
    ('cresson de Para '),
    ('crosne du Japon '),
    ('curcuma '),
    ('dachine '),
    ('daikon '),
    ('dolique asperge '),
    ('dolique lablab '),
    ('échalote '),
    ('endive '),
    ('épinard '),
    ('épinard de Malabar '),
    ('fenouil '),
    ('fève '),
    ('ficoïde glaciale '),
    ('frisée'),
    ('flageolet '),
    ('gingembre '),
    ('glycine tubéreuse '),
    ('gombo '),
    ('gourde '),
    ('grande bardane '),
    ('grelos '),
    ('guimauve officinale '),
    ('haricot'),
    ('haricot d\'Espagne '),
    ('haricot de Lima'),
    ('haricot kilomètre'),
    ('haricot mungo'),
    ('hélianthi '),
    ('houttuynia '),
    ('igname ailée '),
    ('jaque '),
    ('jujube '),
    ('kancon '),
    ('konbu '),
    ('laitue '),
    ('lentille '),
    ('lys asiatique comestible '),
    ('luffa '),
    ('maceron '),
    ('mâche '),
    ('maïs doux '),
    ('manioc '),
    ('margose '),
    ('mauve '),
    ('marron '),
    ('mizuna '),
    ('momordique '),
    ('menthe '),
    ('navet '),
    ('niébé '),
    ('nombril de Vénus '),
    ('oca du Pérou '),
    ('oignon '),
    ('oignon de Chine '),
    ('okra '),
    ('onagre '),
    ('ortie '),
    ('oseille '),
    ('pak choï '),
    ('panais '),
    ('pastèque '),
    ('patate douce '),
    ('pâtisson '),
    ('persil '),
    ('petit pois '),
    ('périlla '),
    ('pe-tsaï '),
    ('physalis '),
    ('piment '),
    ('pissenlit '),
    ('poireau '),
    ('poirée '),
    ('poire de terre '),
    ('pois sec '),
    ('pois carré '),
    ('pois chiche '),
    ('pomme de terre '),
    ('pois d\'Angole '),
    ('pois sabre '),
    ('poivron '),
    ('potiron '),
    ('potimarron '),
    ('pourpier '),
    ('radis '),
    ('radis noir '),
    ('radis mougri '),
    ('radis du Japon '),
    ('raifort '),
    ('romaine '),
    ('roquette '),
    ('rutabaga '),
    ('rhubarbe '),
    ('salicorne '),
    ('salsifis '),
    ('scarole '),
    ('scorsonère '),
    ('serpent végétal '),
    ('shiso '),
    ('soja '),
    ('souchet comestible '),
    ('taro '),
    ('tétragone cornue '),
    ('tinda '),
    ('tomate '),
    ('topinambour '),
    ('turmeric '),
    ('udo '),
    ('wakame '),
    ('wasabi '),
    ('yin tsoï ');






  -- //Fin d ajout des ingredients

  -- //Ajout des 3 groupes defini (utilsiateur par default(1), moderateur et admin)

    -- // Groupe utilisateur
    INSERT INTO `group`(`gro_id`, `gro_name`) VALUES (1, 'utilisateur');



    -- //Groupe moderateur
    INSERT INTO `group`(`gro_id`, `gro_name`) VALUES (2, 'moderateur');



    -- //Groupe admin
    INSERT INTO `group`(`gro_id`, `gro_name`) VALUES (3, 'admin');



  -- // Fin d'ajout des groupes
