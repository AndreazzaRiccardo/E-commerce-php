
document.getElementById("term").addEventListener("change", function () {
    var buyButton = document.getElementById("buyButton");
    if (this.checked) {
        buyButton.disabled = false;
    } else {
        buyButton.disabled = true;
    }
});
