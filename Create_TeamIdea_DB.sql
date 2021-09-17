
CREATE DATABASE IF NOT EXISTS abar_saler;
USE abar_saler;
CREATE TABLE IF NOT EXISTS  company
(
    companyId INT PRIMARY KEY  AUTO_INCREMENT,
    companyName VARCHAR(40) UNIQUE,
    companyCountry VARCHAR(40) DEFAULT 'China'
);

CREATE TABLE IF NOT EXISTS  phone
(
    phoneId INT PRIMARY KEY  AUTO_INCREMENT,
    phoneModel VARCHAR(30) ,
    companyId INT, 
    FOREIGN KEY (companyId)  REFERENCES company (companyId),
    price DECIMAL (8,2) 
);

INSERT INTO company  
 (companyId, companyName,companyCountry)
 VALUES  
 (1 ,'Huawei', default),
 (null ,'Apple', 'USA'),
 (null , 'Meizu', default),
 (null , 'Nokia', 'Finland');

INSERT INTO phone  
 (phoneId, phoneModel, companyId, price)
 VALUES  
 (1000 ,' Huawei Mate Xs 5G', 1, 343013), 
 (null ,'Huawei Mate 40 Pro', 1, 89990),
 (null ,'Mate 40 RS Porsche Design', 1, 300000),
 (null ,'iPhone 13 Pro Max', 2, 159990),
 (null ,'iPhone 13 Pro', 2, 99990),
 (null ,'iPhone 13', 2, 79990),
 (null ,'Meizu 18 Pro', 3, 56273),
 (null ,'Meizu 18', 3, 45016),
 (null ,'Meizu 17 Pro', 3, 52896),
 (null ,'Meizu 17 th', 3, 42896),
 (null ,'Nokia XR20', 4, 44999),
 (null ,'Meizu X20DS', 4, 29990),
 (null ,'Nokia 8.3', 4, 39990);
