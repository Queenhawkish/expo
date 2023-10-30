#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Évènements
#------------------------------------------------------------

CREATE TABLE Évenements(
        Id          Int  Auto_increment  NOT NULL ,
        Poster      Int NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        Date        Varchar (50) ,
        Heure       Varchar (50) ,
        Lieu        Varchar (50) ,
        Description Text ,
        Archiver    Bool NOT NULL ,
        Participant Int NOT NULL
	,CONSTRAINT Évenements_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photo
#------------------------------------------------------------

CREATE TABLE Photo(
        Id         Int  Auto_increment  NOT NULL ,
        Affiche    Bool NOT NULL ,
        Lien_image Varchar (100) NOT NULL
	,CONSTRAINT Photo_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Type
#------------------------------------------------------------

CREATE TABLE Type(
        Id   Int  Auto_increment  NOT NULL ,
        Type Varchar (250) NOT NULL
	,CONSTRAINT Type_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Administrateur
#------------------------------------------------------------

CREATE TABLE Administrateur(
        ID           Int  Auto_increment  NOT NULL ,
        Login        Varchar (50) NOT NULL ,
        Mot_de_passe Varchar (100) NOT NULL
	,CONSTRAINT Administrateur_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        Id           Int  Auto_increment  NOT NULL ,
        Nom          Varchar (50) NOT NULL ,
        Prenom       Varchar (50) NOT NULL ,
        Email        Varchar (100) NOT NULL ,
        Mot_de_passe Varchar (100) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photo évènement
#------------------------------------------------------------

CREATE TABLE Photo_evenement(
        Id       Int NOT NULL ,
        Id_Photo Int NOT NULL
	,CONSTRAINT Photo_evenement_PK PRIMARY KEY (Id,Id_Photo)

	,CONSTRAINT Photo_evenement_Évenements_FK FOREIGN KEY (Id) REFERENCES Évenements(Id)
	,CONSTRAINT Photo_evenement_Photo0_FK FOREIGN KEY (Id_Photo) REFERENCES Photo(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Type évènement
#------------------------------------------------------------

CREATE TABLE Type_evenement(
        Id            Int NOT NULL ,
        Id_Évenements Int NOT NULL
	,CONSTRAINT Type_evenement_PK PRIMARY KEY (Id,Id_Évenements)

	,CONSTRAINT Type_evenement_Type_FK FOREIGN KEY (Id) REFERENCES Type(Id)
	,CONSTRAINT Type_evenement_Évenements0_FK FOREIGN KEY (Id_Évenements) REFERENCES Évenements(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participant
#------------------------------------------------------------

CREATE TABLE Participant(
        Id            Int NOT NULL ,
        Id_Évenements Int NOT NULL
	,CONSTRAINT Participant_PK PRIMARY KEY (Id,Id_Évenements)

	,CONSTRAINT Participant_Utilisateur_FK FOREIGN KEY (Id) REFERENCES Utilisateur(Id)
	,CONSTRAINT Participant_Évenements0_FK FOREIGN KEY (Id_Évenements) REFERENCES Évenements(Id)
)ENGINE=InnoDB;

