<?php

    if(isset($_POST['submit']))
    {
        if($_POST)
        {
            define('max_grade', 100);
            $number1 = $_POST['num-1'];
            $number2 = $_POST['num-2'];
            $number3 = $_POST['num-3'];
            $number4 = $_POST['num-4'];
            $number5 = $_POST['num-5'];

            if(is_numeric($number1) && is_numeric($number2) && is_numeric($number3) && is_numeric($number4) && is_numeric($number5))
            {
                $sum = $number1 + $number2 + $number3 + $number4 + $number5;
                $percentage = ($sum / (max_grade * 5)) * 100;
            }
            else
            {
                echo "<h1> YOU should enter numbers</h1>";//class='alert alert-warning' role='alert'
                die;
            }
            
            
            
                if($percentage >= 90 && $percentage <=100 )
                {
                    $grade = "A";
                }
                elseif($percentage >= 80 && $percentage < 90){
                    $grade = "B";
                }
                elseif($percentage >= 70 && $percentage < 80)
                {
                    $grade = "C";
                }
                elseif($percentage >= 60 && $percentage < 70)
                {
                    $grade = "D";
                }
                elseif($percentage >= 40 && $percentage < 60)
                {
                    $grade = "E";
                }
                elseif($percentage < 40 && $percentage >= 0)
                {
                    $grade = "f";
                }
                else
                {
                    $grade = "UNDIFIEND VALUE";
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
        <title>Grade Page</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 border border-warning m-auto mt-5 p-5">
                    <h3 class="text-center text-success">GIT GRADE</h3>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="num-1" class="form-label">PHYSICS</label>
                            <input type="number" name="num-1" class="form-control" id="num-1">
                        </div>
                        <div class="mb-3">
                            <label for="num-2" class="form-label">CHEMISTRY</label>
                            <input type="number" name="num-2" class="form-control" id="num-2">
                        </div>
                        <div class="mb-3">
                            <label for="num-3" class="form-label">BIOLOGY</label>
                            <input type="number" name="num-3" class="form-control" id="num-3">
                        </div>
                        <div class="mb-3">
                            <label for="num-4" class="form-label">MATHEMATICS</label>
                            <input type="number" name="num-4" class="form-control" id="num-4">
                        </div>
                        <div class="mb-3">
                            <label for="num-5" class="form-label">COMPUTER</label>
                            <input type="number" name="num-5" class="form-control" id="num-5">
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning">CHECK!</button>
                    </form>      
                    <div class="alert alert-success mt-3 col-11 m-auto" role="alert">
                        THE PERCENTAGE IS <b> <?php if(isset($percentage)){echo $percentage . " %";}  ?></b> 
                        <br>
                        <b>,</b>
                        <br>
                        THE GRADE IS <b><?php if(isset($grade)){echo $grade;}  ?></b>
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
    </body>
</html>
