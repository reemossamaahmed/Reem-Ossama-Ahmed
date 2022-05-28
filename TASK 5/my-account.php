<?php

use App\Database\Models\User;
use App\Helpers\Media;
use App\Http\Requests\Validation;

$title = "My Profile";
include_once "layouts/header.php";
include_once "App/Midllewares/auth.php";
$Validition = new Validation;
$Media = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])) {
    $Validition->setKey('name')->setValue($_POST['name'])->required()->string()->min(2)->max(32);
    $Validition->setKey('phone')->setValue($_POST['phone'])->required()->digits(11)->regex('/^01[0125][0-9]{8}$/');
    $Validition->setKey('gender')->setValue($_POST['gender'])->in(['m', 'f']);
    if (empty($Validition->getErrors())) {
        $user = new User;
        $user->setName($_POST['name']);
        $user->setPhone($_POST['phone']);
        $user->setGender($_POST['gender']);
        $user->setEmail($_SESSION['user']->email);
        try {
            if ($_FILES['image']['error'] == 0) {
                $Media = new Media($_FILES['image']);
                $Media->validationOnExtention(['jpg', 'jpeg', 'png']);
                $Media->validationOnsize(10 ** 6);
                if (empty($Media->getMediaErrors())) {
                    $Media->upload('assets/img/users/');
                    $image = $Media->getFileName();
                    $user->setImage($image);
                } else {
                    $imageErrors = $Media->getMediaErrors();
                }
                if (empty($Media->getMediaErrors())) {
                    $user->update();
                    $_SESSION['user']->name = $_POST['name'];
                    $_SESSION['user']->phone = $_POST['phone'];
                    $_SESSION['user']->gender = $_POST['gender'];
                    $_SESSION['user']->image = $Media->getFileName();
                    $success = "<div class = 'alert alert-success text-center'> Updated Your Information Successfully</div>";
                }
            }
        } catch (\Exception $e) {
            $error = "<div class = 'alert alert-danger'>Somthing Wrong!</div>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-password'])) {
    $Validition->setKey('old-password')->setValue($_POST['old-password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'Wrong email or password');
    $Validition->setKey('new-password')->setValue($_POST['new-password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'Minimum eight characters, at least one letter and one number')->confirmed($_POST['confirm-password']);
    $Validition->setKey('confirm-password')->setValue($_POST['confirm-password'])->required();
    if (empty($Validition->getErrors())) {
        $user = new User;
        $user->setEmail($_SESSION['user']->email);
        $user->setPassword($_POST['new-password']);
        if($user->getUserByEmail()->get_result()->num_rows == 1)
        {
            $authUser = $user->getUserByEmail()->get_result()->fetch_object();
            if(password_verify($_POST['old-password'],$authUser->password))
            {
                if($_POST['old-password'] != $_POST['new-password'])
                {
                    if ($user->changePassword()) {
                        $messegeToCheckUpdatedOrNot = "<div class = 'alert alert-success'>Password Changed successfully</div>";
                    } else {
                        $messegeToCheckUpdatedOrNot = "<div class = 'alert alert-danger'>password not changed!</div>";
                    }
                }
                else{
                    $messegeToCheckUpdatedOrNot = "<div class = 'alert alert-danger'>Enter a new password</div>";
                }
                
            }
            else
            {
                $messegeToCheckUpdatedOrNot = "<div class = 'alert alert-danger'>password not exist!</div>";
            }
        }
        else
        {
            $messegeToCheckUpdatedOrNot = "<div class = 'alert alert-danger'>Wrong email or password!</div>";
        }
    } else {
        $errorFromFormTwo = "<div class = 'alert alert-danger'>password not changed!</div>";
    }
}





include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
?>


<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                        <?php echo isset($error) ? $error : ''; ?>
                                        <?php echo isset($success) ? $success : ''; ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 text-center m-auto">
                                                    <label for="file"><img id="image" src="assets/img/users/<?php echo $_SESSION['user']->image; ?>" alt="<?php echo $_SESSION['user']->name; ?>" class="w-100 rounded-circle" style="cursor: pointer;"></label>
                                                    <input type="file" id="file" name="image" class="d-none" onchange="loadImage(event)">
                                                    <?php
                                                    if (isset($imageErrors)) {
                                                        foreach ($imageErrors as $error) {
                                                            echo "<p class='text-danger font-weight-bold  '>" . $error . '</p>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-3">
                                                    <div class="billing-info">
                                                        <label>User Name</label>
                                                        <input type="text" name="name" value="<?php echo $_SESSION['user']->name; ?>">
                                                        <?php echo $Validition->getError('name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-3">
                                                    <div class="billing-info">
                                                        <label>Phone</label>
                                                        <input type="number" name="phone" value="<?php echo $_SESSION['user']->phone; ?>">
                                                        <?php echo $Validition->getError('phone') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="m" <?php echo ($_SESSION['user']->gender == 'm') ? "selected" : ""; ?>>Male</option>
                                                            <option value="f" <?php echo ($_SESSION['user']->gender == 'f') ? "selected" : ""; ?>>Female</option>
                                                        </select>
                                                        <?php echo $Validition->getError('gender') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Change Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="" method="post">
                            <?php if (isset($messegeToCheckUpdatedOrNot)) echo $messegeToCheckUpdatedOrNot; ?>
                            <?php echo $errorFromFormTwo ?? ''; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Password</h4>
                                                <h5>Your Password</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old-password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new-password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="confirm-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>Farhana hayder (shuvo) </p>
                                                        <p>hastech </p>
                                                        <p> Road#1 , Block#c </p>
                                                        <p> Rampura. </p>
                                                        <p>Dhaka </p>
                                                        <p>Bangladesh </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <a class="edit" href="#">Edit</a>
                                                        <a href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>4</span> <a href="wishlist.php">Modify your wish list </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account end -->

<?php
require_once "layouts/footer.php";
require_once "layouts/footer-scripts.php";
?>
<script>
    var loadImage = function loadImage(event) {
        var image = document.getElementById('image');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.onload = function() {
            URL.revokeObjectURL(image.src);
        }
    }
</script>