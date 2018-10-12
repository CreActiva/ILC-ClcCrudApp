<?php
header("Content-type: application/json; charset=utf-8");
session_start();//session iniciada para saber rol de usuario
define('host','localhost');define('user','ilccampu_ricardo');define('pass','APeUo=*@xRX~');define('dbname','ilccampu_usuarios');//Definir const
$conn = new mysqli(host,user,pass,dbname);//definiendo objeto
if ($conn->connect_errno === 0){ //connect_errno retorna 0 si no hay error en la conección
    $conn->query('SET NAMES "utf8"');//Dar encoding
    $strSql = 'SELECT ID FROM Usuarios_Clc';
    $consulta = $conn->query($strSql);
    $nTotal = $consulta->num_rows;//Propiedad de número total de filas
    echo '{"rol":"'.$_SESSION['rol'].'","total":'.$nTotal.',"data":[';
    for ($i=1;$i <= $nTotal;$i++){
        $strSql = 'SELECT Certificado,Apellido,Nombre, Email, Telefono, Rol, Cohorte FROM Usuarios_Clc WHERE ID ='.$i;
        $consulta = $conn->query($strSql);
        $row = $consulta->fetch_assoc();
        echo json_encode($row, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        echo ($i<$nTotal)? ',' : '';
    }
    echo ']}';
    $consulta->close();
    $conn->close();//Cerrar conección
} else {
    echo 'El número de error de conección es: '.$conn->connect_errno;
}