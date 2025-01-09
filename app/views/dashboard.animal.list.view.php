<?php $this->view('header.admin'); ?>

<h1 class="text-center">Animal List</h1>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Race</th>
                <th>Habitat ID</th>
                <th>Image ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animals as $animal): ?>
                <tr>
                    <td><?php echo $animal->id; ?></td>
                    <td><?php echo $animal->name; ?></td>
                    <td><?php echo $animal->race; ?></td>
                    <td><?php echo $animal->habitat_id; ?></td>
                    <td><?php echo $animal->image_id; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->view('footer.admin'); ?>