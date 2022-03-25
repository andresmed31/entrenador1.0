<?php

if(isset($_POST['digitos'])){
    switch ($_POST['digitos']){
        case 2:
            $rand1=rand(10,99);
            $rand2=rand(10,99);
            break;
        case 3:
            $rand1=rand(100,999);
            $rand2=rand(100,999);
            break;
        case 4:
            $rand1=rand(1000,9999);
            $rand2=rand(1000,9999);
            break;
    }
    $_SESSION['numa']=$rand1;
    $_SESSION['numb']=$rand2;
    echo $rand1." + ".$rand2;
    $_SESSION['tiempoInicial']= microtime($get_as_float = true);
}
if(isset($_SESSION['mensaje'])){
    echo $_SESSION['mensaje'];
    $_SESSION['numa']=null;
    $_SESSION['numb']=null;
    $_SESSION['mensaje']=null;

}
?>




