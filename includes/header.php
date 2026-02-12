<?php

// 1) Load central meta map
$__metaMap = [];
$__metaFile = __DIR__ . '/page-meta.php';
if (is_file($__metaFile)) {
  $__metaMap = include $__metaFile;
}

// 2) Detect current page (index.php, about.php, etc.)
$__currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');

// 3) Pick meta from config unless page already set $page_title / $meta_description
$__defaultTitle = 'Caron Infotech';
$__defaultDesc  = 'Caron Infotech - Web, Mobile, AI & Software Development.';

$__pageMeta = $__metaMap[$__currentPage] ?? [];
$page_title = isset($page_title) && trim($page_title) !== ''
  ? $page_title
  : ($__pageMeta['title'] ?? $__defaultTitle);

$meta_description = isset($meta_description) && trim($meta_description) !== ''
  ? $meta_description
  : ($__pageMeta['desc'] ?? $__defaultDesc);

// 4) Current URL (for canonical + OG)
$__scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$__host   = $_SERVER['HTTP_HOST'] ?? 'caroninfotech.com';
$__uri    = $_SERVER['REQUEST_URI'] ?? '/';
$__url    = $__scheme . '://' . $__host . $__uri;

// Optional: choose OG image (keep your existing default)
$og_image = $og_image ?? 'https://www.caroninfotech.com/assets/img/about/social-card.jpg';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WSNPM2W8');</script>
  <!-- End Google Tag Manager -->

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($__url) ?>">
  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>" />
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>" />
  <meta property="og:url" content="<?= htmlspecialchars($__url) ?>" />
  <meta property="og:type" content="website" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>" />
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_description) ?>" />
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>" />
  <meta name="google-site-verification" content="mn9z9TPLdLqsHMZ9ANr8a0ojFrRwowSrbfRXWpsknzk" />
  <meta name="google-site-verification" content="wpxXoEbbbYhzQDjIvsVkPPHvNpENpiPZ4hwP_afUVCQ" />


  <!-- Favicon Icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#1a2333">
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSNPM2W8"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="cs-preloader cs-center">
    <div class="cs-preloader_in"></div>
  </div>

  <?php include 'includes/nav.php'; ?>

  <div class="cs-side_header">
    <button class="cs-close"></button>
    <div class="cs-side_header_overlay"></div>
    <div class="cs-side_header_in">
      <div class="cs-side_header_shape"></div>
      <a class="cs-site_branding" href="index.php">
        <img src="assets/img/logo.svg" alt="Caron Info">
      </a>
      <div class="cs-side_header_box">
        <h2 class="cs-side_header_heading">Let’s brainstorm the next big thing together!!</h2>
      </div>
      <div class="cs-side_header_box">
        <h3 class="cs-side_header_title cs-primary_color">Contact Us</h3>
        <ul class="cs-contact_info cs-style1 cs-mp0">
          <li>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17 12.5C15.75 12.5 14.55 12.3 13.43 11.93C13.08 11.82 12.69 11.9 12.41 12.17L10.21 14.37C7.38 12.93 5.06 10.62 3.62 7.79L5.82 5.58C6.1 5.31 6.18 4.92 6.07 4.57C5.7 3.45 5.5 2.25 5.5 1C5.5 0.45 5.05 0 4.5 0H1C0.45 0 0 0.45 0 1C0 10.39 7.61 18 17 18C17.55 18 18 17.55 18 17V13.5C18 12.95 17.55 12.5 17 12.5ZM9 0V10L12 7H18V0H9Z"
                fill="#05abc3" />
            </svg>
            <span>+919872612298 </span>
          </li>
          <li>
            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M20 6.98V16C20 17.1 19.1 18 18 18H2C0.9 18 0 17.1 0 16V4C0 2.9 0.9 2 2 2H12.1C12.04 2.32 12 2.66 12 3C12 4.48 12.65 5.79 13.67 6.71L10 9L2 4V6L10 11L15.3 7.68C15.84 7.88 16.4 8 17 8C18.13 8 19.16 7.61 20 6.98ZM14 3C14 4.66 15.34 6 17 6C18.66 6 20 4.66 20 3C20 1.34 18.66 0 17 0C15.34 0 14 1.34 14 3Z"
                fill="#05abc3" />
            </svg>
            <a href="mailto:manish@caroninfotech.com">manish@caroninfotech.com</a>
          </li>
          <li>
            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z"
                fill="#05abc3" />
            </svg>
            <span>#538, 5th floor, Jubilee Walk, Sector 70, <br /> SAS Nagar, Punjab, India,</span>
          </li>
        </ul>
      </div>

      <div class="cs-side_header_box">
        <div class="cs-social_btns cs-style1">
          <a href="https://www.linkedin.com/company/102006810/" target="_blank" class="cs-center">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4.04799 13.7497H1.45647V5.4043H4.04799V13.7497ZM2.75084 4.2659C1.92215 4.2659 1.25 3.57952 1.25 2.75084C1.25 2.35279 1.40812 1.97105 1.68958 1.68958C1.97105 1.40812 2.35279 1.25 2.75084 1.25C3.14888 1.25 3.53063 1.40812 3.81209 1.68958C4.09355 1.97105 4.25167 2.35279 4.25167 2.75084C4.25167 3.57952 3.57924 4.2659 2.75084 4.2659ZM13.7472 13.7497H11.1613V9.68722C11.1613 8.71903 11.1417 7.4774 9.81389 7.4774C8.46652 7.4774 8.26004 8.5293 8.26004 9.61747V13.7497H5.67132V5.4043H8.15681V6.54269H8.19308C8.53906 5.887 9.38421 5.19503 10.6451 5.19503C13.2679 5.19503 13.75 6.92215 13.75 9.16546V13.7497H13.7472Z"
                fill="white"></path>
            </svg>
          </a>
          <a href="https://www.facebook.com/people/Caron-Infotech/61558457265535/" target="_blank" class="cs-center">
            <svg fill="#fff" width="15" height="15" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M21.95 5.005l-3.306-.004c-3.206 0-5.277 2.124-5.277 5.415v2.495H10.05v4.515h3.317l-.004 9.575h4.641l.004-9.575h3.806l-.003-4.514h-3.803v-2.117c0-1.018.241-1.533 1.566-1.533l2.366-.001.01-4.256z"/></svg>
          </a>
          <a href="https://www.youtube.com/@CaronInfotech" target="_blank" class="cs-center">
            <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M12.4888 1.48066C12.345 0.939353 11.9215 0.513038 11.3837 0.368362C10.4089 0.105469 6.5 0.105469 6.5 0.105469C6.5 0.105469 2.59116 0.105469 1.61633 0.368362C1.07853 0.513061 0.65496 0.939353 0.5112 1.48066C0.25 2.4618 0.25 4.50887 0.25 4.50887C0.25 4.50887 0.25 6.55595 0.5112 7.53709C0.65496 8.0784 1.07853 8.48695 1.61633 8.63163C2.59116 8.89452 6.5 8.89452 6.5 8.89452C6.5 8.89452 10.4088 8.89452 11.3837 8.63163C11.9215 8.48695 12.345 8.0784 12.4888 7.53709C12.75 6.55595 12.75 4.50887 12.75 4.50887C12.75 4.50887 12.75 2.4618 12.4888 1.48066V1.48066ZM5.22158 6.36746V2.65029L8.48861 4.50892L5.22158 6.36746V6.36746Z"
                fill="white"></path>
            </svg>
          </a>
          <!-- <a href="#" class="cs-center">
            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M2.87612 8.149C2.87612 8.87165 2.28571 9.46205 1.56306 9.46205C0.840402 9.46205 0.25 8.87165 0.25 8.149C0.25 7.42634 0.840402 6.83594 1.56306 6.83594H2.87612V8.149ZM3.53795 8.149C3.53795 7.42634 4.12835 6.83594 4.851 6.83594C5.57366 6.83594 6.16406 7.42634 6.16406 8.149V11.4369C6.16406 12.1596 5.57366 12.75 4.851 12.75C4.12835 12.75 3.53795 12.1596 3.53795 11.4369V8.149ZM4.851 2.87612C4.12835 2.87612 3.53795 2.28571 3.53795 1.56306C3.53795 0.840402 4.12835 0.25 4.851 0.25C5.57366 0.25 6.16406 0.840402 6.16406 1.56306V2.87612H4.851V2.87612ZM4.851 3.53795C5.57366 3.53795 6.16406 4.12835 6.16406 4.851C6.16406 5.57366 5.57366 6.16406 4.851 6.16406H1.56306C0.840402 6.16406 0.25 5.57366 0.25 4.851C0.25 4.12835 0.840402 3.53795 1.56306 3.53795H4.851V3.53795ZM10.1239 4.851C10.1239 4.12835 10.7143 3.53795 11.4369 3.53795C12.1596 3.53795 12.75 4.12835 12.75 4.851C12.75 5.57366 12.1596 6.16406 11.4369 6.16406H10.1239V4.851V4.851ZM9.46205 4.851C9.46205 5.57366 8.87165 6.16406 8.149 6.16406C7.42634 6.16406 6.83594 5.57366 6.83594 4.851V1.56306C6.83594 0.840402 7.42634 0.25 8.149 0.25C8.87165 0.25 9.46205 0.840402 9.46205 1.56306V4.851V4.851ZM8.149 10.1239C8.87165 10.1239 9.46205 10.7143 9.46205 11.4369C9.46205 12.1596 8.87165 12.75 8.149 12.75C7.42634 12.75 6.83594 12.1596 6.83594 11.4369V10.1239H8.149ZM8.149 9.46205C7.42634 9.46205 6.83594 8.87165 6.83594 8.149C6.83594 7.42634 7.42634 6.83594 8.149 6.83594H11.4369C12.1596 6.83594 12.75 7.42634 12.75 8.149C12.75 8.87165 12.1596 9.46205 11.4369 9.46205H8.149Z"
                fill="white"></path>
            </svg>
          </a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Header Section -->