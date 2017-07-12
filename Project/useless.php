                        <!-- DTH -->
                  <div role="tabpanel" class="tab-pane fade" id="dth">
    <form id="dth_form" action="ajax_transaction_dth.php" method="post">
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
<input type="text" id="subscriber_id" class="form-control integerOnly checkCardNumber" name="subscriber_id" maxlength="12" placeholder="Subscriber ID" data-number="subscriber ID." autocomplete="off">
<div class="help-block dth_number_error"></div>
</div>                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <div class="field-dthrecharge-operator required">
<select id="operator_ids" class="form-control" name="operator_ids">
<?php 
		  $service_ids=3;
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
 <option value="<?php echo $row2->operator_code; ?>"><?php echo $row2->operator_name;?></option>
<?php
			 }}
		?>
</select>
<div class="help-block dth_operator_error"></div>
</div>                </div>
               </div>
			   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group add_client_ids">
                       
            <div class="input-group"><input type="hidden" value="<?php echo $_SESSION['add_client_ids']?>" id="add_client_ids" class="form-control" name="add_client_ids">
			<input type="hidden" value="<?php echo $service_ids=1;?>" id="service_ids" class="form-control" name="service_ids">
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
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                        <div class="field-dthrecharge-amount required">
<div class="input-group"><span class="input-group-addon rupee">₹</span><input type="text" id="amount" class="form-control integerOnly nozero" name="amount" maxlength="5" placeholder="Enter Amount"></div>
<div class="help-block dth_amount_error"></div>
</div>
         </div>
            </div>
            <div class="clearfix"></div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="dth_recharge_sub_container">
           <input type="submit" id="button-dth-recharge" class="btn btn-primary btn-block">           </div>          

        </div>
    </form>
    </div>                        

    <!-- DTH End -->