<?php
//RUTA: http://daw203.ieslossauces.es/AppFinalRaul2021/api/calculadora.php?operaciones=3&n1=2&n2=5
if(isset ($_GET["n1"]) && isset($_GET["n2"]) && isset($_GET["operaciones"])){ //Si se han introducido los parámetros.
    switch($_GET["operaciones"]){//Depende de la opción que elija un usuario realizo una operación u otra.
        case 1: //Caso 1.
            $resultado=($_GET["n1"] + $_GET["n2"]);//Guardo en la variable $resultado el resultado de la suma.
            echo json_encode("Suma = ".$resultado);//Codifico a JSON el resultado y lo muestro.
            break;
        case 2: //Caso 2.
            $resultado=($_GET["n1"] - $_GET["n2"]);//Guardo en la variable $resultado el resultado de la resta.
            echo json_encode("Resta = ".$resultado);//Codifico a JSON el resultado y lo muestro.
            break;
        case 3: //Caso 3.
            $resultado=($_GET["n1"] * $_GET["n2"]);//Guardo en la variable $resultado el resultado de la multiplicación.
            echo json_encode("Multiplicación = ".$resultado);//Codifico a JSON el resultado y lo muestro.
            break;
        case 4: //Caso 4.
            if($_GET["n2"]!=0){//Si el número 2 introducido es distinto de cero.
                $resultado=($_GET["n1"] / $_GET["n2"]);//Guardo en la variable $resultado el resultado de la división.
                echo json_encode("División = ".$resultado);//Codifico a JSON el resultado y lo muestro.
            }else{//Si no.
                echo json_encode("No se puede dividir un número entre cero");//Muestro un mensaje de que el número 2 no puede ser un 0.
            }
            break;
    }
}else{//Si no.
    echo json_encode("No has establecido ningún parámetro");//Codifico a JSON el mensaje que quiero mostrar.
    exit;
}
header('Content-Type: application/json');//Preparo al navegador para que devuelva un JSON.
header('Access-Control-Allow-Origin: *'); //Permite acceder al fichero.
?>