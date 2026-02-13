<?php
$page_title       = "Blockchain Development Services | Caron Infotech";
$meta_description = "Caron Infotech provides secure blockchain development services including smart contracts, DApps, private blockchain, DeFi platforms, and enterprise blockchain solutions.";
$focus_keyword    = "Blockchain Development Company in Mohali";

include 'includes/header.php';
?>

<!-- Page Heading -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/services/blockchain/blockchain-hero.jpg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Blockchain Development</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="service.php">Services</a></li>
        <li class="breadcrumb-item active">Blockchain Development</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_120 cs-height_lg_70"></div>

<section>
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6">
        <div class="cs-section_heading cs-style1">
          <p class="cs-section_subtitle cs-primary_color text-uppercase">Decentralized Technology</p>
          <h2 class="cs-section_title cs-font_38">Secure, Transparent & Future-Ready Blockchain Solutions</h2>
        </div>

        <div class="cs-height_20"></div>

        <p style="color:#a9b0b8;">
          We build secure blockchain applications for startups and enterprises — including smart contracts,
          crypto wallets, DeFi platforms, NFT marketplaces, and private blockchain networks.
          Our focus is scalability, security, and performance.
        </p>

        <div class="cs-height_25"></div>

        <ul class="cs-list cs-style1" style="color:#a9b0b8;">
          <li>Smart Contract Development & Audits</li>
          <li>DeFi Platforms & Token Development</li>
          <li>Private & Consortium Blockchain</li>
          <li>Crypto Wallet & Exchange Development</li>
        </ul>

        <div class="cs-height_35"></div>

        <a href="contacts.php" class="cs-btn cs-style1">
          <span>Discuss Your Blockchain Project</span>
        </a>
      </div>

      <div class="col-lg-6">
        <div class="cs-radius_20 overflow-hidden" style="border:1px solid rgba(255,255,255,.08);background:#0f1318;">
          <div class="ratio ratio-4x3 cs-bg" data-src="assets/img/services/blockchain/blockchain-feature.jpg"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="cs-height_120"></div>

<!-- Services Grid -->
<section>
  <div class="container">
    <div class="cs-section_heading cs-style1 text-center">
      <p class="cs-section_subtitle cs-primary_color text-uppercase">Our Blockchain Services</p>
      <h2 class="cs-section_title cs-font_38">What We Build</h2>
    </div>

    <div class="cs-height_50"></div>

    <div class="row gy-4">
      <?php
      $services = [
        ["icon"=>"smart-contract.svg","title"=>"Smart Contracts","desc"=>"Secure smart contracts on Ethereum, BSC, Polygon and other networks."],
        ["icon"=>"defi.svg","title"=>"DeFi Platforms","desc"=>"Decentralized finance solutions with staking, yield farming & liquidity."],
        ["icon"=>"nft.svg","title"=>"NFT Marketplace","desc"=>"NFT minting, trading, and marketplace development."],
        ["icon"=>"wallet.svg","title"=>"Crypto Wallets","desc"=>"Multi-chain secure crypto wallet development."],
        ["icon"=>"exchange.svg","title"=>"Crypto Exchange","desc"=>"Centralized & decentralized exchange platforms."],
        ["icon"=>"private-chain.svg","title"=>"Private Blockchain","desc"=>"Enterprise-grade private & consortium blockchain networks."]
      ];

      foreach($services as $s):
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="cs-card cs-style3 h-100" style="background:#0f1318;border:1px solid rgba(255,255,255,.08);border-radius:18px;">
          <div class="p-4">
            <img src="assets/img/services/blockchain/icons/<?php echo $s['icon']; ?>" style="width:60px;height:60px;margin-bottom:15px;">
            <h3 class="cs-font_22 text-white mb-2"><?php echo $s['title']; ?></h3>
            <p style="color:#a9b0b8;"><?php echo $s['desc']; ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="cs-height_150"></div>

<?php include 'includes/footer.php'; ?>
