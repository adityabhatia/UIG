<?php 
session_start();
if($_SESSION['username']==""){
?>
<script>window.location.href = "login.php";</script>
<?php
}
global $user;
$user = $_SESSION['username'];
echo "Hello user " .$user;
echo "  <a href='logout.php'>Logout</a>";
?>

<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
	
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home">Home</a></li>
  <li><a href="#profile">Profile</a></li>
  <li><a href="#messages">Messages</a></li>
</ul>

    <div id='content' class="tab-content">
      <div class="tab-pane active" id="home">
        <ul>
            <li>home</li>
            <li>home</li>
        </ul>
      </div>
      <div class="tab-pane" id="profile">
        <ul>
            <li>profile</li>
            <li>profile</li>
        </ul>
      </div>
      <div class="tab-pane" id="messages">
	  Your password is <?php echo ($_SESSION['password']);?>
      </div>
      <div class="tab-pane" id="settings"></div>
    </div> 

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
