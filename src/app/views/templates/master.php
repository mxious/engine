<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title; ?></title>

<?php $this->load->view('header'); ?>

<?= $extra_stylesheets; ?>

<!-- Footer hack -->
<style>

body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}
.container {
  flex: 1;
}
</style>
</head>
<body>
<?php $this->load->view('navbar'); echo "\n"; ?>
<?php 
	// if ($this->php_session->get('loggedin')): 
		$this->load->view('templates/hero'); echo "\n"; 
	// endif;
?>
<?php $this->load->view('templates/no_script'); echo "\n"; ?>

<?php if($container): ?>
<div class="container">
<?php endif;?>

<?php show_flash_msg(); ?>

<?php echo $contents; ?>

<?php if($container): ?>
</div>
<?php endif;?>

<?php $this->load->view('footer'); echo "\n"; ?>

</body>
</html>