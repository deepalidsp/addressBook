@extends('layouts.app')

@section('content')

<div class="section section-content section-pad">
	<div class="container">
		<div class="row">
			<div class="about-wrapper row">
				<div class="col-md-7 col-sm-12 res-m-bttm">
					<div class="about-text">
						<h2 id='heading' class="heading-section"></h2><br>
						<h4 class="heading-section heading-sm with-line">
						Address Details:<br></h4>
						<table class="table table-striped bdr-bottom"><tr><td>
						Street:</td><td>
						<strong id='street'></strong></td></tr>
						<tr><td>
						Apt No:</td>
						<td>
						<strong id='apt_no'></strong></td>
						</tr>
						<tr><td>
						City</td>
						<td>
						<strong id='city'></strong></td>
						</tr>
						<tr><td>
						State:</td>
						<td>
						<strong id='state'></strong></td>
						</tr>
						<tr><td>
						zip</td>
						<td>
						<strong id='zip_code'></strong></td>
						</tr>
						<tr><td>
						Longitude</td>
						<td>
						<strong id='lat'></strong></td>
						</tr>
						<tr><td>
						Latitude</td>
						<td>
						<strong id='lng'></strong></td>
						</tr>
						</table>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		var address=<?php echo json_encode($address); ?>;
		console.log(address);
		
		$.each(address, function(i, item) {
			$('#street').append(item.street);
			$('#apt_no').append(item.apt_no);
			$('#city').append(item.city);
			$('#state').append(item.state);
			$('#zip_code').append(item.zip_code);
			$('#lat').append(item.lat);
			$('#lng').append(item.lng);
			$('#address').append(item.address);
			
	});
		});
</script>

@endsection