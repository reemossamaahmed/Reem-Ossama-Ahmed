<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if (isset($_POST['submit'])) 
    {
        if (!empty($_POST['phone'])) 
        {
            $_SESSION['phone'] = $_POST['phone'];
            header('Location: review.php');
            die;
        }
        else
        {
            header('Location: number.php');
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

    <title>Number, page!</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-7 mt-5"><img src="images/undraw_Feedback_re_urmj.png" class=" w-75 mt-5" alt=""></div>
            <div class="col-5 mt-5">
                <h1 class="text-primary fw-bold mt-5 p-2 fw-bolder">Hospital</h1>
                <form method="POST" class="mt-5">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone nimber</label>
                        <input type="text" name="phone" class="form-control w-75" id="phone" value="" placeholder="Phone number">
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>