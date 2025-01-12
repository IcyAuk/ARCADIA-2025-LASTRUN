<?php
namespace App\Model;
use App\Model\ImageModel;
//handles image uploads
trait Image
{
    //TO DO: abstract the method to be reused for other db tables
    public function uploadImages($id)
    {
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['animal_image'])) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES["animal_image"]["name"]);
                //$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["animal_image"]["tmp_name"]);

                if ($check !== false) {
                    if (move_uploaded_file($_FILES["animal_image"]["tmp_name"], $targetFile)) {
                    //remove old image from db and dir
                    $imageModel = new \App\Model\ImageModel();
                    
                    // Insert the image path into the Images table and get the image ID
                    $imageId = $imageModel->insertImage($targetFile);

                        // Update the animal's image path in the database
                        $animalModel = new Animal();
                        $animalModel->updateAnimalImagePath($id, $imageId);
                        header("Location: /dashboard/animals");
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File is not an image.";
                }
            }
        }
    }
}