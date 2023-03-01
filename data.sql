CREATE DATABASE sample_app;
CREATE USER 'sample_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON sample_app.* TO 'sample_user'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE users (id INT(11) NOT NULL AUTO_INCREMENT,name VARCHAR(255) NOT NULL,email VARCHAR(255) NOT NULL PRIMARY KEY (id));
INSERT INTO users (name, email) VALUES   ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES   ('Smith', 'Smith@example.com')
INSERT INTO users (name, email) VALUES   ('Cena', 'Cena@example.com')
