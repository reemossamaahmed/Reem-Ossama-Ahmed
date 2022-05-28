    <?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
use App\Mails\VerificationCode;

    $title = "Register";
    include_once "layouts/header.php";
    include_once "App/Midllewares/guest.php";
    include_once "layouts/navbar.php";
    include_once "layouts/breadcrumb.php";


    $validation = new Validation;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $validation->setKey('name')->setValue($_POST['name'])->required()->string()->min('2')->max('32');
        $validation->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'Minimum eight characters, at least one letter and one number')->confirmed($_POST['password-confirmation']);
        $validation->setKey('password-confirmation')->setValue($_POST['password-confirmation'])->required();
        $validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users', 'email');
        $validation->setKey('phone')->setValue($_POST['phone'])->required()->digits(11)->regex('/^01[0125][0-9]{8}$/')->unique('users', 'phone');
        $validation->setKey('gender')->setValue($_POST['gender'])->required()->in(['m', 'f']);
        if (empty($validation->getErrors())) {
            $code = rand(100000,999999);
            $user = new User;
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setPhone($_POST['phone']);
            $user->setGender($_POST['gender']);
            $user->setCode($code);
            if($user->insert())
            {
                $body = "<div>Hello {$_POST['name']}</div><div>Your Verification code is {$code}</div><div>Thank You.</div>";
                $verificationCode = new VerificationCode($_POST['email'],'Verification Code',$body);
                if($verificationCode->send())
                {
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: check-code.php?page=register");
                    die;
                }
                else
                {
                    $error = "<div class = 'alert alert=danger'>Somthing Wrong</div>";
                }
                
            }
            else
            {
                $error = "<div class = 'alert alert-danger'>Data not Inserted!</div>";
            }
        }
    }
    ?>

    <div class="login-register-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg2">
                                <h4> <?php echo $title ;?> </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="" method="post">
                                            <?php echo $error ?? ''?>
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('name')}</div>"; ?>
                                            <input type="text" name="name" placeholder="Your Name" value="<?php echo $_POST['name'] ?? '' ?>">
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('password')}</div>"; ?>
                                            <input type="password" name="password" placeholder="Your Password">
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('password-confirmation')}</div>"; ?>
                                            <input type="password" name="password-confirmation" placeholder="Confirmed Password">
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('email')}</div>"; ?>
                                            <input name="email" placeholder="Your Email" type="email" value="<?php echo $_POST['email'] ?? '' ?>">
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('phone')}</div>"; ?>
                                            <input type="number" name="phone" placeholder="Your Phone" value="<?php echo $_POST['phone'] ?? '' ?>">
                                            <?php echo "<div class='text-danger p-1'>{$validation->getError('gender')}</div>"; ?>
                                            <select name="gender">
                                                <option value="m" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'm') ? 'selected' : ''; ?>>Male</option>
                                                <option value="f" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'f') ? 'selected' : ''; ?>>Female</option>
                                            </select>
                                            <div class="mt-5">
                                                <button type="submit" class="btn btn-success"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once "layouts/footer.php";
    require_once "layouts/footer-scripts.php";
    ?>