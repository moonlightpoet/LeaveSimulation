use litb;
create table request (
	id int unsigned not null auto_increment primary key,
	user varchar(20),
	starttime varchar(20),
	endtime varchar(20),
	status varchar(20)
);
