<?php
/**
 * Class Usuario PDO.
 * Clase compuesta de métodos que hacen consultas a la base de datos de la tabla T01_Usuario.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 21-01-2021.
 * @version 1.0.
 */
    class UsuarioPDO{
        /**
         * validarUsuario()
         * Método cuya función es la de validar si un usuario con su respectiva contraseña se encuentran en la base de datos.
         * @param String $codUsuario código del usuario.
         * @param String $password contraseña del usuario.
         * @return array[] Devuelve un objeto de tipo usuario con los datos de la base de datos y la fecha y hora de la última conexión. Si no existe, devuelve null.
         */
        
        public static function validarUsuario($codUsuario, $password){
            $oUsuario=null; //Creo una variable que va a contener un objeto de tipo usuario y la inicializo a null.
            $fechaHoraUltimaConexion=null; //Creo una variable donde voy a almacenar la fecha de la última conexión y la inicializo a null.
            
            $sql="SELECT * FROM T01_Usuario where T01_CodUsuario=? and T01_Password=?"; //Almaceno en una variable la consulta que voy a ejecutar de comprobar si ese usuario y esa contraseña existen en la base de datos.
            $encriptarPassword=hash("sha256", ($codUsuario.$password)); //Encripto la contraseña pasada como parámetro.
            $resultado=DBPDO::ejecutarConsulta($sql, [$codUsuario, $encriptarPassword]); //Ejecuto la consulta y almaceno en una variable el resultado.
            
            if($resultado->rowCount()>0){ //Si la consulta devuelve algo.
                $usuarioDatos=$resultado->fetchObject(); //Guardo en una variable el resultado de la consulta.
                $fechaHoraUltimaConexion = $usuarioDatos->T01_FechaHoraUltimaConexion; //Guardo en una variable la fecha y la hora de la última conexión antes de hacer el update. 
                
                $sqlUltimaConexion="UPDATE T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?"; //Almaceno en una variable la consulta que voy a ejecutar para actualizar el número de conexiones y la fecha y hora de la última conexión en la base de datos.
                $resultadoUltimaConexion = DBPDO::ejecutarConsulta($sqlUltimaConexion, [time(), $codUsuario]); //Ejecuto la consulta y almaceno en una variable el resultado.
                
                $sqlDatosUsuario = "SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que voy a ejecutar de comprobar si ese usuario existe en la base de datos.
                $oDatosUsuario = DBPDO::ejecutarConsulta($sqlDatosUsuario, [$codUsuario]); //Almaceno en una variable el resultado que me devuelve la ejecución de la consulta.
                $resultadoUsuarioActualizado = $oDatosUsuario -> fetchObject(); 
                $oUsuario = new Usuario($resultadoUsuarioActualizado->T01_CodUsuario, //Instancio un usuario nuevo con los datos del usuario.
                                        $resultadoUsuarioActualizado->T01_Password,
                                        $resultadoUsuarioActualizado->T01_DescUsuario, 
                                        $resultadoUsuarioActualizado->T01_NumConexiones,
                                        $resultadoUsuarioActualizado->T01_FechaHoraUltimaConexion,
                                        $resultadoUsuarioActualizado->T01_Perfil,
                                        $resultadoUsuarioActualizado->T01_ImagenUsuario);
            }
            return [$oUsuario, $fechaHoraUltimaConexion]; //Devuelvo un array con los datos del objeto del usuario y la fecha de la última conexión.
        }
        /**
         * altaUsuario()
         * Método que inserta un nuevo usuario en la base de datos.
         * @param string $codUsuario código del usuario.
         * @param string $password contraseña del usuario.
         * @param string $descUsuario descripción del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos de la base de datos. Si no existe, devuelve null.
         */
        public static function altaUsuario($codUsuario, $password, $descUsuario){
            $oUsuario=null; //Creo una variable que va a contener un objeto de tipo usuario y la inicializo a null.
            
            $sql="INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)"; //Almaceno en una variable la consulta que le voy a pedir que me ejecute.
            $encriptarPassword=hash("sha256", ($codUsuario.$password)); //Encripto la contraseña pasada como parámetro.
            $resultado=DBPDO::ejecutarConsulta($sql, [$codUsuario, $encriptarPassword, $descUsuario, time()]); //Ejecuto la consulta y almaceno en una variable el resultado.
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que le voy a pedir que me ejecute.
            $resultadoDatos=DBPDO::ejecutarConsulta($datos,[$codUsuario]); //Ejecuto la consulta y almaceno en una variable el resultado.
            
            if($resultadoDatos->rowCount()>0){ //Si la consulta devuelve algo.
                $usuarioDatos=$resultadoDatos->fetchObject();
                $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario, //Instancio un usuario nuevo con los datos del usuario.
                                      $usuarioDatos->T01_Password,
                                      $usuarioDatos->T01_DescUsuario, 
                                      $usuarioDatos->T01_NumConexiones,
                                      $usuarioDatos->T01_FechaHoraUltimaConexion,
                                      $usuarioDatos->T01_Perfil,
                                      $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario; //Devuelvo un array con los datos del objeto de tipo usuario.
        }
        /**
         * modificarUsuario()
         * Método que modifica la descripción del usuario por otro que cambie el usuario.
         * @param String $codUsuario código del usuario.
         * @param String $nuevaDescUsuario nueva descripción del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos de la base de datos. Si no existe, devuelve null.
         */
        public static function modificarUsuario($codUsuario, $nuevaDescUsuario){
            $oUsuario=null; //Creo una variable que va a contener un objeto de tipo usuario y la inicializo a null.
            
            $sql="UPDATE T01_Usuario SET T01_DescUsuario=? WHERE T01_CodUsuario=?"; //Almaceno en una variable la consulta que le voy a pedir que me ejecute.
            $resultado=DBPDO::ejecutarConsulta($sql, [$nuevaDescUsuario, $codUsuario]); //Ejecuto la consulta y almaceno en una variable el resultado.
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que le voy a pedir que me ejecute.
            $resultadoDatos=DBPDO::ejecutarConsulta($datos, [$codUsuario]); //Ejecuto la consulta y almaceno en una variable el resultado.
            if($resultadoDatos->rowCount()>0){ //Si la consulta devuelve algo.
               $usuarioDatos=$resultadoDatos->fetchObject();
               $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario, //Instancio un usuario nuevo con los datos del usuario.
                                     $usuarioDatos->T01_Password,
                                     $usuarioDatos->T01_DescUsuario, 
                                     $usuarioDatos->T01_NumConexiones,
                                     $usuarioDatos->T01_FechaHoraUltimaConexion,
                                     $usuarioDatos->T01_Perfil,
                                     $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario; //Devuelvo un array con los datos del objeto de tipo usuario.
        }
        /**
         * borrarUsuario()
         * Método que elimina un usuario de manera permanente.
         * @param $codUsuario código del usuario
         * @return boolean Devuelve verdadero si ha conseguido eliminar el usuario o falso si por el contrario no lo ha conseguido eliminar.
         */
        public static function borrarUsuario($codUsuario){
            $comprobarUsuario=false; //Creo una variable y la inicializo a false.
            
            $sql="DELETE FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que quiero hacer para comprobar que el usuario existe en la base de datos.
            $resultado=DBPDO::ejecutarConsulta($sql, [$codUsuario]); //Almaceno en una variable el resultado de la consulta.
            
            if($resultado->rowCount()>0){ //Si ese usuario existe.
                $comprobarUsuario=true; //Cambio el valor de la variable booleana a verdadero.
            }
            return $comprobarUsuario; //Devuelve true o false dependiendo de si el usuario existe en la base de datos o no.
        }
        /**
         * validarCodNoExiste()
         * Método que comprueba si el código del usuario ya existe en la base de datos.
         * @param String $codUsuario código del usuario.
         * @return boolean Devuelve verdadero si el código del usuario no existe, o falso si el código del usuario existe.
         */
        public static function validarCodNoExiste($codUsuario){
            $comprobarUsuario=true; //Creo una variable y la inicializo a false.
            
            $sql="SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que quiero hacer para comprobar que el usuario existe en la base de datos.
            $resultado=DBPDO::ejecutarConsulta($sql, [$codUsuario]); //Almaceno en una variable el resultado de la consulta.
            
            if($resultado->rowCount()>0){ //Si ese usuario existe.
                $comprobarUsuario=false; //Cambio el valor de la variable booleana a verdadero.
            }
            return $comprobarUsuario; //Devuelve true o false en función de si el usuario existe en la base de datos o no.
        }
        /**
         * modificarPassword()
         * Método que modifica la contraseña del usuario en la base de datos.
         * @param String $codUsuario código del usuario.
         * @param String $nuevaPassword password del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos que están en la base de datos. Si no, devuelve un null.
         */
        public static function modificarPassword($codUsuario, $nuevaPassword){
            $sql="UPDATE T01_Usuario SET T01_Password=? WHERE T01_CodUsuario=?"; //Almaceno en una variable la consulta que quiero hacer para actualizar la contraseña del usuario en la base de datos.
            $encriptarPassword=hash("sha256", ($codUsuario.$nuevaPassword)); //Encripto la contraseña pasada como parámetro.
            $resultado=DBPDO::ejecutarConsulta($sql, [$encriptarPassword, $codUsuario]); //Almaceno en una variable el resultado de la consulta.
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Almaceno en una variable la consulta que quiero hacer en la base de datos.
            $resultadoDatos=DBPDO::ejecutarConsulta($datos,[$codUsuario]); //Almaceno en una variable el resultado de la consulta.
            
            if($resultadoDatos->rowCount()>0){ //Si la consulta devuelve algo.
                $usuarioDatos=$resultadoDatos->fetchObject();
                $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario, //Instancio un usuario nuevo con los datos del usuario.
                                      $usuarioDatos->T01_Password,
                                      $usuarioDatos->T01_DescUsuario, 
                                      $usuarioDatos->T01_NumConexiones,
                                      $usuarioDatos->T01_FechaHoraUltimaConexion,
                                      $usuarioDatos->T01_Perfil,
                                      $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario; //Devuelvo un array con los datos del objeto de tipo usuario.
        }
    }
?>