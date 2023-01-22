CREATE DATABASE mensaapplication
    CHARACTER SET UTF8mb4
    COLLATE utf8mb4_unicode_ci;

USE mensaapplication;

CREATE TABLE gerichte(
                         id BIGINT PRIMARY KEY,
                         name VARCHAR(80) NOT NULL unique,
                         beschreibung VARCHAR(800) NOT NULL,
                         erfasst_am DATE NOT NULL,
                         vegetarisch BOOLEAN NOT NULL,
                         vegan BOOLEAN NOT NULL,
                         preis_intern DOUBLE NOT NULL,
                         preis_extern DOUBLE NOT NULL CHECK(preis_extern >= preis_intern)
);

CREATE TABLE allergene(
                          code CHAR(4) PRIMARY KEY,
                          name VARCHAR(300) NOT NULL,
                          typ VARCHAR(20) NOT NULL
);

CREATE TABLE kategorien(
                           id BIGINT PRIMARY KEY,
                           name VARCHAR(80) NOT NULL,
                           eltern_id BIGINT,
                           bildname VARCHAR(200)
);

CREATE TABLE gericht_hat_allergen(
                                     code CHAR(4),
                                     gericht_id BIGINT,
                                     FOREIGN KEY(code) REFERENCES allergene(code) ON DELETE CASCADE,
                                     FOREIGN KEY(gericht_id) REFERENCES gerichte(id) ON DELETE CASCADE
);

CREATE TABLE gericht_hat_kategorie(
                                      gericht_id BIGINT,
                                      kategorie_id BIGINT,
                                      FOREIGN KEY(gericht_id) REFERENCES gerichte(id) ON DELETE CASCADE,
                                      FOREIGN KEY(kategorie_id) REFERENCES kategorien(id) ON DELETE CASCADE
);

CREATE TABLE benutzer(
                         id BIGINT PRIMARY KEY AUTO_INCREMENT,
                         NAME VARCHAR(200) NOT NULL,
                         email VARCHAR(100) NOT NULL UNIQUE,
                         passwort VARCHAR(200) NOT NULL,
                         admin BOOLEAN NOT NULL DEFAULT false,
                         anzahlfehler INT NOT NULL DEFAULT 0,
                         anzahlanmeldungen INT NOT NULL DEFAULT 0,
                         letzteanmeldung DATETIME,
                         letzterfehler DATETIME
);

CREATE TABLE bewertungen(
                            id BIGINT Auto_INCREMENT,
                            bemerkung VARCHAR(200),
                            sterne_bewertung TINYINT,
                            zeitpunkt DATE,
                            gerichte_id BIGINT NOT NULL,
                            benutzer_id BIGINT NOT NULL,
                            wird_angezeigt boolean DEFAULT 0,
                            FOREIGN KEY(gerichte_id) REFERENCES gerichte(id) ON DELETE CASCADE,
                            FOREIGN KEY(benutzer_id) REFERENCES benutzer(id) ON DELETE CASCADE,
                            PRIMARY KEY (id)
);

CREATE TABLE ticket(
                       id BIGINT PRIMARY KEY AUTO_INCREMENT,
                       grund VARCHAR(50) NOT NULL,
                       status VARCHAR(50) DEFAULT 'Ausstehend' NOT NULL,
                       spezifiziert VARCHAR(50) NOT NULL,
                       bemerkung VARCHAR(200) NOT NULL,
                       email VARCHAR(200) NOT NULL,
                       zeitpunkt DATETIME DEFAULT NOW(),
                       benutzer_id BIGINT,
                       CONSTRAINT FOREIGN KEY(benutzer_id) REFERENCES benutzer(id) ON DELETE CASCADE
);

USE mensaapplication;

INSERT INTO `allergene` (`code`, `name`, `typ`) VALUES
                                                    ('a', 'Getreideprodukte', 'Getreide (Gluten)'),
                                                    ('a1', 'Weizen', 'Allergen'),
                                                    ('a2', 'Roggen', 'Allergen'),
                                                    ('a3', 'Gerste', 'Allergen'),
                                                    ('a4', 'Dinkel', 'Allergen'),
                                                    ('a5', 'Hafer', 'Allergen'),
                                                    ('a6', 'Dinkel', 'Allergen'),
                                                    ('b', 'Fisch', 'Allergen'),
                                                    ('c', 'Krebstiere', 'Allergen'),
                                                    ('d', 'Schwefeldioxid/Sulfit', 'Allergen'),
                                                    ('e', 'Sellerie', 'Allergen'),
                                                    ('f', 'Milch und Laktose', 'Allergen'),
                                                    ('f1', 'Butter', 'Allergen'),
                                                    ('f2', 'Käse', 'Allergen'),
                                                    ('f3', 'Margarine', 'Allergen'),
                                                    ('g', 'Sesam', 'Allergen'),
                                                    ('h', 'Nüsse', 'Allergen'),
                                                    ('h1', 'Mandeln', 'Allergen'),
                                                    ('h2', 'Haselnüsse', 'Allergen'),
                                                    ('h3', 'Walnüsse', 'Allergen'),
                                                    ('i', 'Erdnüsse', 'Allergen');

INSERT INTO `gerichte` (`id`, `name`, `beschreibung`, `erfasst_am`, `vegan`, `vegetarisch`, `preis_intern`, `preis_extern`) VALUES
                                                                                                                                (1, 'Bratkartoffeln mit Speck und Zwiebeln', 'Kartoffeln mit Zwiebeln und gut Speck', '2020-08-25', 0, 0, 2.3, 4),
                                                                                                                                (3, 'Bratkartoffeln mit Zwiebeln', 'Kartoffeln mit Zwiebeln und ohne Speck', '2020-08-25', 1, 1, 2.3, 4),
                                                                                                                                (4, 'Grilltofu', 'Fein gewürzt und mariniert', '2020-08-25', 1, 1, 2.5, 4.5),
                                                                                                                                (5, 'Lasagne', 'Klassisch mit Bolognesesoße und Creme Fraiche', '2020-08-24', 0, 0, 2.5, 4.5),
                                                                                                                                (6, 'Lasagne vegetarisch', 'Klassisch mit Sojagranulatsoße und Creme Fraiche', '2020-08-24', 0, 1, 2.5, 4.5),
                                                                                                                                (7, 'Hackbraten', 'Nicht nur für Hacker', '2020-08-25', 0, 0, 2.5, 4),
                                                                                                                                (8, 'Gemüsepfanne', 'Gesundes aus der Region, deftig angebraten', '2020-08-25', 1, 1, 2.3, 4),
                                                                                                                                (9, 'Hühnersuppe', 'Suppenhuhn trifft Petersilie', '2020-08-25', 0, 0, 2, 3.5),
                                                                                                                                (10, 'Forellenfilet', 'mit Kartoffeln und Dilldip', '2020-08-22', 0, 0, 3.8, 5),
                                                                                                                                (11, 'Kartoffel-Lauch-Suppe', 'der klassische Bauchwärmer mit frischen Kräutern', '2020-08-22', 0, 1, 2, 3),
                                                                                                                                (12, 'Kassler mit Rosmarinkartoffeln', 'dazu Salat und Senf', '2020-08-23', 0, 0, 3.8, 5.2),
                                                                                                                                (13, 'Drei Reibekuchen mit Apfelmus', 'grob geriebene Kartoffeln aus der Region', '2020-08-23', 0, 1, 2.5, 4.5),
                                                                                                                                (14, 'Pilzpfanne', 'die legendäre Pfanne aus Pilzen der Saison', '2020-08-23', 0, 1, 3, 5),
                                                                                                                                (15, 'Pilzpfanne vegan', 'die legendäre Pfanne aus Pilzen der Saison ohne Käse', '2020-08-24', 1, 1, 3, 5),
                                                                                                                                (16, 'Käsebrötchen', 'schmeckt vor und nach dem Essen', '2020-08-24', 0, 1, 1, 1.5),
                                                                                                                                (17, 'Schinkenbrötchen', 'schmeckt auch ohne Hunger', '2020-08-25', 0, 0, 1.25, 1.75),
                                                                                                                                (18, 'Tomatenbrötchen', 'mit Schnittlauch und Zwiebeln', '2020-08-25', 1, 1, 1, 1.5),
                                                                                                                                (19, 'Mousse au Chocolat', 'sahnige schweizer Schokolade rundet jedes Essen ab', '2020-08-26', 0, 1, 1.25, 1.75),
                                                                                                                                (20, 'Suppenkreation á la Chef', 'was verschafft werden muss, gut und günstig', '2020-08-26', 0, 0, 0.5, 0.9);

INSERT INTO `gericht_hat_allergen` (`code`, `gericht_id`) VALUES
                                                              ('h', 1),
                                                              ('a3', 1),
                                                              ('a4', 1),
                                                              ('f1', 3),
                                                              ('a6', 3),
                                                              ('i', 3),
                                                              ('a3', 4),
                                                              ('f1', 4),
                                                              ('a4', 4),
                                                              ('h3', 4),
                                                              ('d', 6),
                                                              ('h1',7),
                                                              ('a2', 7),
                                                              ('h3', 7),
                                                              ('c', 7),
                                                              ('a3', 8),
                                                              ('h3', 10),
                                                              ('d', 10),
                                                              ('f', 10),
                                                              ('f2', 12),
                                                              ('h1', 12),
                                                              ('a5',12),
                                                              ('c', 1),
                                                              ('a2', 9),
                                                              ('i', 14),
                                                              ('f1', 1),
                                                              ('a1', 15),
                                                              ('a4', 15),
                                                              ('i', 15),
                                                              ('f3', 15),
                                                              ('h3', 15);

INSERT INTO `kategorien` (`id`, `eltern_id`, `name`, `bildname`) VALUES
                                                                     (1, NULL, 'Aktionen', 'kat_aktionen.png'),
                                                                     (2, NULL, 'Menus', 'kat_menu.gif'),
                                                                     (3, 2, 'Hauptspeisen', 'kat_menu_haupt.bmp'),
                                                                     (4, 2, 'Vorspeisen', 'kat_menu_vor.svg'),
                                                                     (5, 2, 'Desserts', 'kat_menu_dessert.pic'),
                                                                     (6, 1, 'Mensastars', 'kat_stars.tif'),
                                                                     (7, 1, 'Erstiewoche', 'kat_erties.jpg');

INSERT INTO `gericht_hat_kategorie` (`kategorie_id`, `gericht_id`) VALUES
                                                                       (3, 1),	(3, 3),	(3, 4),	(3, 5),	(3, 6),	(3, 7),	(3, 9),	(4, 16), (4, 17), (4, 18), (5, 16), (5, 17), (5, 18);

INSERT INTO benutzer(NAME, EMAIL, PASSWORT) VALUES
                                                ('Baran', 'Baran@test.de', 'INVALID'),
                                                ('Baran2', 'Baran@2test.de', 'INVALID'),
                                                ('Baran3', 'Baran@3test.de', 'INVALID'),
                                                ('Baran4', 'Baran@4test.de', 'INVALID'),
                                                ('Baran5', 'Baran@5test.de', 'INVALID'),
                                                ('Baran6', 'Baran@6test.de', 'INVALID');

INSERT INTO bewertungen(bemerkung,sterne_bewertung,zeitpunkt,gerichte_id,benutzer_id) VALUES
                                                                              ('Das hat mega geschmeckt, kann ich jedem empfehlen!', 5, '2022-07-21', 3, 6),
                                                                              ('Der Kellner war mega unfreundlich, jedoch schmeckt das Essen', 3, '2022-09-03', 4, 6),
                                                                              ('In meine Essen war ein Haar, GEHT GARNICHT!!', 1, '2022-11-15', 17, 6),
                                                                              ('Gehe ich immer wieder gerne hin. Mega Essen und Bediehnung', 5, '2023-01-02', 14, 6),
                                                                              ('Alle meine Freunde und ich, essen jeden Freitag hier. ', 4, '2022-12-21', 11, 6),
                                                                              ('Obwohl ich Stammgast bin, wurde ich vom vorgesetzen angebrüllt, sehr Respektlos', 1, '2023-01-05', 8, 6),
                                                                              ('Die vegetarische Lasagne schmeckt sogar noch besser als die normale', 5, '2022-09-28', 6, 6);

CREATE VIEW gerichte_informationen AS
SELECT g.id, g.name, g.beschreibung, g.erfasst_am, g.vegetarisch, g.vegan, g.preis_intern, g.preis_extern, GROUP_CONCAT(a.name) AS 'allergene', GROUP_CONCAT(gha.code) AS 'allergene_code' FROM gerichte AS g
                                                                                                                                                                                                    JOIN gericht_hat_allergen AS gha ON g.id = gha.gericht_id
                                                                                                                                                                                                    JOIN allergene AS a ON a.code = gha.code
GROUP BY g.name;

CREATE PROCEDURE incrementAnmeldung ( IN b_id BIGINT )
BEGIN
    UPDATE benutzer SET benutzer.anzahlanmeldungen = benutzer.anzahlanmeldungen + 1
    WHERE benutzer.id = b_id;
END;






