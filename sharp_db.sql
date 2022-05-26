-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2022 a las 20:15:29
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sharp_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicar_vacante`
--

CREATE TABLE `aplicar_vacante` (
  `nombre_asp` varchar(30) NOT NULL,
  `id_vacante` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `num_con` varchar(30) NOT NULL,
  `por_que` varchar(100) NOT NULL,
  `hoja_vida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aplicar_vacante`
--

INSERT INTO `aplicar_vacante` (`nombre_asp`, `id_vacante`, `email`, `num_con`, `por_que`, `hoja_vida`) VALUES
('Laura Fernanda López Mayorga', '1', 'lauralopez@faceoff.com', '3138047178', 'Creo que merezco la vacante porque soy una persona cumplida y comprometida con mi trabajo', 'e1iuoMYs0q3jIV8_621f8b774306a8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nueva_vacante`
--

CREATE TABLE `nueva_vacante` (
  `id_vacante` int(11) NOT NULL,
  `titulo_puesto` text CHARACTER SET latin1 NOT NULL,
  `num_vacante` text CHARACTER SET latin1 NOT NULL,
  `gerente_con` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `nombre_vacante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nueva_vacante`
--

INSERT INTO `nueva_vacante` (`id_vacante`, `titulo_puesto`, `num_vacante`, `gerente_con`, `descripcion`, `nombre_vacante`) VALUES
(1, 'Bachilleres graduados', '2', 'Jahir Ricardo Avila Gutierrez', 'Operarios de producción como funciones de corte y funciones de planchado de telas.', 'Operarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_acceso`
--

CREATE TABLE `registro_acceso` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `acceso` text DEFAULT NULL,
  `hora_acceso` datetime DEFAULT current_timestamp(),
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_acceso`
--

INSERT INTO `registro_acceso` (`id`, `username`, `acceso`, `hora_acceso`, `password`) VALUES
(19, 'jahirravila', ' INCORRECTO', '2022-05-24 14:15:53', 'Jahir0198avil'),
(20, 'jahirravila', ' INCORRECTO', '2022-05-24 14:15:56', 'Jahir0198avilA'),
(21, 'jahirravila', 'CORRECTO', '2022-05-24 14:16:00', 'Jahir0198avila');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sharp_emp`
--

CREATE TABLE `sharp_emp` (
  `id` int(11) NOT NULL,
  `employee_id` text DEFAULT NULL,
  `first_name` text NOT NULL,
  `middle_name` text DEFAULT NULL,
  `last_name` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `employee_image` text NOT NULL,
  `id_type` text NOT NULL,
  `id_number` text NOT NULL,
  `id_card_image` text NOT NULL,
  `residence_address` text NOT NULL,
  `residence_location` text NOT NULL,
  `residence_direction` text NOT NULL,
  `residence_gps` text NOT NULL,
  `next_of_kin` text NOT NULL,
  `relationship` text NOT NULL,
  `phone_of_kin` text NOT NULL,
  `kin_residence` text NOT NULL,
  `kin_residence_direction` text NOT NULL,
  `date_employed` date NOT NULL,
  `job_type` text NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sharp_emp`
--

INSERT INTO `sharp_emp` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `phone`, `employee_image`, `id_type`, `id_number`, `id_card_image`, `residence_address`, `residence_location`, `residence_direction`, `residence_gps`, `next_of_kin`, `relationship`, `phone_of_kin`, `kin_residence`, `kin_residence_direction`, `date_employed`, `job_type`, `status`) VALUES
(15, '1', 'Jahir', 'Ricardo', 'Avila Gutierrez', '3118859547', 'tRUVanuWqZxNkLT_img3.jpg', 'Cedula', '1003520180', 'EC0wXZzeApLSoxc_img3.jpg', 'Fusagasugá', 'vereda la aguadita', 'Vereda la aguadita- centro poblado', '252212', 'Martha Liliana Gutierrez', 'Madre', '3106781885', 'Fusagasugá', 'Vereda la aguadita- centro poblado', '2021-04-01', 'Practicante', 'Empleado'),
(16, '2', 'Nathalia ', '', 'Muñoz Silva', '3215678908', 'L8pld2tBFPY74sq_img2.jpg', 'Cedula', '67341102', 'iuW7MCRD0hPA6xl_img3.jpg', 'Silvania- Cundinamarca', 'Vereda Agua Bonita', 'Vereda las rosas', '252240', 'Nicolas Muñoz Silva', 'Hermano', '3197886521', 'Silvania-Cundinamarca', 'cra 8# 1-60 norte', '2020-04-15', 'Contratista', 'Ex empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `accounttype` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `accounttype`, `email`) VALUES
(10, 'Jahir', 'Avila', 'jahirravila', '8759119e363dab43a744a069476f3537', 'Admin', ''),
(14, 'Prueba', 'Prueba', 'prueba1', '3f78e28b9f3c75f7e60a4811a0971b24', 'Admin', 'andrestorres@develtec.net'),
(11, 'Nathalia', 'Muñoz ', 'nmunoz', '8c87fca195f519d83fdbd0e31126656f', 'Admin', ''),
(12, 'Luis ', 'Avila', 'lavila', 'ab982750b0786e14c38dc44b2617f80f', 'Admin', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nueva_vacante`
--
ALTER TABLE `nueva_vacante`
  ADD PRIMARY KEY (`id_vacante`);

--
-- Indices de la tabla `registro_acceso`
--
ALTER TABLE `registro_acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sharp_emp`
--
ALTER TABLE `sharp_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_acceso`
--
ALTER TABLE `registro_acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `sharp_emp`
--
ALTER TABLE `sharp_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
