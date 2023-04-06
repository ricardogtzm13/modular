<?php
require_once('../.includes/db_conn.inc.php');
require_once('../.includes/session.inc.php');
sesion_existe();
header('Content-Type: application/json');
$idUsuario = $_SESSION['id'];
$stmt = $conn->prepare('INSERT INTO plataformasUsuario(idUsuario, idPlataforma) VALUES(?,?)');
$stmt->bind_param('ii', $_POST['idUsuario'], $_POST['idPlataforma']);
$stmt->execute();
echo json_encode(array('exito' => $stmt->affected_rows == 1));