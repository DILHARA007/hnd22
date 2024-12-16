// Select DOM elements
const imageContainer = document.getElementById('image-container');
const incrementBtn = document.getElementById('incrementBtn');
const decrementBtn = document.getElementById('decrementBtn');
const quantityInput = document.getElementById('quantityInput');
const orderBtn = document.getElementById('orderBtn');
const cancelBtn = document.getElementById('cancelBtn');

// Image URL (set to null if no image is available)
const imageURL = null; // Replace null with an actual URL if an image is available

// Load Image or Placeholder
if (imageURL) {
  imageContainer.innerHTML = `<img src="${imageURL}" alt="Samba Rice" style="width:100%; height:100%; border-radius:10px;">`;
} else {
  imageContainer.innerHTML = `<p>No image available</p>`;
}

// Initialize available quantity
const maxQty = 170; // Maximum quantity available
const minQty = 1;   // Minimum quantity allowed

// Increment Quantity
incrementBtn.addEventListener('click', () => {
  let currentQty = parseInt(quantityInput.value);
  if (currentQty < maxQty) {
    quantityInput.value = currentQty + 1;
  }
});

// Decrement Quantity
decrementBtn.addEventListener('click', () => {
  let currentQty = parseInt(quantityInput.value);
  if (currentQty > minQty) {
    quantityInput.value = currentQty - 1;
  }
});

// Validate Quantity Input
quantityInput.addEventListener('input', () => {
  let currentQty = parseInt(quantityInput.value);
  if (currentQty > maxQty) {
    quantityInput.value = maxQty;
  } else if (currentQty < minQty || isNaN(currentQty)) {
    quantityInput.value = minQty;
  }
});


