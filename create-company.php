<?php
require "config.php";

if (empty($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION["email"];
if (isset($userEmail)) {
    $checkCompanyQuery = "SELECT c.*, s.Student_ID 
                        FROM company_registration c
                        INNER JOIN student_registration s ON c.Student_ID = s.Student_ID
                        WHERE s.Student_email = '$userEmail'";
} else {
    $checkCompanyQuery = "SELECT * FROM company_registration WHERE Company_ID = '$selectedCompanyID'";
}

$resultCompany = mysqli_query($conn, $checkCompanyQuery);

$hasCompany = mysqli_num_rows($resultCompany) > 0;
$companyID = "";
$companyName = "";
$companyLogo = "";

if ($hasCompany) {
    $row = mysqli_fetch_assoc($resultCompany); 
    $companyID = $row["Company_ID"];
    $companyName = $row["Company_name"];
    $companyLogo = $row["Company_logo"]; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_name = $_POST['company_name'];
    $company_description = $_POST['company_description'];


    if (isset($_FILES["company_logo"])) {
        $file = $_FILES["company_logo"];
        $file_name = $file["name"];
        $file_tmp_name = $file["tmp_name"];
        $file_error = $file["error"];
        $email = $_SESSION["email"];

        $select = "SELECT * FROM student_registration where Student_email='$email'";
        $result = mysqli_query($conn, $select);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $student_ID = $row['Student_ID'];
            }
        }
        
        if ($file_error === 0) {
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_extensions = array("jpg", "jpeg", "png");
            
            if (in_array($file_ext, $allowed_extensions)) {
                $picture_path = "images/".uniqid() . "." . $file_ext;
            
                move_uploaded_file($file_tmp_name, $picture_path);
                
                $sql = "INSERT INTO company_registration (Student_ID, Company_name, Company_description, Company_logo, Registration_date) VALUES ('$student_ID', '$company_name', '$company_description', '$picture_path', NOW())";
                
                if (mysqli_query($conn, $sql)) {
                    $newCompanyID = mysqli_insert_id($conn);
                    $newCompanyQuery = "SELECT * FROM company_registration WHERE Company_ID = $newCompanyID";
                    $resultNewCompany = mysqli_query($conn, $newCompanyQuery);
                    
                    if ($resultNewCompany) {
                        $newCompany = mysqli_fetch_assoc($resultNewCompany);
                        $companies[] = $newCompany;
                    }
                    
                    echo "<script>alert('Your company has been created successfully')</script>";
                    header("Refresh: 1; url=company_view.php?Company_id=" . $newCompanyID);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Only JPEG, JPG, and PNG files are allowed.')</script>";
            } 
        }
        } else {
            echo "Error uploading the file.";
        }
       
    } else {
        echo "No file uploaded.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company - Launchpad</title>
    <link rel="icon" href="/launchpad/images/favicon.svg" />
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/create_company.css">  
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
                <a href="create-company.php" class="active">
                    <button>
                        <span class="<?php echo 'btn-company-created'; ?>">
                            <div class="circle-avatar">
                                <img src="\launchpad\images\join-company-icon.png" alt="Join Company Icon">
                            </div>
                            <span class="create-company-text">
                                Create your company
                            </span>
                        </span>
                    </button>
                </a>
                <?php if ($hasCompany): ?>
                <?php foreach ($resultCompany as $row): ?>
                    <a href="company_view.php?Company_id=<?php echo $row['Company_ID']; ?>">
                    <!-- <a href="company.php"> -->
                        <button>
                            <span class="<?php echo 'btn-company-created'; ?>">
                                <div class="circle-avatar">
                                    <?php if (!empty($row['Company_logo'])): ?>
                                        <img src="\launchpad\<?php echo $row['Company_logo']; ?>" alt="Company Logo" class="img-company">
                                    <?php endif; ?>
                                </div>
                                <span class="create-company-text">
                                    <?php echo $row['Company_name']; ?>
                                </span>
                            </span>
                        </button>
                    </a>
                <?php endforeach; ?>
                <?php endif; ?>

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
                <a href="profile.php">
                <button>
                    <span>
                        <img src="logo.png" alt="">
                        <span>Profile</span>
                    </span>
                </button>
                </a>
               
            </nav>


        </aside>


<div class="content">
    <h2>Company Information Form</h2>

    <form action="create-company.php" method="post" enctype="multipart/form-data">
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required>

        <br><br>

        <label for="company_description">Company Description:</label>
        <textarea id="company_description" name="company_description" rows="4" required></textarea>

        <br><br>

        <label for="company_logo">Company Logo:</label>
        <input type="file" id="company_logo" name="company_logo" accept="image/*" required>

        <br><br>

        <button id="submit-btn" type="submit">Submit</button>
    </form>
    </div>
</body>
</html>