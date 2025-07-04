<!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
const form = document.getElementById('sorter');
new Sortable(form, {
    handle: '.handler',
    animation: 150,
    onEnd: function () {
    const children = Array.from(sorter.children);

    children.forEach((child, index) => {
      const order = index + 1;

      // Update visible number
      const disp = child.querySelector('.orderdisp strong');
      if (disp) disp.textContent = order;

      // Update hidden input value
      const input = child.querySelector('input[type="hidden"]');
      if (input) input.value = order;
    });
  }
});
// Run once to initialize display
Array.from(sorter.children).forEach((child, index) => {
  const order = index + 1;

  const disp = child.querySelector('.orderdisp strong');
  if (disp) disp.textContent = order;

  const input = child.querySelector('input[type="hidden"]');
  if (input) input.value = order;
});
</script>