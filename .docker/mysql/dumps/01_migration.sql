CREATE TABLE IF NOT EXISTS users
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  address TEXT,
  picture VARCHAR(200)
);

INSERT INTO users (name, address, picture) VALUES ('John Foo', 'Buenos Aires', 'http://lorempixel.com/200/200/people/');