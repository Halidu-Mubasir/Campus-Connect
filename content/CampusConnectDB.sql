-- 	creating a schema / database `campus_connect_db`
DROP DATABASE IF EXISTS campus_connect_db;
CREATE DATABASE campus_connect_db;
USE campus_connect_db;
-- creating entities
DROP DATABASE IF EXISTS users;
CREATE TABLE users(
    user_id int(11) AUTO_INCREMENT,
    fname varchar(25) NOT NULL,
    lname varchar(25) NOT NULL,
    dob date,
    email varchar(75) NOT NULL UNIQUE,
    _password varchar(255) NOT NULL,
    confirm_password varchar(255) NOT NULL,
    PRIMARY KEY (user_id)
);
DROP DATABASE IF EXISTS post;
CREATE TABLE post (
    post_id int(11) AUTO_INCREMENT,
    user_id int(11) NOT NULL,
    title varchar(50) NOT NULL,
    _description varchar(255) NOT NULL,
    file_path varchar(100) NOT NULL,
    _date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (post_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id)
);
DROP DATABASE IF EXISTS notification;
CREATE TABLE notification (
    notification_id int(11) AUTO_INCREMENT,
    sender_name varchar (50),
    subject varchar(50),
    content varchar(255),
    _date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (notification_id)
);