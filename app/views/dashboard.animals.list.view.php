<?php $this->view('header.admin'); ?>

<h1 class="text-center">List of Animals</h1>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Race</th>
                <th>Habitat</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animals as $animal): ?>
                <tr>
                    <td><?php echo $animal['name']; ?></td>
                    <td><?php echo $animal['race']; ?></td>
                    <td><?php echo $animal['habitat_id']; ?></td>
                    <td><?php echo $animal['image_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->view('footer.admin'); ?>