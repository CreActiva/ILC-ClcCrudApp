<?php	
ini_set('max_execution_time', 500);//segundos de ejecución de código
include 'simplexlsx/simplexlsx.class.php';
$xlsx = new SimpleXLSX('Usuarios_CLC.xlsx');
$conn = new PDO("mysql:host=localhost;dbname=ilccampu_usuarios", "ilccampu_ricardo", "APeUo=*@xRX~");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare('INSERT INTO Usuarios_Clc (Certificado, Apellido, Nombre, Email,Telefono,Rol,Cohorte) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->bindParam( 1, $Certificado);
$stmt->bindParam( 3, $Nombre);
$stmt->bindParam( 2, $Apellido);
$stmt->bindParam( 4, $Email);
$stmt->bindParam( 5, $Telefono);
$stmt->bindParam( 6, $Rol);
$stmt->bindParam( 7, $Cohorte);
$i=1;
foreach ($xlsx->rows() as $fields) {
    if($i++ < 1695){
        $conn->exec("set names utf8");
        $Certificado = $fields[0];
        $Nombre = $fields[1];
        $Apellido = $fields[2];
        $Email = $fields[3];
        $Telefono = $fields[4];
        $Rol = $fields[5];
        $Cohorte = $fields[6];
        $stmt->execute();
    } else {
        echo 'IMPORTACIÓN DE EXCEL A DB CULMINADA.';
        break;
    }
}