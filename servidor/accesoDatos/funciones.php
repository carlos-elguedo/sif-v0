<?php
/**
 * @author Carlos-Elguedo, Rafael Castellar, Zamir Martelo
 * @copyright 2016
 */



function recortar_mensaje($men){
    $ret = "";
    if(strlen($men) > 55){
        $ret = substr($men, 0, 54). "...";
    }else{
        $ret = $men;
    }
    return $ret;
}
function recortar_mensaje2($men){
    $ret = "";
    if(strlen($men) > 45){$ret = substr($men, 0, 44). "...";}
    else{$ret = $men;}
    return $ret;
}
function recortar_mensaje3($men){
    $ret = "";
    if(strlen($men) > 35){$ret = substr($men, 0, 34). "...";}
    else{$ret = $men;}
    return $ret;
}
function recortar_hora($men){
    $ret = "";
    
    $ret = substr($men, 0, strlen($men) - 3);
    $posible_cero = substr($ret, 0, 1);
    if("0" == $posible_cero){
        $ret = substr($ret, 1, strlen($ret));
    }

    return $ret;
}



function recortar_titulo1($tit){//para dispositivos con resolucion menor que 380 y menor que 280
    $ret = "";
    if(strlen($tit) > 14){$ret = substr($tit, 0, 13). "...";}
    else{$ret = $tit;}
    return $ret;
}
function recortar_titulo2($tit){//para dispositivos con resolucion menor que 280
    $ret = "";
    if(strlen($tit) > 12){$ret = substr($tit, 0, 11). "...";}
    else{$ret = $tit;}
    return $ret;
}
function recortar_titulo3($tit){//para dispositivos con resolucion menor que 280
    $ret = "";
    if(strlen($tit) > 9){$ret = substr($tit, 0, 8). "...";}
    else{$ret = $tit;}
    return $ret;
}
function dias($d){
    switch($d){
        case "do.":return "dom";break;case "Sun":return "dom";break;
        case "lu.":return "lun";break;case "Mon":return "lun";break;
        case "ma.":return "mar";break;case "Tue":return "dom";break;
        case "mi.":return "mie";break;case "Wed":return "mie";break;
        case "ju.":return "jue";break;case "Thu":return "jue";break;
        case "vi.":return "vie";break;case "Fri":return "vie";break;
        case "sa.":return "sab";break;case "sat":return "sab";break;
        default : return "-". $d;break;
    }
}
function daDia($fec){
    $reto;
    
    $p = strpos($fec, " ");
    
    $f1 = substr($fec, 0, $p);
    $f2 = substr($fec, $p + 1, strlen($fec));
    
    $d = substr($f1, strlen($f1) - 2, strlen($f1));
    $m = substr($f1, strlen($f1) - 5, strlen($f1) - 8);
    $a = substr($f1, 0, 4);
    
    $h = substr($f2, 0, 2);
    $mi = substr($f2, 3, 2);
    $s = substr($f2, strlen($f2) - 2, strlen($f2));
    
    
    return dias(strftime("%a", mktime($h, $mi, $s, $m, $d, $a)));
}








?>