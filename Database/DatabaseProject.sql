CREATE DATABASE Kledingwinkel;

USE Kledingwinkel;

CREATE TABLE Producten(
	ProductenID INT AUTO_INCREMENT,
    Naam VARCHAR(255),
    Prijs DECIMAL(65, 30),
    Soort VARCHAR(255),
    PRIMARY KEY (ProductenID)
);
INSERT INTO Producten (ProductenID, Naam, Prijs, Soort) VALUES
	(NULL, 'Tuxedo', 100.00, 'Pak'),
    (NULL, 'Rode Jurk', 75.00, 'Jurk'),
    (NULL, 'Baby Tuxedo', 50.00, 'Pak');

CREATE TABLE Klanten(
	KlantenID INT AUTO_INCREMENT,
    Naam VARCHAR(255),
    Email VARCHAR(255),
    Wachtwoord VARCHAR(255),
    PRIMARY KEY (KlantenID)
);
INSERT INTO Klanten (KlantenID, Naam, Email, Wachtwoord) VALUES
	(NULL, 'Don Kieu', 'donk124@gmail.com', 'IamAsian124'),
    (NULL, 'Uveys Yuksel', 'muy42@gmail.com', 'KONYA42NUMBER1'),
    (NULL, 'Vinu Kumar', 'vk555@gmail.com', 'MijnNaamIsVinu555'),
    (NULL, 'Lakshya Channa', 'lach1010@gmail.com', 'MijnHaarIsCool1001');

CREATE TABLE Bestellingen(
	BestellingID INT AUTO_INCREMENT,
    Naam VARCHAR(255),
    Adres VARCHAR(255),
    PRIMARY KEY (BestellingID)
);
INSERT INTO Bestellingen (BestellingID, Naam, Adres) VALUES
	(NULL, 'Tuxedo', 'Waterplein 2'),
    (NULL, 'Baby Tuxedo', 'Waterplein 2');

