<?php
/**
 * Class DepartamentoPDO
 * Clase compuesta de métodos que hacen consultas a la base de datos de la tabla T02_Departamento.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 11-02-2021.
 * @version 1.0.
 */
    class DepartamentoPDO{
        /**
         * buscaDepartamentoPorDescripcion()
         * Método que busca departamentos por la descripción del departamento accediendo a la base de datos.
         * @param String $descDepartamento descripción del departamento.
         * @return array[] Devuelve un array con un objeto de tipo departamento que contiene los datos de la base de datos. Si no existe, devuelve un null.
         */
        public static function buscaDepartamentosPorDescripcion($descDepartamento){
            $aDepartamentos = [];
            $sql="SELECT * FROM T02_Departamento where T02_DescDepartamento like :descDepartamento";
            $resultado=DBPDO::ejecutarConsulta($sql, ["descDepartamento" => "%".$descDepartamento."%"]);
            
            $indice=0;
            if($resultado->rowCount()>0){
                $departamentoDatos=$resultado->fetchObject();
                while($departamentoDatos){
                    $aDepartamentos[$indice] = new Departamento($departamentoDatos->T02_CodDepartamento,
                                                                $departamentoDatos->T02_DescDepartamento,
                                                                $departamentoDatos->T02_VolumenNegocio, 
                                                                $departamentoDatos->T02_FechaBajaDepartamento);
                    $indice++;
                    $departamentoDatos=$resultado->fetchObject();
                } 
            }
            return $aDepartamentos;
        }
        /**
         * buscaDepartamentoPorCodigo()
         * Método que busca departamentos por el código del departamento accediendo a la base de datos.
         * @param String $codDepartamento código del departamento. 
         * @return array[] Devuelve un array con un objeto de tipo departamento que contiene los datos de la base de datos. Si no existe, devuelve un null.
         */
        public static function buscaDepartamentosPorCodigo($codDepartamento){
            $aDepartamentos = [];
            $sql="SELECT * FROM T02_Departamento where T02_CodDepartamento like :codDepartamento";
            $resultado=DBPDO::ejecutarConsulta($sql, ["codDepartamento" => "%".$codDepartamento."%"]);
            
            $indice=0;
            if($resultado->rowCount()>0){
                $departamentoDatos=$resultado->fetchObject();
                while($departamentoDatos){
                    $aDepartamentos[$indice] = new Departamento($departamentoDatos->T02_CodDepartamento,
                                                                $departamentoDatos->T02_DescDepartamento,
                                                                $departamentoDatos->T02_VolumenNegocio, 
                                                                $departamentoDatos->T02_FechaBajaDepartamento);
                    $indice++;
                    $departamentoDatos=$resultado->fetchObject();
                } 
            }
            return $aDepartamentos;
        }
        /**
         * altaDepartamento()
         * Método que da de alta un departamento insertando datos en la base de datos.
         * @param String $codDepartamento código del departamento.
         * @param String $descDepartamento descripción del departamento.
         * @param int $volumenDeNegocio volumen de negocio del departamento.
         * @return boolean Devuelve verdadero si ha conseguido insertar el departamento. Si no, devuelve un false.
         */
        public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
            $altaDepartamento = false;
            $sql = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) VALUES (:codDepartamento, :descDepartamento, :fechaCreacionDepartamento, :volumenNegocio)";
            $resultado = DBPDO::ejecutarConsulta($sql, ["codDepartamento" => $codDepartamento, 
                                                        "descDepartamento" => $descDepartamento,
                                                        "fechaCreacionDepartamento" => time(), 
                                                        "volumenNegocio" => $volumenDeNegocio]);
            if($resultado){
                $altaDepartamento = true;
            }
            return $altaDepartamento;
        }
        /**
         * bajaFisicaDepartamento()
         * Método que elimina un departamento de la base de datos.
         * @param $codDepartamento código del departamento.
         * @return boolean Devuelve verdadero si ha conseguido eliminar el departamento. Si no, devuelve un false.
         */
        public static function bajaFisicaDepartamento($codDepartamento){
            $bajaDepartamento = false;
            $sql = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento=:codDepartamento";
            $resultado = DBPDO::ejecutarConsulta($sql, ["codDepartamento" => $codDepartamento]);
            if($resultado){
                $bajaDepartamento = true;
            }
            return $bajaDepartamento;
        }
        /**
         * modificaDepartamento()
         * Método que modifica el código, la descripción y el volumen de negocio de un departamento en la base de datos.
         * @param String $codDepartamento código del departamento.
         * @param String $descDepartamento descripción del departamento.
         * @param int $volumenDeNegocio volumen de negocio del departamento.
         * @return boolean Devuelve verdadero si ha conseguido modificar los campos del departamento. Si no, devuelve false.
         */
        public static function modificaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
            $modificarDepartamento = false;
            $sql = "UPDATE T02_Departamento SET T02_DescDepartamento=:descDepartamento, T02_VolumenNegocio=:volumenNegocio WHERE T02_CodDepartamento=:codDepartamento";
            $resultado = DBPDO::ejecutarConsulta($sql, ["descDepartamento" => $descDepartamento,
                                                     "volumenNegocio" => $volumenDeNegocio,
                                                     "codDepartamento" => $codDepartamento]);
            if($resultado){
                $modificarDepartamento = true;
            }
            return $modificarDepartamento;
        }
    }
?>