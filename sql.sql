CREATE TABLE users(
id              int(11) auto_increment not null,
first_name      varchar(255) not null,
last_name       varchar(255) not null,
password        varchar(255) not null,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE chores(
id              int(11) auto_increment not null,
id_users        int(11) not null,
title      varchar(255) not null,
content       varchar(255) not null,
date            date not null,
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT fk_chores FOREIGN KEY(id_users) REFERENCES users(id)
)ENGINE=INNODB;