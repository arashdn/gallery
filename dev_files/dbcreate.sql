create database gallery;
use gallery;

create table users(id int not null AUTO_INCREMENT , username nvarchar(255) , pass nvarchar(255) not null ,email nvarchar(255) not null , salt nvarchar(255) not null, mailactive nvarchar(50) ,role int not null , primary key(id), unique(email));


create table failedLogin(id int AUTO_INCREMENT , ip nvarchar(50) not null , time bigint not null , primary key (id));



ALTER DATABASE gallery CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;