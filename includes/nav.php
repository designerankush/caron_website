<?php
// Detect current page
$currentPage = basename($_SERVER['PHP_SELF']);

// All service-related pages
$servicePages = [
  'service.php',
  'saas-development.php',
  'web-development.php',
  'mobile-development.php',
  'ui-ux-design.php',
  'game-development.php',
  'automation-integrations.php'
];
?>

<!-- Start Header Section -->
<header class="cs-site_header cs-style1 text-uppercase cs-sticky_header">
  <div class="cs-main_header">
    <div class="container">
      <div class="cs-main_header_in">

        <!-- Logo -->
        <div class="cs-main_header_left">
          <a class="cs-site_branding" href="index.php">
            <img src="assets/img/logo.svg" alt="Caron Infotech">
          </a>
        </div>

        <!-- Navigation -->
        <div class="cs-main_header_center">
          <div class="cs-nav cs-primary_font cs-medium">
            <ul class="cs-nav_list">

              <!-- Home -->
              <li class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">
                <a href="index.php">Home</a>
              </li>

              <!-- About -->
              <li class="<?= $currentPage === 'about.php' ? 'active' : '' ?>">
                <a href="about.php">About</a>
              </li>

              <!-- Services Dropdown -->
              <li class="cs-has_dropdown <?= in_array($currentPage, $servicePages) ? 'active' : '' ?>">
                <a href="service.php">Services</a>
                <ul class="cs-dropdown">

                  <li class="<?= $currentPage === 'saas-development.php' ? 'active' : '' ?>">
                    <a href="saas-development.php">SaaS Development</a>
                  </li>

                  <li class="<?= $currentPage === 'web-development.php' ? 'active' : '' ?>">
                    <a href="web-development.php">Web Development</a>
                  </li>

                  <li class="<?= $currentPage === 'mobile-development.php' ? 'active' : '' ?>">
                    <a href="mobile-development.php">Mobile App Development</a>
                  </li>

                  <li class="<?= $currentPage === 'ui-ux-design.php' ? 'active' : '' ?>">
                    <a href="ui-ux-design.php">UI / UX Design</a>
                  </li>

                  <li class="<?= $currentPage === 'game-development.php' ? 'active' : '' ?>">
                    <a href="game-development.php">Game Development</a>
                  </li>

                  <li class="<?= $currentPage === 'automation-integrations.php' ? 'active' : '' ?>">
                    <a href="automation-integrations.php">Automation & Integrations</a>
                  </li>

                </ul>
              </li>

              <!-- Portfolio -->
              <li class="<?= $currentPage === 'portfolio.php' ? 'active' : '' ?>">
                <a href="portfolio.php">Portfolio</a>
              </li>

              <!-- Blog -->
              <li class="<?= $currentPage === 'blog.php' ? 'active' : '' ?>">
                <a href="blog.php">Blog</a>
              </li>

              <!-- Careers -->
              <li class="<?= $currentPage === 'careers.php' ? 'active' : '' ?>">
                <a href="careers.php">Careers</a>
              </li>

              <!-- FAQ -->
              <li class="<?= $currentPage === 'faq.php' ? 'active' : '' ?>">
                <a href="faq.php">FAQ</a>
              </li>

              <!-- Contact -->
              <li class="<?= $currentPage === 'contacts.php' ? 'active' : '' ?>">
                <a href="contacts.php">Contact</a>
              </li>

            </ul>
          </div>
        </div>

        <!-- Mobile Toggle -->
        <div class="cs-main_header_right">
          <div class="cs-toolbox">
            <span class="cs-icon_btn">
              <span class="cs-icon_btn_in">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </span>
            </span>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>
<!-- End Header Section -->
