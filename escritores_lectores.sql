-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 09:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escritores_lectores`
--
CREATE DATABASE IF NOT EXISTS `escritores_lectores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE  `escritores_lectores`;
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `textId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `textId`, `user_id`, `comment_text`, `created_at`) VALUES
(11, 36, 38, 'Me ha gustado', '2023-11-08 18:04:04'),
(12, 40, 38, 'Buen texto', '2023-11-08 18:04:27'),
(13, 36, 40, 'Lamentable', '2023-11-08 18:25:48'),
(14, 32, 40, 'Muy bien redactado', '2023-11-08 18:26:06'),
(15, 40, 39, 'No me ha gustado', '2023-11-08 18:29:00'),
(16, 32, 39, 'Grandioso', '2023-11-08 18:29:17'),
(17, 39, 39, 'crack', '2023-11-08 19:01:00'),
(18, 39, 39, 'dkowjiejf', '2023-11-08 19:01:08'),
(22, 40, 39, 'Pienso hacer esa receta esta misma noche ', '2023-11-13 18:17:27'),
(23, 40, 39, 'bien', '2023-11-13 18:22:23'),
(24, 32, 39, 'god', '2023-11-13 18:25:03'),
(25, 32, 39, 'Buen texto tio!!', '2023-11-13 18:31:57'),
(26, 36, 39, 'nice', '2023-11-13 18:41:35'),
(27, 33, 39, 'AWESOME', '2023-11-13 18:41:55'),
(28, 42, 39, 'Pretty', '2023-11-13 18:42:32'),
(29, 41, 39, 'Fabuloso', '2023-11-13 19:31:21'),
(30, 43, 39, 'Muy buen texto bro!!!!', '2023-11-13 19:31:47'),
(33, 39, 38, 'Buenisimo', '2023-11-14 18:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `ruta`, `user_id`) VALUES
(1, 'ruta/donde/guardar/las/imagenes/user_.jpg', NULL),
(2, 'C:\nmpphtdocsscritores_lectoresimagenesuser_.jpg', NULL),
(3, 'C:\nmpphtdocsscritores_lectoresimagenesmessi.jpeguser_.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `textId` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `userId` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `privacy` enum('public','private') NOT NULL DEFAULT 'public',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`textId`, `description`, `content`, `userId`, `genre`, `privacy`, `date`) VALUES
(32, 'RECETA PASTA CARBONARA', 'Preparación:\r\n1 - Cortamos la papada (o la panceta) en pequeñas tiras y las doramos en una sartén, a fuego muy lento, para que queden ligeramente crujientes, pero sin llegar a secarse.\r\n2 - Batimos los huevos con un tenedor en un cuenco grande (que utilizaremos para servir la pasta), junto a los quesos rallados y a una cantidad generosa de pimienta recién molida, hasta darle una consistencia cremosa.\r\n3 - Cocemos la pasta en agua hirviendo con sal, la escurrimos y la añadimos al cuenco con la crema de huevos, quesos y pimienta sin parar de remover.\r\n4 - Una vez mezclada, añadimos la papada (o panceta) caliente y, si es necesario, algunas cucharadas del agua de cocción de la pasta, que habremos reservado antes.\r\n5 - El calor de la pasta y de la panceta será suficiente para darle a la crema la consistencia ideal, sin que el huevo llegue a cuajar del todo y por lo tanto sin secarse.\r\n6 - En el momento de servir en cada plato, se puede añadir más queso rallado y más pimienta.', 38, 'Food', 'public', '2024-03-01 10:34:27'),
(33, 'ODA A LOS MARINEROS', 'Oda al viejo Marinero (Rime of the ancient Mariner) es una balada del romanticismo inglés que nos da un mensaje de la necesidad de amor de todas las criaturas. La historia de un viejo Marinero que nos cuenta su viaje hacia el polo Sur donde los marineros violan la hospitalidad de un albatros y a partir de allí se desencadena una maldición sobre la nave. Después de convivir con seres sobrenaturales, fantasmas y muertos, en una atmósfera mágica y ultraterrena, la nave se acaba dirigiendo hacia las costas inglesas, y como expiación el viejo Marinero superviviente debe errar de país en país na rrando su historia y enseñando, con su ejemplo, el amor y el respeto hacia todas las criaturas de Dios. Uno de los poemas más bellos de Samuel Taylor Coleridge (1772-1834), en una espléndida traducción de Eduardo Chamorro y exquisita ilustración de Gustave Doré.', 38, 'Poetry', 'public', '2024-03-01 10:34:27'),
(34, ' \"El Dilema de una Decisión\"', '\"En un pequeño pueblo, María se encuentra atrapada en un dilema. Su esposo está gravemente enfermo y necesita una operación costosa para sobrevivir. María debe decidir entre vender la casa de la familia para pagar la operación o arriesgarse a perderlo todo. La tensión crece mientras lucha con la difícil elección que podría cambiar sus vidas para siempre.\"', 38, 'Drama', 'public', '2024-03-01 10:34:27'),
(35, 'Secretos Familiares', 'En una reunión familiar, los secretos del pasado comienzan a salir a la luz. Los hermanos descubren una verdad impactante sobre la muerte de sus padres, lo que lleva a una serie de confrontaciones emocionales. Las relaciones familiares se ponen a prueba mientras cada miembro lucha por aceptar la verdad y encontrar la manera de seguir adelante juntos.', 38, 'Drama', 'public', '2024-03-01 10:34:27'),
(36, 'La Pasión por la Cocina', 'En una pequeña cocina al lado de la calle, un chef apasionado crea obras maestras culinarias con ingredientes simples. Sus manos bailan con cuchillos afilados mientras mezcla sabores y aromas. Cada plato cuenta una historia, desde las especias exóticas hasta las recetas tradicionales transmitidas de generación en generación. En este lugar, la comida se convierte en arte y amor, alimentando no solo el cuerpo, sino también el alma de aquellos que tienen el privilegio de probarla.', 39, 'Food', 'public', '2024-03-01 10:34:27'),
(37, 'El Último Adiós', 'En una habitación de hospital, dos hermanos se enfrentan al dolor de despedirse de su madre moribunda. Entre lágrimas y palabras no dichas, recuerdan los momentos felices de su infancia y lamentan las oportunidades perdidas. A medida que la vela de la vida de su madre se apaga lentamente, los hermanos se aferran a los recuerdos mientras se preparan para el último adiós.', 39, 'Drama', 'public', '2024-03-01 10:34:27'),
(38, 'Susurros de la Naturaleza', 'En el bosque encantado donde los árboles susurran secretos al viento, las flores bailan al ritmo de las estaciones y los ríos murmuran poemas antiguos. En este paraíso poético, el sol se tiñe de tonos dorados mientras la luna se alza majestuosamente en el cielo nocturno. Cada hoja caída es un verso y cada amanecer, una estrofa. La naturaleza canta su propia poesía, una melodía eterna que resuena en el corazón de aquellos que escuchan con atención.', 39, 'Poetry', 'public', '2024-03-01 10:34:27'),
(39, 'El Viaje a las Estrellas', 'En un futuro lejano, la humanidad ha conquistado las estrellas. Las naves espaciales surcan el vasto universo, explorando planetas desconocidos y encontrando formas de vida alienígenas. En esta era de descubrimientos intergalácticos, los científicos han desbloqueado los secretos del hiperespacio, permitiendo viajes instantáneos entre sistemas.', 39, 'ScienceFiction', 'public', '2024-03-01 10:34:27'),
(40, 'Los Sabores del Verano', 'En una tarde cálida de verano, el aroma embriagador de las parrillas llenaba el aire. Las carnes sazonadas chisporroteaban en las brasas mientras las verduras frescas se asaban lentamente. Las risas y charlas animadas llenaban el patio, mientras amigos y familiares se reunían alrededor de la mesa. Cada bocado era una explosión de sabores: el dulzor de las mazorcas de maíz, la suavidad de la carne a la parrilla y el frescor de las ensaladas recién preparadas. En ese momento, la comida no era solo una experiencia culinaria, sino un festín para los sentidos y un tributo a la alegría del verano.', 40, 'Food', 'public', '2024-03-01 10:34:27'),
(41, 'Las Huellas del Pasado', 'En un pueblo pequeño y olvidado, dos almas rotas se cruzaron en un camino polvoriento. María, una mujer marcada por la pérdida, y Juan, un hombre atormentado por sus errores del pasado, encontraron consuelo y esperanza el uno en el otro. A medida que sus historias se entrelazaban, descubrieron que el perdón y la redención podían ser encontrados incluso en los lugares más oscuros. Juntos, enfrentaron los demonios internos y sanaron las heridas que el tiempo había dejado atrás. Sus vidas se entrelazaron como las hojas de un libro, llenas de dolor, pero también de amor y segundas oportunidades', 40, 'Drama', 'public', '2024-03-01 10:34:27'),
(42, 'El Canto del Crepúsculo', 'En el crepúsculo del día, cuando el sol se sumerge en el horizonte y el cielo se tiñe de tonos dorados, la naturaleza susurra poesía al alma. Las aves entonan su último canto del día mientras las flores cierran sus pétalos en un suave abrazo. El viento murmura versos antiguos mientras las estrellas comienzan a desvelar su luz en el firmamento. En este momento mágico, el mundo se convierte en un poema, donde cada suspiro es una estrofa y cada mirada, un verso. El crepúsculo canta su melodía silenciosa, llevando los corazones de los soñadores hacia el reino de los sueños.', 40, 'Poetry', 'public', '2024-03-01 10:34:27'),
(43, 'El Último Bastión', 'En un futuro distópico, la humanidad se refugia en el último bastión de la civilización. Las ciudades se han convertido en metrópolis suspendidas en el aire para escapar de la tierra devastada. Los científicos luchan por encontrar soluciones mientras las máquinas autónomas patrullan los desiertos, protegiendo los recursos restantes. En este mundo desgarrado, una joven ingeniera llamada Maya descubre un antiguo archivo que podría contener la clave para la supervivencia de la humanidad. Con la esperanza en su corazón y coraje en sus ojos, se embarca en una búsqueda épica para encontrar el último rayo de esperanza que podría cambiar el destino de la humanidad para siempre.', 40, 'ScienceFiction', 'public', '2024-03-01 10:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` longtext NOT NULL,
  `imagen_id` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `imagen_id`, `role`) VALUES
(38, 'pablo', 'pablo@gmail.com', '$2y$10$lqjCPVT9WLXyvSJZF1Tk0eS8hX63kOihc3i3R1OA5rgKwsDmNxEn6', 'I am the App developer', NULL, NULL),
(39, 'Carlos', 'carlos@gmail.com', '$2y$10$xNPzj2skxVWISE9IjCPpPexVbg.tLV2VIWMpPcornLaDrZPPLXR/i', 'I am a student of the DAW in the IES Clara Del Rey highschool.', NULL, NULL),
(40, 'Rubén', 'ruben@gmail.com', '$2y$10$s/R/a7uhHEnoX5kHAsI7qe0De6H0LMQvOnmFXMoBZT48BU.GLoVH6', 'I am a student of 27 years old of the Clara Del Rey highschool', NULL, NULL),
(48, 'Rodolfo', 'rodolfo@gmail.com', '$2y$10$v7s4kw5mMVI930iUEjEnTelWAdYJEOUlgXelyuD5md3oF8Zj7qo8i', 'Soy un perfil de prueba', 1, NULL),
(49, 'Rodolfo', 'rodolfo@gmail.com', '$2y$10$Zfoc0H7vzEFF2x92COoTk.zVaW1xZzd36z5/ge5HKZJSGxjIqLatm', 'Soy un perfil de prueba', 2, NULL),
(50, 'Prueba', 'prueba@gmail.com', '$2y$10$CX/z6xprs7DacmXCFFdA0.8PgIJisI.YrNZz8kpS3toytC/SUS8rW', 'PRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBAPRUEBA', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_textId` (`textId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`textId`),
  ADD KEY `fk_user` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_imagenes` (`imagen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `textId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`textId`) REFERENCES `texts` (`textId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_textId` FOREIGN KEY (`textId`) REFERENCES `texts` (`textId`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `texts`
--
ALTER TABLE `texts`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_imagenes` FOREIGN KEY (`imagen_id`) REFERENCES `images` (`image_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
