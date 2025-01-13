<h2>Animals</h2>

<!-- ANIMAL UPDATE MODAL -->
<div id="updateModal" style="display:none;">
    <form id="updateForm" action="/dashboard/updateAnimal" method="post">
        <h3>Edit Animal</h3>
        <input type="hidden" name="id" id="animalId">
        <label for="name">Name</label>
        <input type="text" name="name" id="animalName" required>

        <label for="habitat">Habitat</label>
        <select name="habitat" id="animalHabitat" required>
            <?php foreach ($habitats as $habitat): ?>
            <option value="<?php echo $habitat->id; ?>">
                <?php echo $habitat->title; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Update</button>
    </form>
</div>

<!-- ANIMAL CREATE MODAL -->
<div id="createModal"style="display:none;">
    <form id="createForm" action="/dashboard/createAnimal" method="post">
        <h3>Add Animal</h3>
        <label for="name">Name</label>
        <input type="text" name="name" required>

        <label for="race">race</label>
        <input type="text" name="race" required>

        <label for="habitat">Habitat</label>
        <select name="habitat" id="animalHabitat" required>
            <?php foreach ($habitats as $habitat): ?>
            <option value="<?php echo $habitat->id; ?>">
                <?php echo $habitat->title; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Update</button>
    </form>
</div>

<!--CREATE ANIMAL BUTTON-->
<button id="create-button"type="button">Ajouter Animal</button>

<!-- ANIMAL LIST -->
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
                <img src="/<?=$animal->image_path; ?>" alt="animalImage" width="70px">
                <?php else: ?>
                No image
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="button update-button" data-id="<?=$animal->id?>"
                    data-name="<?php echo $animal->name; ?>"
                    data-habitat="<?php echo $animal->habitat_id; ?>">Update</button>
                <button type="button" class="delete-button" data-id="<?=$animal->id?>">Supprimer</button>
            </td>
            <td>
                <form action="/dashboard/uploadImage/<?=$animal->id; ?>" method="post" enctype="multipart/form-data">
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