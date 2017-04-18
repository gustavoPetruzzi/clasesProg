
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