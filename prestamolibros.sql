-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2022 a las 22:28:13
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestamolibros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idautores` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `lugarNacimiento` varchar(45) DEFAULT NULL,
  `linkBiografia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idautores`, `nombre`, `fechaNacimiento`, `lugarNacimiento`, `linkBiografia`) VALUES
(1, 'Miguel de Cervantes Saavedra', '1547-09-29', 'Alcalá de Henares, España', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwid-ui2qpj6AhW9LEQIHbjlDEcQFnoECAkQAQ&url=https%3A%2F%2Fes.wikipedia.org%2Fwiki%2FMiguel_de_Cervantes&usg=AOvVaw1sbPcx2fALQdHXTe4CnAvu'),
(2, 'Gabriel García Márquez', '1927-03-06', 'Aracataca, Colombia', 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiJkMeuq5j6AhVqEEQIHYYkA6QQFnoECAkQAQ&url=https%3A%2F%2Fes.wikipedia.org%2Fwiki%2FGabriel_Garc%25C3%25ADa_M%25C3%25A1rquez&usg=AOvVaw2PufauSecxvumhSDSt01Sd'),
(3, 'Nombre de autor', '2000-09-01', 'Una ciudad chica', 'u'),
(4, 'Gabriel', '2001-10-27', 'Mi casa', 'www.google.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idlibros` int(11) NOT NULL,
  `autores_idautores` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `fechaImpresion` date DEFAULT NULL,
  `fechaAdquisicion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibros`, `autores_idautores`, `nombre`, `estado`, `editorial`, `tipo`, `fechaImpresion`, `fechaAdquisicion`) VALUES
(1, 1, 'Don Quijote De La Mancha', 'Disponible', 'Penguin Random House', 'Novela', '2015-12-01', '2022-09-23'),
(2, 2, 'Cien años de soledad', 'En prestamo', 'Diana México', 'Novela', '2015-06-27', '2022-09-14'),
(4, 2, 'nombre generico de libro', 'Disponible', 'no se', 'Infantil', '2022-09-08', '2022-09-09'),
(8, 1, 'otro libro de miguel', 'EnPrestamo', 'Una bien chida', 'Literatura', '2022-09-03', '2022-09-17'),
(12, 3, 'libro1', 'Disponible', 'Una bien chida', 'Educacion', '2022-08-30', '2022-09-22'),
(16, 1, 'Nombre de libro', 'Disponible', 'no se', 'Historia', '2022-09-05', '2022-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idprestamos` int(11) NOT NULL,
  `libros_idlibros` int(11) NOT NULL,
  `usuarios_idusuarios` int(11) NOT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  `fechaRegreso` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idprestamos`, `libros_idlibros`, `usuarios_idusuarios`, `fechaPrestamo`, `fechaRegreso`, `estado`) VALUES
(1, 2, 1, '2022-09-15', '2022-09-22', 'En préstamo'),
(2, 1, 2, '2022-09-01', '2022-09-07', 'Entregado'),
(21, 8, 5, '2022-09-17', '2022-09-30', 'Perdido'),
(22, 1, 3, '2022-09-08', '2022-09-22', 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `tipoUsuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `curp`, `tipoUsuario`) VALUES
(1, 'Gabriel Colmenares', 'CORG011027HJCLNBA2', 'Frecuente'),
(2, 'Gabi', 'LERG011027HJCLNBA3', 'Premium'),
(3, 'Pepito', 'oadsojasdqwe', 'Problemático'),
(5, 'Felipe', 'CURPDEFELIPE', 'Problemático'),
(12, 'Juan', 'CURPDEJUAN', 'Nuevo'),
(13, 'Pepito', 'curp1234', 'Nuevo'),
(14, 'nuevo usuario', 'curpnueva', 'Problemático'),
(15, 'otro nombre generico', 'esta es la curp', 'Frecuente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idautores`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idlibros`,`autores_idautores`),
  ADD KEY `fk_libros_autores` (`autores_idautores`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idprestamos`,`libros_idlibros`,`usuarios_idusuarios`),
  ADD KEY `fk_prestamos_libros1` (`libros_idlibros`),
  ADD KEY `fk_prestamos_usuarios1` (`usuarios_idusuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idautores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idlibros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idprestamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_autores` FOREIGN KEY (`autores_idautores`) REFERENCES `autores` (`idautores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_libros1` FOREIGN KEY (`libros_idlibros`) REFERENCES `libros` (`idlibros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
