// Add functionality to dynamically add rows for price ranges
document.querySelector('.add-range').addEventListener('click', () => {
    const form = document.querySelector('.form');

    // Create a new row
    const newRow = document.createElement('div');
    newRow.classList.add('row');
    newRow.innerHTML = `
        <label>Price</label>
        <span>From</span>
        <input type="number" class="input-box">
        <span>KG</span>
        <span>TO</span>
        <input type="number" class="input-box">
        <span>KG</span>
        <input type="number" class="input-box">
    `;

    // Insert before buttons
    const buttons = document.querySelector('.buttons');
    form.insertBefore(newRow, buttons);
});
