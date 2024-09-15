var alertMessage = document.getElementById("alert-message");
if (alertMessage) {
    setTimeout(() => {
        alertMessage.classList.add("fade-out-left");
        setTimeout(() => {
            alertMessage.style.display = "none";
        }, 500);
    }, 3000);
}

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

const sidebarItems = document.querySelectorAll(".sidebar-item");

sidebarItems.forEach((item) => {
    item.addEventListener("click", () => {
        // Xóa lớp active từ tất cả các mục
        sidebarItems.forEach((el) => el.classList.remove("active"));

        // Thêm lớp active cho mục hiện tại
        item.classList.add("active");
    });
});

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $("#preview").html(
                '<img src="' +
                    event.target.result +
                    '" width="300" height="auto"/>'
            );
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#HinhAnh").change(function () {
    imagePreview(this);
});
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
