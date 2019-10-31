-- ORDERS FOR 1 USER

insert into shoppergroup values (1,'test','this is a test description');
insert into shopper values (1,'patcust','$2y$10$OB/.1wah/HCTeMs1T3qJpuP3UyK3nyYVYL5XXOXvLcppmiarRIh5m','patrick.witt@students.mq.edu.au', '+6104222965813', 'P',1,'field1','field2');
insert into shopper values (2,'patadmin','$2y$10$OB/.1wah/HCTeMs1T3qJpuP3UyK3nyYVYL5XXOXvLcppmiarRIh5m','patrick.witt@students.mq.edu.au', '+6104222965813', 'P',1,'field1','field2');

insert into shaddr values (1,1,'MR', 'pat','witt','41 butt street','42 butt street', 'sydney','NSW',2126,'Australia');


-- ORDERS FOR 1 USER
insert into store3.order values (1,1,1,'2019-12-11 00:00:01','V', '1234567890',1,1,0,'2020-01-01',1,'2019-12-21',5.00,2.00,20.99,27.99);
insert into store3.order values (2,1,1,'2019-12-11 00:00:01','V', '1234567890',1,1,0,'2020-01-01',1,'2019-12-21',5.00,2.00,20.99,27.99);
insert into store3.order values (3,1,1,'2019-12-11 00:00:01','V', '1234567890',1,1,1,'2020-01-01',1,'2019-12-21',5.00,2.00,20.99,27.99);


-- PRODUCTS FOR 1 ORDER
insert into product values (1,'Gameboy','Gameboy 1000 sweet','/testimg.jpg','Gameboy 1000 is dee best there is','100','GameBoy.php','2.53','1','1','1');
insert into product values (2,'Gameboy1','Gameboy 1001 sweet','/testimg.jpg','Gameboy 1001 is dee best there is','100','GameBoy.php','2.53','1','1','1');
insert into product values (3,'Gameboy2','Gameboy 1002 sweet','/testimg.jpg','Gameboy 1002 is dee best there is','100','GameBoy.php','2.53','1','1','1');

insert into orderproduct values (1,1,1,1);
insert into orderproduct values (2,1,2,1);
insert into orderproduct values (3,1,3,1);

insert into orderproduct values (4,2,1,1);
insert into orderproduct values (5,2,2,1);
insert into orderproduct values (6,2,3,1);

insert into orderproduct values (7,3,1,1);
insert into orderproduct values (8,3,2,1);
insert into orderproduct values (9,3,3,1);

insert into prodprices values (1,1,3,100.00);
insert into prodprices values (2,2,3,120.00);
insert into prodprices values (3,3,3,140.00);

insert into EnqStatus values (1,'OPEN');
insert into EnqStatus values (2,'CLOSED');

insert into EnqType values (1,'Refund');
insert into EnqType values (2,'Shipping');
insert into EnqType values (3,'Product Information');
insert into EnqType values (4,'Other');

insert into accessgroup values (1,'USER', 'Normal Customer');
insert into accessgroup values (2,'CSR', 'Customer Service Rep');

insert into accessusergroup values (1,1,1);
insert into accessusergroup values (2,2,2);
