select * from medicines

create table medicines (
	id INT NOT NULL AUTO_INCREMENT,
    cod BIGINT,
    name varchar(100),
    qtdmg varchar(20),
    lab varchar(100),
    val double,
    img varchar(200),
    PRIMARY KEY(id)
)


INSERT INTO medicines (cod, name, qtdmg, lab, val, img) VALUES (
	1,
    "Metformina 30 comprimidos",
    "500mg",
    "Generico MERCK",
    9.25,
    "..\/imgs\/medicines\/metformina.jpg"
)

INSERT INTO medicines (cod, name, qtdmg, lab, val, img) VALUES (
	2,
    "Enalapril 30 comprimidos",
    "20mg",
    "Generico MEDLEY",
    16.74,
    "..\/imgs\/medicines\/enalapril.jpg"
)

INSERT INTO medicines (cod, name, qtdmg, lab, val, img) VALUES (
	3,
    "Artrofan 30 capsulas",
    "500mg",
    "Flora Nativa do Brasil",
    31.90,
    "..\/imgs\/medicines\/artrofan.jpg"
)

create table cart (
	id INT NOT NULL AUTO_INCREMENT,
    userId INT,
    medCod INT
    PRIMARY KEY(id)
) 

select * from cart