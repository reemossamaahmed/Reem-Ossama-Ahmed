<?php
session_start();

$result = $_SESSION['first_q'] + $_SESSION['second_q'] + $_SESSION['third_q'] + $_SESSION['four_q'] + $_SESSION['five_q'];

if($result >= 25)
{
    $messege = "<div class='text-center alert alert-success'> Thank you</div>";
    $grade = "Good";
}
else
{
    $messege = "<div class='text-center alert alert-danger'>Please contact the patient to find out the reason for the bad evaluation {$_SESSION['phone']}</div>";
    $grade = "Bad";
}

if($_SESSION['first_q'] == 0)
{
    $first_q_r = 'Bad';
}
elseif($_SESSION['first_q'] == 3)
{
    $first_q_r = 'Good';
}
elseif($_SESSION['first_q'] == 5)
{
    $first_q_r = 'Very Good';
}
elseif($_SESSION['first_q'] == 10)
{
    $first_q_r = 'Excellent';
}

if($_SESSION['second_q'] == 0 )
{
    $second_q_r = 'Bad';
}
elseif($_SESSION['second_q'] == 3)
{
    $second_q_r = 'Good';
}
elseif($_SESSION['second_q'] == 5)
{
    $second_q_r = 'Very Good';
}
elseif($_SESSION['second_q'] == 10)
{
    $second_q_r = 'Excellent';
}

if($_SESSION['third_q'] == 0 )
{
    $third_q_r = 'Bad';
}
elseif($_SESSION['third_q'] == 3)
{
    $third_q_r = 'Good';
}
elseif($_SESSION['third_q'] == 5)
{
    $third_q_r = 'Very Good';
}
elseif($_SESSION['third_q'] == 10)
{
    $third_q_r = 'Excellent';
}

if($_SESSION['four_q'] == 0 )
{
    $four_q_r = 'Bad';
}
elseif($_SESSION['four_q'] == 3)
{
    $four_q_r = 'Good';
}
elseif($_SESSION['four_q'] == 5)
{
    $four_q_r = 'Very Good';
}
elseif($_SESSION['four_q'] == 10)
{
    $four_q_r = 'Excellent';
}

if($_SESSION['five_q'] == 0 )
{
    $five_q_r = 'Bad';
}
elseif($_SESSION['five_q'] == 3)
{
    $five_q_r = 'Good';
}
elseif($_SESSION['five_q'] == 5)
{
    $five_q_r = 'Very Good';
}
elseif($_SESSION['five_q'] == 10)
{
    $five_q_r = 'Excellent';
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

    <title>Review, page!</title>
</head>

<body>




    <div class="contaainer mt-5">
        <div class="row">
            <h1 class="text-primary text-center fw-bold my-5 p-1 fw-bolder">Result</h1>
            <div class="col-9 m-auto">
                <form method="POST">


                    <table class="table">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col">QUESTION</th>
                                <th scope="col">REVIEWS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Are you satisfied with the level of cleanliness ?</td>
                                <td><?php echo $first_q_r; ?></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the service prices ?</td>
                                <td><?php echo $second_q_r; ?></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the nursing service ?</td>
                                <td><?php echo $third_q_r; ?></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the level of the doctor ?</td>
                                <td><?php echo $four_q_r; ?></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the calmness in the hospital ?</td>
                                <td><?php echo $five_q_r; ?></td>
                            </tr>
                        </tbody>
                        <tbody class="bg-dark text-light">
                            <tr>
                                <th scope="col">TOTAL REVIEW</th>
                                <th scope="col"><?php echo $grade; ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <?php echo $messege;?>                    
                </form>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>