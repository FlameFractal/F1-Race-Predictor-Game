CREATE FUNCTION AddTwoNo(x int,y int)
returns int deterministic
begin
declare c int;
set c=x+y;
return c;
end $$

CREATE PROCEDURE Creat_Table()
BEGIN
    create table Empl (Emp_ID int(5) PRIMARY KEY, Emp_Name Varchar(50));
END $$        

CREATE PROCEDURE Insertion_Records()
BEGIN   
    insert into Empl values ((
    1001,'Aakansha Duggal'),
    (1002,'Abhimanyu Choudhary'),
    (1003,'Abhinav Gupta'),
    (1004,'Adita Kapoor'),
    (1005,'Aditya Agrawal'));
END $$

CREATE PROCEDURE Update_Record()
BEGIN   
    update Empl set Emp_Name='ABC' WHERE Emp_ID=1001;
END $$
 
CREATE PROCEDURE Select_Record()
BEGIN
    select * from Empl;
END $$


CREATE PROCEDURE Simple_Proc(OUT param1 INT) 
BEGIN
    SELECT COUNT(*) INTO param1 from Empl;
END $$