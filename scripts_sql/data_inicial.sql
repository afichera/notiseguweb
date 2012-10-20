-- Roles
INSERT INTO `rol` (`id`, `descripcion`) VALUES(1, 'PERIODISTA');
INSERT INTO `rol` (`id`, `descripcion`) VALUES(2, 'EDITOR');


-- Usuario por default
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(2, 'Editor 1', 'admin', 'admin', 1);
