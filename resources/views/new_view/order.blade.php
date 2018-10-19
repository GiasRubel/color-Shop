@extends('new_view.layouts.app')

@section('title', 'Order Page')

@section('css')

@endsection

@section('body')
{{-- <div class="container contact_container">
	<div class="row">
		<div class="col">

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart Table</a></li>
				</ul>
			</div>

		</div>
	</div>
</div> --}}
	<div class='container' style="margin-top: 200px;">
		<form action="{{ route('order.store') }}" method="post">
			@csrf

	    <div class='row'>
	        <div class='col-md-7'>
	           
				<div class="panel panel-default">
                        <div class="panel-body">
                            <b>Help us keep your account safe and secure, please verify your billing
                                information.</b>
                            <br/><br/>
                            <table class="table table-striped" style="font-weight: bold;">
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_email">Best Email:</label></td>
                                    <td>
                                        <input class="form-control" id="id_email" name="email"
                                               required="required" type="text"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Name:</label></td>
                                    <td>
                                        <input class="form-control" id="id_first_name" name="name"
                                               required="required" type="text"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_phone">Phone:</label></td>
                                    <td>
                                        <input class="form-control" id="id_phone" name="phone" type="text"/>
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_address_line_1">Address:</label></td>
                                    <td>
                                        <input class="form-control" id="id_address_line_1"
                                               name="adress" required="required" type="text"/>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_state">country:</label></td>
                                    <td>
                                        <select class="form-control" id="id_state" name="country">
                                        	<option>--Select Country--</option>
                                        	@foreach ($countries as $country)
                                        		{{-- expr --}}
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        	@endforeach
                                        </select>
                                    </td>

                                </tr> 
                               {{--  <tr>
                                	<td><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></td>
                                </tr> --}}
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_state">State:</label></td>
                                    <td>
                                        <select class="form-control" id="id_state" name="city">
                                            <option value="0">--Select City--</option>
                                            
                                          
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_postalcode">Postalcode:</label></td>
                                    <td>
                                        <input class="form-control" id="id_postalcode" name="zip"
                                               required="required" type="text"/>
                                    </td>
                                </tr>
                                <tr>
                                	<td><span id="loader" style="visibility: hidden;"><i class="fa fa-spinner fa-3x fa-spin"></i></span></td>
                                </tr>
                                

                            </table>
                        </div>
                </div>

              
	        </div><!--End of col-6-->
	          <div class="col-md-5">
                	<div class="row">
                		<div class="panel-body">
                		    <div class="items">
                		        <div class="col-md-9">
                		            <table class="table table-striped">
                		                <tr>
                		                    <td colspan="2">
                		                       {{--  <a class="btn btn-warning btn-sm pull-right"
                		                           href="http://www.startajobboard.com/"
                		                           title="Remove Item">X</a> --}}
                		                        <b>
                		                            Premium products</b></td>
                		                </tr>
                		                <tr>
                		                    <td>
                		                        <ul>
                		                           @foreach ($carts as $cart)
                		                           	 <li>{{ $cart->quantity }}ps {{ $cart->products->name }} </li>
                		                           @endforeach
                		                           {{--  <li>Job Distribution*</li>
                		                            <li>Social Media Distribution</li> --}}
                		                        </ul>
                		                    </td>
                		                    <td>
                		                        <b>${{ $sum }}</b>
                		                    </td>
                		                </tr>
                		            </table>
                		        </div>
                		        <div class="col-md-3">
                		            <div style="text-align: center;">
                		                <h3>Order Total</h3>
                		                <h3><span style="color:green;">${{ $sum }}</span></h3>
                		            </div>
                		        </div>
                		    </div>
                		</div>
                	</div>
                	
                </div>
	    </div>

	    <div class="row">

	    	<div class="panel panel-default">
	    	    <div class="panel-heading">
	    	        <h4 class="panel-title">
	    	            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	    	                <b>Payment Information</b>
	    	            </a>
	    	        </h4>
	    	    </div>
	    	    {{-- <div id="collapseThree" class="panel-collapse collapse"> --}}
	    	        <div class="panel-body">
	    	            <span class='payment-errors'></span>
	    	            <fieldset>
	    	                <legend>What method would you like to pay with today?</legend>
	    	                <div class="form-group">
	    	                    <label class="col-sm-3 control-label" for="card-holder-name">Name on
	    	                        Card</label>
	    	                    <div class="col-sm-9">
	    	                        <input type="text" class="form-control" stripe-data="name"
	    	                               id="name-on-card" placeholder="Card Holder's Name">
	    	                    </div>
	    	                </div>
	    	                <div class="form-group">
	    	                    <label class="col-sm-3 control-label" for="card-number">Card
	    	                        Number</label>
	    	                    <div class="col-sm-9">
	    	                        <input type="text" class="form-control" stripe-data="number"
	    	                               id="card-number" placeholder="Debit/Credit Card Number">
	    	                        <br/>
	    	                        <div><img class="pull-right"
	    	                                  src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png"
	    	                                  style="max-width: 250px; padding-bottom: 20px;">
	    	                        </div>
	    	                    </div>
	    	                    <div class="form-group">
	    	                        <label class="col-sm-3 control-label" for="expiry-month">Expiration
	    	                            Date</label>
	    	                        <div class="col-sm-9">
	    	                            <div class="row">
	    	                                <div class="col-md-3">
	    	                                    <select class="form-control">
	    	                                        <option>Month</option>
	    	                                        <option value="01">Jan (01)</option>
	    	                                        <option value="02">Feb (02)</option>
	    	                                        <option value="03">Mar (03)</option>
	    	                                        <option value="04">Apr (04)</option>
	    	                                        <option value="05">May (05)</option>
	    	                                        <option value="06">June (06)</option>
	    	                                        <option value="07">July (07)</option>
	    	                                        <option value="08">Aug (08)</option>
	    	                                        <option value="09">Sep (09)</option>
	    	                                        <option value="10">Oct (10)</option>
	    	                                        <option value="11">Nov (11)</option>
	    	                                        <option value="12">Dec (12)</option>
	    	                                    </select>
	    	                                </div>
	    	                                <div class="col-xs-3">
	    	                                    <select class="form-control" data-stripe="exp-year"
	    	                                            id="card-exp-year">
	    	                                        <option value="2016">2016</option>
	    	                                        <option value="2017">2017</option>
	    	                                        <option value="2018">2018</option>
	    	                                        <option value="2019">2019</option>
	    	                                        <option value="2020">2020</option>
	    	                                        <option value="2021">2021</option>
	    	                                        <option value="2022">2022</option>
	    	                                        <option value="2023">2023</option>
	    	                                        <option value="2024">2024</option>
	    	                                    </select>
	    	                                </div>
	    	                            </div>
	    	                        </div>
	    	                    </div>
	    	                    <div class="form-group">
	    	                        <label class="col-sm-3 control-label" for="cvv">Card CVC</label>
	    	                        <div class="col-sm-3">
	    	                            <input type="text" class="form-control" stripe-data="cvc"
	    	                                   id="card-cvc" placeholder="Security Code">
	    	                        </div>
	    	                    </div>
	    	                    <div class="form-group">
	    	                        <div class="col-sm-offset-3 col-sm-9">
	    	                        </div>
	    	                    </div>
	    	            </fieldset>
	    	            <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
	    	                Now
	    	            </button>
	    	            <br/>
	    	            <div style="text-align: left;"><br/>
	    	                By submiting this order you are agreeing to our <a href="/legal/billing/">universal
	    	                    billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
	    	                If you have any questions about our products or services please contact us
	    	                before placing this order.
	    	            </div>
	    	        </div>
	    	    {{-- </div> --}}
	    	</div>
	    </div>

	    </form>
	</div>
@endsection


@section('js')
	<script src="{{ asset('js/dependent.js') }}"></script>
@endsection