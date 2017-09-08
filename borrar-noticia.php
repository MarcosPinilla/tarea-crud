<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
  header('Location: ./');
  die;
}

$error = '';
if(isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}

$usuario = $_SESSION['usuario'];

if(isset($_GET["id"])){
  if($usuario["rol"] != 1) {
    header('Location: welcome.php');
    die;
  }

  
  $id = $db->escape_string($_GET['id']);
  $result = $db->query("DELETE * FROM noticias WHERE id_noticia = '$id'");

  if(!$result) {
    $_SESSION['error'] = $db->error;
    header('Location: crear-noticia.php');
  } else {
    header('Location: welcome.php');
  }

  die;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php if($error) { ?>
        <div class="alert alert-danger mt-3" role="alert">
          <b>Error</b>: <?php echo $error; ?>
        </div>
        <?php } ?>
</body>
</html>