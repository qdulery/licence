-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- G�n�r� le : Dimanche 02 Novembre 2008 � 21:10
-- Version du serveur: 5.0.27
-- Version de PHP: 5.2.0
-- 
-- Base de donn�es: `mobilephones`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `telephones`
-- 

CREATE TABLE `telephones` (
  `Num` int(11) NOT NULL auto_increment,
  `Nom` varchar(50) NOT NULL,
  `Commentaire` text NOT NULL,
  `Photo` varchar(15) default NULL,
  PRIMARY KEY  (`Num`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8 COMMENT='Pr�sentation des t�l�phones' AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `telephones`
-- 

INSERT INTO `telephones` (`Num`, `Nom`, `Commentaire`, `Photo`) VALUES 
(1, 'Odyss�e', 'Donec ultricies varius quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam neque magna, varius id, tempor non, molestie ac, magna. Aliquam non mi. Mauris quam purus, imperdiet at, ullamcorper id, tincidunt sed, ligula. Ut nulla nibh, consectetuer ac, iaculis quis, adipiscing vitae, nunc. Fusce quis mauris nec erat mattis faucibus. ', '1.jpg'),
(2, 'Tetra Pack', 'Un mod�le r�volutionnaire puisqu''il tient dans la main aussi bien qu''une brique de lait et peut servir � assommer un agresseur comme � planter des clous de charpentier ...', '2.gif'),
(3, 'Colibri', 'Tout petit, tout l�ger, tout petit,  tout l�ger, tout petit, tout l�ger, tout petit, tout l�ger, tout petit, tout l�ger, tout petit, tout l�ger, tout petit, tout l�ger, tout petit, tout l�ger, tout petit ...', '4.gif'),
(4, 'Parpaing+', 'Moins petit, beaucoup moins l�ger, pratique dans les manifestations, sdfsdf fghdty y jruyj rtj sfgh qdrg yj tru sqrg E FQT HYJ ETUV?FGJ DYJyj dhsth tu yj th sth dy hyh  ', '5.gif');
