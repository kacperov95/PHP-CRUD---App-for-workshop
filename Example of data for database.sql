insert into finish_kind values (1, 'Satyna');
insert into finish_kind values (2, 'Czern');
insert into finish_kind values (3, 'Nikiel');

insert into order_status values (1, 'Zakoñczony');
insert into order_status values (2, 'W trakcie');
insert into order_status values (3, 'Nowy');

insert into user_priviligies values (1, 'admin');
insert into user_priviligies values (2, 'user');

insert into users values (NULL, 'Kacper', 'Perkowski', 'admin', (dbms_crypto.hash(utl_raw.cast_to_raw('admin'),3)), 1 );
insert into users values (NULL, 'Patryk', 'Slaskowka', 'pslas', (dbms_crypto.hash(utl_raw.cast_to_raw('user1'),3)), 2 );
insert into users values (NULL, 'Lukasz', 'Dziwny', 'pros', (dbms_crypto.hash(utl_raw.cast_to_raw('user'),3)), 2 );
insert into users values (NULL, 'TestName', 'TestSurName', 'user', (dbms_crypto.hash(utl_raw.cast_to_raw('user'),3)), 2 );

insert into contractor values (NULL, 'Promotech Sp. z o.o.', 'Promotech', '1020304050');
insert into contractor values (NULL, 'Fabryka mebli w Czluchowie', 'Czluchow', '1234567899');
insert into contractor values (NULL, 'Intel Corp.', 'Intel', '1231231231');
insert into contractor values (NULL, 'Piranha Bytes', 'Piranie', '3243545667');

insert into product_card values (NULL, '12210c', 'Dzwignia 122/10', 1, 2, 138);
insert into product_card values (NULL, '13510c', 'Dzwignia 135/10', 1, 2, 163);
insert into product_card values (NULL, '15510n', 'Dzwignia 155/10', 1, 3, 198);
insert into product_card values (NULL, '18012s', 'Dzwignia 180/12', 1, 1, 214);
insert into product_card values (NULL, '19012c', 'Dzwignia 190/12', 0, 2, 249);
insert into product_card values (NULL, '23012s', 'Dzwignia 230/12', 1, 1, 315);


insert into orders values (NULL, '78237', 3, 4, 800, '09-09-21', '21-10-21', 2);
insert into orders values (NULL, '23112312', 4, 4, 1200, '01-09-2021', '29-10-2021', 3);
insert into orders values (NULL, '78237', 3, 5, 1800, '03-09-2021', '21-11-2021', 2);
insert into orders values (NULL, '213', 1, 1, 300, '06-09-2021', '08-10-2021', 3);
insert into orders values (NULL, '12321312', 4, 2, 2200, '01-09-2021', '22-10-2021', 3);
insert into orders values (NULL, 'DDD78237', 2, 6, 12000, '23-08-2021', '21-12-2021', 1);

commit;