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

    <title>Hope</title>
</head>
<body style="background-color:#303030">
    <div>
        <header class="cd-main-header">
            <a href="#0" class="cd-logo">
                <!--<img src="images/logo_final1.png" alt="Logo" />-->
            </a>

            <div class="cd-search gtfc" style="margin: 16px 0 0 36px; font: normal 18px Cookie, Arial, Helvetica, sans-serif; color:white;">
                <h1 style="">Hope</h1>
            </div>
            <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
            <nav class="cd-nav">
                <ul class="cd-top-nav">
                    <li><a href="articles.php">Articles</a></li>
                    <li class="has-children account">
                        <a href="#0" onclick="location.href = '#';">
                            <img src="images/dummyuser.png" alt="avatar" />

                            <?php echo $_SESSION['user'];	?>
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
                    <li class="has-children images">
                        <a href="#" onclick="document.getElementById('donatereqs').style.display = 'block'; document.getElementById('donate').style.display = 'none'; document.getElementById('donate').style.display = 'none'; document.getElementById('requestdonation').style.display = 'none';document.getElementById('availabledonations').style.display = 'none';document.body.style.backgroundColor = '#303030'">Donate Requests</a>

                    </li>
                    <li class="has-children users">
                        <a href="#0" onclick="document.getElementById('donatereqs').style.display = 'none'; document.getElementById('donate').style.display = 'none'; document.getElementById('donate').style.display = 'none'; document.getElementById('requestdonation').style.display = 'none';document.getElementById('availabledonations').style.display = 'block';document.body.style.backgroundColor = '#303030'">Available Donations</a>


                    </li>

                    <li class="has-children bookmarks">
                        <a href="#0" onclick="document.getElementById('donatereqs').style.display = 'none'; document.getElementById('donate').style.display = 'none'; document.getElementById('donate').style.display = 'block';document.getElementById('requestdonation').style.display = 'none';document.getElementById('availabledonations').style.display = 'none';document.body.style.backgroundColor = '#303030'">Donate</a>

                    </li>


                    <li class="has-children comments">
                        <a href="#0" onclick="document.getElementById('donatereqs').style.display = 'none'; document.getElementById('donate').style.display = 'none'; document.getElementById('donate').style.display = 'none';document.getElementById('requestdonation').style.display = 'block';document.getElementById('availabledonations').style.display = 'none';document.body.style.backgroundColor = '#303030'">Request Donation</a>

                    </li>
                </ul>

                <ul style="">
                    <li class="action-btn"><a href="php/logout.php" class="logout">Logout</a></li>
                </ul>
            </nav>
            <div class="content-wrapper">
                <div id="donatereqs" style="position: relative; min-height: 83vh;background-color:antiquewhite;">
                <?php 
								$servername="localhost";
								$username="root";
								$password="";
								$dbname="hope";

								$conn= new mysqli($servername,$username,$password, $dbname);

								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								echo "";

								$sql = "SELECT * FROM donationrequests";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) 
									{   
                                        echo "<hr><br>";
                                        echo "User <span style='color:red'>" .$row["user"]. "</span> needs a donation of Rs. <span style='color:red'>" .$row["Amount"]. "</span> on <span style='color:red'>".$row["Category"]. "</span> in <span style='color:red'>" .$row["Province"]."</span>";
                                        echo "<br>";
                                        echo "Contact : <span style='color:blue'>" .$row["Contact"]. "</span>";
                                        echo "<br>";
                                        echo "NOTES : <span style='color:green'>" .$row["Notes"]. "</span><br><br>";
									}
								} else {
									echo "<font color='red'> Ooops ! No Records ! </font>";
								}
								$conn->close();
						 ?>
                </div>
                <div id="availabledonations" style="display:none;margin-top:15px;background-color:#C0C0C0 ">
                        <?php 
								$servername="localhost";
								$username="root";
								$password="";
								$dbname="hope";

								$conn= new mysqli($servername,$username,$password, $dbname);

								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								echo "";

								$sql = "SELECT * FROM availabledonations";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) 
									{   
                                        echo "<hr><br>";
                                        echo "User <span style='color:red'>" .$row["user"]. "</span> likes to donate Rs. <span style='color:red'>" .$row["Amount"]. "</span> on <span style='color:red'>".$row["Category"]. "</span> in <span style='color:red'>" .$row["Province"]."</span>";
                                        echo "<br>";
                                        echo "Contact : <span style='color:blue'>" .$row["Contact"]. "</span>";
                                        echo "<br>";
                                        echo "NOTES : <span style='color:green'>" .$row["Notes"]. "</span><br><br>";
									}
								} else {
									echo "<font color='red'> Ooops ! No Records ! </font>";
								}
								$conn->close();
						 ?>
                </div>
                <div id="donate" style="display:none;position: relative; min-height: 83vh;background-color:#C0C0C0">
                <div class="forms">
                <form action="php/senddonation.php" method="post">
                    <label>Category</label>
                        <select id="Category" name="Category">
                            <option value="ARTS & CULTURE">ARTS & CULTURE</option>
                            <option value="EDUCATION">EDUCATION</option>
                            <option value="ENVIRONMENT">ENVIRONMENT</option>
                            <option value="ANIMAL & HUMANE">ANIMAL & HUMANE</option>
                            <option value="DISASTER. RELIEF">DISASTER. RELIEF</option>
                            <option value="HEALTH & MEDICAL">HEALTH & MEDICAL</option>
                            <option value="ACTIVE DUTY & VETERANS">ACTIVE DUTY & VETERANS</option>
                            <option value="HUMAN SERVICES">HUMAN SERVICES</option>
                        </select>
                    <br>
                    <label>Amount</label>
                    <input type="text" id="Amount" name="Amount" placeholder="Your Donation Amount">

                    <label>Province</label>
                    <select id="province" name="province">
                            <option value="anywhere ">Any</option>
                            <option value="Southern province">Southern province</option>
                            <option value="Sabaragamuwa province">Sabaragamuwa province</option>                            
                            <option value="Western province">Western province</option>
                            <option value="Uva province">Uva  </option>
                            <option value="Eastern province">Eastern province</option>
                            <option value="Central province">Central province</option>
                            <option value="North-Western province">North-Western province</option>
                            <option value="North-Central province">North-Central province</option>
                            <option value="Northern province">Northern province</option>
                        </select>

                    <label>Contact</label>
                    <input type="text" id="Contact" name="Contact" placeholder="Email Or Telephone">

                    <label>Notes</label>
                    <textarea id="Notes" name="Notes" placeholder="Write something.." style="height:100px;"></textarea>
                    <br>
                    <input style="float:right;margin-right:10%;" type="submit" value="Send My Info">
                </form>
                    </div>
                </div>
                <div id="requestdonation" style="display:none;position: relative; min-height: 83vh;background-color:antiquewhite" >
                <div class="forms">
                        <form action="php/sendrequest.php" method="post">
                            <label>Category</label>
                                <select id="Category" name="Category">
                                    <option value="ARTS & CULTURE">ARTS & CULTURE</option>
                                    <option value="EDUCATION">EDUCATION</option>
                                    <option value="ENVIRONMENT">ENVIRONMENT</option>
                                    <option value="ANIMAL & HUMANE">ANIMAL & HUMANE</option>
                                    <option value="DISASTER. RELIEF">DISASTER. RELIEF</option>
                                    <option value="HEALTH & MEDICAL">HEALTH & MEDICAL</option>
                                    <option value="ACTIVE DUTY & VETERANS">ACTIVE DUTY & VETERANS</option>
                                    <option value="HUMAN SERVICES">HUMAN SERVICES</option>
                                </select>
                            <br>
                            <label>Amount</label>
                            <input type="text" id="Amount" name="Amount" placeholder="Estimated Donation Amount">

                            <label>Province</label>
                            <select id="province" name="province">
                                    <option value="anywhere ">Any</option>
                                    <option value="Southern province">Southern province</option>
                                    <option value="Sabaragamuwa province">Sabaragamuwa province</option>                            
                                    <option value="Western province">Western province</option>
                                    <option value="Uva province">Uva  </option>
                                    <option value="Eastern province">Eastern province</option>
                                    <option value="Central province">Central province</option>
                                    <option value="North-Western province">North-Western province</option>
                                    <option value="North-Central province">North-Central province</option>
                                    <option value="Northern province">Northern province</option>
                                </select>

                            <label>Contact</label>
                            <input type="text" id="Contact" name="Contact" placeholder="Email Or Telephone">

                            <label>Notes</label>
                            <textarea id="Notes" name="Notes" placeholder="Write something.." style="height:100px;"></textarea>
                            <br>
                            <input style="float:right;margin-right:10%;" type="submit" value="Request Donation">
                        </form>
                    </div>
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
