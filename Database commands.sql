create table user_priviligies 
(
    priviligies_id int not null primary key,
    priviligies_name varchar(22) unique
);

create table users
(
    user_id int not null primary key,
    user_name varchar(22),
    user_surname varchar(22),
    user_login varchar(22) unique,
    user_password char(40),
    user_priviligies int,
    constraint users_for_priviligies foreign key (user_priviligies) references user_priviligies(priviligies_id)
);

create SEQUENCE seq_users;

create table finish_kind
(
    finish_id int not null primary key,
    finish_name varchar(22) unique
);

create table product_card
(
    product_id int not null primary key,
    product_code varchar(22) unique,
    product_name varchar(66),
    product_pressed NUMBER(1),
    product_finish int,
    product_weight NUMBER(4),
    constraint pcard_to_finish foreign key (product_finish) references finish_kind(finish_id)
);

create sequence seq_prod_card;

create table order_status 
(
    status_id int not null primary key,
    status_name varchar(22) unique
);

create table contractor
(
    contractor_id int not null primary key,
    contractor_name varchar(100) unique,
    contractor_acronym varchar(10) unique,
    contractor_nip varchar(10) unique
);

create sequence seq_contractor;

create table orders
(
    order_id int not null primary key,
    contractor_order_id varchar(30),
    contractor_id int,
    product_id int,
    quantity number(5),
    order_date date,
    realization_date date,
    status_id int,
    constraint contractors_to_orders foreign key (contractor_id) references contractor(contractor_id),
    constraint products_to_orders foreign key (product_id) references product_card(product_id),
    constraint statuses_to_orders foreign key (status_id) references order_status(status_id)
);

create sequence seq_orders;

alter session set nls_date_format = 'DD-MM-YYYY';


commit;