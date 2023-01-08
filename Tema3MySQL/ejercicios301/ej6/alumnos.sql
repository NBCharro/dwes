-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2016 a las 22:14:16
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `world`
--
CREATE DATABASE IF NOT EXISTS `escuela` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `escuela`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `dni` mediumint(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaNacimiento` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipoVia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreCalle` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numeroCalle` mediumint(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
