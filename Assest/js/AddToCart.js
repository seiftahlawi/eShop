if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
function ready() {

    updateCartTotal();
}
function updateCartTotal() {
    var total = 0;
    var cartRows = document.getElementsByClassName('cart-row')

    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElemant = cartRow.getElementsByClassName('input-number')
        [0]

        var price = parseFloat(priceElement.innerText.replace('$', ""))
        var quantity = quantityElemant.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementById('total').innerText = "$" + total
}

/*
    $('.plus').click(function(e) {

       var x = e.target.parentElement
     m= document.getElementsByClassName('input-number').parentElement.value;
        alert(m)
        var val = parseInt(x.val(), 2)
        alert(val)
    })*/