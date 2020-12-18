CREATE DATABASE `web_movies` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `puntaje` varchar(3) NOT NULL,
  `duracion` varchar(4) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

CREATE TABLE `moviesarchivo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `puntaje` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `usuario` varchar(13) NOT NULL,
  `contrasenia` varchar(9) NOT NULL,
  `nombre` varchar(13) NOT NULL,
  `apellido` varchar(13) NOT NULL,
  `Habilitado` int(11) DEFAULT NULL,
  `Fallido` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `moviesfecha` (
  `id` int(11) NOT NULL,
  `titulo` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `puntaje` varchar(3) NOT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_in_login`(IN iUsuario varchar(255) ,IN iPass varchar(255), OUT oFallido INT)
begin
 
 DECLARE contador INT;

	if EXISTS(select * from web_movies.users where usuario = iUsuario and contrasenia = iPass)
	THEN
    begin
		SET oFallido = 0 ;
	end;
    ELSE
    begin
    SELECT 
     @contador := Fallido 
     FROM
	 web_movies.users
     WHERE usuario = iUsuario;
     SET contador = @contador+1;
     
		
     
		UPDATE web_movies.users
        SET Fallido = contador
        WHERE usuario = iUsuario; 
        
			UPDATE web_movies.users
            SET Habilitado = if(Fallido > 3 , 0 , Habilitado)
            WHERE usuario = iUsuario ;
	SET oFallido = 1;
    end;
	END IF;

 END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InsertaContacto`(IN iNombre varchar(25) ,IN iMail varchar(255), IN iTelefono varchar(40), IN iMensje varchar(255))
begin
	INSERT INTO web_movies.Contacto(Nombre,mail,telefono,mensaje) 
    values (iNombre,iMail,iTelefono,iMensje);

END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `fPuntaje`( ipuntaje INT ) RETURNS varchar(25) CHARSET utf8
BEGIN
	declare Categoria  varchar(25);	
	SET Categoria := if(ipuntaje < 5 , "MALA" , "Buena");
    
    RETURN Categoria;
    

END$$
DELIMITER ;
