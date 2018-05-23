DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id`            INT PRIMARY KEY AUTO_INCREMENT,
  `name`          VARCHAR(128) NOT NULL,
  `password`      CHAR(60)     NOT NULL
);

DROP TABLE IF EXISTS `articleCategories`;
CREATE TABLE `articleCategories` (
  `id`            INT PRIMARY KEY AUTO_INCREMENT,
  `name`          VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id`            INT PRIMARY KEY AUTO_INCREMENT,
  `category`      VARCHAR(128) NOT NULL,
  `title`         VARCHAR(128) NOT NULL,
  `subtitle`      VARCHAR(128) NOT NULL,
  `content`       TEXT         NOT NULL,
  `imgSrc`        VARCHAR(2048) NOT NULL,
  `imgAlt`        VARCHAR(128) NOT NULL,
  `imgTitle`      VARCHAR(128) NOT NULL,
  `publishedDate` VARCHAR(128) NOT NULL,
  `author`        VARCHAR(128) NOT NULL,
  `signature`     VARCHAR(128) NOT NULL,
  `logoSrc`       VARCHAR(2048) NOT NULL,
  `logoAlt`       VARCHAR(128) NOT NULL,
  `logoTitle`     VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id`            INT PRIMARY KEY AUTO_INCREMENT,
  `name`          VARCHAR(128) NOT NULL,
  `logoSrc`       VARCHAR(2048) NOT NULL,
  `logoAlt`       VARCHAR(128) NOT NULL,
  `logoTitle`     VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `airlineCompanies`;
CREATE TABLE `airlineCompanies` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `name`           VARCHAR(128) NOT NULL,
  `twitterAccount` VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `imagesBoxes`;
CREATE TABLE `imagesBoxes` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `category`       VARCHAR(128) NOT NULL,
  `imgSrc`         VARCHAR(2048) NOT NULL,
  `imgAlt`         VARCHAR(128) NOT NULL,
  `imgTitle`       VARCHAR(128) NOT NULL,
  `comment`        VARCHAR(128) NOT NULL DEFAULT ''
);

INSERT INTO `admin` (`name`, `password`) VALUES ('admin', 'admin');




