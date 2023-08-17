<?php 
	$searchfor = (isset($_GET['searchfor']) && $_GET['searchfor'] != '') ? $_GET['searchfor'] : '';
	
?>
<style type="text/css">
	/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content {
	padding: 30px;
	min-height: 500px;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
} 
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
 
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-body {
    display: block;
    /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}
</style>
 
  <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo web_root; ?>plugins/jobportal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Hirring</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hirring</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section bg-light">
            <div class="container">
    
                <div class="row">
								<?php 


								 $search = isset($_POST['SEARCH']) ? ($_POST['SEARCH']!='') ? $_POST['SEARCH'] : 'All' : 'All';
								 $company = isset($_POST['COMPANY']) ? ($_POST['COMPANY']!='') ? $_POST['COMPANY'] : 'All' : 'All';
								 $category = isset($_POST['CATEGORY']) ? ($_POST['CATEGORY']!='') ? $_POST['CATEGORY'] : 'All' : 'All';

								switch ($searchfor) {
									case 'bycompany':
										# code...
									echo 'Result : '  . $search . ' | Company : ' . $company;
										break;
									case 'advancesearch':
										# code... 
									echo 'Result : '  . $search . ' | Company : ' . $company . ' | Function : ' . $category; 
									    break;
									case 'byfunction':
										# code... 
									echo 'Result : '  . $search . ' | Function : ' . $category; 
									    break;

									case 'bytitle':
										# code... 
									echo 'Result : '  . $search; 
									    break;
									
									default:
										# code...
										break;
								}


								?>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<?php 

									 $search = isset($_POST['SEARCH']) ? $_POST['SEARCH'] : '';
									 $company = isset($_POST['COMPANY']) ? $_POST['COMPANY'] : '';
									 $category = isset($_POST['CATEGORY']) ? $_POST['CATEGORY'] : '';

										$sql = "SELECT * FROM `tbljob` j, `tblcompany` c 
										WHERE j.`COMPANYID`=c.`COMPANYID` AND COMPANYNAME LIKE '%{$company}%' AND CATEGORY LIKE '%{$category}%' AND (`OCCUPATIONTITLE` LIKE '%{$search}%' OR `JOBDESCRIPTION` LIKE '%{$search}%' OR `QUALIFICATION_WORKEXPERIENCE` LIKE '%{$search}%')";
										$mydb->setQuery($sql);
										$cur = $mydb->executeQuery();
										$maxrow = $mydb->num_rows($cur);

										if ($maxrow > 0) {
											# code... 
										$res = $mydb->loadResultList();
										foreach ($res as $row) { 
									?>
				 


<div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3"><?php echo $row->OCCUPATIONTITLE ?></h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3"><?php echo $row->CATEGORY ?></span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row->COMPANYNAME ?></a></div>
                  <div><span class="icon-my_location"></span> <span><?php echo $row->COMPANYADDRESS ?></span></div>
                </div>
              </div>

              <div class="ml-auto d-flex">
                <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $row->JOBID;?>&view=personalinfo" class="btn btn-primary py-2 mr-1">Apply Job</a>
              
              </div>
            </div>
          </div><!-- end -->



								<?php } }else {
									echo '<tr><td>No result found!.....</td></tr>';

								}?>
								 
					 
			</div>
		</section> 