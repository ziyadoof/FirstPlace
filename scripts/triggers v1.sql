-- drop trigger if exists trg_employee_insert;


	delimiter //
create trigger trg_employee_insert
after insert on employee
for each row
begin
if  new.employeetype = 't' then
	insert into teacher_role (`Employee_emp_id`) values
	(new.emp_id);
end if;

if  new.employeetype = 'a' then
	insert into admin_role (`emp_id`) values
	(new.emp_id);
end if;

if  new.employeetype = 'c' then
	insert into case_role (`Employee_emp_id`) values
	(new.emp_id);
end if;
end //





