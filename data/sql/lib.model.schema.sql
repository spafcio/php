
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- rise_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_article`;


CREATE TABLE `rise_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`category_id` INTEGER  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`image` VARCHAR(255),
	`short` VARCHAR(255),
	`content` TEXT  NOT NULL,
	`author` VARCHAR(255)  NOT NULL,
	`is_main_of_category` TINYINT default 0 NOT NULL,
	`is_main_of_day` TINYINT default 0 NOT NULL,
	`is_news` TINYINT default 0 NOT NULL,
	`is_public` TINYINT default 0 NOT NULL,
	`is_intrash` TINYINT default 0 NOT NULL,
	`token` VARCHAR(255)  NOT NULL,
	`root` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `rise_article_U_1` (`token`),
	INDEX `rise_article_FI_1` (`category_id`),
	CONSTRAINT `rise_article_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `rise_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_category`;


CREATE TABLE `rise_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_menu
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_menu`;


CREATE TABLE `rise_menu`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`title` VARCHAR(255),
	`is_activated` TINYINT default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_menu_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_menu_item`;


CREATE TABLE `rise_menu_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`menu_id` INTEGER  NOT NULL,
	`order` INTEGER,
	`title` VARCHAR(255)  NOT NULL,
	`url` VARCHAR(255)  NOT NULL,
	`article_id` INTEGER,
	`category_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `rise_menu_item_FI_1` (`menu_id`),
	CONSTRAINT `rise_menu_item_FK_1`
		FOREIGN KEY (`menu_id`)
		REFERENCES `rise_menu` (`id`)
		ON DELETE CASCADE,
	INDEX `rise_menu_item_FI_2` (`article_id`),
	CONSTRAINT `rise_menu_item_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `rise_article` (`id`)
		ON DELETE CASCADE,
	INDEX `rise_menu_item_FI_3` (`category_id`),
	CONSTRAINT `rise_menu_item_FK_3`
		FOREIGN KEY (`category_id`)
		REFERENCES `rise_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_affiliate`;


CREATE TABLE `rise_affiliate`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(255)  NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	`token` VARCHAR(255)  NOT NULL,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `rise_affiliate_U_1` (`email`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_category_affiliate
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_category_affiliate`;


CREATE TABLE `rise_category_affiliate`
(
	`category_id` INTEGER  NOT NULL,
	`affiliate_id` INTEGER  NOT NULL,
	PRIMARY KEY (`category_id`,`affiliate_id`),
	CONSTRAINT `rise_category_affiliate_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `rise_category` (`id`)
		ON DELETE CASCADE,
	INDEX `rise_category_affiliate_FI_2` (`affiliate_id`),
	CONSTRAINT `rise_category_affiliate_FK_2`
		FOREIGN KEY (`affiliate_id`)
		REFERENCES `rise_affiliate` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_comment`;


CREATE TABLE `rise_comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`article_id` INTEGER  NOT NULL,
	`author` VARCHAR(255)  NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	`content` TEXT  NOT NULL,
	`is_public` TINYINT default 0 NOT NULL,
	`token` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `rise_comment_U_1` (`token`),
	INDEX `rise_comment_FI_1` (`article_id`),
	CONSTRAINT `rise_comment_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `rise_article` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rise_todo_list
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rise_todo_list`;


CREATE TABLE `rise_todo_list`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`content` VARCHAR(255)  NOT NULL,
	`is_done` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
