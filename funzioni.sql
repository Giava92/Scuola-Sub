DROP FUNCTION IF EXISTS max_prof;
DROP FUNCTION IF EXISTS Spesa_totale_annua;

DELIMITER $$

CREATE FUNCTION max_prof (sub INT) RETURNS int(11)

BEGIN
DECLARE m_p INT;
SELECT MAX(b.maxprofondita) INTO m_p FROM Brevetti b WHERE b.sub=sub;
RETURN m_p;
END$$



CREATE FUNCTION Spesa_totale_annua (id_persona INT) RETURNS decimal(10,2)

BEGIN

DECLARE tot_spesa DECIMAL(10,2);
DECLARE t_cc DECIMAL(10,2);
DECLARE t_ci DECIMAL(10,2);
DECLARE t_cn DECIMAL(10,2);
DECLARE q_s DECIMAL(10,2);

SELECT IFNULL(SUM(cpc.costo),0) INTO t_cc FROM Corsiperscomp cpc WHERE cpc.persona=id_persona;

SELECT IFNULL(SUM(isc.costo),0) INTO t_ci FROM  Immsubcomp isc JOIN Persone p ON isc.sub=p.idpersona WHERE p.idpersona=id_persona;

SELECT IFNULL(SUM(n.prezzofinale),0) INTO t_cn FROM Persone p JOIN Sub su ON p.idpersona=su.idsub JOIN Noleggi n ON su.idsub=n.sub WHERE p.idpersona=id_persona;

SELECT IFNULL(SUM(s.quota),0) INTO q_s FROM Persone p JOIN Soci s ON p.idpersona=s.idsocio WHERE p.idpersona=id_persona;

SET tot_spesa=t_cc+t_ci+t_cn+q_s;

RETURN tot_spesa;

END$$

DELIMITER ;