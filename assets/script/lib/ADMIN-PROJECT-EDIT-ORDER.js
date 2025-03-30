document.querySelectorAll('.move-up').forEach(button => {
    button.addEventListener('click', function() {
        const currentRow = this.closest('.project-row');
        const prevRow = currentRow.previousElementSibling;
        
        if (prevRow) {
            swapOrder(currentRow, prevRow);
            updateDisplay();
        }
    });
});

// Handle Down button
document.querySelectorAll('.move-down').forEach(button => {
    button.addEventListener('click', function() {
        const currentRow = this.closest('.project-row');
        const nextRow = currentRow.nextElementSibling;
        
        if (nextRow) {
            swapOrder(currentRow, nextRow);
            updateDisplay();
        }
    });
});

// Swap order values between two rows
function swapOrder(row1, row2) {
    const input1 = row1.querySelector('.order-input');
    const input2 = row2.querySelector('.order-input');
    const temp = input1.value;
    input1.value = input2.value;
    input2.value = temp;
}

// Update the visible order and reorder rows
function updateDisplay() {
    const container = document.getElementById('list');
    const rows = Array.from(container.querySelectorAll('.project-row'));
    
    // Sort rows by order value
    rows.sort((a, b) => {
        const orderA = parseInt(a.querySelector('.order-input').value);
        const orderB = parseInt(b.querySelector('.order-input').value);
        return orderA - orderB;
    });
    
    // Re-append rows in sorted order
    rows.forEach(row => container.appendChild(row));
    
    // Update the displayed order numbers
    rows.forEach(row => {
        const orderInput = row.querySelector('.order-input');
        const orderDisplay = row.querySelector('.order-display');
        orderDisplay.textContent = orderInput.value;
    });
}