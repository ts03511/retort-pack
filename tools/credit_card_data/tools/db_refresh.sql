drop table if exists retort.payment_history;

create table retort.payment_history (
	pay_date date not null, 
	pay_dest varchar(200) not null, 
	pay_value int(6) not null
);



load data local 
	infile 
	'../yodobashi/db_input.txt' 
	
	into table 
	retort.payment_history 
	
	fields 
	terminated by ','
;



load data local 
	infile 
	'../paypay/db_input.txt' 
	
	into table 
	retort.payment_history 
	
	fields 
	terminated by ','
	enclosed by '"'
;



load data local 
	infile 
	'../sokuho/paypay/db_input.txt' 
	
	into table 
	retort.payment_history 
	
	fields 
	terminated by ','
	enclosed by '"'
;




drop table retort.pay_dest_list;

create table retort.pay_dest_list as select distinct pay_dest from retort.payment_history;
alter table retort.pay_dest_list add pay_type varchar(10) not null default 'NO_LABEL';
