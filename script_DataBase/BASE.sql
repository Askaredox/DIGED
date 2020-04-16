-- create database DIGED;
-- use DIGED;
-- PRIMARY KEY (per),
-- FOREIGN KEY (dep) REFERENCES departamentos(dep)
-- DROP TABLE DETALLE_SOLUCION;
-- DROP TABLE COMPROBACION_RESUELTA;
-- DROP TABLE CIUDAD;
-- DROP TABLE PAIS;
-- DROP TABLE PALABRA;
-- DROP TABLE RESPUESTA_SOPA;
-- DROP TABLE RESPUESTA_CORTA;
-- DROP TABLE RESPUESTA_VF;
-- DROP TABLE RESPUESTA_LARGA;
-- DROP TABLE RESPUESTA_MULTIPLE;
-- DROP TABLE PREGUNTA;
-- DROP TABLE TIPO_PREGUNTA;
-- DROP TABLE COMPROBACION;
-- DROP TABLE TITULO;
-- DROP TABLE TEMA;
-- DROP TABLE CURSO;
-- DROP TABLE USUARIO;
-- DROP TABLE TIPO_USER;

CREATE TABLE TIPO_USER(
   Id_tipo 			INTEGER NOT NULL AUTO_INCREMENT,
   Descripcion 		VARCHAR(100) NOT NULL,
   
   CONSTRAINT TIPO_USER_PK PRIMARY KEY(Id_Tipo),
   CONSTRAINT TIPO_USER_UN UNIQUE(Descripcion)
);

INSERT INTO TIPO_USER(Descripcion) VALUES('ADMINISTRADOR');
INSERT INTO TIPO_USER(Descripcion) VALUES('DOCENTE');
SELECT * FROM TIPO_USER;


CREATE TABLE USUARIO(
   Id_Usuario 		INTEGER NOT NULL,
   Nombre 			VARCHAR(255) NOT NULL,
   Apellido 		VARCHAR(255) NOT NULL,
   Contraseña 		VARCHAR(255) NOT NULL,
   Tipo		  		integer NOT NULL,
   
   CONSTRAINT USUARIO_PK PRIMARY KEY(Id_Usuario),
   CONSTRAINT TIPO_FK FOREIGN KEY (Tipo) REFERENCES TIPO_USER(Id_tipo) ON DELETE CASCADE
);

INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (1,'Miguel','Morataya','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (2,'Francisco','Riesco','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (3,'Giovanna','Monterroso','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (4,'Maria','Acuña','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (5,'Alberto','Polanco','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (6,'Jairo','Estelles','12345678#',2);
INSERT INTO USUARIO(Id_Usuario,Nombre,Apellido,Contraseña,Tipo) VALUES (7,'Juan','Venegas','admin#',1);
SELECT * FROM USUARIO;

CREATE TABLE CURSO(
   Cod_Curso 	INTEGER NOT NULL AUTO_INCREMENT,
   Nombre 		VARCHAR(255) NOT NULL,
   Docente		INTEGER  NOT NULL,
   
   CONSTRAINT CURSO_PK PRIMARY KEY(Cod_Curso),
   CONSTRAINT CDOCENTE_FK FOREIGN KEY (Docente) REFERENCES USUARIO(Id_Usuario) ON DELETE CASCADE,
   CONSTRAINT CURSO_UN UNIQUE(Nombre,Docente)
);
INSERT INTO CURSO(Nombre,Docente) VALUES ('TOPOGRAFIA 1',4);
INSERT INTO CURSO(Nombre,Docente) VALUES ('MECANICA DE FLUIDOS',3);
INSERT INTO CURSO(Nombre,Docente) VALUES ('SISTEMAS OPERATIVOS 1',2);
INSERT INTO CURSO(Nombre,Docente) VALUES ('ORG DE LENGUAJES Y COMPILADORES 1',1);
INSERT INTO CURSO(Nombre,Docente) VALUES ('ARQ DE COMPUTADORES Y ENSAMBLADORES 1',4);
INSERT INTO CURSO(Nombre,Docente) VALUES ('LENGUAJES FORMALES Y DE PROGRAMACION 1',5);
INSERT INTO CURSO(Nombre,Docente) VALUES ('ORGANIZACION COMPUTACIONAL',6);
INSERT INTO CURSO(Nombre,Docente) VALUES ('REDES DE COMPUTADORAS 1',3);
INSERT INTO CURSO(Nombre,Docente) VALUES ('INTELIGENCIA ARTIFICIAL 1',6);
INSERT INTO CURSO(Nombre,Docente) VALUES ('SIST DE ADMON DE BASES DE DATOS 1',5);
SELECT * FROM CURSO;

CREATE TABLE TEMA(
   Cod_Tema 	INTEGER NOT NULL AUTO_INCREMENT,
   Nombre_T 	VARCHAR(255) NOT NULL,
   Imagen		VARCHAR(255)  NULL,
   Curso		INTEGER  NOT NULL,
   
   CONSTRAINT TEMA_PK PRIMARY KEY(Cod_Tema),
   CONSTRAINT CURSO_FK FOREIGN KEY (Curso) REFERENCES CURSO(Cod_Curso) ON DELETE CASCADE,
   CONSTRAINT CURSO_UN UNIQUE(Nombre_T,Curso)
);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('UNIDADES',1);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('PLANIMETRIA',1);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('CALCULO DE AREAS',1);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('HIDROSTÁTICA',2);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('CINEMATICA DE FLUIDOS',2);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('DINAMICA DE FLUIDOS',2);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('INTERBLOQUEOS',3);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('ESTRUCTURA DEL KERNEL',3);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('ADMINISTRACION DE MEMORIA',3);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('INTRODUCCION A LA COMPILACION',4);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('ANALISIS LEXICO',4);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('ANALISIS DE SINTAXIS',4);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('ARQUITECTURA DE LOS PROCESADORES INTEL 8088-PENTIUM II',5);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('CLASIFICACION Y DIVERSIFICACION DEL LENGUAJE ENSAMBLADOR EN PROCESADORES INTEL',5);
SELECT * FROM TEMA;

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('JERARQUIA DE CHOMSKY',6);
INSERT INTO TEMA(Nombre_T,Curso) VALUES ('LENGUAJES LIBRES DE CONTEXTO',6);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('LOGICA COMBINACIONAL',7);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('MODELO OSI',8);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('INTRODUCCION A LA INTELIGENCIA ARTIFICIAL',9);

INSERT INTO TEMA(Nombre_T,Curso) VALUES ('MODELO ENTIDAD-RELACION',10);
SELECT * FROM TEMA;

CREATE TABLE TITULO(
   Id_Titulo 	INTEGER NOT NULL AUTO_INCREMENT,
   Nombre 		VARCHAR(255) NOT NULL,
   Contenido 	mediumblob  NULL,
   Tema			INTEGER  NOT NULL,
   Coordenadas	VARCHAR(400) NULL,
   tipoEnlace   INTEGER(1) NULL,
   
   CONSTRAINT TITULO_PK PRIMARY KEY(Id_Titulo),
   CONSTRAINT TEMA_FK FOREIGN KEY (Tema) REFERENCES TEMA(Cod_Tema) ON DELETE CASCADE,
   CONSTRAINT TITULO_UN UNIQUE(Nombre,Tema)
);

INSERT INTO TITULO(Nombre,Contenido,Tema) VALUES ('UNIDADES',
'<p><strong>UNIDADES DE MEDIDA</strong><br /> 
Se denomina medir una magnitud, al resultado de compararlas con otras de su misma<br />
especie, que se toma por unidad. Las magnitudes que se miden en Topografia son lineales,
<br />superficiales, angulares y volumetricas. En nuestro pais, se utiliza el Sistema Metrico 
Decimal. <br /><span style="text-decoration: underline;">Unidad de superficie:</span>
 es de uso frecuente en Topografia, muestra el valor de las superficies&nbsp;<br />
 en unidades de medida agraria, siendo sus equivalencias:<br />
 1 Centiarea = 1Ca = 1 m2<br />1 Area = 1 A = 100 m2<br />1 Hectarea = 1 Ha = 10,000 m2<br />
 <span style="text-decoration: underline;">
 Unidades Angulares:</span> Se sabe por geometria, que la medida de un angulo es el arco<br />
 trazado desde el vertice, como centro, subtendido por los lados, y por medir se tomara<br />
 como unidad de angulo el trazado en el centro de la circunferencia que subtienda el arco de un <br />
 grado. El angulo unidad se considera igualmente dividido en 60 (minutos) y cada minuto en 60
 <br />(segundos).</p>
 <p><a title="UNIDADES EN TOPOGRAFIA" href="https://www.youtube.com/watch?v=qTJx82cxtcc">
 https://www.youtube.com/watch?v=qTJx82cxtcc</a></p>',1);
 
 INSERT INTO TITULO(Nombre,Contenido,Tema) VALUES ('ANALISIS LEXICO',
 '<p>En algunos lenguajes de programacion es necesario establecer 
patrones para caracteres especiales (como el espacio en blanco) 
que la gramatica pueda reconocer sin que constituya un&nbsp;
<em>token</em>&nbsp;en si.</p>
<h2><span id="An.C3.A1lisis"></span><span id="An&aacute;lisis" 
class="mw-headline">Analisis</span></h2>
<p>Esta etapa esta basada usualmente en una, maquina de estado finito. 
Esta maquina contiene la informacion de las posibles secuencias de caracteres 
que puede conformar cualquier&nbsp;<em>token</em>&nbsp;que sea parte del 
lenguaje (las instancias individuales de estas secuencias de caracteres 
son denominados lexemas). Por ejemplo, un&nbsp;<em>token</em>&nbsp;de 
naturaleza&nbsp;<em>entero</em>&nbsp;puede contener cualquier secuencia 
de caracteres numericos.</p>
<h2><span id="V.C3.A9ase_tambi.C3.A9n"></span>
<span id="V&eacute;ase_tambi&eacute;n" class="mw-headline">
Vease tambien</span></h2>
<ul>
<li><a title="Analizador sint&aacute;ctico" 
href="https://es.wikipedia.org/wiki/Analizador_sint%C3%A1ctico">Analizador 
sintactico</a></li>
<li><a title="Ling&uuml;&iacute;stica computacional" 
href="https://es.wikipedia.org/wiki/Ling%C3%BC%C3%ADstica_computacional">
Linguistica computacional</a></li>
<li><a title="Lex (inform&aacute;tica)" 
href="https://es.wikipedia.org/wiki/Lex_(inform%C3%A1tica)">Lex</a></li>
<li><a class="new" title="Flex (inform&aacute;ica) (a&uacute;n no redactado)" 
href="https://es.wikipedia.org/w/index.php?title=Flex_(inform%C3%A1ica)&amp;action=edit&amp;redlink=1">
Flex</a></li>
</ul>',11);
 -- SELECT CONVERT(Contenido USING utf8)  FROM TITULO;
 SELECT * FROM TITULO;

CREATE TABLE COMPROBACION(
   Id_Comprobacion 	INTEGER NOT NULL AUTO_INCREMENT,
   Descripcion 		VARCHAR(255) NULL,
   Titulo		 	INTEGER NOT NULL,
   
   CONSTRAINT COMPROBACION_PK PRIMARY KEY(Id_Comprobacion),
   CONSTRAINT TITULO_FK FOREIGN KEY (Titulo) REFERENCES TITULO(Id_Titulo) ON DELETE CASCADE,
   CONSTRAINT TITULO_UN UNIQUE(Titulo)
   
);

INSERT INTO COMPROBACION(Descripcion,Titulo) VALUES('PRUEBA SOBRE UNIDADES DE MEDIDA',1);
INSERT INTO COMPROBACION(Descripcion,Titulo) VALUES('PRUEBA SOBRE ANALISIS LEXICO',2);
SELECT * FROM COMPROBACION;

CREATE TABLE TIPO_PREGUNTA(
   Id_Tipo 		INTEGER NOT NULL AUTO_INCREMENT,
   Tipo 		VARCHAR(255) NOT NULL,
   
   CONSTRAINT TIPOP_PK PRIMARY KEY(Id_Tipo),
   CONSTRAINT TIPOP_UN UNIQUE(Tipo)
);
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('VERDADERO-FALSO');
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('RESPUESTA LARGA');
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('RESPUESTA CORTA');
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('SELECCION MULTIPLE');
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('RESPUESTA SOPA DE LETRAS');
INSERT INTO TIPO_PREGUNTA(Tipo) VALUES('RESPUESTA CRUCIGRAMA');
SELECT * FROM TIPO_PREGUNTA;

CREATE TABLE PREGUNTA(
   Id_Pregunta 		INTEGER NOT NULL AUTO_INCREMENT,
   Pregunta 		VARCHAR(255) NOT NULL,
   Comprobacion 	INTEGER NOT NULL,
   Tipo_Pregunta	INTEGER NOT NULL,
   
   CONSTRAINT PREGUNTA_PK PRIMARY KEY(Id_Pregunta),
   CONSTRAINT COMPROBACION_FK FOREIGN KEY (Comprobacion) REFERENCES COMPROBACION(Id_Comprobacion) ON DELETE CASCADE,
   CONSTRAINT TIPO_PR_FK FOREIGN KEY (Tipo_Pregunta) REFERENCES TIPO_PREGUNTA(Id_Tipo) ON DELETE CASCADE,
   CONSTRAINT PREGUNTA_UN UNIQUE(Comprobacion,Pregunta)
);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Las unidades de superficie expresan el valor de las superficies
en unidades de medida agraria',1,1);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES(' ¿Cuáles son Tipos de Escala?',1,4);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Sistemas de coordenadas usados en topografía:',1,5);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('¿Qué es el límite apreciación gráfica?',1,2);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Es la ciencia que trata de la representación de la Tierra sobre un mapa:',1,3);

INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Es el proceso de caracteres que componen el programa fuente y los agrupaen secuencias significativas conocidas como lexemas:',2,3);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Cual es la estructura de un compilador:',2,4);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('Cuales son las fases de un compilador:',2,5);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('¿Qué es un compilador?',2,4);
INSERT INTO PREGUNTA(Pregunta,Comprobacion,Tipo_Pregunta) VALUES('De la siguiente lista de lenguajes subraye el de más bajo nivel:',2,5);
SELECT * FROM PREGUNTA;

CREATE TABLE RESPUESTA_MULTIPLE(
   Id_RMultiple		INTEGER NOT NULL AUTO_INCREMENT,
   Booleano 		BOOL NOT NULL,
   Respuesta    	VARCHAR(255) NOT NULL,
   Pregunta	  		INTEGER NOT NULL,
   
   CONSTRAINT RESPUESTAM_PK PRIMARY KEY(Id_RMultiple),
   CONSTRAINT PREGUNTAM_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta) ON DELETE CASCADE,
   CONSTRAINT RESPUESTAM_UN UNIQUE(Respuesta,Pregunta)
);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (true,'Escala numérica',2);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (true,'Escala gráfica',2);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Escala dimensional',2);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Escala superficial',2);

INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (true,'Programa fuente, Análisis sintáctico,
Generación de código intermedio,generación de código',7);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Programa fuente, Optimizador sintáctico,
Generación de código intermedio, Generación de código',7);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Programa fuente, Análisis sintáctico, Generación
de código intermedio, Preparación de código',7);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Programa fuente, Análisis sintáctico,
Código intermedio, Generación de código',7);

INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Cuando se produce la traducción de un lenguaje
de alto nivel en otro del mismo nivel',9);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'Cuando el lenguaje objeto es un lenguaje
de alto nivel y se convierte en otro llamado fuente de alto nivel',9);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (true,'Cuando el lenguaje fuente es un lenguaje
de alto nivel y el lenguaje objeto es un lenguaje de bajo nivel',9);
INSERT INTO RESPUESTA_MULTIPLE(Booleano,Respuesta,Pregunta) VALUES (false,'cuando se convierte un lenguaje fuente 
en otro llamado objeto',9);
SELECT * FROM RESPUESTA_MULTIPLE;


CREATE TABLE RESPUESTA_LARGA(
   Id_RLarga		INTEGER NOT NULL AUTO_INCREMENT,
   Respuesta 		VARCHAR(255) NOT NULL,
   Pregunta	  		INTEGER NOT NULL,
   
   CONSTRAINT RESPUESTAL_PK PRIMARY KEY(Id_RLarga),
   CONSTRAINT PREGUNTAL_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta) ON DELETE CASCADE,
   CONSTRAINT RESPUESTAL_UN UNIQUE(Pregunta)
);

INSERT INTO RESPUESTA_LARGA(Respuesta,Pregunta) VALUES('Es el límite de percepción visual multiplicado por el
denominador de la escala.',4);
SELECT * FROM RESPUESTA_LARGA;

CREATE TABLE RESPUESTA_VF(
   Id_VF			INTEGER NOT NULL AUTO_INCREMENT,
   Respuesta 		BOOL NOT NULL,
   Pregunta	  		INTEGER NOT NULL,
   
   CONSTRAINT RESPUESTAVF_PK PRIMARY KEY(Id_VF),
   CONSTRAINT PREGUNTAVF_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta) ON DELETE CASCADE,
   CONSTRAINT RESPUESTAVF_UN UNIQUE(Pregunta)
);
 INSERT INTO RESPUESTA_VF(Respuesta,Pregunta) VALUES(true,1);
 SELECT * FROM RESPUESTA_vf;


CREATE TABLE RESPUESTA_CORTA(
   Id_RShort		INTEGER NOT NULL AUTO_INCREMENT,
   Respuesta 		VARCHAR(255) NOT NULL,
   Pregunta	  		INTEGER NOT NULL,
   
   CONSTRAINT RESPUESTASHORT_PK PRIMARY KEY(Id_RShort),
   CONSTRAINT PREGUNTASHORT_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta) ON DELETE CASCADE,
   CONSTRAINT RESPUESTAVF_UN UNIQUE(Pregunta)
);
INSERT INTO RESPUESTA_CORTA(Respuesta,Pregunta) VALUES('Cartografía',5);
INSERT INTO RESPUESTA_CORTA(Respuesta,Pregunta) VALUES('Analizador Léxico',6);
SELECT * FROM RESPUESTA_CORTA;

CREATE TABLE RESPUESTA_SOPA(
   Id_RSopa 		INTEGER NOT NULL AUTO_INCREMENT,
   Altura	 		INTEGER NOT NULL,
   Ancho	 		INTEGER NOT NULL,
   Pregunta	  		INTEGER NOT NULL,
   
   CONSTRAINT RESPUESTASOPA_PK PRIMARY KEY(Id_RSopa),
   CONSTRAINT PREGUNTASOPA_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta) ON DELETE CASCADE
);
INSERT INTO RESPUESTA_SOPA(Altura,Ancho,Pregunta) VALUES(10,10,3);
INSERT INTO RESPUESTA_SOPA(Altura,Ancho,Pregunta) VALUES(10,10,8);
INSERT INTO RESPUESTA_SOPA(Altura,Ancho,Pregunta) VALUES(10,10,10);
SELECT * FROM RESPUESTA_SOPA;


CREATE TABLE PALABRA(
   Id_Palabra 		INTEGER NOT NULL AUTO_INCREMENT,
   Respuesta		VARCHAR(255) NOT NULL,
   PosXi 			INTEGER NOT NULL,
   PosYi 			INTEGER NOT NULL,
   PosXf 			INTEGER NOT NULL,
   PosYf 			INTEGER NOT NULL,
   Respuesta_Sopa	INTEGER NOT NULL,
   
   CONSTRAINT PALABRA_PK PRIMARY KEY(Id_Palabra),
   CONSTRAINT RESPUESTA_SOPA_FK   FOREIGN KEY (Respuesta_Sopa) REFERENCES RESPUESTA_SOPA(Id_RSopa) ON DELETE CASCADE,
   CONSTRAINT PALABRA_UN UNIQUE(Respuesta,Respuesta_Sopa)
);

INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('Angulares',9,6,1,6,1);
INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('Lineales',1,2,9,2,1);

INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('Sintesis',2,4,9,4,2);
INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('Analisis',1,9,9,9,2);

INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('Assembler',4,1,4,9,3);
INSERT INTO PALABRA(Respuesta,PosXi,PosYi,PosXf,PosYf,Respuesta_Sopa) VALUES('C++',7,10,7,8,3);

SELECT * FROM PALABRA;

-- ***************************parte del registro de las comprobaciones resueltas

CREATE TABLE PAIS(
   Id_Pais	 		INTEGER NOT NULL AUTO_INCREMENT,
   Pais				VARCHAR(255) NOT NULL,
  
   CONSTRAINT PAIS_PK PRIMARY KEY(Id_Pais),
   CONSTRAINT PAIS_UN UNIQUE(Pais)
);

INSERT INTO PAIS(Pais) VALUES('Guatemala');
INSERT INTO PAIS(Pais) VALUES('Panama');
INSERT INTO PAIS(Pais) VALUES('Honduras');
INSERT INTO PAIS(Pais) VALUES('El Salvador');
INSERT INTO PAIS(Pais) VALUES('Belice');
INSERT INTO PAIS(Pais) VALUES('Nicaragua');
INSERT INTO PAIS(Pais) VALUES('Mexico');
SELECT * FROM PAIS;

CREATE TABLE CIUDAD(
   Id_Ciudad	 		INTEGER NOT NULL AUTO_INCREMENT,
   Ciudad				VARCHAR(255) NOT NULL,
   Pais					INTEGER NOT NULL,
  
   CONSTRAINT CIUDAD_PK PRIMARY KEY(Id_Ciudad),
   CONSTRAINT PAIS_FK   FOREIGN KEY (Pais) REFERENCES PAIS(Id_Pais) ON DELETE CASCADE,
   CONSTRAINT CIUDAD_UN UNIQUE(Ciudad,Pais)
);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Ciudad de Guatemala',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Santa Catarina Pinula',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('San Miguel Petapa',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Ciudad de Mixco',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Ciudad de Villa Nueva',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Fraijanes',1);
INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Antigua Guatemala',1);

INSERT INTO CIUDAD(Ciudad,Pais) VALUES('Panama',2);
SELECT * FROM CIUDAD;
SELECT * FROM Pregunta p
INNER JOIN comprobacion c ON c.Id_Comprobacion=p.Comprobacion;

CREATE TABLE COMPROBACION_RESUELTA(
   Id_Resuelta	 		INTEGER NOT NULL AUTO_INCREMENT,
   NombreE				VARCHAR(255) NOT NULL,
   ApellidoE			VARCHAR(255) NOT NULL,
   Correctas			INTEGER NOT NULL,
   Incorrectas			INTEGER NOT NULL,
   Ciudad				INTEGER NOT NULL,
   Comprobacion			INTEGER NOT NULL,
  
   CONSTRAINT RESUELTA_PK PRIMARY KEY(Id_Resuelta),
   CONSTRAINT CIUDAD_FK   FOREIGN KEY (Ciudad) REFERENCES CIUDAD(Id_Ciudad) ON DELETE CASCADE,
   CONSTRAINT COMPROBACIONRESUELTA_FK   FOREIGN KEY (Comprobacion) REFERENCES COMPROBACION(Id_Comprobacion) ON DELETE CASCADE
);
INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Cristina','Martínez',3,2,1,1);
INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Ligia','Callejas',4,1,3,1);
INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Elvira','Beltrán',2,3,2,1);

INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Ruth','Mendez',4,1,1,2);
INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Andrés','Pérez',3,2,1,2);
INSERT INTO COMPROBACION_RESUELTA(NombreE,ApellidoE,Correctas,Incorrectas,Ciudad,Comprobacion) 
VALUES('Mindi','Ruiz',4,1,1,2);
SELECT * FROM COMPROBACION_RESUELTA;

CREATE TABLE DETALLE_SOLUCION(
   Id_Detalle			INTEGER NOT NULL AUTO_INCREMENT,
   Pregunta		 		INTEGER NOT NULL,
   Respuesta_E			VARCHAR(255) NULL,
   Resuelta				INTEGER NOT NULL,
  
   CONSTRAINT SOLUCION_PK PRIMARY KEY(Id_Detalle),
   CONSTRAINT PREGUNTADET_FK   FOREIGN KEY (Pregunta) REFERENCES PREGUNTA(Id_Pregunta)ON DELETE CASCADE,
   CONSTRAINT RESUELTA_FK   FOREIGN KEY (Resuelta) REFERENCES COMPROBACION_RESUELTA(Id_Resuelta) ON DELETE CASCADE,
   CONSTRAINT SOLUCION_UN UNIQUE(Pregunta,Respuesta_E,Resuelta)
);
SELECT * FROM Pregunta p
INNER JOIN comprobacion c ON c.Id_Comprobacion=p.Comprobacion
WHERE p.Comprobacion=1;
SELECT * FROM COMPROBACION_RESUELTA;

-- PRIMER ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(1,'true',1);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala numérica',1);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala gráfica',1);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Angulares',1);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Lineales',1);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(4,' ',1);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(5,'MAPA',1);

-- SEGUNDO ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(1,'true',2);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala numérica',2);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala gráfica',2);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Angulares',2);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Lineales',2);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(4,' ',2);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(5,'Cartografía',2);

-- TERCER ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(1,'false',3);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala numérica',3);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(2,'Escala gráfica',3);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Angulares',3);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(3,'Lineales',3);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(4,' ',3);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(5,'MAPA',3);
 
 -- CUARTO ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(6,'Analizador Léxico',4);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(7,'Programa fuente, Análisis sintáctico,
Código intermedio, Generación de código',4);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Sintesis',4);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Analisis',4);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(9,'Cuando el lenguaje fuente es un lenguaje
de alto nivel y el lenguaje objeto es un lenguaje de bajo nivel',4);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'C++',4);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'Assembler',4);

 -- QUINTO ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(6,'Analizador',5);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(7,'Programa fuente, Análisis sintáctico,
Código intermedio, Generación de código',5);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Sintesis',5);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Analisis',5);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(9,'Cuando el lenguaje fuente es un lenguaje
de alto nivel y el lenguaje objeto es un lenguaje de bajo nivel',5);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'C++',5);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'Assembler',5);

-- SEXTO ESTUDIANTE
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(6,'Lexema',6);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(7,'Programa fuente, Análisis sintáctico,
Generación de código intermedio,generación de código',6);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Sintesis',6);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(8,'Analisis',6);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(9,'Cuando el lenguaje fuente es un lenguaje
de alto nivel y el lenguaje objeto es un lenguaje de bajo nivel',6);

INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'C++',6);
INSERT INTO DETALLE_SOLUCION(Pregunta,Respuesta_E,Resuelta) VALUES(10,'Assembler',6);

SELECT * FROM DETALLE_sOLUCION;
