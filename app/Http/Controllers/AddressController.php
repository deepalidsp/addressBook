<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;
use App\Address;

class AddressController extends Controller
{
     public function getAddAddress(Request $request){
     return view("addAddress");
	}
	public function postAddAddress(Request $request){

		$post=$request->all();
        $this->validate($request,Address::$addRule);
        $street=$request->street;
        $apt_no=$request->apt_no;
        $city=$request->city;
        $state=$request->state;
        $zip_code=$request->zip_code;



        $address=new Address();
        $address->street=$street;
       	$address->apt_no=$apt_no;
        $address->city=$city;
        $address->state=$state;
        $address->zip_code=$zip_code;


		/*$address = $street.', '.$city.', '.$state.', '.$zip_code;
		$lat_lng_by_add = $this->LatLngByAdd($address);
		$address->lat=$lat_lng_by_add->lat;
        $address->lng=$lat_lng_by_add->lng;*/
        $addressGeo = $street.', '.$city.', '.$state.', '.$zip_code;
		$lat_lng_by_add = $this->LatLngByAdd($addressGeo);
		if(!empty($lat_lng_by_add)){
			$address->lat = @$lat_lng_by_add->lat;
			$address->lng = @$lat_lng_by_add->lng;
		}
       	$address->save();
   		/*flash('Address Added Successfully...', 'Success');
  		return redirect("allAddress");*/
  		return redirect('allAddress')->with('Success', 'You have done successfully');
	}
	public function LatLngByAdd($address){
		$address = str_replace(" ", "+", $address);
		$url = 'https://' .
        'maps.googleapis.com/' .
        'maps/api/geocode/json' .
        '?address=' . $address;
		$geocode = file_get_contents($url);
		$maps_array= json_decode($geocode);
		// print_r($maps_array->results[0]->geometry->location->lat);
		return $maps_array->results[0]->geometry->location;
	}
	public function getAllAddress(){
     return view('allAddress');
	}
	public function getAllAddressData(){
     $address=Address::all();
     return Datatables::of($address)->make(true);
	}
	public function getEditAddress(Request $request){
     $address_id=$request->address_id;
     $address = Address::find($address_id);
     return view('editAddress',['address'=>$address]);
	}
	public function postEditAddress(Request $request){

      $this->validate($request,Address::$addRule);

      $address_id=$request->address_id;
      $address = Address::find($address_id);
      $street=$request->street;
      $apt_no=$request->apt_no;
      $city=$request->city;
      $state=$request->state;
      $zip_code=$request->zip_code;

      $address->street=$street;
      $address->apt_no=$apt_no;
      $address->city=$city;
      $address->state=$state;
      $address->zip_code=$zip_code;

       $addressGeo = $street.', '.$city.', '.$state.', '.$zip_code;
		$lat_lng_by_add = $this->LatLngByAdd($addressGeo);
		if(!empty($lat_lng_by_add)){
			$address->lat = @$lat_lng_by_add->lat;
			$address->lng = @$lat_lng_by_add->lng;
		}
   	  $address->save();
   	  /*flash('Facility Updated Successfully...', 'Success');*/
      return redirect('allAddress');
	}
	public function getDeleteAddress(Request $request) {
		$address_id=$request->Address_id;
		Address::where('address_id', $address_id)->delete();
		/*$address = Address::find($address_id);    
		$address->delete();*/
		return redirect('allAddress'); 

	}
	public function getAddressDetail(Request $request){
           $address_id=$request->Address_id;
           $address=Address::where('address_id',$address_id)->get();
           return view('addressDetail',['address'=>$address]);
      }
	public function getAddressLocation(Request $request){
          
           return view('location');
      }


}
