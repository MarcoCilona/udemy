<?php 

    include_once('../includes/db.php');
    include('includes/cat_function.php');

?>

<?php 
    
    ob_start(); 
    session_start();


    $profile_id = $_SESSION['user_id'];

    $profile_query = "SELECT username FROM users ";
    $profile_query .= "WHERE id = $profile_id ";

    $user_info = mysqli_query($connection, $profile_query) or die ("Failed to load profile info. <br />Error: " .  mysqli_error($connection));

    $username_to_show = mysqli_fetch_array($user_info)[0];

?>

<?php 

    if (isset($_SESSION['role'])) {
        $role_id = $_SESSION['role'];

        $query = "SELECT role_name FROM role ";
        $query .= "WHERE id = $role_id ";

        $role = mysqli_query($connection, $query) or die("Failed to load role name. <br />Error: " .mysqli_error($connection));

        $role_name = mysqli_fetch_array($role);
        
        if($role_name[0] !== 'admin'){
            header("Location: ../index.php");

        }    

    }else{

        header("Location: ../index.php");

    } 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>