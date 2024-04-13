const form = document.getElementById("form");
const name = document.getElementById("name");
const email = document.getElementById("email");
const password = document.getElementById("password");
const password2 = document.getElementById("confirmPassword");
const phone = document.getElementById("phone");
const address = document.getElementById("address");
const city = document.getElementById("city");
const province = document.getElementById("province");
const cardName = document.getElementById("cardName");
const cardNumber = document.getElementById("cardNumber");
const cardExp = document.getElementById("cardExp");
const cardCVC = document.getElementById("cardCVC");
var taxRate = 0.05;
var isFormValid = false;
var receiptDiv = document.getElementById("receipt");
receiptDiv.style.display = "none";
var shoppingCart = document.getElementById("shoppingCart");
shoppingCart.style.display = "none";
var cardInformation = document.getElementById("cardInformation");
cardInformation.style.display = "block";
//const province = document.getElementById("province");
const postcode = document.getElementById("postcode");
form.addEventListener("submit", e => {
  e.preventDefault();
  checkInputs();
});


function provinceChange(selectElement) {
  // Get the selected value
  var selectedProvince = selectElement.value;
  if(selectedProvince == "ON"){
    document.getElementById("taxRate").innerText="13";
    taxRate = 0.13;
  }
  else if(selectedProvince == "BC" || selectedProvince == "MB"){
    document.getElementById("taxRate").innerText="12";
    taxRate = 0.12;
  }
  else if(selectedProvince == "NB" || selectedProvince == "NL" || selectedProvince == "NS" || selectedProvince == "PE"){
    document.getElementById("taxRate").innerText="15";
    taxRate = 0.15;
  }
  else if(selectedProvince == "QC"){
    document.getElementById("taxRate").innerText="14.975";
    taxRate = 0.14975;
  }
  else if(selectedProvince == "SK"){
    document.getElementById("taxRate").innerText="11";
    taxRate = 0.11;
  }
  else {
    document.getElementById("taxRate").innerText="5";
    taxRate = 0.05;
  }
}

function handleNavLinkClick(link) {
  // Remove 'active' class from all navigation links
  var navLinks = document.querySelectorAll('.nav-bar-link');
  navLinks.forEach(function(navLink) {
      navLink.classList.remove('active');
  });

  // Add 'active' class to the clicked link
  link.classList.add('active');
}

function checkInputs() {
  //Get the value the form field.
  const nameValue = name.value.trim(); //trim to delete blanc space.
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();
  const phoneValue = phone.value.trim();
  const addressValue = address.value.trim();
  const cityValue = city.value.trim();
  const provinceValue = province.value.trim();
  const postCodeValue = postcode.value.trim();
  const cardNameValue = cardName.value.trim();
  const cardNumberValue = cardNumber.value.trim();
  const cardExpValue = cardExp.value.trim();
  const cardCVCvalue = cardCVC.value.trim();
  if (nameValue === "") {
    isFormValid = false;
    setErrorInput(name, "Name cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(name);
  }

  //###################################
  if (emailValue === "") {
    isFormValid = false;
    setErrorInput(email, "Email cannot be empty.");

  } 
  else if(!validateEmail(emailValue)){
    isFormValid = false;
    //validateEmail(emailValue) && setSuccessInput(email);
    setErrorInput(email, "Plese enter the email in proper format");
  }
  else{
    isFormValid = true;
    setSuccessInput(email);
  }

  //###################################
  if (passwordValue === "") {
    isFormValid = false;
    setErrorInput(password, "Password connot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(password) && validatePassword(passwordValue);
  }

  //###################################
  if (password2Value === "") {
    isFormValid = false;
    setErrorInput(password2, "Password connot be empty.");
  } else if (password2Value !== passwordValue) {
    isFormValid = false;
    setErrorInput(password2, "Password dosn't match.");
  } else {
    isFormValid = true;
    setSuccessInput(password2);
  }

  //###################################
  if (phoneValue === "") {
    isFormValid = false;
    setErrorInput(phone, "Phone Number cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(phone);
  }

  //###################################
  if (addressValue === "") {
    isFormValid = false;
    setErrorInput(address, "Address cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(address);
  }

  //###################################
  if (cityValue === "") {
    isFormValid = false;
    setErrorInput(city, "City cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(city);
  }

  //###################################
  if (provinceValue === "") {
    isFormValid = false;
    setErrorInput(province, "Province cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(province);
  }

  //###################################
  if (postCodeValue === "") {
    isFormValid = false;
    setErrorInput(postcode, "Postal Code cannot be empty.");
  } else {
    isFormValid = true;
    setSuccessInput(postcode);
  }

 //###################################
  if (cardNameValue === "") {
    isFormValid = false;
    setErrorInput(cardName, "Name cannot be empty.");
  }
  else {
    isFormValid = true;
    setSuccessInput(cardName);
  }

 //###################################
  if (cardNumberValue === "") {
    isFormValid = false;
    setErrorInput(cardNumber, "Card Number cannot be empty.");
  }
  else if(!validateCardNumber(cardNumberValue)){
    isFormValid = false;
    setErrorInput(cardNumber, "Please enter in valid format");
  }  
  else {
    isFormValid = true;
    setSuccessInput(cardNumber);
  }

 //###################################
  if (cardExpValue === "") {
    isFormValid = false;
    setErrorInput(cardExp, "Expiry date cannot be empty.");
  } 
  else if(!validateExpiryDate(cardExpValue)){
    isFormValid = false;
    setErrorInput(cardExp, "Please enter in valid format");
  } 
  else {
    isFormValid = true;
    setSuccessInput(cardExp);
  }

 //###################################
  if (cardCVCvalue === "") {
    isFormValid = false;
    setErrorInput(cardCVC, "CVC cannot be empty.");
  } 
  else if(!validateCVC(cardCVCvalue)){
    isFormValid = false;
    setErrorInput(cardCVC, "Please enter in valid format");
  } 
  else {
    isFormValid = true;
    setSuccessInput(cardCVC);
  }

}

function setErrorInput(input, errorMessage) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");
  small.innerText = errorMessage;
  formControl.className = "form__control error";
}

function setSuccessInput(input) {
  const formControl = input.parentElement;
  formControl.className = "form__control success";
}


function validateEmail(email) {
  let regular_expressions = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regular_expressions.test(String(email).toLocaleLowerCase());
}

function validateCardNumber(cardNumber) {
  // Regular expression for validating card numbers in the format xxxx-xxxx-xxxx-xxxx
  var regex = /^\d{4}-\d{4}-\d{4}-\d{4}$/;
  return regex.test(cardNumber);
}

function validateExpiryDate(expiryDate) {
  // Regular expression for validating date in "MMM/yyyy" format
  var regex = /^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)\/\d{4}$/;
  return regex.test(expiryDate);
}

function validateCVC(cvc) {
  // Regular expression for validating a 3-digit CVC
  var regex = /^\d{3}$/;
  return regex.test(cvc);
}
/* Set rates + misc */
//var taxRate = 0.05;
var fadeTime = 300;



// var item1 = document.getElementById('item1');

// // Add event listener for click event
// item1.addEventListener('click', function() {
//   var imageElement = document.getElementById("myImage");
//   shoppingCarts.style.display = 'block';
// });

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

function addProduct(imageUrl, title, price, btnId) {

  if (shoppingCart.style.display === "none") {
    shoppingCart.style.display = "block";
  }

  var button = document.getElementById(btnId);

  // Disable the button
  button.disabled = true;

  // Get a reference to the table
  var table = document.getElementById("cartBody");

  // Create a new row
  var newRow = document.createElement("tr");

  // Create and append cells to the row
  var imageCell = document.createElement("td");
  var imageElement = document.createElement("img");
  imageElement.src = imageUrl;
  imageElement.alt = title;
  imageCell.appendChild(imageElement);
  newRow.appendChild(imageCell);

  var titleCell = document.createElement("td");
  titleCell.textContent = title;
  newRow.appendChild(titleCell);

  var priceCell = document.createElement("td");
  priceCell.textContent = price;
  newRow.appendChild(priceCell);

  var quantityCell = document.createElement("td");
  var quantityInput = document.createElement("input");
  quantityInput.type = "number";
  quantityInput.id = "quantity"+getRandomInt(9);
  quantityInput.min = 1;
  quantityInput.value = 1; // Set default value
  quantityInput.oninput = function() {
    updateTotal(newRow);
  };
  
  quantityCell.appendChild(quantityInput);

  var deleteButton = document.createElement("button");
  var mainTable = document.getElementById("cartTable");
  deleteButton.textContent = "Delete";
  deleteButton.className = "btn-danger";
  deleteButton.onclick = function() {
    mainTable.deleteRow(newRow.rowIndex);
    button.disabled = false;
  };
  quantityCell.appendChild(deleteButton);

  newRow.appendChild(quantityCell);

  var totalCell = document.createElement("td");
  totalCell.textContent = price;
  newRow.appendChild(totalCell);
  // Append the new row to the table
  table.appendChild(newRow);

  function updateTotal(row) {
    var quantity = parseInt(row.querySelector("input[type=number]").value);
    var price = parseFloat(row.querySelector("td:nth-child(3)").textContent.replace("$", ""));
    var total = quantity * price;
    row.querySelector("td:nth-child(5)").textContent = "$" + total.toFixed(2);
  }
}


function generateReceipt() {
  clearCheckoutTable(); // Clear existing table content
  checkInputs() // form validation
  var totalPrice = 0;
  var tax = 0;
  var gTotal = 0;
  var maskedNumber = maskCardNumber(cardNumber.value);
  // Get product data from the receipts table and add it to the checkout table
  var receiptsTable = document.getElementById("cartBody");
  var rows = receiptsTable.getElementsByTagName("tr");
  console.log(receiptsTable);
  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
  var imageUrl = cells[0].querySelector("img") ? cells[0].querySelector("img").src : ""; // Check if img element exists
  var title = cells[1].textContent;
  var price = cells[2].textContent;
  //var quantity = cells[3].textContent;
  var quantityInputId = cells[3].querySelector("input").id;
  var quantity = document.getElementById(quantityInputId).value;
  var total = cells[4].textContent.slice(1);
   // Check if price is a valid number
  if (!isNaN(parseFloat(total))) {
    totalPrice += parseFloat(total);
  } else {
    console.log("Invalid price:", total);
  }
  document.getElementById("cName").innerText=name.value;
  document.getElementById("cEmail").innerText=email.value;
  document.getElementById("cContact").innerText=phone.value;
  document.getElementById("cardDetails").innerText=maskedNumber;
  addRowToCheckout(imageUrl, title, price, quantity, total);
}

document.getElementById("cart-subtotal").innerText=totalPrice.toFixed(2);
tax = parseFloat(totalPrice)*parseFloat(taxRate);
gTotal = parseFloat(totalPrice)+parseFloat(tax);
console.log(isFormValid);
if((gTotal>9)&& isFormValid){
  cardInformation.style.display = "none";
  if (receiptDiv.style.display === "none") {
    receiptDiv.style.display = "block";
  }

}
else{
  alert("Signup first and buy a product of atleast $10")
}
document.getElementById("cart-tax").innerText=tax.toFixed(2);
document.getElementById("cart-total").innerText=gTotal.toFixed(2);
}


// Function to add a new row to the checkout table
function addRowToCheckout(imageUrl, title, price, quantity, total) {

  var table = document.getElementById("receiptsBody");
  var newRow = table.insertRow();
  
  var imageCell = newRow.insertCell(0);
  imageCell.innerHTML = '<img src="' + imageUrl + '" alt="Product Image">';
  
  var titleCell = newRow.insertCell(1);
  titleCell.textContent = title;
  
  var priceCell = newRow.insertCell(2);
  priceCell.textContent = price;
  

  var quantityCell = newRow.insertCell(3);
  quantityCell.textContent = quantity;
  
  var totalCell = newRow.insertCell(4);
  totalCell.textContent = total;
}

function clearCheckoutTable() {
  var table = document.getElementById("receiptsBody");
  table.innerHTML = ""; // Clear all rows
}

function maskCardNumber(cardNumber) {
  // Keep only the last four digits of the card number
  var lastFourDigits = cardNumber.slice(-4);
  
  // Mask the remaining digits with "X"
  var maskedNumber = "XXXX-XXXX-XXXX-" + lastFourDigits;
  
  return maskedNumber;
}


