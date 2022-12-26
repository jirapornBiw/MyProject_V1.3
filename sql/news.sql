CREATE TABLE news (
    new_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    topic VARCHAR(50) NOT NULL,
    detail VARCHAR(200) NOT NULL,
    dttm DATETIME DEFAULT CURRENT_TIMESTAMP,
    image VARCHAR(200) NOT NULL
)