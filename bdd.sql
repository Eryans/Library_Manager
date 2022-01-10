CREATE DATABASE IF NOT EXISTS biblioDB;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Book;
DROP TABLE IF EXISTS Client;

CREATE TABLE User(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userName varchar(50) UNIQUE NOT NULL,
    password binary(255) NOT NULL,
    is_admin boolean NOT NULL
);


CREATE TABLE Client(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    birth_date Date NOT NULL,
    adress varchar(95) NOT NULL,
    city varchar(35) NOT NULL,
    mail varchar(62) UNIQUE NOT NULL,
    phone varchar(15) UNIQUE NOT NULL,
    has_books boolean NOT NULL
);


CREATE TABLE Book(
    id int UNIQUE AUTO_INCREMENT NOT NULL,
    title varchar(100) NOT NULL,
    author varchar(100) NOT NULL,
    summary varchar(400) NOT NULL,
    release_date Date NOT NULL,
    category varchar(50) NOT NULL,
    for_child boolean NOT NULL,
    available boolean,
    client_id int NULL,
    CONSTRAINT FK_client_id FOREIGN KEY (client_id) REFERENCES Client(id)
);