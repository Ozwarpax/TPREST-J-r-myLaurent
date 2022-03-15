<?php

if(isset($_POST["id"])){
    require_once "db_connect.php";
    
    $sql = "DELETE FROM products WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        $param_id = $_POST["id"];
        

        if(mysqli_stmt_execute($stmt)){

            header("location: listProducts.php");
            exit();
        } else{
            echo "Un erreur est survenue";
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
    <title>Supression de produit</title>
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
                    <h2 class="mt-5 mb-3">Supprimer un produit</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Voulez vous vraiment supprimer ce produit ?</p>
                            <p>
                                <input type="submit" value="Oui" class="btn btn-danger">
                                <a href="../listProducts" class="btn btn-secondary">Non</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>