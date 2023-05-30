-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Maio-2023 às 04:32
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP SCHEMA IF EXISTS `maverickdb` ;

create database maverickdb;
use maverickdb;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maverickdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `pk_adm` int(10) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`pk_adm`, `nome`, `email`, `senha`) VALUES
(1, 'RENATO VITURINO', 'adm@email.com', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aeroportos`
--

CREATE TABLE `aeroportos` (
  `pk_aeroportos` int(10) NOT NULL,
  `lista_aeroportos` varchar(150) DEFAULT NULL,
  `estado` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aeroportos`
--

INSERT INTO `aeroportos` (`pk_aeroportos`, `lista_aeroportos`, `estado`) VALUES
(1, 'Aeroporto de São Paulo/Congonhas (CGH)', 'SP'),
(2, 'Aeroporto Internacional de Guarulhos (GRU)', 'SP'),
(3, 'Aeroporto do campo de marte (RTE)', 'SP'),
(4, 'Aeroporto Internacional Tom Jobim/Galeão (GIG)', 'RJ'),
(5, 'Aeroporto Santos Dumont (SDU)', 'RJ'),
(6, 'Aeroporto Internacional De Confins - Tancredo Neves (CNF)', 'MG'),
(7, 'Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)', 'BA'),
(8, 'Aeroporto Jorge Amado/Ilhéus (IOS)', 'BA'),
(9, 'Aeroporto de Teresina - Senador Petrônio Portela (SBTE)', 'PI'),
(10, 'Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)', 'PI'),
(11, 'Aeroporto Internacional De Aracaju - Santa Maria (AJU)', 'SE'),
(12, 'Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)', 'AL'),
(13, 'Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)', 'PE'),
(14, 'Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)', 'PB'),
(15, 'Aeroporto De Campina Grande - João Suassuna (CPV)', 'PB'),
(16, 'Aeroporto Internacional de Natal (NAT)', 'RN'),
(17, 'Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)', 'CE'),
(18, 'Aeroporto Internacional Marechal Cunha Machado (SLZ)', 'MA'),
(19, 'Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)', 'PA'),
(20, 'Aeroporto Internacional de Tabatinga (TBT)', 'AM'),
(21, 'Aeroporto internacional de Manaus - Eduardo Gomes (MAO)', 'AM'),
(22, 'Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)', 'RR'),
(23, 'Aeroporto Internacional de Cruzeiro do Sul(CZS)', 'AC'),
(24, 'Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)', 'AC'),
(25, 'Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)', 'RO'),
(26, 'Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)', 'MT'),
(27, 'Aeroporto Internacional de Campo Grande (CGR)', 'MS'),
(28, 'Aeroporto Internacional de Corumbá (CMG)', 'MS'),
(29, 'Aeroporto Internacional Afonso Pena - Curitiba (CWB)', 'PR'),
(30, 'Aeroporto de Londrina Gov. Jose Richa (LDB)', 'PR'),
(31, 'Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)', 'SC'),
(32, 'Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)', 'SC'),
(33, 'Aeroporto Internacional Porto Alegre Salgado Filho (POA)', 'RS'),
(34, 'Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)', 'RS'),
(35, 'Aeroporto Internacional Eurico de Aguiar Sales (VIX)', 'ES'),
(36, 'Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)', 'GO'),
(37, 'Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)', 'DF'),
(38, 'Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)', 'AP'),
(39, 'Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviao`
--

CREATE TABLE `aviao` (
  `pk_aviao` int(10) NOT NULL,
  `num_serie` char(5) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `num_assento` char(3) DEFAULT NULL,
  `operacao` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aviao`
--

INSERT INTO `aviao` (`pk_aviao`, `num_serie`, `modelo`, `num_assento`, `operacao`) VALUES
(1, 'PEWFE', 'REFERENCE', '489', '1'),
(2, 'PEWBE', 'ATIKISON', '512', '1'),
(3, 'PEBCD', 'MAVERICK', '500', '1'),
(4, 'fdrxt', 'sei la', '110', '1'),
(5, '11111', 'SUNNY', '100', '1'),
(6, '20233', 'PUNK', '200', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `pk_cadastro` int(10) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `funcionamento` enum('0','1') DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `desativado` datetime DEFAULT NULL,
  `reativado` datetime DEFAULT NULL,
  `fk_cliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`pk_cadastro`, `email`, `senha`, `funcionamento`, `criado`, `modificado`, `desativado`, `reativado`, `fk_cliente`) VALUES
(1, 'dante@email.com', '5f1dd4bd3a32258eed16c4c352699b0875bced8e', '1', '2023-05-07 14:34:53', NULL, NULL, NULL, 1),
(2, 'renato@email.com', '8cb2237d0679ca88db6464eac60da96345513964', '1', '2023-05-07 21:47:53', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `pk_cliente` int(10) NOT NULL,
  `sobrenome` varchar(150) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `data_nasci` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`pk_cliente`, `sobrenome`, `nome`, `cpf`, `data_nasci`) VALUES
(1, 'FERNANDES BARROS', 'DANTE', '75368111525', '2003-04-15'),
(2, 'VITURINO', 'RENATO', '11144477735', '2005-05-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_cliente`
--

CREATE TABLE `contato_cliente` (
  `pk_contato` int(10) NOT NULL,
  `telefone` char(10) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `fk_cliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contato_cliente`
--

INSERT INTO `contato_cliente` (`pk_contato`, `telefone`, `celular`, `fk_cliente`) VALUES
(1, '', '11967154425', 1),
(2, '1112345678', '11912345678', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `pk_endereco` int(10) NOT NULL,
  `cep` char(8) DEFAULT NULL,
  `rua` varchar(150) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT NULL,
  `fk_cliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`pk_endereco`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `fk_cliente`) VALUES
(1, '04235460', 'RUA DA MINA CENTRAL', 12, 'CIDADE NOVA HELIOPOLIS', 'SAO PAULO', 'SP', 1),
(2, '04837130', 'RUA MICRONESIA', 12, 'VILA QUINTANA', 'SAO PAULO', 'SP', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao_voo`
--

CREATE TABLE `gestao_voo` (
  `pk_voo` int(10) NOT NULL,
  `local_voo` varchar(150) DEFAULT NULL,
  `local_pouso` varchar(150) DEFAULT NULL,
  `hora_partida` datetime DEFAULT NULL,
  `hora_chegada` datetime DEFAULT NULL,
  `quant_animal` tinyint not null,
  `fk_aviao` int(10) DEFAULT NULL,
  `fk_aeroportos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestao_voo`
--

INSERT INTO `gestao_voo` (`pk_voo`, `local_voo`, `local_pouso`, `hora_partida`, `hora_chegada`, `quant_animal`, `fk_aviao`, `fk_aeroportos`) VALUES
(1, 'Aeroporto de São Paulo/Congonhas (CGH)', 'Aeroporto Jorge Amado/Ilhéus (IOS)', '2023-05-10 15:45:00', '2023-05-10 16:50:00', 0, 1, NULL),
(2, 'Aeroporto de São Paulo/Congonhas (CGH)', 'Aeroporto Jorge Amado/Ilhéus (IOS)', '2023-05-10 10:45:00', '2023-05-10 11:45:00', 0, 2, NULL),
(3, 'Aeroporto Jorge Amado/Ilhéus (IOS)', 'Aeroporto de São Paulo/Congonhas (CGH)', '2023-05-20 15:45:00', '2023-05-20 16:50:00', 0, 3, NULL),
(4, 'Aeroporto de São Paulo/Congonhas (CGH)', 'Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)', '2023-05-15 10:50:00', '2023-05-15 14:52:00', 0, 4, 1),
(5, 'Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)', 'Aeroporto de São Paulo/Congonhas (CGH)', '2023-05-31 15:20:00', '2023-05-31 18:20:00', 0, 5, 7),
(6, 'Aeroporto Internacional de Guarulhos (GRU)', 'Aeroporto Santos Dumont (SDU)', '2023-05-31 18:00:00', '2023-05-31 20:45:00', 0, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg_cliente`
--

CREATE TABLE `msg_cliente` (
  `pk_msg` int(10) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `msg` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `msg_cliente`
--

INSERT INTO `msg_cliente` (`pk_msg`, `email`, `msg`) VALUES
(1, 'renato@email.com', 'excelente serviço!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `pk_pag` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `forma_pag` enum('CREDITO','DEBITO','PIX') DEFAULT NULL,
  `valor_pag` decimal(6,2) DEFAULT NULL,
  `data_pag` datetime DEFAULT NULL,
  `fk_passagem` int(10) DEFAULT NULL,
  `fk_passagem_animal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`pk_pag`, `forma_pag`, `valor_pag`, `data_pag`, `fk_passagem`) VALUES
(1, 'CREDITO', '988.95', '2023-05-07 15:28:55', 1),
(2, 'CREDITO', '988.95', '2023-05-07 21:53:18', 5),
(3, 'CREDITO', '988.95', '2023-05-07 21:53:18', 6),
(4, 'CREDITO', '988.95', '2023-05-07 23:20:51', 7),
(5, 'CREDITO', '988.95', '2023-05-07 23:20:51', 8),
(6, 'CREDITO', '988.95', '2023-05-07 23:20:51', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagem`
--

CREATE TABLE `passagem` (
  `pk_passagem` int(10) NOT NULL,
  `sobrenome` varchar(150) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `cpf_passagem` char(11) DEFAULT NULL,
  `poltrona_ida` char(3) DEFAULT NULL,
  `poltrona_volta` char(3) DEFAULT NULL,
  `fk_cliente` int(10) DEFAULT NULL,
  `aviao_ida` int(10) DEFAULT NULL,
  `aviao_volta` int(10) DEFAULT NULL,
  `cancelado` enum('SIM','NAO') NOT NULL DEFAULT 'NAO',
  `data_cancel` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `passagem_animal` (
  `pk_passagem_animal` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `data_nasc` DATE NOT NULL,
  `aviao_ida` int(10) DEFAULT NULL,
  `aviao_volta` int(10) DEFAULT NULL,
  `cancelado` enum('SIM','NAO') NOT NULL DEFAULT 'NAO',
  `data_cancel` datetime DEFAULT NULL,
  `fk_cliente` int(10) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Extraindo dados da tabela `passagem`
--

INSERT INTO `passagem` (`pk_passagem`, `sobrenome`, `nome`, `cpf_passagem`, `poltrona_ida`, `poltrona_volta`, `fk_cliente`, `aviao_ida`, `aviao_volta`, `cancelado`, `data_cancel`) VALUES
(1, 'FERNANDES BARROS', 'DANTE', '75368111525', '15', '88', 1, 4, 5, 'NAO', '2023-05-07 18:52:39'),
(5, 'VITURINO', 'RENATO', '11144477735', '1', '12', 2, 1, 3, 'NAO', NULL),
(6, 'VITURINO', 'ELLEN', '89702836093', '2', '11', 2, 1, 3, 'NAO', NULL),
(7, 'CASMURRO', 'DOM', '15493154048', '7', '1', 2, 1, 3, 'NAO', NULL),
(8, 'TORETTO', 'DOMINIC', '74802720068', '8', '2', 2, 1, 3, 'NAO', NULL),
(9, 'MCDONALD', 'DONALD', '77953353067', '9', '3', 2, 1, 3, 'NAO', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rg`
--

CREATE TABLE `rg` (
  `pk_rg` int(10) NOT NULL,
  `rg` char(9) DEFAULT NULL,
  `emissao_rg` date DEFAULT NULL,
  `fk_cliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `rg`
--

INSERT INTO `rg` (`pk_rg`, `rg`, `emissao_rg`, `fk_cliente`) VALUES
(1, '244213021', '2020-03-18', 1),
(2, '626339212', '2023-05-02', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`pk_adm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `aeroportos`
--
ALTER TABLE `aeroportos`
  ADD PRIMARY KEY (`pk_aeroportos`);

--
-- Índices para tabela `aviao`
--
ALTER TABLE `aviao`
  ADD PRIMARY KEY (`pk_aviao`);

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`pk_cadastro`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`pk_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `contato_cliente`
--
ALTER TABLE `contato_cliente`
  ADD PRIMARY KEY (`pk_contato`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`pk_endereco`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `gestao_voo`
--
ALTER TABLE `gestao_voo`
  ADD PRIMARY KEY (`pk_voo`),
  ADD KEY `fk_aviao` (`fk_aviao`),
  ADD KEY `fk_aeroportos` (`fk_aeroportos`);

--
-- Índices para tabela `msg_cliente`
--
ALTER TABLE `msg_cliente`
  ADD PRIMARY KEY (`pk_msg`);

--
-- Índices para tabela `pagamento`
--

--
-- Índices para tabela `passagem`
--
ALTER TABLE `passagem`
  ADD PRIMARY KEY (`pk_passagem`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `aviao_ida` (`aviao_ida`),
  ADD KEY `aviao_volta` (`aviao_volta`);

--
-- Índices para tabela `rg`
--
ALTER TABLE `rg`
  ADD PRIMARY KEY (`pk_rg`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `pk_adm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `aeroportos`
--
ALTER TABLE `aeroportos`
  MODIFY `pk_aeroportos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `aviao`
--
ALTER TABLE `aviao`
  MODIFY `pk_aviao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `pk_cadastro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `pk_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contato_cliente`
--
ALTER TABLE `contato_cliente`
  MODIFY `pk_contato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `pk_endereco` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `gestao_voo`
--
ALTER TABLE `gestao_voo`
  MODIFY `pk_voo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `msg_cliente`
--
ALTER TABLE `msg_cliente`
  MODIFY `pk_msg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagamento`
--

--
-- AUTO_INCREMENT de tabela `passagem`
--
ALTER TABLE `passagem`
  MODIFY `pk_passagem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `rg`
--
ALTER TABLE `rg`
  MODIFY `pk_rg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD CONSTRAINT `cadastro_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);

--
-- Limitadores para a tabela `contato_cliente`
--
ALTER TABLE `contato_cliente`
  ADD CONSTRAINT `contato_cliente_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);

--
-- Limitadores para a tabela `gestao_voo`
--
ALTER TABLE `gestao_voo`
  ADD CONSTRAINT `fk_aeroportos` FOREIGN KEY (`fk_aeroportos`) REFERENCES `aeroportos` (`pk_aeroportos`),
  ADD CONSTRAINT `gestao_voo_ibfk_1` FOREIGN KEY (`fk_aviao`) REFERENCES `aviao` (`pk_aviao`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`fk_passagem`) REFERENCES `passagem` (`pk_passagem`);
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`fk_passagem_animal`) REFERENCES `passagem_animal` (`pk_passagem_animal`);

--
-- Limitadores para a tabela `passagem`
--
ALTER TABLE `passagem`
  ADD CONSTRAINT `passagem_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`),
  ADD CONSTRAINT `passagem_ibfk_2` FOREIGN KEY (`aviao_ida`) REFERENCES `aviao` (`pk_aviao`),
  ADD CONSTRAINT `passagem_ibfk_3` FOREIGN KEY (`aviao_volta`) REFERENCES `aviao` (`pk_aviao`);

ALTER TABLE `passagem_animal`
  ADD CONSTRAINT `passagem_animal_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);

--
-- Limitadores para a tabela `rg`
--
ALTER TABLE `rg`
  ADD CONSTRAINT `rg_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`pk_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


select * from aeroportos;