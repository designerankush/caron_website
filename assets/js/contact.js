document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('cs-form');
  const submitBtn = document.getElementById('cs-submit-btn');

  // Include selects in live clean-up
  form.querySelectorAll('input, textarea, select').forEach(el => {
    const clearInvalid = () => { el.classList.remove('is-invalid'); };
    el.addEventListener('input', clearInvalid);
    el.addEventListener('change', clearInvalid);
    el.addEventListener('blur', () => { if (el.checkValidity()) clearInvalid(); });
  });

  form.addEventListener('submit', function (e) {
    let hasError = false;

    const fullName = form['full-name'];
    const email    = form['email'];
    const project  = form['project'];   // <select>
    const number   = form['number'];
    const message  = form['message'];

    // reset states
    [fullName, email, project, number, message].forEach(f => f.classList.remove('is-invalid'));

    // HTML5 validity pass
    [fullName, email, number, message].forEach(f => {
      if (!f.checkValidity()) {
        f.classList.add('is-invalid');
        hasError = true;
      }
    });

    // Validate project select explicitly
    const allowedProjects = [
      'Mobile Development',
      'Web Development',
      'Game Development',
      'E-commerce',
      'Digital Marketing',
      'Others'
    ];
    if (!project.value || !allowedProjects.includes(project.value)) {
      project.classList.add('is-invalid');
      hasError = true;
    }

    // Extra email regex
    const emailPattern = /^\S+@\S+\.\S+$/;
    if (email.value.trim() && !emailPattern.test(email.value.trim())) {
      email.classList.add('is-invalid');
      hasError = true;
    }

    // Extra phone regex
    const phonePattern = /^[0-9+\- ]{10,15}$/;
    if (number.value.trim() && !phonePattern.test(number.value.trim())) {
      number.classList.add('is-invalid');
      hasError = true;
    }

    if (hasError) {
      e.preventDefault();
      return;
    }

    // prevent double submit
    submitBtn.setAttribute('disabled', 'disabled');
  });

  // ===== Modal handling (unchanged, just kept here) =====
  const params = new URLSearchParams(window.location.search);
  const status = params.get('status');

  if (status === 'success' || status === 'error') {
    const card  = document.getElementById('statusModalCard');
    const icon  = document.getElementById('statusIcon');
    const title = document.getElementById('statusTitle');
    const text  = document.getElementById('statusText');
    const hint  = document.getElementById('statusHint');

    card.classList.remove('ci-success','ci-error');

    if (status === 'success') {
      card.classList.add('ci-success');
      icon.innerHTML = `
        <svg viewBox="0 0 24 24" fill="none">
          <path d="M20 6L9 17l-5-5" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
      title.textContent = 'Message sent';
      text.innerHTML = 'Thanks! Your query was sent successfully. Our team will reach out shortly.';
      hint.textContent = 'You’ll also receive a copy in your inbox if applicable.';
    } else {
      card.classList.add('ci-error');
      icon.innerHTML = `
        <svg viewBox="0 0 24 24" fill="none">
          <path d="M6 6l12 12M18 6L6 18" stroke="#dc3545" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
      title.textContent = 'Couldn’t send your message';
      text.innerHTML = 'Something went wrong while sending your message. Please try again in a moment. You can also email us at <a href="mailto:contact@caroninfotech.com">contact@caroninfotech.com</a> or call <a href="tel:+919872612298">+91 98726 12298</a>.';
      hint.textContent = 'If the issue persists, contact us directly.';
    }

    const modalEl = document.getElementById('statusModal');
    const modal   = new bootstrap.Modal(modalEl, { backdrop: true, keyboard: true });
    modal.show();

    modalEl.addEventListener('hidden.bs.modal', () => {
      window.history.replaceState(null, '', window.location.pathname);
    });

    if (status === 'success') {
      setTimeout(() => {
        if (document.body.classList.contains('modal-open')) modal.hide();
      }, 4000);
    }
  }
});
