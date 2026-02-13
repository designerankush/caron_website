<?php
include 'includes/header.php';

/**
 * Load blog index JSON
 */
function ci_load_blog_index($path = 'data/blogs/index.json') {
  if (!is_file($path)) return [];
  $json = file_get_contents($path);
  $list = json_decode($json, true);
  return is_array($list) ? $list : [];
}

$blogs = ci_load_blog_index();

/**
 * Sort by date DESC (latest first)
 */
usort($blogs, function ($a, $b) {
  $dateA = strtotime($a['date'] ?? '1970-01-01');
  $dateB = strtotime($b['date'] ?? '1970-01-01');
  return $dateB <=> $dateA;
});

/**
 * Pagination setup
 */
$perPage     = 9; // posts per page
$totalPosts = count($blogs);
$totalPages = (int) ceil($totalPosts / $perPage);

$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0
  ? (int) $_GET['page']
  : 1;

$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

$pagedBlogs = array_slice($blogs, $offset, $perPage);
?>

<!-- Hero -->
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

<div class="cs-height_120 cs-height_lg_80"></div>

<div class="container">

  <?php if (empty($blogs)): ?>
    <p class="text-center">No posts yet. Please check back soon.</p>

  <?php else: ?>
    <div class="row gy-4">

      <?php foreach ($pagedBlogs as $post): ?>
        <div class="col-md-6 col-lg-4">
          <article class="cs-card h-100"
            style="background:#0f1318;border:1px solid rgba(255,255,255,.08);border-radius:18px;overflow:hidden">

            <a href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>" class="d-block">
              <div class="ratio ratio-16x9">
                <img
                  src="<?= htmlspecialchars($post['image']) ?>"
                  alt="<?= htmlspecialchars($post['title']) ?>"
                  loading="lazy"
                  style="object-fit:cover;width:100%;height:100%">
              </div>
            </a>

            <div class="p-4">
              <div class="d-flex gap-2 mb-2 flex-wrap align-items-center">
                <?php foreach (($post['tags'] ?? []) as $tag): ?>
                  <span class="badge"
                    style="background:#121821;border:1px solid rgba(255,255,255,.08)">
                    <?= htmlspecialchars(trim($tag)) ?>
                  </span>
                <?php endforeach; ?>

                <?php if (!empty($post['date'])): ?>
                  <span class="text-muted ms-auto" style="font-size:.9rem">
                    <?= date('M j, Y', strtotime($post['date'])) ?>
                  </span>
                <?php endif; ?>
              </div>

              <h2 class="h5 mb-2">
                <a class="text-white" href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>">
                  <?= htmlspecialchars($post['title']) ?>
                </a>
              </h2>

              <?php if (!empty($post['excerpt'])): ?>
                <p class="mb-3" style="color:#a9b0b8">
                  <?= htmlspecialchars($post['excerpt']) ?>
                </p>
              <?php endif; ?>

              <a class="cs-text_btn" href="blog-detail.php?slug=<?= urlencode($post['slug']) ?>">
                <span>Read more</span>
                <svg width="26" height="12" viewBox="0 0 26 12" fill="none">
                  <path
                    d="M25.53 6.53a.75.75 0 000-1.06L20.76.7a.75.75 0 00-1.06 1.06L23.94 6l-4.24 4.24a.75.75 0 001.06 1.06l4.77-4.77zM0 6.75h25v-1.5H0v1.5z"
                    fill="currentColor" />
                </svg>
              </a>
            </div>
          </article>
        </div>
      <?php endforeach; ?>

    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
      <div class="cs-height_80"></div>

      <nav class="ci-pagination-wrap" aria-label="Blog pagination">
        <ul class="ci-pagination">

          <!-- Prev -->
          <li class="ci-page-item <?= $page <= 1 ? 'disabled' : '' ?>">
            <a class="ci-page-link"
              href="<?= $page > 1 ? 'blog.php?page=' . ($page - 1) : '#' ?>"
              aria-label="Previous page">
              ‹
            </a>
          </li>

          <!-- Page numbers -->
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="ci-page-item <?= $i === $page ? 'active' : '' ?>">
              <a class="ci-page-link" href="blog.php?page=<?= $i ?>">
                <?= $i ?>
              </a>
            </li>
          <?php endfor; ?>

          <!-- Next -->
          <li class="ci-page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
            <a class="ci-page-link"
              href="<?= $page < $totalPages ? 'blog.php?page=' . ($page + 1) : '#' ?>"
              aria-label="Next page">
              ›
            </a>
          </li>

        </ul>
      </nav>
    <?php endif; ?>

  <?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>
