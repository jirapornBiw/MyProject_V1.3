
//เพิ่มข้อมูลลง table
INT

/*add column*/
ALTER TABLE products
ADD weight_id VARCHAR(5);

/*add data*/
INSERT INTO weight(id, weight)
VALUES (1,55)


ALTER TABLE table_name
MODIFY column_name datatype

//ลบ ตาราง 
DROP DATABASE table_name;
/*drop column*/
ALTER TABLE table_name DROP COLUMN column_name;

//เปลี่ยนชื่อ table
ALTER TABLE book RENAME TO books;

//เปลี่ยนชื่อ คอลัม
ALTER TABLE products
RENAME size TO weight;

/*change data type*/
ALTER TABLE table_name 
MODIFY COLUMN column_name datatype;