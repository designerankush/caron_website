document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('apply-form');
  if (!form) return;
  const submitBtn = document.getElementById('apply-submit');

  // live cleanup
  form.querySelectorAll('input,textarea').forEach(el=>{
    const clear=()=>el.classList.remove('is-invalid');
    el.addEventListener('input',clear); el.addEventListener('change',clear); el.addEventListener('blur',clear);
  });

  form.addEventListener('submit', function (e) {
    let bad = false;
    const email  = form['email'];
    const phone  = form['phone'];
    const url    = form['profile_url'];
    const resume = form['resume'];

    // native checks
    form.querySelectorAll('[name]').forEach(f=>{
      if (!f.checkValidity()) { f.classList.add('is-invalid'); bad = true; }
    });

    // email
    if (email.value && !/^\S+@\S+\.\S+$/.test(email.value)) { email.classList.add('is-invalid'); bad = true; }

    // phone
    if (phone.value && !/^[0-9+\- ]{10,15}$/.test(phone.value)) { phone.classList.add('is-invalid'); bad = true; }

    // optional url
    if (url.value.trim()) { try { new URL(url.value.trim()); } catch(e2){ url.classList.add('is-invalid'); bad=true; } }

    // resume size/type
    if (resume.files[0]) {
      const f = resume.files[0];
      const okType = /\.(pdf|doc|docx)$/i.test(f.name);
      if (f.size > 5*1024*1024 || !okType) { resume.classList.add('is-invalid'); bad = true; }
    }

    if (bad) { e.preventDefault(); return; }
    submitBtn.setAttribute('disabled','disabled');
  });

  // success/error modal
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
      icon.innerHTML = '<svg viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      title.textContent = 'Application submitted';
      text.textContent = 'Thanks! Your application has been received. Our team will contact you shortly.';
      hint.textContent = 'You may also receive a confirmation email.';
    } else {
      card.classList.add('ci-error');
      icon.innerHTML = '<svg viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="#dc3545" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      title.textContent = 'Couldn’t submit';
      text.innerHTML = 'Something went wrong. Please try again, or email your resume to <a href="mailto:contact@caroninfotech.com">contact@caroninfotech.com</a>.';
      hint.textContent = 'If it persists, contact us directly.';
    }
    const modalEl = document.getElementById('statusModal');
    const modal = new bootstrap.Modal(modalEl, { backdrop: true, keyboard: true });
    modal.show();
    modalEl.addEventListener('hidden.bs.modal', () => {
      // keep slug, drop status
      const url = new URL(window.location.href);
      url.searchParams.delete('status');
      history.replaceState(null, '', url.toString());
    });
    if (status === 'success') {
      setTimeout(()=>{ if (document.body.classList.contains('modal-open')) modal.hide(); }, 4000);
    }
  }
});
