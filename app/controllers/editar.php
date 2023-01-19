<?php
require_once "../models/persona.model.php";
echo json_encode(usuario::obtenerDatos($_POST['id']));