<?php include 'includes/config.php'?>
<?php include 'includes/planets.php'?>
<?php $config->hero .= rotate($planets);?>
<?php get_header()?>


        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Current Value: 
          <strong>Bitcoin</strong>
        </h2>
        <hr class="divider">
        <div class="row">
          <div class="col-lg-6">
           <p>You can donate Bitcoin (BTC) to me here:<br><br>
              <b>1C4bHG91NFge6nMwF27xA6yCcBYz29TM7c</b>
               <img src="images/POSTriskBTC2.png" alt="QR"  />
              </p>
          </div>
          <div class="col-lg-6">
            
 <div id="hitbtc-ticker" class="hit-big" data-hue="-171" data-refId="5a20abce5c4df"></div>
<script type="text/javascript">
    (function() {
        var po = document.createElement("script");
        po.type = "text/javascript";
        po.async = true;
        po.src = "https://hitbtc.com/get_widget?pair=btcusd";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(po, s);
    })();
     // You can construct widget dynamically by calling hitbtc.widget("myDiv", "big", -171, "btcusd", "5a20abce5c4df");
</script>

          </div>
        </div>
      </div>

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">My Address<br>
          <strong>1C4bHG91NFge6nMwF27xA6yCcBYz29TM7c</strong>
        </h2>
        <hr class="divider">
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card h-100">
              <img class="card-img-top" src="http://placehold.it/750x450" alt="">
              <div class="card-body text-center">
                <h4 class="card-title m-0">John Smith
                  <small class="text-muted">Job Title</small>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card h-100">
              <img class="card-img-top" src="http://placehold.it/750x450" alt="">
              <div class="card-body text-center">
                <h4 class="card-title m-0">John Smith
                  <small class="text-muted">Job Title</small>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <img class="card-img-top" src="http://placehold.it/750x450" alt="">
              <div class="card-body text-center">
                <h4 class="card-title m-0">John Smith
                  <small class="text-muted">Job Title</small>
                </h4>
              </div>
            </div>
          </div>
        </div>
<?php 

get_footer();
