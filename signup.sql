DROP TABLE IF EXISTS usersTb; 

CREATE TABLE usersTb (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  email varchar(70) NOT NULL,
  artistName varchar(100) NOT NULL,
  genre varchar(40) NOT NULL,
  description varchar(240) NOT NULL,
  password varchar(240) NOT NULL,
  CONSTRAINT user_id PRIMARY KEY (id)
  );
  
DROP TABLE IF EXISTS songsTb; 

CREATE TABLE songsTb (
  id int(11) NOT NULL AUTO_INCREMENT,
  artistName varchar(100) NOT NULL,
  genre varchar(40) NOT NULL,
  description varchar(240) NOT NULL,
  link varchar(300) NOT NULL,
  CONSTRAINT song_id PRIMARY KEY (id)
  );
