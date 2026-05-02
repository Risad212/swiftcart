<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SwiftCart</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>

<body>

    <header>
        <h2>App</h2>
    </header>

    <main>
        <button class="stripe-btn" id="payBtn">
            Pay with Stripe 💳
        </button>
    </main>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        window.STRIPE_KEY = "<?= $_ENV['STRIPE_PUBLIC'] ?>";
        window.BASE_URL = "<?= BASE_URL ?>";
    </script>
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>

</html>