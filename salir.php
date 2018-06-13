<?PHP
session_start();
unset($_session['usuario']);
session_destroy();
header('location: Login.php');
exit();
?>





