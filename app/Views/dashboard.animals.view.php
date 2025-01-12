<?php $this->view('dashboard.header')?>

<h2>Animals</h2>

<?php if (!empty($animals)): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Race</th>
            <th>Habitat</th>
            <th>Image</th>
            <th>Actions</th>
            <th>Ajouter Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animals as $animal): ?>
        <tr>
            <td><?php echo $animal->id; ?></td>
            <td><?php echo $animal->name; ?></td>
            <td><?php echo $animal->race; ?></td>
            <td><?php echo $animal->habitat_title; ?></td>
            <td>
                <?php if ($animal->image_path): ?>
                <img src="/<?=$animal->image_path; ?>" alt="animalImage" width="100px">
                <?php else: ?>
                No image
                <?php endif; ?>
            </td>
            <td>
                <a href="/dashboard/animals/update/<?=$animal->id; ?>" class="button">Update</a>
                <a href="/dashboard/animals/delete/<?=$animal->id; ?>" class="button"
                    onclick="return confirm('Are you sure you want to delete this animal?');">Delete</a>
            </td>
            <td>
                <form action="/dashboard/uploadImage/<?=$animal->id; ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="animal_image" accept="image/*">
                    <button type="submit" class="button">Upload Image</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No animals found.</p>
<?php endif; ?>

<?php $this->view('dashboard.footer')?>