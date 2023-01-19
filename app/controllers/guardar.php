<?php
require_once "../models/persona.model.php";
$arrayName = array ('nombre' => $_POST['nombre'] ,
'apellido' => $_POST['apellido'],
'email' => $_POST['email']);
 echo json_encode(usuario::guardarDato($arrayName));
 