-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2020 a las 02:48:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyectoaula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_inactivo` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `cupo` double DEFAULT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `documento`, `tipo`, `fecha_registro`, `fecha_inactivo`, `imagen`, `email`, `telefono`, `cupo`, `idpersona`) VALUES
('JORGE', '1037', 'perNatural', '2019-12-29', NULL, 'fotoCliente/cliente.jpg', 'correo@correo.com', '2025246985', 20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `salario_basico` double NOT NULL,
  `deduccion` double DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hoja_vida` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nombre`, `documento`, `fecha_ingreso`, `fecha_retiro`, `salario_basico`, `deduccion`, `foto`, `hoja_vida`, `email`, `telefono`, `celular`, `idpersona`) VALUES
('jorge Pineda', '1034', '2019-11-28', NULL, 5000000, 1000000, 'fotoEmpleado/', 'fotoEmpleado/', 'mario@com.com', '3023022145', '1234567893', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`) VALUES
(1, 'empleado'),
(2, 'cliente'),
(3, 'proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `producto` int(11) NOT NULL,
  `documento_proveedorcol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `documento` varchar(50) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_inactivo` date DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `idpersona` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`documento`, `nombre`, `tipo`, `fecha_registro`, `fecha_inactivo`, `imagen`, `telefono`, `idpersona`, `email`) VALUES
('1037', 'jorge Pineda', 'perJuridica', '2019-11-27', NULL, 'fotoProveedor/', '1234567893', 3, 'correo@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(16) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `contrasena`, `perfil`, `estado`) VALUES
('Erika', 'Erika', 'empl', 'Activo'),
('jorge', 'jorge', 'admin', 'Inactivo'),
('juan', 'juan', 'admin', 'Activo'),
('prueba2', '$2y$10$o.zA.GmojTGfPRBq0R0PVOMiMBW9o6hvcwjwOmPztigqrB1IlfgSS', 'admin', 'Activo'),
('Thiago', 'Thiago', 'clie', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `idpersona_c` (`idpersona`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `idpersona_e` (`idpersona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`,`nombre`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`producto`,`documento_proveedorcol`),
  ADD KEY `documento` (`documento_proveedorcol`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idpersona_c` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `idpersona_e` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `documento` FOREIGN KEY (`documento_proveedorcol`) REFERENCES `proveedor` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto` FOREIGN KEY (`producto`) REFERENCES `producto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `idpersona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
