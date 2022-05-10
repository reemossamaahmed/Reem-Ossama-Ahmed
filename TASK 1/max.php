<?php

    if(isset($_POST['submit']))
    {
        if($_POST)
        {
            $number1 = $_POST['num-1'];
            $number2 = $_POST['num-2'];
            $number3 = $_POST['num-3'];

            // equality
            if($number1 == $number2 && $number1 == $number3)
            {
                $max = $min = $number1;
            }

            // calculate the max
            if($number1 > $number2 )
            {
                if($number1 > $number3)
                {
                    $max = $number1;
                }
                else{
                    $max = $number3;
                }
            }
            elseif($number2 > $number1)
            {
                if($number2 > $number3)
                {
                    $max = $number2;
                }
                else
                {
                    $max = $number3;
                }
            }
            elseif($number3 > $number1)
            {
                if($number3 > $number2)
                {
                    $max = $number3;
                }
                else
                {
                    $max = $number2;
                }
                
            }

            // calculate the min
            if($number1 < $number2 )
            {
                if($number1 < $number3)
                {
                    $min = $number1;
                }
                else{
                    $min = $number3;
                }

            }
            elseif($number2 < $number1)
            {
                if($number2 < $number3)
                {
                    $min = $number2;
                }
                else
                {
                    $min = $number3;
                }
            }
            elseif($number3 < $number1)
            {
                if($number3 < $number2)
                {
                    $min = $number3;
                }
                else
                {
                    $min = $number2;
                }

            }
            // special case
            if($number1 == $number2)
            {
                if($number3 > $number1)
                {
                    $max = $number3;
                }
                else
                {
                    $max = $number1 = $number2;
                }
            }

            if($number1 == $number2)
            {
                if($number3 < $number1)
                {
                    $min = $number3;
                }
                else
                {
                    $min = $number1 = $number2;
                }
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
        <title>Max Page</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 border border-warning m-auto mt-5 p-5">
                    <h3 class="text-center text-success">GIT MAX & MIN</h3>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="num-1" class="form-label">Number One</label>
                            <input type="number" name="num-1" class="form-control" id="num-1">
                        </div>
                        <div class="mb-3">
                            <label for="num-2" class="form-label">Number Two</label>
                            <input type="number" name="num-2" class="form-control" id="num-2">
                        </div>
                        <div class="mb-3">
                            <label for="num-3" class="form-label">Number Three</label>
                            <input type="number" name="num-3" class="form-control" id="num-3">
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning">CHECK!</button>
                    </form>      
                    <div class="alert alert-success mt-3 col-11 m-auto" role="alert">
                        THE MAX NUMBER IS <b> <?php if(isset($max)){echo $max;}  ?></b> 
                        <br>
                        <b>,</b>
                        <br>
                        THE MIN NUMBER IS <b><?php if(isset($min)){echo $min;}  ?></b>
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    </body>
</html>
