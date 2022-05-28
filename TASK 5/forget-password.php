<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
use App\Mails\VerificationCode;

$title = "Forget Password";
require_once "layouts/header.php";
include_once "App/Midllewares/guest.php";


$validition = new Validation;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $validition->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exist('users', 'email');
    if(empty($validition->getErrors()))
    {
        $code = rand(100000,999999);
        $user = new User;
        $user->setEmail($_POST['email']);
        $user->setCode($code);
        if($user->updateCodeByEmail())
        {
            $body = "<div>Hello {$_POST['email']}</div><div>Your Verification code is {$code}</div><div>Thank You.</div>";
            $verificationCode = new VerificationCode($_POST['email'],'Forget Password Code',$body);
            if($verificationCode->send())
            {
                $_SESSION['email'] = $_POST['email'];
                header("Location: check-code.php?page=forget-password");
                die;
            }
            else
            {
                $error = "<div class = 'alert alert=danger'>Somthing Wrong</div>";
            }
        }
        else
        {
            $error = "<div class = 'alert alert=danger'>Somthing Wrong</div>";
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
                                        <input type="email" name="email" placeholder="Email Address" value="<?php echo $_POST['email'] ?? '';?>">
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('email')}</div>"; ?>
                                        <button class="btn btn-success " type="submit"><span>CHECK</span></button>
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