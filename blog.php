<?php
$page_title       = "Blog | Caron Infotech";
$meta_description = "Insights on SaaS, web & mobile development, design and cloud from the Caron Infotech team.";
include 'includes/header.php';

function ci_load_blog_index($path = 'data/blogs/index.json') {
  if (!is_file($path)) return [];
  $json = file_get_contents($path);
  $list = json_decode($json, true);
  return is_array($list) ? $list : [];
}

$blogs = ci_load_blog_index();
?>

<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Blog</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Blog</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<div class="container">
  <?php if (empty($blogs)): ?>
    <p class="text-center">No posts yet. Please check back soon.</p>
  <?php else: ?>
    <div class="row gy-4">
      <?php foreach ($blogs as $post): ?>
        <div class="col-md-6 col-lg-4">
          <article class="cs-card h-100" style="background:#0f1318;border:1px solid rgba(255,255,255,.08);border-radius:18px;overflow:hidden">
            <a href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>" class="d-block">
              <div class="ratio ratio-16x9 cs-bg">
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" style="object-fit:cover;width:100%;height:100%">
              </div>
            </a>
            <div class="p-4">
              <div class="d-flex gap-2 mb-2 flex-wrap">
                <?php foreach (($post['tags'] ?? []) as $tag): ?>
                  <span class="badge" style="background:#121821;border:1px solid rgba(255,255,255,.08)"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
                <span class="text-muted ms-auto" style="font-size:.9rem"><?= date('M j, Y', strtotime($post['date'])) ?></span>
              </div>
              <h2 class="h5 mb-2">
                <a class="text-white" href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>">
                  <?= htmlspecialchars($post['title']) ?>
                </a>
              </h2>
              <p class="mb-3" style="color:#a9b0b8"><?= htmlspecialchars($post['excerpt']) ?></p>
              <a class="cs-text_btn" href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>">
                <span>Read more</span>
                <svg width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M25.5303 6.53033C25.8232 6.23744 25.8232 5.76256 25.5303 5.46967L20.7574 0.696699C20.4645 0.403806 19.9896 0.403806 19.6967 0.696699C19.4038 0.989593 19.4038 1.46447 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM0 6.75H25V5.25H0V6.75Z" fill="currentColor"/>
                </svg>
              </a>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>
<?php include 'includes/footer.php'; ?>
