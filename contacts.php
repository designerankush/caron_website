<?php include 'includes/header.php'; ?>

<!-- Start Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Contact Us</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>
    </div>
  </div>
</div>
<!-- End Hero -->

<div class="cs-height_150 cs-height_lg_80"></div>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="cs-section_heading cs-style1">
        <h3 class="cs-section_subtitle">Getting Touch</h3>
        <h2 class="cs-section_title">Do you have a project <br>in your mind?</h2>
      </div>
      <div class="cs-height_55 cs-height_lg_30"></div>
      <ul class="cs-contact_info cs-style1 cs-mp0">
        <li>
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17 12.5C15.75 12.5 14.55 12.3 13.43 11.93C13.08 11.82 12.69 11.9 12.41 12.17L10.21 14.37C7.38 12.93 5.06 10.62 3.62 7.79L5.82 5.58C6.1 5.31 6.18 4.92 6.07 4.57C5.7 3.45 5.5 2.25 5.5 1C5.5 0.45 5.05 0 4.5 0H1C0.45 0 0 0.45 0 1C0 10.39 7.61 18 17 18C17.55 18 18 17.55 18 17V13.5C18 12.95 17.55 12.5 17 12.5ZM9 0V10L12 7H18V0H9Z" fill="#05abc3"></path>
          </svg>
          <span>+919872612298</span>
        </li>
        <li>
          <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 6.98V16C20 17.1 19.1 18 18 18H2C0.9 18 0 17.1 0 16V4C0 2.9 0.9 2 2 2H12.1C12.04 2.32 12 2.66 12 3C12 4.48 12.65 5.79 13.67 6.71L10 9L2 4V6L10 11L15.3 7.68C15.84 7.88 16.4 8 17 8C18.13 8 19.16 7.61 20 6.98ZM14 3C14 4.66 15.34 6 17 6C18.66 6 20 4.66 20 3C20 1.34 18.66 0 17 0C15.34 0 14 1.34 14 3Z" fill="#05abc3"></path>
          </svg>
          <a class="text-white" href="mailto:manish@caroninfotech.com">manish@caroninfotech.com</a><br/>
          <a class="text-white" href="mailto:contact@caroninfotech.com">contact@caroninfotech.com</a>
        </li>
        <li>
          <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z" fill="#05abc3"></path>
          </svg>
          <span>#538, 5th floor, Jubilee Walk, Sector 70,
          <br>SAS Nagar, Punjab, India,
          <br>160071</span>
        </li>
      </ul>
      <div class="cs-height_0 cs-height_lg_50"></div>
    </div>

    <div class="col-lg-6">
      <!-- Contact Form -->
      <form id="cs-form" action="mail_go.php" method="POST" class="row g-3" novalidate>
        <!-- Full Name -->
        <div class="col-sm-6">
          <label class="cs-primary_color">Full Name*</label>
          <input type="text" class="cs-form_field form-control" name="full-name" required minlength="3">
          <div class="invalid-feedback">Full name is required (min 3 characters).</div>
        </div>

        <!-- Email -->
        <div class="col-sm-6">
          <label class="cs-primary_color">Email*</label>
          <input type="email" class="cs-form_field form-control" name="email" required>
          <div class="invalid-feedback">Valid email is required.</div>
        </div>

        <!-- Project Type -->
        <div class="col-sm-6">
          <label class="cs-primary_color">Project Type*</label>
          <select class="cs-form_field form-control" name="project" required>
            <option value="">-- Select Project Type --</option>
            <option value="Mobile Development">Mobile Development</option>
            <option value="Web Development">Web Development</option>
            <option value="Game Development">Game Development</option>
            <option value="E-commerce">E-commerce</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="Others">Others</option>
          </select>
          <div class="invalid-feedback">Please select a project type.</div>
        </div>

        <!-- Mobile -->
        <div class="col-sm-6">
          <label class="cs-primary_color">Mobile*</label>
          <input type="text" class="cs-form_field form-control" name="number"
                 required inputmode="tel" maxlength="15"
                 pattern="^[0-9+\- ]{10,15}$" placeholder="+91XXXXXXXXXX">
          <div class="invalid-feedback">Enter a valid mobile number (10–15 digits, + and - allowed).</div>
        </div>

        <!-- Message -->
        <div class="col-12">
          <label class="cs-primary_color">Write Project Details*</label>
          <textarea name="message" class="cs-form_field form-control" rows="7" required minlength="10"></textarea>
          <div class="invalid-feedback">Message must be at least 10 characters.</div>
        </div>

        <div class="col-12">
          <button class="cs-btn cs-style1" type="submit" id="cs-submit-btn">
            <span>Send Message</span>
            <svg width="26" height="12" ...></svg>
          </button>
        </div>
      </form>
      <!-- /Contact Form -->
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>
<div class="cs-google_map cs-bg" data-src="assets/img/map_img.jpeg">
  <iframe src="https://www.google.com/maps/d/embed?mid=1dHTFxoEZ00uuNNe1oONObzY8mjQ&hl=en_US&ehbc=2E312F" width="640" height="480" allowfullscreen></iframe>
</div>

<!-- Success/Error Modal (Bootstrap 5) -->
<div class="modal fade ci-modal" id="statusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="statusModalCard">
      <div class="modal-header align-items-center">
        <span class="ci-status-icon me-2" id="statusIcon" aria-hidden="true"></span>
        <h5 class="modal-title mb-0" id="statusTitle">Message Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p class="mb-0" id="statusText"></p>
      </div>

      <div class="modal-footer justify-content-between">
        <small class="text-muted" id="statusHint"></small>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cs-height_100 cs-height_lg_80"></div>
<?php include 'includes/footer.php'; ?>