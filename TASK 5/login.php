<?php
use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Login";
include_once "layouts/header.php";
include_once "App/Midllewares/guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

$validition = new Validation;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $validition->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',"email doesn't exist!")->exist('users','email');
    $validition->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'Wrong email or password');
    if(empty($validition->getErrors()))
    {
        $user = new User;
        $user->setEmail($_POST['email']);
        if($user->getUserByEmail()->get_result()->num_rows == 1)
        {
            $authUser = $user->getUserByEmail()->get_result()->fetch_object();
            if(password_verify($_POST['password'],$authUser->password))
            {
                if($authUser->email_verified_at)
                {
                    if(isset($_POST['remember-me']))
                    {
                        setcookie('remember-me',$_POST['email'],time()+(86400*365),'/');
                    }
                    $_SESSION['user'] = $authUser;
                    header("Location: index.php");
                    die;
                }
                else
                {
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: check-code.php?page=login");
                    die;
                }
            }
            else
            {
                $error = "<div class = 'alert alert-danger'>Wrong email or password!</div>";
            }
        }
        else
        {
            $error = "<div class = 'alert alert-danger'>Wrong email or password!</div>";
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
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('email')}</div>"; ?>
                                        <input type="email" name="email" placeholder="Your Email" value="<?php echo $_POST['email'] ?? '' ?>">
                                        <?php echo "<div class='text-danger p-1'>{$validition->getError('password')}</div>"; ?>
                                        <?php echo isset($error) ?  "<div class='text-danger p-1'>. $error .</div>" : ''; ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember-me">
                                                <label>Remember me</label>
                                                <a href="forget-password.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
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