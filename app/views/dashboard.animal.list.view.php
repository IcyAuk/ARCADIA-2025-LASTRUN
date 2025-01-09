<?php $this->view('header.admin'); ?>

<h1 class="text-center">Create Animal</h1>

<div class="container mt-5">
    <form method="post">

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="race">Race:</label>
            <input type="text" class="form-control" id="race" name="race" required>
        </div>

        <div class="form-group">
            <label for="habitat_id">Habitat:</label>
            <select id="habitat_id" name="habitat_id" class="form-control" required>
                <?php foreach ($habitats as $habitat): ?>
                    <option value="<?php echo $habitat['id']; ?>"><?php echo $habitat['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="image_id">Image:</label>
            <select id="image_id" name="image_id" class="form-control" required>
                <?php foreach ($images as $image): ?>
                    <option value="<?php echo $image['id']; ?>"><?php echo $image['path']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group text-center mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>

<?php $this->view('footer.admin'); ?>