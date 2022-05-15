<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'] ?? '';
    $city = $_POST['city'];
    $number_of_varieties = $_POST['number-of-varieties'];
    if (isset($_POST['submit-info-user'])) {
        if (!empty($name) && $number_of_varieties > 0) {
            $table  = "<table>";
            $table .= "<thead>";
            $table .= "<tr class='text-primary text-center'>";
            $table .= "<th scope='col'>Producr name</th>";
            $table .= "<th scope='col'>Price</th>";
            $table .= "<th scope='col'>Quantities</th>";
            $table .= "</tr>";
            $table .= "</thead>";
            $table .= "<tbody>";
            for ($i = 1; $i <= $number_of_varieties; $i++) {
                $table  .= "<tr>";
                $table .= '<td><input type="text" name="product-name-{$i}" class="form-control"></td>';
                
                $table .= "<td><input type='text' name='price' class='form-control'></td>";
                $table .= "<td><input type='text' name='quantities' class='form-control'></td>";
                $table .= "</tr>";          
                $product_name = $_POST["product-name-{$i}"]??'test';
                echo $product_name;
            }
            $table .= "</tbody>";
            $table .= "</table>";
            $table .= "<button type='submit' name='submit-products' class='btn btn-primary mt-2 col-12'>Receipt</button>";
            
        }
        
    }

    //////////////////////////////////////

    if (isset($_POST['submit-products'])) {



echo " done";
echo $product_name;



        // $product_name = $_POST['product-name'];
        // $price = $_POST['price'];
        // $quantities = $_POST['quantities'];
// 
        // if (!empty($price) && !empty($quantities)) {
            // $sub_total = $price * $quantities;
// 
            // $table_products  = "<table class='table'>";
            // $table_products .= "<thead>";
            // $table_products .= "<tr class='text-primary'>";
            // $table_products .= "<th scope='col'>Product name</th>";
            // $table_products .= "<th scope='col'>Price</th>";
            // $table_products .= "<th scope='col'>Quantities</th>";
            // $table_products .= "<th scope='col'>Sub Total</th>";
            // $table_products .= "</tr>";
            // $table_products .= "</thead>";
            // $table_products .= "<tbody>";
// 
            // for ($j = 1; $j <= $number_of_varieties; $j++) {
                // $table_products .= "<tr>";
                // $table_products .= "<td>" . $product_name .  "</td>";
                // $table_products .= "<td>" . $price . "</td>";
                // $table_products .= "<td>" . $quantities . "</td>";
                // $table_products .= "<td>" . $sub_total . "</td>";
                // $table_products .= "</tr>";
            // }
            // $table_products .= "</tbody>";
            // $table_products .= "</table>";
        // }
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Supermarket, page!</title>
</head>

<body>
    <h1 class="text-primary text-center p-3">SUPERMARKET</h1>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img src="images/undraw_Gone_shopping_re_2lau.png" class="col-12" alt="">
            </div>
            <div class="col-5 offset-2">
                <form action="#" method="POST" class="mt-5">
                    <div class="mb-3">
                        <label for="name" class="form-label text-primary">User name</label>
                        <input type="text" name="name" value="<?php echo $name ?? ''; ?>" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary">City</label>
                        <select class="form-select" name="city">
                            <option value="cairo">Cairo</option>
                            <option value="giza">GiZa</option>
                            <option value="alex">Alex</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number-of-varieties" class="form-label text-primary">Number of varieties</label>
                        <input type="number" name="number-of-varieties" value="<?php echo $number_of_varieties; ?>" class="form-control" id="number-of-varieties">
                    </div>
                    <button type="submit" name="submit-info-user" class="btn btn-primary col-12">Enter products</button>
                    <hr>
                    <?php echo $table ?? ''; ?>
                    <hr>
                    <?php echo $table_products ?? ''; ?>
                </form>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>

</html>