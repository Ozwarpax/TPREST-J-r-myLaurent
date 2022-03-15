<!DOCTYPE html>
<html>
    <head>

    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div>
            <table class="table table-striped table-dark">
            <tbody>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                <td>Lien pour les produits</td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/listProducts</td>
                <td>RewriteRule ^listProducts$ listProducts</td>
                </tr>
                <tr>
                <td>lien pour créer un produits</td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/createProduct</td>
                <td>RewriteRule ^createProduct$ create [L]</td>
                <td></td>
                </tr>
                <tr>
                <td>lien pour voir un produits ( produit 2)</td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/viewProducts/2</td>
                <td>RewriteRule ^viewProducts/(\d+)$ read?id=$1</td>
                <td></td>
                </tr>
                <tr>
                <td>Update un produits ( produit 2 ) </td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/updateProduct/2</td>
                <td>RewriteRule ^updateProduct/(\d+)$ update?id=$1</td>
                </tr>
                <tr>
                <td>Update un produits ( produit 2 ) </td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/deleteProduct/2</td>
                <td>RewriteRule ^deleteProduct/(\d+)$ delete?id=$1</td>
                </tr>
                <tr>
                <td>voir un commentaire</td>
                <td>http://localhost/TPREST%20J%C3%A9r%C3%A9myLaurent/TPREST/viewremarks/2</td>
                <td>RewriteRule ^viewremarks/(\d+)$ remarks?id=$1</td>
                </tr>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
            </table>
        </div>
    </body>
</html>