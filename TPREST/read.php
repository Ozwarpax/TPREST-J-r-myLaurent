<?php

if(isset($_GET["id"])){
    require_once "db_connect.php";
    
    $sql = "SELECT * FROM products WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = $_GET["id"];
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $name = $row["Name"];
                $address = $row["Description"];
                $salary = $row["Category"];
                $name = $row["Price"];

            } else{
                echo "On dirait qu'il n'y a pas de produit avec cet id";
                exit();
            }
            
        } 
            
    }
     
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Un produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Produit <?php echo $_GET["id"] ?></h1>
                    <div class="form-group">
                        <label>Nom</label>
                        <p><b><?php echo $row["Name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $row["Description"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <p><b><?php echo $row["Category"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Prix</label>
                        <p><b><?php echo $row["Price"]; ?></b></p>
                    </div>
                    <p><a href="../listproducts.php" class="btn btn-primary">Retour</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>