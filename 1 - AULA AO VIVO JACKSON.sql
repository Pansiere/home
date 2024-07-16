CREATE DATABASE IF NOT EXISTS codifica;

USE codifica;

CREATE TABLE `codifica`.`filmes`
(
`id` INT NOT NULL AUTO_INCREMENT ,
`titulo` VARCHAR(255) NOT NULL ,
`titulo_original` VARCHAR(255) NOT NULL ,
`ano_lancamento` INT NOT NULL ,
`categoria` TEXT NOT NULL ,
`nota` DECIMAL(3,1) NOT NULL ,
`classificacao` INT NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE = InnoDB; 