-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2024 às 14:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testedrive`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registo`
--

CREATE TABLE `registo` (
  `id` int(11) NOT NULL,
  `nome` varchar(24) NOT NULL,
  `sobrenome` varchar(24) NOT NULL,
  `email` varchar(124) NOT NULL,
  `senha` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(3, 'Alberto', 'Antonio', 'alberto@gmail.com', '5ed8c26ec8691bde961f628412d93c68'),
(4, 'Jonatan', 'Henrique', 'jonatan@gmail.com', '89e6d2b383471fc370d828e552c19e65'),
(5, 'Jonatan', 'fawfwa', 'c@gawg.com', '89e6d2b383471fc370d828e552c19e65'),
(6, 'Jonatan', 'a', 'jonatan@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Algusto', 'Henrique', 'algusto@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Mustafar', 'Alamud', 'mustafar@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'Jose', 'Murias', 'josemurias@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `email` char(124) NOT NULL,
  `veiculo` char(32) NOT NULL,
  `pickupDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `dropoffDate` date NOT NULL,
  `dropoffTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `email`, `veiculo`, `pickupDate`, `pickupTime`, `dropoffDate`, `dropoffTime`) VALUES
(1, 'alberto@gmail.com', 'tomaso', '2024-02-14', '08:00:00', '2024-02-21', '09:00:00'),
(2, 'jonatan@gmail.com', 'pagani', '2024-02-22', '07:00:00', '2024-02-29', '12:00:00'),
(3, 'alberto@gmail.com', 'drako', '2024-02-09', '08:30:00', '2024-02-29', '09:30:00'),
(4, 'josemurias@gmail.com', 'ferrari', '2024-02-08', '08:00:00', '2024-02-28', '09:30:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registo`
--
ALTER TABLE `registo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registo`
--
ALTER TABLE `registo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
