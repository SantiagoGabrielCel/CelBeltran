DELIMITER $$

CREATE TRIGGER Antes_borrado
BEFORE DELETE
ON movies FOR EACH ROW
BEGIN
    INSERT INTO moviesarchivo(id,titulo,anio,puntaje)
    VALUES(OLD.id,OLD.titulo,OLD.anio,OLD.puntaje);
END$$    

DELIMITER ;