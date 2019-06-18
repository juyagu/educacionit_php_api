create schema catalogo2;

use catalogo2;
--
-- Base de datos: `catalogo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'Teléfonos Celulares'),
(2, 'Televisores'),
(3, 'Sistemas de Audio y Video'),
(4, 'GPS'),
(5, 'Tablet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `prd_id` int(3) NOT NULL AUTO_INCREMENT,
  `prd_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `prd_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `prd_precio` int(5) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `prd_alta` date NOT NULL,
  `prd_foto1` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'sin-foto.png',
  `prd_foto2` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'sin-foto2.png',
  PRIMARY KEY (`prd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`prd_id`, `prd_nombre`, `prd_descripcion`, `prd_precio`, `cat_id`, `prd_alta`, `prd_foto1`, `prd_foto2`) VALUES
(1, 'Iphone 4s 16gb', 'Teléfono celular Apple iPhone 4S de 16GB. Wifi, 3g, Gps, cámara de 8mp, pantalla HD (retina display) de 3.5 pulgadas.\r\nLibre de fábrica.\r\nIOS 5, procesador A5 dual core, doble cámara, sistema de control por voz Siri.', 4400, 1, '2012-01-05', 'iphone4s.png', 'sin-foto2.png'),
(2, 'Samsung Galaxy S2', 'Teléfono celular 3g, Wifi, Android 2.3 Dual Core 1.2ghz, 16gb, Pantalla 4.27 pulgadas Super Amoled Plus.', 2650, 1, '2012-01-07', 'galaxy-s1.png', 'sin-foto2.png'),
(3, 'Samsung Galaxy S', 'Teléfono celular con procesador ARM Cortex-A8 de 1 GHz, pantalla de 4 pulgadas con tecnología Super Clear LCD, 4Gb, cámara de 5 MP, Wifi, 3g.', 1600, 1, '2012-01-10', 'galaxy-s2.png', 'sin-foto2.png'),
(4, 'HTC INSPIRE 4g', 'Teléfono celular con procesador Qualcomm de 1Ghz, 36gb, Gps, Wifi, 3g, pantalla SUPER LCD 4.3 pulgadas, Android 2.2 Froyo con HTC Sense.', 3026, 1, '2012-01-10', 'htc-inspire.png', 'sin-foto2.png'),
(5, 'Televisor Led Samsung Un55c9000 ', 'Televidor Led de 55 pulgadas, 3D, resolución: 1920 x 1080, Full HD, Anynet+ (HDMI-CEC), Internet@TV, Skype on Samsung TV, Ethernet (LAN) x 1, WiFi Adaptor Support', 25900, 2, '2012-01-16', 'samsung-Un55c9000.png', 'sin-foto2.png'),
(6, 'Televisor Led Samsung Un40c7000', 'Televidor Led de 40 pulgadas, 3D, resolución: 1920 x 1080, Full HD, Anynet+ (HDMI-CEC), Internet@TV, Skype on Samsung TV, Ethernet (LAN) x 1, WiFi Adaptor Support', 11100, 2, '2012-01-16', 'samsung-Un40c7000.png', 'sin-foto2.png'),
(7, 'Televisor LED Sony Bravia KDL-46EX715', 'Televisor LED Sony 46 pulgadas, Full HD 1080p, BRAVIA Engine 3, Motionflow 120Hz, Wireless LAN Ready, Reproductor USB.', 10799, 2, '2012-01-25', 'Sony-Bravia-KDL-46EX715.png', 'sin-foto2.png'),
(8, 'Apple Tv 2', 'Apple Tv2 Hdmi Wi-fi Wireless C/ Apple Remote, procesador A4 de 1GHz, Airplay Mirroring, Photo Stream, compatible con iCloud.\r\nControlá tu multimedia con al Apple Remote o desde tu iPhone, iPad o iPod.', 850, 3, '2012-01-30', 'appleTV1.png', 'sin-foto2.png'),
(9, 'Apple Tv', 'Apple Tv2 Hdmi Wi-fi Wireless C/ Apple Remote, procesador Intel Pentium M de 1GHz, Airplay Mirroring, Photo Stream, compatible con iCloud.\r\nControlá tu multimedia con al Apple Remote o desde tu iPhone, iPad o iPod.', 450, 3, '2012-01-30', 'appleTV2.png', 'sin-foto2.png'),
(10, 'Bose Sounddock 10', 'Sistema De Musica Digital Bose Sounddock 10 Para Ipod/iphone. DockStation.\r\nCompatible con las nuevas líneas de iPhone y de iPod. Bluetooth. Salida de video a un televisor o monitor.', 4500, 3, '2012-01-30', 'Bose-SoundDockr-10.png', 'sin-foto2.png'),
(11, 'Garmin Nuvi 1490t', 'Gps Garmin Nuvi 1490t. Pantalla Lcd de 5 pulgadas,  Bluetooth, 4Gb internos de memoria, admite tarjetas de memoria microSD.  ', 1100, 4, '2012-02-01', 'garmin.png', 'sin-foto2.png'),
(12, 'iPad 2 de 32GB Wifi', 'iPad 2 de 32 GB: pantalla de led retroiluminada de 9.7 pulgadas, \r\nWifi, Bluetooth, doble cámara; frontal y trasera.\r\nIOS 5, procesador A5 dual core.\r\nMultitouch. Airplay Mirroring, compatible con iCloud, Facetime, Airprint ', 3650, 5, '2012-02-01', 'iPad2.png', 'sin-foto2.png'),
(13, 'Samsung Galaxy Tab', 'Samsung Galaxy Tab de 16gb, pantalla de 10 pulgadas, Wifi, procesador NVIDIA Tegra 2 Dual Core 1Ghz, doble cámara.', 3450, 5, '2012-02-08', 'galaxy-tab.png', 'sin-foto2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(1) NOT NULL AUTO_INCREMENT,
  `usu_login` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_login` (`usu_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_login`, `usu_clave`, `usu_nombre`, `usu_email`) VALUES
(1, 'admin', 'admin', 'Administrador del Sistema', 'admin@sistema.com');
