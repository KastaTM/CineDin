-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 13:06:23
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinedincidan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntadosevento`
--

CREATE TABLE `apuntadosevento` (
  `IdApuntado` int(254) NOT NULL,
  `IdUsuario` varchar(40) NOT NULL,
  `IdEvento` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apuntadosevento`
--

INSERT INTO `apuntadosevento` (`IdApuntado`, `IdUsuario`, `IdEvento`) VALUES
(4, 'Chuckyyyyy', 'Freaky'),
(5, 'Chuckyyyyy', 'Vamos a ver Paraíso'),
(6, 'ivanf', 'Premios Oscar'),
(7, 'juliom', 'Premios Oscar'),
(8, 'LAPACA', 'Premios Oscar'),
(1, 'luis', 'Maraton de The Mandalorian'),
(12, 'luis', 'Premios Oscar'),
(3, 'Maggie', 'CineEurope'),
(9, 'mariap', 'Vamos a ver Paraíso'),
(13, 'pokachu', 'Premios Oscar'),
(10, 'raulr', 'Freaky'),
(11, 'robera', 'Maraton de The Mandalorian');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IdComentario` int(40) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` text NOT NULL,
  `Valoracion` int(10) NOT NULL,
  `IdUsuario` varchar(40) NOT NULL,
  `IdPelicula` varchar(40) DEFAULT NULL,
  `IdSerie` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`IdComentario`, `Fecha`, `Comentario`, `Valoracion`, `IdUsuario`, `IdPelicula`, `IdSerie`) VALUES
(8, '2021-05-29', 'ES PRECIOSAAA!!!!', 5, 'Maggie', 'Coco', NULL),
(9, '2021-05-29', 'No estuvo mal, para ver una tarde de relax', 3, 'Maggie', 'Antes de ti', NULL),
(10, '2021-05-29', 'Brutal papel de Tom Hardy', 4, 'luis', 'Venom', NULL),
(11, '2021-05-29', 'Bastante buena la primera y segunda temporada', 4, 'admin', NULL, 'La casa de papel'),
(12, '2021-05-29', 'Me encanta, la veo todos los días a la hora de comer :)', 5, 'Maggie', NULL, 'Los Simpson'),
(14, '2021-05-29', 'estuvo guay', 4, 'Chuckyyyyy', 'Locke', NULL),
(15, '2021-05-29', 'mis dieses', 5, 'Chuckyyyyy', 'Venom', NULL),
(16, '2021-05-29', 'guapísima', 4, 'Chuckyyyyy', 'Vengadores End Game', NULL),
(17, '2021-05-29', 'Muy divertida', 4, 'ivanf', '8 apellidos vascos', NULL),
(19, '2021-05-29', 'muy buena, la estoy volviendo a ver xD', 5, 'Chuckyyyyy', NULL, 'Juego de Tronos'),
(20, '2021-05-29', 'Bastante buena', 4, 'ivanf', 'Venom', NULL),
(22, '2021-05-29', '10/10', 5, 'Chuckyyyyy', NULL, 'Breaking Bad'),
(23, '2021-05-29', 'Increíble, sin palabras', 5, 'ivanf', 'Joker', NULL),
(24, '2021-05-29', 'Entrañable', 4, 'juliom', 'Intocable', NULL),
(25, '2021-05-29', 'Obra maestra', 5, 'juliom', NULL, 'Breaking Bad'),
(26, '2021-05-29', 'Que risas me eché AJAJAJAJAJA', 5, 'LAPACA', '8 apellidos vascos', NULL),
(27, '2021-05-29', 'muy bonita, me encantó, quiero ser yo', 5, 'LAPACA', 'Antes de ti', NULL),
(28, '2021-05-29', 'Lloré mil', 5, 'LAPACA', 'Intocable', NULL),
(29, '2021-05-29', 'Esperaba más', 2, 'mariap', 'Coco', NULL),
(30, '2021-05-29', 'La mejor serie del mundo', 5, 'LAPACA', NULL, 'Como conocí a vuestra madre'),
(31, '2021-05-29', 'Sheldon JAAJJAJAJAJA', 5, 'LAPACA', NULL, 'The Big Bang Theory'),
(32, '2021-05-29', 'Tremendo en el papel de villana Emma Stone', 4, 'mariap', 'Cruella', NULL),
(33, '2021-05-29', 'Me emocione', 4, 'mariap', 'Antes de ti', NULL),
(35, '2021-05-29', 'QUE BONITA Y QUE BUENA BANDA SONORA', 5, 'LAPACA', 'La La Land', NULL),
(36, '2021-05-29', 'Un poco flojo el final', 2, 'mariap', 'Vengadores End Game', NULL),
(37, '2021-05-29', 'La he vuelto a ver y meh', 2, 'raulr', '8 apellidos vascos', NULL),
(38, '2021-05-29', 'Llore de la emoción', 4, 'raulr', 'Coco', NULL),
(39, '2021-05-29', 'Ojala ir a ese instituto', 3, 'raulr', NULL, 'Élite'),
(40, '2021-05-29', 'estuvo bastante bien, no lo niego', 4, 'anonimo', 'Joker', NULL),
(41, '2021-05-29', 'quiero que salga ya la siguiente', 5, 'anonimo', 'Vengadores End Game', NULL),
(42, '2021-05-29', 'se la puse a mis padres y les encantó :/', 5, 'anonimo', '8 apellidos vascos', NULL),
(43, '2021-05-29', 'Buenos bailes que hacen', 4, 'rodric', 'La La Land', NULL),
(44, '2021-05-29', 'podría estar mejor', 3, 'anonimo', NULL, 'Élite'),
(46, '2021-05-29', 'Muy buena', 5, 'rodric', 'Venom', NULL),
(47, '2021-05-29', 'estaba bien', 4, 'anonimo', NULL, 'La casa de papel'),
(48, '2021-05-29', 'Grande los vengadores contra Thanos', 4, 'rodric', 'Vengadores End Game', NULL),
(50, '2021-05-29', 'Brutal, deseando la 2', 5, 'rodric', 'Joker', NULL),
(51, '2021-05-29', 'La mejor serie sin duda', 5, 'robera', NULL, 'The Mandalorian'),
(53, '2021-05-29', 'me gusto mucho', 5, 'pokachu', 'Coco', NULL),
(54, '2021-05-29', 'jeje las risas', 5, 'pokachu', NULL, 'Los Simpson'),
(55, '2021-05-29', 'Vikingos, la mejor serie', 5, 'luis', NULL, 'Vikingos'),
(56, '2021-05-29', 'buenaaaaaa', 5, 'pokachu', NULL, 'Como conocí a vuestra madre'),
(57, '2021-05-29', 'que buena, la veo en fdf', 5, 'pokachu', NULL, 'The Big Bang Theory'),
(58, '2021-05-29', 'un poco decepcionante', 2, 'pokachu', NULL, 'Vikingos'),
(59, '2021-05-29', 'Genial', 5, 'raulr', 'Venom', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `Nombre` varchar(60) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Limite` int(11) NOT NULL,
  `Portada` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`Nombre`, `Fecha`, `Descripcion`, `Limite`, `Portada`) VALUES
('CineEurope', '2021-06-22', 'La 29ª edición de CineEurope promete traerle un año más con lo mejor en proyecciones de estudio exclusivas y presentaciones de productos, tecnologías e innovaciones cinematográficas y seminarios educativos para mantener su negocio a la vanguardia de las tendencias de la industria.  Producida por The Film Expo Group, CineEurope es la convención oficial de la Unión Internacional de Cines (UNIC), una asociación comercial internacional que representa a los exhibidores de cine y sus asociaciones nacionales en 38 territorios europeos cuyo objetivo es promover mejor el valor social, cultural y económico. de cines en Europa e internacionalmente. Siempre es mejor verlo en compañía que solo, ¿por qué no quedamos y lo vemos todos juntos?', 20, 'img/portadaEventos/cineeurope.jpg'),
('Freaky', '2021-11-13', 'Este cuerpo me sienta de muerte, conocida de manera internacional como Freaky, es la nueva película que nos brinda el director de Feliz día de tu muerte, Christopher Landon, que también ha colaborado en la saga Paranormal Activity. Protagonizada por Vince Vaughn y Kathryn Newton, esta loca película de terror está lista para debutar en Estados Unidos el próximo 13 de noviembre, y ya hemos conocido su primer tráiler de la mano de Universal Pictures. Sé que queda mucho tiempo, pero quien quiera, podemos quedar para ir a verla en Madrid.', 5, 'img/portadaEventos/freaky.jpg'),
('Maraton de The Mandalorian', '2021-04-30', 'Maratón para ver todos juntos la serie de The Mandalorian.', 6, 'img/portadaEventos/maraton.jpg'),
('Premios Oscar', '2021-04-26', 'Visualización de los famosos premios Oscar.', 5, 'img/portadaEventos/oscar.jpg'),
('Vamos a ver Paraíso', '2021-06-06', 'Nacida bajo el poderoso punto de partida de \"un Stranger Things a la española\", esta serie no nos traslada a los ochenta, sino a los noventa, punto en el que desaparecen tres niñas en una zona rural española. El hermano pequeño de una de ellas comienza a investigar qué puede haberle pasado, y llega a la conclusión de que el origen del misterio puede ser sobrenatural. Detectives juveniles y nada casuales aires a casos criminales españoles de principios de lesa década y conocidos por todos, en una serie que se promete intrigante y ambiciosa. Quien quiera comentar la serie, puede apuntarse y quedar para hablar sobre esta nueva serie.', 10, 'img/portadaEventos/paraiso.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `IdFavorito` int(254) NOT NULL,
  `IdUsuario` varchar(40) NOT NULL,
  `IdPelicula` varchar(40) DEFAULT NULL,
  `IdSerie` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`IdFavorito`, `IdUsuario`, `IdPelicula`, `IdSerie`) VALUES
(7, 'admin', NULL, 'La casa de papel'),
(37, 'anonimo', NULL, 'La casa de papel'),
(33, 'anonimo', 'Vengadores End Game', NULL),
(13, 'Chuckyyyyy', NULL, 'Breaking Bad'),
(9, 'Chuckyyyyy', 'Venom', NULL),
(16, 'ivanf', NULL, 'La casa de papel'),
(15, 'ivanf', NULL, 'Vikingos'),
(10, 'ivanf', '8 apellidos vascos', NULL),
(12, 'ivanf', 'Joker', NULL),
(11, 'ivanf', 'Venom', NULL),
(19, 'juliom', NULL, 'Breaking Bad'),
(17, 'juliom', 'Intocable', NULL),
(23, 'LAPACA', NULL, 'Como conocí a vuestra madre'),
(24, 'LAPACA', NULL, 'The Big Bang Theory'),
(20, 'LAPACA', '8 apellidos vascos', NULL),
(21, 'LAPACA', 'Antes de ti', NULL),
(22, 'LAPACA', 'Intocable', NULL),
(29, 'LAPACA', 'La La Land', NULL),
(43, 'luis', NULL, 'Vikingos'),
(4, 'luis', 'Venom', NULL),
(8, 'Maggie', NULL, 'Los Simpson'),
(3, 'Maggie', 'Coco', NULL),
(27, 'mariap', NULL, 'Los Simpson'),
(26, 'mariap', 'Antes de ti', NULL),
(25, 'mariap', 'Cruella', NULL),
(30, 'mariap', 'Joker', NULL),
(44, 'pokachu', NULL, 'The Big Bang Theory'),
(42, 'pokachu', 'Coco', NULL),
(31, 'raulr', '8 apellidos vascos', NULL),
(32, 'raulr', 'Coco', NULL),
(45, 'raulr', 'Venom', NULL),
(40, 'robera', NULL, 'The Mandalorian'),
(39, 'rodric', 'Joker', NULL),
(34, 'rodric', 'La La Land', NULL),
(38, 'rodric', 'Vengadores End Game', NULL),
(36, 'rodric', 'Venom', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `Titular` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(7000) NOT NULL,
  `Portada` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`Titular`, `Fecha`, `Descripcion`, `Portada`) VALUES
('Aaron Taylor-Johnson será el villano de Spider-Man', '2021-05-21', 'Sony Pictures sigue construyendo su universo a base de villanos de Spider-Man y ya han encontrado al actor que dará vida a Kraven El Cazador. Aaron Taylor-Johnson ha sido el elegido para meterse en la piel de Sergei Kravinoff en el filme sobre este personaje de los cómics de Marvel que dirigirá J.C Chandor (Triple Frontera) a partir de un guion escrito por Art Marcum, Matt Holloway y Richard Wenk.\r\n\r\nIntroducido en 1964, Sergei Kravinoff es un hombre que se considera a sí mismo como el mejor cazador del mundo, un apodo que se gana gracias a su habilidad para rastrear y matar a sus objetivos. Su ego por mantener ese título le lleva a ingerir una sustancia que le otorga mayor fuerza y resistencia y que ralentiza su envejecimiento.\r\n', 'img/portadaNoticias/villano.jpg'),
('Estreno de Viuda Negra', '2021-05-14', 'El mes de Abril, la Casa del ratón anunció la reestructuración de su calendario, que reubicaba el largometraje que nos ocupa en el 6 de noviembre de 2020. Por desgracia, ocurrió lo inevitable y \'Viuda negra\' se retrasó nuevamente, esta vez hasta el 7 de mayo de 2021.\r\n\r\nFinalmente, tras la última reestructuración del calendario de estrenos de Disney, la aventura de Natasha Romanov llegará de forma simultánea a salas de cine y a la plataforma de Streaming Disney+ —previo pago de 30 euros— el 9 de julio de 2021.', 'img/portadaNoticias/viuda_negra.jpg'),
('Harry Potter vuelve a los cines por el 20 aniversario ', '2021-05-17', 'La saga del joven mago, creada por J.K. Rowling y protagonizada por Daniel Radcliffe, Emma Watson y Rupert Grint, regresa a las salas de cine de algunas ciudades españolas con motivo del 20 aniversario del estreno de Harry Potter y la Piedra Filosofal. Sí. Has leído bien. Han pasado más de dos décadas desde que la primera entrega de la exitosa franquicia aterrizó en las carteleras de todo el mundo\r\n\r\nSerá a partir del 5 de junio cuando Harry Potter regrese a la gran pantalla de la mano de Cine Yelmo. Las ciudades que acogerán este reestreno son Asturias, Barcelona, Madrid, Málaga y Valencia. Las salas en las que se proyectarán las películas son Yelmo Icaria (Barcelona), Ideal (Madrid), Islazul (Madrid), Yelmo Ocimax (Asturias), Plaza Mayor (Málaga) y Yelmo Valencia (Valencia).', 'img/portadaNoticias/harry.jpg'),
('Joker 2 parece seguir adelante con Todd Phillips', '2021-05-25', 'Película sobre los orígenes del Príncipe Payaso del Crimen, se convirtió en la primera vez que este villano de DC protagonizaba su propio largometraje. El resultado no pudo ser mejor. El filme fue uno de los títulos del año, con Joaquin Phoenix ganando el Oscar a Mejor actor por su papel como Arthur Fleck. \r\nTras el éxito conseguido por Joker, los rumores y posibilidades de que la historia continúe con una secuela no han cesado. Hace poco, un reportaje de THR afirmaba que Joker 2 sigue entre los planes de Warner Bros. El estudio todavía no ha anunciado nada oficialmente, pero el medio antes citado ha vuelto a avivar la idea de que el proyecto sigue adelante.', 'img/portadaNoticias/joker.jpg'),
('Stranger Things 4', '2021-05-12', 'Ya sabemos que Jim Hopper no está muerto (ese fue el mejor regalo de San Valentín de hace dos años para los creyentes en el amor incondicional a un personaje), pero la pregunta que de verdad nos quita el sueño es: ¿Cuándo se estrena Stranger Things 4? Dos nuevos teasers han anunciado que ya está en producción la temporada 4 de Stranger Things, pero no han dejado caer cuando regresa a Netflix. Los teaser, como siempre con esta serie, son crípticos. En el primero hemos visto un tablero de ajedrez, unas puertas de ascensor cerradas, el manillar de una puerta y una bola de billar ensangrentada parpadeando en pantallas de televisión de lo que parece un circuito cerrado... Realmente la única pista es la bola ocho, porque Ocho es el personaje al que da vida Keli Prasad, que ya prometía llegara la serie para quedarse. De todas formas sirve para urdir nuevas teorías sobre qué puede ocurrir en la temporada 4, solo es cuestión de tiempo. El segundo teaser avanza más información sobre lo que vemos en las pantallas: varios niños en las instalaciones del Laboratorio Nacional de Hawkins y al doctor Martin Brenner (Matthew Modine). Nos llaman la atención sobre ¿número 7? y vemos que Once no está con el resto de niños. El doctor Brenner tiene una sorpresa para ellos... ¿estás escuchando Once? ¿Será una pesadilla? ¿Una escena del pasado?', 'img/portadaNoticias/stranger_things.jpg'),
('¿Emma Stone en Spider-Man?', '2021-05-28', ' Emma Stone ha negado que aparecerá en Spider-Man: No Way Home. Hubo teorías de que Marvel Studios estaba planeando una película de acción en vivo del Spider-Verse tras las informaciones de que Stone y el coprotagonista de Amazing Spider-Man, Andrew Garfield, se unirían al dúo original de Spider-Man, Tobey Maguire y Kirsten Dunst, para la tercera película de Spidey de Tom Holland.\r\n\r\nLos rumores cobraron vida propia una vez que el villano de The Amazing Spider-Man 2 Jamie Foxx (Electro) y el malo de Spider-Man 2, Alfred Molina (Doctor Octopus) también hablaron sobre la filmación de la secuela de Marvel.\r\n\r\nStone finalmente ha comentado esa posible participación mientras promocionaba su nueva película, Cruella, y le dijo a MTV News que los fans de Spider-Man no deberían hacerse ilusiones.', 'img/portadaNoticias/emma-spiderman.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `Nombre` varchar(40) NOT NULL,
  `Fecha` date NOT NULL,
  `Genero` varchar(40) NOT NULL,
  `Duracion` int(40) NOT NULL,
  `Director` varchar(40) NOT NULL,
  `Actores` varchar(3000) NOT NULL,
  `Descripcion` varchar(7000) NOT NULL,
  `Portada` varchar(200) NOT NULL,
  `Trailer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`Nombre`, `Fecha`, `Genero`, `Duracion`, `Director`, `Actores`, `Descripcion`, `Portada`, `Trailer`) VALUES
('8 apellidos vascos', '2014-03-14', 'Comedia', 98, 'Emilio Martínez-Lázaro', 'Dani Rovira, Clara Lago, Carmen Machi, Karra Elejalde, Alfonso Sánchez', 'Rafa es un joven señorito andaluz que no ha tenido que salir jamás de su Sevilla natal para conseguir lo único que le importa en la vida: el fino, la gomina, el Betis y las mujeres. Todo cambia cuando conoce una mujer que se resiste a sus encantos: es Amaia, una chica vasca. Decidido a conquistarla, se traslada a un pueblo de las Vascongadas, donde se hace pasar por vasco para vencer su resistencia. Adopta el nombre de Antxon y varios apellidos vascos: Arguiñano, Igartiburu, Erentxun, Gabilondo, Urdangarín, Otegi, Zubizarreta... y Clemente.', 'img/portadaPeliculas/ochoapellidosvascos.jpg', 'img/trailers/ochoapellidosvascos.mp4'),
('Antes de ti', '2016-07-01', 'Romance', 110, 'Thea Sharrock', 'Emilia Clarke, Sam Claflin, Matthew Lewis, Charles Dance, Vanessa Kirby', 'Louisa “Lou” Clark, una chica inestable y creativa, reside en un pequeño pueblo de la campiña inglesa. Vive sin rumbo y va de un trabajo a otro para ayudar a su familia a llegar a fin de mes. Sin embargo, un nuevo trabajo pondrá a prueba su habitual alegría. En el castillo local, se ocupa de cuidar y acompañar a Will Traynor, un joven y rico banquero que se quedó paralítico tras un accidente.', 'img/portadaPeliculas/antesdeti.jpg', 'img/trailers/antesdeti.mp4'),
('Coco', '2017-10-27', 'Animacion', 109, 'Lee Unkrich', 'Anthony Gonzalez, Benjamin Bratt, Gael Garcia Bernal, Edward James Olmos', 'Miguel es un joven con el sueño de convertirse en leyenda de la música a pesar de la prohibición de su familia. Su pasión le llevará a adentrarse en la \"Tierra de los Muertos\" para conocer su verdadero legado familiar.', 'img/portadaPeliculas/coco.jpg', 'img/trailers/coco.mp4'),
('Cruella', '2021-05-28', 'Comedia', 134, 'Craig Gillespie', 'Emma Stone, Emma Thompson, Joel Fry, Paul Walter Hauser, John McCrea', 'Explora los rebeldes comienzos de una de las villanas más conocidas del cine y famosa por su elegancia: Cruella de Vil. Ambientada en el Londres de los años 70, en plena revolución del punk rock, la película muestra a una joven estafadora llamada Estella, así como la serie de acontecimientos que la llevan a asumir su lado malvado y a convertirse en la estridente y vengativa Cruella.', 'img/portadaPeliculas/cruella.jpg', 'img/trailers/cruella.mp4'),
('Intocable', '2012-03-09', 'Comedia', 109, 'Oliver Nakache, Eric Toledano', 'François Cluzet, Omar Sy, Anne Le Ny, Audrey Fleurot, Clotilde Mollet', 'Philippe, un aristócrata millonario que se ha quedado tetrapléjico a causa de un accidente de parapente, contrata como cuidador a domicilio a Driss, un inmigrante de un barrio marginal recién salido de la cárcel. Aunque, a primera vista, no parece la persona más indicada, los dos acaban logrando que convivan Vivaldi y Earth Wind and Fire, la elocuencia y la hilaridad, los trajes de etiqueta y el chándal. Dos mundos enfrentados que, poco a poco, congenian hasta forjar una amistad tan disparatada, divertida y sólida como inesperada, una relación única en su especie de la que saltan chispas. ', 'img/portadaPeliculas/intocable.jpg', 'img/trailers/intocable.mp4'),
('Joker', '2019-10-04', 'Thriller', 121, 'Todd Philips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz, Frances Conroy, Brett Cullen', 'Arthur Fleck vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.', 'img/portadaPeliculas/joker.jpg', 'img/trailers/joker.mp4'),
('La La Land', '2017-01-13', 'Musical', 127, 'Damien Chazelle', 'Emma Stone, Ryan Gosling, John Legend, Rosemarie Dewitt, J.K. Simmons', 'Mia, una joven aspirante a actriz que trabaja como camarera mientras acude a castings, y Sebastian, un pianista de jazz que se gana la vida tocando en sórdidos tugurios, se enamoran, pero su gran ambición por llegar a la cima en sus carreras artísticas amenaza con separarlos. ', 'img/portadaPeliculas/lalaland.jpg', 'img/trailers/lalaland.mp4'),
('Locke', '2014-03-28', 'Drama', 82, 'Steven Knight', 'Tom Hardy', 'Ivan Locke es un prestigioso capataz de grandes obras que ha tenido que trabajar muy duro para alcanzar su sueño: llevar una buena vida, con un buen trabajo y una familia que le quiere. Sin embargo, un día, en la víspera de su encargo más importante, recibe una llamada que le empuja a tomar una decisión que quizás eche toda su vida por tierra. Desde ese momento tendrá que emprender una peligrosa huida a contrarreloj.', 'img/portadaPeliculas/locke.jpg', 'img/trailers/locke.mp4'),
('Vengadores End Game', '2019-04-26', 'Ciencia ficción', 181, 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, Scarlett Johansson, Jeremy Renner, Don Cheadle, Paul Rudd, Brie Larson', 'Después de los eventos devastadores de Vengadores: Guerra del Infinito, el universo está en ruinas debido a las acciones de Thanos, el Titán Loco. Con la ayuda de los aliados que quedaron, los Vengadores deberán reunirse una vez más para intentar deshacer sus acciones y restaurar el orden en el universo de una vez por todas, sin importar cuáles son las consecuencias... Cuarta y última entrega de la saga Vengadores.', 'img/portadaPeliculas/vengadoresendgame.jpg', 'img/trailers/vengadoresendgame.mp4'),
('Venom', '2018-10-05', 'Ciencia ficción', 95, 'Ruben Fleischer', 'Tom Hardy, Riz Ahmed, Michelle Williams, Jenny Slate, Reid Scott, Michelle Lee', 'Como periodista, Eddie Brock lleva tiempo intentando desenmascarar al creador de la Fundación Vida, el famoso genio científico Carlton Drake, una obsesión que ha arruinado su carrera y su relación con su novia, Anne. Al investigar uno de los experimentos de Drake, el ente alienígena Venom se fusiona con el cuerpo de Eddie, y el reportero adquiere de pronto nuevos e increíbles superpoderes, así como la oportunidad de hacer prácticamente lo que se le antoje. Retorcido, oscuro, impredecible e impulsado por la cólera, Venom obliga a Eddie a luchar por controlar unas habilidades sumamente peligrosas que, al mismo tiempo, también resultan embriagadoras y le hacen sentir poderoso. Dado que Eddie y Venom se necesitan mutuamente para conseguir lo que quieren, se van entremezclando cada vez más... ¿Dónde acaba Eddie y empieza Venom? ', 'img/portadaPeliculas/venom.jpg', 'img/trailers/venom.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasforo`
--

CREATE TABLE `preguntasforo` (
  `TituloPregunta` varchar(700) NOT NULL,
  `Fecha` date NOT NULL,
  `Participantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntasforo`
--

INSERT INTO `preguntasforo` (`TituloPregunta`, `Fecha`, `Participantes`) VALUES
('¿Cuáles son vuestras películas de Disney favoritas? Necesito recomendaciones', '2021-05-29', 4),
('¿Qué os pareció el final de Vengadores:End Game?', '2021-05-29', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasforo`
--

CREATE TABLE `respuestasforo` (
  `IdRespuesta` int(254) NOT NULL,
  `Fecha` date NOT NULL,
  `Respuesta` text NOT NULL,
  `IdUsuario` varchar(40) NOT NULL,
  `TituloPregunta` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestasforo`
--

INSERT INTO `respuestasforo` (`IdRespuesta`, `Fecha`, `Respuesta`, `IdUsuario`, `TituloPregunta`) VALUES
(1, '2021-05-29', 'A mí me pareció brutal, acorde al nivel del resto de películas de la saga', 'luis', '¿Qué os pareció el final de Vengadores:End Game?'),
(2, '2021-05-29', 'Estuvo muy bien, el final me emociono', 'juliom', '¿Qué os pareció el final de Vengadores:End Game?'),
(3, '2021-05-29', 'Mis películas favoritas son el rey león y mulán, y ahora están en personas, que están super chulas', 'LAPACA', '¿Cuáles son vuestras películas de Disney favoritas? Necesito recomendaciones'),
(4, '2021-05-29', 'A mí me defraudo un poco', 'mariap', '¿Qué os pareció el final de Vengadores:End Game?'),
(5, '2021-05-29', 'Sin duda alguna, tarzán', 'anonimo', '¿Cuáles son vuestras películas de Disney favoritas? Necesito recomendaciones'),
(6, '2021-05-29', 'mi favorita es frozen. ARRIBA ELSA!', 'pokachu', '¿Cuáles son vuestras películas de Disney favoritas? Necesito recomendaciones'),
(7, '2021-05-29', 'Mulan, de locos', 'raulr', '¿Cuáles son vuestras películas de Disney favoritas? Necesito recomendaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `Nombre` varchar(40) NOT NULL,
  `Fecha` date NOT NULL,
  `Genero` varchar(40) NOT NULL,
  `Temporadas` int(11) NOT NULL,
  `Director` varchar(40) NOT NULL,
  `Actores` varchar(3000) NOT NULL,
  `Descripcion` varchar(7000) NOT NULL,
  `Portada` varchar(200) NOT NULL,
  `Trailer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`Nombre`, `Fecha`, `Genero`, `Temporadas`, `Director`, `Actores`, `Descripcion`, `Portada`, `Trailer`) VALUES
('Breaking Bad', '2008-01-20', 'Thriller', 5, 'Vince Gilligan', 'Bryan Cranston, Aaron Paul, Anna Gunn, Dean Norris, Betsy Brandt, RJ Mitte, Bob Odenkirk, Jonathan Banks', 'Tras cumplir 50 años, Walter White (Bryan Cranston), un profesor de química de un instituto de Albuquerque, Nuevo México, se entera de que tiene un cáncer de pulmón incurable. Casado con Skyler (Anna Gunn) y con un hijo discapacitado (RJ Mitte), la brutal noticia lo impulsa a dar un drástico cambio a su vida: decide, con la ayuda de un antiguo alumno (Aaron Paul), fabricar anfetaminas y ponerlas a la venta. Lo que pretende es liberar a su familia de problemas económicos cuando se produzca el fatal desenlace.', 'img/portadaSeries/BreakingBad.jpg', 'img/trailers/breakingbad.mp4'),
('Como conocí a vuestra madre', '2013-09-23', 'Comedia', 9, 'Carter Bays', 'Josh Radnor, Jason Segel, Alyson Hannigan, Neil Patrick Harris, Cobie Smulders, Ashley Williams', 'Ted (Josh Radnor) les cuenta a sus dos hijos cómo conoció a su madre y cómo fue su vida hasta que, por fin, encontró el amor verdadero. Contó para ello con la ayuda de su amigo Barney (Neil Patrick Harris), un joven algo extravagante, adicto a los somníferos y muy hábil para conocer mujeres. Cuando Ted conoce a Robin (Cobie Smulders), una impresionante joven canadiense que acaba de mudarse a Nueva York, está completamente seguro de que es amor a primera vista.', 'img/portadaSeries/ComoConociAVuestraMadre.jpg', 'img/trailers/ComoConociAVuestraMadre.mp4'),
('Élite', '2018-10-05', 'Drama', 4, 'Carlos Montero', 'Miguel Bernardeau, Mina El Hammani, Itzan Escamilla, Danna Paola, Ester Expósito, Arón Piper, Omar Ayuso, Álvaro Rico', 'Las Encinas es el colegio más exclusivo del país y al que la élite envía a sus hijos a estudiar. Un mundo privilegiado con fiestas de alta sociedad, niños ricos, sexo y drogas. En él acaban de ser admitidos tres chicos de clase obrera después de que un terremoto destruyera el colegio público y sus alumnos tuvieran que ser repartidos por otros institutos de la zona. El choque entre los que lo tienen todo y los que no tienen nada que perder crea una tormenta perfecta que acaba en un asesinato. ¿Quién ha cometido el crimen?', 'img/portadaSeries/elite.jpg', 'img/trailers/elite.mp4'),
('Gambito de dama', '2020-10-23', 'Drama', 1, 'Scott Frank', 'Anya Taylor-Joy, Isla Johnston, Annabeth Kelly, Bill Camp, Christiane Seidel', 'Miniserie de 7 episodios. Kentucky, años 60. En plena Guerra Fría, la joven Beth Harmon es una huérfana con una aptitud prodigiosa para el ajedrez, que lucha contra sus adicciones mientras trata de convertirse en la mejor jugadora del mundo ganando a los grandes maestros, en especial a los rusos.', 'img/portadaSeries/gambitodedama.jpg', 'img/trailers/gambitodedama.mp4'),
('Juego de Tronos', '2011-04-17', 'Aventura', 8, 'David Benioff', 'Emilia Clarke, Kit Harington, Lena Headey, Peter Dinklage, Maisie Williams, Nikolaj Coster-Waldau, Sophie Turner', 'La historia se desarrolla en un mundo ficticio de carácter medieval donde hay Siete Reinos. Hay tres líneas argumentales principales: la crónica de la guerra civil dinástica por el control de Poniente entre varias familias nobles que aspiran al Trono de Hierro; la creciente amenaza de \"los otros\", seres desconocidos que viven al otro lado de un inmenso muro de hielo que protege el Norte de Poniente; y el viaje de Daenerys Targaryen, la hija exiliada del rey que fue asesinado en una guerra civil anterior, y que pretende regresar a Poniente para reclamar sus derechos dinásticos. Tras un largo verano de varios años, el temible invierno se acerca a los Siete Reinos.', 'img/portadaSeries/JuegoDeTronos.jpg', 'img/trailers/juegodetronos.mp4'),
('La casa de papel', '2017-05-02', 'Thriller', 4, 'Álex Pina', 'Álvaro Morte, Úrsula Corberó, Itziar Ituño, Alba Flores, Paco Tous, Najwa Nimri, Pedro Alonso, Miguel Herrán, Jaime Lorente', 'Un misterioso personaje, que se hace llamar \"El Profesor\", planea el mayor de los atracos jamás ideado. Para llevar a cabo el ambicioso plan, recluta a una banda formada por personas con ciertas cualidades y algo en común: no tienen nada que perder. El objetivo es atracar la Fábrica Nacional de Moneda y Timbre, con la intención de quedarse encerrados dentro con una misión muy concreta: no robar dinero, sino crearlo. Tras cinco meses de reclusión, memorizando cada paso, cada detalle, cada probabilidad..., por fin llega el día. Les esperan once días de encierro en la Fábrica de Moneda, rodeados de los cuerpos de élite de la policía y con 67 rehenes en su poder.', 'img/portadaSeries/LaCasaDePapel.jpg', 'img/trailers/LaCasaDePapel.mp4'),
('Los Simpson', '1987-04-19', 'Comedia', 32, 'Matt Groening', 'Personajes de animación', 'Narra la historia de una peculiar familia (Homer, Marge, Bart, Maggie y Lisa Simpson) y otros divertidos personajes de la localidad norteamericana de Springfield. Homer, el padre, es un desastroso inspector de seguridad de una central nuclear. Marge, la madre, es un ama de casa acostumbrada a soportar a su peculiar familia. Bart, de 10 años, intenta divertirse con travesuras de todo tipo. Lisa es la más inteligente de la familia, y Maggie, la más pequeña, es un bebé que todavía no habla, pero que juega un importante papel.', 'img/portadaSeries/LosSimpsons.jpg', 'img/trailers/LosSimpsons.mp4'),
('The Big Bang Theory', '2008-09-22', 'Comedia', 12, 'Chuck Lorre', 'Johnny Galecki, Jim Parsons, Kaley Cuoco, Simon Helberg, Kunal Nayyar, Melissa Rauch, Mayim Bialik, Sara Gilbert', 'Leonard (Johnny Galecki) y Sheldon (Jim Parsons) son dos cerebros privilegiados que comparten piso. Aunque los dos, doctores en Física, son capaces de calcular las probabilidades de existencia de otros mundos, no saben cómo relacionarse con los demás, especialmente con las chicas. Penny (Kaley Cuoco), una vecina recién llegada, es el polo opuesto a los dos amigos, de modo que su llegada altera la tranquila vida sentimental de Leonard y el desorden obsesivo-compulsivo de Sheldon.', 'img/portadaSeries/bigbang.jpg', 'img/trailers/BigBangTheory.mp4'),
('The Mandalorian', '2019-11-12', 'Ciencia ficción', 2, 'Jon Favreau', 'Pedro Pascal, Gina Carano, Carl Weathers, Werner Herzog, Nick Nolte, Emily Swallow, Omid Abtahi', 'Ambientada tras la caída del Imperio y antes de la aparición de la Primera Orden, la serie sigue los pasos de Mando, un cazarrecompensas perteneciente a la legendaria tribu de los mandalorianos, un pistolero solitario que trabaja en los confines de la galaxia, donde no alcanza la autoridad de la Nueva República.', 'img/portadaSeries/TheMandalorian.jpg', 'img/trailers/themandalorian.mp4'),
('Vikingos', '2013-03-03', 'Acción', 6, 'Michael Hirst', 'Travis Fimmel, Katheryn Winnick, Gustaf Skarsgård, Alexander Ludwig, Clive Standen, Maude Hirst', 'Narra las aventuras del héroe Ragnar Lothbrok, de sus hermanos vikingos y su familia, cuando él se subleva para convertirse en el rey de las tribus vikingas. Además de ser un guerrero valiente, Ragnar encarna las tradiciones nórdicas de la devoción a los dioses. Según la leyenda era descendiente directo del dios Odín.', 'img/portadaSeries/Vikingos.jpg', 'img/trailers/vikingos.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` varchar(40) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Contrasenia` varchar(300) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  `Nivel` varchar(40) NOT NULL,
  `Foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Contrasenia`, `FechaNacimiento`, `Correo`, `Tipo`, `Nivel`, `Foto`) VALUES
('admin', 'Administrador', '$2y$10$O.ZcG8DhcdM.wbDIWBEl1uJOKRKJspqI565K72reo0uMl3AJn6Mna', '2021-04-01', 'admin@gmail.com', 'admin', 'admin', 'img/fotosUsuarios/sinfoto.jpg'),
('anonimo', 'secreto', '$2y$12$2NKYNX.IX5Z6lS/5Vcb8Q.kjDaCPGN9XZNfH4iYMrjosEFCWzms56', '1988-06-10', 'secret@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('Chuckyyyyy', 'Chucky el muñeco', '$2y$12$6D22a4vAcXfldBWzfbYECuixTxQ7J9r53O/sQCI0rVDzMuTtzDuP6', '1997-04-16', 'chuchucky@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/chucky.jpg'),
('ivanf', 'Ivan', '$2y$12$Uy5vVGmx0CBlhI9QeI6z.unKMyw9BgdqPS09nJNnbRLku1lGfbpPu', '2021-05-07', 'ivan@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('juliom', 'Julio', '$2y$12$0OhoE0woLOO8kz9Rbp0SzuPJv1E3taJ7RfmKCk4IYE5r2XMwAYL9G', '2021-05-03', 'julio@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('LAPACA', 'Francis pa los amigos', '$2y$12$piBnQfiJ5HVQtEsA3PNCq.fszVxdfeha9.s56UMh1gBpzKm9NpQwS', '2000-02-02', 'paquitapaca@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/alpaca.jpg'),
('luis', 'Luis Garcia', '$2y$10$lw16YY40EVeppPurBZlOyOs1h6JioRti2mmkE18A8UcVWFo7TsGVO', '2021-04-02', 'luisito@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/rollo.jpg'),
('Maggie', 'Roxanne', '$2y$12$.YI9zW7kermjfoZSPoiL9OfehuEz2sEMGCGGEqBOz2SDfp7bk62wW', '2000-03-03', 'mag@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/maggie.png'),
('mariap', 'Maria', '$2y$12$5/5FHAUaOX3XaJlajM0JhugwaGiR/K6852Df8VrSMteP8auUh0meu', '2021-05-19', 'maria@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('pokachu', 'el pika pika', '$2y$12$C.frCSJ9Pk/.QI5s.VIjJuYoDtHM/f77w5XWOUVZpLLCGgbCFpwaK', '2004-02-17', 'pikapika@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/pokachu.png'),
('raulr', 'Raul', '$2y$12$1ys3pJxk59U08lBsQ5NT9.jDMSDaAWWHCps3KXmi1RcxSwSCOWWve', '2021-05-02', 'raul@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('robera', 'Rober', '$2y$12$s0gVlGMMhfH/Ag9PyqDxE.VciVMVC4mneUV9Ohq0.QxFNRp/Dj2Vi', '2021-05-04', 'rober@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg'),
('rodric', 'Rodrigo', '$2y$12$/yFB.SZUComeowFZl1YcfOQP1mfoAmBuCfx36WjZ/OQIVxqfxQAgi', '2021-05-12', 'rodri@gmail.com', 'normal', 'Bronce', 'img/fotosUsuarios/sinfoto.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuntadosevento`
--
ALTER TABLE `apuntadosevento`
  ADD PRIMARY KEY (`IdApuntado`),
  ADD KEY `Foreign key` (`IdUsuario`,`IdEvento`),
  ADD KEY `IdEvento` (`IdEvento`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IdComentario`),
  ADD KEY `Foreign key` (`IdUsuario`,`IdPelicula`,`IdSerie`),
  ADD KEY `IdSerie` (`IdSerie`),
  ADD KEY `IdPelicula` (`IdPelicula`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`IdFavorito`),
  ADD KEY `Foreign key` (`IdUsuario`,`IdPelicula`,`IdSerie`) USING BTREE,
  ADD KEY `IdPelicula` (`IdPelicula`),
  ADD KEY `IdSerie` (`IdSerie`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`Titular`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `preguntasforo`
--
ALTER TABLE `preguntasforo`
  ADD PRIMARY KEY (`TituloPregunta`);

--
-- Indices de la tabla `respuestasforo`
--
ALTER TABLE `respuestasforo`
  ADD PRIMARY KEY (`IdRespuesta`),
  ADD KEY `Foreign key` (`IdUsuario`,`TituloPregunta`),
  ADD KEY `TituloPregunta` (`TituloPregunta`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuntadosevento`
--
ALTER TABLE `apuntadosevento`
  MODIFY `IdApuntado` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IdComentario` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `IdFavorito` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `respuestasforo`
--
ALTER TABLE `respuestasforo`
  MODIFY `IdRespuesta` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuntadosevento`
--
ALTER TABLE `apuntadosevento`
  ADD CONSTRAINT `apuntadosevento_ibfk_1` FOREIGN KEY (`IdEvento`) REFERENCES `eventos` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apuntadosevento_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`IdSerie`) REFERENCES `series` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IdPelicula`) REFERENCES `peliculas` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`IdPelicula`) REFERENCES `peliculas` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`IdSerie`) REFERENCES `series` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestasforo`
--
ALTER TABLE `respuestasforo`
  ADD CONSTRAINT `respuestasforo_ibfk_1` FOREIGN KEY (`TituloPregunta`) REFERENCES `preguntasforo` (`TituloPregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestasforo_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
