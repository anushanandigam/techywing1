                <!-- Mobile -->
                  <div id="mobile" class="tab-pane fade in active">
                    <div role="tabpanel" class="tab-pane fade in active" id="mobile">
    <form id="form-mobile-recharge" action="" method="post">
        <div class="row electricity-overflow">
            <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <div class="form-group">
                <div class="col-md-offset-1">
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
      <input type="text" id="mbl_num" class="form-control integerOnly nozero checkNumber" name="mbl_num" minlength="10" maxlength="10" placeholder="Enter Mobile No." data-number="mobile no." autocomplete="off" pattern="^[0-9]+$">
      </div>
      <div class="help-block mobile_number_error"></div>
      </div>                  
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group operator-name">
                       <div class="field-mobilerecharge-amount required">
            <div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="amount" class="form-control integerOnly nozero" name="amount" maxlength="5" placeholder="Enter Amount"></div><div class="help-block amount_error"></div>
            </div>                
            </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                <div class="field-mobilerecharge-operator required">
          <select id="operator_ids" class="form-control  with-arrow" name="operator_ids">
		  
		  
		  <?php 
		  $service_ids=1;
			$sql1 =$conn->prepare('select * from operator where service_ids=?');
			 $sql1->bindParam(1,$service_ids);
			 	if($sql1->execute())
			 {
				 ?>
				  <option value="">Select Operator</option>
				  <?php
				//echo $count= $sql1->rowCount();
				while($row2=$sql1->fetch(PDO::FETCH_OBJ))
	          { 
				 ?>
				 
				 <option value="<?php echo $row2->operator_id; ?>"><?php echo $row2->operator_name;?></option>
<?php
			 }}
		?>
         
         
          </select><div class="help-block mobile_operator_error"></div>
          </div>
        </div>
            </div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group add_client_ids">
                       
            <div class="input-group"><input type="hidden" value="<?php echo $_SESSION['add_client_ids']?>" id="add_client_ids" class="form-control" name="add_client_ids"></div>               
            </div>
            </div>
			
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group add_client_ids">
                       
            <div class="input-group"><input type="hidden" value="<?php echo $_SESSION['add_retailer_ids']?>" id="add_retailer_ids" class="form-control" name="add_retailer_ids"></div>               
            </div>
            </div>
			
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group add_retailer_ids">
                       
            <div class="input-group"><input type="hidden" id="date" class="form-control" name="date"></div>               
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