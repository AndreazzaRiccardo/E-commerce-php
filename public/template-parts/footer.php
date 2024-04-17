<?php
    $cm = new CartManager();
    $cartID = $cm->getCartID();
    $cart_total = $cm->getCartTotal($cartID);
?>

<footer class="bg-primary pt-3 pb-1">
    <p class="container text-light">By Riccardo Andreazza, Copyright &copy; 2024</p>
</footer>

<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://bootswatch.com/_vendor/prismjs/prism.js"></script>

<script src="<?= ROOT_URL ?>/assets/js/main.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.total-items').innerHTML = '<?php echo $cart_total['num_products']; ?>';
});
</script>
</body>

</html>