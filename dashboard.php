
<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Establish a connection to your database
$db = mysqli_connect('localhost', 'root', '', 'n');
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve the relevant data based on the logged-in user's details
$email = $_SESSION['email'];

$query = "SELECT * FROM register WHERE email = '$email'";
$result = mysqli_query($db, $query);

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
  <!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Utility Service Provider</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <title>Dashboard</title>
    <style>
        h1,p,button{
            text-align:center;
            padding:10px;
            
        }
        .button{
          transform:translateX(46%);
        }
    </style>
    <a href="style.css"></a>
</head>
<body>
<div class="header_section background_bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
          </div>
          
          </div>
        </div>
      </div>
    </div>
<?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Process and display the data
            echo "<h1>Welcome, " .$row['fname'] . " " . $row['lname'] . "</h1>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "<p>Gender: " . $row['gender'] . "</p>";
            echo "<p>Verification: " . $row['status'] . "</p>";
        }
    } else {
        echo "<p>No data found.</p>";
    }
    ?>
    <div class="log">
      <button style="transform:translateX(650%);">
        <a href="./services.html">My Orders</a>
      </button>
      <button style="transform:translateX(900%);">
        <a href="./index.html">Logout</a>
        </button>
    </div>
</body>
</html>