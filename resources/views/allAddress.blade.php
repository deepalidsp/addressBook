@extends('layouts.app')

@section('content')

<script>
	jQuery(function($){
		$("#showAddress").DataTable({
			processing:true,
			serverside:true,
			ajax:"allAddressData",
			"order":[
			[0,"desc"]
			],
			"columns":[{
				"mData":"address_id"
			},{
				"mData":"street"
			},{
				"mData":"apt_no"
			},{

				"mData":"city"
			},{
				"mData":"state"
			},{
				"mData":"zip_code"
			},{
				"mData":"lat"
			},{
				"mData":"lng"
			},/*{
				"mData":"created_at"
			},{
				"mData":"updated_at"
			}*/{  
				"targets":-1,
				"mData": "Action",
				"bSortable": false,
				"ilter":false,
				"mRender": function(data, type, row){return "<a class=datatable-left-link href=editAddress?address_id=" + row.address_id+"><span><button type='submit' class='update-btn'>Edit</button></span></a>";}
			},{  
 				"targets":-1,
                "mData": "Action",
                "bSortable": false,
                "ilter":false,
                "mRender": function(data, type, row){return "<a class=datatable-left-link href=addressDetail?Address_id=" + row.address_id+"><span><button type='submit' class='update-btn'>Detail</button></span></a>";}
            },
			 {  
 				"targets":-1,
                "mData": "Action",
                "bSortable": false,
                "ilter":false,
                "mRender": function(data, type, row){return "<a class=datatable-left-link href=deleteAddress?Address_id=" + row.address_id+"><span><button type='submit' class='update-btn'>Delete</button></span></a>";}
            },
			]
		});
	});
</script>
<table id="showAddress">
							<thead>
								<tr>
									<th>Address ID</th>
									<th>Street</th>
									<th>Apt No</th>
									<th>City</th>
									<th>state</th>
									<th>Zip</th>
									<th>Longitude</th>
									<th>Latitude</th>
									<th>Edit</th>
									<th>Detail</th>
									<th>Delete</th>

								</tr>
							</thead>
						</table>

@endsection