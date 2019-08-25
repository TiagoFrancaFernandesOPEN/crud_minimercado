


##  Desenvolva um programa para um mercado que permita 
//TODO * cadastro dos produtos, //DONE
//TODO * dos tipos de cada produto//DONE
//TODO * dos valores percentuais de imposto dos tipos de produtos,//DONE

a tela de venda
//TODO * onde será informado os produtos e quantidades adquiridos, 

//TODO * 
# o sistema deve apresentar
//TODO  o valor de cada item multiplicado pela quantidade adquirida e a quantidade pago de imposto em cada item, 
//TODO * um totalizador do valor da compra e 
//TODO * um totalizador do valor dos impostos.


## ## ## ## ## ##
## SQL
DROP TABLE IF EXISTS `impostos`;
CREATE TABLE impostos (
    ID int NOT NULL AUTO_INCREMENT UNIQUE,
    imposto_nome varchar(255),
    imposto_regra varchar(255) UNIQUE,
    tipo_calculo  varchar(50),
    valor  int,
    PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE produtos (
    ID int NOT NULL AUTO_INCREMENT UNIQUE,
    cod_produto int NOT NULL,
    nome varchar(255),
    status varchar(255),
    estoque int,
    tipo  varchar(50),
    PRIMARY KEY (ID)
);
