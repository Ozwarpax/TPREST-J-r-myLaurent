<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les commentaires</title>
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
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Commentaires</h2>
                    </div>
                    <?php
                    require_once "db_connect.php";

                    $sql = "SELECT * FROM comments WHERE IdProduct = ?";

                    if($stmt = mysqli_prepare($conn, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $param_id);

                        $param_id = $_GET["id"];

                        if(mysqli_stmt_execute($stmt)){
                            $result = mysqli_stmt_get_result($stmt);

                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<tbody>";

                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['Text'] . "</td>";
                                        echo "</tr>";
                                    }

                                    echo "</tbody>";                            
                                echo "</table>";
                                mysqli_free_result($result);
                            }
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


