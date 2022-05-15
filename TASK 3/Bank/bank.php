<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $loan_amount = $_POST['loan-amount'];
    $loan_years = $_POST['loan-years'];

    if($loan_years <= 3)
    {
        $interest = 10/100;
    }
    else{
        $interest = 15/100;
    }

    $interest_rate = $loan_amount * $interest * $loan_years;
    $loan_after_rate = $interest_rate + $loan_amount;
    $monthly = $loan_after_rate / (12 * $loan_years) ;

    if (isset($_POST['submit'])) {
        $table = "<table class='table table-striped mt-4'>
        <thead>
            <tr>
                <th scope='col'>User name</th>
                <th scope='col'>Interest rate</th>
                <th scope='col'>Loan after rate</th>
                <th scope='col'>Monthly</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope='row'>". $name . "</td>
                <td>". $interest_rate . "</td>
                <td>". $loan_after_rate. "</td>
                <td>". $monthly . "</td>
            </tr>
        </tbody>
        </table>";
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

    <title>Bank, page!</title>
</head>

<body>
    <h1 class="text-primary text-center fw-bold mt-5 p-2 fw-bolder">Bank</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mt-5"><img src="images/undraw_make_it_rain_iwk4.png" class="w-75 mt-3" alt=""></div>
            <div class="col-6 mt-5">
                <form action="#" method="POST" class="mt-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">User name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $name ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="loan-amount" class="form-label">Loan amount</label>
                        <input type="number" name="loan-amount" class="form-control" id="loan-amount" value="<?php echo $loan_amount ?? ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="loan-years" class="form-label">Loan years</label>
                        <input type="number" name="loan-years" class="form-control" id="loan-years" value="<?php echo $loan_years ?? ''; ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">calculate</button>
                    </div>
                </form>
                <?php echo $table??''; ?>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>