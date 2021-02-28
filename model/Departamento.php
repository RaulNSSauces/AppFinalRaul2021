<?php
/**
 * Class Departamento
 * 
 * Clase que se va a utilizar para crear un objeto de la clase departamento
 * 
 * @author Raúl Núñez.
 * @since 1.0
 * @copyright (c) 11-02-2021.
 * @version 1.0
 */
    class Departamento{
        /**
         * Código del departamento
         * 
         * @var string
         */
        private $codDepartamento;
        /**
         * Descripción del departamento
         * 
         * @var string
         */
        private $descDepartamento;
        /**
         * Fecha de creación del departamento
         * 
         * @var int
         */
        private $fechaCreacionDepartamento;
        /**
         * Volumen de negocio del departamento
         * 
         * @var float
         */
        private $volumenDeNegocio;
        /**
         * Fecha de baja de un departamento
         * 
         * @var int
         */
        private $fechaBajaDepartamento;
        /**
         * __construct
         * 
         * Método mágico del constructor de la clase Departamento
         * 
         * @param string $codDepartamento
         * @param string $descDepartamento
         * @param int $fechaCreacionDepartamento
         * @param float $volumenDeNegocio
         * @param int $fechaBajaDepartamento
         */
        function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
            $this->codDepartamento=$codDepartamento;
            $this->descDepartamento=$descDepartamento;
            $this->fechaCreacionDepartamento=$fechaCreacionDepartamento;
            $this->volumenDeNegocio=$volumenDeNegocio;
            $this->fechaBajaDepartamento=$fechaBajaDepartamento;
        }
        /**
         * getCodDepartamento()
         * 
         * Método que devuelve el código del departamento
         * 
         * @return string devuelve el código del departamento
         */
        function getCodDepartamento(){
            return $this->codDepartamento;
        }
        /**
         * getDescDepartamento()
         * 
         * @return string devuelve la descripción del departamento
         */
        function getDescDepartamento(){
            return $this->descDepartamento;
        }
        /**
         * getFechaCreacionDepartamento()
         * 
         * @return int devuelve la fecha de creación del departamento
         */
        function getFechaCreacionDepartamento(){
            return $this->fechaCreacionDepartamento;
        }
        /**
         * getVolumenDeNegocio()
         * 
         * @return float devuelve el volumen de negocio del departamento
         */
        function getVolumenDeNegocio(){
            return $this->volumenDeNegocio;
        }
        
        /**
         * getFechaBajaDepartamento()
         * 
         * @return int devuelve la fecha de baja del departamento
         */
        function getFechaBajaDepartamento(){
            return $this->fechaBajaDepartamento;
        }
        /**
         * setCodDepartamento()
         * 
         * Método que modifica el valor de $codDepartamento
         * 
         * @param string $codDepartamento nuevo código del departamento
         */
        function setCodDepartamento($codDepartamento){
            $this->codDepartamento=$codDepartamento;
        }
        /**
         * setDescDepartamento()
         * 
         * Método que modifica el valor de $descDepartamento
         * 
         * @param string $descDepartamento nueva descripción del departamento
         */
        function setDescDepartamento($descDepartamento){
            $this->descDepartamento=$descDepartamento;
        }
        /**
         * setFechaCreacionDepartamento()
         * 
         * Método que modifica el valor de $fechaCreacionDepartamento
         * 
         * @param int $fechaCreacionDepartamento fecha de creación del departamento
         */
        function setFechaCreacionDepartamento($fechaCreacionDepartamento){
            $this->fechaCreacionDepartamento=$fechaCreacionDepartamento;
        }
        /**
         * setVolumenDeNegocio()
         * 
         * Método que modifica el valor de $volumenDeNegocio
         * 
         * @param float $volumenDeNegocio nuevo volumen de negocio del departamento
         */
        function setVolumenDeNegocio($volumenDeNegocio){
            $this->volumenDeNegocio=$volumenDeNegocio;
        }
        /**
         * setFechaBajaDepartamento()
         * 
         * Método que modifica el valor de $fechaBajaDepartamento
         * 
         * @param int $fechaBajaDepartamento fecha de baja del departamento
         */
        function setFechaBajaDepartamento($fechaBajaDepartamento){
            $this->fechaBajaDepartamento=$fechaBajaDepartamento;
        }
    }
?>