use litb;
create table user (
	username varchar(20),
	password varchar(20),
	email varchar(40),
	boss varchar(20)
);
insert into user values ('wupei', 'hellowupei', 'litbwupei@163.com', 'boss');
insert into user values ('boss', 'helloboss', 'litbboss@163.com', 'alan');
insert into user values ('hr', 'hellohr', 'litbhr@163.com', 'alan');
insert into user values ('alan', 'helloalan', 'litbalan@163.com', 'alan');

