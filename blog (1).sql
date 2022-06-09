-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2022 às 18:11
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `parameter`
--

CREATE TABLE `parameter` (
  `parameter_id` bigint(20) UNSIGNED NOT NULL,
  `parameter_fk_site_id` bigint(20) UNSIGNED NOT NULL,
  `parameter_createdDate` datetime NOT NULL,
  `parameter_modifiedDate` datetime NOT NULL,
  `parameter_name` varchar(60) NOT NULL,
  `parameter_value` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parameter`
--

INSERT INTO `parameter` (`parameter_id`, `parameter_fk_site_id`, `parameter_createdDate`, `parameter_modifiedDate`, `parameter_name`, `parameter_value`) VALUES
(1, 26, '2022-05-30 17:01:48', '2022-05-30 17:01:48', 'backgroundOption', 'I'),
(2, 26, '2022-05-30 17:01:48', '2022-05-30 17:01:48', 'backgroundImageName', 'NULL'),
(3, 26, '2022-05-30 17:01:48', '2022-05-30 17:01:48', 'backgroundColorHex', '#d02525'),
(4, 26, '2022-06-05 19:25:46', '2022-06-05 19:25:46', 'fontOption', 'Calibri');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publication`
--

CREATE TABLE `publication` (
  `publication_id` bigint(20) UNSIGNED NOT NULL,
  `publication_fk_site_id` bigint(20) UNSIGNED NOT NULL,
  `publication_title` varchar(200) NOT NULL,
  `publication_text` varchar(12000) NOT NULL,
  `publication_image` tinyint(1) NOT NULL DEFAULT 0,
  `publication_creationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publication`
--

INSERT INTO `publication` (`publication_id`, `publication_fk_site_id`, `publication_title`, `publication_text`, `publication_image`, `publication_creationDate`) VALUES
(50, 26, 'teste', 'teste', 1, '2022-05-30 01:27:02'),
(51, 26, 'Aloha PK', 'Teste', 0, '2022-05-31 16:54:26'),
(53, 26, 'teste', 'asdfasdfasdfasdfasdfsad', 0, '2022-06-07 13:28:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `site_fk_user_id` bigint(20) UNSIGNED NOT NULL,
  `site_dateCreation` datetime NOT NULL,
  `site_name` varchar(60) NOT NULL DEFAULT 'Nome do site',
  `site_about` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`site_id`, `site_fk_user_id`, `site_dateCreation`, `site_name`, `site_about`) VALUES
(26, 34, '2022-05-18 16:17:41', 'site de bosta', ''),
(27, 35, '2022-05-30 16:59:07', 'Meu site', NULL),
(28, 36, '2022-05-30 17:01:48', 'asd', 'asdaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE `social` (
  `social_id` bigint(20) UNSIGNED NOT NULL,
  `social_fk_user_id` bigint(20) UNSIGNED NOT NULL,
  `social_facebook` varchar(120) DEFAULT NULL,
  `social_instagram` varchar(120) DEFAULT NULL,
  `social_twitter` varchar(120) DEFAULT NULL,
  `social_linkedin` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `social`
--

INSERT INTO `social` (`social_id`, `social_fk_user_id`, `social_facebook`, `social_instagram`, `social_twitter`, `social_linkedin`) VALUES
(28, 34, NULL, NULL, NULL, NULL),
(29, 35, NULL, NULL, NULL, NULL),
(30, 36, 'a', 'b', 'c', 'd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestion_id` bigint(20) UNSIGNED NOT NULL,
  `suggestion_fk_user_id` bigint(20) UNSIGNED NOT NULL,
  `suggestion_text` varchar(3000) NOT NULL,
  `suggestion_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `suggestion`
--

INSERT INTO `suggestion` (`suggestion_id`, `suggestion_fk_user_id`, `suggestion_text`, `suggestion_date`) VALUES
(4, 34, 'Teste sugestão', '2022-06-05 15:55:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_accountCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_name`, `user_password`, `user_accountCreation`) VALUES
(34, 'teste@teste', 'teste', 'teste', '202cb962ac59075b964b07152d234b70', '2022-05-18 16:17:41'),
(35, 'testehex@teste', 'testehex', 'testehex', '202cb962ac59075b964b07152d234b70', '2022-05-30 16:59:07'),
(36, 'testehex@teste1', 'testehex1', 'testehex1', '202cb962ac59075b964b07152d234b70', '2022-05-30 17:01:48');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`parameter_id`),
  ADD KEY `parameter_fk_site_id` (`parameter_fk_site_id`);

--
-- Índices para tabela `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_fk_site_id` (`publication_fk_site_id`);

--
-- Índices para tabela `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`),
  ADD KEY `site_fk_user_id` (`site_fk_user_id`);

--
-- Índices para tabela `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`),
  ADD KEY `fk_user_id` (`social_fk_user_id`);

--
-- Índices para tabela `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggestion_id`),
  ADD KEY `suggestion_ibfk_1` (`suggestion_fk_user_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `parameter`
--
ALTER TABLE `parameter`
  MODIFY `parameter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `site`
--
ALTER TABLE `site`
  MODIFY `site_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `social`
--
ALTER TABLE `social`
  MODIFY `social_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `suggestion_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`parameter_fk_site_id`) REFERENCES `site` (`site_id`);

--
-- Limitadores para a tabela `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`publication_fk_site_id`) REFERENCES `site` (`site_id`);

--
-- Limitadores para a tabela `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`site_fk_user_id`) REFERENCES `user` (`user_id`);

--
-- Limitadores para a tabela `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`social_fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`suggestion_fk_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
