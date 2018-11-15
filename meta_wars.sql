/*DROP DATABASE meta_wars;*/
CREATE DATABASE IF NOT EXISTS meta_wars;

USE meta_wars;

/*Crea tablas sin dependencias*/

CREATE TABLE profesor(
	acceso INT NOT NULL,
    CONSTRAINT pk_profesor PRIMARY KEY (acceso)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE test(
	id_test INT NOT NULL AUTO_INCREMENT,
    aciertos INT NOT NULL,
    CONSTRAINT pk_test PRIMARY KEY (id_test)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE carta(
	nombre VARCHAR(20) NOT NULL,
    CONSTRAINT pk_carta PRIMARY KEY (nombre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Crea tablas de relaciones uno a varios*/

CREATE TABLE grupo(
	id_grupo VARCHAR(4) NOT NULL,
    carrera VARCHAR(35) NOT NULL,
    semestre INT NOT NULL,
    profesor_clave_acceso INT NOT NULL,
	PRIMARY KEY (id_grupo),
    CONSTRAINT fk_profesor FOREIGN KEY (profesor_clave_acceso) REFERENCES profesor(acceso)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE alumno(
	no_boleta VARCHAR(10) NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellido_paterno VARCHAR(30) NOT NULL,
    apellido_materno VARCHAR(30) NOT NULL,
    grupo_id VARCHAR(4) NOT NULL,
    PRIMARY KEY (no_boleta, grupo_id),
    CONSTRAINT fk_grupo FOREIGN KEY (grupo_id) REFERENCES grupo(id_grupo)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE test_inicial(
	dia INT NOT NULL,
    mes INT NOT NULL,
    anne INT NOT NULL,
    alumno_no_boleta VARCHAR(10) NOT NULL,
    test_id INT NOT NULL AUTO_INCREMENT,
    CONSTRAINT pk_test_final PRIMARY KEY (test_id,alumno_no_boleta),
    CONSTRAINT fk_alumno FOREIGN KEY (alumno_no_boleta) REFERENCES alumno(no_boleta),
    CONSTRAINT fk_test FOREIGN KEY (test_id) REFERENCES test(id_test)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE test_final(
	disponibilidad INT NOT NULL,
    alumno_no_boleta VARCHAR(10) NOT NULL,
    test_id INT NOT NULL,
    PRIMARY KEY (test_id,alumno_no_boleta),
    CONSTRAINT fk_alumno_final FOREIGN KEY (alumno_no_boleta) REFERENCES alumno(no_boleta),
    CONSTRAINT fk_test_final FOREIGN KEY (test_id) REFERENCES test(id_test)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pregunta (
	id INT NOT NULL AUTO_INCREMENT,
    texto VARCHAR(80) NOT NULL,
    respuesta VARCHAR(50) NOT NULL,
    opcion_1 VARCHAR(50) NOT NULL,
    opcion_2 VARCHAR(50) NOT NULL,
    opcion_3 VARCHAR(50) NOT NULL,
    CONSTRAINT pk_pregunta PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLe preguntas(
	pregunta_id INT NOT NULL,
    test_id INT NOT NULL,
    PRIMARY KEY (test_id),
    CONSTRAINT pk_pregunta FOREIGN KEY (pregunta_id) REFERENCES pregunta(id),
    CONSTRAINT pk_test FOREIGN KEY (test_id) REFERENCES test(id_test)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mazo(
	id INT NOT NULL AUTO_INCREMENT,
    alumno_no_boleta VARCHAR(10) NOT NULL,
    CONSTRAINT pk_mazo PRIMARY KEY (id),
    CONSTRAINT fk_alumno_mazo FOREIGN KEY (alumno_no_boleta) REFERENCES alumno(no_boleta)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE cartas(
	mazo_id INT NOT NULL AUTO_INCREMENT,
    carta_nombre VARCHAR(25) NOT NULL,
    PRIMARY KEY (mazo_id,carta_nombre),
    CONSTRAINT fk_mazo FOREIGN KEY (mazo_id) REFERENCES mazo(id),
    CONSTRAINT fk_carta_cartas FOREIGN KEY (carta_nombre) REFERENCES carta(nombre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mutacion(
	efecto VARCHAR(50) NOT NULL,
    categoria VARCHAR(30) NOT NULL,
    carta_nombre VARCHAR(25) NOT NULL,
    PRIMARY KEY (carta_nombre),
	CONSTRAINT fk_carta_mutacion FOREIGN KEY (carta_nombre) REFERENCES carta(nombre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE gen(
	atributos VARCHAR(30) NOT NULL,
    puntos_reaccion INT NOT NULL,
    descripcion VARCHAR(40),
    carta_nombre VARCHAR(20) NOT NULL,
    PRIMARY KEY (carta_nombre),
	CONSTRAINT fk_carta_gen FOREIGN KEY (carta_nombre) REFERENCES carta(nombre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE guerrero(
	puntos_ataque INT NOT NULL,
    metabolito VARCHAR(25) NOT NULL,
    gen_nombre VARCHAR(20) NOT NULL,
    defensor_nombre VARCHAR(25),
    PRIMARY KEY (gen_nombre),
	CONSTRAINT pk_gen FOREIGN KEY (gen_nombre) REFERENCES gen(carta_nombre)
    /*CONSTRAINT fk_defensor FOREIGN KEY (defensor_nombre) REFERENCES defensor(gen_nombre)*/
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE defensor(
	puntos_defensa INT NOT NULL,
    puntos_vida INT NOT NULL,
    aura VARCHAR(25) NOT NULL,
    enzima VARCHAR(25) NOT NULL,
    gen_nombre VARCHAR(20) NOT NULL,
    guerrero_nombre VARCHAR(25),
    PRIMARY KEY (gen_nombre),
	CONSTRAINT pk_gen_defensor FOREIGN KEY (gen_nombre) REFERENCES gen(carta_nombre)
    /*CONSTRAINT fk_gerrero FOREIGN KEY (defensor_nombre) REFERENCES guerrero(gen_nombre)]*/
)ENGINE=InnoDB DEFAULT CHARSET=utf8;