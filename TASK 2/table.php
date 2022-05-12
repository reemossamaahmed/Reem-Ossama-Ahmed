<?php
// dynamic table -> done
// dynamic rows -> done
// dynamic columns
// check if gender of user == m ==> male -> done
// check if gender of user == f ==> female -> done

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football, ', 'swimming, ', 'running'
        ],
        'activities' => [
            "school" => 'drawing, ',
            'home' => 'painting'
        ],
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming, ', 'running',
        ],
        'activities' => [
            "school" => 'painting, ',
            'home' => 'drawing'
        ],
    ],
    (object)[
        'id' => null,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting, ',
            'home' => 'drawing'
        ],
    ],
    (object)[
        'id' => 0,
        'name' => 'reem',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running,',
            'football'
        ],
        'activities' => [
            "school" => 'painting, ',
            'home' => 'drawing'
        ],
        
    ],
    (object)[
        'id' => 5,
        'name' => 'karim',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'running, ',
            'football, ',
            'swimming'
        ],
        'activities' => [
            "school" => 'painting, ',
            'home' => 'drawing'
        ],
        
    ],
];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>INFO, TABLE!</title>
    <style>
        table thead tr th {
            text-transform: capitalize;
        }
    </style>
</head>

<body class="bg-warning">

    <div class="container">
    <h1 class="text-success text-center mt-5">Table of Information</h1>
        <table class="table table-dark table-striped mt-5">
            <thead>
                <tr>
                    <?php
                    foreach ($users[0] as $property => $value) {
                        echo "<th scope='col'>{$property}</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $index => $user) {
                    echo "<tr>";
                    foreach ($user as $property => $value) {
                        if (gettype($value) != 'array' &&  gettype($value) != 'object') {
                            if ($value == $users[$index]->id) {
                                echo "<th scope='row'>{$value}</th>";
                            } else {
                                echo "<th scope='row'>{$value}</th>";
                            }
                        } elseif (gettype($value) == 'object' || gettype($value) == 'array') {
                            echo "<td scope='row'>";
                            foreach ($value as $key => $objectArrayValue) {
                                if($key == 'gender')
                                {
                                    if($objectArrayValue == 'm')
                                    {
                                        $objectArrayValue = 'Male';
                                    }
                                    else
                                    {
                                        $objectArrayValue = 'Female';
                                    }
                                    
                                }
                                echo "{$objectArrayValue}";
                            }
                            echo "</td>";
                        } 
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>