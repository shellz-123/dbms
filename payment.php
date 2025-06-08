<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #f0f0e8;
            border: 2px solid #666;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
            width: 140px;
            text-align: right;
            margin-right: 15px;
            font-weight: normal;
        }

        .form-group input,
        .form-group select {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #999;
            background-color: white;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #666;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-row .form-group {
            margin-bottom: 0;
            flex: 1;
        }

        .form-row .form-group label {
            width: 80px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin: 30px 0 20px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #ccc;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            gap: 20px;
        }

        .back-button {
            background-color: #d3d3d3;
            border: 1px solid #999;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .back-button:hover {
            background-color: #c0c0c0;
        }

        .next-button {
            background-color: #ff8c00;
            border: 1px solid #e67300;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .next-button:hover {
            background-color: #e67300;
        }

        .next-button:disabled {
            background-color: #ccc;
            border-color: #999;
            cursor: not-allowed;
        }

        .error-message {
            color: #d32f2f;
            font-size: 12px;
            margin-left: 155px;
            margin-top: 2px;
            display: none;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 30px;
            border: 2px solid #666;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .modal-message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.4;
        }

        .modal-button {
            background-color: #ff8c00;
            border: 1px solid #e67300;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .modal-button:hover {
            background-color: #e67300;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }
            
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .form-group label {
                width: auto;
                text-align: left;
                margin-right: 0;
                margin-bottom: 5px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-row .form-group label {
                width: auto;
            }
            
            .error-message {
                margin-left: 0;
            }

            .modal-content {
                margin: 20% auto;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="success-message" id="successMessage">
            Payment information submitted successfully!
        </div>

        <form id="paymentForm">
            <div class="section-title">Personal Information</div>
            
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="error-message" id="emailError">Please enter a valid email address</div>

            <div class="form-group">
                <label for="confirmEmail">Re-type Email Address:</label>
                <input type="email" id="confirmEmail" name="confirmEmail" required>
            </div>
            <div class="error-message" id="confirmEmailError">Email addresses do not match</div>

            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="error-message" id="firstNameError">Please enter your first name</div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="error-message" id="lastNameError">Please enter your last name</div>

            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" required>
            </div>
            <div class="error-message" id="mobileError">Please enter a valid mobile number</div>

            <div class="section-title">Payment Information</div>

            <div class="form-group">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
            </div>
            <div class="error-message" id="cardError">Please enter a valid card number</div>

            <div class="form-group">
                <label for="cardName">Cardholder Name:</label>
                <input type="text" id="cardName" name="cardName" required>
            </div>
            <div class="error-message" id="cardNameError">Please enter the cardholder name</div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="error-message" id="addressError">Please enter your address</div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="error-message" id="cityError">Please enter your city</div>

            <div class="section-title">Order Summary</div>
            
            <div class="form-group">
                <label for="amount">Total Amount:</label>
                <input type="text" id="amount" name="amount" value="₱0.00" readonly style="background-color: #f5f5f5;">
            </div>

            <div class="button-container">
                <button type="button" class="back-button" onclick="goBack()">CANCEL</button>
                <button type="submit" class="next-button" id="submitButton">PROCEED</button>
            </div>
        </form>
    </div>

    <!-- Payment Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <div class="modal-title">Payment Confirmation</div>
            <div class="modal-message">
                Your payment has been processed successfully!<br>
                Thank you for your purchase.
            </div>
            <button class="modal-button" onclick="closeModalAndRedirect()">OK</button>
        </div>
    </div>

    <script>
        // Get total amount from URL parameters or localStorage
        function getTotalAmount() {
            // First try to get from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const totalFromUrl = urlParams.get('total');
            
            if (totalFromUrl) {
                return parseFloat(totalFromUrl);
            }
            
            // If not in URL, try to get from sessionStorage (if seats.php stored it there)
            const totalFromStorage = sessionStorage.getItem('totalAmount');
            if (totalFromStorage) {
                return parseFloat(totalFromStorage);
            }
            
            // Default fallback
            return 99.99;
        }

        // Set the total amount on page load
        window.addEventListener('load', function() {
            const totalAmount = getTotalAmount();
            document.getElementById('amount').value = '₱' + totalAmount.toFixed(2);
        });

        // Card number formatting
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Mobile number formatting
        document.getElementById('mobile').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^0-9+\-\s()]/g, '');
        });

        // Validation functions
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validateCardNumber(cardNumber) {
            const cleaned = cardNumber.replace(/\s/g, '');
            return cleaned.length >= 13 && cleaned.length <= 19 && /^\d+$/.test(cleaned);
        }

        function showError(fieldId, show) {
            const errorElement = document.getElementById(fieldId + 'Error');
            if (errorElement) {
                errorElement.style.display = show ? 'block' : 'none';
            }
        }

        // Form submission
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset all error messages
            const errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(el => el.style.display = 'none');
            
            let isValid = true;
            
            // Validate all fields
            const email = document.getElementById('email').value;
            const confirmEmail = document.getElementById('confirmEmail').value;
            
            if (!validateEmail(email)) {
                showError('email', true);
                isValid = false;
            }
            
            if (email !== confirmEmail) {
                showError('confirmEmail', true);
                isValid = false;
            }
            
            if (!document.getElementById('firstName').value.trim()) {
                showError('firstName', true);
                isValid = false;
            }
            
            if (!document.getElementById('lastName').value.trim()) {
                showError('lastName', true);
                isValid = false;
            }
            
            if (!document.getElementById('mobile').value.trim()) {
                showError('mobile', true);
                isValid = false;
            }
            
            const cardNumber = document.getElementById('cardNumber').value;
            if (!validateCardNumber(cardNumber)) {
                showError('card', true);
                isValid = false;
            }
            
            if (!document.getElementById('cardName').value.trim()) {
                showError('cardName', true);
                isValid = false;
            }
            
            if (!document.getElementById('address').value.trim()) {
                showError('address', true);
                isValid = false;
            }
            
            if (!document.getElementById('city').value.trim()) {
                showError('city', true);
                isValid = false;
            }
            
            if (isValid) {
                // Show confirmation modal instead of success message
                document.getElementById('confirmationModal').style.display = 'block';
            }
        });

        function goBack() {
            // Redirect to homepage.php
            window.location.href = 'homepage.php';
        }

        // Close modal and redirect to homepage
        function closeModalAndRedirect() {
            document.getElementById('confirmationModal').style.display = 'none';
            window.location.href = 'homepage.php';
        }

        

        // Real-time validation
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('blur', function() {
                const fieldName = this.name;
                let isValid = true;
                
                switch(fieldName) {
                    case 'email':
                        isValid = validateEmail(this.value);
                        showError('email', !isValid);
                        break;
                    case 'confirmEmail':
                        const email = document.getElementById('email').value;
                        isValid = this.value === email && email !== '';
                        showError('confirmEmail', !isValid);
                        break;
                    case 'cardNumber':
                        isValid = validateCardNumber(this.value);
                        showError('card', !isValid);
                        break;
                }
            });
        });
    </script>
</body>
</html>