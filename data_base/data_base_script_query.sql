use ecommerce_igniter;


###  Adminis

/*
CREATE TABLE admins (
        id int NOT NULL AUTO_INCREMENT,
        full_name varchar(70) not null,
        email varchar(70) NOT NULL unique,
        password varchar(128) NOT NULL,
        image varchar(100) null,
        PRIMARY KEY (id)
);

insert into admins (full_name,email,password,image) values ('admin', 'admin@gmail.com','123456',null);
*/

### Products
/*
CREATE TABLE products (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(70) not null,
        description varchar(150) NULL ,
        image varchar(100) null,
        stock int not null,
        price double not null,
        PRIMARY KEY (id)
);

insert into products (name,description,image,stock,price) values ('Teclado Noga', 'Este es un teclado noga',null, 10, 50.5);
insert into products (name,description,image,stock,price) values ('Mouse Noga', 'Este es un mouse noga',null, 10, 41.5);
*/

### clients

CREATE TABLE clients (
        id int NOT NULL AUTO_INCREMENT,
        full_name varchar(70) not null,
        image varchar(100) null,
        email varchar(70) not null unique,
        password varchar(120) not null,
        dni varchar(15) not null,
        PRIMARY KEY (id)
);

insert into clients (full_name,image,email,password,dni) values ('Juan Carlos', null, 'juan@gmail.com', '123456','12.546.89');
insert into clients (full_name,image,email,password,dni) values ('Pietro Vales', null, 'pietro@gmail.com', '123456','45.555.666');


select * from admins;
select * from clients;
select * from products;