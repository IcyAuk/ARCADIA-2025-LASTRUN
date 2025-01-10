<?php $this->view('header.admin');?>

<h1 class="text-center">Animaux</h1>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testModal">
    Ajouter un animal
</button>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Race</th>
                <th>Habitat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (!empty($data['animals'])): 
                $animals = json_decode($data['animals']);
                if ($animals->success):
                    foreach ($animals->data as $animal): ?>
            <tr>
                <td><?=$animal->id;?></td>
                <td><?=$animal->name;?></td>
                <td><?=$animal->race_name;?></td>
                <td><?=$animal->habitat_name;?></td>
            </tr>
            <?php endforeach; 
            ?>
            <?php endif;
            endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="testModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testModalLabel">Ajouter un animal</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="race">Race</label>
                        <select class="form-control" id="race">
                            <option value="race1">Race 1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="habitat">Habitat</label>
                        <select class="form-control" id="habitat">
                            <option value="habitat1">Habitat 1</option>
                            <option value="habitat2">Habitat 2</option>
                            <option value="habitat3">Habitat 3</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-button">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php $this->view('footer.admin'); ?>