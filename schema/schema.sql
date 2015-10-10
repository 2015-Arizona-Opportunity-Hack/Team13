DROP DATABASE IF EXISTS opportunity;

CREATE DATABASE IF NOT EXISTS opportunity;

USE opportunity;

/* SQLEditor (MySQL (2))*/

CREATE TABLE hosts
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
firstname VARCHAR(255),
lastname VARCHAR(255),
email VARCHAR(255),
phone VARCHAR(255),
username VARCHAR(255),
password VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE events
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
hostid INTEGER,
name VARCHAR(255),
startdate DATE,
enddate DATE,
addr1 VARCHAR(255),
addr2 VARCHAR(255),
city VARCHAR(255),
state VARCHAR(255),
zip INTEGER(5),
islocal BOOLEAN,
isvirtual BOOLEAN,
ticketprice NUMERIC(9,2),
description TEXT,
PRIMARY KEY (id)
);

CREATE TABLE items
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
eventid INTEGER,
name VARCHAR(255),
description TEXT,
pathtopic VARCHAR(255),
storeprice NUMERIC(9,2) DEFAULT 0,
PRIMARY KEY (id)
);

CREATE TABLE orders
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
ordernumber VARCHAR(255),
ticketquantity INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE participants
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
eventid INTEGER,
name VARCHAR(255),
email VARCHAR(255),
phone VARCHAR(255),
orderid INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE ticket
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
participantid INTEGER,
eventid INTEGER,
orderid INTEGER,
confirmation VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE winner
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
itemid INTEGER,
participantid INTEGER,
PRIMARY KEY (id)
);

ALTER TABLE events ADD FOREIGN KEY hostid_idxfk (hostid) REFERENCES hosts (id);

ALTER TABLE items ADD FOREIGN KEY eventid_idxfk (eventid) REFERENCES events (id);

ALTER TABLE participants ADD FOREIGN KEY eventid_idxfk_1 (eventid) REFERENCES events (id);

ALTER TABLE participants ADD FOREIGN KEY orderid_idxfk (orderid) REFERENCES orders (id);

ALTER TABLE ticket ADD FOREIGN KEY participantid_idxfk (participantid) REFERENCES participants (id);

ALTER TABLE ticket ADD FOREIGN KEY eventid_idxfk_2 (eventid) REFERENCES events (id);

ALTER TABLE ticket ADD FOREIGN KEY orderid_idxfk_1 (orderid) REFERENCES orders (id);

ALTER TABLE winner ADD FOREIGN KEY itemid_idxfk (itemid) REFERENCES items (id);

ALTER TABLE winner ADD FOREIGN KEY participantid_idxfk_1 (participantid) REFERENCES participants (id);
