SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Data de Usuario
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(2, 'Administrador 2', 'admin2', 'admin2', 1);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(3, 'Periodista 1', 'periodista1', 'periodista1', 2);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(4, 'Periodista 2', 'periodista2', 'periodista2', 2);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(5, 'Editor 1', 'editor1', 'editor1', 3);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(6, 'Editor 2', 'editor2', 'editor2', 3);


-- Data de Nota
INSERT INTO `nota` (`id`, `titulo`, `fecha_hora`, `texto`, `usuario_id`) VALUES(1, 'Croma��n: el fiscal pidi� la detenci�n de todos los condenados', '2012-10-20 00:04:32', 'El fiscal ante la C�mara Federal de Casaci�n Penal, Ra�l Plee, reclam� hoy la "inmediata detenci�n" de todos los condenados por el incendio en el boliche Croma�on por entender que hay mayores riesgos de fuga ante la certera posibilidad que enfrenta la mayor�a de ellos de ir a prisi�n.\r\n\r\n\r\n"A esta altura del proceso, existe una nueva circunstancia que constituye un peligro procesal que debe ser considerado para asegurar el cumplimiento de la sentencia, y es ni m�s ni menos que la existencia de una condena grave de efectivo cumplimiento dictada por la sala III" de ese tribunal, argument� Plee ante los camaristas Liliana Catucci, Mariano Borinsky y Eduardo Riggi.\r\n\r\n\r\nY por ello solicit� la "inmediata detenci�n" del ex gerenciador de Croma��n, Omar Chab�n, del ex subcomisario Carlos D�az, de los ex integrantes de Callejeros Patricio Santos Fontanet, Eduardo V�squez, Christian Torrej�n, Juan Carbone, Maximiliano Djerfy, Elio Delgado, Daniel Cardell, y de su ex manager, Diego Arga�araz.', 6);
INSERT INTO `nota` (`id`, `titulo`, `fecha_hora`, `texto`, `usuario_id`) VALUES(2, 'Microsoft presenta Windows 8, su apuesta m�s radical en mucho tiempo', '2012-10-20 00:04:32', 'Ya est� disponible la versi�n de prueba y d�a a d�a se crean nuevas aplicaciones, que ya suman miles. Mientras tanto, Microsoft se prepara para presentar oficialmente la semana que viene la versi�n final del sistema operativo Windows 8, su apuesta m�s radical en mucho tiempo.\r\n\r\n\r\n\r\nSin dudas, el Windows 8 es visualmente el cambio m�s grande en el sistema operativo de Microsoft desde el pasaje del 3.11 al 95. Pero no es lo �nico ni lo m�s importante: se modifican, sobre todo, el modo de usarlo �es ideal para pantallas personales y t�ctiles y las distintas aplicaciones est�n muy integradas entre s�- y, aunque no lo promocionen, el propio modelo de negocios de la compa��a de Bill Gates.\r\n\r\n\r\n\r\nEn el nuevo sistema, una pantalla de inicio reemplaza al tradicional escritorio, que sigue funcionando para las aplicaciones y programas que no son "nativos" de Windows 8 y, a su vez, como aplicaci�n.\r\n\r\n\r\n\r\nEsa pantalla est� organizada por m�dulos de distinto tama�o que pueden agruparse seg�n los intereses del usuario; cada m�dulo puede ser de acceso a una aplicaci�n o a un conjunto de aplicaciones. El recorrido es horizontal.', 5);

-- Data de Comentario

INSERT INTO `comentario` (`id`, `texto`, `fecha_hora`, `nota_id`, `usuario_id`) VALUES(1, 'Otra vez tenemos que cambiar de sistema operativo? Mejor me quedo con mi DOS...', '2012-10-20 00:07:00', 2, 3);
INSERT INTO `comentario` (`id`, `texto`, `fecha_hora`, `nota_id`, `usuario_id`) VALUES(2, 'Lo voy a probar... y posteriormente conseguir el crack de activaci�n of course...', '2012-10-20 00:07:00', 2, NULL);
