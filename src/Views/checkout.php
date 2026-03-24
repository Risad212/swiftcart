

<h2>Checkout</h2>

<form action="<?php echo BASE_URL ?>/checkout" method="post">
    <input type="text" name="name" value="<?php echo $data['name']; ?>">
    <input type="email" name="email" value="<?php echo $data['email'] ?>">
    <input type="submit" value="Checkout">
</form>