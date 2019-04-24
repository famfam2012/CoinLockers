@extends('JS_Locker') @section('Js')
<style>
body {
	background-image:
		url('/CoinLocker/resources/views/js/html-color-codes-color-tutorials-hero-00e10b1f.jpg');
	width: auto;
	height: 1000px;
}
</style>
<div class="content-section" id="services">
	<div class="container">
		<div class="row">
			<div class="title m-b-md col-md-12 text-center">
				Coin Locker
				<p></p>
			</div>


			<!-- /.heading-section -->
		</div>

		<!-- /.row -->
		<div class="row">

			<div class="col-md-12 ">
				<div class="service-item" id="service-3">

					<?php
                    date_default_timezone_set("Asia/Bangkok");
                    $starttime = date("H:i:s d:m:Y ", strtotime($Coin_locker_time_start));
                    $timenow = now();
                    $endtime = date("H:i:s d:m:Y", strtotime($timenow));
                    $hour1 = date("01:00");
                    // $hour=date("H:i",strtotime($hour1));
                    $timediff = (((strtotime($timenow) - 25200) - (strtotime($Coin_locker_time_start))));
                    // echo $hour;
                    // echo "<br>";
                    // echo $timezone=strtotime($timetest=date("07:00:00"));
                    // $time_ok=$timediff-$timezone;
                    // $time_ok=(date($endtime)-date($starttime));
                    // echo $time_ok;
                    ?>
					<br>
					<h5>Number locker : <?php echo $Coin_locker_number?></h5>
					<h5>Time start : <?php echo $starttime ?></h5>
					<h5>Time end : <?php echo $endtime;?></h5>
					<?php $timeuse=date("H:i:s ",$timediff);?>
					<h5>Time use : <?php echo $timeuse;?></h5>			
					<?php
                    $price_time = date("H", (strtotime($timeuse)));
                    // echo "<br>";
                    $price_time1 = date("H:i", (strtotime($timeuse)));
                    // echo "<".$hour1;
                    ?>
                    <?php
                    if ($price_time1 < $hour1) {
                        $all_price = $Coin_locker_hour_first;
                    } else if ($price_time1 > $hour1) {
                        $all_price = (($price_time) * $Coin_locker_hour_next) + $Coin_locker_hour_first;
                    }
                    ?>
						<h5>Service price: <?php echo $all_price;?>&nbsp;Bath</h5>
					<br> <input id="next" onclick="show_pay()" type="button"
						class="btn btn-success col-md-12 " value="Pay">
				</div>
			</div>
		</div>
		<br> <br>

		<div class="col-md-12">
			<div class="service-item" id="service-2" style="display: none;">
			<br>
				<h5 class="card-text" id="price">Balance is : <?php echo $all_price;?></h5>
				<br>
				<div class="form-group">
					<p class="card-text">
						BILL :
						<button id="b_20" onclick="check_money(20)" type="button"
							class="btn btn-success ">20</button>
						<button id="b_50" onclick="check_money(50)" type="button"
							class="btn btn-info ">50</button>
						<button id="b_100" onclick="check_money(100)" type="button"
							class="btn btn-danger ">100</button>
						<button id="b_500" onclick="check_money(500)" type="button"
							class="btn btn-primary ">500</button>
						<button id="b_1000" onclick="check_money(1000)" type="button"
							class="btn btn-warning ">1000</button>
					</p>
				</div>
				<div class="form-group">
					<p class="card-text">
						COIN :
						<button id="c_1" onclick="check_money(1)" type="button"
							class="btn btn-danger " name="button">1</button>
						<button id="c_2" onclick="check_money(2)" type="button"
							class="btn btn-info " name="button">2</button>
						<button id="c_5" onclick="check_money(5)" type="button"
							class="btn btn-success " name="button">5</button>
						<button id="c_10" onclick="check_money(10)" type="button"
							class="btn btn-warning " name="button">10</button>
					</p>
				</div>
				<br>

				<div id="show2" style="display: none;">
					<div class="form-group">
						<h5 class="card-text">Change</h5>
						<h6 id="change_1000"></h6>
						<h6 id="change_500"></h6>
						<h6 id="change_100"></h6>
						<h6 id="change_50"></h6>
						<h6 id="change_20"></h6>
						<h6 id="change_10"></h6>
						<h6 id="change_5"></h6>
						<h6 id="change_2"></h6>
						<h6 id="change_1"></h6>
						<br>
						<form action="{{url('withdraw_ok')}}" medthod="post">
						<input type="hidden" name="timeuse" value="<?php echo $timeuse;?>"></input>
						<input type="hidden" name="endtime" value="<?php echo $timenow;?>"></input>
						<input type="hidden" name="all_price" value="<?php echo $all_price;?>"></input>
						<input type="hidden" name="id_log" value="<?php echo $Coin_locker_using_id;?>"></input>
						<input type="hidden" name="lokcer" value="<?php echo $Coin_locker_number;?>"></input>
						
						
						<input  id="withdraw" class="btn btn-success col-md-12"
							type="submit" name="" value="withdraw">
							</form>
					</div><br>
				</div>
			</div>
		</div>
		<br>
	</div>

	<br>
</div>
</div>

<!-- /.service-content -->

<!-- /#service-1 -->

<script>

var sum = <?php echo $all_price;?>

function show_pay(){
	  document.getElementById("service-2").style.display = "block";
}

function check_money(money) {

	  sum = sum - money  ;
	  if(sum > 0){
	    document.getElementById("price").innerHTML = "Balance is : "+sum ;
	  } else if (sum == 0) {
	      document.getElementById("next").disabled = true;
	      document.getElementById("b_20").disabled = true;
	      document.getElementById("b_50").disabled = true;
	      document.getElementById("b_100").disabled = true;
	      document.getElementById("b_500").disabled = true;
	      document.getElementById("b_1000").disabled = true;
	      document.getElementById("c_1").disabled = true;
	      document.getElementById("c_2").disabled = true;
	      document.getElementById("c_5").disabled = true;
	      document.getElementById("c_10").disabled = true;
	      document.getElementById("price").innerHTML = "Balance is : "+sum ;
	      document.getElementById("change_1000").innerHTML = "No Balance " ;
	      document.getElementById("show2").style.display = "block";
	  }else {
	    var pay = new Array(9);
	    var bills = [1000,500,100,50,20,10,5,2,1,];

	    for (var i= 0; i < pay.length; i++) {
	           pay[i] = sum/bills[i];
	           sum = sum%bills[i];

	       }
	     document.getElementById("next").disabled = true;
	     document.getElementById("b_20").disabled = true;
	     document.getElementById("b_50").disabled = true;
	     document.getElementById("b_100").disabled = true;
	     document.getElementById("b_500").disabled = true;
	     document.getElementById("b_1000").disabled = true;
	     document.getElementById("c_1").disabled = true;
	     document.getElementById("c_2").disabled = true;
	     document.getElementById("c_5").disabled = true;
	     document.getElementById("c_10").disabled = true;

	     var bill_1000 = parseInt(Math.abs(pay[0]));
	     var bill_500 = parseInt(Math.abs(pay[1]));
	     var bill_100 = parseInt(Math.abs(pay[2]));
	     var bill_50 = parseInt(Math.abs(pay[3]));
	     var bill_20 = parseInt(Math.abs(pay[4]));
	     var bill_10 = parseInt(Math.abs(pay[5]));
	     var bill_5 = parseInt(Math.abs(pay[6]));
	     var bill_2 = parseInt(Math.abs(pay[7]));
	     var bill_1 = parseInt(Math.abs(pay[8]));
	     
	     document.getElementById("price").innerHTML = "Balance is : 0";
	      if(bill_1000 >= 1) {
	        document.getElementById("change_1000").innerHTML = "Bill 1000 : "+bill_1000 ;
	      }
	      if(bill_500 >= 1) {
	        document.getElementById("change_500").innerHTML = "Bill 500 : "+bill_500 ;
	      }
	      if(bill_100 >= 1) {
	        document.getElementById("change_100").innerHTML = "Bill 100 : "+bill_100 ;
	      }
	      if(bill_50 >= 1) {
	        document.getElementById("change_50").innerHTML = "Bill 50 : "+bill_50 ;
	      }
	      if(bill_20 >= 1) {
	        document.getElementById("change_20").innerHTML = "Bill 20 : "+bill_20 ;
	      }
	      if(bill_10 >= 1) {
	        document.getElementById("change_10").innerHTML = "Coin 10 : "+bill_10 ;
	      }
	      if(bill_5 >= 1) {
	        document.getElementById("change_5").innerHTML = "Coin 5 : "+bill_5 ;
	      }
	      if(bill_2 >= 1) {
	        document.getElementById("change_2").innerHTML = "Coin 2 : "+bill_2 ;
	      }
	      if(bill_1 >= 1) {
	        document.getElementById("change_1").innerHTML = "Coin 1 : "+bill_1 ;
	      }
	      document.getElementById("show2").style.display = "block";

	    }

	}

</script>



@stop
