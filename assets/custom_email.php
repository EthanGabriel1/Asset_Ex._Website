<?php
session_start();

$servername = "localhost"; // Update as necessary
$username = "u843230181_group7_2";
$password = "Zugzwang6969";
$dbname = "u843230181_test2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch user data for the table (updated query to fetch role_name)
$sqlUserData = "SELECT full_name, email, date_joined, roles.role_name FROM users INNER JOIN roles ON users.role_id = roles.role_id;";
$resultUserData = $conn->query($sqlUserData);
$userData = [];
if ($resultUserData->num_rows > 0) {
    while ($row = $resultUserData->fetch_assoc()) {
        $userData[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joan&display=swap" rel="stylesheet">
    <title>Asset Exchange Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR/i4tWb5Ek5I6SpX9jsdEF1qPUE8n7Kw5G1tJCKQ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
        }

        .card-custom {
            max-width: 450px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .emoji-img {
            display: block;
            border-radius: 25px;
            margin: 0 auto 1rem auto;
            width: 100%;
            height: 300px;
        }

        .title {
            font-size: 2.2rem;
            color: #000;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .greeting {
            font-size: 1.2rem;
            color: #3D3D3D;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        
        .greeting span {
            font-size: 1.2rem;
            color: #000;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }
        

        .content-text {
           font-size: 1.2rem;
            color: #3D3D3D;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .content-text p {
            margin: 0 0 1.2rem 0;
            line-height: 1.6;
        }

        .cta-btn {
            display: block;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 50%;
            padding: 20px;
            background-color: #FF604B;
            color: white;
            border: none;
            font-size: 1rem;
            border-radius: 10px;
            text-decoration: none;
            margin-left: 5.5rem;
            margin-top: 1.5rem;
        }

        .footer-text {
             font-size: 1.2rem;
            color: #3D3D3D;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        
        .footer-text span {
            font-size: 1.2rem;
            color: #000;
            text-align: center;
            font-family: "Joan", serif;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        
        
         .footer-text2 {
            font-size: 0.8rem;
            color: #999;
            text-align: center;
            margin-top: 1.5rem;
        }

        @media (max-width: 576px) {
            .card-custom {
                padding: 1.5rem;
            }

            .title {
                font-size: 1.3rem;
            }

            .greeting {
                font-size: 0.9rem;
            }

            .content-text {
                font-size: 0.9rem;
            }

            .cta-btn {
                font-size: 0.9rem;
            }

            .emoji-img {
                width: 100px;
            }
        }
    </style>
</head>
<body>

    <div class="card-custom">
        <!-- Emoji Image -->
                <img src="https://s3-alpha-sig.figma.com/img/90f5/8285/ad542c92ecdbbe154fe6c77ddbac46d5?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RzRstMKbjKXCTqzTAZz5gd~Y9YXV~3FXNJUj77~WSvcvSFuVYf16N26j4Se5JkxgBNXeXJqN3NDDAyZc9wNCZLi7wk5EYxkd2GOz3jrUUexybYtDUgmi-UTIO-fxN6HxoNqmDDVqD5-8r~lPzMnIKo71MRACbp26lyOseGEW8CjvBeXAvImfXnGBMf3WgX8i1Swh3U2byjJrsikXlo3l3xorb3C0Qx9DNUPByulhD52wLkTejOMWIoiAqmXI4LWePncOkKYqm7yw8NLA7Pkf2PxdSIn5yL-VB6-9RjtlGPNYAwE8SHT3WdLqGvplfo7Fa~XVWwfVMImo~~j2e4~LBA__" alt="Emoji Image" class="emoji-img">

        <!-- Title Section -->
        <h1 class="title">How's Everything Going?<br>We're Here to Help!</h1>

        <!-- Greeting Section -->
        <p class="greeting">Hey, <span><?php echo $_SESSION['full_name']; ?></span></p>

        <!-- Main Content -->
        <div class="content-text">
            <p>We hope you're doing well! We just wanted to check in and see how things are going with your project in Asset Exchange. How's everything coming along?</p>
            <p>If you haven't had a chance yet, now might be a great time to review any pending assets and leave feedback or request revisions. Once you're happy with the results, go ahead and approve finalized assets to keep things moving forward smoothly.</p>
            <p>Your dashboard is always there to help you stay organized, so feel free to take a moment to check in.</p>
            <p>We know that managing a project can sometimes be challenging, but remember—we're here for you every step of the way! If you need anything or just have a question, don't hesitate to reach out. You've got this!</p>
        </div>
        
         <!-- Footer Section -->
        <p class="footer-text">Take care,<br><span>The Asset Exchange Team</span></p>

        <!-- CTA Button -->
        <a href="#" class="cta-btn">Visit Dashboard</a>


        <p class="footer-text2">Have a question?<br>AssetExchange@gmail.com</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-qLxNUx0EGXpMMLnJ7V4VVq5AnNTltgTXpO4fzBCigA0vxz4SltLrxwWETUiPB3Vj" crossorigin="anonymous"></script>
</body>
</html>
