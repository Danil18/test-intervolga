CREATE TABLE sportsman (
      id INT NOT NULL AUTO_INCREMENT ,
      full_name VARCHAR(250) NOT NULL ,
      email VARCHAR(150) NOT NULL ,
      telephone VARCHAR(12) NOT NULL ,
      birth DATE NOT NULL ,
      age SMALLINT NOT NULL ,
      creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      passport VARCHAR(10) NOT NULL ,
      average_place FLOAT NOT NULL ,
      biography VARCHAR(6144) NOT NULL ,
      video_presentation_folder VARCHAR(255) NOT NULL ,
      PRIMARY KEY (id)
) ENGINE = InnoDB;
