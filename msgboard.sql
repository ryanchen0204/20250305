DROP database IF EXISTS msgboard;
create database msgboard;
use msgboard;
DROP TABLE IF EXISTS account;
create table account (
        idno int primary key auto_increment,
        name varchar(64) not null,
        pass varchar(256) not null
);