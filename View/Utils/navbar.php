<div class="navbar-item-logo navbar-logo">
  <div class="navbar-box">
    <div class="navbar-menu">
      <a href="#link"></a>
      <div class="menu-pic">
        <img alt="an image here">
      </div>
    </div>
  </div>
</div>
<div class="navbar-item">
    <div class="navbar-box">
        <div class="navbar-menu">
        <a id="dashboard" data-user=<?php echo $_SESSION['user']?> href="../Utils/dashboard.php?userid=<?php echo $_SESSION['user']?>">
        <div class="menu-pic">
            <img alt="dashboard" src="../../assets/icons/strategy.png">
        </div>
        <div class="menu-name">
            Dashboard
        </div>
        </a>
        </div>
    </div>
</div>