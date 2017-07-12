<!DOCTYPE html>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- css file -->
  <link rel="stylesheet" type="text/css" href="style_1.css">
<style>
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</style>
  <!-- jQuery -->
  <script type="text/javascript">

jQuery(document).ready(function(){

/*Error Message Right Side*/
jQuery("div.help-block").css({"color":"red"}).addClass("text-right");

      /*MobileNumber Validation*/
jQuery("input[name='MobileRecharge[service]']").change(function(){
        var checked_mobile_radio=jQuery(this).val();
        if(checked_mobile_radio=='prepaid'){
          jQuery("#button-mobile-recharge").html("Recharge Now");
        } else
          jQuery("#button-mobile-recharge").html("Pay Now");
        });
        

        
      /*Datacard Validations*/
      jQuery("input[name='DataCardRecharge[service]']").change(function(){
        var checked_datacard_radio=jQuery(this).val();

        if(checked_datacard_radio=='prepaid'){
          jQuery("#button-datacard-recharge").html("Recharge Now");
        } else{
         jQuery("#button-datacard-recharge").html("Pay Now");
        }
        
      });

      /*Datacard Mobile Number Validation*/

      /*Date Pickers*/

      /*Bus Date Picker*/
      $( function() {
    $( ".bus_date" ).datepicker();
  } );
      /*Date Pickers End*/
      });


    
  </script>
  
</head>
<script>
	$(document).ready(function () 
	{ 
	$("#myForm_signup").on('submit',(function(e) 
		{	
		alert("form");
		
			
			e.preventDefault();  
			
			$.post("ajax_registration.php",$("#myForm_signup").serialize(),function(output,status){
			 
			  alert(output);
			});
			
			
		}));
	
	

});

</script>

<script>
	$(document).ready(function () 
	{ 
	
	$("#myForm_Signin").on('submit',(function(e) 
		{	
		alert("form");
		
		var x=document.getElementById('signin_emailid').value;
		var y=document.getElementById('pwd').value;
	
			e.preventDefault();  
			//$.post("ajax_SignIn_registration.php",$("#myForm_Signin").serialize(),function(output,status){
			// $.post("ajax_SignIn_registration.php",{id:x,ids:y},function(result){
				// alert(result);
			 
			// });
			
				$.post("ajax_SignIn_registration.php",$("#myForm_Signin").serialize(),function(output,status){
			  alert(output);
			   $("#myModal").modal('hide');
			});

		}));

	});

</script>
<title>
<?php echo $name;?>
</title>
<body>
<!-- Header Section -->
<header>
      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header_Block">
        <span style="font-size: 30px;">LOGO</span>
	<?php
	session_start();
	
	
		if (!empty($_SESSION['signup_user_id'])){
			include '../config/config.php';
			
			 
echo '<div class="dropdown pull-right">
  <i class="pull-right glyphicon glyphicon-user user_icon"></i><br>'.$_SESSION['signup_user_name'].'<div class="dropdown-content">
    <a href="../config/logout.php">Logout</a>
  </div>
</div>';
  
		}
		else{
			
			echo '<i class="pull-right glyphicon glyphicon-user user_icon" data-toggle="modal" data-target="#myModal" ></i>';
		}
?>
<?php 
	include '../config/config.php';
  $sql =$conn->prepare('select * from User_wallet where signup_user_ids=?');
			  $sql->bindParam(1,$_SESSION['signup_user_id']);
			 
			 
			 
		if($sql->execute())
				 {
 while($row=$sql->fetch(PDO::FETCH_OBJ))
 {
		$amount=$row->amount;
?>		
       <p>Wallet<?php echo $amount;?><span class="glyphicon glyphicon-shopping-cart"></span></p>    
		<?php 
     
	   }} ?>
	  
     
	  
	 
	  
</header>
<!-- Login Model -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">welcome</h4>
        </div>
        <div class="modal-body">
         <div class="container">
  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#signin">SignIn</a></li>
    <li><a data-toggle="pill" href="#signup">SignUp</a></li>
  </ul>
  <div class="tab-content">

  <!-- SignIn form -->
    <div id="signin" class="tab-pane fade in active signin">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <form name="myForm_Signin" id="myForm_Signin">
            <div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2">@</span>
  <input type="text" class="form-control" placeholder="EmailID" aria-describedby="sizing-addon2" name="signin_emailid" id="signin_emailid">
</div><br>
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock">
            </i></span>
  <input type="password" class="form-control" placeholder="password" aria-describedby="sizing-addon2" name="pwd" id="pwd">
</div><br>
            <!--div class="form-group input-group col-lg-4">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="Password" name="password" type="password" name="pwd" id="pwd">
        </div-->
            <div class="form-group">
           
            <input type="reset" id="user_signin_cancel" value="Reset" class="btn btn-primary" id="signin_btn">
              <input type="submit" id="user_signin_btn" value="SignIn" class="btn btn-success">
            </div>
            <div>
              <a data-toggle="pill" href="#forgot">Forgot Password?</a>
            </div>
             <div>
              <a data-toggle="pill" href="#change_pwd">Change Password?</a>
            </div>
            <div>
              <a href="#">SingnIn With Google Apps</a>
            </div>
          </form>
          </div>
    </div>
	
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="toSignIn"></a>

        
	</div>	
</body>

</html>
    <!-- SignIn Form End -->

    <!-- SignUp Form -->
    <div id="signup" class="tab-pane fade">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <form name="myForm_signup" id="myForm_signup">
            <div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-user">
            </i></span>
  <input type="text" class="form-control" placeholder="Enter UserName" aria-describedby="sizing-addon2" name="signup_user_name" id="signup_user_name">
</div><br>
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2">@</span>
  <input type="text" class="form-control" placeholder="Enter EmailID" aria-describedby="sizing-addon2" name="signup_user_email" id="signup_user_email">
</div><br>
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-phone">
            </i></span>
  <input type="text" class="form-control" placeholder="Enter PhoneNumber" aria-describedby="sizing-addon2" name="signup_user_phoneNo" id="signup_user_phoneNo">
</div><br>
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock">
            </i></span>
  <input type="password" class="form-control" placeholder="Enter Password" aria-describedby="sizing-addon2" name="signup_user_pwd" id="signup_user_pwd">
</div><br>
            <div class="form-group input-group col-lg-4">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="Enter ConfirmPassword" type="password" value="" name="signup_user_confirm_pwd" id="signup_user_confirm_pwd">
        </div>
            <div class="form-group">
           
            <input type="reset" id="user_signup_cancel" value="Reset" class="btn btn-primary">
              <input type="submit" id="user_signup_btn" value="Submit" class="btn btn-success">
            </div>
          </form>
          </div>
    </div>
  <!-- SignUp form End -->

  <!-- Forgot Form -->
  <div id="forgot" class="tab-pane fade">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <form name="myForm_forgot">
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2">@</span>
  <input type="text" class="form-control" placeholder="Enter EmailID" aria-describedby="sizing-addon2" name="signup_user_email" id="forgot_user_email">
</div><br>
            <div class="form-group">
              <input type="submit" id="user_signup_btn" value="Proceed" class="btn btn-info">
            </div>
          </form>
          </div>
    </div>
    <!-- Forgot Form End -->

    <!-- Change Password -->
    <div id="change_pwd" class="tab-pane fade">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <form name="myForm_change_pwd">
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2">@</span>
  <input type="text" class="form-control" placeholder="Enter EmailID" aria-describedby="sizing-addon2" id="change_pwd_email">
</div><br>
<div class="from-group input-group col-lg-4">
  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock">
            </i></span>
  <input type="password" class="form-control" placeholder="NewPassword" aria-describedby="sizing-addon2" id="change_pwd">
</div><br>
            <div class="form-group input-group col-lg-4">
          <span class="input-group-addon">
            <i class="glyphicon glyphicon-lock">
            </i>
          </span>
          <input class="form-control" placeholder="ReEnter NewPassword" type="password" value="" id="reenter_change_pwd">
        </div>
            <div class="form-group">
           
            <input type="reset" id="change_pwd_cancel" value="Reset" class="btn btn-primary">
              <input type="submit" id="change_pwd_btn" value="Confirm" class="btn btn-success">
            </div>
          </form>
          </div>
    </div>
<!-- Change Password End -->
</div>
</div>
        </div>
        </div>
      
    </div>
  </div>
<!-- Login model end -->
<!-- Header Section End -->

 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 menu_Block" style="padding-top: 20px;">
 <nav class="navbar">   
    <ul class="navBar">
                  <li class="active col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" href="#mobile" title="Mobile">&nbsp;
                    <i class="glyphicon glyphicon-phone menu_icons" ></i>
                  Mobile</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#electricity" title="Electricity">&nbsp;&nbsp;&nbsp;
                    <i class="glyphicon glyphicon-flash menu_icons" ></i>Electricity</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#dth" title="DTH">&nbsp;
                    <i class="glyphicon glyphicon-cloud menu_icons" ></i>&nbsp;DTH</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#landline" title="Landline">&nbsp;&nbsp;
                    <i class="glyphicon glyphicon-phone-alt menu_icons" ></i>Landline</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#datacard" title="Datacard">&nbsp;&nbsp;&nbsp;
                    <i class="glyphicon glyphicon-tags menu_icons" ></i>Datacard</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#bus" title="Bus">&nbsp;
                    <i class="glyphicon glyphicon-map-marker menu_icons" ></i>&nbsp;&nbsp;Bus</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#gas" title="Gas">&nbsp;
                    <i class="glyphicon glyphicon-fire menu_icons" ></i>&nbsp;&nbsp;Gas</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#broadband" title="Broadband">&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="glyphicon glyphicon-globe menu_icons" ></i>Broadband</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#hotel" title="Hotel">&nbsp;
                    <i class="glyphicon glyphicon-cutlery menu_icons"></i>&nbsp;Hotel</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#flight" title="Flight">&nbsp;
                    <i class="glyphicon glyphicon-plane menu_icons" ></i>&nbsp;Flight</a></li>
                  <li class="col-md-1 col-lg-1 col-sm-3 col-xs-4"><a data-toggle="tab" role="tab" href="#movie" title="Movies">&nbsp;
                    <i class="glyphicon glyphicon-sunglasses menu_icons" ></i>Movies</a></li>
                  
                <li role="presentation" class="col-md-1 col-lg-1 col-sm-3 col-xs-4 dropdown">
                    <a data-toggle="tab" role="tab" title="More" href="#more" class="dropbtn">&nbsp;
                    <i class="glyphicon glyphicon-option-horizontal menu_icons"></i>
                       &nbsp;More
                    </a>
                <ul class="dropdown-content">
                  <li><a data-toggle="tab" role="tab" href="#moneytransfer" title="MoneyTransfer">&nbsp;
                    <i class="glyphicon glyphicon-transfer"></i>&nbsp;&nbsp;Money Transfer</a></li>
                  <li><a data-toggle="tab" role="tab" href="#irctc" title="IRCTC">&nbsp;
                    <i class="glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;IRCTC&nbsp;</a></li>
                  <li><a data-toggle="tab" role="tab" href="#insurance" title="Insurance">&nbsp;
                    <i class="  glyphicon glyphicon-briefcase"></i>&nbsp;&nbsp;Insurance</a></li>
                </ul>
                </li>
              

             </ul>
</nav>

        <!-- Form Section -->
        <section>
          <div class="">
          <div class="col-md-12 col-md-offset-0.5 form_Block">
            
                <div class="tab-content">

                <!-- Mobile -->
                  <div id="mobile" class="tab-pane fade in active">
                    <div role="tabpanel" class="tab-pane fade in active" id="mobile">

    <form id="form-mobile-recharge" action="formbe.php" method="post">
     
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <div class="form-group">
                <div class="col-md-offset-1">
				<p id="sample"></p>
                    <input class="recharge_mode" id="mobprepaid" type="radio" name="MobileRecharge[service]" value="prepaid" checked>
                    <label for="mobprepaid" class="mobile_radio_label">Prepaid</label>
                    <input class="recharge_mode" id="monbpostpaid" type="radio" name="MobileRecharge[service]" value="postpaid">
                    <label for="monbpostpaid" class="mobile_radio_label">Postpaid</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
    
            </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">                    
            <div class="field-mobilerecharge-service_number required">
      <div class="input-group">
      <span class="input-group-addon">+91</span>
      <input type="text" id="mobilerecharge-service_number" class="form-control integerOnly nozero checkNumber" name="MobileRecharge[service_number]" minlength="10" maxlength="10" placeholder="Enter Mobile No." data-number="mobile no." autocomplete="off">
      </div>
      <div class="help-block mobile_number_error"></div>
      </div>                  
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-mobilerecharge-operator required">
          <select id="mobilerecharge-operator" class="form-control  with-arrow" name="MobileRecharge[operator]">
          <option value="">Select Operator</option>
          <option value="AIRC">Aircel</option>
          <option value="AIRTFTT">Airtel</option>
          <option value="BSNL">BSNL</option>
          <option value="IDEA">Idea</option>
          <option value="MTNL">MTNL</option>
          <option value="MTS">MTS</option>
          <option value="RELG">Reliance GSM</option>
          <option value="T24">T24</option>
          <option value="DOCO">TATA Docomo</option>
          <option value="INDI">Tata Indicom</option>
          <option value="UNIN">Uninor</option>
          <option value="VIDEOCON">Videocon</option>
          <option value="VODA">Vodafone</option>
          </select>
          <div class="help-block mobile_operator_error"></div>
          </div>                
        </div>
                
            </div>
           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group operator-name">
                       <div class="field-mobilerecharge-amount required">
            <div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="mobilerecharge-amount" class="form-control integerOnly nozero" name="MobileRecharge[amount]" maxlength="5" placeholder="Enter Amount"></div><div class="help-block amount_error"></div>
            </div>                
            </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="mb_recharge_sub_container">
                <button type="submit" id="button-mobile-recharge" class="btn btn-primary btn-block">Recharge Now</button>      
                </div>
        </div>
    </form>
    </div>
</div>
<!-- Mobile End -->

    <!-- Electricity -->
          <div role="tabpanel" class="tab-pane fade" id="electricity">
              <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div style="font-size: 25px;" class="text-center">
                <p>Electricity</p>
              </div>
            <form id="form-pay-electricity-bill" action="" method="post"> 
               <div class="row electricity-overflow broadband-overflow">
               <div class="clearfix"></div>
               <div class="space"></div>
               <div class="clearfix"></div>
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
               <div class="field-electricitybillpayment-operator required">
            <select id="electricitybillpayment-operator" class="form-control" name="ElectricityBillPayment[operator]">
            <option value="">Select Operator</option>
            <option value="1894">BANGALORE ELECTRICITY SUPPLY COMPANY (BESCOM)</option>
            <option value="1893">BHAGALPUR ELECTRICITY DISTRIBUTION COMPANY (P) LTD (BEDPCL)</option>
            <option value="1895">BRIHAN MUMBAI ELECTRIC SUPPLY AND TRANSPORT UNDERTAKING (BESTMU)</option>
            <option value="909">BSES RAJDHANI</option>
            <option value="1506">BSES YAMUNA</option>
            <option value="1900">DNH POWER DISTRIBUTION COMPANY LIMITED (DNHPDCL)</option>
            <option value="1903">INDIA POWER CORPORATION LIMITED (IPCL)</option>
            <option value="1918">JAMSHEDPUR UTILITIES AND SERVICES COMPANY LIMITED (JUSCO)</option>
            <option value="1911">MAHARASHTRA STATE ELECTRICITY BOARD (MSEB)</option>
            <option value="1446">NOIDA POWER COMPANY LTD (NPCL)</option>
            <option value="1204">NORTH BIHAR POWER DISTRIBUTION COMPANY LTD (NBPDCL)</option>
            <option value="1298">NORTH EASTERN ELECTRICITY SUPPLY COMPANY OF ODISHA LTD (NESCO)</option>
            <option value="1102">RELIANCE ENERGY</option>
            <option value="1232">SOUTH BIHAR POWER DISTRIBUTION COMPANY LTD (SBPDCL)</option>
            <option value="1111">TATA POWER DELHI</option>
            <option value="1905">TRIPURA STATE ELECTRICITY CORPORATION LTD (TSECL)</option>
            </select>
            <div class="help-block electricity_operator_error"></div>
            </div>               
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " id="electricity_amount">
            <div class="form-group operator-name">
              <div class="field-electricitybillpayment-amount required">
              <div class="input-group">
              <span class="input-group-addon rupee">₹</span>
              <input type="text" id="electricitybillpayment-amount" class="form-control nozero rsval" name="ElectricityBillPayment[amount]" maxlength="7" placeholder="Enter Amount">
              </div>
              <div class="help-block electricity_amount_error"></div>
              </div>
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="el_recharge_sub_container">
                <button type="button" id="button-pay-electricity-bill" class="btn btn-primary btn-block">Pay Now</button>
            </div>
            </div>
            </div>                      
            </div>
            </div>
 <!-- Electricity End -->

 <!-- DTH -->
                  
<div role="tabpanel" class="tab-pane fade" id="dth">
    <form id="form-dth-recharge" action="" method="post">   
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div style="font-size: 25px;" class="text-center">
                <p>DTH</p>
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group positionrelative">
                        <div class="field-dthrecharge-service_number required">
<input type="text" id="dthrecharge-service_number" class="form-control integerOnly checkCardNumber" name="DthRecharge[service_number]" maxlength="12" placeholder="Subscriber ID" data-number="subscriber ID." autocomplete="off">
<div class="help-block dth_number_error">
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-dthrecharge-operator required">
<select id="DthRechargeharge-operator" class="form-control" name="DthRecharge[operator]">
<option value="">Select Operator</option>
<option value="AIRTELTV">AIRTEL TV</option>
<option value="BIGTV">BIG TV</option>
<option value="SUNTV">SUN TV</option>
<option value="TATASKY">TATA SKY</option>
<option value="VIDEOCOND2H">VIDEOCON D2H</option>
<option value="DISHTV">DISH TV</option>
</select>
<div class="help-block dth_operator_error"></div>
</div>                </div>
               </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                        <div class="field-dthrecharge-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="dthrecharge-amount" class="form-control integerOnly nozero" name="DthRecharge[amount]" maxlength="5" placeholder="Enter Amount"></div>
<div class="help-block dth_amount_error"></div>
</div>
         </div>
            </div>
            <div class="clearfix"></div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="dth_recharge_sub_container">
                <button type="button" id="button-dth-recharge" class="btn btn-primary btn-block">Recharge Now</button>
                </div>
        </div>
    </form>
    </div>                        

    <!-- DTH End -->

    <!-- LandLine -->
              <div role="tabpanel" class="tab-pane fade" id="landline">
    <form id="form-ll-recharge" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>LandLine</p>
            	</div>
    		</div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-landlinerecharge-operator required">

<select id="landlinerecharge-operator" class="form-control" name="LandLineRecharge[operator]">
<option value="">Select Operator</option>
<option value="AIRTFTT">AIRTEL</option>
<option value="TATA">Tata Docomo</option>
<option value="MTNL">MTNL</option>
<option value="BSNL">BSNL</option>
</select>
<div class="help-block"></div>
</div>
</div>
   </div>
            <span id="bsnl-ll-services" class="hide">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-landlinerecharge-type">
<select id="landlinerecharge-type" class="form-control" name="LandLineRecharge[type]">
<option value="">Select Type</option>
<option value="1">Corporate Account</option>
<option value="2">Individual Account</option>
</select>

<div class="help-block"></div>
</div>                </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                        <div class="field-landlinerecharge-account_number">
<input type="text" id="landlinerecharge-account_number" class="form-control integerOnly checkVaidNumber" name="LandLineRecharge[account_number]" maxlength="10" placeholder="Enter Account No." data-number="account no." autocomplete="off"><div class="help-block"></div>
</div>                </div>
            </div>
            </span>
            
            
            <span id="show-bsnl-ll-service-no" class=""><div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group positionrelative">
                        <div class="field-landlinerecharge-service_number">
<input type="text" id="landlinerecharge-service_number" class="form-control integerOnly checkVaidNumber" name="LandLineRecharge[service_number]" maxlength="10" placeholder="Enter Land Line No." data-number="land line no." autocomplete="off"><div class="help-block"></div>
</div>                </div>
            </div>
            <div class="clearfix"></div>
            </span>
            
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-landlinerecharge-circle required">

<select id="landlinerecharge-circle" class="form-control" name="LandLineRecharge[circle]">
<option value="">Select Circle</option>
<option value="AP">ANDHRA PRADESH</option>
<option value="ASM">ASSAM</option>
<option value="BIH">BIHAR</option>
<option value="CHE">CHENNAI</option>
<option value="DEL">DELHI</option>
<option value="GUJ">GUJARAT</option>
<option value="HAR">HARYANA</option>
<option value="HP">HIMACHAL PRADESH</option>
<option value="JK">JAMMU AND KASHMIR</option>
<option value="KER">KERALA</option>
<option value="KK">KARNATAKA</option>
<option value="KOL">KOLKATA</option>
<option value="MAH">MAHARASHTRA</option>
<option value="MP">MADHYA PRADESH</option>
<option value="MUM">MUMBAI</option>
<option value="NE">NORTH EAST</option>
<option value="ORI">ORISSA</option>
<option value="PUN">PUNJAB</option>
<option value="RAJ">RAJASTHAN</option>
<option value="TN">TAMIL NADU</option>
<option value="UPE">UTTAR PRADESH (EAST)</option>
<option value="UPW">UTTAR PRADESH (WEST)</option>
<option value="WB">WEST BENGAL</option>
</select>

<div class="help-block"></div>
</div>                </div>
            </div>
            <div class="addClearfix "></div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="lopn" class="form-group">
                        <div class="field-landlinerecharge-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="landlinerecharge-amount" class="form-control  rsval nozero" name="LandLineRecharge[amount]" maxlength="7" placeholder="Enter Amount"><span style="display:none" id="biller_bill_fetch" class="input-group-btn browse-plan  biller_bill_fetch"><a class="btn btn-default disabled" id="btn_bbfetch" role="button" tabindex="-1" href="javascript:void(0);">Bill fetch</a></span></div><div class="help-block"></div>
</div>
 </div>
            </div>
            <div class="clearfix"></div>           
            <div id="land-line-recharge-ca-number" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hide">
                <div class="form-group">
                        <div class="field-landlinerecharge-ca_number">
<input type="text" id="landlinerecharge-ca_number" class="form-control integerOnly" name="LandLineRecharge[ca_number]" maxlength="10" placeholder="Enter CA No." autocomplete="off"><div class="help-block"></div>
</div>               
 </div>
            </div>
            <div class="clearfix"></div><div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="ll_recharge_sub_container">
                <button type="button" id="button-ll-recharge" class="btn btn-primary btn-block">Pay Now</button> 
                           </div>
            </div>
    </form> 

</div>
   
    <!-- LandLine End -->

   <!-- Data Card -->
      <div role="tabpanel" class="tab-pane fade" id="datacard">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>DataCard</p>
            	</div>
</div>
<form id="form-data-card-recharge" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <div class="form-group">
                <div class="col-md-offset-4">
                    <input class="recharge_mode" id="dataprepaid" type="radio" name="DataCardRecharge[service]" value="prepaid" checked>
                    <label for="dataprepaid" class="datacard_radio_label">Prepaid</label>
                    <input class="recharge_mode" id="datapostpaid" type="radio" name="DataCardRecharge[service]" value="postpaid">
                    <label for="datapostpaid" class="datacard_radio_label">Postpaid</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
              </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                        <div class="form-group field-datacardrecharge-service_number required">
<div class="input-group"><span class="input-group-addon">+91</span><input type="text" id="datacardrecharge-service_number" class="form-control integerOnly nozero checkNumber" name="DataCardRecharge[service_number]" maxlength="10" placeholder="Datacard No" data-number="datacard no." autocomplete="off"></div><div class="help-block"></div>
</div>                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-datacardrecharge-operator required">
<select id="datacardrecharge-operator" class="form-control" name="DataCardRecharge[operator]">
<option value="">Select Operator</option>
<option value="MTSNET">MTS Blaze</option>
<option value="RELNET">Reliance Net Connect</option>
<option value="PHOTON">Tata Photon</option>
</select>
<div class="help-block"></div>
</div>                </div>
                </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hide">
                <div class="form-group">
                    <div class="field-datacardrecharge-circle required">
<select id="datacardrecharge-circle" class="form-control" name="DataCardRecharge[circle]">
<option value="AP">ANDHRA PRADESH</option>
<option value="ASM">ASSAM</option>
<option value="BIH">BIHAR</option>
<option value="CHE">CHENNAI</option>
<option value="DEL">DELHI</option>
<option value="GUJ">GUJARAT</option>
<option value="HAR">HARYANA</option>
<option value="HP">HIMACHAL PRADESH</option>
<option value="JK">JAMMU AND KASHMIR</option>
<option value="KER">KERALA</option>
<option value="KK">KARNATAKA</option>
<option value="KOL">KOLKATA</option>
<option value="MAH">MAHARASHTRA</option>
<option value="MP">MADHYA PRADESH</option>
<option value="MUM">MUMBAI</option>
<option value="NE">NORTH EAST</option>
<option value="ORI">ORISSA</option>
<option value="PUN">PUNJAB</option>
<option value="RAJ">RAJASTHAN</option>
<option value="TN">TAMIL NADU</option>
<option value="UPE">UTTAR PRADESH (EAST)</option>
<option value="UPW">UTTAR PRADESH (WEST)</option>
<option value="WB">WEST BENGAL</option>
</select>
<div class="help-block"></div>
</div>       
    </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                     <div class="field-datacardrecharge-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="datacardrecharge-amount" class="form-control integerOnly nozero" name="DataCardRecharge[amount]" maxlength="5" placeholder="Enter Amount"></div><div class="help-block"></div>
</div> </div>
            </div>
            <div class="clearfix"></div>
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="dc_recharge_sub_container">
                <button type="button" id="button-datacard-recharge" class="btn btn-primary btn-block">Recharge Now</button>    
                </div>
        </div>
</form>                      
    </div>
    <!--Data Card End-->

    <!-- Bus Section -->
  <div role="tabpanel" class="tab-pane fade" id="bus">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>BUS</p>
            	</div>
</div>
    <form id="form-bus" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">                    
                                  <div class="field-bus_from required">
<div class="input-group"><span class="input-group-addon">from</span><input type="text" id="bus_from" class="form-control" name="bus[from]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                      
                </div>
            </div>           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-bus_to required">
<div class="input-group"><span class="input-group-addon">To</span><input type="text" id="bus_to" class="form-control" name="bus[to]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                
                </div>
            </div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-bus_date required">
<div class="input-group"><span class="input-group-addon">Date</span><input type="text" id="single_cal4" class="form-control bus_date" name="bus[date]" placeholder="Enter the Date." data-provide="datepicker-inline"></div><div class="help-block"></div>
</div>                
                </div>
            </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="bus_booking_container">
                <button type="button" id="button-bus-booking" class="btn btn-primary btn-block ">Booking the Ticket</button>   </div>
 </div>
            </div>
    </form> 
</div>
    <!-- Bus Section End -->

    <!-- Gas Section -->
                        <div role="tabpanel" class="tab-pane fade" id="gas">
                            <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>GAS</p>
            	</div>
</div>
<form id="form-pay-gas-bill" action="" method="post">        
        <div class="row electricity-overflow gas-overflow">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-gasbillpayment-operator required">
<select id="gasbillpayment-operator" class="form-control" name="GasBillPayment[operator]">
<option value="">Select Operator</option>
<option value="1888">ADANI GAS LTD (ADANIOB)</option>
<option value="2020">BPCL</option>
<option value="1901">GUJARAT GAS LIMITED (GSPCGAS)</option>
<option value="2021">HPCL</option>
<option value="1993">INDANE GAS</option>
<option value="1902">INDRAPRASTHA GAS LTD (IGL)</option>
<option value="1106">MAHANAGAR GAS LTD (MGL)</option>
<option value="1987">SANWARIYA GAS LTD (SGL)</option>
</select>
<div class="help-block"></div>
</div>                </div>     
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " id="gas_amount">
                <div class="form-group operator-name">
                    <div class="field-gasbillpayment-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="gasbillpayment-amount" class="form-control nozero rsval" name="GasBillPayment[amount]" maxlength="7" placeholder="Enter Amount"><span class="input-group-btn browse-plan biller_bill_fetch"><a class="btn btn-default disabled" role="button" tabindex="-1" href="javascript:void(0);">Bill fetch</a></span></div><div class="help-block"></div>
</div>                
</div>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="gas_recharge_sub_container">
                <button type="button" id="button-pay-gas-bill" class="btn btn-primary btn-block">Pay Now</button>
                </div>

        </div>
        <div class="biller-data"><span class="hide is-biller-data">
    </span></div>
</form>                              

                         
                        </div>
                        </div>

    <!-- Gas Section End -->


    <!--BROADBAND-->

                        <div role="tabpanel" class="tab-pane fade in" id="broadband">
                            <div class="row">                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>BroadBand</p>
            	</div>
</div>
<form id="form-pay-bb-bill" action="" method="post">

        <div class="row">            
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <div class="form-group">
                <div class="col-md-offset-2">
                    <input class="bb_recharge_mode" id="bb_prepaid" type="radio" name="BroadbandBillPayment[service]" value="prepaid" checked>
                    <label for="mobprepaid" class="mobile_radio_label">Topup</label>
                    <input class="recharge_mode" id="monbpostpaid" type="radio" name="BroadbandBillPayment[service]" value="postpaid">
                    <label for="bb_postpaid" class="bb_radio_label">Recharge</label>
                    </div>
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">

</div>
        </div>
        <div class="row electricity-overflow broadband-overflow">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>            

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                    <div class="field-broadbandbillpayment-operator required">

<select id="broadbandbillpayment-operator" class="form-control" name="BroadbandBillPayment[operator]">
<option value="">Select Operator</option>
<option value="1663">DEN</option>
<option value="923">TIKONA</option>
</select>

<div class="help-block"></div>
</div>               </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " id="broadband_amount">
                <div class="form-group operator-name">
                    <div class="field-broadbandbillpayment-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="broadbandbillpayment-amount" class="form-control nozero rsval" name="BroadbandBillPayment[amount]" maxlength="7" placeholder="Enter Amount"><span class="input-group-btn browse-plan biller_bill_fetch"><a class="btn btn-default disabled" role="button" tabindex="-1" href="javascript:void(0);">Bill fetch</a></span></div><div class="help-block"></div>
</div>                </div>
            </div>


            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="bb_recharge_sub_container">
                <button type="button" id="button-pay-bb-bill" class="btn btn-primary btn-block">Pay Now</button> 
                           </div>
            </div>
</form>                              
  </div>
</div>
</div>

<!-- Hotel -->

 <div role="tabpanel" class="tab-pane fade" id="hotel">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>HOTEL</p>
            	</div>
</div>
    <form id="form-hotel" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
             <div class="row col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="row col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-hotel_city required">
<div class="input-group"><span class="input-group-addon">City</span><input type="text" id="hotel_city" class="form-control" name="hotel[city]" placeholder="Enter city."></div><div class="help-block"></div>
</div>                
                </div>
        </div>
            
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="movie_search">
                <button type="button" id="button-hotel-search" class="btn btn-primary btn-block ">Search</button>
                 </div>  
        
            </div>  
            </div>
            </div>
    </form> 

</div>                     
   <!--HOTEL END-->

   <!--FLIGHT-->

 
  <div role="tabpanel" class="tab-pane fade" id="flight">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>FLIGHT</p>
            	</div>
</div>
    <form id="form-flight" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
    

            </div>
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-flight_from required">
<div class="input-group"><span class="input-group-addon">from</span><input type="text" id="flight_from" class="form-control" name="flight[from]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                
                </div>
        
            </div>           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-flight_to required">
<div class="input-group"><span class="input-group-addon">To</span><input type="text" id="flight_to" class="form-control" name="flight[to]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                
                </div>
        
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-flight_date required">
<div class="input-group"><span class="input-group-addon">Date</span><input type="text" id="single_cal3" class="form-control" name="flight[date]" placeholder="Enter the Date."></div><div class="help-block"></div>
</div>                
 </div>
</div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="flight-booking_container">
                <button type="button" id="button-flight-booking" class="btn btn-primary btn-block ">Booking the Ticket</button>
                </div>

            </div>
    </form> 

</div>
  <!--FLIGHT END-->

  <!-- Movie Section -->
<div role="tabpanel" class="tab-pane fade" id="movie">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>MOVIES</p>
            	</div>
</div>
    <form id="form-movie" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
             <div class="row col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-movie_city required">
<div class="input-group"><span class="input-group-addon">City</span><input type="text" id="movie_city" class="form-control" name="movie[city]" placeholder="Enter city."></div><div class="help-block"></div>
</div>                
                </div>
                </div>
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="movie_search">
                <button type="button" id="button-movie-search" class="btn btn-primary btn-block ">Search</button>
                 </div>  
        
            </div>
            
            </div>
    </form> 

</div>
  <!-- Movie Section End -->

<!-- Money Transfer -->
<div role="tabpanel" class="tab-pane fade" id="moneytransfer">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>MONEY TRANSFER</p>
            	</div>
</div>
    <form id="" action="" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mar-bottom ">
                <ul class="nav nav-tabs radioTab" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#beneficiaryIfsc" aria-controls="beneficiaryIfsc" role="tab" data-toggle="tab">
                               
                                <label>Through IFSC</label>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#beneficiaryMmid" aria-controls="beneficiaryMmid" role="tab" data-toggle="tab">
                                
                                <label>Through MMID</label>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="beneficiaryIfsc">
                    <form id="form-add-beneficiary" action="/moneytransfer/send-to-bank" method="post">
<input type="hidden" name="_csrf" value="WXVIcHN1LnM3QiAJNUN.MjMEMCpAMFsbKxM4SBs7QgA6ACUFQSRCQg==">                    <div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">                
                                <div class="field-beneficiaryform-beneficiary_name required">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite full-name"></i></span><input type="text" id="beneficiaryform-beneficiary_name" class="form-control nameOnly" name="BeneficiaryForm[beneficiary_name]" maxlength="50" placeholder="Beneficiary Name"></div><div class="help-block"></div>
</div>
                            </div>
                        </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="field-beneficiaryform-beneficiary_nick_name">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite full-name"></i></span><input type="text" id="beneficiaryform-beneficiary_nick_name" class="form-control nameOnly" name="BeneficiaryForm[beneficiary_nick_name]" maxlength="20" placeholder="Beneficiary Nick Name"></div><div class="help-block"></div>
</div>                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <select id="beneficiaryform-beneficiary_bank_name" class="form-control with-arrow" name="BeneficiaryForm[beneficiary_bank_name]"><option value="">Select Bank Name</option><option value="ABHY">ABHYUDAYA CO-OPERATIVE BANK</option><option value="HDFC">ADARNIYA P.D. PATILSAHEB SAHAKARI BANK LTD.</option><option value="HDFC">ADARSH CO-OPERATIVE BANK LTD</option><option value="HDFC0CAMMCO">ADARSH MAHILA MERCNT CO-OP BANK LTD</option><option value="ICIC">AGRA DISTRICT CO OPERATIVE BANK LTD</option><option value="SVCB">AHMEDNAGAR SHAHAR SAHAKARI BANK MARYADIT</option><option value="HDFC">AKHAND ANAND CO.OP BANK LTD</option><option value="ICIC">ALIGARH DISTRICT CO OPERATIVE BANK LTD</option><option value="ALLA">ALLAHABAD BANK</option><option value="ALLA">ALLAHABAD UP GRAMIN BANK</option><option value="AUCB">ALMORA URBAN CO-OPERATIVE BANK LTD.</option><option value="YESB">ALMORA ZILA SAHKARI BANK LTD</option><option value="ICIC">AMBARNATH JAI-HIND CO-OP.BANK LTD.</option><option value="GSCB">AMRELI JILLA MADHYASTHA SAHAKARI BANK LTD</option><option value="HDFC">ANDAMAN AND NICOBAR STATE COOPERATIVE BANK LTD</option><option value="ANDB0000000">ANDHRA BANK</option><option value="SBIN">ANDHRA PRADESH GRAMEENA VIKAS BANK</option><option value="APGB">ANDHRA PRAGATHI GRAMEENA BANK</option><option value="APMC">AP MAHESH COOPERATIVE BANK</option><option value="ASBL">APNA SAHAKARI BANK LTD.</option><option value="SBIN">ARUNACHAL PRADESH RURAL BANK</option><option value="SVCB">ARVIND SAHAKARI BANK LTD</option><option value="ICIC">ASHOK SAHAKARI BANK LTD</option><option value="UTBI">ASSAM GRAMIN VIKASH BANK</option><option value="UTIB0000000">AXIS BANK LTD</option><option value="IBKL">BALAGERIA CENTRAL COOP BANK LTD</option><option value="HDFC">BALASINOR NAGARIK SAHAKARI BANK LTD</option><option value="HDFC">BALITIKURI CO-OPERATIVE BANK LTD</option><option value="ICIC">BALOTRA URBAN CO-OPERATIVE BANK LTD</option><option value="ICIC">BANARAS MERCHANTILE CO OPERATIVE BANK LTD</option><option value="YESB">BANDA URBAN CO OPERATIVE BANK LTD</option><option value="BDBL">BANDHAN BANK LIMITED</option><option value="UTBI">BANGIYA GRAMIN VIKASH BANK</option><option value="BARB0000000">BANK OF BARODA</option><option value="BKID">BANK OF INDIA</option><option value="MAHB">BANK OF MAHARASHTRA</option><option value="WBSC">BANKURA DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="BARB">BARODA GUJARAT GRAMIN BANK</option><option value="BARB">BARODA RAJASTHAN KSHETRIYA GRAMIN BANK</option><option value="BARB">BARODA UTTAR PRADESH GRAMIN BANK</option><option value="BACB">BASSEIN CATHOLIC CO-OP BANK LTD</option><option value="BAVX">BAVLA NAGRIK SAHAKARI BANK LTD.</option><option value="HDFC">BEAWAR URBAN CO-OPERATIVE BANK LTD.</option><option value="YESB">BHADOHI URBAN CO OPERATIVE BANK LTD GYANPUR</option><option value="HDFC">BHAGINI NIVEDITA SAHAKARI BANK LTD.</option><option value="BHSX">BHARATI SAHAKARI BANK LTD. PUNE</option><option value="BMBL">BHARTIYA MAHILA BANK</option><option value="WBSC">BHATPARA NAIHATI CO OPERATIVE BANK LTD</option><option value="GSCB">BHAVNAGAR DISTRICT CO OP BANK LTD</option><option value="BHEX">BHEL EMPLOYEES COOPERATIVE BANK LTD</option><option value="HDFC">BHILWARA MAHILA URBAN CO OPERATIVE BANK LTD</option><option value="HDFC">BHILWARA URBAN CO-OPERATIVE BANK LTD</option><option value="CBIN">BHOPAL CO OP CENTRAL BANK</option><option value="UCBA">BIHAR GRAMIN BANK</option><option value="BNPA0000000">BNP PARIBAS</option><option value="UTIB">BOMBAY MERCANTILE CO-OPERATIVE BANK LTD</option><option value="YESB">BRAHMADEODADA MANE SAHAKARI BANK LTD SOLAPUR</option><option value="ICIC">BRAHMAWART COMMERCIAL CO OPERATIVE BANK LTD</option><option value="CNRB">CANARA BANK</option><option value="CSBK">CATHOLIC SYRIAN BANK LTD</option><option value="CBIN0000000">CENTRAL BANK OF INDIA</option><option value="CBIN">CENTRAL MADHYA PRADESH GRAMIN BANK</option><option value="ANDB">CHAITANYA GODAVARI GRAMEENA BANK</option><option value="IBKL">CHAMOLI ZILA SAHKARI BANK LTD</option><option value="TNSC">CHENNAI CENTRAL CO-OPERATIVE BANK LTD.</option><option value="SBIN">CHHATTISGARH GRAMIN BANK</option><option value="HDFC">CHURU ZILA URBAN CO OPERATIVE BANK LTD</option><option value="CITI">CITIBANK</option><option value="CCBL">CITIZEN CREDIT CO-OPERATIVE BANK LTD.</option><option value="IBKL">CITIZENS CO-OPERATIVE BANK LTD</option><option value="CIUB">CITY UNION BANK LTD.</option><option value="CMCB">COLOUR MERCHANTS CO-OPERATIVE BANK LTD</option><option value="CORP">CORPORATION BANK</option><option value="WBSC">DARJEELING DISTRICT CENTRAL CO OPERATIVE BANK LTD</option><option value="HDFC">DEENDAYAL NAGARI SAHAKARI BANK LTD</option><option value="YESB">DELHI NAGRIK SEHKARI BANK LTD </option><option value="BKDN">DENA BANK</option><option value="BKDN">DENA GUJARAT GRAMIN BANK</option><option value="DBSS0000000">DEVELOPMENT BANK OF SINGAPORE</option><option value="YESB">DEVELOPMENT CO OPERATIVE BANK LTD, KANPUR</option><option value="DCBL">DEVELOPMENT CREDIT BANK LTD</option><option value="DLXB">DHANLAXMI BANK LTD</option><option value="TNSC">DHARMAPURI DISTRICT CENTRAL CO OP BANK LTD</option><option value="TNSC">DINDIGUL CENTRAL CO-OPERATIVE BANK LTD</option><option value="YESB">DISTRICT CO OPERATIVE BANK LTD DEHRADUN</option><option value="ICIC">DISTRICT CO OPERATIVE BANK LTD, BARABANKI</option><option value="ICIC">DISTRICT CO OPERATIVE BANK LTD, PILIBHIT</option><option value="ICIC">DISTRICT CO-OPERATIVE BANK LTD.RAEBARELI</option><option value="ICIC">DISTRICT COOPERATIVE BANK LTD, SHAHJAHANPUR</option><option value="ICIC">DISTRICT COOPERATIVE BANK SAHARANPUR</option><option value="DMKB">DMK JAOLI BANK</option><option value="DNSB">DOMBIVILI NAGARI SAHAKARI BANK LTD.</option><option value="DNSB">DOMBIVLI NAGARI SAHAKARI BANK LIMITED</option><option value="HDFC">DR. ANNASAHEB CHOUGULE URBAN CO-OP BANK LTD.</option><option value="IBKL">DURGAPUR STEEL PEOPLES COOP BANK LTD</option><option value="SBIN">ELLAQUAI DEHATI BANK</option><option value="ICIC">ETAH DISTRICT COOPERATIVE BANK</option><option value="ECBL">EXCELLENT CO-OPERATIVE BANK LTD</option><option value="GSBX">GANDHIBAG SAHAKARI BANK LTD., NAGPUR</option><option value="HDFC">GODAVARI URBAN CO-OPERATIVE BANK LTD. NASHIK</option><option value="PJSB">GOPINATH PATIL PARSIK JANATA SAHAKARI BANK</option><option value="BKID">GRAMIN BANK OF ARYAVART</option><option value="SVCB">GUARDIAN SOUHARDA SAHAKARI BANK NIYAMITA</option><option value="ICIC">HAMIRPUR DISTRICT CO OPERATIVE BANK LTD</option><option value="YESB">HCBL CO-OPERATIVE BANK LTD</option><option value="HDFC0000000">HDFC BANK LTD</option><option value="PUNB">HIMACHAL GRAMIN BANK</option><option value="WBSC">HOOGHLY DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option><option value="HSBC">HSBC</option><option value="ICIC">HUTATMA SAHAKARI BANK LTD</option><option value="ICIC0000000">ICICI BANK LTD</option><option value="IBKL0000000">IDBI BANK LTD</option><option value="IDFB">IDFC BANK</option><option value="IDIB">INDIAN BANK</option><option value="IOBA">INDIAN OVERSEAS BANK</option><option value="YESB">INDORE CLOTH MARKET CO-OP BANK LTD</option><option value="ICIC">INDORE PARASPAR SAHAKARI BANK</option><option value="UTIB">INDRAPRASTHA SEHKARI BANK LTD</option><option value="INDB0000000">INDUSIND BANK LIMITED</option><option value="VYSA">ING VYSYA BANK LTD.</option><option value="HDFC">INTEGRAL URBAN CO-OP BANK LTD</option><option value="ITCX">IRINJALAKUDA TOWN CO-OPERATIVE BANK LTD</option><option value="JAKA">J AND K GRAMEEN BANK ACH</option><option value="HDFC">JAIN CO-OPERATIVE BANK LIMITED</option><option value="ICIC">JALAUN DISTRICT CO-OPERATIVE BANK LTD</option><option value="JJSB">JALGAON JANATA SAHKARI BANK LTD</option><option value="HDFC">JALNA MERCHANTS CO-OP BANK LTD.</option><option value="UTIB">JAMIA CO-OPERATIVE BANK LTD</option><option value="JSBL">JANAKALYAN SAHAKARI BANK</option><option value="JASB">JANASEVA SAHAKARI BANK (BORIVLI) LTD</option><option value="JANA">JANASEVA SAHAKARI BANK LTD. PUNE</option><option value="JANA">JANASEVA SAHAKARI BANK LTD.,PUNE</option><option value="HDFC0CJBMLG">JANATA CO-OPERATIVE BANK LTD</option><option value="JSBP">JANATA SAHAKARI BANK LTD (PUNE)</option><option value="IBKL">JANATA SAHAKARI BANK LTD, AJARA</option><option value="JSBP">JANATA SAHAKARI BANK LTD.</option><option value="HDFC">JANSEWA URBAN COOP BANK LTD.</option><option value="BKID">JHARKAND GRAMIN BANK</option><option value="UTIB">JILA SAHAKARI KENDRIYA BANK MARYADIT, RAIPUR</option><option value="YESB">JIVAN COMMERCIAL CO OPERATIVE BANK LTD</option><option value="HDFC">JODHPUR NAGRIK SAHAKARI BANK LIMITED </option><option value="YESB">JOGINDRA CENTRAL COOPERATIVE BANK LTD</option><option value="KAIJ">KALLAPPANNA AWADE ICH JANATA S BANK</option><option value="TNSC">KANCHEEPURAM CENTRAL COOPERATIVE BANK</option><option value="KKMX">KANKARIA MANINAGAR NAGARIK SAHAKARI BANK LTD</option><option value="KARB">KARNATAKA BANK LTD</option><option value="KVGB">KARNATAKA VIKAS GRAMEENA BANK</option><option value="KVBL0000000">KARUR VYSYA BANK</option><option value="UBIN">KASHI GOMTI SAMYUT GRAMEEN BANK</option><option value="HDFC">KASHIPUR URBAN CO OPERATIVE BANK LTD</option><option value="HDFC">KASHMIR MERCANTILE CO OPERATIVE BANK LTD</option><option value="SBMY">KAVERI GRAMEENA BANK</option><option value="KLGB">KERALA GRAMIN BANK</option><option value="KSCX">KERALA STATE CO-OPERATIVE BANK LTD</option><option value="YESB">KHALILABAD NAGAR SAHKARI BANK LTD</option><option value="KKBK">KOKAN MERCANTILE CO-OPERATIVE BANK LTD</option><option value="IBKL">KOLHAPUR DIST.CENTRAL CO-OP BANK LTD, KOLHAPUR</option><option value="HDFC">KOLHAPUR MAHILA SAHAKARI BANK LTD.</option><option value="KKBK">KOTAK MAHINDRA BANK</option><option value="IBKL">KOZHIKODE DISTRICT COOPERATIVE BANK</option><option value="UTIB">KRISHNA MERCANTILE CO-OP BANK</option><option value="ICIC">KURLA NAGARIK SAHAKARI BANK LTD</option><option value="SBIN">LANGPI DEHANGI RURAL BANK</option><option value="HDFC">LILUAH CO-OPERATIVE BANK LTD</option><option value="CBIN">MADHTYA PRADESH RAJYA SAHAKARI BANK MARYADIT</option><option value="SBIN">MADHYANCHAL GRAMIN BANK</option><option value="PUNB">MADYA BIHAR GRAMIN BANK</option><option value="MAHB">MAHARASHTRA GRAMEEN BANK</option><option value="MSCI">MAHARASHTRA STATE CO-OPERATIVE BANK LTD</option><option value="HDFC">MAHAVEER CO-OPERATIVE URBAN BANK LIMITED</option><option value="MHSX">MAHESH SAHAKARI BANK LTD., PUNE</option><option value="MHLX">MAHILA CO-OPERATIVE BAK LTD</option><option value="WBSC">MALDA DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="HDFC">MALVIYA URBAN CO OPERATIVE BANK LTD</option><option value="STBP">MALWA GRAMIN BANK</option><option value="UTBI">MANIPUR RURAL BANK</option><option value="MANX">MANSA NAGRIK SAHAKARI BANK</option><option value="HDFC">MANSING CO-OPERATIVE BANK LTD.</option><option value="KKBK">MANTHA URBAN CO OP BANK LTD</option><option value="IBKL">MARATHA COOPERATIVE BANK LTD</option><option value="ICIC">MATHURA ZILA SAHKARI BANK LTD , MATHURA</option><option value="SBIN">MEGHALAYA RURAL BANK</option><option value="SBIN">MIZORAM RURAL BANK</option><option value="MDCB">MUMBAI DISTRICT CENTRAL CO-OP BANK LTD</option><option value="HDFC">MUSLIM CO-OP BANK</option><option value="ICIC">MUZAFFARNAGAR DISTRICT COOPERATIVE BANK LTD</option><option value="WBSC">NADIA DISTRICT CENTRAL CO OPERATIVE BANK LTD</option><option value="SBIN">NAGALAND RURAL BANK</option><option value="UTIB">NAGALAND STATE COOPERATIVE BANK LTD</option><option value="YESB">NAGAR SAHAKARI BANK LTD. GORAKHPUR</option><option value="YESB">NAGAR SAHAKARI BANK LTD.MAHARAJGANJ</option><option value="NUCB">NAGAR URBAN CO OPERATIVE BANK LTD</option><option value="NSMX">NAGARIK SAMABAY BANK LTD</option><option value="NGSB">NAGPUR NAGARIK SAHAKARI BANK LTD.</option><option value="HDFC">NAGRIK SAHAKARI BANK LTD</option><option value="IBKL">NAGRIK SAHAKARI BANK LTD, LUCKNOW</option><option value="INDB">NAGRIK SAHAKARI BANK MARYADIT, GWALIOR</option><option value="YESB">NAINITAL DISTRICT CO OPERATIVE BANK LTD</option><option value="BKID">NARMADA JHABUA GRAMIN BANK</option><option value="HDFC">NASHIK DISTRICT GIRNA SAHAKARI BANK LTD</option><option value="ICIC">NASHIK DISTRICT INDUSTRIAL AND MERCANTILE COOP BANK</option><option value="HDFC">NASHIK JILLHA MAHILA VIKAS SAHAKARI BANK LTD</option><option value="KKBK">NAVABHARAT CO-OP. URBAN BANK LTD.</option><option value="NICB">NEW INDIA CO-OP BANK LTD</option><option value="NKGS">NKGSB CO-OP BANK LTD</option><option value="NKGS">NKGSB CO-OP. BANK LTD.</option><option value="INDB">NOIDA COMERCIAL COOPERATIVE BANK</option><option value="NNSB">NUTAN NAGARIK SAHAKARI BANK LTD</option><option value="IOBA">ODISHA GRAMYA BANK</option><option value="ORBC0000000">ORIENTAL BANK OF COMMERCE</option><option value="IDIB">PALLAVAN GRAMA BANK</option><option value="ICIC">PANDHARPUR MERCHANT CO-OPERATIVE BANK</option><option value="IOBA">PANDYAN GRAMA BANK</option><option value="YESB">PARASPAR SAHAYAK CO-OP BANK</option><option value="HDFC">PARSHWANATH CO-OPERATIVE BANK LTD</option><option value="UCBA">PASCHIM BANGA GRAMIN BANK</option><option value="HDFC">PATAN CO-OPEARTIVE BANK LTD</option><option value="IBKL">PITHORAGARH ZILA SAHKARI BANK LTD</option><option value="HDFC">POORNAWADI NAGRIK SAHAKARI BANK M.BEED.</option><option value="PKGB">PRAGATHI KRISHNA GRAMIN BANK</option><option value="YESB">PRAGATI SAHAKARI BANK LTD</option><option value="PRTH">PRATHAMA BANK</option><option value="HDFC">PRERANA CO-OP BANK LTD.</option><option value="PMEC">PRIME CO-OPERATIVE BANK LTD.</option><option value="KKBK">PRIYADARSHANI NAGARI SAHAKARI BANK LTD., JALNA.</option><option value="TNSC">PUDUKOTTAI DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="HDFC">PUNE DISTRICT CENTRAL CO-OPERATIVE BANK LTD.</option><option value="PMCB">PUNJAB AND MAHARASHTRA CO-OP BANK LTD.</option><option value="PMCB">PUNJAB AND MAHARASHTRA CO-OPERATIVE BANK</option><option value="PSIB">PUNJAB AND SIND BANK</option><option value="PUNB">PUNJAB GRAMIN BANK</option><option value="PUNB">PUNJAB NATIONAL BANK</option><option value="SBIN">PURVANCHAL GRAMIN BANK</option><option value="YESB">PUSAD URBAN CO-OP,BANK LTD.</option><option value="RABO">RABOBANK INTERNATIONAL</option><option value="IBKL">RAIGAD DISTRICT CENTRAL CO-OP BANK LTD</option><option value="HDFC">RAIGAD SAHAKARI BANK LIMITED</option><option value="WBSC">RAIGANJ CENTRAL CO OP BANK LTD</option><option value="IBKL">RAJARAMBAPU SAHAKARI BANK LTD., PETH</option><option value="HDFC">RAJARSHI SHAHU SAHAKARI BANK LTD</option><option value="SBBJ">RAJASTHAN MARUDHARA GRAMIN BANK</option><option value="YESB">RAJDHANI NAGAR SAHKARI BANK</option><option value="RSBL0000001">RAJGURUNAGAR SAHAKARI BANK LTD</option><option value="RNSB">RAJKOT NAGARIK SAHAKARI BANK LTD.</option><option value="ICIC">RAMPUR ZILA SAHKARI BANK LTD</option><option value="RATN">RATNAKAR BANK LIMITED</option><option value="ICIC">SAMARTH SAHAKARI BANK LTD. SOLAPUR</option><option value="HDFC">SAMATA CO-OPERATIVE DEVELOPMENT BANK LTD</option><option value="SRCB">SAMATA SAHAKARI BANK LTD</option><option value="IBKL">SANDUR PATTANA SOUHARDA SAHAKARI BANK NIYAMITHA</option><option value="HDFC">SANGLI URBAN CO-OPERATIVE BANK LTD</option><option value="UTIB">SANMATI SAHAKARI BANK LTD</option><option value="HDFC">SANT SOPANKAKA SAHAKARI BANK LTD.</option><option value="IDIB">SAPTAGIRI GRAMEENA BANK</option><option value="HDFC">SARASPUR NAGARIK CO OPERATIVE BANK LTD</option><option value="SRCB">SARASWAT BANK</option><option value="PUNB">SARVA HARYANA GRAMIN BANK</option><option value="PUNB">SARVA UP GRAMIN BANK</option><option value="IBKL">SARVODAYA COMMERICAL CO OP BANK LTD</option><option value="SBIN">SAURASHTRA GRAMIN BANK</option><option value="HDFC">SAWAI MADHOPUR URBAN CO OPERATIVE BANK LTD</option><option value="SVCB">SHANKAR SAHAKARI BANK LTD</option><option value="SKSB">SHIKSHAK SAHAKARI BANK LTD</option><option value="HDFC">SHIVAJIRAO BHOSALE SAHAKARI BANK LTD</option><option value="IBKL">SHIVALIK MERCANTILE CO-OP BANK LTD</option><option value="HDFC">SHIVDAULAT SAHAKARI BANK LTD.</option><option value="GSCB">SHREE BHAVNAGAR NAGRIK SAHAKARI BANK LTD</option><option value="KADX">SHREE KADI NAGRIK SAHAKARI BANK</option><option value="HDFC">SHREE LAXMI CO-OP BANK </option><option value="SVCB">SHREE MAHALAXMI URBAN CO-OP CREDIT BANK LTD.</option><option value="HDFC">SHREE MAHUVA NAGRIK SAHAKARI BANK LTD</option><option value="IBKL">SHREE PANCHGANGA NAGARI SAHAKARI BANK LTD</option><option value="YESB">SHREE SHARADA SAHAKARI BANK LTD</option><option value="HDFC">SHREE WARANA SAHAKARI BANK LTD.</option><option value="HDFC">SHRI ADINATH CO-OP.BANK LTD.</option><option value="ICIC">SHRI BASAVESHWAR SAHAKARI BANK NIYAMIT</option><option value="HDFC">SHRI CHHANI NAGRIK SAHKARI BANK LTD</option><option value="CRUB">SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK </option><option value="IBKL">SHRI MAHALAXMI CO-OP BAK LTD., KOLHAPUR</option><option value="HDFC">SHRI MAHAVIR URBAN CO-OPERATIVE BANK LTD</option><option value="GSCB">SHRI RAJKOT DISTRICT CO OP BANK LTD</option><option value="HDFC0CVCB02">SHRI VEERSHAIV CO-OP BANK LTD.</option><option value="ICIC">SHRI. ARIHANT CO-OPERATIVE BANK LTD</option><option value="IBKL">SHRIPATRAODADA SAHAKARI BANK LTD </option><option value="SHBX">SHRIRAM URBAN CO-OPERATIVE BANK LTD</option><option value="YESB">SHUBHALAKSHMI MAHILA CO OP BANK LTD</option><option value="HDFC">SHUSHRUTI SOUHARDA SAHAKARA BANK NIYAMITA</option><option value="SIDX">SIDDHI CO-OPERATIVE BANK LTD.</option><option value="HDFC">SIHOR NAGARIK SAHAKARI BANK LTD</option><option value="HDFC">SINDHUDURG  DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="SMVC">SIR M VISVESVARAYA CO-OPERATIVE BANK LTD</option><option value="YESB">SMRITI NAGRIK SAHAKARI BANK </option><option value="SJSB">SOLAPUR JANATA SAHAKARI BANK LTD.</option><option value="HDFC">SOLAPUR SIDDHESHWAR SAHAKARI BANK LTD</option><option value="SIBL">SOUTH INDIAN BANK</option><option value="SCSX">SREE CHARAN SOUHARDHA CO-OP BANK LTD</option><option value="SMWX">SREE SUBRAMANYESWARA CO-OPERATIVE BANK</option><option value="APBL">SRI POTTI SRIRAMULU NELLORE DCCB</option><option value="SBBJ0000000">STATE BANK OF BIKANER AND JAIPUR</option><option value="SBHY">STATE BANK OF HYDERABAD</option><option value="SBIN0000000">STATE BANK OF INDIA</option><option value="SBMY0000000">STATE BANK OF MYSORE</option><option value="STBP0000000">STATE BANK OF PATIALA</option><option value="SBTR0000000">STATE BANK OF TRAVANCORE</option><option value="HDFC">STERLING URBAN CO OPERATIVE BANK LTD</option><option value="HDFC">SUBHADRA LOCAL AREA BANK LTD</option><option value="HDFC">SUCO SOUHADRA SAHAKARI BANK</option><option value="HDFC">SUDHA CO-OPERATIVE URBAN BANK LTD</option><option value="HDFC">SURAT NATIONAL CO-OP. BANK LTD</option><option value="PSIB">SUTLEJ GRAMIN BANK</option><option value="HDFC">SUVARNAYUG SAHAKARI BANK LTD.</option><option value="SYNB">SYNDICATE BANK</option><option value="TMBL">TAMILNAD MERCANTILE BANK LTD.</option><option value="TNSC">TAMILNADU STATE APEX CO-OP BANK LTD</option><option value="WBSC">TAMLUK-GHATAL CENTRAL CO-OPERATIVE BANK LTD</option><option value="IBKL">TEHRI GARHWAL ZILA SAHKARI BANK LTD</option><option value="SBHY">TELANGANA GRAMEENA BANK</option><option value="TTLX">TEXTILE CO-OP BANK</option><option value="HDFC">TEXTILE TRADERS CO-OPERATIVE BANK LIMITED</option><option value="TBSB">THANE BHARAT SAHAKARI BANK LTD.</option><option value="TNSC">THANJAVUR CENTRAL CO OP BANK LTD</option><option value="SVCB">THE ABHINAV SAHAKARI BANK LIMITED</option><option value="ICIC">THE ADARSH COOPERATIVE URBAN BANK LIMITED</option><option value="APBL">THE ADILABAD DISTRICT CO-OP CENTRAL BANK LTD.</option><option value="YESB">THE AGRASEN CO-OPERATIVE URBAN BANK LTD</option><option value="GSCB">THE AHMEDABAD DISTRICT CO-OPERATIVE BANK LTD</option><option value="AMCB">THE AHMEDABAD MERCANTILE CO-OP BANK LTD</option><option value="IBKL">THE AJARA URBAN CO-OP. BANK LTD.</option><option value="ADCC">THE AKOLA DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="AJKB">THE AKOLA JANATA COMMERCIAL CO-OPERATIVE BANK LTD</option><option value="YESB">THE AKOLA URBAN CO OPERATIVE BANK LTD</option><option value="UTIB">THE ALAPPUZHA DISTRICT CO OPERATIVE BANK LTD</option><option value="UTIB">THE AMBALA CENTRAL CO OPERATIVE BANK LTD</option><option value="YESB">THE AMRAVATI DISTRICT CENTRAL CO OP BANK LTD</option><option value="UTIB">THE AMRITSAR CENTRAL COOPERATIVE BANK LIMITED.</option><option value="APBL">THE ANANTAPUR DISTRICT COOPERATIVE CENTRAL BANK LT</option><option value="ABEX">THE ANDHRA BANK EMPLOYEES CO OPERATIVE BANK LTD</option><option value="APBL">THE ANDHRA PRADESH STATE COOPERATIVE BANK LTD</option><option value="HDFC">THE ANNASAHEB SAVANT CO-OP URBAN BANK MAHAD LTD</option><option value="APNX">THE APANI SAHAKARI BANK LTD.</option><option value="HDFC">THE ARYAPURAM COOPERATIVE URBAN BANK LTD</option><option value="IBKL">THE ASHTA PEOPLES CO-OP BANK LTD., ASHTA</option><option value="HDFC">THE ASSAM COOPERATIVE APEX BANK LTD</option><option value="YESB">THE ASSOCIATE CO OPERATIVE BANK LTD</option><option value="IBKL">THE AZAD URBAN CO-OP BANK LTD. HUBLI</option><option value="HDFC">THE BAIDYABATI SHEORAPHULI CO OPERATIVE BANK LTD</option><option value="GSCB">THE BANASKANTHA DIST CENTRAL COOP BANK LTD</option><option value="BCCB">THE BANGALORE CITY CO-OPERATIVE BANK LIMITED</option><option value="RSCB">THE BANSWARA CENTRAL CO OPERATIVE BANK LTD</option><option value="HDFC">THE BANTRA CO-OPERATIVE BANK LTD</option><option value="HDFC">THE BARAMATI SAHAKARI BANK LTD</option><option value="GSCB">THE BARODA CENTRAL CO-OPERATIVE BANK LTD</option><option value="KKBK">THE BARODA CITY CO OPERATIVE BANK LTD</option><option value="UTIB">THE BATHINDA CENTRAL CO-OPERATIVE BANK LTD.</option><option value="HDFC">THE BHADGAON PEOPLES CO-OP BANK LTD.</option><option value="HDFC">THE BHAGYALAKSHMI MAHILA SAHAKARI BANK LTD</option><option value="HDFC">THE BHAGYODAYA CO OPERATIVE BANK LTD</option><option value="BCBM">THE BHARAT CO-OPERATIVE BANK LTD</option><option value="TBCX">THE BHARATH CO-OPERATIVE BANK LTD</option><option value="YESB">THE BHAVANA RISHI COOP. URBAN BANK LIMITED</option><option value="HDFC">THE BICHOLIM URBAN CO-OPERATIVE BANK LTD</option><option value="HDFC">THE BIHAR AWAMI CO OPERATIVE BANK LTD</option><option value="YESB">THE BIHAR STATE CO OPERATIVE BANK LTD</option><option value="HDFC">THE BIJNOR URBAN CO OPERATIVE BANK LTD</option><option value="HDFC">THE BORAL UNION CO OPERATIVE BANK LTD</option><option value="HDFC">THE BURDWAN CENTRAL CO OP BANK LTD</option><option value="YESB">THE BUSINESS CO-OPERATIVE BANK LTD</option><option value="YESB">THE CHANDRAPUR DISTRICT CENTRAL CO OP BANK LTD</option><option value="ICIC">THE CHEMBUR NAGARIK SAHAKARI BANK</option><option value="HDFC">THE CHIKHLI URBAN CO-OP BANK LTD.</option><option value="SVCB">THE CHIPLUN URBAN COOPERATIVE BANK LTD</option><option value="CHTX">THE CHITNAVISPURA SAHAKARI BANK LTD </option><option value="APBL">THE CHITTOOR DISTRICT CO-OP CENTRAL BANK LTD </option><option value="HDFC">THE CITIZEN COOPERATIVE BANK LIMITED</option><option value="YESB">THE CITIZENS URBAN COOPERATIVE BANK LTD.</option><option value="CCOB">THE CITY CO-OPERATIVE BANK LTD</option><option value="HDFC">THE CO OPERATIVE CITY BANK LTD</option><option value="TNSC">THE COIMBATORE DISTRICT CENTRAL CO-OP BANK LIMITED</option><option value="HDFC">THE COMMERCIAL COOPERATIVE BANK LIMITED</option><option value="IBKL">THE COOP BANK OF MEHSANA LTD</option><option value="COSB">THE COSMOS CO-OPERATIVE BANK LTD</option><option value="COSB">THE COSMOS COOPERATIVE BANK LTD.</option><option value="TNSC">THE CUDDALORE DISTRICT CENTRAL COOPERATIVE BANK </option><option value="WBSC">THE DAKSHIN DINAJPUR DISTRICT CENTRAL CO-OP BANK</option><option value="DMCB">THE DECCAN MERCHANTS CO-OPERATIVE BANK LTD</option><option value="DLSC">THE DELHI STATE COOPERATIVE BANK LIMITED</option><option value="APBL">THE DISTRICT CENTRAL COOP BANK LIMITED, ELLURU</option><option value="APBL">THE DISTRICT CENTRAL COOPEARATIVE BANK LTD,KHAMMAM</option><option value="APBL">THE DISTRICT CO-OP CENTRAL BANK LTD, KAKINADA</option><option value="APBL">THE DISTRICT CO-OP CENTRAL BANK LTD, VISAKHAPATNAM</option><option value="APBL">THE DISTRICT CO-OPERATIVE CENTRAL BANK LTD.MEDAK</option><option value="APBL">THE DISTRICT COOP CENTRAL BANK LTD,VIZIANAGARAM</option><option value="APBL">THE DISTRICT COOPERATIVE CENTRAL BANK LTD, KURNOOL</option><option value="APBL">THE DISTRICT COOPERATIVE CENTRAL BANK LTD,SRIKAKUL</option><option value="APBL">THE DISTRICT COOPERATIVE CENTRAL BANK,MAHABUBNAGAR</option><option value="RSCB">THE DUNGARPUR CENTRAL CO OPERATIVE BANK LTD</option><option value="UBIN">THE ERNAKULAM DISTRICT CO-OPERATIVE BANK LTD</option><option value="TNSC">THE ERODE DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE FARIDKOT CENTRAL COOPERATIVE BANK LTD</option><option value="UTIB">THE FATEHABAD CENTRAL CO-OP BANK LTD</option><option value="UTIB">THE FATEHGRAH SAHIB CENTRAL COOPERATIVE BANK</option><option value="UTIB">THE FAZILKA CENTRAL COOP. BANK LTD</option><option value="FDRL0000000">THE FEDERAL BANK LIMITED</option><option value="UTIB">THE FEROZEPUR CENTRAL COOP. BANK LTD</option><option value="YESB">THE FINANCIAL CO OPERATIVE BANK LTD</option><option value="GDCB">THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK  </option><option value="ICIC">THE GADHINGLAJ URBAN CO-OP BANK LTD</option><option value="IBKL">THE GANDEVI PEOPLES CO-OPERATIVE BANK LIMITED</option><option value="GCUL">THE GAUHATI CO-OPERATIVE URBAN BANK LTD</option><option value="HDFC">THE GAYATRI COOPERATIVE URBAN BANK LTD</option><option value="HDFC">THE GHATAL PEOPLES COOPERATIVE BANK LTD</option><option value="YESB">THE GOA STATE CO-OPERATIVE BANK LTD</option><option value="HDFC">THE GOA URBAN CO-OPERATIVE BANK LTD.</option><option value="HDFC">THE GOZARIA NAGRIK SAHAKARI BANK LTD</option><option value="GRAX">THE GRAIN MERCHANTS CO-OPERATIVE BANK</option><option value="GBCB">THE GREATER BOMBAY CO-OP BANK LTD</option><option value="GBCB">THE GREATER BOMBAY CO-OPERATIVE BANK LIMITED</option><option value="GSCB">THE GUJARAT STATE CO-OP BANK LTD</option><option value="UTIB">THE GURDASPUR CENTRAL COOPERATIVE BANK LTD</option><option value="UTIB">THE HASSAN DISTRICT CO-OPERATIVE CENTRAL BANK LTD</option><option value="HDFC">THE HASTI CO-OP. BANK LTD.</option><option value="SVCB">THE HINDUSTHAN CO-OPERATIVE BANK LTD</option><option value="UTIB">THE HOSHIARPUR CENTRAL CO-OPERATIVE BANK LTD</option><option value="APBL">THE HYDERABAD DISTRICT COOPERATIVE BANK LTD</option><option value="IBKL">THE INDUSTRIAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE J AND K STATE CO-OPERATIVE BANK LTD</option><option value="JSAB">THE JAIN SAHAKARI BANK LTD</option><option value="JCCB">THE JAIPUR CENTRAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE JALANDHAR CENTRAL COOPERATIVE BANK LIMITED</option><option value="JPCB">THE JALGAON PEOPLES CO OP BANK LTD</option><option value="WBSC">THE JALPAIGURI CENTRAL CO-OPERATIVE BANK LTD</option><option value="JAKA">THE JAMMU AND KASHMIR BANK LTD</option><option value="YESB">THE JANALAXMI CO-OPERATIVE BANK LTD</option><option value="HDFC">THE JANATA CO-OPERATIVE BANK LTD</option><option value="UTIB">THE JHAJJAR CENTRAL CO-OP BANK LTD</option><option value="UTIB">THE JIND CENTRAL CO OPERATIVE BANK LTD</option><option value="RSCB">THE JODHPUR CENTRAL CO OPERATIVE BANK LTD</option><option value="HDFC">THE JUNAGADH COMMERCIAL CO-OP BANK LTD</option><option value="GSCB">THE JUNAGADH JILLA SAHAKARI BANK LTD</option><option value="APBL">THE KADAPPA DISTRICT CO-OPERATIVE CENTRAL BANK LTD</option><option value="YESB">THE KAIRA DIST CENTRAL CO OPERATIVE BANK LTD</option><option value="HDFC">THE KALNA TOWN CREDIT COOPERATIVE BANK LTD</option><option value="KCCB">THE KALUPUR COMMERCIAL CO-OPERATIVE BANK</option><option value="KJSB0000001">THE KALYAN JANATA SAHAKARI BANK LTD.</option><option value="KSCB">THE KANARA DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option><option value="KACE">THE KANGRA CENTRAL CO-OPERATIVE BANK LTD</option><option value="KANG">THE KANGRA CO-OPERATIVE BANK LTD</option><option value="UTIB">THE KANNUR DISTRICT CO-OPERATIVE BANK LTD </option><option value="TNSC">THE KANYAKUMARI DISTRICT CENTRAL COOPERATIVE BANK </option><option value="KCBL">THE KAPOL CO-OPERATIVE BANK LTD.</option><option value="UTIB">THE KAPURTHALA CENTRAL COOPERATIVE BANK LTD</option><option value="HDFC">THE KARAD JANATA SAHAKARI BANK LTD</option><option value="KUCB">THE KARAD URBAN CO-OP BANK LTD</option><option value="APBL">THE KARIMNAGAR DISTRICT COOPERATIVE CENTRAL BANK</option><option value="KSCB">THE KARNATAKA STATE CO-OPERATIVE APEX BANK LTD.</option><option value="KKBK">THE KARNAVATI CO.OP. BANK LTD</option><option value="IBKL">THE KASARAGOD DISTRICT CO-OPERATIVE BANK LTD</option><option value="KCUB">THE KHATTRI COOPERATIVE URBAN BANK LIMITED</option><option value="KODX">THE KODUNGALLUR TOWN CO-OPERATIVE BANK LTD</option><option value="HDFC">THE KOLHAPUR URBAN CO-OP BANK LTD</option><option value="YESB">THE KOLLAM DISTRICT CO-OP BANK LTD</option><option value="UTIB">THE KOTTAYAM DISTRICT CO-OPERATIVE BANK LTD.</option><option value="APBL">THE KRISHNA DISTRICT COOPERATIVE BANK</option><option value="HDFC">THE KRISHNAGAR CITY CO OPERATIVE BANK LTD</option><option value="TNSC">THE KUMBAKONAM CENTRAL CO-OPERATIVE BANK LTD</option><option value="KNSB">THE KURMANCHAL NAGAR SAHKARI BANK LTD</option><option value="UTIB">THE KURUKSHETRA CENTRAL COOPERATIVE BANK LTD</option><option value="LAVB">THE LAKSHMI VILAS BANK LTD</option><option value="IBKL">THE LATUR DISTRICT CENTRAL CO OP BANK LTD</option><option value="UTIB">THE LUDHIANA CENTRAL COOPERATIVE BANK LTD</option><option value="HDFC">THE MADGAUM URBAN COOPERATIVE BANK LTD</option><option value="TNSC">THE MADURAI DISTRICT CENTRAL COOPERATIVE BANK LTD</option><option value="MCBL">THE MAHANAGAR CO-OP. BANK LTD.</option><option value="HDFC">THE MAHAVEER CO-OPERATIVE BANK LTD</option><option value="YESB">THE MAKARPURA INDUSTRIAL ESTATE COOP BANK LTD</option><option value="HDFC">THE MALAD SAHAKARI BANK LTD</option><option value="IBKL">THE MALAPPURAM DISTRICT CO-OPERATIVE BANK LIMITED</option><option value="HDFC">THE MALKAPUR URBAN CO-OP BANK LTD</option><option value="MABL">THE MALLESHWARAM CO-OP BANK LTD</option><option value="YESB">THE MANIPUR STATE CO OPERATIVE BANK LTD</option><option value="UTIB">THE MANSA CENTRAL CO-OPERATIVE BANK LTD.</option><option value="HDFC">THE MAPUSA URBAN COOPERATIVE BANK OF GOA LTD</option><option value="ICIC">THE MAYANI URBAN CO-OPERATIVE BANK LTD</option><option value="YESB">THE MEGHALAYA COOPERATIVE APEX BANK LTD</option><option value="GSCB">THE MEHSANA DISTRICT CENTRAL CO OP BANK LTD</option><option value="IBKL">THE MEHSANA NAGARIK SAHAKARI BANK LTD</option><option value="MSNU">THE MEHSANA URBAN CO-OPERATIVE BANK</option><option value="MSNU">THE MEHSANA URBAN COOPERATIVE BANK LTD</option><option value="YESB">THE MIZORAM COOPERATIVE APEX BANK LTD</option><option value="UTIB">THE MOGA CENTRAL COOPERATIVE BANK LTD</option><option value="WBSC">THE MUGBERIA CENTRAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE MUKTSAR CENTRAL CO-OPERATED BANK LTD</option><option value="MUBL">THE MUNICIPAL CO-OP BANK LTD</option><option value="WBSC">THE MURSHIDABAD DISTRICT CENTRAL CO-OP BANK LTD.</option><option value="NTBL">THE NAINITAL BANK LIMITED</option><option value="APBL">THE NALGONDA DIST. CO-OP. CENTRAL BANK LTD.</option><option value="IBKL">THE NASIK JILHA MAHILA SAHAKARI BANK LTD</option><option value="NMCB">THE NASIK MERCHANTS COOPERATIVE BANK LTD</option><option value="KKBK">THE NATIONAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE NATIONAL CO-OPERATIVE BANK LTD., BANGALORE</option><option value="ICIC">THE NAV JEEVAN CO-OP BANK LTD</option><option value="HDFC">THE NAVNIRMAN CO-OPERATIVE BANK LTD</option><option value="IBKL">THE NAWANAGAR CO OPERATIVE BANK LTD</option><option value="UTIB">THE NAWANSHAHR CENTRAL COOPERATIVE BANK LTD.</option><option value="HDFC">THE NEW URBAN CO-OPERATIVE BANK LTD RAMPUR</option><option value="TNSC">THE NILGIRIS DISTRICT CENTRAL COOP BANK LTD</option><option value="ORCB">THE ODISHA STATE CO-OPERATIVE BANK LTD</option><option value="HDFC">THE OJHAR MERCHANTS COOP BANK LTD.</option><option value="HDFC">THE PACHORA PEOPLES CO-OP. BANK LTD.PACHORA</option><option value="GSCB">THE PADRA NAGAR NAGRIK SAHAKARI BANK LTD</option><option value="UTIB">THE PANCHKULA CENTRAL CO-OPERATIVE BANK LTD</option><option value="YESB">THE PANCHSHEEL MERCANTILE CO-OP BANK LTD</option><option value="ICIC">THE PANDHARPUR URBAN CO-OP BANK LTD</option><option value="YESB">THE PANIPAT URBAN COOPERATIVE BANK LTD </option><option value="UTIB">THE PATIALA CENTRAL COOPERATIVE BANK LTD.</option><option value="YESB">THE POCHAMPALLY COOPERATIVE URBAN BANK LTD</option><option value="TNSC">THE PONDICHERRY STATE CO-OP BANK LTD</option><option value="APBL">THE PRAKASAM DISTRICT CO-OP CENTRAL BANK LTD</option><option value="UTIB">THE PUNJAB STATE COOPERATIVE BANK LTD</option><option value="RSCB">THE RAJASTHAN STATE CO-OPERATIVE BANK LTD</option><option value="UTIB">THE RAJASTHAN URBAN COOP BANK LTD ACH</option><option value="HDFC">THE RAJPUTANA MAHILA URBAN CO OPERATIVE BAK LTD</option><option value="YESB">THE RAJSAMAND URBAN CO OP BANK LTD</option><option value="TNSC">THE RAMANATHAPURAM DISTRICT CENTRAL CO OP BANK LTD</option><option value="UTIB">THE REWARI CENTRAL COOPERATIVE BANK LTD</option><option value="UTIB">THE ROHTAK CENTRAL CO-OPERATIVE BANK LTD</option><option value="UTIB">THE ROPAR CENTRAL COOPERATIVE BANK</option><option value="UTIB">THE S.A.S NAGAR CENTRAL COOPERATIVE BANK LTD.</option><option value="GSCB">THE SABARKANTHA DISTRICT CENTRAL COOP BANK LTD</option><option value="SAHE">THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.</option><option value="SVCB">THE SAHYADRI SAHAKARI BANK LTD</option><option value="TNSC">THE SALEM DISTRICT CENTRAL CO-OPERATIVE  BANK LTD</option><option value="YESB">THE SANGHAMITRA CO OP URBAN BANK LTD,</option><option value="UTIB">THE SANGRUR CENTRAL CO-OPERATIVE BANK LTD.</option><option value="HDFC">THE SANTRAGACHI CO OPERATIVE BANK LTD</option><option value="SNGX">THE SARANGPUR CO-OPERATIVE BANK LTD.</option><option value="SRCB">THE SARASWAT CO-OPERATIVE BANK LTD</option><option value="YESB">THE SARVODAYA SAHAKARI BANK LTD</option><option value="IBKL">THE SATARA DISTRICT CENTRAL CO-OPERATIVE BANK LTD.</option><option value="SSBL">THE SATARA SHAKARI BANK LTD</option><option value="SVBL">THE SEVA VIKAS CO-OP.BANK LTD.</option><option value="SVCB">THE SHAMRAO VITAL CO-OPERATIVE BANK</option><option value="KKBK">THE SHIRPUR PEOPLES CO-OP BANK LTD</option><option value="TNSC">THE SIVAGANGAI DISTRICT CENTRAL COOP BANK LTD</option><option value="HDFC">THE SOCIAL CO-OP. BANK LTD.</option><option value="YESB">THE SOLAPUR DISTRICT CENTRAL CO-OP. BANK LTD</option><option value="UTIB">THE SONEPAT CENTRAL CO OPERATIVE BANK LTD</option><option value="IBKL">THE SONEPAT URBAN CO-OP.BANK LTD.</option><option value="IBKL">THE SOUTH CANARA DISTRICT CENTRAL CO-OP BANK LTD</option><option value="SDCB0000000">THE SURAT DISTRICT CO OPERATIVE BANK LTD.</option><option value="SDCB">THE SURAT DISTRICT CO-OP BANK</option><option value="YESB">THE SURAT MERCANTILE COOP BANK LTD</option><option value="SPCB">THE SURAT PEOPLES CO-OP. BANK LTD.</option><option value="SUTB">THE SUTEX CO-OP.BANK LTD.</option><option value="UTIB">THE TARN TARAN CENTRAL COOPERATIVE BANK LTD</option><option value="YESB">THE TEXTILE CO OPERATIVE BANK OF SURAT LTD</option><option value="TDCB">THE THANE DIST. CENTRAL CO-OP. BANK LTD</option><option value="TJSB">THE THANE JANATA SAHAKARI BANK LTD</option><option value="IBKL">THE THIRUVANANTHAPURAM DISTRICT CO-OP BANK LTD</option><option value="TNSC">THE THIRUVANNAMALAI DISTRICT CENTRAL COOP BANK LTD</option><option value="TNSC">THE THOOTHUKUDI DISTRICT CENTRAL COOP BANK LTD</option><option value="TNSC">THE TIRUCHIRAPALLI DIST. CENT COOPERATIVE BANK LTD</option><option value="TNSC">THE TIRUNELVELI DISTRICT CENTRAL CO-OP BANK LTD </option><option value="TCUB">THE TRIVANDRUM CO-OPERATIVE URBAN BANK LTD</option><option value="RSCB">THE UDAIPUR CENTRAL CO-OPERATIVE BANK LTD</option><option value="YESB">THE UDAIPUR MAHILA SAMRIDHI URBAN CO-OP BANK LTD</option><option value="ICIC">THE UDAIPUR MAHILA URBAN CO-OP BANK LTD</option><option value="YESB">THE UDAIPUR URBAN CO-OP BANK LTD</option><option value="HDFC">THE UMRETH URBAN CO OPERATIVE BANK LTD</option><option value="HDFC">THE UNION CO-OPERATIVE BANK LTD</option><option value="UCBS">THE UTKAL COOPERATIVE BANKING SOCIETY LTD</option><option value="YESB">THE VAISH CO-OPERATIVE NEW BANK LTD</option><option value="VARA">THE VARACHHA CO-OP BANK LTD</option><option value="TNSC">THE VELLORE DISTRICT CENTRAL CO-OP BANK LTD.</option><option value="HDFC">THE VIJAY CO OPERATIVE BANK LTD</option><option value="TNSC">THE VILLUPURAM DISTRICT CENTRAL CO-OP BANK LTD</option><option value="TNSC">THE VIRUDHUNAGAR DISTRICT CENTRAL CO-OP BANK LTD.,</option><option value="VSBL">THE VISHWESHWAR SAHAKARI BANK LTD </option><option value="SVCB">THE WAI URBAN CO OP BANK LTD</option><option value="APBL">THE WARANGAL DISTRICT COOPERATIVE CENTRAL BANK LTD</option><option value="HDFC">THE WASHIM URBAN CO-OPERATIVE BANK LTD.</option><option value="FDRL">THE WAYANAD DISTRICT CO-OPERATIVE BANK LTD.</option><option value="WBSC">THE WEST BENGAL STATE CO-OP BANK LTD</option><option value="UTIB">THE YAMUNA NAGAR CENTRAL CO OPERATIVE BANK LTD</option><option value="HDFC">THE YASHWANT CO-OP BANK LTD</option><option value="ZCBL">THE ZOROASTRIAN CO-OPERATIVE BANK LTD</option><option value="IBKL">THRISSUR DISTRICT COOPERATIVE BANK LTD</option><option value="HDFC">TIRUPATI URBAN CO-OP. BANK LTD.</option><option value="TJSB">TJSB SAHAKARI BANK LTD</option><option value="YESB">TRANSPORT CO-OPERATIVE BANK LTD</option><option value="UTBI">TRIPURA GRAMIN BANK</option><option value="ICIC">TRIPURA STATE COOPERATIVE BANK LTD</option><option value="TGMB">TUMKUR GRAIN MERCHANTS CO-OPERATE BANK LTD</option><option value="UCBA">UCO BANK</option><option value="ICIC">UDHAM SINGH NAGAR DISTRICT CO OPERATIVE BANK LTD</option><option value="YESB">UMA CO OPERATIVE BANK LTD</option><option value="YESB">UMIYA URBAN CO OPERATIVE BANK LTD</option><option value="UBIN0000000">UNION BANK OF INDIA</option><option value="UTBI0000000">UNITED BANK OF INDIA</option><option value="HDFC">UNIVERSAL CO-OPERATIVE URBAN BANK LTD.</option><option value="ICIC">URBAN CO OPERATIVA BANK LTD, SIDDHARTHNAGAR</option><option value="IBKL">URBAN CO-OPERATIVE BANK LTD. BAREILLY</option><option value="IBKL">URBAN CO-OPERATIVE BANK LTD., DEHRADUN</option><option value="YESB">URBAN COOPERATIVE BANK LTD BASTI</option><option value="SBIN">UTKAL GRAMEEN BANK</option><option value="CBIN">UTTAR BIHAR GRAMIN BANK</option><option value="ICIC">UTTAR PRADESH CO-OPERATIVE BANK LTD</option><option value="ICIC">UTTARAKHAND STATE COOPERATIVE BANK LTD</option><option value="SBIN">UTTARANCHAL GRAMIN BANK</option><option value="CBIN">UTTARBANGA KSHETRIYA GRAMIN BANK</option><option value="YESB">UTTARKASHI ZILA SAHKARI BANK LTD</option><option value="HDFC">UTTRAKHAND COOPERATIVE BANK LTD</option><option value="GSCB">VALSAD DISTRICT CENTRAL CO-OP BANK LTD</option><option value="SBIN">VANANCHAL GRAMIN BANK</option><option value="HDFC">VARDHAMAN (MAHILA) CO-OP. URBAN BANK LTD.</option><option value="HDFC">VASAI JANATA SAHAKARI BANK LTD</option><option value="VVSB">VASAI VIKAS SAHAKARI BANK LTD</option><option value="BKID">VIDHARBHA KOKAN GRAMIN BANK</option><option value="SVCB">VIDYA SAHAKARI BANK LTD</option><option value="WBSC">VIDYASAGAR CENTRAL CO-OPERATIVE BANK LTD</option><option value="KKBK">VIJAY COMMERCIAL CO OPERATIVE BANK LTD</option><option value="VIJB">VIJAYA BANK</option><option value="HDFC">VISHWAS CO-OP BANK LTD.</option><option value="ICIC">VIVEKANAND NAGRIK SAHKARI BANK MYDT</option><option value="YESB">VYAPARIK AUDHYOGIK SAHAKARI BANK KTD</option><option value="YESB">VYAVSAYAK SAHKARI BANK LTD</option><option value="WAUX">WARDHAMAN URBAN CO-OPERATIVE BANK LTD, NAGPUR</option><option value="YESB">YADAGIRI LAKSHMI NARASIMHA SWAMY CO-OP. URBAN BANK LTD</option><option value="YESB">YAVATMAL DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option><option value="YESB0000000">YES BANK LTD.</option><option value="HDFC">YOUTH DEVELOPMENT CO-OPERATIVE BANK LTD.</option><option value="ZSBL">ZILA SAHAKARI BANK LTD GHAZIABAD</option><option value="ICIC">ZILA SAHAKARI BANK LTD LAKHIMPUR KHERI</option><option value="ICIC">ZILA SAHAKARI BANK LTD, HARIDWAR</option><option value="ICIC">ZILA SAHAKARI BANK LTD., BIJNOR</option><option value="ICIC">ZILA SAHAKARI BANK LTD., MEERUT</option><option value="ICIC">ZILA SAHKARI BANK LTD BULANDSHAHAR</option><option value="ICIC">ZILA SAHKARI BANK LTD GARHWAL KOTDWAR</option><option value="ICIC">ZILA SAHKARI BANK LTD JHANSI</option><option value="ICIC">ZILA SAHKARI BANK LTD MIRZAPUR</option><option value="ICIC">ZILA SAHKARI BANK LTD MORADABAD</option><option value="ICIC">ZILA SAHKARI BANK LTD.BAREILLY</option></select>                        <input type="hidden" id="beneficiaryform-hidden_bank_name" class="form-control" name="BeneficiaryForm[hidden_bank_name]">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="field-beneficiaryform-beneficiary_ifsc_code">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite ifsc"></i></span><input type="text" id="beneficiaryform-beneficiary_ifsc_code" class="form-control" name="BeneficiaryForm[beneficiary_ifsc_code]" maxlength="11" placeholder="Beneficiary IFSC code"></div><div class="help-block"></div>
</div>                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="field-beneficiaryform-beneficiary_account_no">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite account-number"></i></span><input type="text" id="beneficiaryform-beneficiary_account_no" class="form-control integerOnly" name="BeneficiaryForm[beneficiary_account_no]" maxlength="20" onkeypress="return isNumberKey(event)" placeholder="Beneficiary Account Number"></div><div class="help-block"></div>
</div>                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="field-beneficiaryform-beneficiary_mdn required">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite mobile-number"></i></span><input type="text" id="beneficiaryform-beneficiary_mdn" class="form-control integerOnly nozero checkNumber" name="BeneficiaryForm[beneficiary_mdn]" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Beneficiary Mobile Number"></div><div class="help-block"></div>
</div>                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="field-beneficiaryform-amount required">
<div class="input-group"> <span class="input-group-addon rupee">&#8377;</span><input type="text" id="beneficiaryform-amount" class="form-control integerOnly nozero" name="BeneficiaryForm[amount]" value="" maxlength="6" placeholder="Enter Amount"></div><div class="help-block"></div>
</div>                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mar-top-10">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mar-top-10 hide">
                        <button type="button" id="cancel-button" class="btn btn-grey btn-block" name="add-button">Cancel</button>                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mar-top-10">
                        <button type="submit" class="btn btn-primary btn-block p2a-btn" name="add-button">Submit</button>                    </div>
                    </div>            
                </div>
            </div>
                    </form>                </div>
                <div role="tabpanel" class="tab-pane" id="beneficiaryMmid">
                    <div>
                        <div role="tabpanel" class="tab-pane" id="mmid">
                        <form id="form-beneficiary-mmid" action="/moneytransfer/send-to-bank" method="post">
<input type="hidden" name="_csrf" value="WXVIcHN1LnM3QiAJNUN.MjMEMCpAMFsbKxM4SBs7QgA6ACUFQSRCQg==">                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="WalletToAccount[selected_beneficiary]" id="selected_beneficiary">
                                    <div class="field-beneficiaryform-amount required">
<div class="input-group"><span class="input-group-addon rupee">&#8377;</span><input type="text" id="mmid-beneficiaryform-amount" class="form-control  integerOnly nozero" name="BeneficiaryForm[amount]" maxlength="6" placeholder="Enter Amount"></div><div class="help-block"></div>
</div>                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="field-beneficiaryform-beneficiary_name required">
<div class="input-group"><span class="input-group-addon"><i class="form-icon sprite full-name"></i></span><input type="text" id="bene_mmid_beneficiary_name" class="form-control nameOnly" name="BeneficiaryForm[beneficiary_name]" placeholder="Enter Beneficiary Name"></div><div class="help-block"></div>
</div>                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="field-beneficiaryform-beneficiary_mdn required">
<div class="input-group"><span class="input-group-addon">+91</span><input type="text" id="beneficiaryform-mmid-mdn" class="form-control integerOnly nozero checkNumber" name="BeneficiaryForm[beneficiary_mdn]" maxlength="10" placeholder="Beneficiary Mobile Number"></div><div class="help-block"></div>
</div>                            
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="field-beneficiaryform-bank_mmid">
<div class="input-group"><input type="text" id="beneficiaryform_mmid_no" class="form-control  integerOnly mar-bottom-5" name="BeneficiaryForm[bank_mmid]" maxlength="7" placeholder="Bank MMID" autocomplete="off"></div><div class="help-block"></div>
</div>                                </div>
                            </div>
                        </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                       
                               <button type="button" id="beneficiary-mmid-submit-button" class="btn btn-primary btn-block sssss">Submit</button>                    </div>
                    <div class="clearfix"></div>
                    </form>                </div>
                    </div>
                </div>
            </div>   
                        </div>
                        </div>
    </form> 
</div>
<!-- Moner Transfer End -->

<!-- IRCTC -->
<div role="tabpanel" class="tab-pane fade" id="irctc">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>IRCTC</p>
            	</div>
</div>
    <form id="form-bus" action="" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">                    
                                  <div class="field-bus_from required">
<div class="input-group"><span class="input-group-addon">from</span><input type="text" id="bus_from" class="form-control" name="bus[from]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                      
                </div>
        
            </div>           
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                <div class="field-bus_to required">
<div class="input-group"><span class="input-group-addon">To</span><input type="text" id="bus_to" class="form-control" name="bus[to]" placeholder="Enter From Address."></div><div class="help-block"></div>
</div>                
                </div>
        
            </div>
            
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-bus_date required">
<div class="input-group"><span class="input-group-addon">Date</span><input type="text" id="single_cal4" class="form-control" name="bus[date]" placeholder="Enter the Date."></div><div class="help-block"></div>
</div>                
                </div>
        
            </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="bus_booking_container">
                <button type="button" id="button-bus-booking" class="btn btn-primary btn-block ">Booking the Ticket</button>            </div>
    
         </div>
        </div>
    </form> 
</div>
<!-- IRCTC End -->

<!-- Insurance -->
<div role="tabpanel" class="tab-pane fade" id="insurance">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div style="font-size: 25px;" class="text-center">
                <p>INSURANCE</p>
            	</div>
</div>
    <form id="form-bus" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="clearfix"></div>
            <div class="space"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">                    
                        <div class="field-insurance_number required">
<div class="input-group"><span class="input-group-addon" required>+91</span><input type="text" id="insurance_number" class="form-control integerOnly nozero checkNumber" name="insurance[number]" maxlength="10" placeholder="Enter Mobile No." data-number="mobile no." autocomplete="off"></div><div class="help-block"></div>
</div>                
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-insurance-operator required">
<select id="insurance-operator" class="form-control  with-arrow" name="insurance[operator]">
<option value="">Select Insurence</option>
<option value="m">m</option>
</select><div class="help-block"></div>
</div>                </div>
                
            </div>
            <div class="clearfix"></div>
 
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group operator-name">
                        <div class="field-insurance-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="insurance-amount" class="form-control integerOnly nozero" name="insurance[amount]" maxlength="5" placeholder="Enter Amount"></div><div class="help-block"></div>
</div>                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="insurance_sub_container">
                <button type="button" id="button-mobile-recharge" class="btn btn-primary btn-block ">Apply</button>            </div>
         </div>
        </div>
    </form> 
</div>
<!-- Insurance End -->

          </div>
        </section>
        <!-- Form Section End -->

       
        <!-- SlideBar Section -->
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 slider_Block" style="padding-right: 0px;padding-left: 0px;">
             <iframe src="slider.html" style="width: 100%;height: 305px; overflow: hidden; "></iframe>
    </div>
    <!-- Slider section End -->
         <!-- Footer Block -->
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 footer_Block" style="padding-right: 0px;padding-left: 0px;">
<div class="footer_content">
<div class="col-sm-4 col-xs-12 col-lg-4 col-md-4 footer_sections">
  We will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mappingWe will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mapping.
</div>
<div class="col-sm-4 col-xs-12 col-lg-4 col-md-4 footer_sections">
We will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mappingWe will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mapping.
</div>
<div class="col-sm-4 col-xs-12 col-lg-4 col-md-4 footer_sections">
  We will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mappingWe will be using the entire collected works of Shakespeare as our example data. In order to make the best use of Kibana you will likely want to apply a mapping.
</div>
</div>
<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center footer_rides" style="padding-right: 0px;padding-left: 0px;">
  <p>&copy; 2015 Paytm.com<p>
</div>
</div>
<!-- Footer Block End-->
      </div>   
      
</body>
</html>