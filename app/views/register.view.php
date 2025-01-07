<?php $this->view('header');?>

<h1>Create Account</h1>

<form method="post">
    <label for="name">name</label>
    <input type="text" name="name" id="names" required>

    <label for="email">email</label>
    <input type="email" name="email" id="emails" required>

    <label for="password">password</label>
    <input type="password"  name="password" id="passwords" required>

    <input type="submit">
</form>

<?php $this->view('footer');?>