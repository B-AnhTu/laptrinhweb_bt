--Câu 1
SELECT users.user_id, users.user_name, orders.order_id
FROM users
JOIN orders ON users.user_id = orders.user_id;

--Câu 2
SELECT 
    customers.user_id AS user_id,
    customers.user_name AS user_name,
    COUNT(orders.order_id) AS num_of_orders
FROM customers
JOIN orders ON customers.user_id = orders.user_id
GROUP BY customers.user_id, customers.user_name;

--Câu 3
SELECT 
    order_id AS orders_id,
    COUNT(product_id) AS num_of_products
FROM 
    order_details
GROUP BY 
    order_id;

--Câu 4
SELECT 
	user_id, user_name, orders_id, product_name
FROM
	users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
ORDER BY 
    orders.order_id, order_details.order_detail_id;

--Câu 5
SELECT 
	user_id, user_name, COUNT(order_id) as num_of_orders
FROM
	users
ORDER BY 
	ASC
LIMIT 
	7
	
--Câu 6
SELECT 
	user_id, user_name, orders_id, product_name
FROM
	users
JOIN orders ON orders.user_id = users.user_id
JOIN order_details ON order_details.order_id = orders.order_id
JOIN order_details ON order_details.product_id = products.product_id
JOIN products ON products.product_id = order_details.product_id
WHERE products.product_name LIKE '%Samsung%' OR
	products.product_name LIKE '%Apple%'
LIMIT 
	7
	