<?php
session_start();

if(!isset($_SESSION['user'])){
	//not logged in
	header('Location: loginsignup.php');
} 
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/reset.css" />
    <!-- CSS reset -->
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/cssforpopup.css" />
    <!-- Resource style -->
    <script src="js/modernizr.js"></script>
    <!-- Modernizr -->

    <title>GTF Colombo|User</title>
</head>

<body style="background-color:#303030">
    <div>
        <header class="cd-main-header">
            <a href="#0" class="cd-logo">
                <img src="images/logo_final1.png" alt="Logo" />
            </a>

            <div class="cd-search gtfc" style="margin: 16px 0 0 36px; font: normal 18px Cookie, Arial, Helvetica, sans-serif; color:white;">
                <h1 style="">Hope</h1>
            </div>
            <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
            <nav class="cd-nav">
                <ul class="cd-top-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="has-children account">
                        <a href="#0" onclick="location.href = '#';">
                            <img src="images/dummyuser.png" alt="avatar" />

                            <?php 
                            echo $_SESSION['user'];    ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- .cd-main-header -->
        <main class="cd-main-content">
            <nav class="cd-side-nav">
                <ul></ul>
                <ul>
                    <li class="has-children users">
                        <a href="#0" onclick=" document.getElementById('viewarticles').style.display = 'block'; document.getElementById('addarticles').style.display = 'none';document.body.style.backgroundColor = '#303030'">View Articles</a>


                    </li>

                    <li class="has-children bookmarks">
                        <a href="#0" onclick=" document.getElementById('viewarticles').style.display = 'none'; document.getElementById('addarticles').style.display = 'block';document.body.style.backgroundColor = '#303030'">Add Articles</a>

                    </li>
                </ul>

                <ul style="">
                    <li class="action-btn"><a href="php/logout.php" class="logout">Logout</a></li>
                </ul>
            </nav>
            <div class="content-wrapper">
                <div id="viewarticles" style="display:block;position: relative; min-height: 83vh;background-color:#607D8B ">
                    <table width=100%>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "hope";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        echo "";
                        $sql = "SELECT * FROM articles";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            echo "<br><table>";
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                        <tr>
                                            <td><img alt='No Image Found' height='250px' width='250px' src='uploads/" . $row['image'] . "'></td>
                                            <td  style='text-align:center; width:100%; font-weight:700;'>
                                                <div>" . $row['articlename'] . "</div>
                                                <br>
                                                <br>
                                                <div style='text-align:justify;'>" . $row['description'] . "</div>
                                            </td>
                                        </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<font color='red'> Ooops ! No Records ! </font>";
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>
                <div id="addarticles" style="display:none;position: relative; min-height: 83vh;background-color:#607D8B">
                    <form action="php/newarticle.php" enctype="multipart/form-data" method="post">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Add New Article</h2>
                            </div>
                            <div class="modal-body">

                                <label>Name Of The Article</label>
                                <input type="text" id="articlename" name="articlename" placeholder="Article Name.." required>

                                <label>Upload A Photo</label>
                                <input type="file" name="image" required>

                                <label>Description</label>

                                <textarea name="description" id="description" cols="30" rows="5" required></textarea>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- .content-wrapper -->
        </main>
        <!-- .cd-main-content -->
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/jquery.menu-aim.js"></script>
        <script src="js/main.js"></script>
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>


    </div>
</body>

</html>