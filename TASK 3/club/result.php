<?php
session_start();
// print_r($_SESSION);die;
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
                            <th>Subscriber</th>
                            <th colspan="5"><?php echo $_SESSION['name']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $game_price = 0;
                        $total_game_price = 0;
                        $fcounter = 0;
                        $scounter = 0;
                        $vcounter = 0;
                        $ocounter = 0;
                        for ($j = 1; $j <= $_SESSION['no_of_family']; $j++) {

                            $table_one = "<tr>";

                            $table_one .= "<td>" . $_SESSION['member_info']['member' . $j]['name'] . "</td>";
                            $game_price = 0;
                            if(isset($_SESSION['member_info']['member' . $j]['games'])){
                                foreach ($_SESSION['member_info']['member' . $j]['games'] as $index) {

                                    if ($index == "football") {
                                        $game_price += 300;
                                        $total_game_price += 300;
                                        $fcounter++;
                                    }
                                    if ($index == "swimming") {
                                        $game_price += 250;
                                        $total_game_price += 250;
                                        $scounter++;
                                    }
                                    if ($index == "volleyball") {
                                        $game_price += 150;
                                        $total_game_price += 150;
                                        $vcounter++;
                                    }
                                    if ($index == "others") {
                                        $game_price += 100;
                                        $total_game_price += 100;
                                        $ocounter++;
                                    }
                                    $table_one .= "<td>{$index}</td>";
    
                                }
                                for ($i=1; $i <= 4-count($_SESSION['member_info']['member' . $j]['games']); $i++) { 
                                    $table_one .= "<td></td>";
                                }
                            }else{
                                for ($i=1; $i <= 4; $i++) { 
                                    $table_one .= "<td></td>";
                                }
                            }
                            $table_one .= "<td>{$game_price}</td>";
                            $table_one .= "</tr>";

                            echo $table_one;
                        }
                        ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <th colspan="5">Total Price</th>
                            <th><?php echo $total_game_price; ?></th>
                        </tr>
                    </tfooter>
                </table>
                <h1 class="text-center p-5 fw-bolder text-warning">sports</h1>

                <table class="table bg-success">
                    <tbody>
                        <tr>
                            <th class="p-3">Football Club</th>
                            <td class="p-3"><?php echo $fcounter * 300;?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Swimming Club</th>
                            <td class="p-3"><?php echo $scounter * 250;?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Volley Club</th>
                            <td class="p-3"><?php echo $vcounter * 150;?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Others Club</th>
                            <td class="p-3"><?php echo $ocounter * 100;?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Club Supsciption</th>
                            <td class="p-3"><?php echo $_SESSION['club_supscription']; ?></td>
                        </tr>
                        <tr>
                            <th class="p-3">Total Price</th>
                            <td class="p-3"><?php echo $_SESSION['club_supscription'] + $fcounter * 300 + $scounter * 250 + $vcounter * 150 + $ocounter * 100;?></td>
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