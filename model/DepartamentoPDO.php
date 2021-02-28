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
                                                                $departamentoDatos->T02_FechaCreacionDepartamento,
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
        public static function datosDepartamentos($codDepartamento){
            $oDepartamento = null;
            $sql="SELECT * FROM T02_Departamento where T02_CodDepartamento=?";
            $resultado=DBPDO::ejecutarConsulta($sql, [$codDepartamento]);
            
            if($resultado->rowCount()>0){
                $departamentoDatos=$resultado->fetchObject();
                $oDepartamento = new Departamento($departamentoDatos->T02_CodDepartamento,
                                                  $departamentoDatos->T02_DescDepartamento,
                                                  $departamentoDatos->T02_FechaCreacionDepartamento,
                                                  $departamentoDatos->T02_VolumenNegocio, 
                                                  $departamentoDatos->T02_FechaBajaDepartamento);
                } 
                
            return $oDepartamento;
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
        /**
         * validarCodNoExiste()
         * Método que comprueba si el código del usuario ya existe en la base de datos.
         * @param String $codDepartamento código del usuario.
         * @return boolean Devuelve verdadero si el código del departamento no existe, o falso si el código del departamento existe.
         */
        public static function validarCodNoExiste($codDepartamento){
            $comprobarCodDepartamento=true; //Creo una variable y la inicializo a false.
            
            $sql="SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?"; //Almaceno en una variable la consulta que quiero hacer para comprobar que el usuario existe en la base de datos.
            $resultado=DBPDO::ejecutarConsulta($sql, [$codDepartamento]); //Almaceno en una variable el resultado de la consulta.
            
            if($resultado->rowCount()>0){ //Si ese usuario existe.
                $comprobarCodDepartamento=false; //Cambio el valor de la variable booleana a verdadero.
            }
            return $comprobarCodDepartamento; //Devuelve true o false en función de si el usuario existe en la base de datos o no.
        }
        /**
         * exportar()
         * Método que exporta los departamentos de la base de datos en formato XML.
         */
        public static function exportar(){
            $sql = "SELECT * FROM T02_Departamento";
            $resultadoconsulta = DBPDO::ejecutarConsulta($sql, []);

            $documentoXML = new DOMDocument("1.0", "utf-8"); //Creo el objeto de tipo DOMDocument que recibe 2 parametros: ela version y la codificacion del XML que queremos crear
            $documentoXML->formatOutput = true; //Establece la salida formateada

            $nodoRaiz = $documentoXML->appendChild($documentoXML->createElement('Departamentos')); //Creo el nodo raiz
            $oDepartamento = $resultadoconsulta->fetchObject(); //Obtengo el primer registro de la consulta como un objeto

            while ($oDepartamento) { //Recorro los registros que devuelve la consulta y por cada uno de ellos ejecuto el codigo siguiente
                $departamento = $nodoRaiz->appendChild($documentoXML->createElement('Departamento')); //Creo el nodo para el departamento
                $departamento->appendChild($documentoXML->createElement('CodDepartamento', $oDepartamento->T02_CodDepartamento)); //Añado como hijo el codigo de departamento con su valor
                $departamento->appendChild($documentoXML->createElement('DescDepartamento', $oDepartamento->T02_DescDepartamento)); //Añado como hijo la descripcion del departamento con su valor
                $departamento->appendChild($documentoXML->createElement('FechaCreacion', $oDepartamento->T02_FechaCreacionDepartamento)); //Añado como hijo la fecha de baja del departamento con su valor
                $departamento->appendChild($documentoXML->createElement('VolumenNegocio', $oDepartamento->T02_VolumenNegocio)); //Añado como hijo el volumen de negocio del departamento con su valor
                $departamento->appendChild($documentoXML->createElement('FechaBaja', $oDepartamento->T02_FechaBajaDepartamento)); //Añado como hijo la fecha de baja del departamento con su valor
                $oDepartamento = $resultadoconsulta->fetchObject(); //Guardo el registro actual como un objeto y avanzo el puntero al siguiente registro de la consulta
            }
            $documentoXML->save("tmp/tablaDepartamentos.xml"); //Guarda el arbol XML en la ruta especificada con la fecha del dia que se ejecuta.

            header('Content-Type:text/xml');
            header("Content-Disposition: attachment;filename=tablaDepartamentos.xml");
            readfile("tmp/tablaDepartamentos.xml"); //Mostrar desde el fichero del servidor en el navegador el documento xml si este no se descarga.
            exit;
        }
        /**
         * importar()
         * Método que importa un XML de una tabla de departamentos en la base de datos
         * @param string $file_name
         * @return boolean Devuelve true si ha importado correctamente y false si no.
         */
        public static function importar($file_name){
        $importar = true;
        $sql = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio, T02_FechaBajaDepartamento) VALUES (:codDepartamento, :descDepartamento, :fechaCreacionDepartamento, :volumenNegocio, :fechaBajaDepartamento)";
        move_uploaded_file($file_name, 'tmp/copiaDeSeguridad.xml');
        $archivoXML = new DOMDocument("1.0", "utf-8");
        $archivoXML->load('tmp/copiaDeSeguridad.xml');

        $numeroDepartamentos = $archivoXML->getElementsByTagName('Departamento')->count();
            for ($numeroDepartamento = 0; $numeroDepartamento<$numeroDepartamentos; $numeroDepartamento++){
                $codDepartamento=$archivoXML->getElementsByTagName("CodDepartamento")->item($numeroDepartamento)->nodeValue;
                $descDepartamento=$archivoXML->getElementsByTagName("DescDepartamento")->item($numeroDepartamento)->nodeValue;
                $FechaCreacion=$archivoXML->getElementsByTagName("FechaCreacion")->item($numeroDepartamento)->nodeValue;
                $volumenDeNegocio=$archivoXML->getElementsByTagName("VolumenNegocio")->item($numeroDepartamento)->nodeValue;
                $FechaBaja=$archivoXML->getElementsByTagName("FechaBaja")->item($numeroDepartamento)->nodeValue;
                    if(empty($FechaBaja)){
                        $FechaBaja = null;
                    }
                $resultado = DBPDO::ejecutarConsulta($sql, ["codDepartamento" => $codDepartamento, 
                                                            "descDepartamento" => $descDepartamento,
                                                            "fechaCreacionDepartamento" => $FechaCreacion, 
                                                            "volumenNegocio" => $volumenDeNegocio,
                                                            "fechaBajaDepartamento" => $FechaBaja]);
                if(!$resultado){
                    $importar=false;
                    exit;
                }
            }
            return $importar;
        }
        /**
     * Metodo rehabilitar()
     * Metodo que rehabilita un departamento poniendo su fecha de baja a null
     * @param  string $codDepartamento codigo del departamento que queremos rehabilitar
     * @return boolean Devuelve true si se ha rehabilitado el departamento, false si no 
     */
        public static function rehabilitar($codDepartamento){
            $rehabilitarDepartamento = false;

            $sql = "UPDATE T02_Departamento SET T02_FechaBajaDepartamento = null WHERE T02_CodDepartamento=:codDepartamento";
            $resultado = DBPDO::ejecutarConsulta($sql, ["codDepartamento" => $codDepartamento]); 
            
            if($resultado){ 
                $rehabilitarDepartamento = true;
            }

        return $rehabilitarDepartamento;
        }
        /**
     * Metodo bajaLogicaDepartamento()
     *
     * Metodo que da de baja logica un departamento
     * 
     * @param  string $codDepartamento codigo del departamento que queremos dar de baja logica
     * @param  string $fechaDeBajaDepartamento fecha de baja con el formato "dd/mm/aaaa"
     * @return boolean true si se ha dado de baja logica correctamente, false si no
     */
        public static function bajaLogicaDepartamento($codDepartamento, $fechaDeBajaDepartamento){
            $bajaLogicaDepartamento = false; 
            $fechaBaja = new DateTime($fechaDeBajaDepartamento); 

            $sql = "Update T02_Departamento set T02_FechaBajaDepartamento=? WHERE T02_CodDepartamento=?";
            $resultado = DBPDO::ejecutarConsulta($sql, [$fechaBaja->getTimestamp(), $codDepartamento]);

            if ($resultado) { 
                $bajaLogicaDepartamento = true;
            }

            return $bajaLogicaDepartamento;
        }
    }
?>