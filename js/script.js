// Form Tab Handler

document.addEventListener("DOMContentLoaded", function () {
    const packagesTab = document.getElementById('packagesTab');
    const createTab = document.getElementById('createTab');
    const packagesContent = document.getElementById('packagesContent');
    const createContent = document.getElementById('createContent');

    packagesTab.addEventListener('click', () => {
        packagesTab.classList.add('active');
        createTab.classList.remove('active');
        packagesContent.classList.add('active-content');
        createContent.classList.remove('active-content');
    });

    createTab.addEventListener('click', () => {
        createTab.classList.add('active');
        packagesTab.classList.remove('active');
        createContent.classList.add('active-content');
        packagesContent.classList.remove('active-content');
    });
});


// Table delete button handler

document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    // Add event listeners for delete buttons
    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const id = button.getAttribute("data-id");
            console.log("Clicked");
            if (confirm("Are you sure you want to delete this package?")) {
                // Send an AJAX request to the server to delete the package
                fetch("../php/delete_package.php?id=" + id, {
                    method: "GET",
                })
                    .then((response) => response.text())
                    .then((result) => {
                        // Check if the deletion was successful
                        if (result === "success") {
                            // Remove the package from the table
                            const tableRow = button.closest("tr");
                            if (tableRow) {
                                tableRow.remove();
                            }
                        } else {
                            alert("Deletion failed.");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("An error occurred while deleting the package.");
                    });
            }
        });
    });
});



// Table Edit Button Handler

document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-btn");
    const editModal = document.getElementById("editModal");
    const closeModal = document.getElementById("closeModal");
    const saveChangesBtn = document.getElementById("saveChanges");
    const editForm = document.getElementById("editForm");
    const editPackageName = document.getElementById("editPackageName");
    const editVehicleName = document.getElementById("editVehicleName");
    const editHourlyRate = document.getElementById("editHourlyRate");

    let currentPackageId; 


    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            currentPackageId = button.getAttribute("data-id");

            editModal.style.display = "block";
        });
    });

    // Close the modal 
    closeModal.addEventListener("click", function () {
        editModal.style.display = "none";
    });

    // Save changes 
    saveChangesBtn.addEventListener("click", function () {
        const editedPackageName = editPackageName.value;
        const editedVehicleName = editVehicleName.value;
        const editedHourlyRate = editHourlyRate.value;
        

        editModal.style.display = "none";
    });

    editForm.addEventListener("submit", function (event) {
        event.preventDefault();
    });

    saveChangesBtn.addEventListener("click", function () {
        const editedPackageName = editPackageName.value;
        const editedVehicleName = editVehicleName.value;
        const editedHourlyRate = editHourlyRate.value;

    
        // Create a JSON object to send to the server
        const data = {
            id: currentPackageId,
            package_name: editedPackageName,
            vehicle_name: editedVehicleName,
            hourly_rate: editedHourlyRate
        };
    
        // Send an AJAX request to update the package
        fetch("../php/update_package.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data), 
        })
        .then((response) => response.text())
        .then((result) => {
            if (result === "success") {
                editModal.style.display = "none";
                location.reload();
                
            } else {
                alert("Update failed.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while updating the package.");
        });
    });


    
    
});









