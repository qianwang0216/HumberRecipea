
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Recipea` DEFAULT CHARACTER SET latin1 ;
USE `Recipea` ;

-- -----------------------------------------------------Recipea
-- Table `Recipea`.`about_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`about_us` (
    `idAbout` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idAbout`)
)  ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`admin` (
    `userId` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `flag` INT(11) NOT NULL,
    `email` VARCHAR(45) NULL DEFAULT NULL,
    `picture` VARCHAR(255) NULL DEFAULT 'pictures/admin_default.jpg',
    `newsInfo` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`userId`),
    UNIQUE INDEX `usernameAdmin_UNIQUE` (`username` ASC),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC)
)  ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`media` (
    `idMedia` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45) NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `video` VARCHAR(45) NOT NULL,
    `picture` VARCHAR(45) NOT NULL,
    `userId` INT(11) NOT NULL,
    PRIMARY KEY (`idMedia`),
    INDEX `fk_media_idx` (`userId` ASC),
    CONSTRAINT `fk_media` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`ingredients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`ingredients` (
    `idIngredients` INT(11) NOT NULL AUTO_INCREMENT,
    `idRecipe` INT(11) NULL DEFAULT NULL,
    `ingredient` VARCHAR(45) NOT NULL,
    `amount` INT(11) NOT NULL,
    `measure` VARCHAR(45) NOT NULL,
    `calory` DECIMAL(18 , 2 ) NOT NULL,
    `userId` INT(11) NOT NULL,
    `image` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idIngredients`),
    INDEX `fk_ingredients_idx` (`idRecipe` ASC),
    INDEX `fk_ingredients_idx1` (`userId` ASC),
    CONSTRAINT `fk_ingredients` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`recipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`recipes` (
    `idRecipe` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `image` VARCHAR(45) NOT NULL,
    `pretime` INT(11) NOT NULL,
    `cooktime` INT(11) NOT NULL,
    `instruction` TEXT NOT NULL,
    `servings` INT(11) NOT NULL,
    `country` VARCHAR(500) NOT NULL,
    `vote` TINYINT(1) NOT NULL DEFAULT '0',
    `userId` INT(11) NOT NULL,
    PRIMARY KEY (`idRecipe`),
    INDEX `fk_recipes_1_idx` (`userId` ASC),
    CONSTRAINT `fk_recipes_1` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_recipes_2` FOREIGN KEY (`idRecipe`)
        REFERENCES `Recipea`.`ingredients` (`idRecipe`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`comment` (
    `idComment` INT(11) NOT NULL AUTO_INCREMENT,
    `content` VARCHAR(255) NOT NULL,
    `userId` INT(11) NOT NULL,
    `date` DATE NOT NULL,
    `idRecipe` INT(11) NULL DEFAULT NULL,
    `idMedia` INT(11) NULL DEFAULT NULL,
    `flag` INT(11) NOT NULL,
    PRIMARY KEY (`idComment`),
    INDEX `fk_comment_idx` (`userId` ASC),
    INDEX `fk_idRecipe_idx` (`idRecipe` ASC),
    INDEX `fk_idMedia_idx` (`idMedia` ASC),
    CONSTRAINT `fk_idMedia` FOREIGN KEY (`idMedia`)
        REFERENCES `Recipea`.`media` (`idMedia`)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_comment` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_idRecipe` FOREIGN KEY (`idRecipe`)
        REFERENCES `Recipea`.`recipes` (`idrecipe`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`contact` (
    `idContact` INT(11) NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(45) NOT NULL,
    `lname` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `phone` VARCHAR(45) NULL DEFAULT NULL,
    `message` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idContact`)
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`event_calendar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`event_calendar` (
    `idEvent` INT(11) NOT NULL AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `title` VARCHAR(45) NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(45) NOT NULL,
    `userId` INT(11) NOT NULL,
    PRIMARY KEY (`idEvent`),
    UNIQUE INDEX `date_UNIQUE` (`date` ASC),
    INDEX `fk_event_calendar_idx` (`userId` ASC),
    CONSTRAINT `fk_event_calendar` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`facebook_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`facebook_info` (
    `id_facebook` INT(11) NOT NULL AUTO_INCREMENT,
    `code_parameter` VARCHAR(255) NOT NULL,
    `access_token` VARCHAR(255) NOT NULL,
    `response_name` VARCHAR(255) NOT NULL,
    `response_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_facebook`)
)  ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`game` (
    `idGame` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45) NOT NULL,
    `instruction` TEXT NOT NULL,
    `sourceLink` VARCHAR(45) NOT NULL,
    `picture` VARCHAR(45) NOT NULL,
    `userId` INT(11) NOT NULL,
    PRIMARY KEY (`idGame`),
    INDEX `fk_game_idx` (`userId` ASC),
    CONSTRAINT `fk_game` FOREIGN KEY (`userId`)
        REFERENCES `Recipea`.`admin` (`userId`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`newsletter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recipea`.`newsletter` (
    `idNewsletter` INT(11) NOT NULL AUTO_INCREMENT,
    `content` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idNewsletter`)
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Date: 2014-02-13 16:07

INSERT INTO `about_us` (`idAbout`,`title`,`content`,`date`,`image`) VALUES (1,'About Us','test','2014-02-02','pictures/about_pic1.jpg');

-- Date: 2014-02-13 16:15

INSERT INTO `newsletter` (`idNewsletter`,`content`) VALUES (1,'Hello World!');
INSERT INTO `newsletter` (`idNewsletter`,`content`) VALUES (2,'Our recipe website is good!');

-- Date: 2014-02-13 16:11

INSERT INTO `contact` (`idContact`,`fname`,`lname`,`email`,`phone`,`message`) VALUES (1,'Lily','White','abc@hotmail.com','4162221111','Hello World!');
INSERT INTO `contact` (`idContact`,`fname`,`lname`,`email`,`phone`,`message`) VALUES (2,'Bernie','Monette','bernie@gmail.com','6471112341','Bye Bye!');

-- Date: 2014-02-13 16:12

INSERT INTO `facebook_info` (`id_facebook`,`code_parameter`,`access_token`,`response_name`,`response_id`) VALUES (1,'AQAnb2EpZ41kt0BKWHjWqE0ejfk9WM','CAACTVCcv698BALweaniaeRpkEByG1zmqZAMLhCnTa0Si2DGW','qian.wang.9217','9119781312');


-- Date: 2014-02-13 16:09

INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (1,'Qian','123',0,'qian@163.com','pictures/admin_1.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (2,'James','345',0,'james@hotmail.com','pictures/admin_2.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (3,'Demi','888',1,'demi@gmail.com','pictures/admin_default.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (4,'Alireza','999',1,'Ali@gmail.com','pictures/admin_default.jpg',0);

-- Date: 2014-02-13 16:13

INSERT INTO `game` (`idGame`,`title`,`instruction`,`sourceLink`,`picture`,`userId`) VALUES (1,'Maze Game','The idea of this maze game is to use the arrow keys to get the red ball to the blue square. What��s challenging is that the ball moves through the maze by ONLY stopping at the walls. That means you may only change the direction of the ball once it has come to rest against a wall in the maze. If you get stuck, you may restart the game by pressing the CTRL button on your keyboard. For Mac users that��s the Apple key. Enjoy the maze game and be sure to send this to your friends to see if they can complete as many mazes as you!','games/maze_game.html','pictures/game_pic1.jpg',1);


-- Date: 2014-02-13 16:12

INSERT INTO `event_calendar` (`idEvent`,`date`,`title`,`content`,`picture`,`userId`) VALUES (1,'2014-01-01','Happy New Year!','Recipea.com/event_calendar/event1.html','pictures/calendar_pic1.jpg',3);
INSERT INTO `event_calendar` (`idEvent`,`date`,`title`,`content`,`picture`,`userId`) VALUES (2,'2014-01-31','Happy Lunar New Year!','Recipea.com/event_calendar/event2.html','pictures/calendar_pic2.jpg',4);

-- Date: 2014-02-13 16:14

INSERT INTO `ingredients` (`idIngredients`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (1,1,'egg',0,'g',144.00,3,'pictures/ingredient_1.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (2,2,'flour',2,'kg',0.34,4,'pictures/ingredient_2.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (3,NULL,'black pepper',1,'kg',0.07,2,'pictures/ingredient_3.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (4,1,'milk',250,'ml',0.14,1,'pictures/ingredient_4.jpg');

-- Date: 2014-02-13 16:15

INSERT INTO `media` (`idMedia`,`title`,`content`,`video`,`picture`,`userId`) VALUES (1,'Funny recipes video','This is a video about my funny cooking experience','videos/video1.mp4','pictures/media_pic1.jpg',3);
INSERT INTO `media` (`idMedia`,`title`,`content`,`video`,`picture`,`userId`) VALUES (2,'Amazing recipes video','This video record the top 10 world\'s delicious food.','videos/video2.mp4','pictures/media_pic2.jpg',4);

-- Date: 2014-02-13 16:25

INSERT INTO `recipes` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`,`vote`,`userId`) VALUES (1,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'US',0,3);
INSERT INTO `recipes` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`,`vote`,`userId`) VALUES (2,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don��t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'CA',1,4);


-- Date: 2014-02-13 16:10

INSERT INTO `comment` (`idComment`,`content`,`userId`,`date`,`idrecipe`,`idMedia`,`flag`) VALUES (1,'I like this recipe!',4,'2013-09-09',1,NULL,0);
INSERT INTO `comment` (`idComment`,`content`,`userId`,`date`,`idrecipe`,`idMedia`,`flag`) VALUES (2,'It looks good!',3,'2014-01-03',NULL,1,1);


-- Date: 2014-03-16 18:54   (James)

INSERT INTO `ingredients` (`idIngredient`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (null,1,'egg',0,'g',144.00,3,'pictures/ingredient_1.jpg');
INSERT INTO `ingredients` (`idIngredient`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (null,2,'flour',2,'kg',0.34,4,'pictures/ingredient_2.jpg');
INSERT INTO `ingredients` (`idIngredient`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (null, null,'black pepper',1,'kg',0.07,2,'pictures/ingredient_3.jpg');
INSERT INTO `ingredients` (`idIngredient`,`idRecipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`,`image`) VALUES (null, null, 'milk',250,'ml',0.14,1,'pictures/ingredient_4.jpg');

-- -----------------------------------------------------
-- Table `Recipea`.`ingredients_test`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `Recipea`.`ingredients_test` (
--     `idIngredients` INT(11) NOT NULL AUTO_INCREMENT,
--     `idRecipe` INT(11) NULL DEFAULT NULL,
--     `ingredient` VARCHAR(45) NOT NULL,
--     `amount` INT(11) NOT NULL,
--     `measure` VARCHAR(45) NOT NULL,
--     `calory` DECIMAL(18 , 2 ) NOT NULL,
--     `userId` INT(11) NOT NULL,
--     `image` VARCHAR(45) NOT NULL,
--     PRIMARY KEY (`idIngredients`),
--     INDEX `fk_ingredients_idx` (`idRecipe` ASC),
--     INDEX `fk_ingredients_idx1` (`userId` ASC)
-- )  ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARACTER SET=latin1;


-- -----------------------------------------------------
-- Table `Recipea`.`recipes_test`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `Recipea`.`recipes_test` (
--     `idRecipe` INT(11) NOT NULL AUTO_INCREMENT,
--     `title` VARCHAR(255) NOT NULL,
--     `image` VARCHAR(45) NOT NULL,
--     `pretime` INT(11) NOT NULL,
--     `cooktime` INT(11) NOT NULL,
--     `instruction` TEXT NOT NULL,
--     `servings` INT(11) NOT NULL,
--     `country` VARCHAR(500) NOT NULL,
--   --  `continent` CHAR( 2 ) NOT NULL DEFAULT 'CA' COMMENT 'internet country code', -- this column was added by James 
--     `vote` TINYINT(1) NOT NULL DEFAULT '0',
--     `userId` INT(11) NOT NULL,
--     PRIMARY KEY (`idRecipe`),
--     INDEX `fk_recipes_1_idx` (`userId` ASC)
-- )  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;
 
--  ALTER TABLE `recipes_test` CHANGE `country` `country` VARCHAR( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'CA Canada' 

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'United States',0,3);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don''t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'Canada', 1,4);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'Peru',0,3);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'France',0,3);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don''t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'South Africa',1,4);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'Turkey',0,3);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don''t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'Vietnam',1,4);

INSERT INTO `recipes_test` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`, `vote`,`userId`) VALUES (null,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don''t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'Australia',1,4);

-- Date: 2014-03-22 21:16 (James)

CREATE TABLE IF NOT EXISTS `Recipea`.`countries` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `country` VARCHAR(200) NOT NULL,
    `continent` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARACTER SET=latin1;

-- Date 2014-03-22 23:57 (James)

-- CONTINENT: North America
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Anguilla', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Antigua and Barbuda', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Aruba', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bahamas', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Barbados', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Belize', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bermuda', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'British Virgin Islands', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Canada', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cayman Islands', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Costa Rica', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cuba', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Dominica', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Dominican Republic', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'El Salvador', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Falkland Islands', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'French Guiana', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Greenland', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Grenada', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guadeloupe', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guatemala', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Haiti', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Honduras', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Jamaica', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Martinique', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mexico', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Montserrat', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Netherlands Antilles', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Nicaragua', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Panama', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Puerto Rico', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Barthélemy', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Kitts and Nevis', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Lucia', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Martin', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Pierre and Miquelon', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Vincent and the Grenadines', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Trinidad and Tobago', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Turks and Caicos Islands', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'U.S. Virgin Islands', 'North America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'United States', 'North America');

-- CONTINENT: South America
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Argentina', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bolivia', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Brazil', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Chile', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Colombia', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Ecuador', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guyana', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Paraguay', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Peru', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Suriname', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Uruguay', 'South America');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Venezuela', 'South America');

-- CONTINENT: Europe
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Albania', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Andorra', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Austria', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Belarus', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Belgium', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bosnia and Herzegovina', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bulgaria', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Croatia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cyprus', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Czech Republic', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Denmark', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'East Germany', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Estonia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Faroe Islands', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Finland', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'France', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Germany', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Gibraltar', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Greece', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guernsey', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Hungary', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Iceland', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Ireland', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Isle of Man', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Italy', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Jersey', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Latvia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Liechtenstein', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Lithuania', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Luxembourg', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Macedonia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Malta', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Metropolitan France', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Moldova', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Monaco', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Montenegro', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Netherlands', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Norway', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Poland', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Portugal', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Romania', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Russia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'San Marino', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Serbia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Serbia and Montenegro', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Slovakia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Slovenia', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Spain', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Svalbard and Jan Mayen', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Sweden', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Switzerland', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Ukraine', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Union of Soviet Socialist Republics', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'United Kingdom', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Vatican City', 'Europe');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Åland Islands', 'Europe');

-- CONTINENT: Africa
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Algeria', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Angola', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Benin', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Botswana', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Burkina Faso', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Burundi', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cameroon', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cape Verde', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Central African Republic', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Chad', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Comoros', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Congo - Brazzaville', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Congo - Kinshasa', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Côte d’Ivoire', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Djibouti', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Egypt', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Equatorial Guinea', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Eritrea', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Ethiopia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Gabon', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Gambia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Ghana', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guinea', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guinea-Bissau', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Kenya', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Lesotho', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Liberia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Libya', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Madagascar', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Malawi', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mali', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mauritania', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mauritius', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mayotte', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Morocco', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mozambique', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Namibia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Niger', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Nigeria', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Rwanda', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Réunion', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saint Helena', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Senegal', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Seychelles', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Sierra Leone', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Somalia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'South Africa', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Sudan', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Swaziland', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'São Tomé and Príncipe', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tanzania', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Togo', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tunisia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Uganda', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Western Sahara', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Zambia', 'Africa');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Zimbabwe', 'Africa');

-- CONTINENT: Asia
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Afghanistan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Armenia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Azerbaijan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bahrain', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bangladesh', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bhutan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Brunei', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cambodia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'China', 'Asia');
-- INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cyprus', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Georgia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Hong Kong SAR China', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'India', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Indonesia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Iran', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Iraq', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Israel', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Japan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Jordan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Kazakhstan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Kuwait', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Kyrgyzstan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Laos', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Lebanon', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Macau SAR China', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Malaysia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Maldives', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Mongolia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Myanmar [Burma]', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Nepal', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Neutral Zone', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'North Korea', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Oman', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Pakistan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Palestinian Territories', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'People''s Democratic Republic of Yemen', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Philippines', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Qatar', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Saudi Arabia', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Singapore', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'South Korea', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Sri Lanka', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Syria', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Taiwan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tajikistan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Thailand', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Timor-Leste', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Turkey', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Turkmenistan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'United Arab Emirates', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Uzbekistan', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Vietnam', 'Asia');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Yemen', 'Asia');

-- CONTINENT: Oceania
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'American Samoa', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Antarctica', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Australia', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Bouvet Island', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'British Indian Ocean Territory', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Christmas Island', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cocos [Keeling] Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Cook Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Fiji', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'French Polynesia', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'French Southern Territories', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Guam', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Heard Island and McDonald Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Kiribati', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Marshall Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Micronesia', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Nauru', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'New Caledonia', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'New Zealand', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Niue', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Norfolk Island', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Northern Mariana Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Palau', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Papua New Guinea', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Pitcairn Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Samoa', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Solomon Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'South Georgia and the South Sandwich Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tokelau', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tonga', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Tuvalu', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'U.S. Minor Outlying Islands', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Vanuatu', 'Oceania');
INSERT INTO countries(`id`, `country`, `continent`) VALUES (NULL, 'Wallis and Futuna', 'Oceania');

-- Date 2014-03-23  13:42
-- -----------------------------------------------------
-- Table `php`.`ratings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`ratings` (
    `id` TINYINT(11) NOT NULL AUTO_INCREMENT,
    `rating` TINYINT(11) NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARACTER SET=latin1;


-- Date 2014-03-23  13:44
-- -----------------------------------------------------
-- Table `php`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`countries` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `country` VARCHAR(200) NOT NULL,
    `continent` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARACTER SET=latin1;


-- Date 2014-03-23  14:36

CREATE TABLE IF NOT EXISTS `php`.`recipes_test` (
    `idRecipe` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `image` VARCHAR(45) NOT NULL,
    `pretime` INT(11) NOT NULL,
    `cooktime` INT(11) NOT NULL,
    `instruction` TEXT NOT NULL,
    `servings` INT(11) NOT NULL,
    `country` VARCHAR(500) NOT NULL,
    `vote` TINYINT(1) NOT NULL DEFAULT '0',
    `userId` INT(11) NOT NULL,
    PRIMARY KEY (`idRecipe`),
    INDEX `fk_recipes_1_idx` (`userId` ASC)
)  ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARACTER SET=latin1;


-- Date 2014-03-24  16:31

DELETE FROM `php`.`countries` 
WHERE
    `countries`.`id` = 176;  -- cyprus in asia

ALTER TABLE `countries` ADD UNIQUE (
`country`
);

-- Date 2014-03-31  10:58

-- Alter events_calendar table (change to events table)
ALTER TABLE `php`.`event_calendar` 
DROP FOREIGN KEY `fk_event_calendar`;
ALTER TABLE `php`.`event_calendar` 
DROP COLUMN `picture`,
CHANGE COLUMN `idEvent` `id` INT(11) NOT NULL AUTO_INCREMENT ,
CHANGE COLUMN `date` `month` INT(2) NOT NULL ,
CHANGE COLUMN `userId` `url` VARCHAR(255) NOT NULL ,
ADD COLUMN `day` INT(2) NOT NULL AFTER `month`,
ADD UNIQUE INDEX `id_UNIQUE` (`id` ASC),
ADD UNIQUE INDEX `url_UNIQUE` (`url` ASC),
DROP INDEX `fk_event_calendar_idx` ,
DROP INDEX `date_UNIQUE` , RENAME TO  `php`.`events` ;

-- Date 2014-03-31   11:10

UPDATE `php`.`events` 
SET 
    `month` = '1',
    `day` = '1',
    `content` = 'The first day of the Gregorian calendar is a common celebration across many culures.',
    `url` = 'Recipea.com/events/event1.php'
WHERE
    `id` = '1';
UPDATE `php`.`events` 
SET 
    `month` = '1',
    `day` = '31',
    `content` = 'Lunar New Year is celebrated in different Asian cultures, which follow the lunar calendar.',
    `url` = 'Recipea.com/event_calendar/event2.php'
WHERE
    `id` = '2';
UPDATE `php`.`events` 
SET 
    `month` = '2',
    `day` = '14',
    `title` = 'Valentine\'s Day',
    `content` = 'On Valentine\'s Day, couples usually celebrate together, but the custom differs across cultures.',
    `url` = 'Recipea.com/event_calendar/event3.php'
WHERE
    `id` = '3';

-- Date 2014-03-31   11:27

-- alter events table
ALTER TABLE `php`.`events` 
CHANGE COLUMN `url` `url` VARCHAR(255) NOT NULL DEFAULT 'recipea.com/events/no-events.php' ,
ADD COLUMN `year` INT(4) NOT NULL DEFAULT 2014 AFTER `day`;

-- Date 2014-03-31   11:29

UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/events/event1.php'
WHERE
    `id` = '1';
UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/event_calendar/event2.php'
WHERE
    `id` = '2';
UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/event_calendar/event3.php'
WHERE
    `id` = '3';

-- Date 2014-03-31   11:32

CREATE TABLE `php`.`months` (
    `month` INT(2) NOT NULL,
    `numOfDays` INT(2) NOT NULL DEFAULT 31,
    PRIMARY KEY (`month`)
);

-- Date 2014-03-31   11:37

-- alter months table
ALTER TABLE `php`.`months` 
ADD COLUMN `year` INT(4) NOT NULL DEFAULT 2014 AFTER `numOfDays`;

-- Date 2014-03-31   11:41

-- alter events table
ALTER TABLE `php`.`events` 
CHANGE COLUMN `month` `eventMonth` INT(2) NOT NULL ,
CHANGE COLUMN `day` `eventDay` INT(2) NOT NULL ,
CHANGE COLUMN `year` `eventYear` INT(4) NOT NULL DEFAULT '2014' ;

-- Date 2014-03-31   11:44

-- alter months table
ALTER TABLE `php`.`months` 
CHANGE COLUMN `numOfDays` `numOfDays` INT(2) NULL DEFAULT '31' ,
CHANGE COLUMN `year` `year` INT(4) NULL DEFAULT '2014' ;

-- Date 2014-03-31   13:53

-- insert rows into months table
-- months with 31 days (31 is the default value for numOfDays column)
INSERT INTO php.months (month)
VALUES (1), (3), (5),(7), (8),(10),(12);

-- months with 30 days
INSERT INTO php.months (month, numOfDays)
VALUES (4,30), (6,30), (9,30), (11,30);

-- insert test row into events table
INSERT INTO php.events (id, eventMonth, eventDay, title, content)
VALUES (null, 3,17, "St. Patrick''s Day", "St Patrick's Day, which is an official holiday in Newfoundland and Labrador, celebrates Irish culture, history and traditions.");

-- change event urls
UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/events/event2.php'
WHERE
    `id` = '2';
UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/events/event3.php'
WHERE
    `id` = '3';
UPDATE `php`.`events` 
SET 
    `url` = 'recipea.com/events/events4.php'
WHERE
    `id` = '4';

-- change default value for events.url
ALTER TABLE `php`.`events` 
CHANGE COLUMN `url` `url` VARCHAR(255) NOT NULL DEFAULT 'recipea.com/events/event.php' ;

-- drop the months table
DROP TABLE php.months;

-- drop the 'url' column from events
ALTER TABLE `php`.`events` 
DROP COLUMN `url`,
DROP INDEX `url_UNIQUE` ;


-- Date 2014-04-05 13-38

-- change rating values for recipes
UPDATE `php`.`recipes` SET `vote`='4' WHERE `idRecipe`='26';
UPDATE `php`.`recipes` SET `vote`='3' WHERE `idRecipe`='24';
UPDATE `php`.`recipes` SET `vote`='2' WHERE `idRecipe`='23';
UPDATE `php`.`recipes` SET `vote`='1' WHERE `idRecipe`='21';
UPDATE `php`.`recipes` SET `vote`='4' WHERE `idRecipe`='20';
UPDATE `php`.`recipes` SET `vote`='5' WHERE `idRecipe`='19';
UPDATE `php`.`recipes` SET `vote`='2' WHERE `idRecipe`='2';
UPDATE `php`.`recipes` SET `vote`='1' WHERE `idRecipe`='1';

-- delete all ratings data from ratings table
DELETE FROM `php`.`ratings` WHERE `id`='3';
DELETE FROM `php`.`ratings` WHERE `id`='4';
DELETE FROM `php`.`ratings` WHERE `id`='8';
DELETE FROM `php`.`ratings` WHERE `id`='9';
DELETE FROM `php`.`ratings` WHERE `id`='14';
DELETE FROM `php`.`ratings` WHERE `id`='15';
DELETE FROM `php`.`ratings` WHERE `id`='16';
DELETE FROM `php`.`ratings` WHERE `id`='17';
DELETE FROM `php`.`ratings` WHERE `id`='18';
DELETE FROM `php`.`ratings` WHERE `id`='19';
DELETE FROM `php`.`ratings` WHERE `id`='20';
DELETE FROM `php`.`ratings` WHERE `id`='21';
DELETE FROM `php`.`ratings` WHERE `id`='22';
DELETE FROM `php`.`ratings` WHERE `id`='23';
DELETE FROM `php`.`ratings` WHERE `id`='24';
DELETE FROM `php`.`ratings` WHERE `id`='25';

-- change data type of vote column in recipes table
ALTER TABLE `php`.`recipes` 
CHANGE COLUMN `vote` `vote` TINYINT(3) NOT NULL ;

-- change ratings table
ALTER TABLE `php`.`ratings` 
CHANGE COLUMN `id` `idRecipe` INT(11) NOT NULL ,
CHANGE COLUMN `rating` `vote` TINYINT(3) NOT NULL ,
ADD COLUMN `numOfVotes` INT(11) NOT NULL AFTER `vote`;

-- add foreign key to ratings table
ALTER TABLE `php`.`ratings` 
ADD CONSTRAINT `ratings_idRecipe_fk`
  FOREIGN KEY (`idRecipe`)
  REFERENCES `php`.`recipes` (`idRecipe`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

-- insert rows into ratings table
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('1', '1', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('2', '2', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('19', '5', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('20', '4', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('21', '1', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('23', '2', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('24', '3', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('26', '4', '1');
INSERT INTO `php`.`ratings` (`idRecipe`, `vote`, `numOfVotes`) VALUES ('27', '5', '1');

-- add voteTotal field to ratings table
ALTER TABLE `php`.`ratings` 
CHANGE COLUMN `vote` `vote` TINYINT(3) NOT NULL COMMENT 'average of all votes' ,
ADD COLUMN `voteTotal` INT(11) NOT NULL AFTER `vote`;

-- change data in ratings table
UPDATE `php`.`ratings` SET `vote`='3', `voteTotal`='14', `numOfVotes`='5' WHERE `idRecipe`='1';
UPDATE `php`.`ratings` SET `vote`='3', `voteTotal`='16', `numOfVotes`='5' WHERE `idRecipe`='2';
UPDATE `php`.`ratings` SET `vote`='3', `voteTotal`='18', `numOfVotes`='5' WHERE `idRecipe`='19';
UPDATE `php`.`ratings` SET `voteTotal`='20', `numOfVotes`='5' WHERE `idRecipe`='20';
UPDATE `php`.`ratings` SET `voteTotal`='5', `numOfVotes`='5' WHERE `idRecipe`='21';
UPDATE `php`.`ratings` SET `voteTotal`='10', `numOfVotes`='5' WHERE `idRecipe`='23';
UPDATE `php`.`ratings` SET `vote`='1', `voteTotal`='8', `numOfVotes`='5' WHERE `idRecipe`='24';
UPDATE `php`.`ratings` SET `vote`='2', `voteTotal`='12', `numOfVotes`='5' WHERE `idRecipe`='26';
UPDATE `php`.`ratings` SET `vote`='1', `voteTotal`='6', `numOfVotes`='5' WHERE `idRecipe`='27';

-- make idRecipe field in ratings table have auto increment on
ALTER TABLE `php`.`ratings` 
CHANGE COLUMN `idRecipe` `idRecipe` INT(11) NOT NULL AUTO_INCREMENT;

-- change vote field to a float with one decimal place
ALTER TABLE `php`.`ratings` 
CHANGE COLUMN `vote` `vote` FLOAT(3,1) NOT NULL COMMENT 'average of all votes' ;

-- update vote column of ratings table
UPDATE `php`.`ratings` SET `idRecipe`='29', `vote`='1.9' WHERE `idRecipe`='36';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='41';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='37';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='38';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='39';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='40';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='19';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='20';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='21';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='23';
UPDATE `php`.`ratings` SET `vote`='2.8' WHERE `idRecipe`='1';
UPDATE `php`.`ratings` SET `vote`='3.6' WHERE `idRecipe`='2';
UPDATE `php`.`ratings` SET `vote`='1.8' WHERE `idRecipe`='24';
UPDATE `php`.`ratings` SET `vote`='2.4' WHERE `idRecipe`='27';
UPDATE `php`.`ratings` SET `vote`='2.6' WHERE `idRecipe`='26';

-- update ratings table (ids match index.php)
UPDATE `php`.`ratings` SET `idRecipe`='3' WHERE `idRecipe`='24';
UPDATE `php`.`ratings` SET `idRecipe`='4' WHERE `idRecipe`='26';
UPDATE `php`.`ratings` SET `idRecipe`='5' WHERE `idRecipe`='27';
UPDATE `php`.`ratings` SET `idRecipe`='6' WHERE `idRecipe`='29';
UPDATE `php`.`ratings` SET `idRecipe`='7' WHERE `idRecipe`='42';
UPDATE `php`.`ratings` SET `idRecipe`='8' WHERE `idRecipe`='43';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='44';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='45';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='46';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='47';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='48';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='49';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='50';
DELETE FROM `php`.`ratings` WHERE `idRecipe`='51';

