<?php
include 'includes/header.php';
$jobs = include __DIR__ . '/data/jobs.php';

// read filters
$q    = isset($_GET['q']) ? trim($_GET['q']) : '';
$dept = $_GET['dept'] ?? '';
$loc  = $_GET['loc']  ?? '';
$type = $_GET['type'] ?? '';
$exp  = $_GET['exp']  ?? '';

// option sets
$depts = ['' => 'All Departments', 'eng' => 'Engineering', 'design' => 'Design'];
$locs  = ['' => 'All Locations', 'mohali' => 'Mohali', 'remote' => 'Remote'];
$types = ['' => 'All Types', 'fulltime' => 'Full-time', 'contract' => 'Contract'];
$exps  = ['' => 'All Experience', '0-1'=>'0–1 yrs','1-3'=>'1–3 yrs','2-4'=>'2–4 yrs','2-5'=>'2–5 yrs','3-6'=>'3–6 yrs','5-8'=>'5–8 yrs'];

// filter (PHP 7 safe)
$filtered = array_values(array_filter($jobs, function($j) use ($q,$dept,$loc,$type,$exp) {
  $ok = true;
  if ($q !== '') {
    $hay = strtolower($j['title'].' '.$j['intro'].' '.implode(' ',$j['tags']).' '.$j['about_role']);
    $ok = $ok && (strpos($hay, strtolower($q)) !== false);
  }
  if ($dept !== '') $ok = $ok && ($j['department_code'] ?? '') === $dept;
  if ($loc  !== '') $ok = $ok && ($j['location_code']   ?? '') === $loc;
  if ($type !== '') $ok = $ok && ($j['type_code']       ?? '') === $type;
  if ($exp  !== '') $ok = $ok && ($j['exp_code']        ?? '') === $exp;
  return $ok;
}));
?>

<!-- Hero -->
<div class="cs-page_heading cs-style1 cs-center text-center cs-bg" data-src="assets/img/contact_hero_bg.jpeg">
  <div class="container">
    <div class="cs-page_heading_in">
      <h1 class="cs-page_title cs-font_50 cs-white_color">Careers</h1>
      <ol class="breadcrumb text-uppercase">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Jobs</li>
      </ol>
    </div>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<div class="container">
  <!-- Filters -->
  <form class="row g-3 mb-4" method="get" action="careers.php" id="job-filter-form" novalidate>
    <div class="col-lg-4">
      <input type="search" name="q" value="<?=htmlspecialchars($q)?>" class="cs-form_field form-control" placeholder="Search jobs, skills…">
    </div>
    <div class="col-sm-6 col-lg-2">
      <select name="dept" class="cs-form_field form-control">
        <?php foreach($depts as $k=>$v): ?><option value="<?=$k?>" <?=$dept===$k?'selected':''?>><?=$v?></option><?php endforeach; ?>
      </select>
    </div>
    <div class="col-sm-6 col-lg-2">
      <select name="loc" class="cs-form_field form-control">
        <?php foreach($locs as $k=>$v): ?><option value="<?=$k?>" <?=$loc===$k?'selected':''?>><?=$v?></option><?php endforeach; ?>
      </select>
    </div>
    <div class="col-sm-6 col-lg-2">
      <select name="type" class="cs-form_field form-control">
        <?php foreach($types as $k=>$v): ?><option value="<?=$k?>" <?=$type===$k?'selected':''?>><?=$v?></option><?php endforeach; ?>
      </select>
    </div>
    <div class="col-sm-6 col-lg-2">
      <select name="exp" class="cs-form_field form-control">
        <?php foreach($exps as $k=>$v): ?><option value="<?=$k?>" <?=$exp===$k?'selected':''?>><?=$v?></option><?php endforeach; ?>
      </select>
    </div>
  </form>

  <!-- Job cards -->
  <div class="row g-4">
    <?php if(!$filtered): ?>
      <div class="col-12"><div class="alert alert-secondary mb-0">No jobs match your filters. Try clearing some filters.</div></div>
    <?php endif; ?>

    <?php foreach($filtered as $j): ?>
      <div class="col-12">
        <div class="card bg-transparent text-white border rounded-4 p-3 d-flex flex-lg-row align-items-lg-center">
          <div class="flex-grow-1 pe-lg-3">
            <h4 class="mb-1"><?=$j['title']?></h4>
            <div class="small text-muted mb-2"><?=$j['department']?> • <?=$j['location']?> • <?=$j['type']?> • <?=$j['experience']?></div>
            <p class="mb-2"><?=$j['intro']?></p>
            <div class="d-flex flex-wrap gap-2">
              <?php foreach($j['tags'] as $t): ?><span class="badge bg-secondary"><?=$t?></span><?php endforeach; ?>
            </div>
          </div>
          <div class="text-lg-end mt-3 mt-lg-0">
            <a href="career.php?slug=<?=urlencode($j['slug'])?>" class="btn btn-outline-light me-2">View details</a>
            <a href="career.php?slug=<?=urlencode($j['slug'])?>#apply" class="btn btn-primary">Apply</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="cs-height_150 cs-height_lg_80"></div>

<script>
// auto-submit filters on change
document.getElementById('job-filter-form').querySelectorAll('select').forEach(el=>{
  el.addEventListener('change', ()=>document.getElementById('job-filter-form').submit());
});
</script>

<?php include 'includes/footer.php'; ?>
