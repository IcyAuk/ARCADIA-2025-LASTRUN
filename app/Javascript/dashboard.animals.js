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
        if (!confirm("Are you sure you want to delete this animal?")) {
          event.preventDefault();
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
