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

if (!$post) {
  $page_title = "Blog | Caron Infotech";
  $meta_description = "Insights from Caron Infotech on SaaS, web & mobile development.";
  include 'includes/header.php'; ?>
  <div class="container py-5">
    <h1 class="cs-page_title">Post not found</h1>
    <p class="mt-3"><a class="cs-text_btn" href="blog.php"><span>Back to blog</span></a></p>
  </div>
  <?php include 'includes/footer.php'; exit;
}

$page_title       = $post['meta_title'] ?? $post['title'];
$meta_description = $post['meta_desc']  ?? '';
include 'includes/header.php';
?>

<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color"><?= htmlspecialchars($post['title']) ?></h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
        <li class="breadcrumb-item active">Post</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_100 cs-height_lg_60"></div>

<article class="container" itemscope itemtype="https://schema.org/Article">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <?php if (!empty($post['image'])): ?>
        <div class="ratio ratio-16x9 mb-4">
          <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" style="object-fit:cover;width:100%;height:100%">
        </div>
      <?php endif; ?>

      <div class="d-flex gap-2 mb-3 flex-wrap">
        <?php foreach (($post['tags'] ?? []) as $tag): ?>
          <span class="badge" style="background:#121821;border:1px solid rgba(255,255,255,.08)"><?= htmlspecialchars($tag) ?></span>
        <?php endforeach; ?>
        <?php if (!empty($post['date'])): ?>
          <span class="text-muted ms-auto"><?= date('M j, Y', strtotime($post['date'])) ?></span>
        <?php endif; ?>
      </div>

      <div class="cs-typo blog-content">
        <?= $post['content_html'] ?? '' ?>
      </div>

      <div class="mt-5">
        <a href="blog.php" class="cs-text_btn"><span>← Back to all blogs</span></a>
      </div>
    </div>
  </div>
</article>

<div class="cs-height_150 cs-height_lg_80"></div>
<?php include 'includes/footer.php'; ?>
