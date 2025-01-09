<?php $this->view('header');?>

<h1 class="text-center">Create Account</h1>

<form method="post" class="container mt-5">

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required>
    </div>

    <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="form-group">
        <label for="level">Level:</label>
        <select id="level" name="level" class="form-control" required>
            <option value="Vet">Vet</option>
            <option value="Mod">Mod</option>
            <option value="Admin">Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

<?php $this->view('footer');?>