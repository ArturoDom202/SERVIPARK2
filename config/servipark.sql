-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2023 a las 08:29:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servipark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automoviles`
--

CREATE TABLE `automoviles` (
  `id_auto` int(11) NOT NULL,
  `placa` varchar(9) NOT NULL,
  `hora_entrada` datetime NOT NULL,
  `hora_salida` datetime NOT NULL,
  `id_negocio` int(11) NOT NULL,
  `total_horas` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `automoviles`
--

INSERT INTO `automoviles` (`id_auto`, `placa`, `hora_entrada`, `hora_salida`, `id_negocio`, `total_horas`, `flag`) VALUES
(2, 'sasasa', '2023-08-02 16:22:00', '2023-08-02 17:37:00', 2, 1, 1),
(3, 'SADSAS', '2023-08-02 16:24:00', '2023-08-02 17:39:00', 1, 1, 0),
(4, '454DFD', '2023-08-02 16:40:00', '2023-08-02 17:55:00', 1, 1, 0),
(5, '12adf12', '2023-08-02 16:40:00', '2023-08-02 20:55:00', 1, 4, 1),
(6, 'yjggyuyg1', '2023-08-02 16:59:00', '2023-08-02 18:14:00', 1, 1, 1),
(7, 'asdasdasd', '2023-08-02 17:07:00', '2023-08-02 18:22:00', 1, 1, 1),
(8, 'DADA23', '2023-08-02 17:09:00', '2023-08-02 18:24:00', 1, 1, 1),
(9, '234332', '2023-08-02 19:18:00', '2023-08-02 20:33:00', 1, 1, 1),
(10, 'DASADASA', '2023-08-03 11:18:00', '2023-08-03 13:33:00', 1, 2, 1),
(11, 'TXS056A', '2023-08-03 12:25:00', '2023-08-03 15:30:00', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_total`
--

CREATE TABLE `corte_total` (
  `id_corte` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `id_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_menu`, `nombre`, `descripcion`, `icono`, `ruta`, `id_nivel`) VALUES
(1, 'Usuarios', 'Busque, agregue, actualice y modifique usuarios.', 'bi-person-circle', '/SERVIPARK/controlador/usuariosControlador.php', 1),
(2, 'Vehículos Activos', 'Visualice los vehículos actualmente activos y su vencimiento.', 'bi-car-front-fill', '/SERVIPARK/controlador/vehiculosControlador.php', 1),
(3, 'Establecimientos', 'Busque, agregue, actualice y modifique establecimientos.', 'bi-shop-window', '/SERVIPARK/controlador/negociosControlador.php', 1),
(4, 'Corte de Caja', 'Realice cortes de caja con comprobantes digitales.', 'bi-cash-coin', '/SERVIPARK/controlador/corteTotalControlador.php', 1),
(5, 'Reportes', 'Genere reportes históricos de los automóviles activos y cortes de caja.', 'bi-file-bar-graph', '/SERVIPARK/controlador/reportesControlador.php', 1),
(6, 'Vehículos Activos', 'Visualice los vehículos actualmente activos y su vencimiento.', 'bi-car-front-fill', '/SERVIPARK/controlador/vehiculosControlador.php', 2),
(7, 'Registrar Vehículos', 'Registre vehículos y su tiempo vigente.', 'bi-car-front-fill', '/SERVIPARK/controlador/agregarAutosControlador.php', 3),
(8, 'Corte de Caja', 'Revise el monto total de los cobros realizados.', 'bi-cash-coin', '/SERVIPARK/controlador/corteNegocioControlador.php', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `id_usuario`, `direccion`, `telefono`, `descripcion`, `flag`) VALUES
(1, 3, 'Av. Siempreviva #34', '7971334567', 'Papeleria Esperancita ', 1),
(2, 18, 'Ignacio Zaragoza #14', '7971234567', 'Farmacia el Pastillero', 1),
(3, 13, 'Av los colorines #12', '7971456789', 'Tacos la doble O', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Verificador'),
(3, 'Establecimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ape_p` varchar(40) NOT NULL,
  `ape_m` varchar(40) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `ape_p`, `ape_m`, `correo`, `telefono`, `pass`, `flag`, `id_nivel`) VALUES
(1, 'Arturo', 'Dominguez', 'Muñoz', 'arturo@gmail.com', '7971282749', '1234', 1, 1),
(2, 'Susanita', 'Luna', 'Cruz', 'susuluna@gmail.com', '7971036967', '1234', 1, 1),
(3, 'Pedro', 'Perez', 'Parmesano', 'pedro@gmail.com', '7971036967', '1234', 1, 3),
(4, 'Edison Milton', 'Balvin', 'Sanchez', 'Edsmbs@gmail.com', '7971036967', '1234', 1, 2),
(7, 'Juan', 'Juanin', 'Juanito', 'juan@gmail.com', '7971036967', '3424', 1, 1),
(8, 'Maria Magdalena', 'Muñoz', 'Mota', 'maria@gmail.com', '7971036967', '3456', 1, 2),
(9, 'Juana', 'Pastrana', 'Pasteles', 'juana@gmail.com', '7971036967', '1234', 0, 1),
(12, 'Mario', 'Mario', 'Mario', 'Marioj@jhotmail.com', '7971036967', '12323', 0, 3),
(13, 'Aldahir ', 'Torres', 'Nava', 'aldahir@gmail.com', '7971036967', '1234', 1, 3),
(14, 'Michibertha', 'Dominguez', 'Luna', 'michiberta@gmail.vom', '7971036967', '1234', 1, 1),
(15, 'Arturo', 'Juanin', 'CHalco', 'Arturochalco@gmail.com', '7971277876', '1234', 0, 1),
(18, 'Mario', 'Armando', 'Tores', 'mario.torres@gmail.com', '7971254513', '1233', 1, 3),
(19, 'Pedro', 'Pastrana', 'Torres', 'auhbsubx@gmail.com', '1231231231', '1231', 1, 1),
(20, 'Uriel ', 'Cano', 'Estrada', 'ur_canestt27@hotmail.com', '7971109177', '3469', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `automoviles`
--
ALTER TABLE `automoviles`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_negocio` (`id_negocio`);

--
-- Indices de la tabla `corte_total`
--
ALTER TABLE `corte_total`
  ADD PRIMARY KEY (`id_corte`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `automoviles`
--
ALTER TABLE `automoviles`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `corte_total`
--
ALTER TABLE `corte_total`
  MODIFY `id_corte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `automoviles`
--
ALTER TABLE `automoviles`
  ADD CONSTRAINT `automoviles_ibfk_1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id_negocio`);

--
-- Filtros para la tabla `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`);

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `negocio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
