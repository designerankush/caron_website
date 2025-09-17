<?php
include 'includes/header.php';
$jobs = include __DIR__ . '/data/jobs.php';

$slug = $_GET['slug'] ?? '';
$job = null; foreach($jobs as $j){ if($j['slug']===$slug){ $job=$j; break; } }
if(!$job){ header('Location: careers.php'); exit; }
?>

<!-- Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color"><?=htmlspecialchars($job['title'])?></h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="careers.php">Jobs</a></li>
        <li class="breadcrumb-item active"><?=htmlspecialchars($job['title'])?></li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<div class="container">
  <div class="row g-5">
    <!-- JD -->
    <div class="col-lg-7">
      <div class="mb-3 small text-muted"><?=$job['department']?> • <?=$job['location']?> • <?=$job['type']?> • <?=$job['experience']?></div>
      <p class="lead"><?=$job['about_role']?></p>

      <h5 class="mt-4">Responsibilities</h5>
      <ul><?php foreach($job['responsibilities'] as $li): ?><li><?=htmlspecialchars($li)?></li><?php endforeach; ?></ul>

      <h5 class="mt-4">Requirements</h5>
      <ul><?php foreach($job['requirements'] as $li): ?><li><?=htmlspecialchars($li)?></li><?php endforeach; ?></ul>

      <div class="mt-4 d-flex flex-wrap gap-2">
        <?php foreach($job['tags'] as $t): ?><span class="badge bg-secondary"><?=$t?></span><?php endforeach; ?>
      </div>
    </div>

    <!-- Apply form -->
    <div class="col-lg-5" id="apply">
      <div class="cs-section_heading cs-style1">
        <h3 class="cs-section_subtitle">Apply Now</h3>
        <h2 class="cs-section_title">Join Caron Infotech</h2>
      </div>

      <form id="apply-form" action="careers_apply.php" method="POST" class="row g-3" novalidate enctype="multipart/form-data">
        <input type="hidden" name="job_id" value="<?=$job['id']?>">
        <input type="hidden" name="job_title" value="<?=htmlspecialchars($job['title'])?>">

        <div class="col-md-12">
          <label class="cs-primary_color">Full Name*</label>
          <input type="text" class="cs-form_field form-control" name="full_name" required minlength="3">
          <div class="invalid-feedback">Please enter your full name.</div>
        </div>

        <div class="col-md-12">
          <label class="cs-primary_color">Email*</label>
          <input type="email" class="cs-form_field form-control" name="email" required>
          <div class="invalid-feedback">Valid email required.</div>
        </div>

        <div class="col-md-12">
          <label class="cs-primary_color">Phone*</label>
          <input type="text" class="cs-form_field form-control" name="phone" required pattern="^[0-9+\- ]{10,15}$" placeholder="+91 98726 12298">
          <div class="invalid-feedback">Valid phone (10–15 digits).</div>
        </div>

        <div class="col-md-12">
          <label class="cs-primary_color">LinkedIn / Portfolio (optional)</label>
          <input type="url" class="cs-form_field form-control" name="profile_url" placeholder="https://…">
          <div class="invalid-feedback">Enter a valid URL.</div>
        </div>

        <div class="col-md-12">
          <label class="cs-primary_color">Resume (PDF/DOC, max 5MB)*</label>
          <input type="file" class="cs-form_field form-control" name="resume" required
                 accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
          <div class="invalid-feedback">Upload a PDF/DOC (max 5MB).</div>
        </div>

        <div class="col-12">
          <label class="cs-primary_color">Message*</label>
          <textarea class="cs-form_field form-control" name="message" rows="6" required minlength="20"></textarea>
          <div class="invalid-feedback">Please write at least 20 characters.</div>
        </div>

        <div class="col-12">
          <button class="cs-btn cs-style1" type="submit" id="apply-submit">
            <span>Submit Application</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<!-- Status Modal (reuses your ci-modal styles) -->
<div class="modal fade ci-modal" id="statusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="statusModalCard">
      <div class="modal-header align-items-center">
        <span class="ci-status-icon me-2" id="statusIcon"></span>
        <h5 class="modal-title mb-0" id="statusTitle">Application Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"><p class="mb-0" id="statusText"></p></div>
      <div class="modal-footer justify-content-between">
        <small class="text-muted" id="statusHint"></small>
        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/careers.js"></script>
<?php include 'includes/footer.php'; ?>
