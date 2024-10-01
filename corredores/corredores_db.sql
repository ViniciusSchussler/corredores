-- Este é um arquivo de exportação do phpMyAdmin
-- Ele contém informações sobre o banco de dados e suas tabelas.

-- Inicia uma transação
START TRANSACTION;

-- Configura o modo SQL e o fuso horário
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; 
SET time_zone = "+00:00";

-- Define a codificação para UTF-8 (para suportar caracteres especiais)
SET NAMES utf8mb4;

-- Cria um banco de dados chamado `corredores_db`
-- (a criação do banco de dados não está aqui, mas suponha que ele já exista)

-- Cria uma tabela chamada `corredores`
CREATE TABLE `corredores` (
  `id` int(11) NOT NULL,           -- ID do corredor (número inteiro)
  `nome` varchar(100) NOT NULL,    -- Nome do corredor (texto com até 100 caracteres)
  `email` varchar(100) NOT NULL,   -- Email do corredor (texto com até 100 caracteres)
  `idade` int(11) NOT NULL,        -- Idade do corredor (número inteiro)
  `tempo` decimal(5,2) NOT NULL,   -- Tempo de corrida (número decimal com até 5 dígitos, 2 após a vírgula)
  `senha` varchar(255) NOT NULL     -- Senha do corredor (texto com até 255 caracteres)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -- Usando o mecanismo InnoDB para a tabela

-- Insere dados na tabela `corredores`
INSERT INTO `corredores` (`id`, `nome`, `email`, `idade`, `tempo`, `senha`) VALUES
(2, 'vinicius', 'vinnyborgesschussler@gmail.com', 17, 12.00, '$2y$10$KFnHtrShdLL7mrlOID0tqOqtoHcHg44TPQQ2ilXF4DgcO0BhPa7cm');

-- Adiciona índices para a tabela `corredores`
ALTER TABLE `corredores`
  ADD PRIMARY KEY (`id`),            -- Define o ID como chave primária (única e não nula)
  ADD UNIQUE KEY `email` (`email`);  -- Define o email como chave única (não pode haver dois com o mesmo email)

-- Define que o campo `id` será auto-incrementado
ALTER TABLE `corredores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; -- O ID aumenta automaticamente para cada novo corredor

-- Finaliza a transação
COMMIT;
-- Este é um arquivo de exportação do phpMyAdmin
-- Ele contém informações sobre o banco de dados e suas tabelas.

-- Inicia uma transação
START TRANSACTION;

-- Configura o modo SQL e o fuso horário
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; 
SET time_zone = "+00:00";

-- Define a codificação para UTF-8 (para suportar caracteres especiais)
SET NAMES utf8mb4;

-- Cria um banco de dados chamado `corredores_db`
-- (a criação do banco de dados não está aqui, mas suponha que ele já exista)

-- Cria uma tabela chamada `corredores`
CREATE TABLE `corredores` (
  `id` int(11) NOT NULL,           -- ID do corredor (número inteiro)
  `nome` varchar(100) NOT NULL,    -- Nome do corredor (texto com até 100 caracteres)
  `email` varchar(100) NOT NULL,   -- Email do corredor (texto com até 100 caracteres)
  `idade` int(11) NOT NULL,        -- Idade do corredor (número inteiro)
  `tempo` decimal(5,2) NOT NULL,   -- Tempo de corrida (número decimal com até 5 dígitos, 2 após a vírgula)
  `senha` varchar(255) NOT NULL     -- Senha do corredor (texto com até 255 caracteres)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -- Usando o mecanismo InnoDB para a tabela

-- Insere dados na tabela `corredores`
INSERT INTO `corredores` (`id`, `nome`, `email`, `idade`, `tempo`, `senha`) VALUES
(2, 'vinicius', 'vinnyborgesschussler@gmail.com', 17, 12.00, '$2y$10$KFnHtrShdLL7mrlOID0tqOqtoHcHg44TPQQ2ilXF4DgcO0BhPa7cm');

-- Adiciona índices para a tabela `corredores`
ALTER TABLE `corredores`
  ADD PRIMARY KEY (`id`),            -- Define o ID como chave primária (única e não nula)
  ADD UNIQUE KEY `email` (`email`);  -- Define o email como chave única (não pode haver dois com o mesmo email)

-- Define que o campo `id` será auto-incrementado
ALTER TABLE `corredores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; -- O ID aumenta automaticamente para cada novo corredor

-- Finaliza a transação
COMMIT;
-- Este é um arquivo de exportação do phpMyAdmin
-- Ele contém informações sobre o banco de dados e suas tabelas.

-- Inicia uma transação
START TRANSACTION;

-- Configura o modo SQL e o fuso horário
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; 
SET time_zone = "+00:00";

-- Define a codificação para UTF-8 (para suportar caracteres especiais)
SET NAMES utf8mb4;

-- Cria um banco de dados chamado `corredores_db`
-- (a criação do banco de dados não está aqui, mas suponha que ele já exista)

-- Cria uma tabela chamada `corredores`
CREATE TABLE `corredores` (
  `id` int(11) NOT NULL,           -- ID do corredor (número inteiro)
  `nome` varchar(100) NOT NULL,    -- Nome do corredor (texto com até 100 caracteres)
  `email` varchar(100) NOT NULL,   -- Email do corredor (texto com até 100 caracteres)
  `idade` int(11) NOT NULL,        -- Idade do corredor (número inteiro)
  `tempo` decimal(5,2) NOT NULL,   -- Tempo de corrida (número decimal com até 5 dígitos, 2 após a vírgula)
  `senha` varchar(255) NOT NULL     -- Senha do corredor (texto com até 255 caracteres)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -- Usando o mecanismo InnoDB para a tabela

-- Insere dados na tabela `corredores`
INSERT INTO `corredores` (`id`, `nome`, `email`, `idade`, `tempo`, `senha`) VALUES
(2, 'vinicius', 'vinnyborgesschussler@gmail.com', 17, 12.00, '$2y$10$KFnHtrShdLL7mrlOID0tqOqtoHcHg44TPQQ2ilXF4DgcO0BhPa7cm');

-- Adiciona índices para a tabela `corredores`
ALTER TABLE `corredores`
  ADD PRIMARY KEY (`id`),            -- Define o ID como chave primária (única e não nula)
  ADD UNIQUE KEY `email` (`email`);  -- Define o email como chave única (não pode haver dois com o mesmo email)

-- Define que o campo `id` será auto-incrementado
ALTER TABLE `corredores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; -- O ID aumenta automaticamente para cada novo corredor

-- Finaliza a transação
COMMIT;
