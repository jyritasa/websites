SELECT c.store_id,
c.first_name,
c.last_name,
c.email,
c.active,
a.address,
a.district,
ci.city,
co.country,
a.postal_code,
a.phone
FROM customer c
JOIN address a ON a.address_id = c.address_id
JOIN city ci ON a.city_id = ci.city_id
JOIN country co ON co.country_id = ci.country_id
WHERE customer_id = 1;
