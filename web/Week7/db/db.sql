CREATE TABLE users (
   id SERIAL PRIMARY KEY,
   username VARCHAR(80) NOT NULL,
   password VARCHAR(255) NOT NULL
);
