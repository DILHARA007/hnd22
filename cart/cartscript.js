/* JavaScript: buyer_cart.js */
const removeButtons = document.querySelectorAll('.remove-btn');
removeButtons.forEach(button => {
    button.addEventListener('click', () => {
        alert('Remove item functionality pending!');
    });
});

const quantityInputs = document.querySelectorAll('.cart-table input[type="number"]');
quantityInputs.forEach(input => {
    input.addEventListener('change', () => {
        alert('Update quantity functionality pending!');
    });
});
