function showConfirmationModal(button, actionType) {
    const modal = document.getElementById("confirmationModal");
    const actionUrl = button.getAttribute("data-action-url");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const modalConfirm = modal.querySelector("#confirmationModalConfirm");

    const coreuiModal = new coreui.Modal(modal);
    coreuiModal.show();

    modalConfirm.onclick = function () {
        const method = button.getAttribute("data-method");

        axios({
            method: method,
            url: actionUrl,
            data: { _token: csrfToken },
        })
            .then(function (response) {
                console.log(response);
                window.location.reload();
            })
            .catch(function (error) {
                console.log(error);
                coreuiModal.hide();
            });
    };

    switch (actionType) {
        case "delete-user":
            modal.querySelector(".modal-title").textContent = "Delete User";
            modal.querySelector(".modal-body").textContent =
                "Are you sure you want to delete this user?";
            break;
        case "ban-user":
            modal.querySelector(".modal-title").textContent = "Ban User";
            modal.querySelector(".modal-body").textContent =
                "Are you sure you want to ban this user?";
            break;
    }
}
