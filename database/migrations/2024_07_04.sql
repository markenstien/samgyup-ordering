drop table if exists request_items;
create table request_items(
    id int(10) not null primary key auto_increment,
    order_id int(10),
    table_id int(10),
    item_id int(10),
    quantity int,
    price double(10,2),
    payment_status enum('paid', 'unpaid'),
    request_status enum('complete','pending'),

    created_at timestamp default now(),
    updated_at timestamp default now() ON UPDATE now()
);