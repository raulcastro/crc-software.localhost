CREATE DATABASE crc;

CREATE TABLE `app_info` (
  `title` varchar(512) DEFAULT NULL,
  `site_name` varchar(512) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  `media` varchar(512) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `keywords` varchar(512) DEFAULT NULL,
  `creator` varchar(512) DEFAULT NULL,
  `creator_url` varchar(512) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `googleplus` varchar(256) DEFAULT NULL,
  `linkedin` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `youtube` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `about` text,
  `avatar` varchar(50) DEFAULT NULL,
  `n_tries` tinyint(4) DEFAULT NULL,
  `time_tries` int(11) DEFAULT NULL,
  `account_available` varchar(20) NOT NULL DEFAULT 'available',
  `type_user` varchar(5) NOT NULL DEFAULT '0',
  `register_date` datetime NOT NULL,
  `LastUpdatedOn` datetime(3) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`FirstName`, `LastName`, `email`, `password`,   `type_user`, `register_date`, `LastUpdatedOn`)
VALUES
('Shawn', 'Cameron', 'info@shawncameronconsulting.ca', '$2y$10$0fVKHDzNJXUtaGx.4Rkw5.xHa6eUcsTV2OCf07Wan7jP2gx7nrU5G', 1, NOW(),  NOW());

CREATE TABLE `gallery` (
  `photo_id` int(10) NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) NOT NULL,
  `photo` varchar(512) NOT NULL,
  `date` datetime NOT NULL,
  `caption` varchar(512) NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `blog_categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `subtitle` varchar(512) NOT NULL,
  `description` varchar(512) NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `blog` (
  `blog_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NULL,
  `photo` varchar(512) NULL,
  `title` varchar(512) NOT NULL,
  `preview` varchar(512) NULL,
  `blog_content` TEXT NULL,
  `date_created` datetime NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE blog ADD COLUMN user_id INT (1) NOT NULL; 


























