<?php $this->view('header');?>

<h1>Create Account</h1>

<form method="post">

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br>


    <label for="email">email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">password</label>
    <input type="password" name="password" id="password" required>

    <label for="level">Level:</label>
    <select id="level" name="level" required>
        <option value="Vet">Vet</option>
        <option value="Mod">Mod</option>
        <option value="Admin">Admin</option>
    </select>

    <input type="submit" value="add staff member">
</form>

<?php $this->view('footer');?>