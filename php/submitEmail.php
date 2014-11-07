<?php
include 'SessionLogin.php';
$to = 'dfa24@nau.edu';
mail($to, "Bug Report", $_POST['message']);