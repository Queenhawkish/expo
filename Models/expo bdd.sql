#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Event
#------------------------------------------------------------

CREATE TABLE Event(
        Id          Int  Auto_increment  NOT NULL ,
        Poster      Int NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        Type_Id     Int NOT NULL ,
        Date        Varchar (50) ,
        Heure       Varchar (50) ,
        Lieu        Varchar (50) ,
        Description Text ,
        Archiver    Bool NOT NULL
	,CONSTRAINT Event_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Picture
#------------------------------------------------------------

CREATE TABLE Picture(
        Id           Int  Auto_increment  NOT NULL ,
        Event_Id     Int NOT NULL ,
        Picture_path Varchar (250) NOT NULL
	,CONSTRAINT Picture_PK PRIMARY KEY (Id)
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
# Table: Administrator
#------------------------------------------------------------

CREATE TABLE Administrator(
        ID       Int  Auto_increment  NOT NULL ,
        Login    Varchar (50) NOT NULL ,
        Password Varchar (50) NOT NULL
	,CONSTRAINT Administrator_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation0
#------------------------------------------------------------

CREATE TABLE relation0(
        Id         Int NOT NULL ,
        Id_Picture Int NOT NULL
	,CONSTRAINT relation0_PK PRIMARY KEY (Id,Id_Picture)

	,CONSTRAINT relation0_Event_FK FOREIGN KEY (Id) REFERENCES Event(Id)
	,CONSTRAINT relation0_Picture0_FK FOREIGN KEY (Id_Picture) REFERENCES Picture(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation1
#------------------------------------------------------------

CREATE TABLE relation1(
        Id       Int NOT NULL ,
        Id_Event Int NOT NULL
	,CONSTRAINT relation1_PK PRIMARY KEY (Id,Id_Event)

	,CONSTRAINT relation1_Type_FK FOREIGN KEY (Id) REFERENCES Type(Id)
	,CONSTRAINT relation1_Event0_FK FOREIGN KEY (Id_Event) REFERENCES Event(Id)
)ENGINE=InnoDB;

