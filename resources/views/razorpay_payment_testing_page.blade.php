<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <!-- Include Razorpay script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <button id="rzp-button">Pay Now</button>

    <script>
        var rzpButton = document.getElementById('rzp-button');
        rzpButton.addEventListener('click', function(e) {
            // Replace with your Razorpay key
            var razorpayKey = 'rzp_test_heqXNY739GLOMr';
            
            // Create a new Razorpay instance
            var razorpay = new Razorpay({
                key: razorpayKey,
                amount: 10000, // Amount in paise
                currency: 'INR',
                name: 'Your Company Name',
                description: 'Test Payment',
                image: 'https://example.com/your_logo.png', // Your company logo
                handler: function(response) {
                    // Handle successful payment response
                    alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
                    console.log(response);
                }
            });
            
            // Open Razorpay checkout form
            razorpay.open();
            e.preventDefault();
        });
    </script>
</body>
</html>
