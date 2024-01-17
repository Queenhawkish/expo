#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (250) NOT NULL
	,CONSTRAINT type_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: event
#------------------------------------------------------------

CREATE TABLE event(
        id          Int  Auto_increment  NOT NULL ,
        poster      Varchar (50) NOT NULL ,
        name        Varchar (50) NOT NULL ,
        date_start  Date ,
        date_end    Date ,
        place       Varchar (50) ,
        description Text ,
        id_type     Int NOT NULL
	,CONSTRAINT event_PK PRIMARY KEY (id)

	,CONSTRAINT event_type_FK FOREIGN KEY (id_type) REFERENCES type(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: assocalfort administrator
#------------------------------------------------------------

CREATE TABLE assocalfort_administrator(
        id       Int  Auto_increment  NOT NULL ,
        login    Varchar (50) NOT NULL ,
        password Varchar (250) NOT NULL
	,CONSTRAINT assocalfort_administrator_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user participant
#------------------------------------------------------------

CREATE TABLE user_participant(
        id       Int  Auto_increment  NOT NULL ,
        email    Varchar (50) NOT NULL ,
        id_event Int NOT NULL
	,CONSTRAINT user_participant_PK PRIMARY KEY (id)

	,CONSTRAINT user_participant_event_FK FOREIGN KEY (id_event) REFERENCES event(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: album
#------------------------------------------------------------

CREATE TABLE album(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (50) NOT NULL ,
        id_event Int NOT NULL
	,CONSTRAINT album_PK PRIMARY KEY (id)

	,CONSTRAINT album_event_FK FOREIGN KEY (id_event) REFERENCES event(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: picture
#------------------------------------------------------------

CREATE TABLE picture(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (250) NOT NULL ,
        id_album Int NOT NULL
	,CONSTRAINT picture_PK PRIMARY KEY (id)

	,CONSTRAINT picture_album_FK FOREIGN KEY (id_album) REFERENCES album(id)
)ENGINE=InnoDB;

