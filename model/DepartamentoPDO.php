<?php
    class DepartamentoPDO{
        
        public static function buscaDepartamentosPorDescripcion($descDepartamento){
            $aDepartamentos = [];
            $sql="select * from Departamento where DescDepartamento like '%'?'%'";
            $resultado=DB::ejecutarConsulta($sql, [$descDepartamento]);
            
            $indice=0;
            if($resultado->rowCount()>0){
                $departamentoDatos=$resultado->fetchObject();
                while($departamentoDatos){
                    $aDepartamentos[$indice] = new Departamento($departamentoDatos->T01_CodDepartamento,
                                                                $departamentoDatos->T01_DescDepartamento,
                                                                $departamentoDatos->T01_VolumenDeNegocio, 
                                                                $departamentoDatos->T01_FechaBajaDepartamento);
                    $indice++;
                    $departamentoDatos=$resultado->fetchObject();
                } 
            }
            return $aDepartamentos;
        }
    }
?>