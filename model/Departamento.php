<?php
/**
 * Class Departamento
 * Clase que se va a utilizar para crear un objeto de la clase departamento.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 11-02-2021.
 * @version 1.0.
 */
    class Departamento{
        /**
         * Código del departamento
         * @var String.
         */
        private $codDepartamento;
        /**
         * Descripción del departamento.
         * @var String.
         */
        private $descDepartamento;
        /**
         * Volumen de negocio del departamento.
         * @var int.
         */
        private $volumenDeNegocio;
        /**
         * Fecha de baja de un departamento.
         * @var date.
         */
        private $fechaBajaDepartamento;
        /**
         * __construct
         * Método mágico del constructor de la clase Departamento.
         * @param String $codDepartamento código del departamento.
         * @param String $descDepartamento descripción del departamento.
         * @param int $volumenDeNegocio volumen de negocio del departamento.
         * @param date $fechaBajaDepartamento fecha de baja de un departamento.
         */
        function __construct($codDepartamento, $descDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
            $this->codDepartamento=$codDepartamento;
            $this->descDepartamento=$descDepartamento;
            $this->volumenDeNegocio=$volumenDeNegocio;
            $this->fechaBajaDepartamento=$fechaBajaDepartamento;
        }
        /**
         * getCodDepartamento()
         * @return String.
         * Devuelve el código del departamento.
         */
        function getCodDepartamento(){
            return $this->codDepartamento;
        }
        /**
         * getDescDepartamento()
         * @return String.
         * Devuelve la descripción del departamento.
         */
        function getDescDepartamento(){
            return $this->descDepartamento;
        }
        /**
         * getVolumenDeNegocio()
         * @return int
         * Devuelve el volumen de negocio del departamento.
         */
        function getVolumenDeNegocio(){
            return $this->volumenDeNegocio;
        }
        /**
         * getFechaBajaDepartamento()
         * @return date
         * Devuelve la fecha de baja del departamento.
         */
        function getFechaBajaDepartamento(){
            return $this->fechaBajaDepartamento;
        }
        /**
         * setCodDepartamento()
         * Método que modifica el valor de $codDepartamento
         * @param String $codDepartamento nuevo código del departamento.
         */
        function setCodDepartamento($codDepartamento){
            $this->codDepartamento=$codDepartamento;
        }
        /**
         * setDescDepartamento()
         * Método que modifica el valor de $descDepartamento.
         * @param String $descDepartamento nueva descripción del departamento.
         */
        function setDescDepartamento($descDepartamento){
            $this->descDepartamento=$descDepartamento;
        }
        /**
         * setVolumenDeNegocio()
         * Método que modifica el valor de $volumenDeNegocio.
         * @param int $volumenDeNegocio nuevo volumen de negocio del departamento.
         */
        function setVolumenDeNegocio($volumenDeNegocio){
            $this->volumenDeNegocio=$volumenDeNegocio;
        }
        /**
         * setFechaBajaDepartamento()
         * Método que modifica el valor de $fechaBajaDepartamento.
         * @param date $fechaBajaDepartamento fecha de baja del departamento.
         */
        function setFechaBajaDepartamento($fechaBajaDepartamento){
            $this->fechaBajaDepartamento=$fechaBajaDepartamento;
        }
    }
?>