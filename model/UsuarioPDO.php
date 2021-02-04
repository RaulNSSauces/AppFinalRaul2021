<?php
/**
 * Class Usuario PDO.
 * Clase compuesta de métodos que hacen consultas a la base de datos de la tabla T_01Usuario.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 21-01-2021.
 * @version 1.0.
 */
    class UsuarioPDO{
        /**
         * validarUsuario()
         * Método cuya función es la de validar si un usuario con su respectiva contraseña se encuentran en la base de datos.
         * @param type String $codUsuario código del usuario.
         * @param type String $password contraseña del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos de la base de datos.
         * Si no existe, devuelve null.
         */
        
        public static function validarUsuario($codUsuario, $password){
            $oUsuario=null;
            $fechaHoraUltimaConexion=null;
            
            $sql="SELECT * FROM T01_Usuario where T01_CodUsuario=? and T01_Password=?";
            $encriptarPassword=hash("sha256", ($codUsuario.$password));
            $resultado=DB::ejecutarConsulta($sql, [$codUsuario, $encriptarPassword]);
            
            if($resultado->rowCount()>0){
                $usuarioDatos=$resultado->fetchObject();
                $fechaHoraUltimaConexion = $usuarioDatos->T01_FechaHoraUltimaConexion;
                
                $sqlUltimaConexion="UPDATE T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
                $resultadoUltimaConexion = DB::ejecutarConsulta($sqlUltimaConexion, [time(), $codUsuario]);
                
                $sqlDatosUsuario = "SELECT * FROM T01_Usuario where T01_CodUsuario=?";
                $oDatosUsuario = DB::ejecutarConsulta($sqlDatosUsuario, [$codUsuario]);
                $resultadoUsuarioActualizado = $oDatosUsuario -> fetchObject();
                $oUsuario = new Usuario($resultadoUsuarioActualizado->T01_CodUsuario,
                                        $resultadoUsuarioActualizado->T01_Password,
                                        $resultadoUsuarioActualizado->T01_DescUsuario, 
                                        $resultadoUsuarioActualizado->T01_NumConexiones,
                                        $resultadoUsuarioActualizado->T01_FechaHoraUltimaConexion,
                                        $resultadoUsuarioActualizado->T01_Perfil,
                                        $resultadoUsuarioActualizado->T01_ImagenUsuario);
            }
            return [$oUsuario, $fechaHoraUltimaConexion];
        }
        /**
         * altaUsuario()
         * Método que inserta un nuevo usuario en la base de datos.
         * @param type string $codUsuario código del usuario.
         * @param type string $password contraseña del usuario.
         * @param type string $descUsuario descripción del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos de la base de datos.
         * Si no existe, devuelve null.
         */
        public static function altaUsuario($codUsuario, $password, $descUsuario){
            $oUsuario=null;
            
            $sql="INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
            $encriptarPassword=hash("sha256", ($codUsuario.$password));
            $resultado=DB::ejecutarConsulta($sql, [$codUsuario, $encriptarPassword, $descUsuario, time()]);
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?";
            $resultadoDatos=DB::ejecutarConsulta($datos,[$codUsuario]);
            
            if($resultadoDatos->rowCount()>0){
                $usuarioDatos=$resultadoDatos->fetchObject();
                $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario,
                                      $usuarioDatos->T01_Password,
                                      $usuarioDatos->T01_DescUsuario, 
                                      $usuarioDatos->T01_NumConexiones,
                                      $usuarioDatos->T01_FechaHoraUltimaConexion,
                                      $usuarioDatos->T01_Perfil,
                                      $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario;
        }
        /**
         * modificarUsuario()
         * Método que modifica la descripción del usuario por otro que cambie el usuario.
         * @param type String $codUsuario código del usuario.
         * @param type String $nuevaDescUsuario nueva descripción del usuario.
         * @return \Usuario Devuelve un objeto de tipo usuario con los datos de la base de datos.
         * Si no existe, devuelve null.
         */
        public static function modificarUsuario($codUsuario, $nuevaDescUsuario){
            $oUsuario=null;
            
            $sql="UPDATE T01_Usuario SET T01_DescUsuario=? WHERE T01_CodUsuario=?";
            $resultado=DB::ejecutarConsulta($sql, [$nuevaDescUsuario, $codUsuario]);
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?";
            $resultadoDatos=DB::ejecutarConsulta($datos, [$codUsuario]);
            if($resultadoDatos->rowCount()>0){
               $usuarioDatos=$resultadoDatos->fetchObject();
               $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario,
                                     $usuarioDatos->T01_Password,
                                     $usuarioDatos->T01_DescUsuario, 
                                     $usuarioDatos->T01_NumConexiones,
                                     $usuarioDatos->T01_FechaHoraUltimaConexion,
                                     $usuarioDatos->T01_Perfil,
                                     $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario;
        }
        /**
         * borrarUsuario()
         * Método que elimina un usuario de manera permanente.
         * @param type $codUsuario código del usuario
         * @return boolean Devuelve verdadero si ha conseguido eliminar el usuario o falso si por el contrario no lo ha conseguido eliminar.
         */
        public static function borrarUsuario($codUsuario){
            $comprobarUsuario=false;
            
            $sql="DELETE FROM T01_Usuario where T01_CodUsuario=?";
            $resultado=DB::ejecutarConsulta($sql, [$codUsuario]);
            
            if($resultado->rowCount()>0){
                $comprobarUsuario=true;
            }
            return $comprobarUsuario;
        }
        /**
         * validarCodNoExiste()
         * Método que comprueba si el código del usuario ya existe en la base de datos.
         * @param type String $codUsuario código del usuario.
         * @return boolean Devuelve verdadero si el código del usuario no existe, o falso si el código del usuario existe.
         */
        public static function validarCodNoExiste($codUsuario){
            $comprobarUsuario=true;
            $sql="SELECT * FROM T01_Usuario where T01_CodUsuario=?";
            $resultado=DB::ejecutarConsulta($sql, [$codUsuario]);
            if($resultado->rowCount()>0){
                $comprobarUsuario=false;
            }
            return $comprobarUsuario;
        }
        public static function modificarPassword($codUsuario, $nuevaPassword){
            $sql="UPDATE T01_Usuario SET T01_Password=? WHERE T01_CodUsuario=?";
            $encriptarPassword=hash("sha256", ($codUsuario.$nuevaPassword));
            $resultado=DB::ejecutarConsulta($sql, [$encriptarPassword, $codUsuario]);
            
            $datos="SELECT * FROM T01_Usuario where T01_CodUsuario=?";
            $resultadoDatos=DB::ejecutarConsulta($datos,[$codUsuario]);
            
            if($resultadoDatos->rowCount()>0){
                $usuarioDatos=$resultadoDatos->fetchObject();
                $oUsuario=new Usuario($usuarioDatos->T01_CodUsuario,
                                      $usuarioDatos->T01_Password,
                                      $usuarioDatos->T01_DescUsuario, 
                                      $usuarioDatos->T01_NumConexiones,
                                      $usuarioDatos->T01_FechaHoraUltimaConexion,
                                      $usuarioDatos->T01_Perfil,
                                      $usuarioDatos->T01_ImagenUsuario);
            }
            return $oUsuario;
        }
    }
?>