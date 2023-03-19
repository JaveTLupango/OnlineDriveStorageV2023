<center> 
    <?php
                                    $fileAdsName = $url."ads/horizontal.txt";
                                    $fileAdsName = fopen($fileAdsName, "r");
                                    while(!feof($fileAdsName)) {
                                    $line = fgets($fileAdsName);      
                                    echo   $line ;                       
                                    }
                                    fclose($fileAdsName);
                            ?>  
</center>
<div class="card">
    <div class="card-body register-card-body" id="RegisterSuccess">  
        <button class="btn btn-success mb-3 form-control">Success!</button> 
                      <button type="button" class="btn btn-outline-info mb-3 form-control" style=" height: 100%; ">
                      System Generated Email. Use it to Verify your Email.
                      </button> 
                      <a href="../">Back to Homepage</a> 
                      <a href="login" style="float:right;">Go to Login</a>
    </div>            
  </div><!-- /.card -->
  <center> <?php
                                    $fileAdsName = $url."ads/horizontal.txt";
                                    $fileAdsName = fopen($fileAdsName, "r");
                                    while(!feof($fileAdsName)) {
                                    $line = fgets($fileAdsName);      
                                    echo   $line ;                       
                                    }
                                    fclose($fileAdsName);
                            ?>  
</center>