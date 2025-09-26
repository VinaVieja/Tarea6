USE superhero;
SELECT * FROM superhero;

SELECT * FROM superhero WHERE alignment_id IS NULL;

SELECT * FROM superhero WHERE alignment_id = 1;
SELECT * FROM superhero WHERE alignment_id = 2;
SELECT * FROM superhero WHERE alignment_id = 3;
SELECT * FROM superhero WHERE alignment_id = 4;

CREATE OR REPLACE VIEW view_superhero_alignment AS
SELECT 
    AL.alignment,
    COUNT(SH.id) AS total
FROM superhero SH
LEFT JOIN alignment AL ON AL.id = SH.alignment_id
GROUP BY AL.alignment;

SELECT * FROM race;

CREATE OR REPLACE VIEW view_superhero_gender AS
SELECT 
    G.gender AS genero,
    COUNT(SH.id) AS total
FROM superhero SH
LEFT JOIN gender G ON G.id = SH.gender_id
GROUP BY G.gender;

SELECT * FROM gender;

CREATE OR REPLACE VIEW view_superhero_publisher AS
SELECT 
    p.id, 
    p.name AS publisher, 
    COUNT(s.id) AS total
FROM publisher p
LEFT JOIN superhero s ON s.publisher_id = p.id
GROUP BY p.id, p.name
ORDER BY total DESC;

SELECT * FROM publisher;

SELECT * FROM alignment;

SELECT * FROM view_superhero_alignment;

SELECT * FROM race WHERE id IN (1,2,3,4);
