<?php
include 'includes/header.php';

$faqCategories = include __DIR__ . '/data/faqs.php';

function ci_h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

function ci_find_category($cats, $slug) {
  foreach ($cats as $c) {
    if (($c['slug'] ?? '') === $slug) return $c;
  }
  return null;
}

// Selected category (default: first)
$selectedSlug = $_GET['cat'] ?? ($faqCategories[0]['slug'] ?? '');
$selected     = ci_find_category($faqCategories, $selectedSlug);
if (!$selected) {
  $selectedSlug = $faqCategories[0]['slug'] ?? '';
  $selected = ci_find_category($faqCategories, $selectedSlug);
}

// Build FAQPage JSON-LD from ALL categories (better for SEO)
$faqSchema = [
  "@context" => "https://schema.org",
  "@type"    => "FAQPage",
  "mainEntity" => []
];

foreach ($faqCategories as $cat) {
  foreach (($cat['items'] ?? []) as $it) {
    $q = trim($it['q'] ?? '');
    $a = trim($it['a'] ?? '');
    if ($q === '' || $a === '') continue;

    $faqSchema["mainEntity"][] = [
      "@type" => "Question",
      "name"  => $q,
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text"  => $a
      ]
    ];
  }
}
?>
<script type="application/ld+json"><?= json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?></script>

<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Frequently Asked Questions</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">FAQ</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_100 cs-height_lg_80"></div>

<div class="container">
  <div class="row">
    <!-- Left Category Menu -->
    <div class="col-lg-4">
      <div class="cs-faq_nav cs-radius_15" style="background:#0f1318;border:1px solid rgba(255,255,255,.08);padding:18px;">
        <h3 class="cs-font_20 cs-white_color mb-3">Browse Topics</h3>
        <ul class="cs-faq_nav_list m-0 p-0" style="list-style:none;">
          <?php foreach ($faqCategories as $cat): ?>
            <?php
              $slug = $cat['slug'] ?? '';
              $isActive = ($slug === $selectedSlug);
              $url = 'faq.php?cat=' . urlencode($slug);
            ?>
            <li style="margin-bottom:10px;">
              <a
                href="<?= ci_h($url) ?>"
                class="<?= $isActive ? 'active' : '' ?>"
                style="
                  display:block;
                  padding:12px 14px;
                  border-radius:12px;
                  text-decoration:none;
                  color: <?= $isActive ? '#fff' : '#a9b0b8' ?>;
                  background: <?= $isActive ? '#121821' : 'transparent' ?>;
                  border: 1px solid <?= $isActive ? 'rgba(255,255,255,.12)' : 'rgba(255,255,255,.06)' ?>;
                "
              >
                <?= ci_h($cat['title'] ?? 'FAQ') ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Right Accordion Area -->
    <div class="col-lg-8">
      <div class="cs-faq_content cs-radius_15" style="background:#0f1318;border:1px solid rgba(255,255,255,.08);padding:22px;">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
          <h2 class="cs-font_28 cs-white_color m-0"><?= ci_h($selected['title'] ?? 'FAQ') ?></h2>
          <span style="color:#a9b0b8;font-size:.95rem;">
            <?= count($selected['items'] ?? []) ?> question<?= (count($selected['items'] ?? []) === 1 ? '' : 's') ?>
          </span>
        </div>

        <?php if (!empty($selected['items'])): ?>
          <div class="cs-accordians cs-style1">
            <?php $i = 0; foreach (($selected['items'] ?? []) as $it): $i++; ?>
              <div class="cs-accordian cs-style1 <?= $i === 1 ? 'active' : '' ?>">
                <div class="cs-accordian_head">
                  <h3 class="cs-accordian_title cs-font_18 cs-white_color m-0"><?= ci_h($it['q'] ?? '') ?></h3>
                  <span class="cs-accordian_toggle cs-white_color"></span>
                </div>
                <div class="cs-accordian_body" style="<?= $i === 1 ? 'display:block;' : 'display:none;' ?>">
                  <p class="m-0" style="color:#a9b0b8;line-height:1.7;"><?= ci_h($it['a'] ?? '') ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <?php if (!empty($selected['note']) && is_array($selected['note'])): ?>
            <div class="cs-radius_15" style="background:#121821;border:1px solid rgba(255,255,255,.10);padding:18px;">
              <?php foreach ($selected['note'] as $p): ?>
                <p class="m-0 mb-2" style="color:#a9b0b8;line-height:1.7;"><?= ci_h($p) ?></p>
              <?php endforeach; ?>
              <a href="contacts.php" class="cs-text_btn mt-2" style="display:inline-flex;">
                <span>Contact us</span>
                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z" fill="currentColor"/>
                </svg>
              </a>
            </div>
          <?php else: ?>
            <p class="m-0" style="color:#a9b0b8;">No FAQs found for this category.</p>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<?php include 'includes/footer.php'; ?>
