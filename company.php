    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo web_root; ?>plugins/jobportal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Company</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Company</h1>
          </div>
        </div>
      </div>
    </div>



    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">

            <?php 
                  $sql = "SELECT * FROM `tblcompany`";
                  $mydb->setQuery($sql);
                  $comp = $mydb->loadResultList(); 

                  foreach ($comp as $company ) { 
            ?>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch"> 
              <a href="<?php echo web_root.'index.php?q=hiring&search='.$company->COMPANYNAME; ?>" class="block-20" style="background-image: url('https://pngriver.com/wp-content/uploads/2017/11/city-buildings-png-transparent-images-clipart-icons-pngriver-download-free-skyscraper-clipart-transparent-building-6.png');">
              </a>
              <div class="text mt-3">
                <div class="meta mb-2">
                  <div><a href="#">December 2, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="<?php echo web_root.'index.php?q=hiring&search='.$company->COMPANYNAME; ?>"><?php echo $company->COMPANYNAME;  ?></a></h3>
                <p>Address :<?php echo $company->COMPANYADDRESS;?></p>
                            <p>Contact No. :<?php echo $company->COMPANYCONTACTNO;?></p>
              </div>
            </div>
          </div> 

 <?php } ?>
          </div>
        </div>
<!--         <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>
    </section>
   