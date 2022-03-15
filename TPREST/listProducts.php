<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Liste des produits</h2>
                        <a href="create" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Ajouter un produit</a>
                    </div>
                    <?php
                    require_once "db_connect.php";

                    $sql = "SELECT * FROM products";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered ">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th></th>";
                                        echo "<th>Nom</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Categorie</th>";
                                        echo "<th>Prix</th>";
                                        echo "<th>voire</th>";
                                        echo "<th>Modifier</th>";
                                        echo "<th>supprimer</th>";
                               
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Id'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Description'] . "</td>";
                                        echo "<td>" . $row['Category'] . "</td>";
                                        echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>"; 
                                            echo '<a href="viewProducts/'. $row['Id'] .'" class="mr-3" title="Voir le produit" data-toggle="tooltip">X</a>';
                                        echo "</td>";
                                        echo "<td>"; 
                                            echo '<a href="updateProduct/'. $row['Id'] .'" class="mr-3" title="Modifier le produit" data-toggle="tooltip">X</a>';
                                        echo "</td>";
                                        echo "<td>";
                                            echo '<a href="deleteProduct/'. $row['Id'] .'" title="Supprimer le produit" data-toggle="tooltip">X</a>';
                                        echo "</td>";
                                      
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        }
                    }
 
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>