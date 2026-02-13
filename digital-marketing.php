<?php
    include 'includes/header.php';
?>

<!-- Page Heading -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Digital Marketing</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="service.php">Services</a></li>
        <li class="breadcrumb-item active">Digital Marketing</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_120 cs-height_lg_70"></div>

<!-- Intro Section -->
<section>
  <div class="container">
    <div class="row align-items-center gy-5">

      <div class="col-lg-6">
        <div class="cs-section_heading cs-style1">
          <p class="cs-section_subtitle cs-primary_color text-uppercase">Grow Your Brand</p>
          <h2 class="cs-section_title cs-font_38">
            Results-driven digital marketing strategies
          </h2>
        </div>

        <div class="cs-height_20"></div>

        <p style="color:#a9b0b8;">
          We help businesses increase visibility, generate leads, and scale revenue through
          SEO, paid advertising, social media marketing, and data analytics.
          Every strategy is tailored for measurable growth.
        </p>

        <div class="cs-height_30"></div>

        <ul class="cs-list cs-style1" style="color:#a9b0b8;">
          <li>Search Engine Optimization (SEO)</li>
          <li>Paid Advertising (Google & Social)</li>
          <li>Content & Social Media Marketing</li>
          <li>Conversion & Performance Optimization</li>
        </ul>

        <div class="cs-height_35"></div>

        <a href="contacts.php" class="cs-btn cs-style1">
          <span>Start Growing Today</span>
        </a>
      </div>

      <div class="col-lg-6">
        <div class="cs-radius_20 overflow-hidden"
             style="border:1px solid rgba(255,255,255,.08);background:#0f1318;">
          <div class="ratio ratio-16x9 cs-bg"
               data-src="assets/img/services/digital-marketing/images/digital-marketing-hero.jpg">
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="cs-height_120 cs-height_lg_70"></div>

<!-- Services Grid -->
<section>
  <div class="container">
    <div class="cs-section_heading cs-style1 text-center">
      <p class="cs-section_subtitle cs-primary_color text-uppercase">Our Expertise</p>
      <h2 class="cs-section_title cs-font_38">Digital Marketing Services</h2>
    </div>

    <div class="cs-height_50"></div>

    <div class="row gy-4">

      <?php
      $services = [
        ["seo.svg", "SEO Optimization", "Improve rankings and drive organic traffic with proven SEO strategies."],
        ["social-media.svg", "Social Media Marketing", "Build brand engagement and grow audience across platforms."],
        ["ppc.svg", "PPC Advertising", "Maximize ROI with performance-focused paid campaigns."],
        ["analytics.svg", "Analytics & Reporting", "Track KPIs and optimize marketing performance with data insights."],
        ["content.svg", "Content Marketing", "High-quality content that converts visitors into customers."],
        ["email-marketing.svg", "Email Campaigns", "Automated email funnels to nurture leads and boost retention."]
      ];

      foreach ($services as $service):
      ?>

      <div class="col-lg-4 col-md-6">
        <div class="services_block h-100">
          <div class="services_block--icon">
            <img src="assets/img/services/digital-marketing/icons/<?= $service[0]; ?>" alt="<?= $service[1]; ?>">
          </div>
          <h4><?= $service[1]; ?></h4>
          <p><?= $service[2]; ?></p>
        </div>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<div class="cs-height_150 cs-height_lg_80"></div>

<?php include 'includes/footer.php'; ?>
