CREATE DATABASE IF NOT EXISTS  crud_web;

CREATE TABLE IF NOT EXISTS `crud_web`.`categorias` (
    `id` INT NOT NULL AUTO_INCREMENT, 
    `categoria` VARCHAR(45) NOT NULL, 
PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `crud_web`.`unidades_medidas` (
    `id` INT NOT NULL AUTO_INCREMENT, 
    `unidade_medida` VARCHAR(45) NOT NULL, 
PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `crud_web`.`produtos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `sku` VARCHAR(45) NOT NULL, 
    `valor` DECIMAL(10,2) NOT NULL, 
    `quantidade` INT NOT NULL,
    `unidade_medida_id` INT NOT NULL, 
    `categoria_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`unidade_medida_id`) REFERENCES `unidades_medidas`(`id`),
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`)
);

INSERT INTO `crud_web`.`unidades_medidas`(`unidade_medida`)
VALUES ('Un'),('Kg'),('g'),('L'),('mm'),('cm'),('m'),('m²');

INSERT INTO `crud_web`.`categorias`(`categoria`) 
VALUES ('Eletrônicos'),('Eletrodomésticos'),('Móveis'),('Decoração'),('Vestuário'),('Outros');
