DELIMITER $$

CREATE TRIGGER Despues_borrado
AFTER DELETE
ON movies FOR EACH ROW
BEGIN


    INSERT INTO moviesfecha(id,titulo,anio,puntaje,Fecha)
    VALUES(OLD.id,OLD.titulo,OLD.anio,OLD.puntaje,CURDATE());
END$$    

DELIMITER ;