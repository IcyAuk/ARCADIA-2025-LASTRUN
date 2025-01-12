<?php $this->view('header');?>
<h1>Login</h1>
<form action="" method="post">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
<?php $this->view('footer');?>