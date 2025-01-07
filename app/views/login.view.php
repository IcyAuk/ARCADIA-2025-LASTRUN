<?php $this->view('header'); ?>

<h1>Login View</h1>
<p>Zoo website</p>

<form method="post">
    <label for="email">email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Submit</button>
</form>

<?php $this->view('footer'); ?>