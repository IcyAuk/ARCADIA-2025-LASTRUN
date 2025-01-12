  document.addEventListener("DOMContentLoaded", function () {
    const updateButtons = document.querySelectorAll(".update-button");
    updateButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        const name = this.getAttribute("data-name");
        const habitat = this.getAttribute("data-habitat");
        openUpdateModal(id, name, habitat);
      });
    });

    const deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        const id = this.getAttribute("data-id");
        if (confirm("Supprimer?")) {
            fetch(`/dashboard/deleteAnimal/${id}`, {
                method: "POST",
            })
                .then((response) => response.json())
                .then((data) => {
                if (data.success) {
                    console.log("Element to remove:", this.closest("tr")); // Debugging line

                    this.closest("tr").remove();
                } else {
                    alert("Erreur lors de la suppression");
                }
                });
        }
      });
    });
  });

  function openUpdateModal(id, name, habitatId) {
    document.getElementById("animalId").value = id;
    document.getElementById("animalName").value = name;
    document.getElementById("animalHabitat").value = habitatId;
    document.getElementById("updateForm").action = `/dashboard/updateAnimal/${id}`;
    document.getElementById("updateModal").style.display = "block";
  }
