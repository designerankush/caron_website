<?php
$slug = $_GET['slug'] ?? '';

function ci_load_post($slug) {
  $safe = preg_replace('~[^a-z0-9\-]~i', '', $slug);
  $path = "data/blogs/{$safe}.json";
  if (!is_file($path)) return null;
  $json = file_get_contents($path);
  $post = json_decode($json, true);
  return is_array($post) ? $post : null;
}

$post = $slug ? ci_load_post($slug) : null;

/* ===============================
   NOT FOUND HANDLING
================================ */
if (!$post) {
  include 'includes/header.php'; ?>
  <div class="container py-5 text-center">
    <h1 class="cs-page_title">Post not found</h1>
    <p class="mt-3">
      <a class="cs-text_btn" href="blog.php"><span>← Back to blog</span></a>
    </p>
  </div>
  <?php include 'includes/footer.php'; exit;
}

/* ===============================
   SEO META (Dynamic)
================================ */
$page_title       = trim($post['meta_title'] ?? $post['title']);
$meta_description = trim($post['meta_desc'] ?? '');
$canonical_url    = "https://www.caroninfotech.com/blog-detail.php?slug=" . urlencode($slug);

include 'includes/header.php';
?>

<!-- ===============================
     PAGE HEADER
================================ -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">
        <?= htmlspecialchars($post['title']) ?>
      </h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
        <li class="breadcrumb-item active">
          <?= htmlspecialchars($post['title']) ?>
        </li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_100 cs-height_lg_60"></div>

<!-- ===============================
     ARTICLE
================================ -->
<article class="container" itemscope itemtype="https://schema.org/Article">
  <meta itemprop="headline" content="<?= htmlspecialchars($post['title']) ?>">
  <meta itemprop="datePublished" content="<?= date('c', strtotime($post['date'])) ?>">
  <meta itemprop="dateModified" content="<?= date('c', strtotime($post['date'])) ?>">
  <meta itemprop="author" content="Caron Infotech">

  <div class="row justify-content-center">
    <div class="col-lg-10">

      <?php if (!empty($post['image'])): ?>
        <div class="ratio ratio-16x9 mb-4">
          <img
            src="<?= htmlspecialchars($post['image']) ?>"
            alt="<?= htmlspecialchars($post['title']) ?>"
            itemprop="image"
            style="object-fit:cover;width:100%;height:100%">
        </div>
      <?php endif; ?>

      <!-- TAGS + DATE -->
      <div class="d-flex gap-2 mb-3 flex-wrap align-items-center">
        <?php foreach (($post['tags'] ?? []) as $tag): ?>
          <span class="badge" style="background:#121821;border:1px solid rgba(255,255,255,.08)">
            <?= htmlspecialchars(trim($tag)) ?>
          </span>
        <?php endforeach; ?>

        <?php if (!empty($post['date'])): ?>
          <time class="text-muted ms-auto" datetime="<?= date('Y-m-d', strtotime($post['date'])) ?>">
            <?= date('M j, Y', strtotime($post['date'])) ?>
          </time>
        <?php endif; ?>
      </div>

      <!-- CONTENT -->
      <div class="cs-typo blog-content" itemprop="articleBody">
        <?= $post['content_html'] ?? '' ?>
      </div>

      <!-- BACK -->
      <div class="mt-5">
        <a href="blog.php" class="cs-text_btn">
          <span>← Back to all blogs</span>
        </a>
      </div>

    </div>
  </div>
</article>

<div class="cs-height_150 cs-height_lg_80"></div>

<!-- ===============================
     JSON-LD SCHEMA
================================ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?= htmlspecialchars($post['title'], ENT_QUOTES) ?>",
  "description": "<?= htmlspecialchars($meta_description, ENT_QUOTES) ?>",
  "image": "<?= htmlspecialchars($post['image'] ?? '', ENT_QUOTES) ?>",
  "datePublished": "<?= date('c', strtotime($post['date'])) ?>",
  "author": {
    "@type": "Organization",
    "name": "Caron Infotech"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Caron Infotech",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.caroninfotech.com/assets/img/logo.svg"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?= $canonical_url ?>"
  }
}
</script>

<?php include 'includes/footer.php'; ?>
