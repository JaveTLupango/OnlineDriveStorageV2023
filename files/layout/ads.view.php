<style>
  img {
    pointer-events: none;
  }

  </style>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vertical Ads</h3>
              </div>              
              <div class="card-deck">
                <div class="card">                  
                  <div class="card-body">  
                    <form action="" method="post">
                            <textarea class="form-control" rows="5" id="comment" name="VerticalAds">
                                <?php
                                    $fileAdsName = $url."ads/vertical.txt";
                                    $fileAdsName = fopen($fileAdsName, "r");
                                    while(!feof($fileAdsName)) {
                                    $line = fgets($fileAdsName);      
                                    echo   $line ;                       
                                    }
                                    fclose($fileAdsName);
                            ?>  
                                </textarea>  <br >
                                <input type="submit" name="Save" class="btn btn-primary" >  
                            <?php
                                if(isset($_POST["VerticalAds"]))
                                {
                                    $myfile = fopen("../ads/vertical.txt", "w") or die("Unable to open file!");
                                    $txt = $_POST["VerticalAds"];
                                    fwrite($myfile, $txt);
                                    fclose($myfile);                                   
                                }
                            ?>
                        </form>
                  </div>
                </div>
                <div class="card">                  
                  <div class="card-body">
                  <?php
                                $fileAdsName = $url."ads/vertical.txt";
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


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Horizontal Ads</h3>
              </div>              
              <div class="card-deck">
                <div class="card">                  
                  <div class="card-body">  
                    <form action="" method="post">
                            <textarea class="form-control" rows="5" id="comment" name="horizontalAds">
                                <?php
                                    $fileAdsName = $url."ads/horizontal.txt";
                                    $fileAdsName = fopen($fileAdsName, "r");
                                    while(!feof($fileAdsName)) {
                                    $line = fgets($fileAdsName);      
                                    echo   $line ;                       
                                    }
                                    fclose($fileAdsName);
                            ?>  
                                </textarea>  <br >
                                <input type="submit" name="Save" class="btn btn-primary" >  
                            <?php
                                if(isset($_POST["horizontalAds"]))
                                {
                                    $myfile = fopen("../ads/horizontal.txt", "w") or die("Unable to open file!");
                                    $txt = $_POST["horizontalAds"];
                                    fwrite($myfile, $txt);
                                    fclose($myfile);                                   
                                }
                            ?>
                        </form>
                  </div>
                </div>
                <div class="card">                  
                  <div class="card-body">
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


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Square Ads</h3>
              </div>              
              <div class="card-deck">
                <div class="card">                  
                  <div class="card-body">  
                    <form action="" method="post">
                            <textarea class="form-control" rows="5" id="comment" name="squareAds">
                                <?php
                                    $fileAdsName = $url."ads/square.txt";
                                    $fileAdsName = fopen($fileAdsName, "r");
                                    while(!feof($fileAdsName)) {
                                    $line = fgets($fileAdsName);      
                                    echo   $line ;                       
                                    }
                                    fclose($fileAdsName);
                            ?>  
                                </textarea>  <br >
                                <input type="submit" name="Save" class="btn btn-primary" >  
                            <?php
                                if(isset($_POST["squareAds"]))
                                {
                                    $myfile = fopen("../ads/square.txt", "w") or die("Unable to open file!");
                                    $txt = $_POST["squareAds"];
                                    fwrite($myfile, $txt);
                                    fclose($myfile);                                   
                                }
                            ?>
                        </form>
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

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>