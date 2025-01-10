<?php $this->view('header.admin');?>

<h1 class="text-center">Animal List</h1>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Race</th>
                <th>Habitat ID</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['animal'])): ?>
                <?php foreach ($data['animal'] as $animal): ?>
                    <tr>
                        <td><?=$animal->name;?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $this->view('footer.admin'); ?>