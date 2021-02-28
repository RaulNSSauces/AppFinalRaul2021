<?php
/**
 * Class Usuario.
 * Clase que se va a utilizar para crear un objeto de la clase usuario.
 * @author Raúl Núñez
 * @since 1.0.
 * @copyright (c) 21-01-2021.
 * @version 1.0.
 */
    class Usuario{
        /**
         * Código del usuario.
         * 
         * @var string
         */
        private $codUsuario;
        /**
         * Contraseña del usuario.
         * 
         * @var string
         */
        private $password;
        /**
         * Descripción del usuario.
         * 
         * @var string
         */
        private $descUsuario;
        /**
         * Número de veces que se ha conectado un usuario.
         * 
         * @var int
         */
        private $numConexiones;
        /**
         * Fecha y hora de la última conexión en formato timestamp.
         * 
         * @var int
         */
        private $fechaHoraUltimaConexion;
        /**
         * Tipo de perfil (Usuario normal, Usuario administrador).
         * 
         * @var string
         */
        private $perfil;
        
        /**
         * __construct
         * 
         * Método mágico del constructor de la clase Usuario.
         * 
         * @param String $codUsuario código del usuario.
         * @param String $password contraseña del usuario.
         * @param String $descUsuario descripción del usuario.
         * @param String $numConexiones número de conexiones del usuario.
         * @param String $fechaHoraUltimaConexion fecha y hora de la última conexión del usuario.
         * @param String $perfil
         */
        
        function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil){
            $this->codUsuario=$codUsuario;
            $this->password=$password;
            $this->descUsuario=$descUsuario;
            $this->numConexiones=$numConexiones;
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
            $this->perfil=$perfil;
        }
        // Creamos los métodos get que devuelven el valor de cada atributo.
        /**
         * getCodUsuario()
         * 
         * @return string Devuelve el código del usuario.
         */
        function getCodUsuario(){
            return $this->codUsuario;
        }
        /**
         * getPassword()
         * 
         * @return string Devuelve la contraseña del usuario.
         */
        function getPassword(){
            return $this->password;
        }
        /**
         * getDescUsuario()
         * 
         * @return string devuelve las descripción del usuario.
         */
        function getDescUsuario(){
            return $this->descUsuario;
        }
        /**
         * getNumConexiones()
         * 
         * @return int devuelve el número de conexiones del usuario.
         */
        function getNumConexiones(){
            return $this->numConexiones;
        }
        /**
         * getFechaHoraUltimaConexion()
         * 
         * @return int devuelve la fecha y la hora de la última conexión.
         */
        function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        /**
         * getPerfil()
         * 
         * @return string devuelve el tipo de perfil del usuario.
         */
        function getPerfil(){
            return $this->perfil;
        }
        // Creamos los métodos set que permiten modificar el valor de un atributo.
        /**
         * setCodUsuario()
         * 
         * Método que modifica el valor de $codUsuario.
         * 
         * @param string $codUsuario nuevo código de usuario.
         */
        function setCodUsuario($codUsuario){
           $this->codUsuario=$codUsuario; 
        }
        /**
         * setPassword()
         * 
         * Método que modifica el valor de $password.
         * 
         * @param string $password nueva contraseña.
         */
        function setPassword($password){
            $this->password=$password;
        }
        /**
         * setDescUsuario()
         * 
         * Método que modifica el valor de $descUsuario.
         * 
         * @param string $descUsuario nueva descripción de usuario.
         */
        function setDescUsuario($descUsuario){
            $this->descUsuario=$descUsuario;
        }
        /**
         * setNumConexiones()
         * 
         * Método que modifica el valor de $numConexiones.
         * 
         * @param int $numConexiones nuevo número de conexiones del usuario.
         */
        function setNumConexiones($numConexiones){
            $this->numConexiones=$numConexiones;
        }
        /**
         * setFechaHoraUltimaConexion()
         * 
         * Método que modifica el valor de $fechaHoraUltimaConexion.
         * 
         * @param int $fechaHoraUltimaConexion nueva fecha y hora del usuario.
         */
        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        }
        /**
         * setPerfil()
         * 
         * Método que modifica el valor de $perfil.
         * 
         * @param string $perfil nuevo perfil del usuario.
         */
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
    }
?>