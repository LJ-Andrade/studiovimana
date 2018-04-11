<?php
    
//////////////////////////////////////////////
//         Numbers, Calcs. & Converts       //
//////////////////////////////////////////////

function calcFinalPriceConvert($cost, $percent, $currencyActualValue)
{
    $percent = $cost * $percent / 100;
    $result  = $cost + $percent;
    $result  = $result * $currencyActualValue;
    return $result;
}
    
function calcValuePercentNeg($price, $percent)
{
    $percent = $price * $percent / 100;
    $result =  $price - $percent;
    return convertAndRoundDecimal($result, 2);
}

function calcValuePercentPos($price, $percent)
{
    $percent = $price * $percent / 100;
    $result =  $price + $percent;
    return convertAndRoundDecimal($result, 2);
}

function calcPercent($price, $percent)
{
    $percent = $price * $percent / 100;
    return convertAndRoundDecimal($percent, 2);
}

function formatNum($number, $digits)
{
    $root       = 10;
    $multiplier = pow($root, $digits);
    $result     = ((int)($number * $multiplier)) / $multiplier;
    return number_format($result, $digits, ',', '.');
}
    
function convertAndRoundDecimal($number, $precision)
{
    $number = floatval($number);
    $p      = pow(10, $precision);
    return ceil(round($number * $p, 1)) / $p; 
}

function round_sup($nb, $precision)
{
}
    
function calcFinalPrice($cost, $pje)
{
    $result = $cost * $pje / 100;
    $result = $result + $cost;
    return $result;
}



//////////////////////////////////////////////
//               Translations               //
//////////////////////////////////////////////

function roleTrd($role)
{
    // Roles: 1 Superadmin - 2 Admin - 3 User - 4 Guest
    switch ($role) {
        case 1:
            echo 'SuperAdmin';
            break;
        case 2:
            echo 'Admin';
            break;
        case 3:
            echo 'Usuario';
            break;
        case 4:
            echo 'Invitado';
            break;
        default:
            echo '';
            break;
    }
}

function groupTrd($group)
{   
    // Group: 1 Member - 2 Client - 3 ClientBig
    switch ($group) {
        case 1:
            echo 'Miembro';
            break;
        case 2:
            echo 'Cliente';
            break;
        case 3:
            echo 'Mayorísta';
            break;
        default:
            echo '';
            break;
    }
}

function statusTrd($status)
{
    switch ($status) {
        case 'activo':
            echo 'En lista';
            break;
        case 'pausado':
            echo 'Sin listar';
            break;
        default:
            echo 'Sin listar';
            break;
    }
}

function orderStatusTrd($status)
{
    switch ($status) {
        case 'Active':
            echo '<span class="text-info">Activa</span>';
            break;
        case 'Pending':
            echo '<span class="text-warning">Pendiente</span>';
            break;
        case 'Approved':
            echo '<span class="text-success">Aprobada</span>';
            break;
        case 'Cancelled':
            echo '<span class="text-danger">Cancelada</span>';
            break;
        case 'Finished':
            echo '<span class="text-muted">Finalizada</span>';
            break;
        default:
            echo 'Sin Estado';
            break;
    }
}

function messageStatusTrd($status)
{
    switch ($status) {
        case '0':
            echo 'No leído';
            break;
        case '1':
            echo 'Leído';
            break;
        case '2':
            echo 'Pasado';
            break;
        case '3':
            echo 'Respondido';
            break;
        default:
            echo 'Sin estado';
            break;
    }
}

function transDateT($data)
{
    if($data != null){
        $a        = explode(' ', $data);
        $b        = explode('-', $a[0]);
        $date     = $b[2]."/".$b[1]."/".$b[0];
        return $date;
    } else {
        return '';
    }
}

function transDateAndTime($data)
{
    if($data != null){
        $a        = explode(' ', $data);
        $b        = explode('-', $a[0]);
        $pretime  = explode(':', $a[1]);
        $time     = $pretime[0].':'.$pretime[1];
        $date     = $b[2]."/".$b[1]."/".$b[0];
        $datetime = $date.' ('.$time.')';
        return $datetime;
    } else {
        return '';
    }
}

function transDateTO($data)
{
    if($data != null){
        $a        = explode('-', $data);
        $date     = $a[2].'/'.$a[1].'/'.$a[0];
        return $date;
    } else {
        return '';
    }
}

function paymentType($type)
{
    switch ($type) {
        case 'E':
            echo 'Efectivo';
            break;
        case 'B':
            echo 'Banco';
            break;
        case 'C':
            echo 'Cheque';
            break;
        case 'R':
            echo 'Retención';
            break;
        default:
            echo 'Desconocido';
            break;
    }
}

function movementType($type)
{
    switch ($type) {
        case 'E':
            echo 'Efectivo';
            break;
        case 'B':
            echo 'Banco';
            break;
        case 'C':
            echo 'Cheque';
            break;
        case 'R':
            echo 'Retención';
            break;
        case 'F':
            echo 'Factura';
            break;
        case 'ND':
            echo 'Nota de Débito';
            break;
        case 'NC':
            echo 'Nota de Crédito';
            break;
        default:
            echo 'Desconocido';
            break;
    }
}

function compType($type)
{
    switch ($type) {
        case 'F':
            $comprobante = 'Factura';
            break;
        case 'NC':
            $comprobante = 'Nota de Crédito';
            break;
        case 'ND':
            $comprobante = 'Nota de Débito';
            break;
        default:
            $comprobante = 'No definido';
            break;
    }
    return $comprobante;
}

function getMonthName($month)
{
    switch ($month) {
        case '01':
        return 'Enero';
            break;
        case '02':
        return 'Febrero';
            break;
        case '03':
        return 'Marzo';
            break;
        case '04':
        return 'Abril';
            break;
        case '05':
        return 'Mayo';
            break;
        case '06':
        return 'Junio';
            break;
        case '07':
        return 'Julio';
            break;
        case '08':
        return 'Agosto';
            break;
        case '09':
        return 'Septiembre';
            break;
        case '10':
        return 'Octubre';
            break;
        case '11':
        return 'Noviembre';
            break;
        case '12':
        return 'Diciembre';
            break;
        default:
        return 'Sin Mes';
        break;
    }
}



//////////////////////////////////////////////
//             Misc. Functions              //
//////////////////////////////////////////////

function getUrl()
{
    $url = $_SERVER['REQUEST_URI'];
    return $url;
}

// This class is for get View Name
// Ex of use = To show Active Menu Links
class Menu
{
    public static function activeMenu($uri='')
    {
     $active = '';
   
     if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri))
     {
      $active = 'active';
     }
   
     return $active;
    }   
}
