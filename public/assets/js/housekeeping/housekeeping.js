function showConfirmationModal(message) {
    return new Promise((resolve, reject) => {
        const modal = document.getElementById("confirmationModal");
        const modalInstance = new bootstrap.Modal(modal);

        modal.querySelector(".modal-body").textContent = message;

        modal.querySelector("#confirmationModalConfirm").onclick = () => {
            modalInstance.hide();
            resolve(true);
        };

        modal.querySelector("#confirmationModalCancel").onclick = () => {
            modalInstance.hide();
            reject(false);
        };

        modalInstance.show();
    });
}
