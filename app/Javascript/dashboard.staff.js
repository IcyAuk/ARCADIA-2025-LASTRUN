document.addEventListener("DOMContentLoaded", function () {
    const createButton = document.getElementById("create-button");
    createButton.addEventListener("click", function () {
      document.getElementById("createModal").style.display = "block";
    });
  
    const deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        const id = this.getAttribute("data-id");
        if (confirm("Supprimer?")) {
          fetch(`/dashboard/deleteStaffMember/${id}`, {
            method: "POST",
            headers: {
              'Content-Type': 'application/json'
            },
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                this.closest("tr").remove();
              } else {
                alert("echec json");
              }
            })
            .catch((error) => {
              console.error('Error:', error);
              alert("Erreur lors de la suppression");
            });
        }
      });
    });
  });