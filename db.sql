DROP DATABASE IF EXISTS `doableApp`;

CREATE DATABASE `doableApp`
CHARACTER SET UTF8 COLLATE utf8_general_ci;
USE `doableApp`;

/* POUZIVATEL, OPRAVNENIA + PREPOJENIA*/
CREATE TABLE `roles`(
    `id` INT AUTO_INCREMENT NOT NULL,
    `role` varchar(30) NOT NULL,
    
    PRIMARY KEY (`id`)
    ) ENGINE = INNODB DEFAULT CHARSET=utf8;
    
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` varchar(50) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(50) NOT NULL,
    `img` varchar(100) DEFAULT NULL,
    `bio` TEXT DEFAULT NULL,
    `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
    ) ENGINE =INNODB DEFAULT CHARSET= utf8;

CREATE TABLE `user_role` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `id_user` INT NOT NULL,
    `id_role` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id`),
    FOREIGN KEY (`id_role`) REFERENCES `roles`(`id`)
) ENGINE= INNODB DEFAULT CHARSET= utf8;

/*KATEGORIE, POZNAMKY
   
 */
CREATE TABLE `categories` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50),
    PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `notes` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `id_user` INT NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `img` VARCHAR(100) DEFAULT NULL, /* V IMAGE bude cesta */
    `note` TEXT NOT NULL,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `category` INT NOT NULL,
   
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id`),
    FOREIGN KEY (`category`) REFERENCES `categories`(`id`)
    ) ENGINE= INNODB DEFAULT CHARSET= utf8;
