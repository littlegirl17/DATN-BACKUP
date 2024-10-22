var alertMessage = document.querySelectorAll("#alert-message");
alertMessage.forEach((item) => {
    setTimeout(() => {
        item.classList.add("fade-out-left");
        setTimeout(() => {
            item.style.display = "none";
        }, 500);
    }, 3000);
});

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
                    '" width="300" height="300"/>'
            );
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#HinhAnh").change(function () {
    imagePreview(this);
});
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$(document).ready(function () {
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                $(fileInput)
                    .closest(".custom-file")
                    .find(".previewImages")
                    .html(
                        '<img src="' +
                            event.target.result +
                            '" width="300" height="300"/>'
                    );
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }

    // Gán sự kiện cho input file mới
    $(document).on("change", ".imageInputJS", function () {
        imagePreview(this);
    });
});
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
