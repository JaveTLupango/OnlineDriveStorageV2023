<style>
    img {
            pointer-events: none;
        }

        .avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 3px solid gray;
        background-color: #e3dada;
        vertical-align: middle;
        margin-bottom: 2%;
        }
        label{
            text-align:center;
        }

        .form-control
        {
            margin-bottom: 1px;
        }
        .card-deck
        {
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .emailClass
        {
            margin-top: 8px;
        }
        .emailClass1
        {
            margin-top: 4px;
        }
        .btnemailClass{
            float:right;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-right: 5px;
        }
        .cardEmail
        {
            border: 2px solid wheat;
            border-radius: 10px;
            height: 100px;
            margin-bottom: 5px;
            margin-top: 10px;
            
        }
        .cardPassword
        {
            border: 2px solid wheat;
            border-radius: 10px;
            height: 150px;
            margin-bottom: 5px;
            margin-top: 10px;
        }
        .btnemailClass1{
            float: left;
            margin-top: 7px;
            margin-left: 5px;
        }
        .row-margin{
            margin-top: 7px;
        }
</style>

<?php
if(isset($_SESSION['userid']))
{
    
    include '../https/Controller/ProfileController.php';
    $C_Profile = new ProfileController();
    $id = $_SESSION['userid'];
    //echo $id;
    $profileRet = $C_Profile->getProfileDetails($conn, $id);

     //echo json_encode($profileRet);

    foreach($profileRet as $row)
            $userProfile = $row['profile'];
            $userFullName = $row['userFullName'];
            $userEmail= $row['email'];
            $tdt= $row['tdt'];
            $udt = $row['udt'];
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile Page</h3>
                </div>
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                    <center> 
                                        <?php 
                                            if($userProfile == null)
                                            {
                                                ?>
                                                 <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-avatar-icon-png-image_313572.jpg" alt="Avatar" class="avatar">
                                                <?php
                                            }else
                                            {
                                                echo '<img src="data:image/jpeg;base64,'. base64_encode($userProfile) .'" alt="Avatar" class="avatar">';
                                            }
                                        ?>
                                    </center>
                            </div>
                            <div class="form-control">
                                <label class="col-3">Name </label>:
                                <label class="col-8"><?php print $userFullName ?></label>
                            </div>
                            <div class="form-control">
                                <label class="col-3">Email </label>:
                                <label class="col-8"><?php print $userEmail ?></label>
                            </div>
                            <div class="form-control">
                                <label class="col-3">Created </label>:
                                <label class="col-8"><?php print $tdt ?></label>
                            </div> 
                            <div class="form-control">
                                <label class="col-3">Last Update </label>:
                                <label class="col-8"><?php print $udt ?></label>
                            </div> 
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="cardEmail">                                
                                <form action="" method="POST">
                                    <div class="card row-margin">
                                        <div class="row">
                                            <label class="col-3 emailClass">Email</label>
                                            <input type="email" class="form-control col-9 emailClass1" value="<?php print $userEmail ?>" name="updateEmail" id="updateEmail" required> 
                                        </div>   
                                    </div>   
                                    <?php                                        
                                        ?>                           
                                <input type="button" name="UpdateEmail" value="Update Email" class="col-6 form-control btn btn-success btnemailClass" disabled>                                 
                                </form>   
                            </div><br>
                            <div class="cardPassword">
                                <div class="card row-margin">
                                    <div class="row">
                                        <label class="col-5 emailClass">Password</label>
                                        <input type="password" class="form-control col-7 emailClass1"> 
                                    </div> 
                                    <div class="row">
                                        <label class="col-5 emailClass">Confirm Password</label>
                                        <input type="password" class="form-control col-7 emailClass1"> 
                                    </div>   
                                </div>
                                <input type="button" name="UpdateEmail" value="Update Password" class="col-4 form-control btn btn-success btnemailClass">
                                <input type="button" name="UpdateEmail" value="Generate Password" class="col-4 form-control btn btn-success btnemailClass1">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                                <?php
                                    $fileAdsName = $url."ads/square.txt";
                                    $file = fopen($fileAdsName, "r");
                                    while(!feof($file)) {
                                      $line = fgets($file);
                                      echo $line . "<br>";
                                    }
                                    fclose($file);
                              ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</section> 

<?php 

}
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Advertisement</h3>
              </div>
              <div class="card-body">                        
                <div class="row">
                    <div class=" col-6">
                            <?php
                                    $fileAdsName = $url."ads/horizontal.txt";
                                    $file = fopen($fileAdsName, "r");
                                    while(!feof($file)) {
                                      $line = fgets($file);
                                      echo $line . "<br>";
                                    }
                                    fclose($file);
                              ?>
                    </div>
                    <div class=" col-6">
                            <?php
                                    $fileAdsName = $url."ads/horizontal.txt";
                                    $file = fopen($fileAdsName, "r");
                                    while(!feof($file)) {
                                      $line = fgets($file);
                                      echo $line . "<br>";
                                    }
                                    fclose($file);
                              ?>
                    </div>
                </div>                   
              </div>
            </div>
          </div>
        </div>
      </div>
</section> 

<script>
var fileDesc = null;
function _(el)
{
    return document.getElementById(el);
}

</script>
