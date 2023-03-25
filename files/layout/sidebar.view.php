<?php 
if(isset($_SESSION['userid']))
{
  $sql = "SELECT sum(filesize) as filesize FROM `file_server` WHERE userid = '".$_SESSION['userid']."'";
  $totalbit = $C_FIC->getUserTotalFileUpdateSize($conn, $sql, "filesize");
  $totalSizeString = $C_FIC->FileSizeValidator($totalbit);

  $gb20 = 1050625000 * 10;
  $pec = ((100 * $totalbit) / $gb20);
  $remainingFreeStorage = $gb20 - $totalbit;
  
  $asidebar = '<aside class="main-sidebar sidebar-dark-primary elevation-4">'.
  '<a href="" class="brand-link">'.
  '<img src="'.$url.'file_server/logo/edrive.png"'.
       'alt="AdminLTE Logo"'.
       'class="brand-image img-circle elevation-3"'.
       'style="opacity: .8">'.
  '<span class="brand-text font-weight-light"> '.$system_name.'</span>'.
'</a>'.
' <div class="sidebar">'.
'<div class="user-panel mt-3 pb-3 mb-3 d-flex">'.
  '<div class="image">'.
    '<img src="'.$url.'assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">'.
  '</div>'.
  '<div class="info">'.
    '<a href="'. $url.'file_uploads/profile" class="d-block">'
    .$C_FIC->getUserTotalFileUpdateSize($conn, "Select userFullName FROM file_users WHERE userid = '".$_SESSION['userid']."'", "userFullName").
    '</a>'.
  '</div>'.
'</div>'. 
'<nav class="mt-2">'.
'<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
echo $asidebar;
?>
<!-- Sidebar Menu -->      
<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-item has-treeview">
  <a href="<?php echo $url.'file_uploads/file'?>" class="nav-link">
    <i class="nav-icon fas fa-folder"></i>
    <p>
      My Files
    </p>
  </a>
</li>
<li class="nav-item has-treeview">
  <a href="<?php echo $url.'file_uploads/uploadfiles'?>" class="nav-link">
    <i class="nav-icon fas fa-upload"></i>
    <p>
      Upload Files
    </p>
  </a>
</li>
<li class="nav-item has-treeview">
  <a href="<?php echo $url.'file_uploads/trash'?>" class="nav-link">
    <i class="nav-icon fas fa-trash"></i>
    <p>
      Trash file
    </p>
  </a>
</li>
<?php
    $varUserType = $C_FIC->getUserTotalFileUpdateSize($conn, "Select usertype FROM file_users WHERE userid = '".$_SESSION['userid']."'", "usertype");
    if($varUserType == 1)
    { ?>
        <li class="nav-item has-treeview">
        <a href="<?php echo $url.'file_uploads/ads'?>" class="nav-link">
          <i class="nav-icon fas fa-trash"></i>
          <p>
            Ads Settings
          </p>
        </a>
      </li>
<?php
    }
?>
<!-- 
<li class="user-panel nav-item has-treeview">
  <a href="<?php echo $url.'file_uploads/settings'?>" class="nav-link">
    <i class="nav-icon fas fa-cog"></i>
    <p>
      Settings
    </p>
  </a>
</li>
<li class="user-panel nav-item has-treeview">
  <a href="upgradestorage" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
      Upgrade Storage
    </p>
  </a>
</li> -->

<li class="user-panel nav-item has-treeview">
  <a href="<?php echo $url.'logout.php'?>" class="nav-link">
    <i class="nav-icon fas fa-user"></i>
    <p>
      Logout
    </p>
  </a>
</li>

<li class="user-panel nav-item has-treeview">
  <a class="nav-link">
    <i class="nav-icon fas fa-server"></i>
      <progress min="0" max="100" value="<?php echo $pec; ?>"></progress><br/>
      <center><label><?php echo $totalSizeString; ?> / 10GB</label></center>
  </a>
</li>  
<?php
echo ' </ul>';

include("../ads/vertical.txt");

echo '</nav> </div>     </aside>';

}
else
{ ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="" class="brand-link"><img src="<?php print $url. 'file_server/logo/edrive.png' ?>"alt="AdminLTE Logo"class="brand-image img-circle elevation-3"style="opacity: .8">
  <span class="brand-text font-weight-light"><?php echo $system_name ?></span></a> <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image"><img src="https://www.pinclipart.com/picdir/middle/200-2008697_account-customer-login-man-user-icon-login-icon.png" class="img-circle elevation-2" alt="User Image">
    </div>
      <div class="info">
        <a href="<?php echo $url.'file_uploads/login'?>" class="d-block">Login</a>
     </div>  
     <div class="info">
        <a href="#" class="d-block">OR</a>
     </div> 
     <div class="info">
        <a href="<?php echo $url.'file_uploads/register'?>" class="d-block">Register</a>
     </div>
  </div>
  <nav class="mt-2"><ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">      <!-- Sidebar Menu -->      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo $url.'file_uploads/register'?>" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Get Free 10GB Storage
              </p>
            </a>
          </li>
       </ul>  
          <ul>
          <?php 
          
include("../ads/vertical.txt");
          ?>
          </ul>
        </nav> </div>     </aside> 
<?php
}