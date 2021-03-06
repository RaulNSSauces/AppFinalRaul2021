<?php
/**
 * Class Rest.
 * Clase compuesta de métodos que hacen uso de apis a través de otros servidores.
 * @author Raúl Núñez.
 * @since 1.0.
 * @copyright (c) 04-02-2021.
 * @version 1.0.
 */
class Rest{
    /**
     * instalacionesDeportivas().
     * Método que muestra las instalaciones deportivas que existen en diferentes municipios de Madrid.
     * @param String $distrito nombre del municipio.
     * @return Array $aPolideportivos Devuelve un array con los distintos polideportivos de la comunidad de Madrid.
     */
    public static function instalacionesDeportivas($distrito) {
        
        $uri = file_get_contents('https://datos.madrid.es/egob/catalogo/200186-0-polideportivos.json?distrito_nombre='.$distrito); //Almaceno la uri en una variable como una cadena.
        $aInformacion = json_decode($uri, true); //Almaceno el array que me devuelte y lo codifico a Json.
        
        $polideportivos = $aInformacion['@graph']; //Almaceno en un array la información que quiero obtener del array anterior.
        
        $aPolideportivos = []; //Creo un array vacío.
        $polideportivo=0; //Creo un acumulador y lo inicializo a 0.
        
        foreach ($polideportivos as $campo => $valor){ //Recorro el array.
            $aPolideportivos[$polideportivo]=$valor["title"]; //Almaceno en el array $aPolideportivos todas los polideportivos encontrados.
            $polideportivo++; //Los acumulo.
        }
        return $aPolideportivos; //Devuelvo el array que contiene todos los polideportivos de la comunidad de Madrid.
    }
    /**
     * servicioAPOD()
     * Método que muestra una foto y una descripción de la Nasa según el día.
     * @param Date $fecha fecha que le paso como parámetro
     * @return String Devuelve un String codificado a Json.
     */
    public static function sevicioAPOD($fecha) {
        return json_decode(file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$fecha"), true);        
    }
    /**
     * calculadora()
     * Método que realiza operaciones matemáticas.
     * @param int $tipo Tipo de operación, suma, resta, multiplicación o división.
     * @param float $n1 Primer número que le paso como parámetro.
     * @param float $n2 Segundo número que le paso como parámetro.
     * @return float Devuelve un float codificado a Json.
     */
    public static function calculadora($tipo, $n1, $n2){
        return json_decode(file_get_contents("http://daw203.ieslossauces.es/AppFinalRaul2021/api/calculadora.php?operaciones=$tipo&n1=$n1&n2=$n2"), true);
    }
}
?>