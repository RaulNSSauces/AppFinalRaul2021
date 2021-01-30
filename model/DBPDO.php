<?php
/**
 * Class DB.
 * Clase que mediante el método permite establecer una conexión a una base de datos.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 21-01-2021.
 * @version 1.0.
 */
    class DB{ //Creo una clase que se llama DB(DATA BASE).
        /**
         * ejecutarConsulta()
         * Método que ejecuta una consulta SQL contra la base de datos.
         * @param type String $SQL Consulta SQL que se va a ejecutar.
         * @param type Array $parametros Parámetros que necesita la consulta para ser ejecutada.
         * @return type PDOStatement devuelve el resultado de la consulta.
         */
        public static function ejecutarConsulta($SQL, $parametros){
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $consulta=$miDB->prepare($SQL); //Preparamos la consulta SQL.
                $consulta->execute($parametros); //Ejecutamos la consulta pasando los parámetros.
            }catch(PDOException $miExcepcionPDO){
                echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
            }finally {
                unset($miDB); //Cierro la conexión a la base de datos.
            }
            return $consulta; //Devuelvo el resultado de la consulta.
        }
    }
?>