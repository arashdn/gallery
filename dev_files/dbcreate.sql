create database gallery;
use gallery;

create table users(id int not null AUTO_INCREMENT , username nvarchar(255) , pass nvarchar(255) not null ,email nvarchar(255) not null , salt nvarchar(255) not null, mailactive nvarchar(50) ,role int not null , primary key(id), unique(email));


create table failedLogin(id int AUTO_INCREMENT , ip nvarchar(50) not null , time bigint not null , primary key (id));


create table category(id int AUTO_INCREMENT , title nvarchar(255) not null , description text , primary key (id));


create table post(id int AUTO_INCREMENT , cat int , sender int not null, title text not null , description text , posttime bigint , primary key (id) , foreign key(cat) references category(id) ON DELETE CASCADE , foreign key(sender) references users(id) ON DELETE CASCADE);

create table picture(id int not null AUTO_INCREMENT , post int not null, path text ,filename nvarchar(255) not null , primary key(id) , foreign key(post) references post(id) ON DELETE CASCADE);


create table likes(post int , liker int, primary key (post,liker) , foreign key(post) references post(id) ON DELETE CASCADE , foreign key(liker) references users(id) ON DELETE CASCADE);

ALTER DATABASE gallery CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE category CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE post CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;


#------------------------------------------------------------------------
Insert Into category(title) values ('Painting');
Insert Into category(title) values ('Photo');