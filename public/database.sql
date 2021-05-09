create or replace table campaigns
(
    id bigint auto_increment
        primary key,
    type tinyint(1) null,
    start_date date null,
    end_date date null,
    title varchar(255) null
);

create or replace index campaigns_start_date_end_date_index
    on campaigns (start_date, end_date);

create or replace table orders
(
    id bigint auto_increment
        primary key,
    campaign_id bigint null,
    order_value decimal(10,2) null,
    column_4 int null
);

create or replace table users
(
    id bigint auto_increment
        primary key,
    name varchar(255) null,
    username varchar(255) not null,
    password varchar(255) not null,
    constraint users_username_uindex
        unique (username)
);

