<?php
ini_set('max_execution_time', 500);//segundos de ejecución de código
define('host','localhost');define('user','ilccampu_ricardo');define('pass','APeUo=*@xRX~');define('dbname','ilccampu_usuarios');//Definir const
$conn = new mysqli(host,user,pass,dbname);//definiendo objeto
if ($conn->connect_errno === 0){ //connect_errno retorna 0 si no hay error en la conección
    $strSql = 'SELECT ID FROM Usuarios_Clc';
    $consulta = $conn->query($strSql);
    $nTotal = $consulta->num_rows;
    for($i=1;$i <= ($nTotal + 1);$i++) {
        $strSql = 'UPDATE Usuarios_Clc SET ID = ID - 1 WHERE ID = '.$i;
        $consulta = $conn->query($strSql);
    }
    echo 'Culminada substracción en 1 a cada columna del ID';
} else {
    echo 'El número de error de conección es: '.$conn->connect_errno;
}