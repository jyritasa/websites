SELECT r.rental_id AS id,
f.title AS title,
COUNT(i.film_id) AS total_owned,
COUNT(IF( r.return_date IS NULL,1,NULL)) AS in_rental,
(COUNT(i.film_id) - COUNT(IF( r.return_date IS NULL,1,NULL))) AS in_inventory
FROM inventory i
JOIN film f ON f.film_id=i.film_id
JOIN rental r ON r.inventory_id= i.inventory_id
WHERE i.store_id = 1
GROUP BY i.film_id
ORDER by r.rental_id;
