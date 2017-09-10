<?php

namespace app\helpers;

use Yii;

class HelperPersonalizado {

    
    
    public static function CalcularValorDescuento($precio, $porcentaje) {
        $pPrecio = ($precio*$porcentaje)/100;
        return $precio-$pPrecio;
        
    }
    
    public static function DiasRestantes($fecha1, $fecha2) {
        $current = $fecha1;
        $datetime2 = date_create($fecha2);
        $count = 0;
        while (date_create($current) < $datetime2) {
            $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
            $count++;
        }
        return $count;
    }

    /*
      public static function DiasRestantes($fecha1, $fecha2){
      $datetime1 = date_create($fecha1);
      $datetime2 = date_create($fecha2);

      //$interval = date_diff($datetime1, $datetime2);

      $interval = $datetime1->diff($datetime2);
      $years = $interval->format('%y');
      $months = $interval->format('%m');
      $days = $interval->format('%d');
      if($years!=0){
      $ago = $years.' year(s) ago';
      }else{
      $ago = ($months == 0 ? $days.' día(s)' : $months.' mes(s) ');
      }
      //  echo $ago;

      //return $interval->format('%R%a días');
      return $ago;
      //return $interval->format('%D días');

      }

     */

    public static function getBoundaries($lat, $lng, $distance = 1, $earthRadius = 6371) {
        $return = array();

        // Los angulos para cada dirección
        $cardinalCoords = array('north' => '0',
            'south' => '180',
            'east' => '90',
            'west' => '270');
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance / $earthRadius;
        foreach ($cardinalCoords as $name => $angle) {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
            $return[$name] = array('lat' => (float) rad2deg($rLatB),
                'lng' => (float) rad2deg($rLonB));
        }
        return array('min_lat' => $return['south']['lat'],
            'max_lat' => $return['north']['lat'],
            'min_lng' => $return['west']['lng'],
            'max_lng' => $return['east']['lng']);
    }

    public static function obtenerIP() {

        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }

    public static function FormatearFecha($fecha) {
        $dia = substr($fecha, 8, 2);
        $mes = substr($fecha, 5, 2);
        $anio = substr($fecha, 0, 4);

        switch ($mes) {
            case '01':
                $mes = "Enero";
                break;
            case '02':
                $mes = "Febrero";
                break;
            case '03':
                $mes = "Marzo";
                break;
            case '04':
                $mes = "Abril";
                break;
            case '05':
                $mes = "Mayo";
                break;
            case '06':
                $mes = "Junio";
                break;
            case '07':
                $mes = "Julio";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }
        $fecha = $dia . " de " . $mes . " de " . $anio;
        return $fecha;
    }

    public static function CalcularEdad($fecha) {
        $edad = strtotime($fecha);
        $now = strtotime('now');

        $Miedad = ($now - $edad) / 31536000;

        return floor($Miedad);
        //return ($Miedad."");
    }

    public static function AcortarCadena($cadena, $limite) {
        $cad = $cadena;
        $cadenaCorta = substr($cad, 0, $limite); //La subcadena aprender
        return $cadenaCorta;
    }

    public static function RutaAbsoluta() {
        $host = $_SERVER['HTTP_HOST'];
        //$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return $base = "http://" . $host . '/facturacion/web/';
    }

    public static function RutaRaiz() {
        $host = $_SERVER['HTTP_HOST'];
        //$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return $base = "http://" . $host . '/';
    }

    public static function RestarFecha($fecha, $dia) {

        $nuevafecha = strtotime($dia . 'day', strtotime($fecha));
        return $nuevafecha = date('Y-m-d', $nuevafecha);
    }

    
}
