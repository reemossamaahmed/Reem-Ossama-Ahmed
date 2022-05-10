<?php
if (isset($_POST['submit'])) 
{
    if ($_POST) 
    {
        define('additional_surcharge', 0.2);
        $unit = $_POST['num'];

        if(is_numeric($unit))
        {
            if($unit >= 0 && $unit <= 50)
            {
                $bill = $unit * (50/100);
            }
            elseif($unit > 50 && $unit <= 150)
            {
                $bill = $unit * (75/100);
            }
            elseif($unit > 150 && $unit <= 250)
            {
                $bill = $unit * (120/100);
            }
            elseif($unit > 250)
            {
                $bill = $unit * (150/100);
            }
            $total_bill = $bill + ($bill * additional_surcharge); 
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";//class='alert alert-warning' role='alert'
            die;
        }

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
        <title>ELECTRICITY Page</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 border border-warning m-auto mt-5 p-5">
                    <h3 class="text-center text-success">Calculate total Electricity Bill</h3>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="num" class="form-label">Electricity Unit Charges</label>
                            <input type="number" name="num" class="form-control" id="num">
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning">CALC!</button>
                    </form>      
                    <div class="alert alert-success mt-3 col-11 m-auto" role="alert">
                    Total Electricity Bill Equal <b> <?php if(isset($total_bill)){echo $total_bill . " LE";} ?> </b>  
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    </body>
</html>

