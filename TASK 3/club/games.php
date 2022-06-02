<?php
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['member_info'] = $_POST;
    header("Location: result.php");
    exit;
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

    <title>Games, Page!</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-9 m-auto">
                <form method="POST">
                    <?php
                    $input = "";
                    for ($i = 1; $i <= $_SESSION['no_of_family']; $i++) {
                        $input .= "<div class='mb-3 col-9 m-auto'>";
                        $input .= "<label class='form-label text-primary fs-5 fw-bolder p-3'>Member {$i}</label>";
                        $input .= "<input type='text' name='member{$i}[name]' class='form-control' placeholder='member name'>";
                        $input .= "</div>";
                        $input .= "<div class='form-check my-3 col-9 m-auto'>";
                        $input .= "<input class='form-check-input' name='member{$i}[games][]' id = 'games-{$i}-1' type='checkbox' value='football'>";
                        $input .= "<label for = 'games-{$i}-1' class='form-check-label'>";
                        $input .= "Football <b>300 LE</b>";
                        $input .= "</label>";
                        $input .= "</div>";
                        $input .= "<div class='form-check my-3 col-9 m-auto'>";
                        $input .= "<input class='form-check-input' name='member{$i}[games][]' type='checkbox' id = 'games-{$i}-2' value='swimming'>";
                        $input .= "<label for = 'games-{$i}-2' class='form-check-label'>";
                        $input .= "Swimming <b>250 LE</b>";
                        $input .= "</label>";
                        $input .= "</div>";
                        $input .= "<div class='form-check my-3 col-9 m-auto'>";
                        $input .= "<input class='form-check-input' name='member{$i}[games][]' type='checkbox' id = 'games-{$i}-3' value='volleyball'>";
                        $input .= "<label for = 'games-{$i}-3' class='form-check-label'>";
                        $input .= "Volleyball <b>150 LE</b>";
                        $input .= "</label>";
                        $input .= "</div>";
                        $input .= "<div class='form-check my-3 col-9 m-auto'>";
                        $input .= " <input class='form-check-input' name='member{$i}[games][]' type='checkbox' id = 'games-{$i}-4' value='others'>";
                        $input .= "<label for = 'games-{$i}-4' class='form-check-label'>";
                        $input .= "Others <b>100 LE</b>";
                        $input .= "</label>";
                        $input .= "</div>";
                    }
                    echo $input;
                    ?>
                    <div class='text-center'>
                        <button type='submit' name='submit' class='btn btn-primary col-8 my-5'>Check price</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>