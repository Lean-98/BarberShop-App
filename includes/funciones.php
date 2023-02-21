<?php

function obtenerServicios(): array 
{
    try {
        // Importar una conexión
        require 'includes/database.php';
        $db->set_charset("utf8"); 
        // Escribir el código SQL
        $sql = "SELECT * FROM servicios";
        $consulta = mysqli_query($db, $sql); // Consulta la base de datos

        $i = 0; 
        $servicios = []; // Arreglo vacio
        // Obtener los resultados
       while( $row = mysqli_fetch_assoc($consulta) ) {
            $servicios[$i]['id'] = $row['id'];
            $servicios[$i]['nombre'] = $row['nombre'];
            $servicios[$i]['precio'] = $row['precio'];
            $i++;
       }

        //    echo "<pre>"; 
        //     var_dump( json_encode($servicios));
        //     echo "</pre>";

        return $servicios;
    } catch (\Throwable $th) {
        //throw $th;

        var_dump($th);
    }
}

