#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Type
#------------------------------------------------------------

CREATE TABLE Type(
        Id   Int  Auto_increment  NOT NULL ,
        Type Varchar (250) NOT NULL
	,CONSTRAINT Type_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Event
#------------------------------------------------------------

CREATE TABLE Event(
        Id          Int  Auto_increment  NOT NULL ,
        Poster      Int NOT NULL ,
        Name        Varchar (50) NOT NULL ,
        Date_start  Datetime ,
        Date_end    Datetime ,
        Place       Varchar (50) ,
        Description Text ,
        Classify    Bool NOT NULL ,
        Id_Type     Int NOT NULL
	,CONSTRAINT Event_PK PRIMARY KEY (Id)

	,CONSTRAINT Event_Type_FK FOREIGN KEY (Id_Type) REFERENCES Type(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: AssocAlfort Administrator
#------------------------------------------------------------

CREATE TABLE AssocAlfort_Administrator(
        ID       Int  Auto_increment  NOT NULL ,
        Login    Varchar (50) NOT NULL ,
        Password Varchar (50) NOT NULL
	,CONSTRAINT AssocAlfort_Administrator_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User participant
#------------------------------------------------------------

CREATE TABLE User_participant(
        Id       Int  Auto_increment  NOT NULL ,
        Email    Varchar (50) NOT NULL ,
        Id_Event Int NOT NULL
	,CONSTRAINT User_participant_PK PRIMARY KEY (Id)

	,CONSTRAINT User_participant_Event_FK FOREIGN KEY (Id_Event) REFERENCES Event(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Album
#------------------------------------------------------------

CREATE TABLE Album(
        Id       Int  Auto_increment  NOT NULL ,
        Name     Varchar (50) NOT NULL ,
        Id_Event Int NOT NULL
	,CONSTRAINT Album_PK PRIMARY KEY (Id)

	,CONSTRAINT Album_Event_FK FOREIGN KEY (Id_Event) REFERENCES Event(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Picture
#------------------------------------------------------------

CREATE TABLE Picture(
        Id           Int  Auto_increment  NOT NULL ,
        Picture_path Varchar (250) NOT NULL ,
        Id_Album     Int NOT NULL
	,CONSTRAINT Picture_PK PRIMARY KEY (Id)

	,CONSTRAINT Picture_Album_FK FOREIGN KEY (Id_Album) REFERENCES Album(Id)
)ENGINE=InnoDB;

