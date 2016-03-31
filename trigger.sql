DROP TRIGGER IF EXISTS verifica_brev;
DROP TRIGGER IF EXISTS verifica_brev1;
DROP TRIGGER IF EXISTS verifica_imm;
DROP TRIGGER IF EXISTS verifica_imm1;
DROP TRIGGER IF EXISTS verifica_pr_nol;
DROP TRIGGER IF EXISTS verifica_pr_nol1;
DROP TRIGGER IF EXISTS verifica_noleggi;
DROP TRIGGER IF EXISTS verifica_noleggi1;

DELIMITER $$

CREATE TRIGGER verifica_brev BEFORE DELETE ON Brevetti
FOR EACH ROW
BEGIN
DECLARE quanti INT;
DECLARE ecco INT;
SELECT COUNT(*) INTO quanti FROM Brevetti WHERE sub = OLD.sub;
IF quanti <2 THEN
SIGNAL SQLSTATE '10000'
SET MESSAGE_TEXT='Un sub rimarrebbe senza brevetto.';
END IF;
END$$


CREATE TRIGGER verifica_brev1 BEFORE UPDATE ON Brevetti
FOR EACH ROW
BEGIN
DECLARE quanti INT;
DECLARE ecco INT;
IF OLD.sub!=NEW.sub 
THEN SELECT COUNT(*) INTO quanti FROM Brevetti WHERE sub = OLD.sub;
IF quanti <2 THEN
SIGNAL SQLSTATE '10001'
SET MESSAGE_TEXT='Un sub rimarrebbe senza brevetto.';
END IF;
END IF;
END$$


CREATE TRIGGER verifica_imm BEFORE DELETE ON ImmersioniSub
FOR EACH ROW
BEGIN
DECLARE quante INT;
DECLARE ecco INT;
SELECT COUNT(*) INTO quante FROM ImmersioniSub WHERE sub = OLD.sub;
IF quante <2 THEN
SIGNAL SQLSTATE '10002'
SET MESSAGE_TEXT='Un sub risulterebbe non aver fatto nessuna immersione.';
END IF;
END$$


CREATE TRIGGER verifica_imm1 BEFORE UPDATE ON ImmersioniSub
FOR EACH ROW
BEGIN
DECLARE quanti INT;
DECLARE ecco INT;
IF OLD.sub!=NEW.sub 
THEN SELECT COUNT(*) INTO quanti FROM ImmersioniSub WHERE sub = OLD.sub;
IF quanti <2 THEN
SIGNAL SQLSTATE '10003'
SET MESSAGE_TEXT='Un sub risulterebbe non aver fatto nessuna immersione.';
END IF;
END IF;
END$$


CREATE TRIGGER verifica_pr_nol BEFORE INSERT ON AttrezzatureScuola
FOR EACH ROW
BEGIN
DECLARE p_n INT;
DECLARE t_a INT;
DECLARE ecco INT;
SELECT tipo INTO t_a FROM AttrezzatureScuola WHERE tipo = NEW.tipo GROUP BY tipo;
IF t_a IS NOT NULL THEN SELECT prezzonoleggio INTO p_n FROM AttrezzatureScuola WHERE tipo = NEW.tipo GROUP BY prezzonoleggio;
IF NEW.prezzonoleggio <> p_n THEN
SIGNAL SQLSTATE '10004'
SET MESSAGE_TEXT='Il prezzonoleggio non corrisponderebbe al prezzonoleggio delle altre attrezzature dello stesso tipo.';
END IF;
END IF;
END$$


CREATE TRIGGER verifica_pr_nol1 BEFORE UPDATE ON AttrezzatureScuola
FOR EACH ROW
BEGIN
DECLARE p_n INT;
DECLARE t_a INT;
DECLARE ecco INT;
SELECT tipo INTO t_a FROM AttrezzatureScuola WHERE tipo = NEW.tipo GROUP BY tipo;
IF t_a IS NOT NULL THEN SELECT prezzonoleggio INTO p_n FROM AttrezzatureScuola WHERE tipo = NEW.tipo GROUP BY prezzonoleggio;
IF NEW.prezzonoleggio <> p_n THEN 
SIGNAL SQLSTATE '10005'
SET MESSAGE_TEXT='Il prezzonoleggio non corrisponderebbe al prezzonoleggio delle altre attrezzature dello stesso tipo.';
END IF;
END IF;
END$$


CREATE TRIGGER verifica_noleggi BEFORE INSERT ON Noleggi
FOR EACH ROW
BEGIN
DECLARE sconto_p INT;
DECLARE pr_no INT;
DECLARE pr_f INT;
DECLARE ecco INT;
SELECT scontoatt INTO sconto_p FROM Soci WHERE idsocio = NEW.sub;
SELECT prezzonoleggio INTO pr_no FROM AttrezzatureScuola WHERE codatt = NEW.att;
IF sconto_p IS NOT NULL THEN
SET pr_f = pr_no-(pr_no*sconto_p/100);
ELSE 
SET pr_f = pr_no;
END IF;
IF NEW.prezzofinale <> pr_f THEN
SIGNAL SQLSTATE '10006'
SET MESSAGE_TEXT='Il prezzofinale dell\'attrezzatura noleggiata non e\' corretto.';
END IF;
END$$



CREATE TRIGGER verifica_noleggi1 BEFORE UPDATE ON Noleggi
FOR EACH ROW
BEGIN
DECLARE sconto_p INT;
DECLARE pr_no INT;
DECLARE pr_f INT;
DECLARE ecco INT;
SELECT scontoatt INTO sconto_p FROM Soci WHERE idsocio = NEW.sub;
SELECT prezzonoleggio INTO pr_no FROM AttrezzatureScuola WHERE codatt = NEW.att;
IF sconto_p IS NOT NULL THEN
SET pr_f = pr_no-(pr_no*sconto_p/100);
ELSE 
SET pr_f = pr_no;
END IF;
IF NEW.prezzofinale <> pr_f THEN
SIGNAL SQLSTATE '10007'
SET MESSAGE_TEXT='Il prezzofinale dell\'attrezzatura noleggiata non e\' corretto.';
END IF;
END$$


DELIMITER ;