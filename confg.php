<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bar";



//Se aplica el codigo para el llamado a la base de datos con el
//nombre de db_checkbox

try {
   
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
//PDO: SE APLICA A LA BASE DE DATOS



    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* SetAttribute: Establece el valor de un atributo en el 
elemento indicado. Si el atributo ya existe, el valor es 
actualizado, en caso contrario, el nuevo atributo es añadido
con el nombre y valor indicado.

*/

    } catch (PDOException $exception){
    die("Connection error: " . $exception->getMessage());

//aqui hacemos una condicion...


    }



?>