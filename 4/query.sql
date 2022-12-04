SELECT full_name FROM sportsman JOIN results ON sportsman.id = results.id_sportsman
GROUP BY full_name ORDER BY COUNT(results.id_sportsman) DESC
LIMIT 5;
