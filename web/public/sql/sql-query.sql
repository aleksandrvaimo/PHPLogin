SELECT t1.*
FROM test t1
INNER JOIN (
    SELECT id, MAX(version) version
    FROM test
    GROUP BY id
) t2 ON t1.id = t2.id AND t1.version = t2.version