<?php require_once 'core/init.php'; ?>

<div role="navigation" class="navbar navbar-default navbar-static-top" style="margin: 0;">
  <div class="container">
    <div class="navbar-header">
      <!-- button when the window is phone  -->
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="login.php" class="navbar-brand"><i class="fa fa-comment"></i> ChatBox </a>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav"> 
      <?php  if( is_logged_in() ): ?>
        <li class=""><a href="logout.php">logout</a></li>
      <?php else: ?>
        <li class=""><a href="login.php">login</a></li>
      <?php endif; ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>