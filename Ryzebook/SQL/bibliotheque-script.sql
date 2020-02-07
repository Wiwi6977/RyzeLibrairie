DROP TABLE IF EXISTS Role;
DROP TABLE IF EXISTS Personne;
DROP TABLE IF EXISTS Auteur;
DROP TABLE IF EXISTS Editeur;
DROP Table IF EXISTS Langue;
DROP Table IF EXISTS Genre;
DROP TABLE IF EXISTS Livre;

CREATE TABLE `Role` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`libelle`	VARCHAR(150) NOT NULL
);
INSERT INTO `Role` (id,libelle) VALUES (1,'Ecrivain'),
 (2,'Illustrateur'),
 (3,'Traducteur'),
 (4,'Préface');
CREATE TABLE `Personne` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nom`	VARCHAR(150) NOT NULL,
	`prenom`	VARCHAR(150)
);
INSERT INTO `Personne` (id,nom,prenom) VALUES (1,'Murakami','Haruki'),
 (2,'Corneille','Pierre'),
 (3,'Menschik','Kat'),
 (4,'Morita','Helene'),
 (5,'Feydeau','Georges'),
 (6,'Hugo','Victor'),
 (7,'Chedeville','Elise'),
 (8,'Molière',NULL),
 (9,'Genet','Jean'),
 (10,'Jouvet','Louis'),
 (11,'Tzu','Sun'),
 (12,'Amiot','Joseph-Marie'),
 (13,'Nosaka','Akiyuki'),
 (14,'De Vos','Patrick'),
 (15,'Gossot','Anne'),
 (16,'Chamarat-Malandain','Gabrielle'),
 (17,'Bryson','Bill');
CREATE TABLE `Livre` (
	`isbn`	VARCHAR(15) NOT NULL,
	`titre`	VARCHAR(500) NOT NULL,
	`editeur`	INTEGER NOT NULL,
	`annee`	INTEGER,
	`genre`	INTEGER,
	`langue`	INTEGER,
	`nbpages`	INTEGER,
	PRIMARY KEY(isbn)
);
INSERT INTO `Livre` (isbn,titre,editeur,annee,genre,langue,nbpages) VALUES ('2264056002','La ballade de l''impossible',1,2002,'2',2,456),
 ('2264056169','Kafka sur le rivage',1,2002,'2',2,648),
 ('2264069112','L''étrange bibliothèque',1,2015,'3',2,80),
 ('2266152181','Le cid',2,1637,'1',2,208),
 ('203585573X','Ruy Blas',2,1838,'1',2,270),
 ('208127857X','Un fil à la patte',7,1894,'1',2,208),
 ('2253163503','Le Dindon',6,1989,'1',2,107),
 ('2253041475','Hernani',6,1830,'1',2,NULL),
 ('2253160466','Les précieuses ridicules',6,1660,'1',2,NULL),
 ('2253038741','Les femmes savantes',6,1672,'1',2,NULL),
 ('2253037923','Le misanthrope',6,1666,'1',2,NULL),
 ('2035867916','L''illusion comique',6,1639,'1',2,NULL),
 ('2070373096','Les Paravents',7,1961,'1',2,NULL),
 ('2081219972','Le Comédien désincarné',2,2009,'2',2,390),
 ('2266152182','L''art de la guerre',2,1963,'4',2,NULL),
 ('2809710562','La tombe des lucioles',8,1967,'2',2,143),
 ('2266203533','Les Contemplations',4,1856,'5',2,672),
 ('2253040156','Poètes français des XIXe et XXe sciècles',6,2009,'5',2,NULL),
 ('096573840X','A short history of Nearly Everything',9,2003,'4',1,NULL);
CREATE TABLE `Langue` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`libelle`	VARCHAR(150) NOT NULL
);
INSERT INTO `Langue` (id,libelle) VALUES (1,'Anglais'),
 (2,'Français'),
 (3,'Japonais'),
 (4,'Espagnol'),
 (5,'Italien');
CREATE TABLE `Genre` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`libelle`	VARCHAR(150) NOT NULL UNIQUE
);
INSERT INTO `Genre` (id,libelle) VALUES (1,'Théâtre'),
 (2,'Roman'),
 (3,'Nouvelle'),
 (4,'Essai'),
 (5,'Poésie');
CREATE TABLE `Editeur` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`libelle`	VARCHAR(150) NOT NULL
);
INSERT INTO `Editeur` (id,libelle) VALUES (1,'Belfond'),
 (2,'Flammarion'),
 (3,'Librio'),
 (4,'Pocket'),
 (5,'Larousse'),
 (6,'Le livre de poche'),
 (7,'Folio Théâtre'),
 (8,'Philippe Picquier'),
 (9,'Guardian');
CREATE TABLE `Auteur` (
	`idPersonne`	INTEGER NOT NULL,
	`idLivre`	VARCHAR(15) NOT NULL,
	`idRole`	INTEGER NOT NULL
);
INSERT INTO `Auteur` (idPersonne,idLivre,idRole) VALUES (1,"2264069112",1),
 (3,"2264069112",2),
 (4,"2264069112",3),
 (1,"2264056002",1),
 (1,"2264056169",1),
 (6,"203585573X",1),
 (5,"208127857X",1),
 (5,"2253163503",1),
 (6,"2253041475",1),
 (8,"2253160466",1),
 (8,"2253038741",1),
 (8,"2253037923",1),
 (2,"2035867916",1),
 (9,"2070373096",1),
 (10,"2081219972",1),
 (11,"2266152182",1),
 (12,"2266152182",3),
 (13,"2809710562",1),
 (14,"2809710562",3),
 (15,"2809710562",3),
 (16,"2266203533",4),
 (17,"096573840X",1);
