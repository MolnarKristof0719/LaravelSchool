select * from students;
select * from schoolclasses;
select * from sports;

select * from users;

select scholarship, min(gpa), max(gpa) from students
  group by scholarship
  ;


select floor(datediff(CURDATE(), birthDate)/365.25) age ,group_concat(distinct sc.className) from students s
  inner join schoolclasses sc on sc.id = s.schoolclassId
  group by age;
 