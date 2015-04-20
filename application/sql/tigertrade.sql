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
--  user_id			- Id of user who flagged the Ad
CREATE TABLE flags (
	ad_id INTEGER REFERENCES ads(ad_id),
	user_id INTEGER REFERENCES users(id),
	primary key (ad_id, user_id)
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
	subcategory_id INTEGER REFERENCES kylecarlson_tigertrade.subcategories(subcategory_id)
);

-- Table: kylecarlson_tigertrade.images
-- Columns:
--	ad_id			- A Unique ad ID for each ad, to easily identify the ad in the system.
--  image_path		- The file path to the image.
CREATE TABLE kylecarlson_tigertrade.images (
	ad_id INTEGER REFERENCES kylecarlson_tigertrade.ads(ad_id),
	image_path	VARCHAR (100) NOT NULL,
	tag_id INTEGER PRIMARY KEY AUTO_INCREMENT
);

-- Table: kylecarlson_tigertrade.tags
-- Columns:
--	ad_id			- References to the ad, to organize the tags to the ad.
--	description		- A description of the tag.
CREATE TABLE kylecarlson_tigertrade.tags (
	tag_id INTEGER PRIMARY KEY AUTO_INCREMENT,
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
	status VARCHAR(10) DEFAULT "Pending",
	seen_by_buyer BOOLEAN DEFAULT 1,
	seen_by_seller BOOLEAN DEFAULT 0
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
`phone` varchar(20) DEFAULT NULL,
sent_offer_notification INTEGER DEFAULT "0",
received_offer_notification INTEGER DEFAULT "0",
PRIMARY KEY (`id`)
);
#
# Dumping data for table 'users'
#
# Admin user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
('1','127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','0');
# Kyle user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
('2','161.130.188.151','kyle carlson','$2y$08$Wf2vrtBIkn7BhZ9ut.skweylYNi2dp.ipZjUNqdPlWxksH3D1uSGa','','krcz85@mail.missouri.edu','',NULL,'1424390141','1424390141','1', 'Kyle','Carlson','3144799706');
# Tim G. user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
('3','161.130.188.154','tim gilman','$2y$08$CCvsdBcG8GTw1Q84fzhWpehqx5XmfX6/Sj.mCXwPXm0G73KAA07yC','','tmgy87@mail.missouri.edu','',NULL,'1424390513','1424390513','1', 'Tim','Gilman','3149607198');
# Tim V. user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
('4','161.130.188.176','timothy van horn','$2y$08$kLHSUoheDLnPoogvX12pNevjRPZtXvk7thYUKxlLN7NSBiVbDdU72','','tjvkv6@mail.missouri.edu','',NULL,'1424390785','1424390785','1', 'Tim','Van Horn','3144020820');
# Jason user account creation
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
('5','173.16.90.174','jason mcquinn','$2y$08$Rxhzx3pz1fVEGSwBFZTVieKJn4Rary1EpMKapTecdSxY9xUavqW32','','jdmnr9@mail.missouri.edu','',NULL,'1424802840','1424803274','1','Jason','McQuinn','8163857190');

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
(8,4,2),
(9,5,1),
(10,5,2);

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
	
INSERT INTO ads (title,description,price,user_id,category_id,subcategory_id) VALUES ("Homecoming football tickets for 11/21/15","4 booth tickets for the Homecoming game","225",1,1,2),
	("Football tickets for 11/7/15","2 general admission tickets for the Georgia game","20",2,1,2),
	("Harry Potter Series for sale","All seven books of Harry Potter for sale. All in pristine condition, and hardback. Contact me at 888-234-1243.","75",4,1,1),
	("Hunger Games: Catching Fire","The second book of the Hunger Games trilogy for sale. The book is slightly used and has some minor imperfections because of the softcover version.","14",3,1,1),
	("Brown Leather Couch","A brown couch that's only been sat on once by us in at the store. Got it home and didn't like how it matched the room. Practically brand new.","230",5,1,3),
	("Black Desk Chair","Perfect condition. A black, leather chair that has rollers on the bottom. Just don't have room for it at my new place.","20",3,1,3),
	("Toaster","Slightly used toaster. Still in perfect working condition, but got a new one for my birthday. So looking to make a little money back from this one.","10",5,1,4),
	("Oven","Brand new, never used. We messed up on the measurements and it won't fit in our cabinets. Trying to make all our money back because store won't take it back.","500",3,1,4),
	("iClicker2","Clicker for sale. I'm trying to get rid of this clicker before I start my new job. Still works great because it's only been used for one semester.","5",2,1,5),
	("TI-85 Graphing Calculator","Graphing Calculator for sale. Slightly used, but does not come with batteries.","25",4,1,5),
	("Toshiba","Toshiba laptop for sale, comes with the charger and a new battery. Includes Windows 7 and Microsoft Office. Has a 2 GB RAM and a 300 GB storage system.","225",1,1,6),
	("Mac","Mac desktop for sale. Includes a 20 inch monitor and all the plug-ins/accessories that it came with.","560",5,1,6),
	("Xbox and 10 games","Used Xbox. Has little signs of wear and tear on it. Still works great, but it's just collecting dust sitting around.","40",3,1,7),
	("Playstation 3 and 3 games","Playstation 3 for sale. Shows very little signs of use. Comes with 3 great games, Call of Duty: MW2, COD: MW3, and COD: Black Ops 2 and 2 controllers","150",5,1,7),
	("2000 Pontiac Grand Prix","2000 Black Pontiac Grand Prix for sale. Has 150,000 miles, but I never had any engine troubles with this car. Just got done replacing all four tires and oil changed.","2150",2,1,8),
	("1993 Buick LeSabre","1993 Silver Buick LeSabre 200,000 miles. The transmission has been replaced, but other than that, no problems with this car.","1200",2,1,8),
	("Box TV Zenith","Please come pick this TV up by the end of the day. It needs to go! It's around 20 inches square, and works fine.","0",1,1,9),
	("Small Blue Arm Chair","Blue arm chair that is smaller and has a flower design across the whole chair. Needs to go today.","0",4,1,9),
	("Lot of Clothes","4 pairs of 30x30 jeans, 3 medium shirts, and 1 pair of size 10 Nikes.","35",3,1,10),
	("Blue Pen","A blue ink ballpoint pen. Never been used, clicks like brand new.","2",5,1,10),
	("Virus Removal Service","I can clean up anyone's computer! Bring me any computer and I can clean it up for you. Doesn't matter what is wrong, but I specialize in virus removal.","30",1,2,11),
	("Website Creation","If you need a website for any need, if it is personal, commercial, or whatever else, just let me know and I can create it at a base rate of $20 per hour.","20",4,2,11),
	("Construction Worker","Looking for work of any kind, will do anything involving construction. I work for around $15 an hour.","15",5,2,12),
	("Snow Removal","If you need anyone to remove your snow, contact me. I can remove snow from anything, and will bring ice melt to prevent ice.","30",3,2,12),
	("Household Cleaning","I will clean up anyone's house, no matter how dirty it is. I will charge more the dirtier the house is. $20 is the base rate.","20",5,2,13),
	("iPhone Repair","I will repair any iPhone, if it has a cracked screen or won't charge, it doesn't matter to me. I can fix it for a standard fee of $50.","50",1,2,13),
	("Math Tutor","Looking for a math tutor to help me with any subject in math. Will compensate according to grades received.","10",3,3,14),
	("Algebra Tutor","If anyone needs an algebra tutor, let me know. I will tutor anything below, or at the same level of algebra","10",5,3,14),
	("English Tutor","Tutoring anyone in English. Looking to make some extra cash, and I am an English graduate.","15",4,3,15),
	("Looking for English Tutor","Not the best with the English, I'm trying to find someone that will help me with speech and writing lessons. Will compensate.","10",5,3,15),
	("Physics Tutor","Offering to teach any Physics course. Trying to make some money on the side","5",1,3,16),
	("Biology Tutor","Looking for a free Biology tutor. I need someone that will work for free.","0",2,3,16),
	("History Tutor","Trying to find a tutor for history. I need help finding someone to tutor me for a low, low price.","5",3,3,17),
	("Social Studies","Tutoring any social studies course. I will do it for free, just trying to give back.","0",4,3,17),
	("Capstone Tutor","Looking for help in this Capstone course. I need some help, and will pay generously.","20",5,3,18),
	("Intro to Computer Science","Looking for a tutor for the Intro to Computer Science course.","0",1,3,18),
	("Intro to Engineering","I am looking for a tutor for the Introduction to Engineering course. I really need someone to advise me which major I should take within the field of engineering","0",1,3,19),
	("Mechanical Engineering","I will tutor anyone with the major of Mechanical Engineering, with any course.","0",2,3,19),
	("Fine Arts","Anyone that needs help with making their schedule set up with an easy Fine Art class, contact me.","0",3,3,20),
	("Psychology","Looking for anyone that needs help with Psych 1000. I am a Psych major and will help tutor anyone for a base fee of $10 per session","10",4,3,20),
	("Looking For a Roommate at Aspen Heights","In search of a new roommate at Aspen Heights, the place is fully furnished. The price is only $425 per month and includes utilities.","425",4,4,21),
	("Trying to Find a New Place to Live","Looking for a new spot to live, needs to be under $400 for rent. I am a very cool person to live with and clean.","400",5,4,21),
	("Looking for a new person to take over a lease","I am looking for someone to finish out the lease for the rest of this Spring semester. The rent is only $500 per month, without utilities.","500",1,4,22),
	("Trying to Find a Person Finish Cottages Lease","Looking for a man to finish off the lease at the cottages. We already have 3 roommates living there and need another person to sign next year. Rent and utilities are never over $525","525",2,4,22),
	("Looking for a part time job","I have a unique skill set that includes carpeting, construction, and speaking Spanish. I am looking for a part time job that involves any or all of those skills. Negotiable salary","10",3,5,23),
	("Hiring a Part Time App Developer","Looking for a part time application developer that will work for $12 an hour. I will provide more details when I find someone that wants this opportunity.","12",4,5,23),
	("Full Time Job Position","Looking for a full time job in any area. Trying to make at least minimum wage.","7.50",5,5,24),
	("Hiring Full Time Jobs","Trying to find someone looking for an entry level position that would like to be involved in data entry. Minimum starting salary is $25,000 a year.","25,000",1,5,24),
	("Looking to find a person for an Internship","Our company is hiring people with minimum experience, as long as they have slight technical knowledge. This internship is unpaid, however.","0",2,5,25),
	("Searching for an internship","My skills include mowing grass, landscaping, and basically any outside lawn care. I would love to try to find an internship that is paid for lawn care. I would like to find a base pay of $10 per hour","10",3,5,25),
	("Trying to find someone to take part of Coop","Hiring an Agricultural major at Montsanto. We are looking for someone to work multiple different periods of times. Starting pay is $12 an hour.","12",4,5,26),
	("Looking for a qualified person to be in a Coop with Boeing.","Trying to find a qualified mechanical engineer to come be a part of the team at Boeing. We are mainly looking for a coop with a starting pay of $15 per hour","15",5,5,26);