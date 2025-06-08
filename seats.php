<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seats</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .main-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .movie-info {
            display: flex;
            padding: 20px;
            gap: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .movie-poster {
            width: 80px;
            height: 120px;
            background: linear-gradient(45deg, #FF6B35, #F7931E);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
        }

        .movie-details h2 {
            color: #2E5BBA;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .movie-title {
            color: #D32F2F;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .movie-rating {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .showtime {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .ticket-price {
            color: #D32F2F;
            font-weight: bold;
            font-size: 14px;
        }

        .theater-container {
            padding: 30px;
            text-align: center;
        }

        .screen-label {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 8px;
            color: #333;
            margin-bottom: 30px;
        }

        .theater-layout {
            display: inline-block;
            border: 2px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .row {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            justify-content: center;
        }

        .row-label {
            width: 20px;
            font-weight: bold;
            color: #D32F2F;
            margin-right: 10px;
        }

        .row-label-right {
            width: 20px;
            font-weight: bold;
            color: #D32F2F;
            margin-left: 10px;
        }

        .seat {
            width: 18px;
            height: 18px;
            margin: 1px;
            border: 1px solid #ccc;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .seat.available {
            background-color: #90EE90;
            border-color: #4CAF50;
        }

        .seat.occupied {
            background-color: #FFB6C1;
            border-color: #F44336;
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #FFD700;
            border-color: #FFA500;
            border-width: 2px;
        }

        .seat:hover:not(.occupied) {
            transform: scale(1.1);
            border-width: 2px;
        }

       
        .selection-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .selected-seats {
            color: #FF6B35;
            font-weight: bold;
        }

        .total-price {
            font-weight: bold;
            font-size: 18px;
        }

        .quantity {
            justify-content: space-between;
            margin-top: 15px;
            display: flex;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            padding-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
        }

        .btn-continue {
            background-color: #28a745;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .disclaimer {
            font-size: 12px;
            color: #666;
            text-align: center;
            margin: 20px;
            line-height: 1.4;
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0;
            font-size: 12px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .legend-seat {
            width: 15px;
            height: 15px;
            border: 1px solid #ccc;
        }
         .legend-seat.available {
            background-color: #90EE90;
            border-color: #4CAF50;
        }

        .legend-seat.occupied {
            
            background-color: #FFB6C1;
            border-color: #F44336;
        }
        .legend-seat.selected {
            background-color: #FFD700;
            border-color: #FFA500;
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
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.3s ease-out;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(45deg, #2E5BBA, #4CAF50);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .modal-body {
            padding: 30px;
        }

        .confirmation-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
            padding-top: 15px;
            border-top: 2px solid #ddd;
            font-weight: bold;
            font-size: 18px;
        }

        .detail-label {
            color: #333;
            font-weight: 500;
        }

        .detail-value {
            color: #D32F2F;
            font-weight: bold;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn-modal {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-done {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
        }

        .btn-modal:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-50px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .main-container {
                margin: 10px;
                border-radius: 0;
            }
            
            .theater-container {
                padding: 15px;
            }
            
            .seat {
                width: 15px;
                height: 15px;
            }
            
            .movie-info {
                flex-direction: column;
                text-align: center;
            }

            .modal-content {
                margin: 10% auto;
                width: 95%;
            }

            .modal-body {
                padding: 20px;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .btn-modal {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="movie-info">
            <div class="movie-poster">4DX</div>
            <div class="movie-details">
                <h2>Bonifacio High Street</h2>
                <div class="movie-title">Cinema 4, (2D/4DX) BALLERINA</div>
                <div class="movie-rating">R-16 (Restricted 16)</div>
                <div class="showtime">Sunday, June 8, 2025 6:05:00 PM</div>
                <div class="ticket-price">Ticket Price: Php500.00</div>
            </div>
        </div>

        <div class="theater-container">
            <div class="screen-label">THE SCREEN IS HERE</div>
            
            <div class="theater-layout">
                <div class="row">
                    <div class="row-label">A</div>
                    <div class="seat available" data-seat="A1"></div><div class="seat available" data-seat="A2"></div><div class="seat available" data-seat="A3"></div><div class="seat available" data-seat="A4"></div><div class="seat available" data-seat="A5"></div><div class="seat available" data-seat="A6"></div><div class="seat available" data-seat="A7"></div><div class="seat available" data-seat="A8"></div><div class="seat available" data-seat="A9"></div><div class="seat available" data-seat="A10"></div><div class="seat available" data-seat="A11"></div><div class="seat available" data-seat="A12"></div><div class="seat available" data-seat="A13"></div><div class="seat available" data-seat="A14"></div><div class="seat available" data-seat="A15"></div><div class="seat available" data-seat="A16"></div><div class="seat available" data-seat="A17"></div><div class="seat available" data-seat="A18"></div><div class="seat available" data-seat="A19"></div><div class="seat available" data-seat="A20"></div>
                    <div class="row-label-right">A</div>
                </div>
                <div class="row">
                    <div class="row-label">B</div>
                    <div class="seat available" data-seat="B1"></div><div class="seat available" data-seat="B2"></div><div class="seat available" data-seat="B3"></div><div class="seat available" data-seat="B4"></div><div class="seat available" data-seat="B5"></div><div class="seat available" data-seat="B6"></div><div class="seat available" data-seat="B7"></div><div class="seat available" data-seat="B8"></div><div class="seat available" data-seat="B9"></div><div class="seat available" data-seat="B10"></div><div class="seat available" data-seat="B11"></div><div class="seat available" data-seat="B12"></div><div class="seat available" data-seat="B13"></div><div class="seat available" data-seat="B14"></div><div class="seat available" data-seat="B15"></div><div class="seat available" data-seat="B16"></div><div class="seat available" data-seat="B17"></div><div class="seat available" data-seat="B18"></div><div class="seat available" data-seat="B19"></div><div class="seat available" data-seat="B20"></div>
                    <div class="row-label-right">B</div>
                </div>
                <div class="row">
                    <div class="row-label">C</div>
                    <div class="seat available" data-seat="C1"></div><div class="seat available" data-seat="C2"></div><div class="seat available" data-seat="C3"></div><div class="seat available" data-seat="C4"></div><div class="seat available" data-seat="C5"></div><div class="seat available" data-seat="C6"></div><div class="seat available" data-seat="C7"></div><div class="seat available" data-seat="C8"></div><div class="seat available" data-seat="C9"></div><div class="seat available" data-seat="C10"></div><div class="seat available" data-seat="C11"></div><div class="seat available" data-seat="C12"></div><div class="seat available" data-seat="C13"></div><div class="seat available" data-seat="C14"></div><div class="seat available" data-seat="C15"></div><div class="seat available" data-seat="C16"></div><div class="seat available" data-seat="C17"></div><div class="seat available" data-seat="C18"></div><div class="seat available" data-seat="C19"></div><div class="seat available" data-seat="C20"></div>
                    <div class="row-label-right">C</div>
                </div>
                <div class="row">
                    <div class="row-label">D</div>
                    <div class="seat available" data-seat="D1"></div><div class="seat available" data-seat="D2"></div><div class="seat available" data-seat="D3"></div><div class="seat available" data-seat="D4"></div><div class="seat available" data-seat="D5"></div><div class="seat available" data-seat="D6"></div><div class="seat available" data-seat="D7"></div><div class="seat available" data-seat="D8"></div><div class="seat available" data-seat="D9"></div><div class="seat available" data-seat="D10"></div><div class="seat available" data-seat="D11"></div><div class="seat available" data-seat="D12"></div><div class="seat available" data-seat="D13"></div><div class="seat available" data-seat="D14"></div><div class="seat available" data-seat="D15"></div><div class="seat available" data-seat="D16"></div><div class="seat available" data-seat="D17"></div><div class="seat available" data-seat="D18"></div><div class="seat available" data-seat="D19"></div><div class="seat available" data-seat="D20"></div>
                    <div class="row-label-right">D</div>
                </div>
                <div class="row">
                    <div class="row-label">E</div>
                    <div class="seat available" data-seat="E1"></div><div class="seat available" data-seat="E2"></div><div class="seat available" data-seat="E3"></div><div class="seat available" data-seat="E4"></div><div class="seat available" data-seat="E5"></div><div class="seat available" data-seat="E6"></div><div class="seat available" data-seat="E7"></div><div class="seat available" data-seat="E8"></div><div class="seat available" data-seat="E9"></div><div class="seat available" data-seat="E10"></div><div class="seat available" data-seat="E11"></div><div class="seat available" data-seat="E12"></div><div class="seat available" data-seat="E13"></div><div class="seat available" data-seat="E14"></div><div class="seat available" data-seat="E15"></div><div class="seat available" data-seat="E16"></div><div class="seat available" data-seat="E17"></div><div class="seat available" data-seat="E18"></div><div class="seat available" data-seat="E19"></div><div class="seat available" data-seat="E20"></div>
                    <div class="row-label-right">E</div>
                </div>
                <div class="row">
                    <div class="row-label">F</div>
                    <div class="seat available" data-seat="F1"></div><div class="seat available" data-seat="F2"></div><div class="seat available" data-seat="F3"></div><div class="seat available" data-seat="F4"></div><div class="seat available" data-seat="F5"></div><div class="seat available" data-seat="F6"></div><div class="seat available" data-seat="F7"></div><div class="seat available" data-seat="F8"></div><div class="seat available" data-seat="F9"></div><div class="seat available" data-seat="F10"></div><div class="seat available" data-seat="F11"></div><div class="seat available" data-seat="F12"></div><div class="seat available" data-seat="F13"></div><div class="seat available" data-seat="F14"></div><div class="seat available" data-seat="F15"></div><div class="seat available" data-seat="F16"></div><div class="seat available" data-seat="F17"></div><div class="seat available" data-seat="F18"></div><div class="seat available" data-seat="F19"></div><div class="seat available" data-seat="F20"></div>
                    <div class="row-label-right">F</div>
                </div>
                <div class="row">
                    <div class="row-label">G</div>
                    <div class="seat available" data-seat="G1"></div><div class="seat available" data-seat="G2"></div><div class="seat available" data-seat="G3"></div><div class="seat available" data-seat="G4"></div><div class="seat available" data-seat="G5"></div><div class="seat available" data-seat="G6"></div><div class="seat available" data-seat="G7"></div><div class="seat available" data-seat="G8"></div><div class="seat available" data-seat="G9"></div><div class="seat available" data-seat="G10"></div><div class="seat available" data-seat="G11"></div><div class="seat available" data-seat="G12"></div><div class="seat available" data-seat="G13"></div><div class="seat available" data-seat="G14"></div><div class="seat available" data-seat="G15"></div><div class="seat available" data-seat="G16"></div><div class="seat available" data-seat="G17"></div><div class="seat available" data-seat="G18"></div><div class="seat available" data-seat="G19"></div><div class="seat available" data-seat="G20"></div>
                    <div class="row-label-right">G</div>
                </div>
                <div class="row">
                    <div class="row-label">H</div>
                    <div class="seat available" data-seat="H1"></div><div class="seat available" data-seat="H2"></div><div class="seat available" data-seat="H3"></div><div class="seat available" data-seat="H4"></div><div class="seat available" data-seat="H5"></div><div class="seat available" data-seat="H6"></div><div class="seat available" data-seat="H7"></div><div class="seat available" data-seat="H8"></div><div class="seat available" data-seat="H9"></div><div class="seat available" data-seat="H10"></div><div class="seat available" data-seat="H11"></div><div class="seat available" data-seat="H12"></div><div class="seat available" data-seat="H13"></div><div class="seat available" data-seat="H14"></div><div class="seat available" data-seat="H15"></div><div class="seat available" data-seat="H16"></div><div class="seat available" data-seat="H17"></div><div class="seat available" data-seat="H18"></div><div class="seat available" data-seat="H19"></div><div class="seat available" data-seat="H20"></div>
                    <div class="row-label-right">H</div>
                </div>
            </div>

            <div class="legend">
                <div class="legend-item">
                    <div class="legend-seat available"></div>
                    <span>Available</span>
                </div>
                <div class="legend-item">
                    <div class="legend-seat occupied"></div>
                    <span>Occupied</span>
                </div>
                <div class="legend-item">
                    <div class="legend-seat selected"></div>
                    <span>Selected</span>
                </div>
            </div>

            <div class="selection-info">
                <div class="info-row">
                    <span>Selected seats:</span>
                    <span class="selected-seats" id="selectedSeats">None</span>
                </div>
                <div class="info-row">
                    <span>Total Ticket Price:</span>
                    <span class="total-price" id="totalPrice">0</span>
                </div>
                <div class="quantity">
                    <span>Quantity:</span>
                    <span class="selected-seats" id="seatQuantity">0</span>
                </div>
            </div>

            <div class="buttons">
                <a href="homepage.php" class="btn btn-back">Back</a>
                <button class="btn btn-continue">SELECT SEATS!</button>
            </div>
        </div>
    </div>

    <!-- Booking Confirmation Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2> Booking Confirmation</h2>
            </div>
            <div class="modal-body">
                <div class="confirmation-details">
                    <div class="detail-row">
                        <span class="detail-label">Movie:</span>
                        <span class="detail-value">BALLERINA (4DX)</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Cinema:</span>
                        <span class="detail-value">Cinema 4, Bonifacio High Street</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Showtime:</span>
                        <span class="detail-value">June 8, 2025 - 6:05 PM</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Selected Seats:</span>
                        <span class="detail-value" id="modalSelectedSeats">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Quantity:</span>
                        <span class="detail-value" id="modalQuantity">0</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total Amount:</span>
                        <span class="detail-value" id="modalTotalPrice">Php 0.00</span>
                    </div>
                </div>
                <div class="modal-buttons">
                    <button class="btn-modal btn-cancel" onclick="closeModal()">Cancel</button>
                    <button class="btn-modal btn-done" onclick="proceedToPayment()">Done - Proceed to Payment</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const TICKET_PRICE = 500;
        let selectedSeats = [];

        // Get all available seats
        const seats = document.querySelectorAll('.seat.available');
        const selectedSeatsDisplay = document.getElementById('selectedSeats');
        const totalPriceDisplay = document.getElementById('totalPrice');
        const seatQuantityDisplay = document.getElementById('seatQuantity');
        const modal = document.getElementById('bookingModal');

        // Add click event to each available seat
        seats.forEach(seat => {
            seat.addEventListener('click', function() {
                const seatNumber = this.getAttribute('data-seat');
                
                if (this.classList.contains('selected')) {
                    // Deselect seat
                    this.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                } else {
                    // Select seat
                    this.classList.add('selected');
                    selectedSeats.push(seatNumber);
                }
                
                updateDisplay();
            });
        });

        function updateDisplay() {
            // Update selected seats display
            if (selectedSeats.length === 0) {
                selectedSeatsDisplay.textContent = 'None';
            } else {
                selectedSeatsDisplay.textContent = selectedSeats.sort().join(', ');
            }

            // Update quantity display
            seatQuantityDisplay.textContent = selectedSeats.length;

            // Update total price
            const totalPrice = selectedSeats.length * TICKET_PRICE;
            totalPriceDisplay.textContent = totalPrice;
        }

        function showBookingModal() {
            if (selectedSeats.length === 0) {
                alert('Please select at least one seat before proceeding.');
                return;
            }

            // Update modal content
            document.getElementById('modalSelectedSeats').textContent = selectedSeats.sort().join(', ');
            document.getElementById('modalQuantity').textContent = selectedSeats.length;
            document.getElementById('modalTotalPrice').textContent = `Php ${(selectedSeats.length * TICKET_PRICE).toFixed(2)}`;

            // Show modal
            modal.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        function proceedToPayment() {
            // Redirect to payment.php
            window.location.href = 'payment.php';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Update the continue button to show modal instead of alert
        document.querySelector('.btn-continue').addEventListener('click', showBookingModal);

        // Initialize display
        updateDisplay();
    </script>
</body>
</html>