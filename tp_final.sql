drop database if exists tp_final;
create database tp_final;
use tp_final;
 
create table tp_final_membre (
    id_membre int auto_increment primary key,
    nom varchar(100) not null,
    datenaissance date not null,
    email varchar(100) not null unique,
    ville varchar(100) not null,
    genre enum('M', 'F') not null,
    mdp varchar(255) not null
);

create table tp_final_categorie_objet(
    id_categorie int auto_increment primary key,
    nom_categorie varchar(100) not null unique
);

create table tp_final_objet(
    id_objet int auto_increment primary key,
    nom_objet varchar(100) not null,    
    id_categorie int not null,
    id_membre int not null,
    foreign key (id_categorie) references tp_final_categorie_objet(id_categorie),
    foreign key (id_membre) references tp_final_membre(id_membre)
);

create table tp_final_emprunt(
    id_emprunt int auto_increment primary key,
    id_objet int not null,
    id_membre int not null,
    date_emprunt date not null,
    date_retour date not null,
    foreign key (id_objet) references tp_final_objet(id_objet),
    foreign key (id_membre) references tp_final_membre(id_membre)
);

create table tp_final_images_objet(
    id_image int auto_increment primary key,
    id_objet int not null,
    nom_image varchar(255) not null,
    foreign key (id_objet) references tp_final_objet(id_objet)
);

insert into tp_final_membre (nom, datenaissance, email, ville, genre, mdp) values
('Alice Dupont', '1990-05-15', 'alice.dupont@gmail.com', 'Paris', 'F', '123'),
('Bob Martin', '1985-10-20', 'bob.martin@gmail.com', 'Lyon', 'M', '456'),
('Charlie Petit', '2000-02-28', 'charlie.petit@gmail.com', 'Marseille', 'M', '789'),
('Diane Lefevre', '1995-07-10', 'diane.lefevre@gmail.com', 'Toulouse', 'F', '101');

insert into tp_final_categorie_objet (nom_categorie) values
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

insert into tp_final_objet (nom_objet, id_categorie, id_membre) values
('Crème hydratante', 1, 1),
('Perceuse électrique', 2, 2),
('Clé à molette', 3, 3),
('Robot de cuisine', 4, 4),
('Sèche-cheveux', 1, 1),
('Tournevis', 2, 2),
('Clé à pipe', 3, 3),
('Mixeur', 4, 4),
('Lisseur', 1, 1),
('Scie sauteuse', 2, 2),
('Clé Allen', 3, 3),
('Friteuse', 4, 4),
('Crème solaire', 1, 1),
('Perceuse à percussion', 2, 2),
('Clé dynamométrique', 3, 3),
('Blender', 4, 4),
('Masque de beauté', 1, 1),
('Visseuse', 2, 2),
('Clé à cliquet', 3, 3),
('Cuiseur vapeur', 4, 4),
('Crème anti-âge', 1, 1),
('Ponceuse', 2, 2),
('Clé à cliquet', 3, 3),
('Four à micro-ondes', 4, 4),
('Gel douche', 1, 1),
('Perceuse sans fil', 2, 2),
('Clé à molette réglable', 3, 3),
('Cafetière', 4, 4),
('Crème de jour', 1, 1),
('Scie circulaire', 2, 2),
('Clé à cliquet réversible', 3, 3),
('Grille-pain', 4, 4),
('Crème de nuit', 1, 1),
('Perceuse à colonne', 2, 2),
('Clé à cliquet longue', 3, 3),
('Mixeur plongeant', 4, 4),
('Crème pour les mains', 1, 1),
('Perceuse à percussion sans fil', 2, 2),
('Clé à molette fixe', 3, 3),
('Robot pâtissier', 4, 4);

insert into tp_final_emprunt (id_objet, id_membre, date_emprunt, date_retour) values
(1, 1, '2023-10-01', '2025-10-15'),
(2, 2, '2023-10-02', '2023-10-16'),
(3, 3, '2023-10-03', '2025-10-17'),
(4, 4, '2023-10-04', '2023-10-18'),
(5, 1, '2023-10-05', '2025-10-19'),
(6, 2, '2023-10-06', '2023-10-20'),
(7, 3, '2023-10-07', '2025-10-21'),
(8, 4, '2023-10-08', '2023-10-22'),
(9, 1, '2023-10-09', '2025-10-23'),
(10, 2, '2023-10-10', '2023-10-24');

create or replace view v_tp_final_emprunt_current as
select o.*, e.id_emprunt, e.date_emprunt, e.date_retour, e.id_membre as emprunteur 
from tp_final_objet as o
join tp_final_emprunt as e on o.id_objet = e.id_objet;

create or replace view v_objet_categorie as
select o.*, cat.nom_categorie from tp_final_objet as o
join tp_final_categorie_objet as cat on o.id_categorie = cat.id_categorie;

/* insert into tp_final_images_objet (id_objet, nom_image) values
(1, 'creme_hydratante.jpg'),
(2, 'perceuse_electrique.jpg'),
(3, 'cle_molette.jpg'),
(4, 'robot_cuisine.jpg'),
(5, 'seche_cheveux.jpg'),
(6, 'tournevis.jpg'),
(7, 'cle_pipe.jpg'),
(8, 'mixeur.jpg'),
(9, 'lisseur.jpg'),
(10, 'scie_sauteuse.jpg'),
(11, 'cle_allen.jpg'),
(12, 'friteuse.jpg'),
(13, 'creme_solaire.jpg'),
(14, 'perceuse_percussion.jpg'),
(15, 'cle_dynamometrique.jpg'),
(16, 'blender.jpg'),
(17, 'masque_beaute.jpg'),
(18, 'visseuse.jpg'),
(19, 'cle_cliquet.jpg'),
(20, 'cuiseur_vapeur.jpg'); */