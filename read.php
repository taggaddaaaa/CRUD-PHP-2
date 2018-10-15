<?php
require 'config/database.php';
$id = null;
//On alloue une variable id
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
// Si il n est pas trouve on redirige vers la page d accueil
if ( null==$id ) {
	header("Location: index.php");
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM customers where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class="container">

	<div class="span10 offset1">
		<div class="row">
			<h3>Lire un article</h3>
		</div>

		<div class="form-horizontal" >
			<div class="control-group">
				<label class="control-label">Titre</label>
				<div class="controls">
					<label class="checkbox">
						<?php echo $data['titre_article'];?>
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">text article</label>
				<div class="controls">
					<label class="checkbox">
						<?php echo $data['text_article'];?>
					</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">position article</label>
				<div class="controls">
					<label class="checkbox">
						<?php echo $data['position_article'];?>
					</label>
				</div>
			</div>
			<div class="form-actions">
				<a class="btn" href="index.php">Retour</a>
			</div>


		</div>
	</div>

</div> <!-- /container -->
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
