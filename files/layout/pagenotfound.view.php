<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Page Not Found</h3>
              </div>
              <div class="card-body">
                   <div class=" col-4">
                        <div class="thumbnail thumbnail-downloadimage">
                        <img src="https://nsw.md.go.th/mdpilotinfo/img/jisunpark_404-error.gif">
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
                   <div class=" col-12">
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
      </div>
</section> 