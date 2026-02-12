<?php
$page_title = "Thank You | Caron Infotech";
$meta_description = "Thank you for contacting Caron Infotech. We will get back to you soon.";
include 'includes/header.php';
?>

<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Thank You</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="contacts.php">Contact</a></li>
        <li class="breadcrumb-item active">Thank You</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_100 cs-height_lg_60"></div>

<section class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 text-center">
      <div style="background:#0f1318;border:1px solid rgba(255,255,255,.08);border-radius:18px;padding:40px;">
        <h2 class="cs-font_38 cs-white_color mb-3">We received your message!</h2>
        <p style="color:#a9b0b8" class="mb-4">
          Thanks for reaching out. Our team will contact you shortly.
        </p>

        <a class="cs-text_btn" href="contacts.php">
          <span>Go back to Contact</span>
          <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z" fill="currentColor"/>
          </svg>
        </a>

        <div class="mt-4" style="color:#a9b0b8;font-size:14px;">
          Redirecting you back in <span id="ci-count">5</span> seconds...
        </div>
      </div>
    </div>
  </div>
</section>

<div class="cs-height_150 cs-height_lg_80"></div>

<script>
  (function () {
    var seconds = 5;
    var el = document.getElementById('ci-count');
    var t = setInterval(function () {
      seconds--;
      if (el) el.textContent = seconds;
      if (seconds <= 0) {
        clearInterval(t);
        window.location.href = 'contacts.php';
      }
    }, 1000);
  })();
</script>

<?php include 'includes/footer.php'; ?>
