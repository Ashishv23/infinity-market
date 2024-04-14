<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Assignment2</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<!-- Header bar-->
	<header>
		<!-- Store Name -->		
		<h1 class="store-name">Infinity market</h1>
		<!-- Nav bar -->
		<div id="nav-bar">
			<a href="" class="nav-bar-link active">Home</a>
			<a href="order_list.html" class="nav-bar-link">Orders</a>
			<a href="create_shop_manager.html" class="nav-bar-link">Create shop manager</a>
			<a href="login.html" class="nav-bar-profile">
				<span class="fa fa-user"></span>
				<!-- <div id="profile-image"></div> -->
			</a>
			<a href="#" class="grid-icon grid-icon--fill nav-bar-grid">
				<span class="layer layer--primary">
					<span></span>
				</span>
				<span class="layer layer--secondary">
					<span></span>
				</span>
				<span class="layer layer--tertiary">
					<span></span>
				</span>
			</a>
		</div>
	</header>

	<div class="container">
		<!-- Grid container -->
		<div class="grid-container">
			<div class="grid-item">
				<div class="header">
					<h2>Create Account</h2>
				</div>
				<!-- Form -->
				<form class="form" id="form">
					<div class="form__control">
						<label>Name</label>
						<input ype="text" placeholder="Enter full name" id="name"/>
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>Email</label>
						<input type="email" placeholder="abc@example.com" id="email" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>Password</label>
						<input type="password" placeholder="password" id="password" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>Confirm Password</label>
						<input type="password" placeholder="confirm password" id="confirmPassword" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>Phone</label>
						<input type="text" placeholder="contact number" id="phone" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>Address</label>
						<input type="text" placeholder="Address" id="address" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form__control">
						<label>City</label>
						<input type="text" placeholder="City" id="city" />
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error message</small>
					</div>
					<div class="form-inline">
						<div class="form__control">
							<label>Province</label>
							<select id="province" onchange="provinceChange(this)">
								<option value="AB">AB</option>
								<option value="BC">BC</option>
								<option value="MB">MB</option>
								<option value="NB">NB</option>
								<option value="NL">NL</option>
								<option value="NS">NS</option>
								<option value="NT">NT</option>
								<option value="NU">NU</option>
								<option value="ON">ON</option>
								<option value="PE">PE</option>
								<option value="QC">QC</option>
								<option value="SK">SK</option>
								<option value="YT">YT</option>
							</select>
							<i class="fa fa-check-circle"></i>
							<i class="fa fa-exclamation-circle"></i>
							<small>Error message</small>
						</div>
						<div class="form__control" style="margin-right: 1px;">
							<label>Postcode</label>
							<input type="text" placeholder="Postcode" id="postcode" />
							<i class="fa fa-check-circle"></i>
							<i class="fa fa-exclamation-circle"></i>
							<small>Error message</small>
						</div>
					</div>
				</form>
			</div>
			<div class="grid-item">
				<div class="header">
					<h2>Products</h2>
				</div>
				<article class="card">
					<div class="left-card">
						<img class="poster-img1" src="assets/images/watch1.jpg" alt="watch image" />
					</div>
					<div class="right-card">
						<h1 class="main-title">Voyager Pro</h1>
						<p class="summary">
							The ultimate travel watch equipped with built-in GPS and rugged features for outdoor exploration.
						</p>
						<div class="price">
							<p class="current-price">$5.99</p>
							<p class="old-price">$10.99</p>
						</div>
						<button class="btn" id="watch1" onclick="addProduct('assets/images/icon1.jpg', 'Voyager Pro', '$5.99','watch1')">

							Add to Cart
						</button>
					</div>
				</article>
				<article class="card">
					<div class="left-card">
						<img class="poster-img1" src="assets/images/watch2.jpg" alt="watch image" />
					</div>
					<div class="right-card">
						<h1 class="main-title">Horizon Chrono</h1>
						<p class="summary">
							A durable chronograph watch designed for adventurers with precise quartz movement.
						</p>
						<div class="price">
							<p class="current-price">$4.99</p>
							<p class="old-price">$8.99</p>
						</div>
						<button class="btn" id="watch2" onclick="addProduct('assets/images/icon2.jpg', 'Horizon Chrono', '$4.99','watch2')">
							
							Add to Cart
						</button>
					</div>
				</article>
				<article class="card">
					<div class="left-card">
						<img class="poster-img1" src="assets/images/watch3.jpg" alt="watch image" />
					</div>
					<div class="right-card">
						<h1 class="main-title">Eclipse Elite</h1>
						<p class="summary">
							An elegant timepiece with Swiss automatic movement and scratch-resistant sapphire crystal, perfect for any occasion.
						</p>
						<div class="price">
							<p class="current-price">$4.99</p>
							<p class="old-price">$9.99</p>
						</div>
						<button class="btn" id="watch2" onclick="addProduct('assets/images/icon3.jpg', 'Eclipse Elite', '$4.99','watch2')">
							
							Add to Cart
						</button>
					</div>
				</article>
			</div>

			<div class="grid-item">
				<div class="header">
					<h2>Checkout</h2>
				</div>

				<div class="shopping-cart" id="shoppingCart">
					<table border="1" id="cartTable">
						<tr>
							<th></th>
							<th></th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
						<tbody id="cartBody">
						</tbody>
					</table>
				</div>
				<div class="card-information" id="cardInformation">
					<div class="clear"></div>
					<br>
					<div class="header">
						<h2>Card Information</h2>
					</div>
					<form class="form" id="card-details">
						<div class="form__control">
							<label>Full Name</label>
							<input ype="text" placeholder="Enter full name" id="cardName"/>
							<i class="fa fa-check-circle"></i>
							<i class="fa fa-exclamation-circle"></i>
							<small>Error message</small>
						</div>
						<div class="form__control">
							<label>Card Number</label>
							<input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" id="cardNumber" />
							<i class="fa fa-check-circle"></i>
							<i class="fa fa-exclamation-circle"></i>
							<small>Error message</small>
						</div>
						<div class="form-inline">
							<div class="form__control">
								<label>Expiry(MMM/YYYY)</label>
								<input type="text" placeholder="MMM/YYYY" id="cardExp" />
								<i class="fa fa-check-circle"></i>
								<i class="fa fa-exclamation-circle"></i>
								<small>Error message</small>
							</div>
							<div class="form__control" style="margin-right: 1px;">
								<label>CVC</label>
								<input type="text" placeholder="CVC" id="cardCVC" />
								<i class="fa fa-check-circle"></i>
								<i class="fa fa-exclamation-circle"></i>
								<small>Error message</small>
							</div>
						</div>
					</form>
				</div>
				<button class="checkout" onclick="generateReceipt()">Checkout</button>

				<div class="receipt" id="receipt">
					<div class="clear"></div>
					<br>
					<div class="header">
						<h2>Receipt</h2>
					</div>
					<div class="receipt_header">
						<h1><span>Conestoga Perfume Online</span></h1>
						<h2>Address: 8160 Parkhill Drive <span>Tel: +1 519-748-5220</span></h2>
					</div>

					<div class="receipt_body">
						<div class="user-information">
							<p>Customer Name: <span id="cName"></span></p>
							<p>Email: <span id="cEmail"></span></p>
							<p>Contact: <span id="cContact"></span></p>
							<p>Card: <span id="cardDetails"></span></p>
						</div>
						<table id="receiptsTable">
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="receiptsBody">
								<!-- Rows will be added dynamically -->
							</tbody>
						</table>
						<div class="totals">
							<div class="totals-item">
								<label>Subtotal</label>
								<div class="totals-value" id="cart-subtotal"><span></span></div>
							</div>
							<div class="totals-item">
								<label>Tax (<span id="taxRate">5</span>%)</label>
								<div class="totals-value" id="cart-tax"><span></span></div>
							</div>
							<div class="totals-item totals-item-total">
								<label>Grand Total</label>
								<div class="totals-value" id="cart-total"><span></span></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<script src="js/index.js"></script>
	</body>
	</html>