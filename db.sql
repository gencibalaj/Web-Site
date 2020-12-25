DROP database IF exists register;

use register;

CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `passHash` varchar(255) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
);

CREATE TABLE `infos` (
  `name` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `brth` date DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `pswhash` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `confirmed` varchar(40) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`email`)
);

CREATE TABLE `Books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `cover` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `pages` varchar(30) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  PRIMARY KEY (`bookId`)
);

CREATE TABLE courses (
	cid int PRIMARY KEY AUTO_INCREMENT,
    ctitle varchar(30),
    cProfesor varchar(30)
);

CREATE TABLE `Chat` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(400) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`chatId`),
  FOREIGN KEY (`email`) REFERENCES `infos` (`email`)
);

CREATE TABLE `gadgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(30) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

Drop table Chat;
Drop table infos;

CREATE TABLE `Videos` (
  `VideoId` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `length` varchar(30) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  PRIMARY KEY (`VideoId`),
  foreign key (cid) REFERENCES courses (cid) on delete cascade
);




INSERT INTO `admins` VALUES ('admin','83de43708516dee5078a01781c297310','');

INSERT INTO `Books` VALUES (6,'Learning PHP, MySQL & JavaScri','Robin Nixon','php.pdf','https://images-na.ssl-images-amazon.com/images/I/51mk%2B9J-dbL._SX379_BO1,204,203,200_.jpg','PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.','200',9.7),(7,'The Math Book','Eltion Musa','Sinjale&Sisteme-Ligj_1_2018.pdf','https://images-na.ssl-images-amazon.com/images/I/61iL2ifdfDL._SX435_BO1,204,203,200_.jpg','Maths infinite mysteries unfold in this paperback edition of the bestselling TheMath Book. Beginning millions of years ago with ancient “ant odometers” and moving through time to our modern-day quest for new dimensions, prolific polymath ','400',8.9),(8,'The Pragmatic Programmer','David Thomas','the-pragmatic-programmer.pdf','https://images-na.ssl-images-amazon.com/images/I/41BKx1AxQWL._SX396_BO1,204,203,200_.jpg','Ward Cunningham Straight from the programming trenches, The Pragmatic Programmer cuts through the increasing specialization and technicalities of modern software development to examine the core process--taking a requirement and producing working, maintainable code that delights its users.','500',7.4),(9,'Learning Python, 5th Edition','Mark Lutz','Learning Python, 5th Edition.pdf','https://images-na.ssl-images-amazon.com/images/I/515iBchIIzL._SX379_BO1,204,203,200_.jpg','Get a comprehensive, in-depth introduction to the core Python language with this hands-on book. Based on author Mark Lutzs popular training course, this updated fifth edition will help you quickly write efficient, high-quality code with Python. Its an ideal way to begin, whether youre new to program','200',5.7),(10,'The Clean Coder','Robert C. Martin','The Clean Coder A Code of Conduct for Professional Programmers.pdf','https://images-na.ssl-images-amazon.com/images/I/5154eSTKUxL._SX382_BO1,204,203,200_.jpg','Programmers who endure and succeed amidst swirling uncertainty and nonstop pressure share a common attribute: They care deeply about the practice of creating software. They treat it as a craft. They are professionals.','203',8.6),(11,'Effective Debugging','Diomidis Spinellis','debugging.pdf','https://images-na.ssl-images-amazon.com/images/I/51qXhaltE-L._SX382_BO1,204,203,200_.jpg','Every software developer and IT professional understands the crucial importance of effective debugging. Often, debugging consumes most of a developer','400',10);

INSERT INTO `courses` VALUES (1,'Javascript Basic','Lule Ahmedi'),(2,'PHP','Lule Ahmedi');

INSERT INTO `gadgets` VALUES (1,'present.jpg','https://familylivingtoday.com/best-gifts-for-kids/','What we like.'),(2,'phoneandothers.jpg.png','https://www.youtube.com/watch?v=P4ub-xwhx4k&list=PLdlqH-byLbwQCKuEgJLQGxB_QIG7vwoHn','Ready to go.'),(3,'books.png','https://www.theverge.com/','The best human friend.'),(4,'verge.png','https://www.theverge.com/','Stay tuned about tech.'),(5,'welearntogether.png','https://www.parents.com/fun/arts-crafts/kid/?fbclid=IwAR15trKzC0PtGlBvmpR-fb8WhfBu5-xVoqGzWr_orO-1Rmx5bP1DigW0quY','We learn together.'),(6,'Audible.png','https://www.audible.com/','For the lazy students.'),(7,'Audible.png','https://www.audible.com/','For the lazy students.'),(8,'Audible.png','https://www.audible.com/','For the lazy students.'),(9,'present.jpg','https://familylivingtoday.com/best-gifts-for-kids/','What we like.'),(10,'present.jpg','https://familylivingtoday.com/best-gifts-for-kids/','What we like.'),(11,'phoneandothers.jpg.png','https://www.youtube.com/watch?v=P4ub-xwhx4k&list=PLdlqH-byLbwQCKuEgJLQGxB_QIG7vwoHn','Ready to go.'),(12,'books.png','https://www.theverge.com/','The best human friend.'),(13,'verge.png','https://www.theverge.com/','Stay tuned about tech.'),(14,'welearntogether.png','https://www.parents.com/fun/arts-crafts/kid/?fbclid=IwAR15trKzC0PtGlBvmpR-fb8WhfBu5-xVoqGzWr_orO-1Rmx5bP1DigW0quY','We learn together.'),(15,'Audible.png','https://www.audible.com/','For the lazy students.'),(16,'Audible.png','https://www.audible.com/','For the lazy students.'),(17,'Audible.png','https://www.audible.com/','For the lazy students.'),(18,'present.jpg','https://familylivingtoday.com/best-gifts-for-kids/','What we like.'),(19,'present.jpg','https://familylivingtoday.com/best-gifts-for-kids/','What we like.'),(23,'cool-background.jpg','http://www.gstatic.com/tv/thumb/tvbanners/9181462/p9181462_b_v8_aa.jpg','www');

INSERT INTO `infos` VALUES ('Eltioni','Musa','eltimusa4@gmail.com','1999-01-12','3lFsBrbu5u','dfa62fcd582877c4205dc7f16b3d55516086d3a5','1999-01-12','\0','\0','07e903298b7ecdbc5f7e85ff3ef2955c','552cc118b630e3fa400160520178dd37MTU1OTYxMTg2Mg=='),('Genc','Balaj','gencibalaj@gmail.com','1999-01-12','nFEE2Bxe1k','bbfcdb5be996e3583ed9f1f87784b5c3efed4111','+38349838588','\0','\0','yes','d786932e9f0fa82da1b7f4cf4faedee0MTU1OTYwNTg4Mg==');

INSERT INTO `Videos` VALUES (1,2,'PHP 1. Variables','Lule Ahmedi','php1.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','4',8),(2,2,'PHP 2. Arrays','Lule Ahmedi','php2.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','10',10),(3,2,'PHP 3. Strings','Lule Ahmedi','php3.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','10',8),(4,2,'PHP 4. Regular Expresions','Lule Ahmedi','php4.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','10',10),(5,2,'PHP 5.POO in PHP','Lule Ahmedi','php5.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','10',10),(6,2,'PHP 6. AJAX','Lule Ahmedi','php6.mp4','https://www.tutorialspoint.com/php/images/php-mini-logo.jpg','PHP','10',10),(7,1,'Javascript Variables','Lule Ahmedi','javascript1.mp4','images/js.jpeg','Javascript','10',10),(8,1,'Javascript Arrays','Lule Ahmedi','javascript2.mp4','images/js.jpeg','PHP','10',10),(9,1,'Javascript String','Lule Ahmedi','javascript3.mp4','images/js.jpeg','PHP','10',10),(10,1,'Javascript OPP','Lule Ahmedi','javascript4.mp4','images/js.jpeg','Javascript','10',10),(11,1,'Javascript Canvas','Lule Ahmedi','javascript5.mp4','images/js.jpeg','Javascript','10',10),(12,1,'JQuery','Lule Ahmedi','javascript5.mp4','images/js.jpeg','Javascript','10',10),(13,1,'JQuery Selectors','Lule Ahmedi','javascript6.mp4','images/js.jpeg','Javascript','10',10);
