<?php

require 'config/database.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
	$nameError = null;
	$textError = null;
	$positionError = null;

// Saisie des valeurs d‘entrée
	$name = $_POST['name'];
	$text = $_POST['text'];
	$position = $_POST['position'];

// Valider Engages
	$valid = true;
	if (empty($name)) {
		$nameError = 'Veuillez entrer un nom';
		$valid = incorrect;
	}

	if (empty($text)) {
		$textError = 'Veuillez entrer un texte dans l\'article';
		$valid = incorrect;
	}

	if (empty($position)) {
		$positionError = 'Veuillez entrer une position pour l\'article';
		$valid = incorrect;
	}

// Entrer des données
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO articles (titre_article,texte_article,position_article) values(?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$text,$position));
		Database::disconnect();
		header("Location: index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
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
			<h3>Creation d un article</h3>
		</div>

		<form class="form-horizontal" action="create.php" method="post">
			<div class="form-group <?php echo !empty($nameError)?'has-error':'';?>">
				<label class="control-label">Nom de l'article</label>
				<div class="controls">
					<input name="name" type="text" placeholder="Nom de l article" value="<?php echo !empty($name)?$name:'';?>">
					<?php if (!empty($nameError)): ?>
						<span class="help-inline"><?php echo   $nameError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-group <?php echo !empty($textError)?'has-error':'';?>">
				<label class="control-label">Texte de l'article</label>
				<div class="controls">
					<input name="text" type="text" placeholder="texte de l article" value="<?php echo !empty($text)?$text:'';?>">
					<?php if (!empty($textError)): ?>
						<span class="help-inline"><?php echo   $textError;?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="form-group <?php echo !empty($positionError)?'has-error':'';?>">
				<label class="control-label">Position de l'article</label>
				<div class="controls">
					<input name="position" type="text" placeholder="position" value="<?php echo !empty($position)?$position:'';?>">
					<?php if (!empty($positionError)): ?>
						<span class="help-inline"><?php echo $positionError;?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Creer un article</button>
				<a class="btn" href="index.php">Retour</a>
			</div>
		</form>
	</div>

</div> <!-- /container -->
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
