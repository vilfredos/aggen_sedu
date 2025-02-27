1. Antecedentes
Como es sabido en la actualidad la inform ́atica es ub ́ıcua, esta caracter ́ıstica hace que muchas personas
quieran tener sus negocios, tareas administrativas; sistematizadas en un sistema computacional. Muchas de
ellas emprenden este trabajo de forma individual, pensando que es una tarea en la que se puede ensamblar una
y otra parte y conseguir lo que se busca, esta es una idea muy recurrente hoy en d ́ıa (gracias la desarrollo de
herramientas, frameworks, CMS, etc.); lo que hace que el trabajo de los profesionales que se dedican a generar
soluciones inform ́aticas sea m ́as desafiante, m ́as pertinente, con mayor argumentaci ́on y que sean el resultado
de un proceso fino de dise ̃no e implementaci ́on. En resumen, mostrar la diferencia entre un profesional de grado
de licenciatura con un buen emprendedor y amante de la inform ́atica.
Una rama de la Inform ́atica es el desarrollo de sistemas de informaci ́on, la misma que ha sido desarrollada de
manera general en el apoyo a actividades del quehacer empresarial/institucional. El desarrollo de estos sistemas
dependiendo de la complejidad y alcance han generado gran avance en las  ́areas subyascentes como el estudio
de los sistemas de informaci ́on, los procesos de desarrollo y la ingenier ́ıa de software. La posibilidad de tener
sistemas que se desempe ̃nen utilizando la gran red de computadoras ha ocasionado que la inform ́atica incursione
en las complejidades de las aplicaciones web.

La misi ́on m ́as importante de la universidad es la formaci ́on de profesionales id ́oneos en sus  ́areas de com-
petencia. Por lo que se plantea un problema que permita desarrollar, aplicar y conseguir un producto software,

con est ́andares de calidad y que permitan a las grupo empresas tener una experiencia enriquecedora en su
desempe ̃no empresarial.
2. Descripci ́on del sistema a desarrollar
El objetivo de esta secci ́on es orientar el dimensionamiento del sistema requerido, para ello se presenta una
descripci ́on m ́ınima de las necesidades que se quiere cubrir.
2.1. Objetivo
Desarrollar un sistema que permita ayudar a las fases administrativas del proceso de elecciones dentro la
UMSS.
Este sistema en adelante ser ́a llamado:

Administrador de elecciones .

2.2. Contexto
Las nuevas politicas universitaras, emanadas del congreso llevado a cabo el a ̃no 2022, han generado un
conjunto de procesos, procedimientos, normas y reglamentos.
1

Un aspecto que se ha tocado es la tem ́atica de as elecciones/claustros que se llevan a cabo en toda la univer-
sidad a distintos niveles; para contextualizar en la UMSS se eligen distintas autoridades como ser: Consejeros

de Carrera, Consejeros Facultativos, Consejeros Universitarios, Directores de Carrera, Autoridades Facultativas
(Decano y Director Academico) y Autoridades Universitarias (Rector, Vice rectores).
Para ello se ha generado el Tribunal Electoral Universitario que tiene la responsabilidad de administrar
un claustro, en estas elecciones a modo general se debe considerar: Comites Electorales, Frentes y candidatos,
poblaci ́on votante, jurados electorales, mesas electorales y localizaciones.
Las elecciones son procesos muy cotidianos en la vida universitaria, sin embargo, esto no significa que la parte
administrativa sea simple, mas aun si todos los procesos los administrara un ente superior de la universidad. La
administraci ́on se puede convertir en un verdadero problema que puede implicar costos econ ́omicos, suspensiones
y hasta la necesidad de volver a llevar adelante el claustro.
La idea de tener esta unidad, es mejorar las elecciones y a su vez en el futuro, tener recursos humanos,
establecimiento de mesas la menor cantidad de veces posible.
El TEU ya ha tenido una experiencia en el semestre 1 2023, habiendo tenido algunos problemas en la
impresion de las boletas que ha conllevado a la anulaci ́on y posterior repetici ́on del proceso eleccionario.
Con la finalidad de apoyar al TEU, se plantea la posibilidad de brindar un sistema que permita apoyar la
parte administrativa de un proceso de elecciones en la UMSS.
2.3. Requerimientos generales del proyecto
Considerando lo enunciado en la anterior secci ́on, se quiere apoyar los diferentes procesos electorales que el
TEU debe atender.
Para llevar adelante un proceso eleccionario, el TEU debe:
nominar la elecci ́on, que permita identificar el motivo de la misma
identificar que autoridades se van a elegir - pueden ser mas de una
identificar la poblaci ́on que participar ́a en cada una de las elecciones, la poblaci ́on se refiere a los votantes,
tanto docentes como estudiantes
elegir a los miembros del comite electoral
reemplazar algun miembro del comite electoral, si existen motivos validos
registrar los frentes con sus candidatos
asociar los frentes y candidatos a la eleccion que les correponde
identificar mesas de elecci ́on, tanto en numero como en ubicaci ́on
designar jurados electorales por mesa, docentes y estudiantes, usualmente de manera aleatoria
reemplazar algun jurado lectoral, si existen razones validas
generar mecanismos de comunicaci ́on oficial, mails, cartas para las designaciones
imprimir las boletas que correspondan a cada eleccion, las mismas que deben contener qu ́e se esta eligiendo,
y los distintos frentes. Por economia el TEU administra el espacio de impresi ́on
generar los diferentes reportes que se requiere en estos procesos eleccionarios
generar acatas de apertura, cierre y escrutinio de mesas
permitir registro de resultados por mesa
emitir acta final del proceso

2

definir parmetros generales del proceso (Evento, fechas, requisitos, documentos a presentar, etc.) todos
editables y din ́amicos seg ́un formatos preestablecidos

permitir adjuntar documentaci ́on complementaria, actas de comite, lista de habilitados, cartas de obser-
vaciones, impugnaciones, otros.

tener hist ́orico de elecciones pasadas
Cabe mencionar que este punteo, enuncia el problema de forma general para dimensionar y tener un contexto
general de los que se requiere, en este mismo sentido, se debe considerar que los usuarios del sistema pueden
surgir por necesidad y a requerimiento; criterio que debe ser considerado por los ofertantes.
Debido a que se esta hablando de un contexto universitario, hay que sacar el mayor provecho que se tiene
a la informaci ́on ya establecida en la UMSS, como por ejemplo el uso de codigo SIS o el uso de las cuentas
institucionales.
3. T ́erminos de referencia
Una vez definido el  ́ambito del proyecto en t ́erminos de alcance funcional, es importante determinar aspectos
de contexto que condicionan la realizaci ́on del proyecto.
3.1. Tareas y conceptos a considerar
3.1.1. Modalidad del proyecto
El proponente debe presentar su soluci ́on enmarcada en la modalidad:
desarrollo de un producto software

considerando la Ingenier ́ıa de Software como base fundamental para su planificaci ́on, proyecci ́on, ejecuci ́on y
puesta en marcha.
3.1.2. Proceso de desarrollo
Los proponentes deben explicar claramente el proceso de desarrollo que han elegido, adem ́as de las fases del
proyecto y resumirlos de acuerdo al siguiente formato:

Etapa Tiempo (dias) Costo (Bs.)

3.2. Generalidades para el sistema
3.2.1. Forma de trabajo del sistema

El sistema debe funcionar en plataforma web en los servidores del Laboratorio del Departamento de In-
form ́atica y Sistemas.

3.2.2. Gesti ́on de bases de datos
Los datos almacenados en la base de datos, deber ́an cumplir normas de integridad, fiabilidad y seguridad.

3

3.2.3. Gesti ́on de informaci ́on
Para la administraci ́on de los datos se deben elaborar programas que tengan una interfaz de usuario tan
c ́omoda y f ́acil de usar como sea posible, y que llegue de manera clara a las personas que utilizar ́an el software.
Debido a que TIS no puede presentar los registros de autor de las herramientas especificadas en el apartado
3.3 y 3.4, el proponente debe regirse a la misma especificaci ́on, ya que TIS no est ́a en condiciones de invertir en
licencias de software.
Cualquier otra sugerencia que el proponente tenga ser ́a considerada, siempre y cuando no vaya en contra de
este apartado.
3.3. Software para el desarrollo del sistema
En t ́erminos generales y debido a que el sistema debe funcionar en el laboratorio de las carreras, se brindan
las siguientes posibilidades para el desarrollo del sistema:
Plataformas de desarrollo: php o java.
El gestor de base de datos: mysql o postgresql (o ambos).
Servidores web: apache y tomcat (de acuerdo a plataforma sugerida).
Herramientas de apoyo a la construcci ́on del software: consultar con el asesor TIS para estos requerimientos
Las versiones de este software deben tomarse de acuerdo a las caracter ́ısticas del software instalado en el
laboratorio.
3.4. Licencias de software
TIS ha decidido usar software libre debido al elevado costo de las licencias de funcionamiento del software
comercial. Se debe tener en cuenta que si el software entra en producci ́on en el futuro es posible que requiera
mantenimientos evolutivos, por lo cual el c ́odigo fuente del sistema deber ́a estar disponible y no requerir el uso
de software comercial para su modificaci ́on.
3.5. Metodolog ́ıa de desarrollo
La metodolog ́ıa debe ser definida por los proponentes, debiendo especificar  ́esta en la propuesta. Se sugiere
que se presente de manera clara la relaci ́on que existe entre el proceso de desarrollo elegido con las siguientes
actividades:
Especificaci ́on de requerimientos
Dise ̃no
Programaci ́on
Validaci ́on/verificaci ́on
Control de calidad
Documentaci ́on
Capacitaci ́on
Transferencia de tecnolog ́ıa
Implantaci ́on y puesta en marcha

4

Es deseable que en cada etapa se definan productos intermedios de entrega con la finalidad de satisfacer al
usuario final en etapas lo m ́as tempranas posibles.
Se debe entregar el c ́odigo fuente de los programas elaborados. La licencia de uso del c ́odigo fuente debe
sujetarse por un lado a la norma del software libre utilizado y por otro a las necesidades evolutivas del software
en beneficio de la mejora de la organizaci ́on del Departamento de Inform ́atica y Sistemas.
3.6. Capacitaci ́on de usuario final
Se debe contemplar en la propuesta el entrenamiento de los usuarios finales y administradores del sistema.

El proponente debe indicar el cronograma de capacitaci ́on, los prerequisitos para realizarla, el enfoque meto-
dol ́ogico, adem ́as del costo. Obviamente este costo se debe reflejar en la propuesta econ ́omica del proponente.

3.7. Documentaci ́on
Se debe proveer los siguientes manuales en formato digital pdf:

T ́ecnico: donde se explicar ́a el funcionamiento t ́ecnico del programa, para permitir su mejoramiento y admi-
nistraci ́on de  ́este.

De usuario: donde se indica c ́omo usar el sistema desarrollado.
De instalaci ́on: donde se indica c ́omo poner operativo el sistema, en todas sus partes.
Para el cumplimiento de la entrega de manuales se debe considerar los actores del sistema, tanto directos como
indirectos.
Si el proponente considera necesario parcelar el manual de usuario de acuerdo a roles espec ́ıficos, esta adenda
debe ser especificada en la propuesta.
