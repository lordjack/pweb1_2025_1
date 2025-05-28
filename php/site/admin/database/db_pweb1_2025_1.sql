-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------


-- Copiando estrutura do banco de dados para db_pweb1_2025_1
CREATE DATABASE IF NOT EXISTS `db_pweb1_2025_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pweb1_2025_1`;

-- Copiando estrutura para tabela db_pweb1_2025_1.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `cpf` varchar(16) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

