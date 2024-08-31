INSERT INTO `crud_web`.`unidades_medidas`(`unidade_medida`)
VALUES ('Un'),('Kg'),('g'),('L'),('mm'),('cm'),('m'),('m²');

INSERT INTO `crud_web`.`categorias`(`categoria`) 
VALUES ('Eletrônicos'),('Eletrodomésticos'),('Móveis'),('Decoração'),('Vestuário'),('Outros');

INSERT INTO `crud_web`.`produtos`(`nome`, `sku`, `valor`, `quantidade`, `unidade_medida_id`, `categoria_id`)
VALUES ('Smartphone', '123456', 1500, 10, 1, 1),('Geladeira', '1234567', 2500, 5, 2, 2);
