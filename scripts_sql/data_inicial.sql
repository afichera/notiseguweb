-- Roles

INSERT INTO `rol` (`id`, `descripcion`) VALUES(1, 'ADMINISTRADOR');
INSERT INTO `rol` (`id`, `descripcion`) VALUES(2, 'PERIODISTA');
INSERT INTO `rol` (`id`, `descripcion`) VALUES(3, 'EDITOR');


-- Usuario por default
INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`) VALUES(1, 'Administrador 1', 'admin', 'admin', 1);
