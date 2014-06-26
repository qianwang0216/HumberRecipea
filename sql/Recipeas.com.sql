SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `php` DEFAULT CHARACTER SET latin1 ;
USE `php` ;

-- -----------------------------------------------------
-- Table `php`.`about_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`about_us` (
  `idAbout` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `content` VARCHAR(255) NOT NULL,
  `date` DATE NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAbout`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`admin` (
  `userId` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `flag` INT(11) NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `picture` VARCHAR(255) NULL DEFAULT 'pictures/admin_default.jpg',
  `newsInfo` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `usernameAdmin_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`media` (
  `idMedia` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `content` VARCHAR(255) NOT NULL,
  `video` VARCHAR(45) NOT NULL,
  `picture` VARCHAR(45) NOT NULL,
  `userId` INT(11) NOT NULL,
  PRIMARY KEY (`idMedia`),
  INDEX `fk_media_idx` (`userId` ASC),
  CONSTRAINT `fk_media`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`ingredients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`ingredients` (
  `idIngredients` INT(11) NOT NULL AUTO_INCREMENT,
  `idRecipe` INT(11) NULL DEFAULT NULL,
  `ingredient` VARCHAR(45) NOT NULL,
  `amount` INT(11) NOT NULL,
  `measure` VARCHAR(45) NOT NULL,
  `calory` DECIMAL(18,2) NOT NULL,
  `userId` INT(11) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idIngredients`),
  INDEX `fk_ingredients_idx` (`idRecipe` ASC),
  INDEX `fk_ingredients_idx1` (`userId` ASC),
  CONSTRAINT `fk_ingredients`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`recipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`recipes` (
  `idRecipe` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `pretime` INT(11) NOT NULL,
  `cooktime` INT(11) NOT NULL,
  `instruction` TEXT NOT NULL,
  `servings` INT(11) NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  `vote` TINYINT(1) NOT NULL DEFAULT '0',
  `userId` INT(11) NOT NULL,
  PRIMARY KEY (`idRecipe`),
  INDEX `fk_recipes_1_idx` (`userId` ASC),
  CONSTRAINT `fk_recipes_1`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipes_2`
    FOREIGN KEY (`idRecipe`)
    REFERENCES `php`.`ingredients` (`idRecipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`comment` (
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
  CONSTRAINT `fk_idMedia`
    FOREIGN KEY (`idMedia`)
    REFERENCES `php`.`media` (`idMedia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idRecipe`
    FOREIGN KEY (`idRecipe`)
    REFERENCES `php`.`recipes` (`idrecipe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`contact` (
  `idContact` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `message` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idContact`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`event_calendar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`event_calendar` (
  `idEvent` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `content` VARCHAR(255) NOT NULL,
  `picture` VARCHAR(45) NOT NULL,
  `userId` INT(11) NOT NULL,
  PRIMARY KEY (`idEvent`),
  UNIQUE INDEX `date_UNIQUE` (`date` ASC),
  INDEX `fk_event_calendar_idx` (`userId` ASC),
  CONSTRAINT `fk_event_calendar`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`facebook_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`facebook_info` (
  `id_facebook` INT(11) NOT NULL AUTO_INCREMENT,
  `code_parameter` VARCHAR(255) NOT NULL,
  `access_token` VARCHAR(255) NOT NULL,
  `response_name` VARCHAR(255) NOT NULL,
  `response_id` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_facebook`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`game` (
  `idGame` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `instruction` TEXT NOT NULL,
  `sourceLink` VARCHAR(45) NOT NULL,
  `picture` VARCHAR(45) NOT NULL,
  `userId` INT(11) NOT NULL,
  PRIMARY KEY (`idGame`),
  INDEX `fk_game_idx` (`userId` ASC),
  CONSTRAINT `fk_game`
    FOREIGN KEY (`userId`)
    REFERENCES `php`.`admin` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `php`.`newsletter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`newsletter` (
  `idNewsletter` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idNewsletter`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;






-- Date: 2014-02-13 16:07
*/
INSERT INTO `about_us` (`idAbout`,`Recipes is a community site for sharing recipes. Not limited to just recipes, but registered users can upload their recipes, create lists of their favourite recipes, watch cooking videos and more.`,`content`,`date`,`image`) VALUES (1,'About Us','test','2014-02-02','pictures/about_pic1.jpg');

-- Date: 2014-02-13 16:09
*/
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (1,'Qian','123',0,'qian@163.com','pictures/admin_1.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (2,'James','345',0,'james@hotmail.com','pictures/admin_2.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (3,'Demi','888',1,'demi@gmail.com','pictures/admin_default.jpg',0);
INSERT INTO `admin` (`userId`,`username`,`password`,`flag`,`email`,`picture`,`newsInfo`) VALUES (4,'Alireza','999',1,'Ali@gmail.com','pictures/admin_default.jpg',0);

-- Date: 2014-02-13 16:10
*/
INSERT INTO `comment` (`idComment`,`content`,`userId`,`date`,`idrecipe`,`idMedia`,`flag`) VALUES (1,'I like this recipe!',4,'2013-09-09',1,NULL,0);
INSERT INTO `comment` (`idComment`,`content`,`userId`,`date`,`idrecipe`,`idMedia`,`flag`) VALUES (2,'It looks good!',3,'2014-01-03',NULL,1,1);

-- Date: 2014-02-13 16:11
*/
INSERT INTO `contact` (`idContact`,`fname`,`lname`,`email`,`phone`,`message`) VALUES (1,'Lily','White','abc@hotmail.com','4162221111','Hello World!');
INSERT INTO `contact` (`idContact`,`fname`,`lname`,`email`,`phone`,`message`) VALUES (2,'Bernie','Monette','bernie@gmail.com','6471112341','Bye Bye!');

-- Date: 2014-02-13 16:12
*/
INSERT INTO `event_calendar` (`idEvent`,`date`,`title`,`content`,`picture`,`userId`) VALUES (1,'2014-01-01','Happy New Year!','Recipea.com/event_calendar/event1.html','pictures/calendar_pic1.jpg',3);
INSERT INTO `event_calendar` (`idEvent`,`date`,`title`,`content`,`picture`,`userId`) VALUES (2,'2014-01-31','Happy Lunar New Year!','Recipea.com/event_calendar/event2.html','pictures/calendar_pic2.jpg',4);

-- Date: 2014-02-13 16:12
*/
INSERT INTO `facebook_info` (`id_facebook`,`code_parameter`,`access_token`,`response_name`,`response_id`) VALUES (1,'AQAnb2EpZ41kt0BKWHjWqE0ejfk9WM','CAACTVCcv698BALweaniaeRpkEByG1zmqZAMLhCnTa0Si2DGW','qian.wang.9217','9119781312');

-- Date: 2014-02-13 16:13
*/
INSERT INTO `game` (`idGame`,`title`,`instruction`,`sourceLink`,`picture`,`userId`) VALUES (1,'Maze Game','The idea of this maze game is to use the arrow keys to get the red ball to the blue square. What¡¯s challenging is that the ball moves through the maze by ONLY stopping at the walls. That means you may only change the direction of the ball once it has come to rest against a wall in the maze. If you get stuck, you may restart the game by pressing the CTRL button on your keyboard. For Mac users that¡¯s the Apple key. Enjoy the maze game and be sure to send this to your friends to see if they can complete as many mazes as you!','games/maze_game.html','pictures/game_pic1.jpg',1);

-- Date: 2014-02-13 16:14
*/
INSERT INTO `ingredients` (`idIngredients`,`idReceipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`) VALUES (1,1,'egg',0,'g',144.00,3,'pictures/ingredient_1.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idReceipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`) VALUES (2,2,'flour',2,'kg',0.34,4,'pictures/ingredient_2.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idReceipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`) VALUES (3,NULL,'black pepper',1,'kg',0.07,2,'pictures/ingredient_3.jpg');
INSERT INTO `ingredients` (`idIngredients`,`idReceipe`,`ingredient`,`amount`,`measure`,`calory`,`userId`) VALUES (4,1,'milk',250,'ml',0.14,1,'pictures/ingredient_4.jpg');

-- Date: 2014-02-13 16:15
*/
INSERT INTO `media` (`idMedia`,`title`,`content`,`video`,`picture`,`userId`) VALUES (1,'Funny recipes video','This is a video about my funny cooking experience','videos/video1.mp4','pictures/media_pic1.jpg',3);
INSERT INTO `media` (`idMedia`,`title`,`content`,`video`,`picture`,`userId`) VALUES (2,'Amazing recipes video','This video record the top 10 world\'s delicious food.','videos/video2.mp4','pictures/media_pic2.jpg',4);

-- Date: 2014-02-13 16:15
*/
INSERT INTO `newsletter` (`idNewsletter`,`content`) VALUES (1,'Hello World!');
INSERT INTO `newsletter` (`idNewsletter`,`content`) VALUES (2,'Our recipe website is good!');

-- Date: 2014-02-13 16:25
*/
INSERT INTO `recipes` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`,`vote`,`userId`) VALUES (1,'Detox Chopped Chicken Salad with Cashew Honey Mustard','pictures/recp_pic1.jpg',25,10,'In a large saute pan, heat the olive oil over medium heat. Add the chicken breast and season with salt, pepper, chili powder, garlic powder and cumin. Cook until brown and cooked through, about 8-10 minutes. Remove from heat and set aside to cool.',4,'US',0,3);
INSERT INTO `recipes` (`idRecipe`,`title`,`image`,`pretime`,`cooktime`,`instruction`,`servings`,`country`,`vote`,`userId`) VALUES (2,'Dark Chocolate Truffles with Orange','pictures/recp_pic2.jpg',5,5,'Place almond milk in the top of a double boiler (over about two inches of simmering water in the bottom pan) over medium heat. If you don¡¯t have a double boiler, just put a heat-proof mixing bowl (in other words, not plastic) over a pan of gently simmering water.',6,'CA',1,4);


