<?php
require_once "../models/persona.model.php";
$arrayName = array ('nombre' => $_POST['nombre'] ,
'apellido' => $_POST['apellido'],
'email' => $_POST['email'],
'id' => $_POST['id']);
 echo json_encode(usuario::actualizarDato($arrayName));
 