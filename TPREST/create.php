<?php
require_once "db_connect.php";
 
$name =  "";
$description = "";
$category = "";
$price = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    
    $description = $_POST["description"];

    $category = $_POST["category"];   

    $price = $_POST["price"];   
           

    $sql = "INSERT INTO products (name, description, category, price) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_description, $param_category, $param_price);

        $param_name = $name;
        $param_description = $description;
        $param_category = $category;
        $param_price = $price;

        if(mysqli_stmt_execute($stmt)){
            echo "Produit enregistré";
            header("location: listproducts.php");
            exit();
        } else{
            echo "On dirait que ça n'a pas marché !";
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
    <title>Ajout de produit</title>
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
                    <h2 class="mt-5">Ajouter un produit</h2>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Categorie</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Envoyer">
                        <a href="listproducts" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>