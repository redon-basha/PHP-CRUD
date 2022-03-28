CREATE DATABASE test_login;
USE test_login;

CREATE TABLE User (
    User_id int not null ,
    Name varchar(255) not null ,
    Surname varchar(255) not null,
    Email varchar(255) not null,
    Username varchar(255) not null,
    Password varchar(255) not null,
    Role varchar(255) not null,
    PRIMARY KEY (User_id)
);
CREATE TABLE Project (
    Project_id int not null ,
    Title varchar(255) not null ,
    Type varchar(255) not null,
    Description varchar(255) not null,
    Create_date date not null,
    PRIMARY KEY (Project_id)
);
CREATE TABLE Project_Member
(
  User_id INT NOT NULL,
  Project_id INT NOT NULL,
  Role varchar(255) not null,
  PRIMARY KEY (User_id, Project_id),
  FOREIGN KEY (User_id) REFERENCES User(User_id),
  FOREIGN KEY (Project_id) REFERENCES Project(Project_id)
);
INSERT INTO User (User_id, Name, Surname, Email, Username, Password,Role)
VALUES (1,'Redon' ,'Basha' , 'rbasha18@epoka.edu.al','admin' ,'admin','Admin' );