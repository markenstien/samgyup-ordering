create table table_unit(
    id int(10) not null primary key auto_increment,
    table_unit_number char(10),
    table_unit_status enum('available','reserved','occupied') default 'available',
    created_at timestamp default now(),
    last_occupied datetime,
    last_available datetime,
    last_reserved datetime
);


alter table orders
    add column table_number_id int;


    truncate orders;
truncate order_items;
truncate payments;