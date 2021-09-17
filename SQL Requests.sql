/*  Request 1 */  
SELECT  companyName AS 'Бренд', companyCountry AS 'Страна производитель', COUNT(*) AS 'Количество устройств',sum(price)  AS 'Общая стоимость телефонов' FROM company, phone
WHERE company.companyId = phone.companyId group by companyName order by price desc;

/* Request 2.1 */  
SELECT  companyName AS 'Бренд', 
 AVG(price)  AS 'Средняя цена',
 companyCountry AS 'Страна производитель'
 FROM company, phone
 WHERE company.companyId = phone.companyId group by companyName order by price desc LIMIT 1;

/* Request 2.2 */  

SELECT   companyCountry AS 'Страна производитель',
 count(companyName) AS 'Количество китайских товаров'
 FROM company, phone
 WHERE company.companyId = phone.companyId AND  companyCountry = 'China' group by companyCountry limit 2;

/* Request 2.3 */  
SELECT  companyName AS 'Бренд', 
 MAX(price)  AS 'Самый дорогой телефон',
 phoneModel AS 'Название модели'
 FROM company, phone
WHERE company.companyId = phone.companyId group by companyName order by price desc;

