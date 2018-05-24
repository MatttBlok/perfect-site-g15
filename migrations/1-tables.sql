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

DROP TABLE IF EXISTS `imgsGallery`;
CREATE TABLE `imgsGallery` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `imgSrc`         VARCHAR(2048) NOT NULL,
  `imgAlt`         VARCHAR(128) NOT NULL,
  `imgTitle`       VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `content`        VARCHAR(128) NOT NULL,
  `author`         VARCHAR(128) NOT NULL,
  `publishedDate`  VARCHAR(128) NOT NULL
);

DROP TABLE IF EXISTS `topHundred`;
CREATE TABLE `topHundred` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `category`       VARCHAR(128) NOT NULL,
  `name`           VARCHAR(128) NOT NULL,
  `localisation`   VARCHAR(128) NOT NULL,
  `ranking`        VARCHAR(128) NOT NULL,
  `imgSrc`         VARCHAR(2048) NOT NULL,
  `imgAlt`         VARCHAR(128) NOT NULL,
  `imgTitle`       VARCHAR(128) NOT NULL,
  `description`    VARCHAR(128) NOT NULL,
  `link`           VARCHAR(328) NOT NULL
);


DROP TABLE IF EXISTS `descCards`;
CREATE TABLE `descCards` (
  `id`             INT PRIMARY KEY AUTO_INCREMENT,
  `category`       VARCHAR(128) NOT NULL,
  `name`           VARCHAR(128) NOT NULL,
  `localisation`   VARCHAR(128) NOT NULL,
  `rating`         INT NOT NULL,
  `desc`           VARCHAR(128) NOT NULL,
  `imgSrc`         VARCHAR(2048) NOT NULL,
  `imgAlt`         VARCHAR(128) NOT NULL,
  `imgTitle`       VARCHAR(128) NOT NULL,
  `schedule`       VARCHAR(128) NOT NULL,
  `price`          VARCHAR(128) NOT NULL
);

INSERT INTO `admin` (`name`, `password`) VALUES ('admin', 'admin');
INSERT INTO `articles`
(`category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle`)
VALUES
('Bon plan aérien', 'Lorem', 'Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'jaj', 'jaj', 'jajjijaj', '24/5/18', 'Someone', 'oui', 'non', 'nope', 'yes')
;
INSERT INTO `articles`
(`category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle`)
VALUES
('Voyage', 'Lorem', 'Ipsum', 'LOREM ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'jaj', 'jaj', 'jajjijaj', '24/5/18', 'Someone else', 'oui', 'non', 'nope', 'yes')
;
INSERT INTO `articles`
(`category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle`)
VALUES
('Voyage', 'Lirem', 'Ipsum', 'LIREM ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'jaj', 'jaj', 'jajjijaj', '24/5/18', 'Again Someone else', 'oui', 'non', 'nope', 'yes')
;
