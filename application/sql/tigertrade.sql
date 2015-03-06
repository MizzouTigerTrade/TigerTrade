DROP SCHEMA kylecarlson_tigertrade;
CREATE SCHEMA kylecarlson_tigertrade;

USE kylecarlson_tigertrade;

-- Table: kylecarlson_tigertrade.comments
-- Columns:
--    ad_id			    - A unique code given to an ad.
--    description		- A user provided comment.
--    timestmp          - A timestamp of when the comment was made.
CREATE TABLE kylecarlson_tigertrade.comments (
	ad_id INTEGER REFERENCES kylecarlson_tigertrade.ad(ad_id),
	description		VARCHAR(500),
	user_id INTEGER REFERENCES kylecarlson_tigertrade.users(id),
	timestmp 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Table: kylecarlson_tigertrade.categories
-- Columns:
--    category_id      - An unique ID to identify the category.
--    description	   - A description for the category, provided by admins.
CREATE TABLE kylecarlson_tigertrade.categories (
	category_id  	INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	description VARCHAR(512)
);

-- Table: kylecarlson_tigertrade.subcategories
-- Columns:
--	subcategory_id		- An ID within the category_id for easier classification.
--	category_id			- References the category_id in the categorie table, provides link.
-- 	description			- A description of the subcategory provided by admins.
CREATE TABLE kylecarlson_tigertrade.subcategories (
	subcategory_id	  INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
	category_id INTEGER REFERENCES kylecarlson_tigertrade.categories(category_id),
	name VARCHAR(128) NOT NULL,
	description VARCHAR (512)
);

-- Table: kylecarlson_tigertrade.ads
-- Columns:
--	ad_id			- A unique ad ID that increases with each new ad created to give a unique id.
--	creation_date	- The creation date of the ad.
-- 	expiration_date	- The expiration date of the ad, if provided by the user.
--	price			- The price of the ad sale, could be 0.00.
--	flag_count		- The count of flags on the ad.
CREATE TABLE kylecarlson_tigertrade.ads (
	ad_id  	 INTEGER PRIMARY KEY AUTO_INCREMENT,
	title	VARCHAR (128),
	description	VARCHAR (1024),
	creation_date 	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expiration_date 	TIMESTAMP,
	price	INTEGER,
	user_id INTEGER REFERENCES kylecarlson_tigertrade.users(id),
	category_id INTEGER REFERENCES kylecarlson_tigertrade.categories(category_id),
	subcategory_id INTEGER REFERENCES kylecarlson_tigertrade.subcategories(subcategory_id),
	flag_count	INTEGER	
);

-- Table: kylecarlson_tigertrade.images
-- Columns:
--	ad_id			- A Unique ad ID for each ad, to easily identify the ad in the system.
--  image_path		- The file path to the image.
CREATE TABLE kylecarlson_tigertrade.images (
	ad_id INTEGER REFERENCES kylecarlson_tigertrade.ads(ad_id),
	image_path	VARCHAR (100) NOT NULL
);

-- Table: kylecarlson_tigertrade.tags
-- Columns:
--	ad_id			- References to the ad, to organize the tags to the ad.
--	description		- A description of the tag.
CREATE TABLE kylecarlson_tigertrade.tags (
	ad_id INTEGER REFERENCES kylecarlson_tigertrade.ads(ad_id),
	description VARCHAR (100)
);

-- Table: kylecarlson_tigertrade.offers
-- Column:
--	buyer_id		- ID of the buyer that ties into users table, to pull all necessary information
--	seller_id		- ID of the seller that ties into users table, to pull all necessary information
--	buy_message		- Message offer of the buyer for the ad
-- 	seller_response	- Message offer of the seller or response from ad
--	status			- Status of the offer of buyer or seller, could be pending, accepted, declined
CREATE TABLE kylecarlson_tigertrade.offers (
	offer_id  	 INTEGER PRIMARY KEY AUTO_INCREMENT,
	buyer_id INTEGER REFERENCES kylecarlson_tigertrade.users(id),
	seller_id INTEGER REFERENCES kylecarlson_tigertrade.users(id),
	ad_id INTEGER REFERENCES kylecarlson_tigertrade.ads(ad_id),
	price	INTEGER,
	buyer_message BLOB,
	seller_response BLOB,
	status VARCHAR(10) DEFAULT "Pending"
);

DROP TABLE IF EXISTS `groups`;
#
# Table structure for table 'groups'
#
CREATE TABLE `groups` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`description` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
);
#
# Dumping data for table 'groups'
#
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,'admin','Administrator'),
(2,'members','General User');
DROP TABLE IF EXISTS `users`;
#
# Table structure for table 'users'
#
CREATE TABLE `users` (
`id` int NOT NULL AUTO_INCREMENT,
`ip_address` varchar(15) NOT NULL,
`username` varchar(100) NOT NULL,
`password` varchar(255) NOT NULL,
`salt` varchar(255) DEFAULT NULL,
`email` varchar(100) NOT NULL,
`activation_code` varchar(40) DEFAULT NULL,
`forgotten_password_code` varchar(40) DEFAULT NULL,
`forgotten_password_time` int DEFAULT NULL,
`remember_code` varchar(40) DEFAULT NULL,
`created_on` int NOT NULL,
`last_login` int DEFAULT NULL,
`active` int DEFAULT NULL,
`first_name` varchar(50) DEFAULT NULL,
`last_name` varchar(50) DEFAULT NULL,
`company` varchar(100) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
PRIMARY KEY (`id`)
);
#
# Dumping data for table 'users'
#
# Admin user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
('1','127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');
# Kyle user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
('2','161.130.188.151','kyle carlson','$2y$08$Wf2vrtBIkn7BhZ9ut.skweylYNi2dp.ipZjUNqdPlWxksH3D1uSGa','','krcz85@mail.missouri.edu','',NULL,'1424390141','1424390141','1', 'Kyle','Carlson','Mizzou','3144799706');
# Tim G. user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
('3','161.130.188.154','tim gilman','$2y$08$CCvsdBcG8GTw1Q84fzhWpehqx5XmfX6/Sj.mCXwPXm0G73KAA07yC','','tmgy87@mail.missouri.edu','',NULL,'1424390513','1424390513','1', 'Tim','Gilman','Mizzou','3149607198');
# Tim V. user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
('4','161.130.188.176','timothy van horn','$2y$08$kLHSUoheDLnPoogvX12pNevjRPZtXvk7thYUKxlLN7NSBiVbDdU72','','tjvkv6@mail.missouri.edu','',NULL,'1424390785','1424390785','1', 'Tim','Van Horn','Mizzou','3144020820');
# Jason user account creation

DROP TABLE IF EXISTS `users_groups`;
#
# Table structure for table 'users_groups'
#
CREATE TABLE `users_groups` (
`id` int NOT NULL AUTO_INCREMENT,
`user_id` int NOT NULL,
`group_id` int NOT NULL,
PRIMARY KEY (`id`),
KEY `fk_users_groups_users1_idx` (`user_id`),
KEY `fk_users_groups_groups1_idx` (`group_id`),
CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
);

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1,1,1),
(2,1,2),
(3,2,1),
(4,2,2),
(5,3,1),
(6,3,2),
(7,4,1),
(8,4,2);

DROP TABLE IF EXISTS `login_attempts`;
#
# Table structure for table 'login_attempts'
#
CREATE TABLE `login_attempts` (
`id` int NOT NULL AUTO_INCREMENT,
`ip_address` varchar(15) NOT NULL,
`login` varchar(100) NOT NULL,
`time` int DEFAULT NULL,
PRIMARY KEY (`id`)
); 

INSERT INTO categories (name) VALUES
('for sale'),
('services'),
('tutoring'),
('housing'),
('jobs'),
('study groups');
	
INSERT INTO kylecarlson_tigertrade.subcategories (category_id, name) VALUES
	('1','books'), 
	('1','tickets'), 
	('1','furniture'), 
	('1', 'household'), 
	('1','electronics'), 
	('1','computers'), 
	('1','video games'), 
	('1','vehicles'), 
	('1','free'), 
	('1','other'), 
	('2', 'computers'), 
	('2', 'manual labor'), 
	('2', 'other'), 
	('3', 'math'), 
	('3', 'english'), 
	('3', 'science'), 
	('3', 'social studies'), 
	('3', 'computer science'), 
	('3', 'engineering'), 
	('3', 'other'), 
	('4','roommate'),
	('4','lease'), 
	('5', 'part time'),
	('5', 'full time'), 
	('5', 'internship'), 
	('5', 'coop'); 