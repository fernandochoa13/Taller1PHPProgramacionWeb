<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Registro || Fernando Ochoa</title>
    
</head>
<body>
    
    <h2>Ingrese datos de la persona</h2>

    <form method="post" action="index.php">

        <label for="nombreID" class="nombreEtiqueta">Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        
        <label for="apellidoID" class="nombreEtiqueta"> Apellido:</label> 
        <input type="text" name="apellido" required><br><br>

        <label for="edadID" class="nombreEtiqueta"> Edad:</label> 
        <input type="number" name="edad" value="edad"required id="inputEdad"><br><br>

        <label for="gen" class="nombreEtiqueta">Genero: </label>
        <br><br>

            <input type="radio" name= "gen" value= "Masculino">
            <label for="masculino" class="nombreOpciones">Masculino</label> <br>

            <input type="radio" name= "gen" value= "Femenino">
            <label for="femenino" class="nombreOpciones">Femenino</label> <br><br>

        <label for="estadoCivil" class="nombreEtiqueta">Estado Civil: </label>
        <br><br>
            <input type="checkbox" id="soltero" name="civil" value= "Soltero(a)">
            <label for="soltero" class="nombreOpciones"
            >Soltero(a)</label> <br>

            <input type="checkbox" id="casado" name="civil" value="Casado(a)" >
            <label for="Casado" class="nombreOpciones">Casado(a)</label> <br>

            <input type="checkbox" id="viudo" name="civil" value="Viudo(a)">
            <label for="viudo" class="nombreOpciones">Viudo(a)</label> <br><br>

        <label for="sueldo" class="nombreEtiqueta">Sueldo:</label>
        <select name="sueldo">
        <option value="menos de 1000" class="nombreEtiqueta">Menos de 1000</option>
        <option value="entre 1000 y 2500" class="nombreEtiqueta">Entre 1000 y 2500</option>
        <option value="mas de 2500" class="nombreEtiqueta">Más de 2500</option>
        </select> <br> <br> <br>

        <button type = "submit"  name= "btn" bonclick ="alert('Empleado registrado exitosamente!')" class="botonClase"> Registrar </button> 
        
    </form>
    
</body>
</html>


<?php

include "empleados.php";
session_start();
$_SESSION['Empleados'] = array();



if (isset($_POST['btn'])){
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad']) && !empty ($_POST['edad']) && isset($_POST['gen']) && isset($_POST['civil']) && isset($_POST['sueldo'])){
        

        $empleadoval = new empleadodatos();
        $empleadoval->setNombre($_POST['nombre']);
        $empleadoval->setApellido($_POST['apellido']);
        $empleadoval->setEdad($_POST['edad']);
        $empleadoval->setGenero($_POST['gen']);
        $empleadoval->setEstadoCivil($_POST['civil']);
        $empleadoval->setSueldo($_POST['sueldo']);
        echo "<br>";
        echo "<br>";

            array_push($_SESSION['Empleados'], $empleadoval);

        echo "<h2>Listas de datos: </h2>";
        registros();
    } else{
        echo "No funcionó, intentar nuevamente";
    }
}


//Función para determinar los promedios que pide el ejercicio
function registros(){

    $viuda = 0;
    $casado = 0;
    $mujer = 0;
    $promedio = 0;
    $total = 0;
    $edad = 0;

    $init = count($_SESSION['Empleados']);

    if(isset($_SESSION['Empleados'])){
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Empleados'][$i]->getGenero() == "Femenino") {
                $mujer ++;
            } 
        }
        echo "<br>";
        echo "<h2>Total de empleados femeninos: ". $mujer . "</h2>";
    }


    if(isset($_SESSION['Empleados'])){
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Empleados'][$i]->getGenero() == "Masculino" && $_SESSION['Empleados'][$i]->getEstadoCivil() == 'Casado(a)' && $_SESSION['Empleados'][$i]->getSueldo() == 'mas de 2500') {
                $casado ++;
            }   
        }
        echo "<br>";
        echo "<h2>Total de hombres casados que ganan mas de 2500: ". $casado . "</h2>";
    }

    //Mujeres viudas que ganan mas de 1000bs

    if(isset($_SESSION['Empleados'])){
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Empleados'][$i]->getGenero() == "Femenino" && $_SESSION['Empleados'][$i]->getEstadoCivil() == 'Viudo(a)' && $_SESSION['Empleados'][$i]->getSueldo() == 'entre 1000 y 2500') {
                $viuda ++;
            } 
        }
        echo "<br>";
        echo "<h2>Total de mujeres viudas que ganan mas de 1000: ". $viuda . "</h2>";
    }

    // Edad promedio de hombres
    if(isset($_SESSION['Empleados'])){
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Empleados'][$i]->getGenero() == "Masculino") {
                $edad += $_SESSION['Empleados'][$i]->getEdad();
                $total++;
            }
        }
        if($total == 0) {
            echo "<br>";
            echo "No se registraron hombres";
        }
        $promedio = $edad/$total;
        echo "<br>";
        echo "<h2>Edad promedio de hombres: ". $promedio . "</h2>";
        
    }

}





?>


