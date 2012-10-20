SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Data de Usuario
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(2, 'Administrador 2', 'admin2', 'admin2', 1);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(3, 'Periodista 1', 'periodista1', 'periodista1', 2);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(4, 'Periodista 2', 'periodista2', 'periodista2', 2);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(5, 'Editor 1', 'editor1', 'editor1', 3);
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(6, 'Editor 2', 'editor2', 'editor2', 3);


-- Data de Nota
INSERT INTO `nota` (`id`, `titulo`, `fecha_hora`, `texto`, `usuario_id`) VALUES(1, 'Cromañón: el fiscal pidió la detención de todos los condenados', '2012-10-20 00:04:32', 'El fiscal ante la Cámara Federal de Casación Penal, Raúl Plee, reclamó hoy la "inmediata detención" de todos los condenados por el incendio en el boliche Cromañon por entender que hay mayores riesgos de fuga ante la certera posibilidad que enfrenta la mayoría de ellos de ir a prisión.\r\n\r\n\r\n"A esta altura del proceso, existe una nueva circunstancia que constituye un peligro procesal que debe ser considerado para asegurar el cumplimiento de la sentencia, y es ni más ni menos que la existencia de una condena grave de efectivo cumplimiento dictada por la sala III" de ese tribunal, argumentó Plee ante los camaristas Liliana Catucci, Mariano Borinsky y Eduardo Riggi.\r\n\r\n\r\nY por ello solicitó la "inmediata detención" del ex gerenciador de Cromañón, Omar Chabán, del ex subcomisario Carlos Díaz, de los ex integrantes de Callejeros Patricio Santos Fontanet, Eduardo Vásquez, Christian Torrejón, Juan Carbone, Maximiliano Djerfy, Elio Delgado, Daniel Cardell, y de su ex manager, Diego Argañaraz.', 6);
INSERT INTO `nota` (`id`, `titulo`, `fecha_hora`, `texto`, `usuario_id`) VALUES(2, 'Microsoft presenta Windows 8, su apuesta más radical en mucho tiempo', '2012-10-20 00:04:32', 'Ya está disponible la versión de prueba y día a día se crean nuevas aplicaciones, que ya suman miles. Mientras tanto, Microsoft se prepara para presentar oficialmente la semana que viene la versión final del sistema operativo Windows 8, su apuesta más radical en mucho tiempo.\r\n\r\n\r\n\r\nSin dudas, el Windows 8 es visualmente el cambio más grande en el sistema operativo de Microsoft desde el pasaje del 3.11 al 95. Pero no es lo único ni lo más importante: se modifican, sobre todo, el modo de usarlo –es ideal para pantallas personales y táctiles y las distintas aplicaciones están muy integradas entre sí- y, aunque no lo promocionen, el propio modelo de negocios de la compañía de Bill Gates.\r\n\r\n\r\n\r\nEn el nuevo sistema, una pantalla de inicio reemplaza al tradicional escritorio, que sigue funcionando para las aplicaciones y programas que no son "nativos" de Windows 8 y, a su vez, como aplicación.\r\n\r\n\r\n\r\nEsa pantalla está organizada por módulos de distinto tamaño que pueden agruparse según los intereses del usuario; cada módulo puede ser de acceso a una aplicación o a un conjunto de aplicaciones. El recorrido es horizontal.', 5);

-- Data de Comentario

INSERT INTO `comentario` (`id`, `texto`, `fecha_hora`, `nota_id`, `usuario_id`) VALUES(1, 'Otra vez tenemos que cambiar de sistema operativo? Mejor me quedo con mi DOS...', '2012-10-20 00:07:00', 2, 3);
INSERT INTO `comentario` (`id`, `texto`, `fecha_hora`, `nota_id`, `usuario_id`) VALUES(2, 'Lo voy a probar... y posteriormente conseguir el crack de activación of course...', '2012-10-20 00:07:00', 2, NULL);
