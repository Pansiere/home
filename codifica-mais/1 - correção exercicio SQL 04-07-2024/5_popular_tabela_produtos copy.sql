-- Uso do banco de dados
USE gestao_produtos;

-- Inserção de dados na tabela produtos
INSERT INTO produtos (sku, nome, descricao, categoria_id, preco, unidade_medida_id, peso, quantidade_estoque, fabricante_id, fornecedor_id)
VALUES
('SKU001', 'Livro "A Arte da Guerra"', 'Livro clássico de estratégia militar escrito por Sun Tzu.', 5, 29.90, 1, 0.5, 200, 5, 5),
('SKU002', 'Smartphone Samsung Galaxy S20', 'Smartphone com tela de 6.2", 128GB de armazenamento e câmera de 64MP.', 2, 4299.00, 1, 0.4, 100, 2, 2),
('SKU003', 'Notebook Dell Inspiron 15', 'Notebook com processador Intel Core i5, 8GB de RAM e SSD 256GB.', 1, 3799.99, 1, 2.0, 50, 1, 1),
('SKU004', 'Cafeteira Nespresso Essenza Mini', 'Cafeteira automática compacta para cápsulas de café Nespresso.', 4, 599.99, 1, 3.0, 80, 4, 4),
('SKU005', 'Televisor LG OLED 55"', 'Televisor OLED com resolução 4K, HDR e inteligência artificial ThinQ AI.', 3, 5999.90, 1, 20.0, 30, 3, 3),
('SKU006', 'Livro "PHP & MySQL: Server-Side Web Development"', 'Aprenda PHP, a linguagem de programação usada para criar sites como Facebook, Wikipedia e WordPress, e depois descubra como esses sites armazenam informações em um banco de dados (MySQL) e usam o banco de dados para criar páginas da web.', 5, 29.90, 1, 0.5, 200, 5, 5),
('SKU007', 'Monitor Dell UltraSharp 27"', 'Monitor IPS com resolução QHD, ideal para trabalho e entretenimento.', 1, 2399.00, 1, 5.0, 40, 1, 1),
('SKU008', 'Impressora Samsung Laser ProXpress', 'Impressora laser monocromática de alto desempenho para escritórios.', 2, 1299.00, 1, 15.0, 60, 2, 2),
('SKU009', 'Aspirador de Pó LG Cyclone', 'Aspirador de pó com tecnologia Cyclone e filtro HEPA para máxima eficiência.', 4, 699.90, 1, 8.0, 30, 3, 3),
('SKU010', 'Forno Elétrico Electrolux Gourmet', 'Forno elétrico com capacidade de 50 litros e diversas funções de cozimento.', 3, 1499.99, 1, 12.0, 20, 5, 4),
('SKU011', 'Livro "Python Programming for Beginners"', 'Guia completo para iniciantes aprenderem programação em Python.', 5, 39.90, 1, 0.7, 150, 5, 5),
('SKU012', 'Smart TV Samsung QLED 65"', 'Smart TV QLED com resolução 8K, HDR 2000 e sistema operacional Tizen.', 3, 8999.00, 1, 30.0, 10, 2, 2),
('SKU013', 'Câmera Nikon D850', 'Câmera DSLR profissional com sensor CMOS de 45.7MP e gravação de vídeo 4K UHD.', 2, 9999.99, 1, 2.0, 5, 6, 1),
('SKU014', 'Liquidificador Philips Walita', 'Liquidificador potente com motor de 1000W e lâminas ProBlend 6.', 4, 299.00, 1, 2.5, 80, 4, 3),
('SKU015', 'HD Externo Seagate Backup Plus 2TB', 'HD externo portátil com capacidade de 2TB e conexão USB 3.0.', 1, 499.90, 1, 0.2, 100, 1, 2),
('SKU016', 'Cadeira Gamer DXRacer', 'Cadeira gamer ergonômica com suporte lombar e ajustes múltiplos.', 5, 1199.00, 1, 15.0, 50, 5, 4),
('SKU017', 'Fone de Ouvido Sony WH-1000XM4', 'Fone de ouvido Bluetooth com cancelamento de ruído adaptativo e áudio de alta resolução.', 2, 1499.00, 1, 0.3, 200, 2, 1),
('SKU018', 'Panela Elétrica de Arroz Panasonic', 'Panela elétrica automática para preparo de arroz, ideal para famílias.', 4, 199.99, 1, 3.0, 30, 3, 3),
('SKU019', 'Roteador TP-Link Archer AX6000', 'Roteador Wi-Fi 6 de alta velocidade para redes domésticas e escritórios.', 1, 799.00, 1, 1.0, 15, 4, 2),
('SKU020', 'Smartwatch Apple Watch Series 7', 'Smartwatch com tela Retina sempre ativa, GPS integrado e resistência à água.', 5, 2799.00, 1, 0.1, 80, 5, 5),
('SKU021', 'Secador de Cabelo Taiff Black', 'Secador profissional com motor AC e tecnologia Ceramic Ion.', 3, 399.90, 1, 1.2, 40, 3, 4),
('SKU022', 'Livro "Inteligência Artificial: Uma Abordagem de Aprendizado de Máquina"', 'Guia essencial para entender conceitos de IA e aprendizado de máquina.', 5, 49.90, 1, 0.8, 120, 5, 5),
('SKU023', 'Geladeira Brastemp Inverse', 'Geladeira frost free com capacidade de 573 litros e freezer na parte inferior.', 4, 6999.00, 1, 110.0, 10, 3, 3),
('SKU024', 'Notebook Asus ROG Zephyrus', 'Notebook gamer com processador AMD Ryzen 9, GPU NVIDIA GeForce RTX 3080 e tela de 15.6".', 1, 8999.99, 1, 2.1, 25, 6, 2),
('SKU025', 'Máquina de Lavar Electrolux Turbo Economia', 'Máquina de lavar com capacidade de 10kg e eficiência energética A+++.', 4, 1899.00, 1, 70.0, 15, 5, 4),
('SKU026', 'Tablet Apple iPad Pro', 'Tablet com tela Liquid Retina de 11", chip M1, 128GB de armazenamento e suporte a Apple Pencil.', 5, 6999.00, 1, 0.5, 30, 5, 5),
('SKU027', 'Caixa de Som JBL Charge 5', 'Caixa de som Bluetooth portátil à prova dágua com bateria de longa duração.', 3, 899.00, 1, 0.9, 100, 4, 3),
('SKU028', 'Mouse Logitech MX Master 3', 'Mouse ergonômico avançado com conectividade Bluetooth e USB-C.', 1, 499.90, 1, 0.1, 200, 1, 2),
('SKU029', 'Cadeira de Escritório Ergonômica', 'Cadeira de escritório com encosto ajustável e suporte para lombar.', 5, 799.00, 1, 12.0, 50, 5, 4),
('SKU030', 'Liquidificador Osterizer', 'Liquidificador com motor potente e lâmina de aço inoxidável.', 4, 249.00, 1, 2.0, 80, 3, 1),
('SKU031', 'Forno Micro-ondas Panasonic', 'Micro-ondas com capacidade de 30 litros e diversas funções de cozimento.', 4, 599.90, 1, 15.0, 40, 3, 3),
('SKU032', 'Headset Gamer HyperX Cloud Alpha', 'Headset com áudio surround 7.1 e microfone removível com cancelamento de ruído.', 2, 599.00, 1, 0.7, 150, 6, 2),
('SKU033', 'Mochila Executiva Dell Essential', 'Mochila para notebooks de até 15.6" com compartimentos organizadores.', 5, 149.90, 1, 0.8, 120, 5, 5),
('SKU034', 'Smart TV LG NanoCell 75"', 'Smart TV NanoCell com resolução 4K, HDR 10 Pro e sistema operacional webOS.', 3, 4999.00, 1, 30.0, 10, 3, 3),
('SKU035', 'Teclado Mecânico Corsair K95 RGB Platinum', 'Teclado mecânico com switches Cherry MX Speed e retroiluminação RGB.', 1, 899.90, 1, 1.3, 80, 1, 4),
('SKU036', 'Ferro de Passar a Vapor Philips Walita', 'Ferro de passar a vapor com base de cerâmica e função autolimpante.', 4, 179.00, 1, 1.0, 200, 4, 3),
('SKU037', 'Câmera GoPro Hero 10 Black', 'Câmera de ação com captura de vídeo 5.3K e fotos de 23MP, à prova dágua até 10m.', 2, 2299.00, 1, 0.2, 50, 2, 2),
('SKU038', 'Batedeira Planetária KitchenAid', 'Batedeira com movimento planetário e 10 velocidades.', 4, 999.00, 1, 5.0, 60, 3, 1),
('SKU039', 'Notebook Lenovo ThinkPad X1 Carbon', 'Notebook ultraleve com tela de 14", processador Intel Core i7 e SSD 512GB.', 1, 7999.99, 1, 1.1, 30, 2, 2),
('SKU040', 'Ventilador de Teto Arno Ultimate', 'Ventilador de teto com design moderno e controle remoto.', 4, 299.90, 1, 7.0, 100, 3, 3),
('SKU041', 'Monitor Gamer Alienware 34"', 'Monitor curvo ultrawide com taxa de atualização de 144Hz e resolução WQHD.', 1, 3499.00, 1, 9.0, 20, 5, 4),
('SKU042', 'Smartphone Motorola Moto G Power', 'Smartphone com bateria de longa duração, tela Max Vision de 6.6" e câmera de 48MP.', 2, 1599.00, 1, 0.2, 80, 6, 1),
('SKU043', 'Cafeteira Oster Prima Latte II', 'Cafeteira automática com função de preparo de café espresso, cappuccino e latte.', 4, 699.99, 1, 4.0, 50, 3, 3),
('SKU044', 'Projetor Epson PowerLite X49+', 'Projetor 3LCD com resolução XGA, 3600 lumens e conectividade wireless.', 3, 2499.00, 1, 2.5, 30, 1, 2),
('SKU045', 'Livro "JavaScript: The Good Parts"', 'Livro sobre as partes boas do JavaScript, escrito por Douglas Crockford.', 5, 49.90, 1, 0.5, 150, 5, 5),
('SKU046', 'Caixa Térmica Coleman Xtreme 70QT', 'Caixa térmica com capacidade para 66 litros e isolamento térmico de até 5 dias.', 4, 499.00, 1, 7.5, 40, 4, 3),
('SKU047', 'Monitor LG UltraGear 27"', 'Monitor gamer IPS com taxa de atualização de 144Hz e tempo de resposta de 1ms.', 1, 1799.00, 1, 6.0, 60, 3, 1),
('SKU048', 'Fone de Ouvido Bose QuietComfort 45', 'Fone de ouvido Bluetooth com cancelamento de ruído avançado.', 2, 1299.00, 1, 0.3, 100, 2, 2),
('SKU049', 'Lavadora de Alta Pressão Karcher K3', 'Lavadora de alta pressão com motor de 1600W e pressão máxima de 1800 psi.', 4, 799.00, 1, 10.0, 20, 6, 4),
('SKU050', 'Console Xbox Series X', 'Console de nova geração com suporte a 4K, SSD de 1TB e tecnologia ray tracing.', 3, 4499.00, 1, 4.5, 30, 5, 3);
