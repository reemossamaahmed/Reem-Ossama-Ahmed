<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['subscribe'])) {
        if (!empty($_POST['name']) && !empty($_POST['no-of-family'])) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['no_of_family'] = $_POST['no-of-family'];
            $_SESSION['club_supscription'] = 10000 + (2500 * $_SESSION['no_of_family']);
            header("Location: games.php");
            exit;
        } else {
            $messege = "<div class='alert alert-danger mt-3'>Two fields is required</div>";
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

    <title>Subscribe, Page!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mt-5">
                <img src="images/undraw_goal_0v5v.png" class="h-25" alt="">
            </div>

            <div class="col-6 mt-5">
                <form method="POST" class="mt-5">
                    <div class="mb-3">
                        <label for="name" class="form-label text-primary">Member Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <div class="form-text">Club subscription starts with <b>10.000 LE</b>.</div>
                    </div>
                    <div class="mb-3">
                        <label for="no-of-family" class="form-label text-primary">Count of family members</label>
                        <input type="text" name="no-of-family" class="form-control" id="no-of-family">
                        <div class="form-text">Cost of each member is <b>2.500 LE</b>.</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="subscribe" class="btn btn-primary">Subscribe</button>
                    </div>
                    <?php echo $messege??'';?>
                </form>
            </div>
        </div>



        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>