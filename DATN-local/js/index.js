document.addEventListener("DOMContentLoaded", function () {
  const toggleSubmenuButtons = document.querySelectorAll(".toggle-submenu");
  const buttonBars = document.querySelector(".toggle-menu");
  const submenu = document.querySelector(".main_bar_menu.submenu");
  const submenuCloseButton = document.querySelector(".submenu_close");
  const menuTitleItems = document.querySelectorAll(
    ".main_bar_menu_title .main_bar_menu_title_item"
  );
  const menuList = document.querySelector(".main_bar_menu_list");
  const backButton = document.querySelector(".back-button");

  const toggleSubmenuButtonscon = document.querySelectorAll(
    ".main_bar_menu_list .main_bar_menu_list_item  "
  );
  const menuListcon = document.querySelector(".main_bar_submenu_list");

  toggleSubmenuButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();
      submenu.classList.toggle("show");
    });
  });

  // show ra submenu khi click vào icon bars
  if (buttonBars) {
    buttonBars.addEventListener("click", (event) => {
      event.preventDefault();
      submenu.classList.toggle("show");
    });
  }

  // đóng submenu lại khi click vào dấu X
  submenuCloseButton.addEventListener("click", (event) => {
    event.preventDefault();
    submenu.classList.remove("show");
  });

  menuTitleItems.forEach((item) => {
    item.addEventListener("click", (event) => {
      event.preventDefault();
      menuList.classList.add("show"); // Hiển thị menu list
      submenu.querySelector(".main_bar_menu_title").classList.add("hide"); // Ẩn menu title
    });
  });

  toggleSubmenuButtonscon.forEach((item) => {
    item.addEventListener("click", (event) => {
      event.preventDefault();
      const categoryId = item
        .querySelector("a")
        .getAttribute("data-category-id");

      // Ẩn tất cả danh mục con trước
      document.querySelectorAll(".submenu-category").forEach((submenu) => {
        submenu.style.display = "none"; // Ẩn tất cả danh mục con
      });

      // Hiện danh mục con tương ứng với danh mục cha được nhấp
      const selectedSubmenu = document.querySelector(
        `.submenu-category[data-category-id="${categoryId}"]`
      );
      if (selectedSubmenu) {
        selectedSubmenu.style.display = "block"; // Hiển thị danh mục con tương ứng
      }

      menuList.classList.remove("show"); // Ẩn menu list
      menuListcon.classList.add("show"); // Hiển thị menu list con
      submenu.querySelector(".main_bar_menu_list").classList.add("hide"); // Ẩn menu title
    });
  });
  backButton.addEventListener("click", (event) => {
    event.preventDefault();
    menuList.classList.remove("show"); // Ẩn menu list
    submenu.querySelector(".main_bar_menu_title").classList.remove("hide"); // Hiển thị menu title

    menuListcon.classList.remove("show"); // Hiển thị menu list
    submenu.querySelector(".main_bar_menu_list").classList.remove("hide"); // Ẩn menu title
  });
});

// ------------------------- DETAIL PRODUCT IMAGES -----------------------
let detailImages = []; // Sử dụng let để có thể gán lại giá trị

// Lưu trữ tất cả ảnh nhỏ từ phần tử đầu tiên
const images1 = document.querySelectorAll(
  ".detail_product_left_img_item ul li img"
);
detailImages = [...images1]; // Chuyển đổi NodeList thành mảng

// Lưu trữ tất cả ảnh nhỏ từ phần tử thứ hai
const images2 = document.querySelectorAll(
  ".detail_product_left_img_item_res ul li img"
);
detailImages = detailImages.concat([...images2]); // nội dung của detailImages (đã chứa hình ảnh từ images1) với hình ảnh từ images2.Kết quả là detailImages sẽ chứa tất cả các hình ảnh từ cả hai nguồn,

const largeImg = document.querySelector(".detail_product_left_img img"); // Lưu trữ ảnh lớn

let currentIndex = 0; // biến theo dõi chỉ số của hình ảnh hiện tại

// hàm cập nhật ảnh lớn
function updateLargeImage(i) {
  largeImg.style.opacity = 0; // ẩn ảnh lớn

  // sau 1s nó thay đổi nguồn src của ảnh lớn và hiện lại ảnh lớn bằng opacity 1
  setTimeout(() => {
    largeImg.src = detailImages[i].src; // Thay đổi hình ảnh lớn
    largeImg.style.opacity = 1; // ẩn ảnh lớn
  }, 100);
}

// Sự kiện click vào hình ảnh nhỏ
detailImages.forEach((smallImg, i) => {
  // lặp qua từng ảnh nhỏ và thêm sự kiện click
  smallImg.addEventListener("click", function () {
    currentIndex = i; // Cập nhật chỉ số hình ảnh hiện tại
    updateLargeImage(currentIndex);
  });
});

//nút lùi
document.getElementById("prevBtn").addEventListener("click", function () {
  currentIndex = currentIndex > 0 ? currentIndex - 1 : detailImages.length - 1;
  updateLargeImage(currentIndex);
});

document.getElementById("nextBtn").addEventListener("click", function () {
  currentIndex = currentIndex < detailImages.length - 1 ? currentIndex + 1 : 0;
  updateLargeImage(currentIndex);
});

// ------------------------- DETAIL PRODUCT IMAGES MODAL -----------------------

const detailBtnImgs = document.querySelectorAll(".product_review_imgbtn");
const deatilModalReviewImg = document.getElementById("modal_review");
const detailModalMain = document.getElementById("modal_review_box_img");
const closeBtn = document.querySelector(".close");

detailBtnImgs.forEach((btn) => {
  btn.addEventListener("click", function () {
    const img = this.querySelector("img").src;
    detailModalMain.innerHTML = `<img src="${img}" alt="" />`;
    deatilModalReviewImg.style.display = "block";
  });
});

closeBtn.addEventListener("click", function () {
  deatilModalReviewImg.style.display = "none";
});

window.addEventListener("click", function (event) {
  if (event.target === deatilModalReviewImg) {
    deatilModalReviewImg.style.display = "none";
  }
});
