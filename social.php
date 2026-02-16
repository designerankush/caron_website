<?php
include 'includes/header.php';

// Load Instagram URLs (array of strings)
$igUrls = include __DIR__.'/data/social.php';
if (!is_array($igUrls)) $igUrls = [];

// How many to show initially / per “load more”
$INITIAL = 6;
$STEP    = 6;
?>

<!-- Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Social Hub</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Instagram</li>
      </ol>
    </div>
  </div>
</div>

<!-- <div class="cs-height_150 cs-height_lg_80"></div> -->

<!-- make the section full-bleed -->
<div class="container-fluid px-0">

  <!-- Header -->
  <!-- <div class="d-flex align-items-center justify-content-between mb-3 px-3 px-md-4">
    <h2 class="h5 mb-0">Instagram</h2>
    <span class="text-muted small"><?= count($igUrls) ?> posts</span>
  </div> -->

  <!-- Grid: one post per full-width row -->
  <div class="row g-0" id="socialGrid" data-step="<?=$STEP?>">
    <?php foreach ($igUrls as $i => $url): ?>
      <div class="col-12 social-card<?= $i >= $INITIAL ? ' d-none' : '' ?>">
        <div class="card ci-ig bg-transparent border-0 rounded-0 p-0">
          <blockquote class="instagram-media mb-0"
            data-instgrm-permalink="<?= htmlspecialchars($url) ?>"
            data-instgrm-version="14">
          </blockquote>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if (count($igUrls) > $INITIAL): ?>
    <div class="text-center mt-4">
      <button id="loadMoreIg" class="cs-btn cs-style1">
        <span>Load more</span>
        <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z" fill="currentColor"/>
        </svg>
      </button>
    </div>
  <?php endif; ?>
</div>

<!-- <div class="cs-height_150 cs-height_lg_80"></div> -->

<!-- Instagram SDK -->
<script async src="//www.instagram.com/embed.js"></script>

<!-- Force full width for IG embed -->
<style>
  /* Remove the 540px cap Instagram injects */
  .instagram-media,
  .instagram-media * {
    max-width: 100% !important;
    width: 100% !important;
    min-width: 0 !important;
  }
  .instagram-media { margin: 0 !important; background: #121418 !important; }
  .ci-ig { border-radius: 0 !important; }
</style>

<script>
  function processIG(){ if(window.instgrm && window.instgrm.Embeds){ try{ window.instgrm.Embeds.process(); }catch(e){} } }

  document.addEventListener('DOMContentLoaded', () => {
    processIG();

    const grid   = document.getElementById('socialGrid');
    const step   = parseInt(grid?.dataset?.step || '6', 10);
    const loadBtn= document.getElementById('loadMoreIg');

    if (loadBtn) {
      loadBtn.addEventListener('click', () => {
        const hidden = Array.from(document.querySelectorAll('.social-card.d-none'));
        hidden.slice(0, step).forEach(el => el.classList.remove('d-none'));
        processIG();
        if (document.querySelectorAll('.social-card.d-none').length === 0) {
          loadBtn.disabled = true;
          loadBtn.querySelector('span').textContent = 'All loaded';
        }
      });
    }
  });
</script>
<div class="cs-height_50 cs-height_lg_30"></div>

<?php include 'includes/footer.php'; ?>
