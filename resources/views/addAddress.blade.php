@extends('layouts.app')

@section('content')
<style type="text/css">
.button
{
  width: 150px;
  text-align: center;
  margin:0 auto;

}
#my_centered_buttons { display: flex; justify-content: center; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Address</div>
                <div class="panel-body">
               		<form id="personal-info-form" method="post" action="addAddress" enctype='multipart/form-data'>
                  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                          <h4>Enter Street<span>*</span>:</h4></div>  
                          <div class="col-sm-4">
                            	<input value="{{old('street')}}" placeholder="Enter Street ..." name="street" type="text">
                                @if ($errors->has('street'))
                                	<span class="help-block">
                                    	<strong>{{ $errors->first('street') }}</strong>
                                	</span>
                               	@endif
                                </div>                            
                     </div>

                      <div class="col-sm-12">
                        <div class="col-sm-4">
                             <h4>Enter Apt No<span>*</span>:</h4>
                               </div>
                        <div class="col-sm-4">
                            	<input value="{{old('apt_no')}}" placeholder="Enter Apt No ..." name="apt_no" type="text">
                                @if ($errors->has('apt_no'))
                                	<span class="help-block">
                                    	<strong>{{ $errors->first('apt_no') }}</strong>
                                	</span>
                               	@endif
                               </div>
                        </div>

                             <div class="col-sm-12">
                        <div class="col-sm-4">
                             <h4>Enter City<span>*</span>:</h4></div>

                        <div class="col-sm-4">
                            	<input value="{{old('city')}}" placeholder="Enter City..." name="city" type="text">
                                @if ($errors->has('city'))
                                	<span class="help-block">
                                    	<strong>{{ $errors->first('city') }}</strong>
                                	</span>
                               	@endif
                               </div>
                        </div>

                           <div class="col-sm-12">  
                        <div class="col-sm-4">

                               	<h4>Enter State<span>*</span>:</h4>
                                  </div>
                        <div class="col-sm-4">
                            	<input value="{{old('state')}}" placeholder="Enter State..." name="state" type="text">
                                @if ($errors->has('state'))
                                	<span class="help-block">
                                    	<strong>{{ $errors->first('state') }}</strong>
                                	</span>
                               	@endif
                               </div>
                           </div>
                         <div class="col-sm-12">

                            
                        <div class="col-sm-4">
                               <h4>Enter Zip<span>*</span>:</h4>
                           </div>
                        <div class="col-sm-4">
                            	<input value="{{old('zip_code')}}" placeholder="Enter zip..." name="zip_code" type="text">
                            </div>
                        </div>

                
                    <div style="padding-top: 20px;padding-left: 186px;" >    
                        <button type="submit" class="update-btn">Submit</button></div>  
                    </form>  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
