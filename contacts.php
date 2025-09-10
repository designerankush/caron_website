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
          <svg width="18" height="18" ...></svg>
          <span>+919872612298</span>
        </li>
        <li>
          <svg width="20" height="18" ...></svg>
          <a class="text-white" href="mailto:manish@caroninfotech.com">manish@caroninfotech.com</a><br/>
          <a class="text-white" href="mailto:mukhpal.singh@caroninfotech.com">mukhpal.singh@caroninfotech.com</a>
        </li>
        <li>
          <svg width="14" height="20" ...></svg>
          <span>C-253, Phase 8B, Industrial Area,<br>SAS Nagar (Punjab), India<br>160071</span>
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
          <input type="text" class="cs-form_field form-control" name="project" required minlength="2">
          <div class="invalid-feedback">Project type is required.</div>
        </div>

        <!-- Mobile -->
        <div class="col-sm-6">
          <label class="cs-primary_color">Mobile*</label>
          <input type="text" class="cs-form_field form-control" name="number"
                 required inputmode="tel" maxlength="15"
                 pattern="^[0-9+\- ]{10,15}$" placeholder="e.g. 09999060011 or +91XXXXXXXXXX">
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

<?php include 'includes/footer.php'; ?>