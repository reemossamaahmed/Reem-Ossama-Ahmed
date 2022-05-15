<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $_SESSION['first_q'] = $_POST['first-q']??0;
    $_SESSION['second_q'] = $_POST['second-q']??0;
    $_SESSION['third_q'] = $_POST['third-q']??0;
    $_SESSION['four_q'] = $_POST['four-q']??0;
    $_SESSION['five_q'] = $_POST['five-q']??0;

    if(isset($_POST['submit']))
    {
        header('Location: result.php');
        die;
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

    <title>Review, page!</title>
</head>

<body>




    <div class="contaainer mt-5">
        <div class="row">
            <h1 class="text-primary text-center fw-bold my-5 p-1 fw-bolder">REVIEW</h1>
            <div class="col-9 m-auto">
                <form method="POST">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Questions?</th>
                                <th scope="col">Bad</th>
                                <th scope="col">Good</th>
                                <th scope="col">Very good</th>
                                <th scope="col">Excellent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Are you satisfied with the level of cleanliness ?</td>
                                <td><input type="radio" name="first-q" value="0" class="ms-2"></td>
                                <td><input type="radio" name="first-q" value="3" class="ms-2"></td>
                                <td><input type="radio" name="first-q" value="5" class="ms-2"></td>
                                <td><input type="radio" name="first-q" value="10" class="ms-2"></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the service prices ?</td>
                                <td><input type="radio" name="second-q" value="0" class="ms-2"></td>
                                <td><input type="radio" name="second-q" value="3" class="ms-2"></td>
                                <td><input type="radio" name="second-q" value="5" class="ms-2"></td>
                                <td><input type="radio" name="second-q" value="10" class="ms-2"></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the nursing service ?</td>
                                <td><input type="radio" name="third-q" value="0" class="ms-2"></td>
                                <td><input type="radio" name="third-q" value="3" class="ms-2"></td>
                                <td><input type="radio" name="third-q" value="5" class="ms-2"></td>
                                <td><input type="radio" name="third-q" value="10" class="ms-2"></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the level of the doctor ?</td>
                                <td><input type="radio" name="four-q" value="0" class="ms-2"></td>
                                <td><input type="radio" name="four-q" value="3" class="ms-2"></td>
                                <td><input type="radio" name="four-q" value="5" class="ms-2"></td>
                                <td><input type="radio" name="four-q" value="10" class="ms-2"></td>
                            </tr>
                            <tr>
                                <td scope="row">Are you satisfied with the calmness in the hospital ?</td>
                                <td><input type="radio" name="five-q" value="0" class="ms-2"></td>
                                <td><input type="radio" name="five-q" value="3" class="ms-2"></td>
                                <td><input type="radio" name="five-q" value="5" class="ms-2"></td>
                                <td><input type="radio" name="five-q" value="10" class="ms-2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary col-12">Result</button>
                    </div>
                </form>
            </div>

            <div class="text-center"><img src="images/undraw_Like_dislike_re_dwcj.png" class="w-25" alt=""></div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>