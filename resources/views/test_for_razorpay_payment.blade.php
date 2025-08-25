<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment Test</title>
</head>
<body>
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Razorpay Payment Gateway</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <center>
                <form action="{{ route('test_for_razorpay_payment_form_submission') }}" method="POST" >
                    @csrf 
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_API_KEY') }}"
                            data-amount="1000"
                            data-buttontext="Pay 10 Rupees"
                            data-name="QUICKMART"
                            data-description="An online shopping platform"
                            data-image=""
                            data-prefill.name="Anjali Patel"
                            data-prefill.email="anjalipatel3074@gmail.com"
                            data-theme.color="#8e44ad">
                    </script>
                </form>
            </center>
        </div>
    </div>
</body>
</html>