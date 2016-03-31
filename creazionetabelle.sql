SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Persone;
DROP TABLE IF EXISTS Soci;
DROP TABLE IF EXISTS Sub;
DROP TABLE IF EXISTS Brevetti;
DROP TABLE IF EXISTS AttrezzatureScuola;
DROP TABLE IF EXISTS Corsi;
DROP TABLE IF EXISTS Eventi;
DROP TABLE IF EXISTS EventiSoci;
DROP TABLE IF EXISTS Immersioni;
DROP TABLE IF EXISTS ImmersioniSub;
DROP TABLE IF EXISTS Lezioni;
DROP TABLE IF EXISTS Noleggi;
DROP TABLE IF EXISTS PersoneCorsi;
DROP TABLE IF EXISTS PersoneEventi;
DROP TABLE IF EXISTS Riunioni;
DROP TABLE IF EXISTS SociRiunioni;
DROP TABLE IF EXISTS SociSub;
DROP TABLE IF EXISTS Users;

CREATE TABLE Persone (
    idpersona       INT PRIMARY KEY,
    nome            VARCHAR(45) NOT NULL,
    cognome         VARCHAR(45) NOT NULL,
    datanascita     DATE NOT NULL,
    email           VARCHAR(45) UNIQUE,
    telefono       VARCHAR(10) UNIQUE
)ENGINE=InnoDB;

CREATE TABLE Soci (
    idsocio         INT PRIMARY KEY,
    dataiscrizione  DATE NOT NULL,
    quota           DECIMAL(10,2) NOT NULL,
    scontoatt       VARCHAR(45) NOT NULL,
    FOREIGN KEY(idsocio) REFERENCES Persone(idpersona) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Sub (
    idsub           INT PRIMARY KEY,
    totimmersioni   INT,
    FOREIGN KEY(idsub) REFERENCES Persone(idpersona) ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE Corsi (
    codcorso        INT PRIMARY KEY,
    nome            VARCHAR(45) NOT NULL,
    esame           DATETIME,
    costo           DECIMAL(10,2) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE PersoneCorsi (
    persona         INT,
    corso           INT,
    PRIMARY KEY (persona, corso),
    FOREIGN KEY (persona) REFERENCES Persone(idpersona) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (corso) REFERENCES Corsi(codcorso) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Lezioni (
    idlez       INT PRIMARY KEY,
    data        DATE NOT NULL,
    ora         TIME NOT NULL,
    luogo       ENUM('Scuola','Piscina','Mare','Lago'),
    corso       INT NOT NULL,
    FOREIGN KEY (corso) REFERENCES Corsi(codcorso) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Eventi (
    idevento    INT PRIMARY KEY,
    nome        VARCHAR(45) NOT NULL,
    data        DATE NOT NULL,
    luogo       VARCHAR(45) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE EventiSoci (
    evento      INT,
    socio       INT,
    PRIMARY KEY (evento,socio),
    FOREIGN KEY (evento) REFERENCES Eventi(idevento) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (socio) REFERENCES Soci(idsocio) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Brevetti (
    brevetto       VARCHAR(45) PRIMARY KEY,
    nome           VARCHAR(45) NOT NULL,
    maxprofondita  INT,
    sub            INT NOT NULL,
    FOREIGN KEY (sub) REFERENCES Sub(idsub) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Immersioni (
    codimm          INT PRIMARY KEY,
    data            DATE NOT NULL,
    ora             TIME NOT NULL,
    citta           VARCHAR(45) NOT NULL,
    luogo           ENUM('Mare','Lago'),
    tipo            ENUM('Diurna','Notturna'),
    inizioimm       ENUM('Spiaggia','Gommone','Barca'),
    costo           DECIMAL(10,2) NOT NULL,
    profonditamax   INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE ImmersioniSub (
    immersione      INT,
    sub             INT,
    PRIMARY KEY(immersione,sub),
    FOREIGN KEY(immersione) REFERENCES Immersioni(codimm) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(sub) REFERENCES Sub(idsub) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE AttrezzatureScuola (
    codatt       	INT PRIMARY KEY,
    tipo        	VARCHAR(45) NOT NULL,
    prezzonoleggio	DECIMAL(10,2) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Noleggi (
    sub             INT NOT NULL,
    att             INT PRIMARY KEY,
    data            DATE NOT NULL,
    prezzofinale    DECIMAL(10,2) NOT NULL,
    FOREIGN KEY(sub) REFERENCES Sub(idsub) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(att) REFERENCES AttrezzatureScuola(codatt) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE PersoneEventi (
    evento      INT,    
    persona     INT,
    PRIMARY KEY(persona,evento),
    FOREIGN KEY(persona) REFERENCES Persone(idpersona) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(evento) REFERENCES Eventi(idevento) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Riunioni (
    codriunione     INT PRIMARY KEY,
    data            DATE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE SociRiunioni (
    socio       INT,
    riunione    INT,
    PRIMARY KEY(socio,riunione),
    FOREIGN KEY(socio) REFERENCES Soci(idsocio) ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(riunione) REFERENCES Riunioni(codriunione) ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=InnoDB;



CREATE TABLE Users (
  
    email varchar(45) NOT NULL,

    username varchar(45) NOT NULL,
    password varchar(45) NOT NULL,
    UNIQUE KEY email (email),

    UNIQUE KEY username (username)

)ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS=1;