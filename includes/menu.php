<?php if(logged_in() != true){?> 

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
     <a href="index.php"><img src="images/logo.png" height="50" id="logo"></a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">

        <button class="btn login-button" id="login">login</button>
  
    
      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php }else{?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a href="index.php"><img src="images/logo.png" height="50" id="logo"></a>
<div class="right-inner-addon ">
<span class="glyphicon glyphicon-search"></span>
     <form action="search.php" method="get" role="form">
        <div class="form-group">
          <input type="text" id="search" class="form-control" name="keywords" autocomplete="off">
        </div>
      </form>
</div>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">

        <li><a href="add_bookmark.php" id="add_bookmark"><span class="glyphicon glyphicon-plus"</span></a></li>

        <li><a href="#" id="notifications"><span class="glyphicon glyphicon-envelope"</span></a></li>

       

           <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 

                <div class="crop">

                  <?php if (empty($user_data['profile']) === false){ 
                      echo '<img class="img img-responsive img-circle" src="', $user_data['profile'], '" alt="', $user_data['first_name'], '\'s Profile Image">';
                    }else{
                      echo '<img class="img img-responsive img-circle" src="images/placeholder-img.jpg" alt="', $user_data['first_name'], '\'s Profile Image">';

                      }
                  ?>

                </div>
              </a>
            
            <ul class="dropdown-menu" role="menu">
        
            <li><a href="settings.php">Settings</a></li>
            <li><a href="/lr/<?php echo $user_data['first_name'];?>">Profile</a></li>
            <li><a href="finder.php">Find People</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Log out</a></li>
          </li>
          </ul>

          </li>
      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php }?>