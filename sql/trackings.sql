CREATE TABLE trackings (
TrackingID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customerID INT,
OrderId INT,
tracking  VARCHAR(30),
shipping_company VARCHAR(50),
dttm DATETIME DEFAULT CURRENT_TIMESTAMP
);