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
    <title><?php echo $hasCompany && !empty($companyName) ? $companyName." - Launchpad" : 'Create Company - Launchpad'; ?></title> 
    <link rel="icon" href="/launchpad/images/favicon.ico" id="favicon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <script>
        function changeFavicon(url) {
            const favicon = document.getElementById('favicon');
            favicon.href = url;
        }
        <?php if ($hasCompany && !empty($companyLogo)): ?>
            const companyLogoUrl = "/launchpad/<?php echo $companyLogo; ?>";
            changeFavicon(companyLogoUrl);
        <?php endif; ?>
    </script>
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
    <a href="invitations.php" >
                <button>
                    <span>
                        <i ><img src="\launchpad\images\invitation-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Invitations</span>
                    </span>
                </button>
    </a>
                <p class="divider-company">YOUR COMPANY</p>
                <a href="create-company.php">
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
                    <a href="<?php echo 'company.php'; ?>">
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
<h1><?php echo "" ?></h1>
        </div>
</body>
</html>