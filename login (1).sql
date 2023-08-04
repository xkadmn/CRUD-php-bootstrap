-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2023 a las 06:04:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `email`, `pass`, `id_rol`) VALUES
(1, 'admin@admin', '$2y$10$ycZbVpJ3upxYyu2yvIgcHeBy.yeLUePQT3FltrgMq9lZNoFXHI60e', 1),
(2, 'usuario@hola.com', '$2y$10$kYkWT0OdD1lEwe.ekyCs2u2uLQMiMoGCeH4bNU39QWmwqeTpbaevq', 1),
(3, 'admin@admin.org', '$2y$10$2bUgirXD2meSv7dQSEEWgOrPzvLJ9dG/SUbhmC6/1mj.FWn7j3XKi', 1),
(4, 'nuevo@admin.com', '$2y$10$HKaLA.fRpJgoHFK44j3JdOjLEi825MW3sxj5LmiXBu9bxAvYGeV7u', 1),
(5, 'sq@w.com', '$2y$10$Z1CSsGG3DBhXfDT68H2qFeUYpp8vLZaKxzLADN0/6qL3zd9brqNI6', 1),
(6, 'normal@normal.com', '$2y$10$Nra28xJMgGNfbY4hQbSXkuYhep6l9VTY53Yr06tzo0u9w7SGW4d2W', 1),
(7, 'sq@w.ar', '$2y$10$y8Yr4njvcYCGZPeNuOEMZeIExWFrd2TbN/kEgluApxT05wvhiGRxG', 1),
(8, 'sq@w.org', '$2y$10$hAzqE0SSAKDLypb6/FFIJOC0o9W95JK5k6MuGOcJSJydEb2kIjq9.', 2),
(9, '123@123.ar', '$2y$10$ZWhi06JIwKA08tgHQuX5BewQ/rE8nlzjjV8c6r1iWCClMlzmjIZv2', 1),
(10, '444@444.com', '$2y$10$IXDGQQrRXpCIYQEvZLuScOt//9MnKC69tgHJP3GwwfNOXsyei520S', 1),
(11, '4444@4444.com', '$2y$10$TmvamuKQ4py0u88qNjZCNOuPqy3E.y/4VnyKu4Spsx7Ul9gIkkw5e', 2),
(12, 'asdr@111.com', '$2y$10$rpkpvRb/LEIE6r3Nvc92T./ri/3FZjWA3U9SY5sTMnGs4oPTB.ani', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
