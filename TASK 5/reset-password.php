<?php
use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Reset Password";
include_once "layouts/header.php";
include_once "App/Midllewares/guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

$validition = new Validation;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $validition->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'Minimum eight characters, at least one letter and one number')->confirmed($_POST['password-confirmation']);
    $validition->setKey('password-confirmation')->setValue($_POST['password-confirmation'])->required();
    if(empty($validition->getErrors()))
    {
        $user = new User;
        $user->setEmail($_SESSION['email']);
        $user->setPassword($_POST['password']);
        if($user->updatePasswordByEmail())
        {
            header("Location: login.php");
            die;
        }
        else
        {
            $error = "<div class = 'alert alert-danger'>Somthing went Wrong!</div>";
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
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?php echo $title ;?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?php echo $error ?? '';?>
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('password')}</div>"; ?>
                                        <input type="password" name="password" placeholder="Your New Password">
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('password-confirmation')}</div>"; ?>
                                        <input type="password" name="password-confirmation" placeholder="Confirm your Password">
                                        <div class="button-box">
                                            <button type="submit"><span>CHANGE</span></button>
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