<?php
require "config.php";

if (empty($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION["email"];


$checkCompanyQuery = "SELECT c.*, s.Student_ID 
                      FROM company_registration c
                      INNER JOIN student_registration s ON c.Student_ID = s.Student_ID
                      WHERE s.Student_email = '$userEmail'";

$resultCompany = mysqli_query($conn, $checkCompanyQuery);

$hasCompany = mysqli_num_rows($resultCompany) > 0;
$companyName = "";
$companyLogo = "";

if ($hasCompany) {
    $row = mysqli_fetch_assoc($resultCompany);
    $companyName = $row["Company_name"];
    $companyLogo = $row["Company_logo"]; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Launchpad</title>
		<link rel="icon" href="/launchpad/images/favicon.svg" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>

<aside class="sidebar">
            <header class="sidebar-header">
                <img src="\launchpad\images\logo-text.svg" class="logo-img">
            </header>

            <nav>
                <a href="index.php" >
                <button>
                    <span>
                        <i ><img src="\launchpad\images\home-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Home</span>
                    </span>
                </button>
            </a>
            <a href="project-idea-checker.php">
                <button>
                    <span>
                        <i ><img src="\launchpad\images\project-checker-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Project Idea Checker</span>
                    </span>
                </button>
    </a>
    <a href="invitations.php">
                <button>
                    <span>
                        <i ><img src="\launchpad\images\invitation-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Invitations</span>
                    </span>
                </button>
    </a>
                <p class="divider-company">YOUR COMPANY</p>
                         
                

                <a href="<?php echo $hasCompany ? 'company.php' : 'create-company.php'; ?>">
        <button>
            <span class="<?php echo $hasCompany ? 'btn-company-created' : 'btn-create-company'; ?>">
                <div class="circle-avatar">
                    <?php if ($hasCompany && !empty($companyLogo)): ?>
                        <img src="\launchpad\<?php echo $companyLogo; ?>" alt="Company Logo" class="img-company">
                    <?php else: ?>
                        <img src="\launchpad\images\join-company-icon.png" alt="Join Company Icon">
                    <?php endif; ?>
                </div>
                <span class="create-company-text">
                    <?php echo $hasCompany ? $companyName : 'Create your company'; ?>
                </span>
            </span>
        </button>
    </a>





                <p class="divider-company">COMPANIES YOU'VE JOINED</p>
                <a href="#">
                <button>
                    <span  class="btn-join-company">
                        <i > <div class="circle-avatar">
                            <img src="\launchpad\images\join-company-icon.png" alt="">
                        </div></i>
                        <span class="join-company-text">Join companies</span>
                    </span>
                </button>
                </a>
<a href="#" class="active">
                <button>
                    <span>
                        <img src="logo.png" alt="">
                        <span>Profile</span>
                    </span>
                </button>
</a>
               
            </nav>


        </aside>












<?php 

    $email = $_SESSION['email'];

        $select_user_info = "SELECT * FROM student_registration WHERE Student_email='$email'";
        $result_user_info = mysqli_query($conn, $select_user_info);
        if ($result_user_info) {
            if (mysqli_num_rows($result_user_info) > 0) {
                $row = mysqli_fetch_assoc($result_user_info);
                $stud_id = $row['Student_ID'];
                $fname = $row['Student_fname'];
                $lname = $row['Student_lname'];
                $course = $row['Course'];
                $year = $row['Year'];
                $block = $row['Block'];
                $contactNo = $row['Student_contactno'];
                $emailValue = $email;
                $password = $row['Student_password'];
            }
        }

    if (isset($_POST['btnEditProfile'])) {
        $new_studid = $_POST['new_studentid'];
        $new_fname = $_POST['new_student_fname'];
        $new_lname = $_POST['new_student_lname'];
        $new_course = $_POST['new_course'];
        $new_year = $_POST['new_year'];
        $new_block = $_POST['new_block'];
        $new_contact = $_POST['new_student_contactno'];


        $update_info = "UPDATE student_registration SET Student_ID='$new_studid', Student_fname='$new_fname', Student_lname='$new_lname', Course='$new_course', Year='$new_year', Block='$new_block', Student_contactno='$new_contact' WHERE Student_email='$email'";

        if (mysqli_query($conn, $update_info)) {
            echo "<script>alert('Updated the profile successfully');</script>";
            header("refresh: 2; URL='profile.php'");
        }else {
            echo "<script>alert('Error in updating');</script>";
        }
    }

    if (isset($_POST['btnEditCredentials'])) {
        $new_email = $_POST['email'];
        $old_pass = $_POST['password'];
        $new_pass = $_POST['new_password'];
        $confirm_pass = $_POST['confirm_password'];

        $select_login_info = "SELECT Student_email, Student_password FROM student_registration WHERE Student_email='$email'";

        $result_login_info = mysqli_query($conn, $select_login_info);
        if ($result_login_info) {
            if (mysqli_num_rows($result_login_info) > 0) {
                $row = mysqli_fetch_assoc($result_login_info);
                
                if ($old_pass == $row['Student_password']) {
                    if ($new_pass == $confirm_pass) {
                        
                        $update_login = "UPDATE student_registration
                        SET Student_email = '$new_email', Student_password = '$new_pass'
                        WHERE Student_email = '$email'";

                        if (mysqli_query($conn, $update_login)) {
                            echo "<script>alert('Updated the Login credential successfully');</script>";
                            header("refresh: 2; URL='profile.php'");
                        }
                    }else {
                        echo "<script>alert('New password does match');</script>";
                    }
                }else {
                    echo "<script>alert('Old password does not match');</script>";
                }
            }
        }
    }
?>
<div class="content">
    <br><br>
    <a href="profile.php">Back</a>
    <header><h1>Edit my profile</h1></header>

    <form action="" method="post">
            <label for="new_studentid">Student ID:</label>
            <input type="text" name="new_studentid" value="<?php echo $stud_id?>" required readonly>
<br><br>
            <label for="new_student_fname">First Name:</label>
            <input type="text" name="new_student_fname" value="<?php echo $fname?>" required>
<br><br>
            <label for="new_student_lname">Last Name:</label>
            <input type="text" name="new_student_lname" value="<?php echo $lname?>" required>
<br><br>
            <label for="new_course">Course:</label>
            <input type="text" name="new_course" value="<?php echo $course?>" required>
<br><br>
            <label for="new_year">Year:</label>
            <input type="text" name="new_year" value="<?php echo $year?>" required>
<br><br>
            <label for="new_block">Block:</label>
            <input type="text" name="new_block" value="<?php echo $block?>" required>
<br><br>
            <label for="new_student_contactno">Contact Number:</label>
            <input type="tel" name="new_student_contactno" value="<?php echo $contactNo?>" required>
<br><br>
            <button name="btnEditProfile">Save Changes</button>
        </form>
        <br><br><br>
        <hr>
<br>
        <h1>Edit Login Credentials</h1>
<br>
        <form action="" method="post">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="<?php echo $emailValue?>">
<br><br>
            <label for="password">Type your old password: </label>
            <input type="password" name="password" id="password" >
       <br>  <br>   
            <label for="new_password">Type your new password: </label>
            <input type="password" name="new_password" id="new_password">
<br><br>
            <label for="confirm_password">Confirm you password: </label>
            <input type="password" name="confirm_password" id="confirm_password">
<br><br>
            <button name="btnEditCredentials">Save Changes</button>
        </form>
    </div>

</div>
    
    
</body>
</html>