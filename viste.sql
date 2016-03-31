
DROP VIEW IF EXISTS Immersionisubcomp;
DROP VIEW IF EXISTS Corsiperscomp;


CREATE VIEW Immsubcomp(immersione, sub, costo) AS 
select isu.immersione, isu.sub, i.costo
from ImmersioniSub isu join Immersioni i on isu.immersione=i.codimm;



CREATE VIEW Corsiperscomp(persona, corso, costo) AS
select pc.persona, pc.corso, c.costo
from PersoneCorsi pc join Corsi c on pc.corso=c.codcorso;