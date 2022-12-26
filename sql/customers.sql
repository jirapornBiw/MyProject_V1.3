CREATE TABLE customers (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    post VARCHAR(5) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(150) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME ,
    userlevel VARCHAR(10) DEFAULT 'member',

)