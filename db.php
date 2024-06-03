<?php //Archivo de conexion a mysql

session_start();

$conn = mysqli_connect(
    'localhost',//Se define el puerto donde escucha mysql
    'root',//El usuario que accedera
    '',//La contraseña
    'php_mysql_crud'//Nombre de la base de datos
);
/* 
EL archivo de conexion de mysql puede tener el nombre que quieran asignarle,
por lo tanto no es necesario que se llame al que se le asigno en este proyecto.

Deben asegurarse de escribir bien el puerto y el usuario o rechazara la conexion.

El nombre de la base datos deben establecerlo antes en mysql creandola, de otra forma 
la conexion acabara porque no encuentra esa base de datos.

Las tablas deben crearlas ya sea desde una interdas o utilizando query, es decir puedes 
utilizar codigo para crear tus tablas por ejemplo:
    CREATE DATABASE proyecto;
    USE proyecto;
    CREATE TABLE users(
        id int(11) primary key auto_increment,
        nombre varchar(200) not null,
        email varchar(200) not null,
        phoneNumber int(11) not null,
        salary int(11) not null
    )
*/


?>