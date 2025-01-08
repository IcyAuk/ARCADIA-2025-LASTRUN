<?php $this->view('header'); ?>

<h1>Se connecter</h1>

<form method="post" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <div class="invalid-feedback">
            Please enter a valid email address.
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <div class="invalid-feedback">
            Please enter your password.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $this->view('footer'); ?>