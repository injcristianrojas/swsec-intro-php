# Check grants on database using:
# SHOW GRANTS FOR 'webapp_user'@'localhost';
# (only works when webapp_user is logged in)

CREATE DATABASE webapp;

GRANT ALL PRIVILEGES ON webapp.*
  TO webapp_user@localhost IDENTIFIED BY 't54sgtdjk';

USE webapp;

CREATE TABLE users(
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(40),
  password VARCHAR(255)
);

INSERT INTO users(username, password) VALUES ('jperez', '123');
INSERT INTO users(username, password) VALUES ('basaber', '12345');
INSERT INTO users(username, password) VALUES ('skramer', 'power');
INSERT INTO users(username, password) VALUES ('aeinstein', 'simple');
INSERT INTO users(username, password) VALUES ('tstark', 'ironman');
INSERT INTO users(username, password) VALUES ('cpalma', 'lepego');
INSERT INTO users(username, password) VALUES ('asavage', 'boom');
INSERT INTO users(username, password) VALUES ('jhyneman', 'boom');
INSERT INTO users(username, password) VALUES ('tanderson', 'matrix');
INSERT INTO users(username, password) VALUES ('zcool', 'god');
