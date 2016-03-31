DROP PROCEDURE IF EXISTS spese_div;
DROP PROCEDURE IF EXISTS div_brev;

DELIMITER $$

CREATE PROCEDURE spese_div (IN id_persona INT)

BEGIN

DECLARE t_cc DECIMAL(10,2);
DECLARE t_ci DECIMAL(10,2);
DECLARE t_cn DECIMAL(10,2);
DECLARE q_s DECIMAL(10,2);

SELECT IFNULL (SUM (cpc.costo), 0) INTO t_cc FROM Corsiperscomp cpc WHERE cpc.persona=id_persona;

SELECT IFNULL (SUM (isc.costo), 0) INTO t_ci FROM Immsubcomp isc JOIN Persone p ON isc.sub=p.idpersona WHERE p.idpersona=id_persona;

SELECT IFNULL (SUM (n.prezzofinale), 0) INTO t_cn FROM Persone p JOIN Sub su ON p.idpersona=su.idsub JOIN Noleggi n ON su.idsub=n.sub WHERE p.idpersona=id_persona;

SELECT IFNULL (SUM (s.quota), 0) INTO q_s FROM Persone p JOIN Soci s ON p.idpersona=s.idsocio WHERE p.idpersona=id_persona;

CREATE TEMPORARY TABLE spese (
spesecorsi DECIMAL(10,2),
speseimmersioni DECIMAL(10,2),
spesenoleggi DECIMAL(10,2),
spesasocio DECIMAL(10,2)
);

INSERT INTO spese VALUES (t_cc, t_ci, t_cn, q_s);
SELECT * FROM spese;
END$$


CREATE PROCEDURE div_brev (IN brev VARCHAR(45))

BEGIN
SELECT b.sub, p.nome, p.cognome
FROM brevetti b JOIN persone p ON b.sub=p.idpersona
WHERE b.nome=brev;
END$$

DELIMITER ;