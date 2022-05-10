<?php

if($_POST)
{
    $num1 = $_POST['num-1'];
    $num2 = $_POST['num-2'];

    if (isset($_POST['add']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 + $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
            die;
        }
    }
    if (isset($_POST['sub']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 - $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
            die;
        }
    }
    if (isset($_POST['mult']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 * $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
            die;
        }
    }
    if (isset($_POST['div']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 / $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
            die;
        }
    }
    if (isset($_POST['mod']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 % $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
            die;
        }
    }
    if (isset($_POST['root']))
    {
        if(is_numeric($num1) && is_numeric($num2))
        {
            $result = $num1 ** $num2;
        }
        else
        {
            echo "<h1> YOU should enter numbers</h1>";
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
        <title>CALC Page</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 border border-warning m-auto mt-5 p-5">
                    <h3 class="text-center text-success">CALC</h3>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="num-1" class="form-label">Number One</label>
                            <input type="number" name="num-1" class="form-control" id="num-1">
                        </div>
                        <div class="mb-3">
                            <label for="num-2" class="form-label">Number Two</label>
                            <input type="number" name="num-2" class="form-control" id="num-2">
                        </div>
                        <div class="text-center">
                        <button type="submit" name="add" class="btn btn-warning">+</button>
                        <button type="submit" name="sub" class="btn btn-warning">-</button>
                        <button type="submit" name="mult" class="btn btn-warning">*</button>
                        <button type="submit" name="div" class="btn btn-warning">/</button>
                        <button type="submit" name="mod" class="btn btn-warning">%</button>
                        <button type="submit" name="root" class="btn btn-warning">**</button>
                        </div>
                    </form>      
                    <div class="alert alert-primary mt-3 col-11 m-auto" role="alert">
                        THE Result Equal: <b> <?php if(isset($result)){ echo $result;}?> </b>  
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    </body>
</html>

