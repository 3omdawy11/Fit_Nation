<?php
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header('Location: adminlogin.php');
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/admin.css" />
  <style></style>
  <script>
    function showFrame(url) {
      var iframe = document.getElementById("frame");
      iframe.src = url;
      iframe.style.display = "block";
    }
  </script>
</head>

<body>
  <div>
    <nav id="navbar">
      <ul>
        <li>
          <button class="btn">ADD</button>
          <div class="dropdown">
            <button class="btn">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="addadminpage.php" onclick="showFrame('addadminpage.php')" target="IFRAME">Admin</a>
              <a href="addgym.html" onclick="showFrame('addgym.html')" target="IFRAME">Gym</a>
            </div>
          </div>
        </li>
        <li>
          <button class="btn">VIEW</button>
          <div class="dropdown">
            <button class="btn">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="DB/connections/viewadmin.php" onclick="showFrame('viewadmin.php')" target="IFRAME">
                Admin</a>
              <a href="DB/connections/viewgym.php" onclick="showFrame('viewgym.php')" target="IFRAME">
                Gym</a>
              <a href="DB/connections/viewuser.php" onclick="showFrame('viewuser.php')" target="IFRAME">
                User</a>
            </div>
          </div>
        </li>
        <li>
          <button class="btn">Remove</button>
          <div class="dropdown">
            <button class="btn">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="DB/connections/deleteadmin.php" onclick="showFrame('deleteadmin.php')" target="IFRAME">
                Admin</a>
              <a href="DB/connections/deletegym.php" onclick="showFrame('deletegym.php')" target="IFRAME">
                Gym</a>
              <a href="DB/connections/deleteuser.php" onclick="showFrame('deleteuser.php')" target="IFRAME">
                User</a>
            </div>
          </div>
        </li>

        <li>
          <button class="btn">Search</button>
          <div class="dropdown">
            <button class="btn">
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="DB/connections/searchadmin.php" onclick="showFrame('DB/connections/searchadmin.php')" target="IFRAME">
                Admin</a>
              <a href="DB/connections/searchgym.php" onclick="showFrame('searchgym.php')" target="IFRAME">
                Gym</a>
              <a href="DB/connections/searchuser.php" onclick="showFrame('searchuser.php')" target="IFRAME">
                User</a>
            </div>
          </div>
        </li>
        <li>
          <a href="admin_logout.php"><button class="btn">Sign out</button></a>
        </li>
      </ul>
    </nav>
    <iframe src="" id="frame" name="IFRAME"></iframe>
  </div>
</body>
<script>
  window.addEventListener("scroll", function() {
    var navbar = document.getElementById("navbar");

    if (window.scrollY > 0) {
      navbar.style.backgroundColor = "black"; // Change background color on scroll
    } else {
      navbar.style.backgroundColor = "transparent"; // Reset to transparent if scrolled to the top
    }
  });
</script>

</html>