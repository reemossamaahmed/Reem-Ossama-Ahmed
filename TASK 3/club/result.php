<?php
session_start();
?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Result, Page!</title>
</head>

<body>



    <div class="container mt-5">
        <div class="row">
            <div class="col-9 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Subscriber</th>
                            <th scope="col" colspan="4"><?php echo $_SESSION['name']; ?></th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        for ($j = 1; $j <= $_SESSION['no_of_family']; $j++) {

                            $table_one = "<tr>";
                            
                            $table_one .= "<td>" . $_SESSION['name-sub'] . "</td>";

                            foreach ($_SESSION['games'] as $index) {
                                $table_one .= "<td>{$index}</td>";
                            }

                            $table_one .= "</tr>";

                            echo $table_one;
                        }

                        ?>
                    </tbody>
                </table>
                <h1 class="text-center p-5 fw-bolder text-warning">sports</h1>

                <table class="table bg-success">
                    <tbody>
                        <tr>
                            <th class="p-3">Football Club</th>
                            <td class="p-3">Mark</td>
                        </tr>
                        <tr>
                            <th class="p-3">Swimming Club</th>
                            <td class="p-3">Mark</td>
                        </tr>
                        <tr>
                            <th class="p-3">Volley Club</th>
                            <td class="p-3">Jacob</td>
                        </tr>
                        <tr>
                            <th class="p-3">Others Club</th>
                            <td class="p-3">Larry the Bird</td>
                        </tr>
                        <tr>
                            <th class="p-3">Club Supsciption</th>
                            <td class="p-3"><?php echo $_SESSION['club_supscription'];?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Total Price</th>
                            <td class="p-3">Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>