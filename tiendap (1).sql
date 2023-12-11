-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 15:38:21
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
-- Base de datos: `tiendap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `C_CLIENTE` varchar(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `APELLIDO` varchar(255) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `C_PRODUCTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`C_CLIENTE`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `TELEFONO`, `C_PRODUCTO`) VALUES
('dwdeiwudhwui', 'iheduwedb', 'iefhfeuwdb', 'efdfsdcsa', 765321, 'euwehuwehd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `C_PRODUCTO` varchar(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `PRECIO` int(11) NOT NULL,
  `CANTIDAD_DISPONIBLE` int(11) NOT NULL,
  `C_PROVEEDOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`C_PRODUCTO`, `NOMBRE`, `DESCRIPCION`, `PRECIO`, `CANTIDAD_DISPONIBLE`, `C_PROVEEDOR`) VALUES
('ewb', 'dewdi', 'wifnief', 1234321, 432, 'wefjeu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `C_PROVEEDOR` varchar(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`C_PROVEEDOR`, `NOMBRE`, `DIRECCION`, `TELEFONO`, `CORREO`) VALUES
('adnwe', 'dwendwi', 'dnwein', 1234567, 'fwiuedfwed'),
('EWREW', 'WEFWE', 'FWEDWE', 12345, 'AEFEWFWE'),
('JSDNWE', 'EFNIWE', 'IRNFIUWE', 2134567, 'FEWIFIW'),
('jwdwin', 'efiefnue', 'eidfiwe', 12345678, 'edeiundeud'),
('PV-01', 'Pelikan', 'CDMX Santa Fe Col DOctores', 2147483647, 'pelikanmx@gmail.com'),
('referf', 'dbewdefu', 'sdsxsfr', 98765432, 'wdiwduwhe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `C_STOCK` varchar(255) NOT NULL,
  `CATEGORIA` varchar(255) NOT NULL,
  `CANTIDAD_EXISTENCIA` int(11) NOT NULL,
  `PRECIO_COMPRA` int(11) NOT NULL,
  `PRECIO_VENTA` int(11) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `C_PRODUCTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`C_STOCK`, `CATEGORIA`, `CANTIDAD_EXISTENCIA`, `PRECIO_COMPRA`, `PRECIO_VENTA`, `FECHA_ENTRADA`, `C_PRODUCTO`) VALUES
('dewifwe', 'ddnwe', 123, 1234, 1234, '2023-11-24', '12wdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `C_VENTA` varchar(255) NOT NULL,
  `FECHA` date NOT NULL,
  `PRODUCTO` varchar(255) NOT NULL,
  `PRECIO_PRODUCTO` int(11) NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `C_CLIENTE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`C_VENTA`, `FECHA`, `PRODUCTO`, `PRECIO_PRODUCTO`, `TOTAL`, `C_CLIENTE`) VALUES
('234sds', '2023-11-29', 'wefwefee', 543321, 1234567, '23dkbdjhw'),
('dfe', '2023-12-08', 'wdewd', 123, 345, 'QDFW'),
('dwedbwehb', '2023-11-09', 'dewdnjie', 1345, 2332, 'edjiejd'),
('efwe', '2023-12-18', 'asffsdgyjuy', 4321, 7654, 'er4rea'),
('EWEFW', '2023-12-08', 'EDWD', 2323, 4646, 'EF3WT54'),
('VN-01', '2023-12-02', '2 Pq de gomas pelikan 20pz', 130, 260, 'CL-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`C_CLIENTE`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`C_PRODUCTO`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`C_PROVEEDOR`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`C_STOCK`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`C_VENTA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
