document.addEventListener("DOMContentLoaded", function () {

    const stripe = Stripe(STRIPE_KEY);

    document.getElementById("payBtn").addEventListener("click", function () {

        fetch(BASE_URL + "create-session", { method: "POST" })
            .then(res => res.json())
            .then(session => {
                return stripe.redirectToCheckout({
                    sessionId: session.id
                });

            })
            .catch(err => console.log(err));
    });

});