CREATE TABLE burger.users
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    tel varchar(255) NOT NULL
);
INSERT INTO burger.users (id, name, email, tel) VALUES (1, 'Попов Андрей', 'popov@popov.ru', '+7 (456) 456 45 64');
INSERT INTO burger.users (id, name, email, tel) VALUES (2, 'Андрей', '123@123.ru', '+7 (789) 364 88 15');