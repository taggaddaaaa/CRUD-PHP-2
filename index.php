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
<div class="row">
<h3>Ma grille CRUD en PHP </h3>
</div>
<div class="row">
    <p>
        <a href="create.php" class="btn btn-success">Creer un article</a>
    </p>
<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>titre</th>
    <th>texte</th>
    <th>Position</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
include 'config/database.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM articles ORDER BY num_article DESC';

$sql2 = "SELECT titre_article, text_article, position_article FROM articles ORDER BY id DESC";
$stmt = $con->prepare($sql2);
$stmt->execute();

$num = $stmt->rowCount();

////check if more than 0 record found
//if($num>0){
//
//	// data from database will be here
//	foreach ($pdo->query($sql) as $row) {
//		echo '<tr>';
//		echo '<td>' . $row['titre_article'] . '</td>';
//		echo '<td>' . $row['text_article'] . '</td>';
//		echo '<td>' . $row['position_article'] . '</td>';
//		echo '<td><a class="btn" href="read.php?id='.$row['id'].'">READ</a></td>';
//		echo '</tr>';
//	}
//	// if no records found:
//} else {
//
//	echo "<div class='alert alert-danger'>No records found.</div>";
//}

// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);

    // creating new table row per record
    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$titre_article}</td>";
        echo "<td>{$text_article}</td>";
        echo "<td>&#36;{$position_article}</td>";
        echo "<td>";
            // read one record
            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

            // we will use this links on next part of this post
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_article({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}


//
//if (is_array($sql)) {
//    foreach ($pdo->query($sql) as $row) {
//        echo '<tr>';
//        echo '<td>' . $row['titre_article'] . '</td>';
//        echo '<td>' . $row['text_article'] . '</td>';
//        echo '<td>' . $row['position_article'] . '</td>';
//	    echo '<td><a class="btn" href="read.php?id='.$row['id'].'">READ</a></td>';
//        echo '</tr>';
//    }
//}
Database::disconnect();
?>
</tbody>
</table>
</div>
</div> <!-- /container -->

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
