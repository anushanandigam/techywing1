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

      /*Mobile Validations*/

      /*Mobile Number*/
       $("#mobilerecharge-service_number").keyup(function(){
          var mobile_number=$(this).val();
          if(mobile_number==0 || mobile_number==1 || mobile_number==2 || 
            mobile_number==3 || mobile_number==4 || mobile_number==5 || mobile_number==6 || isNaN(mobile_number)){
            $(this).val("");
          } 
        }).blur(function(){
          var mobile_number=$(this).val();
          if(mobile_number==""){
           $(".mobile_number_error").html("Can't Left This Blank");
          } else if(mobile_number.length<10 || mobile_number.length>10){
            $(".mobile_number_error").html("Please Enter Correct Number");
          } else{
            $(".mobile_number_error").html("");
          }
        });


        /*Amount*/
        $("#mobilerecharge-amount").keyup(function(){
          var mobile_amount=$(this).val();
          if(isNaN(mobile_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var mobile_amount=$(this).val();
          if(mobile_amount==""){
            $(".amount_error").html("Can't Left This Blank");
          } else{
            $(".amount_error").html("");
          }
        });


        /*Operator*/
        $("#mobilerecharge-operator").change(function(){
         var mobile_operator=$(this).val();
         if(mobile_operator==""){
          $(".mobile_operator_error").html("Please Select Operator");
         } else{
          $(".mobile_operator_error").html("");
         }
        })


        /*Button*/

         /* $("#button-mobile-recharge").click(function(){
      var mobile_number=$("#mobilerecharge-service_number").val();
        var mobile_amount=$("#mobilerecharge-amount").val();
        var mobile_operator=$("#mobilerecharge-operator").val();
        if(mobile_number==""){
          $(".mobile_number_error").html("Can't Left This Blank");
        } else if(mobile_amount==""){
          $(".amount_error").html("Can't Left This Blank");
        } else if(mobile_operator==""){
          $(".mobile_operator_error").html("Please Select Operator");
        }
        });*/
      
      /*Mobile Validations End*/


      /*Electricty Validations*/

      /*Operator*/
      $("#electricitybillpayment-operator").change(function(){
         var electricity_operator=$(this).val();
         if(electricity_operator==""){
          $(".electricity_operator_error").html("Please Select Operator");
         } else{
          $(".electricity_operator_error").html("");
         }
      });

      /*Amount*/
        $("#electricitybillpayment-amount").keyup(function(){
          var electricity_amount=$(this).val();
          if(isNaN(electricity_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var electricity_amount=$(this).val();
          if(electricity_amount==""){
            $(".electricity_amount_error").html("Can't Left This Blank");
          } else{
            $(".electricity_amount_error").html("");
          }
        });
      /*Electricty Validations End*/

      /*DTH VALIDATIONS*/

      /*Subsriber Id*/
      $("#dthrecharge-service_number").keyup(function(){
          var dth_id=$(this).val();
          if(isNaN(dth_id)){
            $(this).val("");
          }
        }).blur(function(){
          var dth_id=$(this).val();
          if(dth_id==""){
            $(".dth_number_error").html("Can't Left This Blank");
          } else{
            $(".dth_number_error").html("");
          }
        });

        /*Operator*/
        $("#DthRechargeharge-operator").change(function(){
         var dth_operator=$(this).val();
         if(dth_operator==""){
          $(".dth_operator_error").html("Please Select Operator");
         } else{
          $(".dth_operator_error").html("");
         }
      });

        /*Amount*/
        $("#dthrecharge-amount").keyup(function(){
          var dth_amount=$(this).val();
          if(isNaN(dth_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var dth_amount=$(this).val();
          if(dth_amount==""){
            $(".dth_amount_error").html("Can't Left This Blank");
          } else{
            $(".dth_amount_error").html("");
          }
        });
      /*DTH VALIDATIONS END*/


      /*LANDLINE VALIDATIONS*/

      /*Operator*/
      $("#landlinerecharge-operator").change(function(){
         var ll_operator=$(this).val();
         if(ll_operator==""){
          $(".landline_operator_error").html("Please Select Operator");
         } else{
          $(".landline_operator_error").html("");
         }
      });

      /*Number*/
      $("#landlinerecharge-service_number").keyup(function(){
          var landline_number=$(this).val();
          if(isNaN(landline_number)){
            $(this).val("");
          } 
        }).blur(function(){
          var landline_number=$(this).val();
          if(landline_number==""){
           $(".landline_number_error").html("Can't Left This Blank");
          } else if(landline_number.length<10 || landline_number.length>10){
            $(".landline_number_error").html("Please Enter Correct Number");
          } else{
            $(".landline_number_error").html("");
          }
        });

        /*Circle*/
        $("#landlinerecharge-circle").change(function(){
         var ll_circle=$(this).val();
         if(ll_circle==""){
          $(".landline_circle_error").html("Please Select Operator");
         } else{
          $(".landline_circle_error").html("");
         }
      });

        /*Amount*/
        $("#landlinerecharge-amount").keyup(function(){
          var ll_amount=$(this).val();
          if(isNaN(ll_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var ll_amount=$(this).val();
          if(ll_amount==""){
            $(".ll_amount_error").html("Can't Left This Blank");
          } else{
            $(".ll_amount_error").html("");
          }
        });
      /*LANDLINE VALIDATIONS END*/

      /*DATACARD VALIDATIONS*/

      /*Number*/
       $("#datacardrecharge-service_number").keyup(function(){
          var datacard_number=$(this).val();
          if(isNaN(datacard_number)){
            $(this).val("");
          }
        }).blur(function(){
          var datacard_number=$(this).val();
          if(datacard_number==""){
           $(".datacard_number_error").html("Can't Left This Blank");
          } else{
            $(".datacard_number_error").html("");
          }
        });

        /*Operator*/
        $("#datacardrecharge-operator").change(function(){
         var datacard_operator=$(this).val();
         if(datacard_operator==""){
          $(".datacard_operator_error").html("Please Select Operator");
         } else{
          $(".datacard_operator_error").html("");
         }
      });


        /*Amount*/
        $("#datacardrecharge-amount").keyup(function(){
          var datacard_amount=$(this).val();
          if(isNaN(datacard_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var datacard_amount=$(this).val();
          if(datacard_amount==""){
            $(".datacard_amount_error").html("Can't Left This Blank");
          } else{
            $(".datacard_amount_error").html("");
          }
        });

      /*DATACARD VALIDATIONS END*/

      /*BUS VALIDATIONS*/

      /*Bus From*/
      $("#bus_from").blur(function(){
        var bus_from=$(this).val();
        if(bus_from==""){
          $(".bus_from_error").html("Can't Left This Blank");
        } else{
          $(".bus_from_error").html("");
        }
      })

      /*Bus To*/
      $("#bus_to").blur(function(){
        var bus_to=$(this).val();
        if(bus_to==""){
          $(".bus_to_error").html("Can't Left This Blank");
        } else{
          $(".bus_to_error").html("");
        }
      });

      /*Bus Date*/
      $("#bus_date").change(function(){
        alert($(this).val());
      })
      /*BUS VALIDATIONS END*/

      /*GAS VALIDATIONS*/

      /*Operator*/
      $("#gasbillpayment-operator").change(function(){
         var gasbillpayment_operator=$(this).val();
         if(gasbillpayment_operator==""){
          $(".gasbillpayment_operator_error").html("Please Select Operator");
         } else{
          $(".gasbillpayment_operator_error").html("");
         }
      });

      /*Amount*/
      $("#gasbillpayment-amount").keyup(function(){
          var gasbillpayment_amount=$(this).val();
          if(isNaN(gasbillpayment_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var gasbillpayment_amount=$(this).val();
          if(gasbillpayment_amount==""){
            $(".gasbillpayment_amount_error").html("Can't Left This Blank");
          } else{
            $(".gasbillpayment_amount_error").html("");
          }
        });

      /*GAS VALIDATIONS END*/

      /*BROADBAND VALIDATIONS*/

      /*Operator*/
      $("#broadbandbillpayment-operator").change(function(){
         var broadbandbillpayment_operator=$(this).val();
         if(broadbandbillpayment_operator==""){
          $(".broadbandbillpayment_operator_error").html("Please Select Operator");
         } else{
          $(".broadbandbillpayment_operator_error").html("");
         }
      });

      /*Amount*/
      $("#broadbandbillpayment-amount").keyup(function(){
          var broadbandbillpayment_amount=$(this).val();
          if(isNaN(broadbandbillpayment_amount)){
            $(this).val("");
          }
        }).blur(function(){
          var broadbandbillpayment_amount=$(this).val();
          if(broadbandbillpayment_amount==""){
            $(".broadbandbillpayment_amount_error").html("Can't Left This Blank");
          } else{
            $(".broadbandbillpayment_amount_error").html("");
          }
        });

      /*BROADBAND VALIDATIONS END*/

      /*HOTEL VALIDATIONS*/

      /*City*/
      $("#hotel_city").blur(function(){
        var hotel_city=$(this).val();
        if(hotel_city==""){
          $(".hotel_city_error").html("Can't Left This Blank");
        } else{
          $(".hotel_city_error").html("");
        }
      })
      /*HOTEL VALIDATIONS END*/

      /*FLIGHT VALIDATIONS*/

      /*flight From*/
      $("#flight_from").blur(function(){
        var flight_from=$(this).val();
        if(flight_from==""){
          $(".flight_from_error").html("Can't Left This Blank");
        } else{
          $(".flight_from_error").html("");
        }
      })

      /*flight To*/
      $("#flight_to").blur(function(){
        var flight_to=$(this).val();
        if(flight_to==""){
          $(".flight_to_error").html("Can't Left This Blank");
        } else{
          $(".flight_to_error").html("");
        }
      });

      /*flight Date*/
      $("#flight_date").change(function(){
        alert($(this).val());
      })
      /*FLIGHT VALIDATIONS END*/


      /*MOVIE VALIDATIONS*/

      /*City*/
      $("#movie_city").blur(function(){
        var movie_city=$(this).val();
        if(movie_city==""){
          $(".movie_city_error").html("Can't Left This Blank");
        } else{
          $(".movie_city_error").html("");
        }
      })

      /*MOVIE VALIDATIONS END*/

      });

$(document).ready(function(){
  /*Bus Date*/
     $("#bus_date").datepicker({
   changeMonth: true,
     changeYear: true

});

     $('#bus_date').datepicker({
    beforeShow: function (textbox, instance) {
            instance.dpDiv.css({
            marginTop: (-textbox.offsetHeight) + 'px',
                   
            });
    }
}); 
      /*Bus Date End*/

    /*Flight Date*/
     $("#flight_date").datepicker({
   changeMonth: true,
     changeYear: true

});

     $('#flight_date').datepicker({
    beforeShow: function (textbox, instance) {
            instance.dpDiv.css({
            marginTop: (-textbox.offsetHeight) + 'px',
                   
            });
    }
}); 
    /*Flight Date End*/
  })
    