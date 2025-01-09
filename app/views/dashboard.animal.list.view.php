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
                    <td><?php echo $animal->name ?? 'N/A';?></td>
                    <td><?php echo $animal->race ?? 'N/A'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->view('footer.admin'); ?>