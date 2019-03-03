<?php
	$this->layout = "backend";
?>
<h1>Login</h1>
<?= $this->Form->create(); ?>
<?= $this->Form->Control('email') ?>
<?= $this->Form->Control('password') ?>
<?= $this->Form->Button('Login') ?>
<?= $this->Form->End ?>