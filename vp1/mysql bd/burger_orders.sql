CREATE TABLE burger.orders
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_user int(11) NOT NULL,
    street varchar(255) NOT NULL,
    home varchar(255) NOT NULL,
    housing varchar(255) NOT NULL,
    flat varchar(255) NOT NULL,
    floor varchar(255) NOT NULL,
    comment text,
    cashback tinyint(4),
    `call` tinyint(4)
);
INSERT INTO burger.orders (id, id_user, street, home, housing, flat, floor, comment, cashback, `call`) VALUES (1, 15, 'Иванова', '1', '', '', '1', '', null, null);
INSERT INTO burger.orders (id, id_user, street, home, housing, flat, floor, comment, cashback, `call`) VALUES (2, 1, 'Поповская', '1', '', '', '1', '', null, null);
INSERT INTO burger.orders (id, id_user, street, home, housing, flat, floor, comment, cashback, `call`) VALUES (3, 2, 'Уличкина', '25', '', '', '25', '', null, null);