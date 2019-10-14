<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

	<body>

		<!-- sidebar -->
		<div class="container-fluid">
			<?php $this->load->view("acc/_partials/sidebar"); ?>
		</div>
		<!-- /sidebar -->

		<!-- navbar -->
		<div>
			<?php $this->load->view("acc/_partials/navbar"); ?>
		</div>
		<!-- /navbar -->

		<!-- content -->
		<div class="content">
			<ul id="tabs-swipe-demo" class="tabs">
				<li class="tab col s3"><a class="active" href="#test-swipe-1">Test 1</a></li>
				<li class="tab col s3"><a href="#test-swipe-2">Test 2</a></li>
				<li class="tab col s3"><a href="#test-swipe-3">Test 3</a></li>
			</ul>
			<div id="test-swipe-1" class="col s12 blue">Test 1</div>
			<div id="test-swipe-2" class="col s12 red">Test 2</div>
			<div id="test-swipe-3" class="col s12 green">Test 3</div>
		</div>
		<!-- content -->

		<!-- Javascript -->
		<?php $this->load->view("acc/_partials/js"); ?>
		<!-- /Javascript -->
	</body>

</html>
