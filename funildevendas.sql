-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 02:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funildevendas`
--

-- --------------------------------------------------------

--
-- Table structure for table `artigos`
--

CREATE TABLE IF NOT EXISTS `artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(520) NOT NULL,
  `conteudo` text NOT NULL,
  `descricao` text NOT NULL,
  `slug` varchar(520) NOT NULL,
  `imagem` varchar(520) NOT NULL,
  `categorias_artigo_id` int(11) NOT NULL,
  `situacoes_artigo_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `artigos`
--

INSERT INTO `artigos` (`id`, `titulo`, `conteudo`, `descricao`, `slug`, `imagem`, `categorias_artigo_id`, `situacoes_artigo_id`, `created`, `modified`) VALUES
(1, 'Curso de PHP, MySQLi e Bootstrap', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>												', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio.', 'curso-de-php-mysqli-e-bootstrap', '1466984831-capa-tradicional2.png', 1, 1, '2016-11-30 00:00:00', '2016-06-27 20:13:04'),
(3, 'Criar URL AmigÃ¡vel', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>												', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. ', 'criar-url-amigavel', '1466984871-capa-tradicional2.png', 1, 1, '2016-06-26 20:47:51', '2016-06-27 20:13:41'),
(4, 'Artigo um', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio.						', 'artigo-um', '1466984831-capa-tradicional2.png', 1, 1, '2016-11-30 00:00:00', '2016-07-08 21:15:16'),
(5, 'Artigo dois', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. 						', 'artigo-dois', '1466984871-capa-tradicional2.png', 1, 1, '2016-06-26 20:47:51', '2016-07-08 21:15:29'),
(6, 'Artigo tres', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio.						', 'artigo-tres', '1466984831-capa-tradicional2.png', 1, 1, '2016-11-30 00:00:00', '2016-07-08 21:15:45'),
(7, 'Artigo quatro', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. 						', 'artigo-quatro', '1466984871-capa-tradicional2.png', 1, 1, '2016-06-26 20:47:51', '2016-07-08 21:15:59'),
(8, 'Artigo cinco', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio.						', 'artigo-cinco', '1466984831-capa-tradicional2.png', 1, 1, '2016-11-30 00:00:00', '2016-07-08 21:16:10'),
(9, 'Artigo seis', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																		', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. 						', 'artigo-seis', '1466984871-capa-tradicional2.png', 1, 1, '2016-06-26 20:47:51', '2016-07-08 21:16:20'),
(10, 'Artigo sete', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																								', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio.												', 'artigo-sete', '1466984831-capa-tradicional2.png', 1, 3, '2016-11-30 00:00:00', '2016-07-09 14:58:00'),
(11, 'Artigo oito', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.\r\n<p></p>\r\nQuisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.\r\n<p></p>\r\nPraesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</p>																								', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. 												', 'artigo-oito', '1466984871-capa-tradicional2.png', 1, 2, '2016-06-26 20:47:51', '2016-07-09 14:57:52'),
(12, 'Artigo Nove', '<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing</strong> elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet. Mauris sollicitudin interdum quam, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">&nbsp;</p>\r\n<p style="text-align: justify;"><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">Quisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.</span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">&nbsp;</p>\r\n<p style="text-align: justify;"><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">Praesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</span></p>', '<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa ullamcorper sit amet.</p>', 'artigo-nove', '1470013801-1466984871-capa-tradicional2.png', 1, 1, '2016-07-31 22:10:01', '2016-07-31 22:10:37'),
(13, 'Artigo dez', '<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">Lorem ipsum dolor sit amet,&nbsp;<strong style="box-sizing: border-box;">consectetur adipiscing</strong>&nbsp;elit. <em>Vestibulum urna diam</em>, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio. Maecenas ut nibh quis elit ultricies tempor. Vestibulum ornare libero lorem, id fermentum massa<span style="text-decoration: line-through;"> ullamcorper sit amet</span>. Mauris sollicitudin<span style="text-decoration: underline;"> interdum quam</span>, sed tristique sem accumsan et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce ornare non quam id interdum.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="box-sizing: border-box;">Quisque orci velit, commodo eu urna vitae, sollicitudin tempus enim. Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa. Sed semper tellus sed mi auctor tempor. Fusce placerat urna justo, a pretium tellus condimentum at. Integer in suscipit velit. Sed dui risus, egestas aliquam purus ac, porta mattis tortor. Sed egestas quis diam at placerat. Donec venenatis nisl sed varius vulputate.</span>&nbsp;</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="box-sizing: border-box;">Praesent bibendum massa eget placerat bibendum. Vestibulum ut ultricies tortor. Praesent gravida non nulla vel ultrices. Quisque at tincidunt turpis, eget faucibus odio. Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra. Proin eleifend nunc tempus mi interdum consequat. Nullam id suscipit nisi. Pellentesque lacinia auctor maximus.</span></p>', '<p><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">Vivamus porta eu enim eu efficitur. Cras euismod ac arcu nec consequat. Praesent vel nisl scelerisque, aliquet nisi nec, tincidunt magna. Donec pretium orci et ante accumsan elementum eu dictum lorem. Sed nisi eros, mattis at enim at, malesuada facilisis massa.</span></p>', 'artigo-dez', '1470014030-1466984871-capa-tradicional2.png', 1, 1, '2016-07-31 22:13:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carrinhos`
--

CREATE TABLE IF NOT EXISTS `carrinhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plano_id` int(11) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `transacao_cod` varchar(120) DEFAULT NULL,
  `usario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `carrinhos`
--

INSERT INTO `carrinhos` (`id`, `plano_id`, `preco`, `transacao_cod`, `usario_id`, `created`, `modified`) VALUES
(14, 2, '49,00', '202cb962ac59075b964b07152d234b708', 64, '2016-07-31 21:25:06', '2016-08-06 13:28:06'),
(15, 3, '89,00', '202cb962ac59075b964b07152d234b709', 64, '2016-08-06 00:00:00', '2016-08-06 13:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `carrouses`
--

CREATE TABLE IF NOT EXISTS `carrouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `ordem` int(11) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `situacoes_carrouse_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `carrouses`
--

INSERT INTO `carrouses` (`id`, `nome`, `ordem`, `imagem`, `situacoes_carrouse_id`, `created`, `modified`) VALUES
(1, 'Curso de PHP, MySQLi e Bootstrap', 2, 'slide1.jpg', 1, '2016-07-28 00:00:00', '2016-07-16 21:32:24'),
(2, 'Curso de HTML5, CSS3 e Bootstrap', 3, 'slide2.jpg', 1, '2016-07-28 00:00:00', '2016-07-10 17:21:47'),
(3, 'Artigo 1', 1, 'slide3.jpg', 2, '2016-07-28 00:00:00', '2016-07-16 21:32:24'),
(22, 'Artigo 15', 4, '1468185046-slide1.jpg', 1, '2016-07-10 18:10:46', '2016-07-17 13:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_artigos`
--

CREATE TABLE IF NOT EXISTS `categorias_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categorias_artigos`
--

INSERT INTO `categorias_artigos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'PHP', '2016-08-01 00:00:00', NULL),
(2, 'CSS', '0000-00-00 00:00:00', NULL),
(3, 'JavaScript', '2016-06-25 10:11:28', '2016-06-25 11:19:28'),
(4, 'MySQLi', '2016-06-25 10:11:49', '2016-06-25 11:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios_artigos`
--

CREATE TABLE IF NOT EXISTS `comentarios_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `mensagem` text NOT NULL,
  `artigo_id` int(11) NOT NULL,
  `situacoes_comentario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `comentarios_artigos`
--

INSERT INTO `comentarios_artigos` (`id`, `nome`, `email`, `mensagem`, `artigo_id`, `situacoes_comentario_id`, `created`, `modified`) VALUES
(4, 'Cesar', 'cesar@celke.com.br', '<p>1Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>', 1, 1, '2016-06-27 20:51:08', '2016-08-07 20:28:22'),
(5, 'Cesar', 'cesar@celke.com.br', '1Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', 1, 4, '2016-06-27 20:51:18', '2016-06-29 21:44:34'),
(24, 'Cesar', 'cesar@celke.com.br', 'Nulla facilisi. Morbi non porta neque. Integer interdum massa vitae eros mollis, in laoreet ligula ultricies. Donec eu felis id lacus fringilla iaculis nec nec nulla. Donec in magna et tellus pharetra mollis. ', 3, 3, '2016-06-28 20:53:20', '2016-06-29 21:43:24'),
(25, 'Cesar', 'cesar@celke.com.br', 'c', 1, 1, '2016-07-02 12:01:29', NULL),
(27, 'Cesar', 'cesar@celke.com.br', 'a', 1, 2, '2016-07-02 12:03:22', NULL),
(32, 'Cesar', 'cesar@celke.com.br', 'b', 1, 2, '2016-07-02 12:05:36', '2016-07-02 12:05:45'),
(33, 'Cesar', 'cesar@celke.com.br', 'comentario um', 9, 1, '2016-07-08 21:24:30', NULL),
(34, 'Cesar', 'cesar@celke.com.br', 'Aliquam ipsum nibh, sagittis a venenatis vel, scelerisque sed dui. Fusce interdum dui sed augue sodales mattis. Nulla imperdiet convallis nibh eu viverra.', 4, 2, '2016-07-09 15:45:41', '2016-07-09 15:46:22'),
(35, 'Cesar', 'celkeadm@gmail.com', 'Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio1.', 13, 1, '2016-08-06 15:15:21', NULL),
(36, 'Cesar', 'celkeadm@gmail.com', 'Vestibulum urna diam, laoreet nec lectus nec, malesuada molestie neque. Ut vitae ante odio2.', 13, 1, '2016-08-06 15:15:43', NULL),
(37, 'Cesar Szpak', 'celkeadm@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \nVestibulum urna diam, laoreet nec lectus nec, \nmalesuada molestie neque. Ut vitae ante odio.', 11, 1, '2016-08-06 21:38:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mensagens_contatos`
--

CREATE TABLE IF NOT EXISTS `mensagens_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `assunto` varchar(220) NOT NULL,
  `mensagem` text NOT NULL,
  `situacoes_contato_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mensagens_contatos`
--

INSERT INTO `mensagens_contatos` (`id`, `nome`, `email`, `telefone`, `assunto`, `mensagem`, `situacoes_contato_id`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '689898-24851', 'teste', 'teste', 3, '2016-07-02 14:58:28', '2016-08-06 15:18:46'),
(2, 'Cesar', 'cesar@celke.com.br', '689898-24851', 'teste', 'teste', 3, '2016-07-02 15:12:35', '2016-07-05 22:15:02'),
(3, 'Cesar', 'cesar@celke.com.br', '689898-24851', 'teste', 'teste', 3, '2016-07-02 15:13:03', NULL),
(4, 'Cesar', 'cesar@celke.com.br', '64536456456', 'teste1', 'teste1', 2, '2016-07-02 15:13:51', '2016-07-05 22:09:18'),
(6, 'Cesar', 'cesar@celke.com.br', '345345345435', 'teste2', 'teste2', 1, '2016-07-02 15:29:05', NULL),
(7, 'Cesar', 'cesar@celke.com.br', '435345345', 'teste3', 'teste3', 4, '2016-07-02 15:29:35', '2016-07-05 22:15:34'),
(8, 'Cesar', 'cesar@celke.com.br', '435345345', 'teste3', 'teste3', 1, '2016-07-02 15:30:25', NULL),
(9, 'Cesar', 'cesar@celke.com.br', '65345634534', 'teste4', 'teste4', 2, '2016-07-02 15:30:39', '2016-08-06 15:18:38'),
(10, '', '', '', '', '', 0, '2016-08-07 11:58:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2016-03-25 00:00:00', NULL),
(2, 'Colaborador', '2016-03-25 00:00:00', NULL),
(3, 'Cliente', '2016-03-25 00:00:00', '2016-03-27 20:26:18'),
(4, 'Fornecedor', '2016-03-27 20:12:03', '2016-03-27 20:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `planos`
--

CREATE TABLE IF NOT EXISTS `planos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `duracao` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `planos`
--

INSERT INTO `planos` (`id`, `nome`, `duracao`, `created`, `modified`) VALUES
(1, 'Free', 7, '2016-07-06 00:00:00', NULL),
(2, 'Standard', 30, '2016-07-04 00:00:00', NULL),
(3, 'Ultimate', 30, '2016-07-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situacoes`
--

CREATE TABLE IF NOT EXISTS `situacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `situacoes`
--

INSERT INTO `situacoes` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Ativo', 'success', '2016-03-25 00:00:00', NULL),
(2, 'Inativo', 'danger', '2016-03-25 00:00:00', '2016-07-09 14:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `situacoes_artigos`
--

CREATE TABLE IF NOT EXISTS `situacoes_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `situacoes_artigos`
--

INSERT INTO `situacoes_artigos` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Ativo', 'success', '2016-10-13 00:00:00', '2016-06-25 12:06:10'),
(2, 'Inativo', 'warning', '2016-10-28 00:00:00', NULL),
(3, 'RevisÃ£o', 'primary', '2016-06-25 11:53:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situacoes_carrouses`
--

CREATE TABLE IF NOT EXISTS `situacoes_carrouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cor` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `situacoes_carrouses`
--

INSERT INTO `situacoes_carrouses` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Habilitado', 'success', '2016-10-07 00:00:00', NULL),
(2, 'Desabilitado', 'primary', '2016-10-07 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situacoes_comentarios`
--

CREATE TABLE IF NOT EXISTS `situacoes_comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `situacoes_comentarios`
--

INSERT INTO `situacoes_comentarios` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Pendente', 'primary', '2016-06-01 00:00:00', NULL),
(2, 'Aprovado', 'success', '2016-06-01 00:00:00', NULL),
(3, 'teste1', 'success', '2016-06-01 00:00:00', '2016-07-10 11:28:50'),
(4, 'Reprovado', 'warning', '2016-06-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situacoes_contatos`
--

CREATE TABLE IF NOT EXISTS `situacoes_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `situacoes_contatos`
--

INSERT INTO `situacoes_contatos` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Pendente', 'primary', '2016-10-13 00:00:00', NULL),
(2, 'Aberto', 'info', '2016-10-13 00:00:00', NULL),
(3, 'Respondido', 'success', '2016-10-13 00:00:00', NULL),
(4, 'Spam', 'warning', '2016-10-13 00:00:00', NULL),
(5, 'SugestÃ£o', 'danger', '2016-07-08 23:11:56', '2016-07-09 14:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `transacoes`
--

CREATE TABLE IF NOT EXISTS `transacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transacao_cod` varchar(120) NOT NULL,
  `data_transacao` datetime NOT NULL,
  `tipo_pagamento` varchar(120) NOT NULL,
  `status_transacao` varchar(120) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(120) NOT NULL,
  `endereco` varchar(220) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(120) NOT NULL,
  `bairro` varchar(120) NOT NULL,
  `cidade` varchar(120) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `carrinho_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `transacoes`
--

INSERT INTO `transacoes` (`id`, `transacao_cod`, `data_transacao`, `tipo_pagamento`, `status_transacao`, `nome`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `produto_id`, `preco`, `carrinho_id`, `created`, `modified`) VALUES
(34, '202cb962ac59075b964b07152d234b701', '2016-07-15 10:20:35', 'Boleto', 'Aguardando Pagamento', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 13:28:06', '2016-08-07 20:45:01'),
(35, '202cb962ac59075b964b07152d234b702', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Aguardando Pagamento', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 13:28:44', NULL),
(36, '202cb962ac59075b964b07152d234b703', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Aguardando Pagamento', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 13:29:11', NULL),
(38, '202cb962ac59075b964b07152d234b704', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Aprovado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 13:29:58', NULL),
(41, '202cb962ac59075b964b07152d234b705', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Cancelado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 2, '', 15, '2016-08-06 14:14:07', NULL),
(42, '202cb962ac59075b964b07152d234b706', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Aprovado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 2, '', 15, '2016-08-06 14:14:21', NULL),
(43, '202cb962ac59075b964b07152d234b707', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Cancelado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 2, '', 15, '2016-08-06 14:14:39', NULL),
(44, '202cb962ac59075b964b07152d234b708', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Cancelado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 14:15:02', NULL),
(45, '202cb962ac59075b964b07152d234b709', '2016-07-15 10:20:35', 'CartÃ£o de CrÃ©dito', 'Cancelado', 'Cesar Szpak', 'celkeadm@gmail.com', 'Av. Republica Argentina', '5550', '', 'CapÃ£o Raso', 'Curitiba', 'PR', '81050001', 3, '', 15, '2016-08-06 14:16:08', '2016-08-07 20:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) DEFAULT NULL,
  `email` varchar(240) NOT NULL,
  `senha` varchar(240) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `endereco` varchar(220) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `bairro` varchar(220) DEFAULT NULL,
  `cidade` varchar(220) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `foto` varchar(220) DEFAULT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `situacoe_id` int(11) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `foto`, `recuperar_senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '202cb962ac59075b964b07152d234b70', 2147483647, '51891', 8149814, '148914', '95191', '', '894', '894', '89', NULL, '', 1, 1, '2016-03-25 01:01:01', '2016-08-06 15:14:00'),
(2, 'Kelly1', 'kelly1@celke.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, '2016-03-25 02:02:02', '2016-03-27 19:22:38'),
(3, 'Jessica', 'jessica@celke.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1469926505-servico-dois.png', '', 2, 3, '2016-03-25 03:03:33', '2016-07-30 21:55:05'),
(4, 'Gabriely', 'gabriely@celke.com.br', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 2, '2016-03-25 22:50:38', NULL),
(64, 'Cesar Szpak', 'celkeadm@gmail.com', '202cb962ac59075b964b07152d234b70', 2147483647, '489488498', 81050001, 'Avenida RepÃºblica Argentina', '5550', '', 'Novo Mundo', 'Curitiba', 'PR', NULL, 'c3f962c876175218dd67f6694fc25b81', 1, 3, '2016-07-31 18:04:18', '2016-07-31 21:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_planos`
--

CREATE TABLE IF NOT EXISTS `usuarios_planos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_vencimento` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `usuarios_planos`
--

INSERT INTO `usuarios_planos` (`id`, `data_vencimento`, `usuario_id`, `plano_id`, `created`, `modified`) VALUES
(28, '2016-08-06 14:16:58', 64, 3, '2016-07-31 18:04:18', '2016-08-06 14:16:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
