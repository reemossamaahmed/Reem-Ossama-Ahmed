<?php
if($_GET)
{
    if(isset($_GET['page']))
    {
        if(!($_GET['page'] == 'register' || $_GET['page'] == 'login'|| $_GET['page'] == 'forget-password'))
        {
            include "layouts/errors/404.php";
            die;
        }
    }
    else
    {
        include "layouts/errors/404.php";
        die;
    }
}
else
{
    include "layouts/errors/404.php";
    die;
}
use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Check Code";
require_once "layouts/header.php";
include_once "App/Midllewares/guest.php";


$validition = new Validation;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $validition->setKey('code')->setValue($_POST['code'])->required()->digits(6)->exist('users','code');
    if(empty($validition->getErrors()))
    {
        $user = new User;
        $user->setCode($_POST['code']);
        $user->setEmail($_SESSION['email']);
        if($user->checkUserCode()->get_result()->num_rows == 1)
        {
            $user->setEmail_verified_at(date('Y-m-d H:i:s'));
            if($user->makeUserVerified())
            {
                if($_GET['page'] == 'login')
                {
                    $authUser = $user->getUserByEmail()->get_result()->fetch_object();
                    $_SESSION['user'] = $authUser;
                    header("location: index.php");
                    die;
                }
                elseif($_GET['page'] == 'forget-password')
                {
                    header("location: reset-password.php");
                    die;
                }
                elseif($_GET['page'] == 'register')
                {
                    unset($_SESSION['email']);
                    header("location: login.php");
                    die;
                }
            }
            else
            {
                $error = "<div class = 'alert alert-danger'>Somthing went wrong!</div>";
            }
        }
        else
        {
            $error = "<div class = 'alert alert-danger'>Wrong Code!</div>";
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
                            <h4> Check Code </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <?php echo $error ?? '';?>
                                        <input type="number" name="code" placeholder="Verification Code">
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('code')}</div>"; ?>
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