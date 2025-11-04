CREATE DATABASE IF NOT EXISTS librairie CHARACTER SET utf8mb4;

USE librairie;

-- CATEGORIES
CREATE TABLE IF NOT EXISTS librairie.categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- EDITEURS
CREATE TABLE IF NOT EXISTS librairie.editeurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- AUTEURS
CREATE TABLE IF NOT EXISTS auteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- LIVRES
CREATE TABLE IF NOT EXISTS librairie.livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur_id INT NOT NULL,
    annee_publication INT NOT NULL,
    categorie_id INT NOT NULL,
    editeur_id INT NOT NULL
);

ALTER TABLE librairie.livres
    ADD CONSTRAINT fk_auteur FOREIGN KEY (auteur_id) REFERENCES auteurs(id) ON DELETE SET NULL;

ALTER TABLE librairie.livres
    ADD CONSTRAINT fk_categorie FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE SET NULL;

ALTER TABLE librairie.livres
    ADD CONSTRAINT fk_editeur FOREIGN KEY (editeur_id) REFERENCES editeurs(id) ON DELETE SET NULL;

-- INSERER DES DONNÉES DE TESTS
INSERT INTO librairie.categories (nom) VALUES
('Roman'),
('Science-Fiction'),
('Essai'),
('Biographie'),
('Jeunesse');

INSERT INTO librairie.editeurs (nom) VALUES 
('Gallimard'),
('Flammarion'),
('Actes Sud'),
('Hachette'),
('Albin Michel');

INSERT INTO auteurs (nom) VALUES
('Victor Hugo'),
('Jules Verne'),
('Marguerite Duras'),
('Albert Camus'),
('George Orwell');

INSERT INTO livres (titre, auteur_id, annee_publication, categorie_id, editeur_id) VALUES
('Je suis un livre', 1, 1990, 1, 1);