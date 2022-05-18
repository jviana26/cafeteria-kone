# cafeteria-kone

#INSTALACION DE CAFETERIA 

#•	Se hace el descargue del programa cafetería-kone
•	Estando en la raíz del programa por medio de consola se debe ejecutar el siguiente comando (composer install)
•	La base de datos se encuentra en la carpeta data base con nombre (prueba_cafeteria)
•	Para ingresar al aplicativo se ejecuta en consola el php artisan serv.
•	EL aplicativo no cuenta con un apartado de register fuera de él, ya que este fue realizado con requerimiento de  seguridad de la ISO 27001
•	Para ingresar al aplicativo debe usar los siguientes datos de acceso: 
o	Usuario:
o	Contraseña:


•	Para la creación de nuevos usuarios después de estar logueado se debe hacer desde la bandeja se Usuarios y crear. 

•	Realizar una consulta que permita conocer cuál es el producto que más stock tiene.

SELECT id, nombre, stock
FROM crm.productos
WHERE stock = (SELECT MAX(stock ) FROM crm.productos)
