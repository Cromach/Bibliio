<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

if ($msg = valider("msg")){
	$msg = "<div style=\"color:red;\">$msg</div>";
}
?>

<div id="corps">

<h1>Connexion</h1>

<?php echo $msg; ?>


<div class="menu">
<form action="controleur.php" method="POST" class="p-4">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="login" class="form-control" id="login" name="login" placeholder="Login">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="passe" placeholder="Mot de passe">
  </div>
  <input type="submit" class="btn btn-primary" name="action" value="Connexion" />
</form>
</div>


</div>
