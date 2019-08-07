

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/loginsignup.css" />
</head>
<body>
<div class=btn_con>
<button class="buttonlog" onclick="opensigForm();closeForm();">Signup</button>
<button class="buttonlog" onclick="openForm() ; closesigForm();">Login</button>
<button class="buttonlog" onclick="window.location.href='about.html'">About us</button>
<button class="buttonlog" onclick="window.location.href='index.php'">Back</button>
</div>
<div class="form-popup" id="myForm">
  <form action="php/login.php" method="POST" class="box">
    <h1>Login</h1>

    <div class="inputbox">
        <input type="text" name="uname" required="" pattern=".{5,}" title="Username must have five or more characters">
        <label>Username</label>
    </div>
    <div class="inputbox">
        <input type="password" name="password" required="" pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters">
        <label>Password</label>
    </div>
    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


<div class="form-popup" id="sigForm">
  <form action="php/signup.php" class="box" method="POST">
    <h1>Sign up</h1>
                   <div class="inputbox">
                       <input type="text" name="firstname" required pattern=".{3,}" title="First name nus havr Three or more characters">
                       <label>First name</label>
                   </div>
                   <div class="inputbox">
                       <input type="text" name="lastname" required pattern=".{3,}" title="Last name must have Three or more characters">
                       <label>Last name</label>
                   </div>
                   <div class="inputbox">
                       <input type="text" name="email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                       <label>Email</label>
                   </div>
                   <div class="inputbox">
                       <input type="text" name="Username" required pattern=".{5,}" title="Username must have five or more characters">
                       <label>Username</label>
                   </div>
                   <div class="inputbox">
                       <input type="Password" name="password" id="password" required pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters">
                       <label>Password</label>
                   </div>
                   <div class="inputbox">
                       <input type="Password" name="confirm_password" id="confirm_password" required pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters">
                       <label>Retype Password</label>
                   </div>
				   <div>
				   <span id='message'></span>
				   </div>
				   
				   <script>
						var password = document.getElementById("password")
						  , confirm_password = document.getElementById("confirm_password");

						function validatePassword(){
						  if(password.value != confirm_password.value) {
							confirm_password.setCustomValidity("Passwords Don't Match");
						  } else {
							confirm_password.setCustomValidity('');
						  }
						}

						password.onchange = validatePassword;
						confirm_password.onkeyup = validatePassword;
				   </script>
 
                   <button type="submit" name="btnsin" class="btn">Signup</button>
       <button type="button" class="btn cancel" onclick="closesigForm()">Close</button>
                </form>
                            

  </div>


<script>
function opensigForm() {
  document.getElementById("sigForm").style.display = "block";
}

function closesigForm() {
  document.getElementById("sigForm").style.display = "none";
}
</script>

</body>
</html>
