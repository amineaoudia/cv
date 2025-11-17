CREATE DATABASE IF NOT EXISTS portfolio_amine CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE portfolio_amine;

CREATE TABLE admins(
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE contacts(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  message TEXT,
  created_at DATETIME
);

CREATE TABLE site_content(
  id INT AUTO_INCREMENT PRIMARY KEY,
  key_name VARCHAR(128),
  content TEXT
);

INSERT IGNORE INTO admins(username,password_hash)
VALUES('admin', '');
