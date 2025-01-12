<?php $this->view('header');?>
<h1>Register Staff</h1>
<form action="" method="post">
    
    <label for="firstName">firstName:</label>
    <input type="text" id="firstName" name="firstName" required>

    <label for="lastName">lastName:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="level">Level:</label>
    <select id="level" name="level" required>
        <option value="">Select Level</option>
        <option value="Vet">Vet</option>
        <option value="Mod">Mod</option>
        <option value="Admin">Admin</option>
    </select>
    
    <button type="submit">Register</button>
</form>

<?php if (!empty($errors)): ?>
    <div class="errors">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php $this->view('footer');?>