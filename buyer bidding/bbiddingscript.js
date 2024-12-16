document.getElementById('increment').addEventListener('click', function() {
    var qty = document.getElementById('qty');
    qty.value = parseInt(qty.value) + 1;
});

document.getElementById('decrement').addEventListener('click', function() {
    var qty = document.getElementById('qty');
    if (qty.value > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
});

document.getElementById('placeBid').addEventListener('click', function() {
    var biddingPrice = document.getElementById('bidding-price').value;
    var qty = document.getElementById('qty').value;
    if (biddingPrice && qty) {
        alert('Bid placed with price Rs ' + biddingPrice + ' for quantity ' + qty);
    } else {
        alert('Please enter a bidding price and quantity.');
    }
});

document.getElementById('cancelBid').addEventListener('click', function() {
    alert('Bid has been canceled.');
});
