USE sandwiches;

-- user
INSERT INTO `user`(name, surname, email, password)
VALUES
('Alessio', 'Modonesi', 'admin@gmail.com', 'admin'),
('Alessio', 'Modonesi', 'alessio.modonesi@iisviolamarchesini.edu.it', '1234'),
('Mattia', 'Gallinaro', 'mattia.gallinaro@iisviolamarchesini.edu.it', '5678'),
('Mattia', 'Zanini', 'mattia.zanini@iisviolamarchesini.edu.it', '4321'),
('Christian', 'Mondini', 'christian.mondini@iisviolamarchesini.edu.it', '8765');

INSERT INTO reset(`user`, password, expires, completed)
VALUES
(1, 'PaSSworD', Now(), TRUE),
(2, 'CHanGE',  Now() , FALSE);

INSERT INTO class(year, section)
VALUES
(5, 'F'),
(5, 'E');

INSERT INTO user_class(`user`, class, `year`)
VALUES
(1, 1, '2022'),
(3, 1, '2022'),
(2, 2, '2022'),
(4, 2, '2022');

-- product
INSERT INTO nutritional_value(kcal, fats, carbohydrates, proteins)
VALUES
(200, 10, 50, 15),
(300, 15, 60, 15),
(250, 10, 40, 5),
(150, 5, 30, 5),
(50, 0, 15, 0);

INSERT INTO product(name, price, description, quantity, nutritional_value)
VALUES
('Panino con prosciutto', 2, 'Panino con prosciutto cotto Coop', 20, 1),
('Panino con salame', 2, 'Panino con salame ungherese', 20, 1),
('Panino con bresaola', 2, 'Panino con bresaola Despar', 20, 1),
('Panino con formaggio', 2, 'Panino con formaggio Conad', 20, 1),
('Piadina con cotto', 3, 'Piadina con prosciutto cotto Coop', 20, 2),
('Piadina con bresaola', 3, 'Piadina con bresaola Despar', 20, 2),
('Piadina con salame', 3, 'Piadina con salame ungherese', 20, 2),
('Brioche con crema', 2, 'Brioche con crema pasticcera', 20, 3),
('Briosche con cioccolato', 2, 'Brioche con crema al cioccolato', 20, 3),
('Croccantelle', 2, 'Piadina con salame ungherese', 20, 4),
('Patatine', 2, 'Piadina con salame ungherese', 20, 4),
('Coca Cola', 2, 'Bibita gassata', 20, 5),
('The al limone', 2, 'Bibita dolce', 20, 5),
('Red Bull', 2, 'Bibita energetica', 20, 5);

INSERT INTO favourite(`user`, product)
VALUES
(1, 1),
(2, 5),
(3, 8),
(4, 11);

INSERT INTO ingredient(name, quantity, description)
VALUES
('Pane', 50, 'Pane toscano'),
('Piadina', 50, 'Piadina romagnola'),
('Brioche', 50, 'Brioche artigianale'),
('Salame', 80, 'Salame ungherese'),
('Prosciutto', 80, 'Prosciutto cotto Coop'),
('Bresaola', 80, 'Bresaola Despar'),
('Formaggio', 80, 'Formaggio Conad'),
('Crema', 60, 'Crema pasticcera'),
('Cioccolato', 60, 'Crema al cioccolato');

INSERT INTO product_ingredient(product, ingredient)
VALUES
(1, 1),
(1, 5),

(2, 1),
(2, 4),

(3, 1),
(3, 6),

(4, 1),
(4, 7),

(5, 2),
(5, 5),

(6, 2),
(6, 6),

(7, 2),
(7, 4),

(8, 3),
(8, 8),

(9, 3),
(9, 9);

INSERT INTO tag(name)
VALUES
('panini'),
('bibite'),
('piadine'),
('brioches'),
('snack');

INSERT INTO product_tag(product, tag)
VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 3),
(6, 3),
(7, 3),
(8, 4),
(9, 4),
(10, 5),
(11, 5),
(12, 2),
(13, 2),
(14, 2);

INSERT INTO allergen(name)
VALUES
('Latte e derivati'),
('Uova e derivati'),
('Frutta con guscio'),
('Glutine'),
('Cereali'),
('Soia'),
('Arachidi e derivati'),
('Sesamo e derivati');

INSERT INTO product_allergen(product, allergen)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

INSERT INTO offer(price, expiry, description)
VALUES
('1', '2022/01/21', 'offerta panini'),
('2', '2021/03/01', 'offerta piadine');

INSERT INTO product_offer(product, offer)
VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2);

-- order
INSERT INTO `status`(description)
VALUES
('ordinato'),
('pronto'),
('annullato');

INSERT INTO break(`time`)
VALUES
('09:25'),
('10:25'),
('11:25');

INSERT INTO pickup(name)
VALUES
('Settore A Itis'),
('Settore B Itis'),
('Ipsia'),
('Agrario');

INSERT INTO pickup_break(pickup, break)
VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 3);

INSERT INTO `order`(`user`, pickup, break, `status`)
VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 2),
(4, 2, 3, 3);

INSERT INTO product_order(product, `order`)
VALUES
(1, 1),
(1, 1),
(2, 2),
(2, 2),
(3, 3),
(3, 4);

INSERT INTO `cart`(`user`, product, quantity)
VALUES
('1', '2', '4'),
('2', '1', '3'),
('3', '3', '2');