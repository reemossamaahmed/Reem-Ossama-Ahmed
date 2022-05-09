<?php
/*
29603021111111 => Alaa Hesham , 01111111111 , Cairo Egypt , Female  , 25
29603022222222 => Esraa Sayed , 01222222222 , Alex Egypt , Female  , 24
29603023333333 => Osama Salah , 01000000000 , Giza Egypt , Male , 30
 */


$id1 = 29603021111111;
$id2 = 29603022222222;
$id3 = 29603023333333;

$info =[
    ['name' => 'Alaa Hesham', 'phone' => '01111111111', 'age' => 25, 'gender' => 'female'],
    ['name' => 'Esraa Sayed', 'phone' => '01222222222', 'age' => 24, 'gender' => 'female'],
    ['name' => 'Osama Salah', 'phone' => '01000000000', 'age' => 23, 'gender' => 'male']
];

@$id = $_POST['id'];

if(isset($_POST['submit'])){
    // echo $id;
    if($id == $id1)
    {
        // echo "{$id1}";
        $messege = $info[0]['name'] . " " .$info[0]['phone'] . " " .$info[0]['age'] .$info[0]['gender'] ; 
        echo $messege ;
    }
    elseif($id == $id2)
    {
        // echo "{$id2}";
        $messege =  $info[1]['name'] . " " .$info[1]['phone'] . " " .$info[1]['age']." " .$info[1]['gender'] ;
        echo $messege ;
    }

    elseif($id == $id3)
    {
        // echo "{$id3}";
        $messege = $info[2]['name'] . " " .$info[2]['phone'] . " " .$info[2]['age'] . " " .$info[2]['gender'] ; 
        echo $messege ;
    }
    else{
        $messege = "NOT EXIST";
        echo $messege;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>National Id</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-12 text-center h1 mt-5 text-danger">
                  Get My Data
              </div>
              <div class="col-4 offset-4 my-5">
                  <form method="post">
                        <div class="form-group">
                            <label for="national_id">National Id</label>
                            <input type="number" name="id" id="national_id" class="form-control">
                        </div>
                    <!-- <input type="submit" value="My Info" name="btn" class=""> -->
                        <div class="form-group">
                            <button class="btn btn-outline-danger rounded btn-sm" name="submit"> My Info </button>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
