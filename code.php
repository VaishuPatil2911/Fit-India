<?php

$connection = mysqli_connect("localhost", "root", "", "vaishnavi");

session_start();

if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conpassword = $_POST['conpassword'];

    $number = preg_match('@[0-9]@', $password);
    
    if($password === $conpassword && strlen($password) >= 8 && $number)
    {
        $query = "INSERT INTO signup(name, email, password) VALUES('$name', '$email', '$password')";

        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>window.alert('Signup successful')</script>";
            header("location: login.html");
        }

        else{
            echo "<script>window.alert('Sorry, Please try again')</script>";
            header("location: signup.html");
        }
    }

    else{
        echo "<script>window.alert('Please put same passwords which contain atleast 8 characters and atleast one number')</script>";
        header("location: signup.html");
    }

}


if(isset($_POST['login']))

{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['email'] = $email;
        echo "<script>window.alert('Login successful')</script>";
        header("location: blog.html");

    }

    else{
        echo "<script>window.alert('Login unsuccessful')</script>";
        header("location: login.html");
    }
}


if(isset($_POST['adminlogin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        echo "<script>alert('Logged in');</script>";
        header('Location: adminpanel.php');
    }

    else
    {
        echo "<script>alert('Email ID or password is invalid!');</script>";
        header('Location: adminlogin.html');
    }
}



if(isset($_POST['addadmin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO admin(email, password) VALUES('$email', '$password')";

    $query_run = mysqli_query($connection, $query);


    if($query_run)
    {
        echo "<script>alert('New admin added');</script>";
        header("location: adminpanel.php");
    }


    else{
        echo "<script>alert('Admin profile not added');</script>";
        header("location: adminpanel.php");
    }
}


if(isset($_POST['adduser']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO signup(name, email, password) VALUES('$name', '$email', '$password')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo "<script>alert('New user added');</script>";
        header("location: userpanel.php");

    }

    else{
        echo "<script>alert('New user added');</script>";
        header("location: userpanel.php");
    }

}


if(isset($_POST['contact']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mess = $_POST['mess'];


    $query = "INSERT INTO contact(name, email, mess) VALUES('$name', '$email', '$mess')";

    $query_run = mysqli_query($connection, $query);

    if($query_run){
        echo "<script>alert('Message sent');</script>";
        header("location: blog.html");
    }

    else{
        echo "<script>alert('Message not sent');</script>";
        header("location: cont.html");
    }
}



if(isset($_POST['registration']))
{
    $pname = $_POST['pname'];
    $chnum = $_POST['chnum'];
    $cnum = $_POST['cnum'];
    $cname = $_POST['cname'];
    $cage = $_POST['cage'];
    $date = $_POST['date'];
    $vname1 = $_POST['vname1'];
    $vname2 = $_POST['vname2'];
    $area = $_POST['area'];
    $state = $_POST['state'];
    $country = $_POST['country'];


    $query = "INSERT INTO registration(pname, chnum, cnum, cname, cage, date, vname1, vname2, area, state, country) VALUES('$pname', '$chnum', '$cnum', '$cname', '$cage', '$date', '$vname1', '$vname2', '$area', '$state', '$country')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo "<script>alert('Registration details added');</script>";
        header("location: blog.html");   
    }

    else{
        echo "<script>alert('Registration details not added');</script>";
        header("location: registration.html");
    }
}


?>