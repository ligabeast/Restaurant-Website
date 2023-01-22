CREATE DATABASE Restaurant
    CHARACTER SET UTF8mb4
    COLLATE utf8mb4_unicode_ci;

USE Restaurant;

CREATE TABLE foods(
                         id BIGINT PRIMARY KEY,
                         name VARCHAR(80) NOT NULL unique,
                         description VARCHAR(800) NOT NULL,
                         vegetarian BOOLEAN NOT NULL,
                         vegan BOOLEAN NOT NULL,
                         price_intern DOUBLE NOT NULL,
                         price_extern DOUBLE NOT NULL CHECK(price_extern >= price_intern)
);

CREATE TABLE allergens(
                          code CHAR(4) PRIMARY KEY,
                          name VARCHAR(300) NOT NULL,
                          typ VARCHAR(20) NOT NULL
);


CREATE TABLE food_have_allergen(
                         code CHAR(4),
                         food_id BIGINT,
                         FOREIGN KEY(code) REFERENCES allergens(code) ON DELETE CASCADE,
                         FOREIGN KEY(food_id) REFERENCES foods(id) ON DELETE CASCADE
);

CREATE TABLE users(
                         id BIGINT PRIMARY KEY AUTO_INCREMENT,
                         NAME VARCHAR(200) NOT NULL,
                         email VARCHAR(100) NOT NULL UNIQUE,
                         password VARCHAR(200) NOT NULL,
                         admin BOOLEAN NOT NULL DEFAULT false,
                         countFailure INT NOT NULL DEFAULT 0,
                         countRegistration INT NOT NULL DEFAULT 0,
                         lastRegistration DATETIME,
                         lastFailure DATETIME
);

CREATE TABLE ratings(
                        id BIGINT Auto_INCREMENT,
                        comment VARCHAR(200),
                        rating TINYINT,
                        created_at DATE DEFAULT NOW(),
                        food_id BIGINT NOT NULL,
                        user_id BIGINT NOT NULL,
                        highlighted boolean DEFAULT 0,
                        FOREIGN KEY(food_id) REFERENCES foods(id) ON DELETE CASCADE,
                        FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
                        PRIMARY KEY (id)
);

CREATE TABLE tickets(
                       id BIGINT PRIMARY KEY AUTO_INCREMENT,
                       category VARCHAR(50) NOT NULL,
                       state VARCHAR(50) DEFAULT 'Ausstehend' NOT NULL,
                       specifikation VARCHAR(50) NOT NULL,
                       description VARCHAR(200) NOT NULL,
                       email VARCHAR(200) NOT NULL,
                       created_at DATETIME DEFAULT NOW(),
                       user_id BIGINT,
                       CONSTRAINT FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO `allergens` (`code`, `name`, `typ`) VALUES
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

INSERT INTO `foods` (`id`, `name`, `description`, `vegan`, `vegetarian`, `price_intern`, `price_extern`) VALUES
                                                                                                                                (1, 'Bratkartoffeln mit Speck und Zwiebeln', 'Kartoffeln mit Zwiebeln und gut Speck', 0, 0, 2.3, 4),
                                                                                                                                (3, 'Bratkartoffeln mit Zwiebeln', 'Kartoffeln mit Zwiebeln und ohne Speck', 1, 1, 2.3, 4),
                                                                                                                                (4, 'Grilltofu', 'Fein gewürzt und mariniert', 1, 1, 2.5, 4.5),
                                                                                                                                (5, 'Lasagne', 'Klassisch mit Bolognesesoße und Creme Fraiche', 0, 0, 2.5, 4.5),
                                                                                                                                (6, 'Lasagne vegetarisch', 'Klassisch mit Sojagranulatsoße und Creme Fraiche', 0, 1, 2.5, 4.5),
                                                                                                                                (7, 'Hackbraten', 'Nicht nur für Hacker', 0, 0, 2.5, 4),
                                                                                                                                (8, 'Gemüsepfanne', 'Gesundes aus der Region, deftig angebraten', 1, 1, 2.3, 4),
                                                                                                                                (9, 'Hühnersuppe', 'Suppenhuhn trifft Petersilie', 0, 0, 2, 3.5),
                                                                                                                                (10, 'Forellenfilet', 'mit Kartoffeln und Dilldip', 0, 0, 3.8, 5),
                                                                                                                                (11, 'Kartoffel-Lauch-Suppe', 'der klassische Bauchwärmer mit frischen Kräutern', 0, 1, 2, 3),
                                                                                                                                (12, 'Kassler mit Rosmarinkartoffeln', 'dazu Salat und Senf', 0, 0, 3.8, 5.2),
                                                                                                                                (13, 'Drei Reibekuchen mit Apfelmus', 'grob geriebene Kartoffeln aus der Region', 0, 1, 2.5, 4.5),
                                                                                                                                (14, 'Pilzpfanne', 'die legendäre Pfanne aus Pilzen der Saison', 0, 1, 3, 5),
                                                                                                                                (15, 'Pilzpfanne vegan', 'die legendäre Pfanne aus Pilzen der Saison ohne Käse', 1, 1, 3, 5),
                                                                                                                                (16, 'Käsebrötchen', 'schmeckt vor und nach dem Essen', 0, 1, 1, 1.5),
                                                                                                                                (17, 'Schinkenbrötchen', 'schmeckt auch ohne Hunger', 0, 0, 1.25, 1.75),
                                                                                                                                (18, 'Tomatenbrötchen', 'mit Schnittlauch und Zwiebeln', 1, 1, 1, 1.5),
                                                                                                                                (19, 'Mousse au Chocolat', 'sahnige schweizer Schokolade rundet jedes Essen ab', 0, 1, 1.25, 1.75),
                                                                                                                                (20, 'Suppenkreation á la Chef', 'was verschafft werden muss, gut und günstig', 0, 0, 0.5, 0.9);

INSERT INTO `food_have_allergen` (`code`, `food_id`) VALUES
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


INSERT INTO users(NAME, email, password) VALUES
                                                ('Baran', 'Baran@test.de', 'INVALID'),
                                                ('Baran2', 'Baran@2test.de', 'INVALID'),
                                                ('Baran3', 'Baran@3test.de', 'INVALID'),
                                                ('Baran4', 'Baran@4test.de', 'INVALID'),
                                                ('Baran5', 'Baran@5test.de', 'INVALID'),
                                                ('Baran6', 'Baran@6test.de', 'INVALID');

INSERT INTO ratings(comment,rating,created_at,food_id,user_id) VALUES
                                                                              ('Das hat mega geschmeckt, kann ich jedem empfehlen!', 5, '2022-07-21', 3, 6),
                                                                              ('Der Kellner war mega unfreundlich, jedoch schmeckt das Essen', 3, '2022-09-03', 4, 6),
                                                                              ('In meine Essen war ein Haar, GEHT GARNICHT!!', 1, '2022-11-15', 17, 6),
                                                                              ('Gehe ich immer wieder gerne hin. Mega Essen und Bediehnung', 5, '2023-01-02', 14, 6),
                                                                              ('Alle meine Freunde und ich, essen jeden Freitag hier. ', 4, '2022-12-21', 11, 6),
                                                                              ('Obwohl ich Stammgast bin, wurde ich vom vorgesetzen angebrüllt, sehr Respektlos', 1, '2023-01-05', 8, 6),
                                                                              ('Die vegetarische Lasagne schmeckt sogar noch besser als die normale', 5, '2022-09-28', 6, 6);

CREATE VIEW food_information AS
SELECT g.id, g.name, g.description, g.vegetarian, g.vegan, g.price_intern, g.price_extern, GROUP_CONCAT(a.name) AS 'allergens', GROUP_CONCAT(gha.code) AS 'allergens_code' FROM foods AS g
                                                                                                                                                                                                    JOIN food_have_allergen AS gha ON g.id = gha.food_id
                                                                                                                                                                                                    JOIN allergens AS a ON a.code = gha.code
GROUP BY g.name;

CREATE PROCEDURE incrementRegistration ( IN b_id BIGINT )
BEGIN
    UPDATE users SET users.countRegistration = users.countRegistration + 1
    WHERE users.id = b_id;
END;






