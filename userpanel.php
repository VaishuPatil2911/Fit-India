<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Admin Panel</title>

    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />



    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <?php


$connection = mysqli_connect("localhost", "root", "", "vaishnavi");

$query = "SELECT * FROM signup";

$query_run = mysqli_query($connection, $query);


?>

</head>

<body>

    <div class="todo">

        <nav>
            <ul>
            <li><a href="adminpanel.php">Admin panel</a></li>
                <li><a href="userpanel.php">User details</a></li>
                <li><a href="registrationpanel.php">Registration details</a></li>
                
        </nav>



        <main class="panelD">



            <h1 class="tituloD">Dashboard</h1>

            <h2>User profiles</h2>
            <div class="tabla">
                <table cellpadding="0" cellspacing="0">
                    <tr class="negrita">
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>password</th>
                    </tr>


                    <?php
        
                     if(mysqli_num_rows($query_run) > 0)
                    {
                     while($row = mysqli_fetch_assoc($query_run))
                    {

                     ?>


                    <tr>
                        <th>
                            <?php echo $row['id']; ?>
                        </th>
                        <th>
                            <?php echo $row['name']; ?>
                        </th>
                        <th>
                            <?php echo $row['email']; ?>
                        </th>
                        <th>
                            <?php echo $row['password']; ?>
                        </th>
                    </tr>


                    <?php
                           }
                        }
             else{
                    echo "no records found";
                }
          ?>
                    
                </table>
            </div>

            <div class="formularios">
                <form class="" action="code.php" method="post">
                    <h3>Add user profile:</h3>
                    <input type="text" name="name" value="" placeholder="name">
                    <input type="email" name="email" value="" placeholder="email">
                    <input type="password" name="password" value="" placeholder="password">
                    <br>
                    <input type="submit" name="adduser" value="Add user" class="botonEnviar">

                </form>
            </div>


        </main>

    </div>


    <style>
        * {
            padding: 0px;
            margin: 0px;
            font-family: 'Muli', sans-serif;
        }

        .todo {
            display: flex;
            flex-wrap: nowrap;
            height: 40em;
        }


        a{
            text-decoration: none;
            color: black;
        }


        nav {
            display: flex;
            width: 30%;
            overflow: hidden;
            flex-direction: column;
            max-height: 100vh;
            border-right: solid 1px #d1d1d1;
            box-shadow: 2px 1px 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .logo {
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        /* .logo div {} */

        .logo div img {
            width: 100%;
            max-height: 70px;
        }


        .todo nav ul li {
            padding: 20px;
            margin-bottom: 6px;
            color: #606060;
            font-weight: 600;
            border-left: solid 4px rgba(0, 0, 0, 0.1);
            margin-left: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .todo nav ul li:hover {
            border-left: solid 4px #fcc728;
            color: #fcc728;
        }

        .todo nav ul li:hover+.subboton {
            transition: height 0.3s;
            height: 60px;
        }

        .todo nav ul li:hover .flecha {
            transform: rotate(90deg);
            color: #fcc728;
        }

        .flecha {
            float: right;
            transition: all 0.3s;
        }

        .subboton {
            padding: 0px;
            margin-left: 35px;
            list-style: none;
            height: 0px;
            overflow: hidden;
            transition: all 0.3s;
            max-height: 100%;
        }

        .subboton:hover {
            height: 60px;
        }


        .panelD {
            width: 100%;
            overflow: auto;
            max-height: 100vh;
            background-color: #fefefe;
        }

        header {
            height: 70px;
            width: 100%;
            border-bottom: solid 1px #d1d1d1;
            background-color: #fff;
            position: sticky;
            top: 0px;
            box-shadow: 1px 2px 15px rgba(0, 0, 0, 0.1);
            z-index: 11;
        }

        header img {
            max-height: 30px;
            float: right;
            width: 30px;
            padding-bottom: 20px;
            padding-top: 20px;
            margin-right: 10px;
        }

        header img:hover {
            cursor: pointer;
        }

        .perfil {
            max-height: 50px;
            float: right;
            width: 50px;
            padding: 10px;
        }

        .tituloD {
            color: #606060;
            font-weight: 400;
            font-size: 1.3em;
            padding-left: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-right: 50px;
            text-decoration: underline;
            color: #fcc728;
        }

        .tabla {
            display: flex;
            margin-left: 50px;
            margin-right: 50px;
            background-color: #fcc728;
            padding: 10px;
            border-radius: 10px;
            filter: drop-shadow(0px 6px 0px #e2b324);
        }

        .tabla table {
            text-align: center;
            padding: 40px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;


        }

        .tabla table tr th {
            font-size: 1em;
            font-weight: 300;
            border: solid 1px #ededed;
            padding: 3px 0px 3px 0px;
            font-family: 'Muli', sans-serif;
            background-color: #fff;
        }

        .panelD h2 {
            font-weight: 200;
            font-size: 1.2em;
            padding-left: 50px;
            padding-top: 30px;
            padding-right: 50px;
            color: #333333;
            margin-bottom: 5px;
        }

        .panelD h2 i {
            color: #333333;
            padding-left: 10px;
            font-size: 0.8em;
            color: #333333;
        }

        .negrita {
            color: #fcc728;
        }

        .formularios {
            margin-left: auto;
            margin-right: auto;
        }

        .formularios form {
            margin: 50px;
        }

        .formularios form input {
            font-family: 'Muli', sans-serif;
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
            border: solid 1px #d1d1d1;
            border-radius: 10px;
        }

        textarea:focus,
        input:focus {
            outline-color: #FCC728;
            color: #FCC728;
        }

        .formularios form h3 {
            font-size: 1.1em;
            font-weight: 600;
        }

        input[type="submit"] {
            font-family: 'Muli', sans-serif;
            background-color: #fff;
            border: solid 1px #d1d1d1;
            transition: all 0.4s;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            background-color: #FCC728;
            border: solid 1px #fff;
        }

    

        @media (max-width: 425px) {
            .tabla table tr th {
                font-size: 0.7em;
                padding: 0px;
            }

            .tabla {
                margin-left: 5px;
                margin-right: 5px;
                padding: 1px;
                border-radius: 10px;
            }

            .tabla table {
                padding: 2px;
                margin: 5px;
            }

            .tituloD {
                font-size: 0.9em;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .todo nav ul li {
                font-size: 0.7em;
                font-weight: 300;
                margin-left: 2px;
                padding: 10px;
            }

            .flecha {
                font-size: 0.6em;
            }

            .formularios form {
                margin: 10px;
            }

            .formularios form input {
                font-family: 'Muli', sans-serif;
                padding: 5px;
                margin-bottom: 5px;
                margin-top: 5px;
                border: solid 1px #d1d1d1;
                border-radius: 5px;
            }

            .caja {
                width: 70%;
                position: absolute;
                top: 20%;
                left: 15%;
            }

            header img {
                width: 10%;
            }

            form {
                width: 90%;
            }

            .grafico {
                margin: 5px;
                padding: 10px;
                background-color: #fff;
                border-radius: 10px;
                border: solid 1px #d1d1d1;
            }

            .panelD h2 {
                font-size: 1em;
                padding-left: 5px;
                padding-top: 10px;
                padding-right: 5px;
            }
        }
    </style>
</body>

</html>