<h2>Staff Members</h2>

<!-- STAFF CREATE MODAL -->
<form id="createModal" action="/register/createStaffMember" method="post" style="display:none;">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">

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
        <?php foreach ($level as $lvl): ?>
        <option value="<?php echo htmlspecialchars($lvl); ?>"><?php echo htmlspecialchars($lvl); ?></option>
        <?php endforeach; ?>
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

<!--CREATE STAFF BUTTON-->
<button id="create-button" type="button">Ajouter Staff</button>

<!-- ANIMAL LIST -->
<?php if (!empty($staff)): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($staff as $member): ?>
        <tr>
            <td><?php echo $member->id; ?></td>
            <td><?php echo $member->level; ?></td>
            <td><?php echo $member->firstName; ?></td>
            <td><?php echo $member->lastName; ?></td>
            <td><?php echo $member->email; ?></td>
            <td>
                <?php if ($member->level !== 'Admin'): ?>
                <button type="button" class="delete-button" data-id="<?=$member->id?>">Supprimer</button>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No animals found.</p>
<?php endif; ?>