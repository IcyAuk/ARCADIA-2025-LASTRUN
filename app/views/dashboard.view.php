<?php 
use App\Model\Session;

$session = new Session();
$is_logged_in = $session->is_logged_in();

$this->view('header.admin'); ?>

<div class="container">
    <h1>Welcome to the Dashboard</h1>
</div>

<?php $this->view('footer.admin'); ?>