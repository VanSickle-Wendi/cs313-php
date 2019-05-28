SEL/* Multiple line comments can 
   be written like this */

--Create two tables (single line comments like this)
CREATE TABLE note_user (
   id SERIAL,
   username VARCHAR(255),
   password VARCHAR(255),
   PRIMARY KEY (id)
);

CREATE TABLE note (
   id SERIAL,
   userId INT NOT NULL,
   content TEXT,
   PRIMARY KEY (id),
   FOREIGN KEY (userId) REFERENCES note_user (id)
);

/*Insert data into both tables. Syntax is:
  INSERT INTO tableName (column1, column2, ect.)
  VALUES (value1, value2, ect.) */
INSERT INTO note_user (username, password) VALUES ('john', 'pass');
INSERT INTO note_user (username, password) VALUES ('jane', 'byui');

INSERT INTO note (userId, content) VALUES (1, 'A note for John');
INSERT INTO note (userId, content) VALUES (1, 'Another note for John');
INSERT INTO note (userId, content) VALUES (2, 'And this is a note for Jane');

/*Use SELECT to retreive data. * Means all rows and display all columns.
  Syntax is:
  SELECT columnNames FROM tableName; */
SELECT * FROM note_user;

SELECT username FROM note_user;

SELECT password, username FROM note_user;

/*Use WHERE clause to SELECT only certain columns. Syntax is:
  SELECT columnNames FROM tableName
  WHERE condition;  */
SELECT * FROM note_user WHERE username = 'john';

SELECT * FROM note_user WHERE id > 1;

/*ORDER BY clause can be added "after" the "optional" WHERE clause.
  SYNTAX is:
  SELECT * FROM tableName ORDER BY columnName; */
SELECT * FROM note_user ORDER BY username;

SELECT * FROM note_user ORDER BY username DESC;

/*Use a JOIN to join two tables. If you wanted to see John's info,
  this would work without a join if you knew his userId. Here's the
  whole table and then just John's info. */
SELECT * FROM note;

SELECT * FROM note WHERE userId = 1;

/*If you only knew John's username, a better way would be to use a JOIN.
  Syntax is:
  SELECT columns
   FROM table1
   JOIN table2
   ON columnFromTable1 = columnFromTable2;

  It's also useful to give the tables aliases, so we can say which table we mean.
  Syntax is:
  SELECT columns
   FROM table1 AS t1
   JOIN table2 AS t2
   ON t1.column = t2.column;   */

SELECT * FROM note_user AS u
  JOIN note AS n
  ON u.id = n.userId;

SELECT * FROM note_user AS u
  JOIN note AS n
  ON u.id = n.userId
  WHERE u.username = 'john';

SELECT n.content FROM note_user AS u
  JOIN note AS n
  ON u.id = n.userId
  WHERE u.username = 'john';
