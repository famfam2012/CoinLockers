@extends('JS_Locker') @section('Js')

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
			<?php foreach ($locker as $row) {

			if($row['Coin_locker_status']==1){	?>

			<div class="col-md-4 col-sm-6">
				<div class="service-item" id="service-2">
					<div class="service-icon">
						<P>
							Locker:
							<?php echo $row['Coin_locker_number']; ?>
						</P>
						<P>
							<?php echo $row['Coin_locker_size']; ?>
						</P>
					</div>
					<!--  href="{{url('/Status',[2,$row['Coin_locker_number']])}}"-->

					<form action="{{url('Deposit')}}" medthod="post">
					<div class="service-content">
						<div class="inner-service">
							<br> <br>

							<h1>Please create password to next unlock .</h1>
							<h1>(4 characters)</h1>
							<br> <input id="pass<?php echo $row['Coin_locker_number']; ?>" type="password" name="pass" maxlength=4 required>
							<input type="hidden" name="locker" value="<?php echo $row['Coin_locker_number']; ?>">
							<input type="hidden" name="status" value="2">
						</div>
					</div>
					<input id="ok<?php echo $row['Coin_locker_number']; ?>" type="submit" class="btn btn-info col-md-12 col-sm-6"
						value="Deposit"> </form>
				</div>
					<br	>
			</div>


			<!-- /.service-content -->

			<!-- /#service-1 -->

			<?php } else { ?>
			<div class="col-md-4 col-sm-6">
				<div class="service-item" id="service-1">
					<div class="service-icon">
						<P>
							Locker:
							<?php echo $row['Coin_locker_number']; ?>
						</P>
						<P>
							<?php echo $row['Coin_locker_size']; ?>
						</P>
					</div>
					<!-- /.service-icon -->
					<form action="{{url('withdraw')}}" medthod="post">
					<div class="service-content">
						<div class="inner-service">
							<br> <br>

							<h1>Please press password to unlock .</h1>
							<h1>(4 characters)</h1>
							<br> <input type="password" name="pass" maxlength=4 required>
							<input type="hidden" name="locker" value="<?php echo $row['Coin_locker_number']; ?>">
							
						</div>
					</div>
					<input type="submit" class="btn btn-info col-md-12 col-sm-6"
						value="withdraw"> </form>
					<!-- /.service-content -->
				</div>
				<br	>
				<!-- /#service-1 -->
			</div>

			<?php }
				 }?>

		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>

<div id="footer">
	<div class="container">
		<div class="row"></div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<!-- /#footer -->


@stop
