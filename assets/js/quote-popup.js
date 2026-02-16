document.addEventListener('DOMContentLoaded', function () {
  const openBtn = document.getElementById('openQuoteModal');
  const modal = document.getElementById('quoteModal');
  const closeBtn = document.getElementById('closeQuoteModal');

  // Safety check (VERY IMPORTANT)
  if (!openBtn || !modal || !closeBtn) return;

  openBtn.addEventListener('click', function () {
    modal.classList.add('active');
    document.body.classList.add('cs-modal-open');
  });

  closeBtn.addEventListener('click', function () {
    modal.classList.remove('active');
    document.body.classList.remove('cs-modal-open');
  });

  modal.querySelector('.cs-modal-overlay').addEventListener('click', function () {
    modal.classList.remove('active');
    document.body.classList.remove('cs-modal-open');
  });
});
