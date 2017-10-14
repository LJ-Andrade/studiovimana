-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2017 a las 01:53:45
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vadming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `user_id`, `category_id`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(41, 'Diseño de logo', '<p><strong>Cliente:</strong> Adhefull Adhesivos Industriales<br></p><p><strong>Desarrollo:</strong> Diseño de Logotipo y desarrollo de sitio web.</p><p>Para el diseño del Logo se utilizo el icono del la gota para reflejar los items principales que la empresa propone, la flexibilidad de la empresa y la calidad profesional de los productos que ofrecen al mercado.<br>El Logo se presenta como una imágen fuerte y contundente para imponerse antes sus clientes, destacar y diferenciarse ante sus competidores.</p><p></p><hr><p></p><p><a href=\"http://www.adhefull.com.ar/\" title=\"Sitio Web adhefull\">Ver Sitio Web</a><br></p>', 15, 2, '1', '2017-03-09 18:05:50', '2017-06-18 04:20:44', 'diseno-de-logo-adhefull'),
(42, 'Diseño de Logotipo', '<p><strong>Cliente:</strong> Amaquilla Cerámica de Autor<br></p><p><strong>Descripción:</strong> Diseño de logotipo y Plantilla para Mercado Libre.</p><p>Amaquilla nació un espacio para experimentar y jugar con los elementos de la naturaleza. <br>Las piezas que se construyen en Amaquilla son vistas desde su nacimiento como obras de arte son totalmente personales y guardan una relación directa con los sentimientos del creador. Estos elementos fueron tomados tanto para el desarrollo y creación del logotipo como de las piezas de comunicación gráfica.<br>Para el diseño del logotipo se tomaron elementos delicados, lineas abiertas con sensación de suavidad que reflejaran la conexión con los más profundos sentimientos.<br></p>', 15, 2, '0', '2017-03-09 18:09:00', '2017-06-15 22:03:12', 'diseno-de-logotipo-amaquilla'),
(43, 'Diseño Identidad de Marca', '<p><strong>Cliente:</strong> Aprill Pets</p><p><strong>Descripción:</strong> Diseño e Illustración de Logotipo </p>', 15, 2, '0', '2017-03-09 18:17:14', '2017-03-09 18:17:14', 'diseno-identidad-de-marca-logo-aprill'),
(44, 'Logotipo + Sitio Web', '<p><strong>Cliente:</strong> Emanuela Fotografía<br></p><p><strong>Descripción: </strong>Diseño de Logotipo e Identidad de marca. Diseño y desarrollo de página web <strong><br></strong></p>', 15, 16, '0', '2017-03-10 03:48:43', '2017-03-10 03:48:43', 'logotipo-sitio-web-emanuela'),
(45, 'Diseño Identidad de Marca Producto', '<p><strong>Cliente: Enlace<br></strong></p><p><strong>Descripción:</strong> Diseño de Logotipo más aplicaciones para papelería y folletería comercial<strong>.<br></strong></p>', 15, 2, '0', '2017-03-10 03:50:55', '2017-03-10 03:50:55', 'diseno-identidad-de-marca-producto-enlace'),
(46, 'Diseño de Sitio Web Adaptable', '<p><strong>Cliente: </strong>Icono Arquitectos<strong><br></strong></p><p><strong>Descripción: </strong>Diseño y desarrollo de Pagina web adaptable a celulares y dispositivos moviles<br></p>', 15, 16, '0', '2017-03-10 03:53:31', '2017-03-10 03:53:31', 'diseno-de-sitio-web-adaptable'),
(47, 'Diseño web Responsivo', '<p><strong>Cliente: </strong>Iulmac ingeniería<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de página web responsiva <strong><br></strong></p><p><strong></strong></p><p></p><hr><p></p><a href=\"http://iulmacing.com.ar/\" title=\"diseño web responsivo\">Ver Sitio Web</a><br><p><strong><br></strong></p>', 15, 16, '0', '2017-03-10 03:55:46', '2017-07-27 06:54:37', 'diseno-web-responsivo-iulmac'),
(48, 'Logotipo + Página web', '<p><strong>Cliente: </strong>Estudio Var Paisajismo<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de Logotipo <strong><br></strong></p><p><strong>Piezas desarrolladas:</strong></p><p>-Diseño de Logo</p><p>-Tarjetas Personales</p><p>-Papelería Comercial<br></p><p>-Diseño y desarrollo Página Web<strong><br></strong></p><p><strong></strong></p><p></p><hr><p></p><p><a href=\"http://estudiovar.com.ar/\" title=\"Pagina Web\">Ver Sitio Web</a></p><p><strong><br></strong></p>', 15, 2, '0', '2017-03-10 04:01:32', '2017-07-09 07:33:26', 'logotipo-pagina-web-var'),
(49, 'Diseño de Página Web Institucional', '<p><strong>Cliente: </strong>Licenciado Ruiz Diaz<strong><br></strong></p><p><strong>Descripción:&nbsp; </strong><br></p><p>Diseño y desarrollo de sitio web responsivo. <br></p><p>La página debe tener un diseño sobrio que demuestre seguridad, confiabilidad y compromiso con sus clientes. Para esto se diseño con colores fríos&nbsp; un diseño rígido que concentre la atención en la información que se muestra.<strong><br></strong></p><p><strong></strong></p><p></p><hr><p></p><p><a href=\"http://ruizdiazdavidisaac.com.ar/\" title=\"Paginaweb institucional\">Ver Sitio Web</a></p><p><strong><br></strong></p><p><strong><br></strong></p>', 15, 16, '0', '2017-03-10 04:04:02', '2017-08-08 22:04:28', 'diseno-de-pagina-web-institucional-ruiz'),
(50, 'Diseño de Marca', '<p><strong>Cliente: </strong>Arenas Blancas<strong><br></strong></p><p><strong>Descripción: </strong>Diseño y asesoramiento de identidad de marca para producto. <br></p><p>Es este diseño se busca reflejar la frescura de la marca tanto con la elección tipográfica como con las lineas blandas y la disposición desestructurada del logotipo.<strong><br><br></strong></p><p><strong><br></strong></p>', 15, 2, '0', '2017-03-10 04:05:30', '2017-07-08 02:35:10', 'diseno-de-marca-arenas'),
(51, 'Diseño Identidad para Producto', '<p><strong>Cliente: </strong>Cajita Felíz<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de Identidad para Producto. El diseño del Logotipo de etiquetas para producto, colgantes y folleto.<br><br>El diseño de la identidad de producto refleja calidez y sobriedad de un producto artesanal, cuidando hasta su mínimo detalle en la calidad del producto.<br><br>La idea del sello aparece en todas las piezas que componen la identidad de la marca generando así sensaciones de trayectoria y calidad.</p>', 15, 2, '0', '2017-03-10 04:07:16', '2017-07-08 07:34:12', 'diseno-identidad-para-producto'),
(52, 'Diseño de Logo para Indumentaria', '<p><strong>Cliente: </strong>MALUN Indumentaria<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de marca para productos de indumentaria. <br></p><p>El diseño del logo demuestra sobriedad y estatus a través de su geometrización y simetría. <br></p><p>Perfección y sensualidad son la principal influencia sobre el estilo y visión de la marca, reflejamos esto en el contraste de finos y gruesos.<strong><br></strong></p>', 15, 2, '0', '2017-03-10 04:09:10', '2017-08-08 22:11:41', 'diseno-de-logo-para-indumentaria-malun'),
(53, 'Diseño Web Adaptable a Movil', '<p><strong>Cliente: </strong>Centro de estética Beauty Relax<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de sitio web adaptable a dispositivos móviles para Centro de estética Beauty Relax. Para este diseño se busco una estética delicada y suave en armonía con los servicios prestados por el centro.<br><br>La web es adaptable a todos los dispositivos móviles, tanto celulares como tablet y PC, se presto especial atención a la usabilidad y a generar una navegabilidad amistosa para generar empatía con el usuario.</p><p><strong></strong></p><p></p><hr><p></p><p><a href=\"http://centroesteticarelax.com.ar/\" title=\"Diseño paginaweb\">Ver Sitio Web</a></p><p><strong><br></strong></p>', 15, 16, '0', '2017-03-10 04:23:23', '2017-08-08 22:10:43', 'diseno-web-adaptable-a-movil-spa'),
(54, 'Diseño de Logotipo en Acuarela', '<p><strong>Cliente: </strong>Testeadora blog<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de Logotipo lettering hecho con acuarelas<strong>.<br></strong></p><p>El diseño del Logotipo está directamente relacionado con el mundo del maquillaje, representado con acuarelas y diferentes tonos de pinceladas superpuestas.<br>La tipografía seleccionada debe ser una con trazo gestual y casual con curvas suaves .<br><br><strong></strong></p><p><strong><br></strong></p>', 15, 2, '0', '2017-03-10 04:27:25', '2017-08-08 22:05:12', 'diseno-de-logotipo-en-acuarela-testeadora'),
(55, 'Diseño de Catálogo', '<p><strong>Cliente: </strong>Santa Osadía<br></p><p><strong>Descripción: </strong>Diseño de catálogo PDF para venta de productos Online.<br>El catálogo esta pensado con un diseño impactante y tentador, mostrando diferentes tipos de plano para generar impacto tanto en el diseño como en el desarrollo y evolución&nbsp; del catálogo.</p><p> Buscaos en el diseño del catálogo una identidad propia dentro de la esencia de la marca. Temporada primavera-verano 2016&nbsp; Inspiración Brasil</p><p></p><hr><a href=\"http://vimana.studio/muestras/catalogosanta1.pdf\" title=\"catalogosantaosadia\">Ver Cátalogo</a><p></p>', 15, 2, '0', '2017-03-10 04:49:49', '2017-10-04 21:10:55', 'diseno-de-catalogo-santa'),
(56, 'Catálogo de Produtos', '<p><strong>Cliente: </strong>Santa Osadía<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de catálogo de productos para venta Online en PDF.</p><p> La inspiración para este diseño fue la frescura y el movimiento que nos plantea la cultura brasilera, la disposición de los productos dentro del catálogo muestran esta inspiración y esencia de una marca juvenil, divertida y atrevida.</p><p> Las fotos de los productos&nbsp; Temporada primavera-verano 2016&nbsp; Inspiración Brasil<br></p><p></p><hr><p></p><p><a href=\"http://vimana.studio/muestras/catalogosanta4.pdf\" title=\"catalogosantaosadia\">Ver Catálogo</a></p>', 15, 2, '0', '2017-03-10 04:52:09', '2017-10-04 21:21:13', 'catalogo-de-produtos-santa'),
(57, 'Diseño de Catálogo Especial Fiestas', '<p><strong>Cliente: </strong>Santa Osadia Indumentaria</p><p><strong>Descripción: </strong><br></p><p>Temporada primavera- verano 2016 edición especial fin de año.</p><p>Para este especial de temporada decidimos preparar un diseño relacionado con la temática de las fiestas navideñas, mostrando diferentes elementos gráficos festivos que reflejen la escencia y espíritu de la marca.&nbsp; <br></p><p>Trabajamos tanto en el diseño del catálogo de sus productos para venta Online, como en publicaciones para redes sociales y anuncios publicitarios.</p><p>Podes ver el catálogo completo en versión PDF en el link que agregamos a continuación.<br></p><br><p></p><hr><a href=\"http://vimana.studio/muestras/catalogosanta2.pdf\" title=\"catalogosantaosadia\">Ver Catálogo</a><p></p>', 15, 2, '0', '2017-03-14 23:10:34', '2017-10-04 21:12:18', 'diseno-de-catalogo-especial-fiestas-santa'),
(58, 'Diseño de Catálogo de Indumentaria', '<p><strong>Cliente: </strong>Santa Osadia</p><p><strong>Descripción: </strong>Diseño y armado de catalogo para venta de productos on line. Temporada Otoño-Invierno 2016 Inspiración Alicia en el País&nbsp;de las Maravillas.</p><p></p><hr><a href=\"http://vimana.studio/muestras/catalogosanta3.pdf\" title=\"catalogosantaosadia\" target=\"_blank\">Ver Catálogo</a><p></p>', 15, 2, '0', '2017-03-14 23:29:56', '2017-10-04 21:11:25', 'diseno-de-catalogo-de-indumentaria-santa'),
(59, 'Diseño de Catálogo de productos', '<p><strong>Cliente:</strong> Puffitos Designs&nbsp;</p><p><strong>Descripción: &nbsp;</strong>Diseño de Logo estilo vintage +&nbsp;Diseño y armado de catálogo on-line para venta de productos.</p><p>En el diseño del logo proponemos&nbsp; un estilo vintage reflejando la estética con la cual están pensados los diseños de las banquetas y accesorios para el living.</p><p>El diseño del catálogo es pensado tanto para su versión en PDF como en impresión. La consigna principal es desarrollar un diseño práctico y eficaz para poder comunicarse con sus clientes. Para lograr este catálogo se utilizaron fotografías con puestas en escena del producto y un detalle a modo infográfico donde se contara y especificara cada producto por separado</p><br><p></p><hr><a href=\"http://studiovimana.com.ar/muestras/catalogopuf1.pdf\" title=\"catalogopuffitos\">Ver Catálogo Completo</a><p></p>', 15, 2, '0', '2017-03-14 23:41:16', '2017-07-26 23:17:25', 'diseno-de-catalogo-de-productos-puffitos'),
(60, 'Diseño de Escenografía para Fotografía', '<p><strong>Cliente:</strong> Floral</p><p><strong>Descripción: </strong>Escenografía&nbsp;de paisaje natural armado con papeles cortados. La escena fue iluminada para generar sensación de amanecer provocando sombras y profundidad.</p>&nbsp;<br>', 15, 15, '0', '2017-03-14 23:52:30', '2017-08-08 22:01:52', 'diseno-de-escenografia-para-fotografia'),
(62, 'Sitio Web Maratón de la Paternal', '<p><strong>Cliente:</strong> Maratón de la Paternal <br></p><p><strong>Descripción:&nbsp;</strong> Sitio Web y rediseño de logotipo<br><br>Para esta edición especial de la Maratón de la Paternal donde se celebran los 10 años del evento, pensamos una propuesta renovadora que reflejara el prestigio y su trayectoria dentro del barrio.<br><br>Para esto hicimos cambios en el diseño del logotipo, respetando su forma original y agregando o resaltando los valores del evento.<br><br>Su amistad y compromiso con la gente del barrio donde se desarrolla&nbsp; era uno de los puntos claves a resaltar. Los colores y el estilo gráfico utilizados en el diseño y desarrollo del Sitio Web fueron fundamentales para transmitir este sentimiento.</p><p><strong></strong></p><p></p><hr><p></p><a href=\"http://maratondelapaternal.com.ar/\" title=\"Sitio Web y Logo Maratón de la Paternal\">Ver Sitio Web</a><br><p><strong><br></strong></p>', 15, 16, '0', '2017-05-17 03:16:10', '2017-06-10 00:33:54', 'sitio-web-mataron-de-la-paternal'),
(63, 'Diseño Web Responsive', '<p><strong>Cliente:</strong> Doctora Ruffet<br></p><p><strong>Descripción:&nbsp; </strong>Diseño de publicidad gráfica para la revista Aerolíneas Argentinas. El diseño del sitio es adaptable a distintos dispositivos. La usabilidad y navegabilidad es óptima tanto para celulares como Tablets y PC.<br></p><p></p><hr><p></p><p><a href=\"http://www.invisibleortodoncia.com.ar/\" title=\"Diseño de Sitio Web Responsivo\">Ir al Sitio Web</a><br></p>', 15, 16, '0', '2017-05-17 03:23:51', '2017-07-29 03:48:01', 'diseno-web-responsive-ruffet'),
(64, 'Diseño de Logo VdeVerde', '<p><strong>Cliente:</strong> V de Verde<br></p><p><strong>Descripción:&nbsp;</strong> Diseño de Logotipo <br></p><p>La idea principal para el diseño de logo, era reflejar y proponer una nueva forma de conectar con la naturaleza, de entender la infinidad de cosas que podemos obtener de ella.</p><p>“Todo lo que necesitamos esta en la naturaleza, solo hay que saber conectarse con ella.”</p><p>Necesitábamos para esto un diseño simple y puro, esencial en su forma, que transmita el gen de la naturaleza y la vida.</p><p>Era necesario generar variedad de aplicaciones del logo para ser impresos en diferentes calidades de soportes.</p><p></p><hr><p></p><p><strong><a href=\"http://vdeverde.com.ar/\" title=\"diseño web paginavdeverde\">Ir al Sitio Web</a></strong></p>', 15, 2, '0', '2017-07-24 19:36:55', '2017-07-24 19:42:19', 'diseno-de-logo-vdeverde'),
(65, 'Diseño Identidad Comercial', '<p><strong>Cliente:</strong> Dietética Peperina<br></p><p><strong>Descripción:&nbsp;</strong> Diseño de Logotipo papelería comercial.</p><p>En Dietética Peperina podes encontrar comida casera y nutritiva de excelente calidad. Peperina nos eligieron para realizar el diseño del Logo y la identidad comercial completa del negocio, tanto papelería comercial,  brochure comercial, etiquetas y carteles para exteriores.</p><p><br></p><p><hr></p>', 15, 2, '0', '2017-08-02 20:14:15', '2017-08-02 20:32:57', 'diseno-identidad-comercial'),
(66, 'Diseño de Identidad de Marca', '<p><strong>Cliente:</strong> Innova Studio <br></p><p><strong>Descripción:&nbsp;</strong> Diseño de Logotipo papelería comercial</p><p>InnovaStudio es un equipo dedicado principalmente a la creación y desarrollo de software. Se desarrollo por un lado el Logotipo reflejando la calidad de sus servicios y su misión como marca. <br></p>', 15, 2, '1', '2017-08-03 21:45:03', '2017-08-03 21:45:03', 'diseno-de-identidad-de-marca-innova'),
(67, 'Creación y Diseño de Logotipo', '<p><strong>Cliente:</strong> Martins House<br></p><p><strong>Descripción: </strong>Diseño de Logotipo para profesionales<br><br>La idea principal para el desarrollo y creación del diseño del Logotipo era buscar formas geométricas que reflejaran el mundo de la música y la producción audiovisual.<br>Rectas y diagonales son los principales elementos gráfico que se utilizaron para la creación del diseño del Logotipo <br></p>', 15, 2, '0', '2017-08-08 20:55:18', '2017-08-08 20:55:18', 'creacion-y-diseno-de-logotipo-'),
(68, 'Diseño y Armado de Catálogo On-Line', '<p><strong>Cliente: </strong>Santa Osadía<strong><br></strong></p><p><strong>Descripción: </strong>Diseño de catálogo de productos para venta Online en PDF.</p><p>\r\n La inspiración para este diseño fue la frescura y el movimiento que nos\r\n plantea la cultura brasilera, la disposición de los productos dentro \r\ndel catálogo muestran esta inspiración y esencia de una marca juvenil, \r\ndivertida y atrevida.</p><p> Las fotos de los productos&nbsp; Temporada primavera-verano 2017&nbsp; <br></p>', 15, 2, '0', '2017-08-08 21:59:59', '2017-08-08 21:59:59', 'diseno-y-armado-de-catalogo-on-line'),
(69, 'Sitio Web Autoadministrable', '<p><strong>Cliente:</strong> V de Verde<br></p><p><strong>Descripción:&nbsp;</strong> Diseño de Logotipo <br></p><p>La\r\n idea principal para el diseño de logo, era reflejar y proponer una \r\nnueva forma de conectar con la naturaleza, de entender la infinidad de \r\ncosas que podemos obtener de ella.</p><p>“Todo lo que necesitamos esta en la naturaleza, solo hay que saber conectarse con ella.”</p><p>Necesitábamos para esto un diseño simple y puro, esencial en su forma, que transmita el gen de la naturaleza y la vida.</p><p>Era necesario generar variedad de aplicaciones del logo para ser impresos en diferentes calidades de soportes.</p><p></p><hr><p></p><p><strong><a href=\"http://vdeverde.com.ar/\" title=\"diseño web paginavdeverde\">Ir al Sitio Web</a></strong></p>', 15, 16, '0', '2017-08-10 03:51:26', '2017-08-10 03:56:12', 'sitio-web-autoadministrable-vdeverde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `article_tag`
--

INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(100, 41, 3, NULL, NULL),
(101, 41, 21, NULL, NULL),
(102, 41, 19, NULL, NULL),
(103, 42, 3, NULL, NULL),
(104, 42, 4, NULL, NULL),
(105, 42, 21, NULL, NULL),
(106, 43, 3, NULL, NULL),
(107, 43, 13, NULL, NULL),
(108, 43, 21, NULL, NULL),
(109, 44, 3, NULL, NULL),
(110, 44, 21, NULL, NULL),
(111, 44, 19, NULL, NULL),
(112, 45, 6, NULL, NULL),
(113, 45, 9, NULL, NULL),
(114, 45, 21, NULL, NULL),
(115, 46, 3, NULL, NULL),
(116, 46, 17, NULL, NULL),
(117, 46, 19, NULL, NULL),
(118, 47, 18, NULL, NULL),
(119, 47, 17, NULL, NULL),
(120, 47, 19, NULL, NULL),
(121, 48, 18, NULL, NULL),
(122, 48, 5, NULL, NULL),
(123, 48, 19, NULL, NULL),
(124, 49, 18, NULL, NULL),
(125, 49, 17, NULL, NULL),
(126, 49, 5, NULL, NULL),
(127, 50, 3, NULL, NULL),
(128, 50, 13, NULL, NULL),
(129, 50, 21, NULL, NULL),
(130, 51, 16, NULL, NULL),
(131, 51, 9, NULL, NULL),
(132, 51, 21, NULL, NULL),
(133, 52, 3, NULL, NULL),
(134, 52, 7, NULL, NULL),
(135, 52, 5, NULL, NULL),
(136, 53, 18, NULL, NULL),
(137, 53, 17, NULL, NULL),
(138, 53, 19, NULL, NULL),
(139, 54, 3, NULL, NULL),
(140, 54, 15, NULL, NULL),
(141, 54, 21, NULL, NULL),
(142, 55, 12, NULL, NULL),
(143, 55, 9, NULL, NULL),
(144, 55, 8, NULL, NULL),
(145, 56, 12, NULL, NULL),
(146, 56, 9, NULL, NULL),
(147, 56, 8, NULL, NULL),
(148, 57, 12, NULL, NULL),
(149, 57, 9, NULL, NULL),
(150, 57, 8, NULL, NULL),
(151, 58, 12, NULL, NULL),
(152, 58, 7, NULL, NULL),
(153, 58, 8, NULL, NULL),
(154, 59, 12, NULL, NULL),
(155, 59, 21, NULL, NULL),
(156, 59, 8, NULL, NULL),
(157, 60, 3, NULL, NULL),
(158, 60, 20, NULL, NULL),
(159, 60, 13, NULL, NULL),
(162, 62, 18, NULL, NULL),
(163, 62, 17, NULL, NULL),
(164, 62, 19, NULL, NULL),
(165, 63, 18, NULL, NULL),
(166, 63, 17, NULL, NULL),
(167, 63, 19, NULL, NULL),
(168, 64, 3, NULL, NULL),
(169, 64, 16, NULL, NULL),
(170, 64, 21, NULL, NULL),
(171, 65, 4, NULL, NULL),
(172, 65, 21, NULL, NULL),
(173, 65, 5, NULL, NULL),
(174, 66, 4, NULL, NULL),
(175, 66, 21, NULL, NULL),
(176, 66, 5, NULL, NULL),
(177, 67, 3, NULL, NULL),
(178, 67, 4, NULL, NULL),
(179, 67, 21, NULL, NULL),
(180, 68, 10, NULL, NULL),
(181, 68, 12, NULL, NULL),
(182, 68, 8, NULL, NULL),
(183, 69, 18, NULL, NULL),
(184, 69, 17, NULL, NULL),
(185, 69, 19, NULL, NULL),
(187, 70, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'GraphicDesign', '2017-01-20 01:17:32', '2017-01-29 02:49:36'),
(15, 'Ilustraciones', '2017-01-27 11:33:49', '2017-01-29 02:50:09'),
(16, 'DesarrolloWeb', '2017-03-09 04:29:26', '2017-03-09 04:29:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `name`, `article_id`, `created_at`, `updated_at`) VALUES
(114, 'f4649814011f84bb9d8d7954b50df19c.jpg', 42, '2017-03-09 18:09:00', '2017-03-09 18:09:00'),
(115, '4c63dd9ffcbc3024c94111b3b3d0e4f7.jpg', 42, '2017-03-09 18:09:00', '2017-03-09 18:09:00'),
(116, '35ab6a8e464255168a74ca39a274e592.jpg', 42, '2017-03-09 18:09:00', '2017-03-09 18:09:00'),
(119, '88fb2d208932fee58217b2193fc45c28.jpg', 44, '2017-03-10 03:49:05', '2017-03-10 03:49:05'),
(120, '1009fa23fb7c4f50d390e44b0682b440.jpg', 44, '2017-03-10 03:49:05', '2017-03-10 03:49:05'),
(121, '4067b487252fb21670e9998e6b354ad4.jpg', 44, '2017-03-10 03:49:05', '2017-03-10 03:49:05'),
(122, '3c7c30e05ed6b6104ca47e3d82c188b7.jpg', 45, '2017-03-10 03:50:56', '2017-03-10 03:50:56'),
(123, '7118cab1b5517187585cfe249e3cc962.jpg', 45, '2017-03-10 03:50:56', '2017-03-10 03:50:56'),
(124, 'dd574fbf133f88e7c5c2fd319a8fc0b2.jpg', 45, '2017-03-10 03:50:56', '2017-03-10 03:50:56'),
(125, '7ffc3e1e6b4479b737862906a8ea56b6.jpg', 46, '2017-03-10 03:53:31', '2017-03-10 03:53:31'),
(126, '1d906baf551b1bd8c7a0517e9eaab8af.jpg', 46, '2017-03-10 03:53:31', '2017-03-10 03:53:31'),
(127, '2c25b0224c3d30d43a52fedbc10a00e8.jpg', 46, '2017-03-10 03:53:31', '2017-03-10 03:53:31'),
(135, '3b88a271f1538c6906b552b7292a1620.jpg', 49, '2017-03-10 04:04:02', '2017-03-10 04:04:02'),
(136, 'e0dac00cd829ed658a044871d37679c6.jpg', 49, '2017-03-10 04:04:02', '2017-03-10 04:04:02'),
(137, 'fddfd34102d49ed3cebfa32fe661c70a.jpg', 50, '2017-03-10 04:05:30', '2017-03-10 04:05:30'),
(138, '3890eff10fe99013221f36712a422c77.jpg', 50, '2017-03-10 04:05:30', '2017-03-10 04:05:30'),
(142, '42064a2bbfa9a4c3ef6ca590f80f2da0.jpg', 51, '2017-03-10 04:07:16', '2017-03-10 04:07:16'),
(148, '5e50f249fef77997cd05c5c0bf655783.jpg', 53, '2017-03-10 04:23:24', '2017-03-10 04:23:24'),
(157, 'bc2438d8ea8fba36d1ca04f7194378fc.jpg', 56, '2017-03-10 04:52:10', '2017-03-10 04:52:10'),
(161, '16964a14fbd90124f1cf2e360dbc92b2.jpg', 58, '2017-03-14 23:29:56', '2017-03-14 23:29:56'),
(162, 'ec2c913fb7d7499be9114e51b8847f3e.jpg', 58, '2017-03-14 23:29:56', '2017-03-14 23:29:56'),
(163, '3a6c518d2772daa19c3fceec7d37e451.jpg', 58, '2017-03-14 23:29:56', '2017-03-14 23:29:56'),
(164, 'cfbc794596f674d647cf34711fae3338.jpg', 58, '2017-03-14 23:29:57', '2017-03-14 23:29:57'),
(165, '97fcd35df65974003b95fc67e29a3a75.jpg', 58, '2017-03-14 23:29:57', '2017-03-14 23:29:57'),
(166, '3d55ceb14b6594b865da7c260e928365.jpg', 58, '2017-03-14 23:29:57', '2017-03-14 23:29:57'),
(167, '747c6528cb755d95c07e4f8ef5cb9aae.jpg', 58, '2017-03-14 23:29:57', '2017-03-14 23:29:57'),
(176, 'ce8899e422e6a05b4717f4569dfc7ad7.jpg', 62, '2017-05-17 03:16:11', '2017-05-17 03:16:11'),
(178, '9d2fc1d31fa7471fad8c4bdfe268fc35.jpg', 55, '2017-06-08 18:43:59', '2017-06-08 18:43:59'),
(179, 'e863c89e83dff8d1277212a40417e935.jpg', 55, '2017-06-08 18:44:29', '2017-06-08 18:44:29'),
(180, '1fe5cfbcf35cd5fef1a2937ab1c5cfe7.jpg', 55, '2017-06-08 18:44:29', '2017-06-08 18:44:29'),
(181, 'b4142907b4dbdbc61f1f15fa2288bf5d.jpg', 56, '2017-06-08 18:45:50', '2017-06-08 18:45:50'),
(182, '25c894c1dab6e0c847237fc387d5befc.jpg', 56, '2017-06-08 18:45:50', '2017-06-08 18:45:50'),
(183, 'ee0f6b9119252ccfdd6dbd73c4758905.jpg', 57, '2017-06-08 19:00:14', '2017-06-08 19:00:14'),
(184, '1b278f77ab3c03e2972aa1495d85b908.jpg', 57, '2017-06-08 19:00:15', '2017-06-08 19:00:15'),
(185, 'de464eced72e3b72a83860d8c0195141.jpg', 57, '2017-06-08 19:00:15', '2017-06-08 19:00:15'),
(186, 'f377e95f0be1901428441e21cce9a49b.jpg', 57, '2017-06-08 19:00:15', '2017-06-08 19:00:15'),
(187, '2e4da1ec40e39c1f237dee1d70306266.jpg', 57, '2017-06-08 19:00:15', '2017-06-08 19:00:15'),
(188, 'b9fb8a1e965f62c2babb6917739c5e9f.jpg', 57, '2017-06-08 19:00:15', '2017-06-08 19:00:15'),
(189, 'daefd388cc14b82880c0468d4e8180c1.jpg', 57, '2017-06-08 19:00:16', '2017-06-08 19:00:16'),
(190, 'ab50098db65c2601972e07bf6d12f7a0.jpg', 57, '2017-06-08 19:00:16', '2017-06-08 19:00:16'),
(191, 'af5e213124619ea6719491fbeb491e0f.jpg', 57, '2017-06-08 19:00:16', '2017-06-08 19:00:16'),
(192, 'd9afd7091a907794be48d70e32c3a2b4.jpg', 57, '2017-06-08 19:00:16', '2017-06-08 19:00:16'),
(193, '33590d960f565710bc3b66ad8492a56c.jpg', 62, '2017-06-10 00:33:55', '2017-06-10 00:33:55'),
(195, 'be332f4a9877317701714fab771a90bc.jpg', 62, '2017-06-10 03:36:46', '2017-06-10 03:36:46'),
(196, 'f8ac476e73a5e0ce15c02a999415a2fc.jpg', 62, '2017-06-10 03:36:46', '2017-06-10 03:36:46'),
(202, 'd89eb131701891227f136ca19a3de0fa.jpg', 53, '2017-07-08 02:25:27', '2017-07-08 02:25:27'),
(203, '0b29dc88949cb88ffa5de534d1c48241.jpg', 53, '2017-07-08 02:25:28', '2017-07-08 02:25:28'),
(205, '0fff5d072f785b03befc497d4f3fb7c1.jpg', 52, '2017-07-08 07:07:30', '2017-07-08 07:07:30'),
(206, '7ab5b5eef4beab5c129b1c32f0118a01.jpg', 52, '2017-07-08 07:07:30', '2017-07-08 07:07:30'),
(207, 'a028b5be21efe7c374b0ecdc50b40a52.jpg', 52, '2017-07-08 07:07:31', '2017-07-08 07:07:31'),
(208, '61ce245f82cc308ad8c54e1597af6852.jpg', 52, '2017-07-08 07:07:31', '2017-07-08 07:07:31'),
(209, 'd5cad076dfcf2e385c0f694a66f00f46.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(210, '28b07595e51ad7f1d9d24d96b24f4769.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(211, 'd78e58cd090bdbf12c85fc541f60efb1.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(212, '5ef00eb16c79dc017ce499e420c7ffa0.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(213, '1d08d1e86955d0815d6d07a0aa6306fb.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(214, '9f561d70c57d77cc9f4792b0e58a2f67.jpg', 51, '2017-07-08 07:27:00', '2017-07-08 07:27:00'),
(216, '22825cdf21b6912f37bc235a0aacd772.jpg', 48, '2017-07-09 07:33:26', '2017-07-09 07:33:26'),
(217, '0b834ef62c8dd61b6cdec9263a12ec41.jpg', 48, '2017-07-09 07:33:26', '2017-07-09 07:33:26'),
(218, 'd3fc6d0f5d0960bb9c57ecdbb5ce44b7.jpg', 48, '2017-07-09 07:33:27', '2017-07-09 07:33:27'),
(219, '97f02e3911b9a0fddb7e13a806d894fd.jpg', 48, '2017-07-09 07:33:27', '2017-07-09 07:33:27'),
(220, 'd44a7cc9107c40d4438766b72b12681c.jpg', 48, '2017-07-09 07:33:27', '2017-07-09 07:33:27'),
(221, '4f79ac491d1f4d03fb3c822372d94f35.jpg', 48, '2017-07-09 07:33:27', '2017-07-09 07:33:27'),
(229, '8ccc324ecf91aead73f624ab356fd533.jpg', 64, '2017-07-26 22:08:53', '2017-07-26 22:08:53'),
(230, '52b3e16c1af323f786277f883f826c1f.jpg', 64, '2017-07-26 22:11:26', '2017-07-26 22:11:26'),
(231, 'e1b0328d6ad647c3746b0773296430d9.jpg', 64, '2017-07-26 22:11:27', '2017-07-26 22:11:27'),
(232, '055c24e133fc2cb8fc7a76198070c897.jpg', 64, '2017-07-26 22:11:27', '2017-07-26 22:11:27'),
(233, '88e1856a6e2609d418b282c247c8a039.jpg', 64, '2017-07-26 22:11:27', '2017-07-26 22:11:27'),
(234, '1fdff47e7173dc97d87bb3e7c7ea7288.jpg', 64, '2017-07-26 22:11:27', '2017-07-26 22:11:27'),
(235, 'a880836b405e8e2a4693336856fcae6f.jpg', 59, '2017-07-26 23:17:25', '2017-07-26 23:17:25'),
(236, '4d29f8df186822bae3318bc4c0d8372f.jpg', 59, '2017-07-26 23:17:25', '2017-07-26 23:17:25'),
(237, '834169d7cd2f6d9aa016d3e48b2bbcc2.jpg', 59, '2017-07-26 23:17:25', '2017-07-26 23:17:25'),
(238, 'fb219f9e46ef0f4371561ac46993d095.jpg', 59, '2017-07-26 23:17:25', '2017-07-26 23:17:25'),
(239, 'cd76b88fdce923433d7d5d114930cea7.jpg', 63, '2017-07-27 01:27:42', '2017-07-27 01:27:42'),
(240, '098c528c41d9990cf6f5e8a5859a96c5.jpg', 63, '2017-07-27 01:27:42', '2017-07-27 01:27:42'),
(241, '26fbd442c4db2ff2862e523163978660.jpg', 63, '2017-07-27 01:27:43', '2017-07-27 01:27:43'),
(242, '28227d296bcabdcb0911ce527e5f5eca.jpg', 54, '2017-07-27 06:40:24', '2017-07-27 06:40:24'),
(243, '7d46b5bfb487a463ab1587dcb51ba5ba.jpg', 54, '2017-07-27 06:40:24', '2017-07-27 06:40:24'),
(244, '2eec5308a19a570b1377a56df02d32fb.jpg', 54, '2017-07-27 06:40:24', '2017-07-27 06:40:24'),
(245, 'fb624980e7d025e439157d65a5cbe6c1.jpg', 54, '2017-07-27 06:40:24', '2017-07-27 06:40:24'),
(246, '98d3d17db2b1cff867e2de147bdae261.jpg', 54, '2017-07-27 06:40:24', '2017-07-27 06:40:24'),
(247, 'baa9858e47f31ba2b4927491f990e924.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(248, '2853e83d5edaf8497f2db2ef76bc1531.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(249, 'c920218269cb2ace24ce703265e9616b.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(250, '368b999e9aba202f5809eb6deb051c71.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(251, '4b314f59142c384cb5569337bf9e0d0a.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(252, 'dbeb2573cdb7e7c44c5c3dc8fd50ea90.jpg', 47, '2017-07-27 06:54:38', '2017-07-27 06:54:38'),
(253, '2a547df6b6430a8f558548a1c450217a.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(254, '05a909fb8ef26bb061d2aab73a936763.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(255, 'f76eff49b0fd478ee34ab704bbaa3f62.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(256, '844557c6b8037417866d7c966c882ced.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(257, '866d28fc7292b51eb645f71a961892ca.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(258, '419768eb0d9e627d569b2c890d1dbfb6.jpg', 43, '2017-07-27 07:12:35', '2017-07-27 07:12:35'),
(259, 'b0cc28ae87d95705552b76bdb56707e4.jpg', 41, '2017-07-27 07:34:24', '2017-07-27 07:34:24'),
(260, '247c4c45b368c1a117f46c95e3143de3.jpg', 41, '2017-07-27 07:34:24', '2017-07-27 07:34:24'),
(261, 'cbdf8b38b5a9e440fe4b2eec4faab219.jpg', 41, '2017-07-27 07:34:25', '2017-07-27 07:34:25'),
(262, '841d0aa66ac2e6adf7edc824635b2660.jpg', 41, '2017-07-27 07:34:25', '2017-07-27 07:34:25'),
(263, '5f0304d392fcd1ccb0790d72cad9468a.jpg', 41, '2017-07-27 07:34:25', '2017-07-27 07:34:25'),
(264, 'e03503d83a33c0f8bf213a142b226b61.jpg', 41, '2017-07-27 07:34:25', '2017-07-27 07:34:25'),
(265, 'ab3272b4ae67dc306ddac2e75ed59551.jpg', 41, '2017-07-27 07:34:25', '2017-07-27 07:34:25'),
(266, '399b245a57249d6fd71a8602c8d97d30.jpg', 52, '2017-07-27 07:35:13', '2017-07-27 07:35:13'),
(267, '1a29fa297df7c833aede7be5a3eda2ab.jpg', 65, '2017-08-02 20:14:15', '2017-08-02 20:14:15'),
(269, 'c3db2a4484cebfe3192776869240107f.jpg', 65, '2017-08-02 20:14:16', '2017-08-02 20:14:16'),
(270, '2457d52e7abe8dd19e0169ddab2ad934.jpg', 65, '2017-08-02 20:14:16', '2017-08-02 20:14:16'),
(271, '6638700fc85f07571881745da6628a74.jpg', 65, '2017-08-02 20:14:16', '2017-08-02 20:14:16'),
(272, '9c2bba819a32d81df1b75d927d7fe3a4.jpg', 66, '2017-08-03 21:45:04', '2017-08-03 21:45:04'),
(273, '436e2c386082c19a1e1be3a7b9a96e62.jpg', 66, '2017-08-03 21:45:04', '2017-08-03 21:45:04'),
(274, '0f3ca68e13f004b93cf66f6868eaffd6.jpg', 66, '2017-08-03 21:45:04', '2017-08-03 21:45:04'),
(275, '12d56cd794d919ca3cb740e0aaf3ecdd.jpg', 66, '2017-08-03 21:45:04', '2017-08-03 21:45:04'),
(276, 'f86514ff0f62c1691606275cc20a2acd.jpg', 67, '2017-08-08 20:55:19', '2017-08-08 20:55:19'),
(277, 'c2a928cb545ad5484aaf62978fd1d53e.jpg', 67, '2017-08-08 20:55:19', '2017-08-08 20:55:19'),
(278, '72ac637436ef1db274381d61e94c6b37.jpg', 67, '2017-08-08 20:55:19', '2017-08-08 20:55:19'),
(279, '13ee7837a30213a407633d51f3aac0b5.jpg', 67, '2017-08-08 20:55:19', '2017-08-08 20:55:19'),
(280, '0f040f35868414e396ce76a74647d9fd.jpg', 68, '2017-08-08 22:00:01', '2017-08-08 22:00:01'),
(281, 'a2ff340827972091c2f4bd29065a084a.jpg', 68, '2017-08-08 22:00:01', '2017-08-08 22:00:01'),
(282, 'fde86d894705a3d665f3d8ec0e8cd972.jpg', 68, '2017-08-08 22:00:02', '2017-08-08 22:00:02'),
(283, '25bbe6bc6e43a92abd0557e82613883e.jpg', 68, '2017-08-08 22:00:02', '2017-08-08 22:00:02'),
(284, '09b62d6ac7438569b5b99d6cff28fc96.jpg', 68, '2017-08-08 22:00:02', '2017-08-08 22:00:02'),
(285, '9bf573c33ee171ec01d86b8ed3cf4546.jpg', 68, '2017-08-08 22:00:02', '2017-08-08 22:00:02'),
(286, 'eefed009b8622d232b1c8d7a63b65c30.jpg', 68, '2017-08-08 22:00:03', '2017-08-08 22:00:03'),
(287, '7549daccc957d03f84f29ff6b4fc6aab.jpg', 68, '2017-08-08 22:00:03', '2017-08-08 22:00:03'),
(288, 'c6c6d8b9b29578fe28bea12bd41d8c7a.jpg', 68, '2017-08-08 22:00:03', '2017-08-08 22:00:03'),
(289, 'fbdc388165b8ca5af877a26755314b37.jpg', 68, '2017-08-08 22:00:04', '2017-08-08 22:00:04'),
(290, '6cee79c390860ef32655e1c78c5fd7b2.jpg', 60, '2017-08-08 22:01:52', '2017-08-08 22:01:52'),
(291, '6085fe953044278cd7dda0c69cf361b6.jpg', 60, '2017-08-08 22:01:52', '2017-08-08 22:01:52'),
(292, '976bf22fca1b93006e308dd175d5eee8.jpg', 60, '2017-08-08 22:01:52', '2017-08-08 22:01:52'),
(293, 'f4e7c5cf544db7e80ab1cf4c6274cfb4.jpg', 60, '2017-08-08 22:01:52', '2017-08-08 22:01:52'),
(298, 'cac851d9d7898f7b2cf4eba1b0748ad9.jpg', 69, '2017-08-10 04:02:18', '2017-08-10 04:02:18'),
(299, 'ac290b09ab631e7e7e4c93d1b35dac6e.jpg', 69, '2017-08-10 04:02:19', '2017-08-10 04:02:19'),
(300, 'd629a73f592c5d878c68aa8e05edc70b.jpg', 69, '2017-08-10 04:02:19', '2017-08-10 04:02:19'),
(301, '9abc20e288b6e551810af3d1ba91366a.jpg', 69, '2017-08-10 04:02:19', '2017-08-10 04:02:19'),
(302, '6fc16319ac8b2e7c7e719096547b926c.jpg', 69, '2017-08-10 04:02:19', '2017-08-10 04:02:19'),
(303, '6788e5c48da4bf6ad801d76816de022e.jpg', 69, '2017-09-25 22:04:59', '2017-09-25 22:04:59'),
(304, '894d61f866ee375dec3d41d055bf40ea.jpg', 70, '2017-10-13 05:10:14', '2017-10-13 05:10:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'DiseñoGrafico ', '2017-01-27 11:37:53', '2017-01-27 11:37:53'),
(4, 'IdentidadCorporativa ', '2017-01-27 11:38:10', '2017-01-27 11:38:10'),
(5, 'PapeleriaComercial', '2017-01-27 11:38:23', '2017-01-27 11:38:23'),
(6, 'CarpetaEmpresarial', '2017-01-27 11:38:40', '2017-01-27 11:38:40'),
(7, 'Flyer', '2017-01-27 11:38:54', '2017-01-27 11:38:54'),
(8, 'Publicidad', '2017-01-27 11:39:03', '2017-01-27 11:39:03'),
(9, 'Folleto', '2017-01-27 11:39:14', '2017-01-27 11:39:14'),
(10, 'Brochure', '2017-01-27 11:39:25', '2017-01-27 11:39:25'),
(11, 'RedesSociales ', '2017-01-27 11:39:37', '2017-01-27 11:39:37'),
(12, 'DiseñoCatálogo ', '2017-01-27 11:39:51', '2017-01-27 11:39:51'),
(13, 'Ilustracion', '2017-01-27 11:40:08', '2017-01-27 11:40:08'),
(14, 'IlustracionVectorial ', '2017-01-27 11:40:30', '2017-01-27 11:40:30'),
(15, 'Infografia', '2017-01-27 11:40:40', '2017-01-27 11:40:40'),
(16, 'Etiqueta', '2017-01-27 11:40:48', '2017-01-27 11:40:48'),
(17, 'HTML5', '2017-01-27 11:40:57', '2017-01-27 11:40:57'),
(18, 'CSS3', '2017-01-27 11:41:07', '2017-01-27 11:41:07'),
(19, 'SitioResponsivo', '2017-01-27 11:41:16', '2017-01-27 11:41:29'),
(20, 'Fotografía', '2017-02-03 19:35:34', '2017-02-03 19:35:34'),
(21, 'Logos', '2017-02-09 01:19:01', '2017-02-09 01:19:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `role` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `group`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leandro', 'javzero', 'javzero@hotmail.com', '$2y$10$uNAZs0qN8F4.IPLnA6ye4OyTaFo1zH/8zblzBhgSzAqcizGT45Dgm', '1', '1', 'javzero.jpg', 'o4uDkMgXo5bjql2FT1fkfWMcXgt0bl87cFiKogQYz3M6KTGF7ZTpciBvQgE4', '2017-09-22 22:37:03', '2017-10-11 02:00:37'),
(2, 'Giuseppe Balistreri', 'Bonnie Treutel DVM', 'bernier.vaughn@example.org', '$2y$10$RqjboWJUBIyJ.Fx2d7GNBeh7lYQWvKf9rIS8H5HEz6AXrzI8kOSKq', '2', '3', 'Bonnie Treutel DVM.jpg', 'piYXxPe82h', '2017-09-22 22:37:32', '2017-10-04 11:29:47'),
(33, 'Barbara Parker', 'Terrance Hoeger', 'houston.funk@example.org', '12121212', '3', '3', 'default.jpg', 'JChrsvSTr0', '2017-09-24 11:16:32', '2017-09-25 02:09:02'),
(61, 'Dr. Deshaun Hilll', 'Evert Koelpin', 'lauriane.kautzer@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'o5IGvVbH1M', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(62, 'Arne Flatley', 'Dr. Travis Zulauf', 'kutch.leta@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '4SKA6dl9Q9', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(63, 'Rodolfo McGlynn', 'Samara Kessler', 'gilberto04@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'FNM4vk2V11', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(66, 'Ryder Blick', 'Hallie Schiller', 'doconnell@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'AwSbUaqJ1Y', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(67, 'Nedra Beahan', 'Toni Fisher', 'brianne.oreilly@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'MZt6D6lrqz', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(68, 'Cesar Nikolaus', 'Kade Wyman IV', 'chaya.nitzsche@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 's8sXHKCW1r', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(69, 'Jayne Pfannerstill', 'Victoria Corkery', 'burnice.lubowitz@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'qn4qcm6lFT', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(70, 'Elijah Boyer DVM', 'Eliane Kiehn', 'reynolds.lesley@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'sPnYBSk8KN', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(71, 'Mrs. Verona Mraz Sr.', 'Ms. Kristin Mayert DDS', 'mcollins@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'v1iNFCUOMk', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(72, 'Prof. Clemens Becker Jr.', 'Destiny Lowe', 'lisandro.jenkins@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'QaEVHWiAR1', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(73, 'Elissa Hauck', 'Dr. Layla Kris Sr.', 'cwiegand@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'p2pR0HnpRX', '2017-09-24 22:05:07', '2017-09-24 22:05:07'),
(74, 'Tyler Block', 'Constantin Johnston', 'lebert@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'V6DRxVzmOs', '2017-09-25 00:53:53', '2017-09-25 00:53:53'),
(75, 'Dr. Arely Konopelski', 'Mrs. Nyah Bergnaum MD', 'jamar75@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'ARuM6pQrIG', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(76, 'Emmalee Leannon', 'Ms. Sylvia Harris', 'krodriguez@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'tzJWt4jxzL', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(77, 'Gretchen Zemlak', 'Beaulah Lemke Sr.', 'luis.kunde@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'l5vsSl2ox0', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(78, 'Dr. Delilah Wyman', 'Prof. Freida Doyle', 'edgardo55@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'mwZmPpTCX1', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(79, 'Dr. Carol Stiedemann DVM', 'Elva Corwin IV', 'hkshlerin@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'fjOsHdhgD8', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(80, 'Lilliana Zieme', 'Kennedi Abbott', 'tristian.haag@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'jHhrSx0cRC', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(81, 'Ms. Belle Herzog', 'Ethyl Harris', 'rodriguez.baron@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '3zxb14eSGh', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(82, 'Lysanne O\'Reilly', 'Ms. Marcia Connelly', 'mayert.emely@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'yDnjCdXelr', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(83, 'Miss Asa Kerluke III', 'Alize Bogan', 'jay.gleichner@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'q9ieuvhHq2', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(84, 'Howard Ziemann', 'Chanelle Stanton', 'jaylon.larkin@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '49dyPA3KVc', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(85, 'Trisha Carroll', 'Prof. Israel Hand II', 'camila01@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '8GQpbtmG9n', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(86, 'Edgardo Baumbach', 'Mr. Hilton Armstrong III', 'vicky.waters@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '9XQzF2qvig', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(87, 'Muhammad Block', 'Leonie Goyette', 'yjacobs@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'QZaAbNNTp6', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(88, 'Jarrell Cassin', 'Stephen Kuphal', 'mayer.jefferey@example.net', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'Xr53fF4xrW', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(89, 'Lesly Robel', 'Celestine O\'Kon', 'hmaggio@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'ty3EP4Gt58', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(90, 'Nathanial Lindgren', 'Jeffery Jacobs', 'filomena25@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'fyoQWrn5Fe', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(91, 'Shawn Wuckert DDS', 'Brain Dare I', 'cmedhurst@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'GHAmDotnhO', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(92, 'Hillary Mitchell', 'Ora Prohaska Sr.', 'weimann.jaylin@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'qS7epZ50X5', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(93, 'Adele Torphy', 'Mr. Randy Huels', 'hamill.tressie@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'EefLB9fRdJ', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(94, 'Ms. Shanny Koelpin II', 'Wendy Braun', 'clare.nitzsche@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'K8BTa8neZP', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(95, 'Sienna Rowe', 'Mr. Howell Schneider', 'giovani.gerlach@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'Nw5NvljIkI', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(96, 'Alejandra Schoen II', 'Miss Augustine Schamberger', 'lebsack.milan@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'wsPpESWXR7', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(97, 'Jimmy Nader', 'Marion Mitchell', 'hwolff@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'OEuqtvfytq', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(98, 'Elda Gerhold', 'Stacy Feest', 'zulauf.marcella@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'Ltz67LfZnY', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(99, 'Ewald Hermiston I', 'Mr. Reynold Witting', 'hallie45@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'u2iNEaLpsW', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(100, 'Ayden Shields', 'Rylan Schimmel', 'meichmann@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', 'PMKcTeaLJU', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(101, 'Lyda Ziemann', 'Madonna Mitchell', 'sawayn.gerardo@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '8biVcR0zz6', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(102, 'Torey Spencer V', 'Madelynn Ebert', 'june21@example.com', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '2jd5t0AuP2', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(103, 'Danial Kulas', 'Stefanie Monahan II', 'harris.maryjane@example.org', '$2y$10$.V8BN0NQmdHjJlZtlWZ//uuaa.zyvA23qFw7Xbf5Gzto31dvsq26W', '2', '3', 'default.jpg', '3XyUiXv4Ka', '2017-09-25 00:53:54', '2017-09-25 00:53:54'),
(104, 'ddasdas', 'dasda', 'dasdsa@dsdsc.com', '12121212', '1', '3', 'default.jpg', NULL, '2017-10-01 03:40:52', '2017-10-01 03:40:52'),
(105, 'teto', 'teto', 'teto@hotmail.com', '12121212', '1', '1', 'default.jpg', NULL, '2017-10-01 03:41:10', '2017-10-01 03:41:10'),
(106, 'teto2', 'teto2', 'javzero1@gmail.com1', '12121212', '1', '1', 'default.jpg', NULL, '2017-10-01 03:42:59', '2017-10-01 03:42:59'),
(107, 'dasd', 'das', 'admindsdas@dsd.com', '$2y$10$D4lhT9zRHtv6jXe6F6k0ouU0Cw19tIQEfu6LTpKuiiacloGm4nJ.e', '3', '2', 'default.jpg', 'hKWka8wq72sSuUaNL3FzWvVNg7xH5emDzd2Na0NgmBS7E8vSP208EVv1Rybm', '2017-10-01 03:44:01', '2017-10-01 03:44:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_tag_article_id_foreign` (`article_id`),
  ADD KEY `article_tag_tag_id_foreign` (`tag_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_article_id_foreign` (`article_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
