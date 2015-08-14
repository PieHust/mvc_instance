 create database newsreport;

 create table admin(
    id int(11) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    primary key(id)
    );
 create table news(
    id int not null auto_increment,
    title varchar(50) not null,
    author varchar(20) not null,
    fromip varchar(20) not null,
    content text not null,
    dateline int(4) not null,
    primary key (id)
    );