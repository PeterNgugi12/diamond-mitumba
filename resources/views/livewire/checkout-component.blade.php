
  <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
			<form wire:submit.prevent="placeOrder">
			  <div class="row">
                 <div class="col-md-12">
                    <div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<div class="billing-address">
						<p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
							 @error('firstname') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
							@error('lastname') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input  type="text" name="email" value="" placeholder="Your email" wire:model="email">
							@error('email') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
							@error('mobile') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input  type="text" name="add" value="" placeholder="P.O Box" wire:model="address">
							@error('address') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="add">Line1:</label>
							<input  type="text" name="add" value="" placeholder="Your Line 1" wire:model="line1">
							@error('line1') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="add">Line2:</label>
							<input  type="text" name="add" value="" placeholder="Your Line 2" wire:model="line2">
							
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input type="text" name="country" value="" placeholder="Kenya" wire:model="country">
							@error('country') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="county">County<span>*</span></label>
							<input type="text" name="county" value="" placeholder="United States"wire:model="county">
							@error('county') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						
						<p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input  type="text" name="city" value="" placeholder="City name" wire:model="city">
							@error('city') <span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form fill-wife">
							
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
								<span>Ship to a different address?</span>
							</label>
						</p>
					</div>
				</div>
				 </div>
				@if($ship_to_different)
				  <div class="col-md-12">
                      <div class="wrap-address-billing">
					      <h3 class="box-title">Shipping Address</h3>
					      <div class="billing-address">
						    <p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input  type="text" name="fname" value="" placeholder="Your name"wire:model="s_firstname">
							@error('s_firstname') <span class="text-danger">{{$message}}</span>@enderror
						   </p>
						   <p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input  type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
							@error('s_lastname') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						  <p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input  type="text" name="email" value="" placeholder="Your email" wire:model="s_email">
							@error('s_email') <span class="text-danger">{{$message}}</span>@enderror
						   </p>
						   <p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input  type="number" name="phone" value="" placeholder="10 digits format"wire:model="s_mobile">
							@error('s_mobile') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						  <p class="row-in-form">
							<label for="add">Address:</label>
							<input  type="text" name="add" value="" placeholder="P.O Box"wire:model="s_address">
							@error('s_address') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						  <p class="row-in-form">
							<label for="add">Line1:</label>
							<input  type="text" name="add" value="" placeholder="Your Line 1"wire:model="s_line1">
							@error('s_line1') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						  <p class="row-in-form">
							<label for="add">Line2:</label>
							<input  type="text" name="add" value="" placeholder="Your Line 2"wire:model="s_line2">
						  </p>
						  <p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input type="text" name="country" value="" placeholder="Kenya"wire:model="s_country">
							@error('s_country') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						  <p class="row-in-form">
							<label for="county">County<span>*</span></label>
							<input type="text" name="county" value="" placeholder="United States" wire:model="s_county">
							@error('s_county') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
						
						  <p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input  type="text" name="city" value="" placeholder="City name" wire:model="s_city">
							@error('s_city') <span class="text-danger">{{$message}}</span>@enderror
						  </p>
					
					      </div>

				        </div>
						
				@endif
			  </div>
				
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio"wire:model="paymentmode">
								<span>Cash On Delivery</span>
								<span class="payment-desc">Order Now Pay On Delivery</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="mpesa" type="radio"wire:model="paymentmode">
								<span>Mpesa</span>
								<span class="payment-desc">Pay Via Mpesa</span>
							</label>
							@error('paymentmode') <span class="text-danger">{{$message}}</span>@enderror
							
						</div>
						@if(Session::has('checkout'))
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Ksh{{Session::get('checkout')['total']}}</span></p>
						@endif
						
						<button type="submit" class=btn btn-medium>Place order now</button>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed Ksh0.00</span></p>
						
					</div>
				</div>

			</form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>  

