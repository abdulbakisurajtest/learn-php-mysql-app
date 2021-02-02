DROP DATABASE demo;
CREATE DATABASE demo DEFAULT CHARSET=utf8;
GRANT ALL ON demo.* TO 'fliplikesuraj'@'localhost' IDENTIFIED BY 'Abdulbaki0818';
GRANT ALL ON demo.* TO 'fliplikesuraj'@'127.0.0.1' IDENTIFIED BY 'Abdulbaki0818';
USE demo;

CREATE TABLE IF NOT EXISTS product(
product_id INT(11) NOT NULL AUTO_INCREMENT,
product_name VARCHAR(255) NOT NULL,
product_price DECIMAL(10, 0) NOT NULL,
product_quantity INT(11) NOT NULL,
product_description TEXT NOT NULL,
PRIMARY KEY (product_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'product'
--

INSERT INTO product (product_id, product_name, product_price, product_quantity, product_description) VALUES ('1', 'Name 1', '1000', '2', 'good'), ('2', 'Name 2', '2000', '3', 'good'), ('3', 'Name 3', '3000', '4', 'good');