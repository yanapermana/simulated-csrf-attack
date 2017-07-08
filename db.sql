CREATE DATABASE exercise_csrf_attack;
USE exercise_csrf_attack;

DROP TABLE if exists `users`;
CREATE TABLE `users` (
	`id` int(8) NOT NULL AUTO_INCREMENT,
	`name` varchar(64) DEFAULT NULL,
	`username` varchar(64) DEFAULT NULL,
	`password` varchar(64) DEFAULT NULL,
	`money`varchar(64) DEFAULT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO `users` VALUES ('1','Maria','maria','maria','0');
INSERT INTO `users` VALUES ('2','Bob','bob','bob','5000');
INSERT INTO `users` VALUES ('3','Alice','alice','alice','25000');

SELECT * FROM users;