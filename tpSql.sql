
/*   CREO LAS TABLAS 'envios', 'proveedores', y 'productos' */

CREATE TABLE `envios` (
  `numero` int(11) NOT NULL,
  `pNumero` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
)

CREATE TABLE `productos` (
  `pNumero` int(11) NOT NULL,
  `pNombre` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `tamaño` char(30) COLLATE utf8_spanish2_ci NOT NULL
)

CREATE TABLE `proveedores` (
  `numero` int(11) NOT NULL,
  `nombre` char(30) COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio` char(50) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
)
/*          INGRESO DATOS EN LA TABLA           */
INSERT INTO `proveedores`(`numero`, `nombre`, `domicilio`, `localidad`) VALUES (100, "perez", "peron 876", "quilmes"), 
(101, "perez", "mitre 750", "avellaneda"), (102, "aguirre", "boedo 634", "bernal")

INSERT INTO `productos`(`pNumero`, `pNombre`, `precio`, `tamaño`) VALUES (1, "caramelos", 1.5, "chico" ), 
(2, "cigarrillos", 45.89, "mediano" ),(3, "gaseosa", 15.80, "grande" )

INSERT INTO `envios`(`numero`, `pNumero`, `cantidad`) VALUES (100, 1, 500), (100, 2, 1500), (100, 3, 100),
(101, 2, 55), (101, 3, 225), (102, 1, 600), (102, 2, 300)

/*                        CONSULTAS                       */

1. SELECT * FROM `productos` ORDER by pNombre ASC
2. SELECT * FROM `proveedores` WHERE localidad='quilmes'
3. SELECT * FROM `envios` WHERE cantidad >= 200 AND cantidad <= 300
4. SELECT SUM(cantidad) FROM envios
5. SELECT pNumero from envios LIMIT 3
6. SELECT proveedores.nombre, productos.pNombre FROM `envios`, productos, proveedores WHERE envios.numero = proveedores.numero AND envios.pNumero = productos.pNumero 
            /* DEVUELVE LOS NUMEROS CON MUCHOS DECIMALES */
7. SELECT envios.cantidad * productos.precio FROM envios, productos WHERE envios.pNumero = productos.pNumero 
8. SELECT SUM(envios.cantidad) FROM envios WHERE envios.pNumero = 1 AND envios.numero = 102
9. SELECT envios.pNumero FROM envios WHERE numero in ( SELECT proveedores.numero FROM proveedores WHERE proveedores.localidad = 'avellaneda')
/* Current selection does not contain a unique column. Grid edit, checkbox, Edit, Copy and Delete features are not available. */
10. SELECT proveedores.domicilio, proveedores.localidad FROM proveedores WHERE proveedores.nombre LIKE '%i%' 
11. INSERT INTO `productos`(`pNumero`, `pNombre`, `precio`, `tamaño`) VALUES (4, "chocolate", 25.35, "chico")
12. INSERT INTO `proveedores`(`numero`) VALUES (103)
13. INSERT INTO `proveedores`(`numero`, `nombre`, `localidad`) VALUES (107, "rosales", "la plata")
14. UPDATE `productos` SET `precio`=97.50 WHERE tamaño = 'grande' 
16. DELETE FROM 'productos' WHERE pnumero = 1
17. DELETE FROM `proveedores` WHERE numero NOT IN (SELECT envios.numero FROM envios)
