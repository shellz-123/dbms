<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .form-container {
            background-color: #f5f5dc;
            padding: 30px;
            width: 400px;
            border: 1px solid black;
        } 

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
            width: 140px;
            text-align: right;
            margin-right: 10px;
            font-weight: normal;
        }

        input[type="text"], input[type="email"] {
            padding: 6px 8px;
            border: 1px solid #999;
            border-radius: 3px;
            font-size: 14px;
            width: 200px;
            background-color: white;
        }

        .checkbox-row {
            margin: 20px 0;
            font-size: 12px;
            color: #333;
        }

        .checkbox-row input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-row a {
            color: #0066cc;
            text-decoration: underline;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 20px;
            border: 1px solid #999;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            background: linear-gradient(to bottom, #f8f8f8, #e8e8e8);
        }

        .btn:hover {
            background: linear-gradient(to bottom, #e8e8e8, #d8d8d8);
        }

        .btn-back {
            background: linear-gradient(to bottom, #f0f0f0, #e0e0e0);
        }

        .btn-next {
            background: linear-gradient(to bottom, #ffa500, #ff8c00);
            color: white;
            border-color: #ff8c00;
        }

        .btn-next:hover {
            background: linear-gradient(to bottom, #ff8c00, #ff7700);
        }
    </style>
</head>
<body>
    <form class="form-container">
        <div class="form-row">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email">
        </div>

        <div class="form-row">
            <label for="confirm-email">Re-type Email Address:</label>
            <input type="email" id="confirm-email" name="confirm-email">
        </div>

        <div class="form-row">
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name">
        </div>

        <div class="form-row">
            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name">
        </div>

        <div class="form-row">
            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile">
        </div>

        

        <div class="button-row">
            <button type="button" class="btn btn-back">BACK</button>
            <button type="submit" class="btn btn-next">NEXT</button>
        </div>
    </form>

    <script>
        // Basic form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            console.log('Form submitted'); // Debug log

            const email = document.getElementById('email').value.trim();
            const confirmEmail = document.getElementById('confirm-email').value.trim();
            const firstName = document.getElementById('first-name').value.trim();
            const lastName = document.getElementById('last-name').value.trim();
            const mobile = document.getElementById('mobile').value.trim();

            console.log('Form values:', { email, confirmEmail, firstName, lastName, mobile}); // Debug log

            if (!email || !confirmEmail || !firstName || !lastName || !mobile) {
                alert('Please fill in all required fields.');
                return;
            }

            if (email !== confirmEmail) {
                alert('Email addresses do not match.');
                return;
            }


            console.log('All validation passed, redirecting...'); // Debug log
            // Redirect to seats.php
            window.location.href = 'seats.php';
        });

        // Back button functionality
        document.querySelector('.btn-back').addEventListener('click', function() {
            console.log('Back button clicked'); // Debug log
            window.location.href = 'homepage.php';
        });
    </script>
</body>
</html>