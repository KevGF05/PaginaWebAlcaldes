-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2025 a las 02:49:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo_alcaldes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcaldes`
--

CREATE TABLE `alcaldes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `frase` text DEFAULT NULL,
  `periodo` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `orden` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alcaldes`
--

INSERT INTO `alcaldes` (`id`, `nombre`, `descripcion`, `frase`, `periodo`, `imagen`, `orden`) VALUES
(8, 'Don Guillermo J. Bain', 'Tras los acontecimientos previos, las autoridades civiles y militares de El Negrito se reunieron el primero de enero de 1983 en un acto que marcaría el futuro de la región. El infrascrito jefe del distrito del círculo de El Negrito se presentó ante el cabildo de la aldea, y antes de ser juramentado por el Sr. Tránsito Rodríguez, entonces alcalde de El Negrito, Yoro, el Sr. Guillermo J. Baín hizo una petición histórica: que el nombre del nuevo municipio, hasta entonces conocido como Río Pelo, fuera cambiado a El Progreso. La propuesta fue aceptada por unanimidad, sellando así su identidad para las generaciones venideras.\r\nDon Guillermo J. Baín, quien se desempeñaba como cónsul de Inglaterra en Puerto Cortés, conocía bien las vastas riquezas forestales de la aldea de Río Pelo. Tras recorrer las aguas del Río Ulúa y adentrarse unos dos kilómetros, llegó a la comunidad, sorprendiendo a sus habitantes. Sin embargo, estos lo recibieron con generosidad. Junto a su esposa, Ramona Leiva Guillén, una de las primeras médicas de la región, Baín no solo impulsó el desarrollo económico, sino que también atendió las necesidades sanitarias de los trabajadores y pobladores.\r\nEste período fundacional estuvo dedicado por completo a sentar las bases institucionales de El Progreso. Las primeras acciones reflejaron un claro compromiso con el desarrollo ordenado: se conformaron comisiones para la delimitación territorial, se emitió un voto de felicitación al flamante municipio, y las autoridades electas viajaron a El Negrito para un acto solemne de juramentación, donde asumieron el compromiso de guiar los destinos de la localidad con apego a la ley. Paralelamente, se establecieron los cimientos materiales y sociales del progreso: se designó un comité para la construcción del edificio municipal y del rastro público, se organizaron escuelas para ambos sexos el 16 de abril, y se implementaron las primeras normativas electorales para garantizar procesos democráticos en los futuros comicios. Cada una de estas medidas, ejecutadas con visión de futuro, no solo fortaleció la estructura administrativa, sino que proyectó los valores de orden, equidad y desarrollo que definirían la identidad del municipio en los años venideros.', 'desarrollo que definirían la identidad del municipio en los años venideros', '1893', 'Imagenes/Alcaldes/685f336f90c7d_1.png', 1),
(9, 'Don Ramon Lleset', 'Don Ramon Lleset, de origen español, fue el segundo alcalde de El Progreso y uno de los principales impulsores de la creación del municipio. Durante su gestión, destacó por su visión progresista y su compromiso con el desarrollo comunitario, materializado en importantes obras públicas. Entre sus logros más significativos se encuentra la organización del sistema educativo local, donde demostró especial interés por la equidad formativa. El 16 de abril formalizó este avance al nombrar a Don Pascual Villanueva como director de la escuela de varones y a la señorita Mercedes Díaz como directora de la escuela de niñas, sentando así las bases de una educación estructurada e inclusiva para las futuras generaciones de El Progreso.\r\nSu gestión también priorizó el desarrollo agrícola, impulsando activamente el cultivo de huertas y brindando apoyo decisivo a los ganaderos locales. Entre sus proyectos visionarios figuraba la construcción de una iglesia, iniciativa que debió suspenderse debido al conflicto bélico de 1894. Este contexto histórico se vio marcado por el arribo de una fuerza expedicionaria a Bluff el 5 de enero de 1984, destinada a reforzar la soberanía hondureña durante la sublevación en La Moskitia, donde el General Cabezas jugó un papel protagónico en la defensa territorial.\r\nDurante esta administración municipal se priorizó con especial dedicación el buen funcionamiento del sistema educativo, al tiempo que se emprendió una completa remodelación del cabildo municipal. Como muestra de su compromiso social, el 15 de octubre se destinaron solares de 25 varas cuadradas a familias afectadas por las devastadoras inundaciones del Río Ulúa, complementando esta ayuda con la construcción de viviendas en zonas más seguras de la ciudad. ', 'construcción de viviendas en zonas más seguras de la ciudad. ', '1894-1906', 'Imagenes/Alcaldes/685f339da10fb_2.jpg', 1),
(10, 'Don José Melecio Velásquez', 'Don José Melecio Velásquez, tercer alcalde del municipio y director fundador de la primera escuela mixta de la ciudad, nació en El Negrito, Yoro, siendo hijo de Don Victoriano Velásquez y Doña María de los Ángeles Meza. Tras formarse académicamente en Comayagua, se convirtió en el primer tesorero del Ayuntamiento de Progreso. Su primera gestión municipal se caracterizó por un enfoque administrativo centrado en fortalecer el sistema educativo y las finanzas públicas, sentando las bases para futuras obras de mayor envergadura.\r\nSu destacada carrera pública incluyó múltiples roles: Diputado a la Asamblea Constituyente, representante al Congreso en 1925, Síndico Municipal y alcalde de Progreso. Fue precisamente en su condición de legislador que impulsó la creación oficial del Municipio de Progreso. Como próspero agricultor, administraba la finca \'Buenos Aires\' con una producción anual de 40,000 racimos de banano, experiencia que complementó con su labor como administrador de rentas en Tela y Puerto Castilla, donde cultivó valiosas relaciones institucionales.\r\nEntre sus obras emblemáticas destacan la construcción del primer edificio municipal -instalado provisionalmente en la residencia de Don Eusebio López, cercana a la actual ubicación del Parque Ramón Rosa- y el rastro público. Mantuvo puntualmente los salarios docentes, reconociendo su importancia social, mientras consolidaba la infraestructura básica del naciente municipio.\r\nDemostrando solidaridad internacional, su gobierno coordinó ayuda para las víctimas de los terremotos en El Salvador mediante una comisión especial integrada por Julio Flores, Fernando Garay y Enrique Panchame. Su obra de ingeniería más relevante fue el terraplén del Río Ulúa, ejecutado con una inversión de 1,723 pesos de plata en colaboración con la Tela Railroad Company.\r\nReelecto por la confianza ciudadana en su probidad, Velásquez amplió la cobertura educativa contratando más maestros para zonas urbanas y rurales. Durante este periodo, el Dr. Gabriel R. Aguilar vacunó gratuitamente a 400 niños afectados por epidemias, gesto que la municipalidad reconoció con un voto de gratitud y compensación económica\r\nEn su última gestión se ejecutaron obras trascendentales: el mercado público, trece puentes en la ruta a Guaymitas y seis en Agua Blanca Sur. El legado urbano se enriqueció con la donación de terrenos por parte del Sr. Manuel M. García, donde se erigieron la Escuela San José y el desaparecido Jardín de Niños Manuel García Ponce.', 'Demostrando solidaridad internacional', '1895-1901-1915-1919-1940', 'Imagenes/Alcaldes/685f33ddb1884_4.jpg', 1),
(11, 'Juan Blas Tobías', 'Hombre pacifista y trabajador, durante su mandato logró mantener una estabilidad social notable mientras impulsaba importantes obras de desarrollo local. Entre sus realizaciones destacaron la construcción de puentes, la rehabilitación de los caminos rurales de Arena Blanca y Las Guanchias, y —como obra especialmente significativa— la remodelación del cementerio municipal. Bajo su liderazgo, el primero de octubre la corporación municipal llevó a Progreso a participar en la Exposición Maderera Centroamericana celebrada en Guatemala, proyectando así el potencial económico de la región.\r\nSu administración culminó con dos contribuciones perdurables: la mejora del cementerio con alambre de púas tuvo un costo de 42 pesos— y, especialmente, la histórica disposición del 15 de diciembre de 1899. Ese día ordenó a los secretarios municipales custodiar bajo estricta responsabilidad judicial el Archivo Municipal, medida visionaria que hoy nos permite reconstruir con fidelidad la memoria histórica de la localidad. Estas acciones reflejaron su doble compromiso con el progreso material y la preservación institucional.', 'Hombre pacifista y trabajador', '1896-1899', 'Imagenes/Alcaldes/685f342bd1e85_5.jpg', 1),
(12, 'Don Manuel Ismael Moya Amaya', 'Esta administración demostró especial compromiso con la educación, elevando a veinte pesos mensuales el salario de los maestros, reconociendo así su labor fundamental. El primero de abril, el alcalde formalizó un acuerdo con el Sr. Casimiro Cruz para la apertura del camino que conectaría la ciudad con el puerto de Tela, obra estratégica para el desarrollo comercial. Con una inversión de ochenta pesos, el proyecto se completó en un plazo de dos meses, cumpliendo rigurosamente con lo pactado. Como hito adicional, el seis de septiembre quedó inaugurado el telégrafo nacional, marcando un avance revolucionario en las comunicaciones locales y vinculando a El Progreso con el resto del país.\r\n\r\nAunque esta administración municipal no ejecutó obras de gran envergadura, se distinguió por preservar el patrimonio territorial - a diferencia de gestiones anteriores que habían enajenado tierras. El 15 de marzo formalizó un contrato de arrendamiento por cinco años de aproximadamente 150 manzanas de terreno a los señores Juan F. Duffies, Emilio Arndt y don Augusto Chong, estableciendo un canon anual de 25 centavos por manzana y garantizando la plena recuperación del dominio municipal al término del acuerdo. Paralelamente, como parte de la modernización administrativa, se encargó al señor Juan E. Milla la confección de los seis sellos oficiales de la municipalidad, los cuales entraron en uso protocolario el 30 de diciembre, marcando un hito en la institucionalidad local.\r\n\r\nPese a significativas limitaciones financieras, esta administración municipal concretó relevantes obras públicas, entre ellas el edificio municipal —inaugurado el 15 de septiembre—, priorizó el fortalecimiento de la Educación Primaria e impulsó la apertura de caminos en zonas rurales', 'Esta administración demostró especial compromiso con la educación', '1898-1905-1909', 'Imagenes/Alcaldes/685f347ee346f_6.jpg', 1),
(13, 'Don Raimundo Panchame', 'Esta corporación municipal posiblemente representó una de las administraciones más destacadas en la historia de Progreso. Sus rentas públicas fueron manejadas con absoluta transparencia, según consta en las actas de la época. Don Raimundo impulsó significativamente la educación, contando con el valioso aporte de la profesora titulada Hortencia de Contreras como directora de la escuela de niñas y del perito mercantil Felipe Contreras como director de la escuela de varones, ambos con un salario mensual de sesenta pesos.\r\n\r\nEsta administración marcó un hito al proteger definitivamente las tierras ejidales, convocando a una asamblea popular para decidir su destino. El sello distintivo de Don Raimundo fue su compromiso con una educación íntegra; el 10 de enero alquiló una propiedad de Don David Abogabir por veinticinco pesos mensuales, y posteriormente regularizó el pago de ciento setenta y siete pesos adeudados a los docentes varones.\r\n\r\nEl 16 de abril se estableció un programa integral de apoyo a la agricultura mediante fondos municipales y asistencia técnica. Paralelamente, el alcalde asumió un firme compromiso con el ideal unionista centroamericano, respaldando activamente esta causa.', 'Esta administración marcó un hito al proteger definitivamente las tierras ejidales', '1910-1917', 'Imagenes/Alcaldes/685f3bc2d4cc3_7.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL CHECK (`calificacion` between 1 and 5),
  `comentarios` text DEFAULT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` enum('activo','finalizado','cancelado') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo_imagen` varchar(255) DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `titulo`, `descripcion`, `archivo_imagen`, `fecha_subida`) VALUES
(7, 'Museo', 'Museo', 'MuseoExterno/ENCABEZADO.jpeg', '2025-06-26 02:13:23'),
(8, 'Museo', 'Museo', 'MuseoExterno/MuseoExterno.jpg', '2025-06-26 02:15:40'),
(9, 'Museo', 'Museo', 'MuseoExterno/MuseoExterno1.jpg', '2025-06-26 02:15:57'),
(10, 'Museo Interno', 'Museo Interno', 'MuseoInterno/MuseoInterno1.jpg', '2025-06-26 02:16:49'),
(13, 'Museo', 'Museo Interno', 'MuseoExterno/MuseoInterno3.jpg', '2025-06-26 03:23:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_eventos`
--

CREATE TABLE `inscripciones_eventos` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(100) NOT NULL,
  `segundo_nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


CREATE TABLE `respuestas_satisfaccion` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `evento_id` INT NOT NULL,
  `calificacion` INT NOT NULL,
  `comentarios` TEXT,
  `mejoras` TEXT,
  `volver` VARCHAR(20),
  `fecha` TIMESTAMP DEFAULT current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `asistencia` tinyint(1) DEFAULT 0,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`, `fecha_registro`) VALUES
(1, 'admin', 'adminpc123@gmail.com', '$2y$10$ZXDWEtyh2YrlA9claXz7jOCs6Rr1plWDOe.0km82oC7BvwDXKVNvu', 'admin', '2025-06-23 21:13:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alcaldes`
--
ALTER TABLE `alcaldes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones_eventos`
--
ALTER TABLE `inscripciones_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- Indices de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alcaldes`
--
ALTER TABLE `alcaldes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inscripciones_eventos`
--
ALTER TABLE `inscripciones_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `encuestas_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`);

--
-- Filtros para la tabla `inscripciones_eventos`
--
ALTER TABLE `inscripciones_eventos`
  ADD CONSTRAINT `inscripciones_eventos_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD CONSTRAINT `registros_eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `registros_eventos_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



