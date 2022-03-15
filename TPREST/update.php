<?php
require_once "db_connect.php";
 
$name = ""; 
$description = ""; 
$category = "";
$price = "";
 
if(isset($_POST["id"])){

    $id = $_POST["id"];
    
    $name = $_POST["name"];
    
    $description = $_POST["description"];

    $category = $_POST["category"];   

    $price = $_POST["price"];   
    

    $sql = "UPDATE products SET name=?, description=?, category=?, price=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_description, $param_category, $param_price, $param_id);
            
            $param_name = $name;
            $param_description = $description;
            $param_category = $category;
            $param_price = $price;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: ../listproducts");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    
    mysqli_close($conn);

} else{

    if(isset($_GET["id"])){

        $id =  $_GET["id"];
        
        $sql = "SELECT * FROM products WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["Name"];
                    $description = $row["Description"];
                    $category = $row["Category"];
                    $price = $row["Price"];
                }
            } 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de produit</title>
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
                    <h2 class="mt-5">Modifier un produit</h2>
                    <br>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Envoyer">
                        <a href="../listProducts" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>