document.addEventListener("DOMContentLoaded", function () {
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });
    } else {
        console.error("Element with ID 'btn' not found.");
    }

    function menuBtnChange() {
        if (sidebar && sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".swiper-container-project")
        .forEach(function (swiperElement) {
            const swiperId = swiperElement.getAttribute("data-swiper-id");

            if (swiperElement) {
                new Swiper(".swiper-" + swiperId, {
                    // Target berdasarkan class unik
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: `.swiper-${swiperId} .swiper-button-next`,
                        prevEl: `.swiper-${swiperId} .swiper-button-prev`,
                    },
                    pagination: {
                        el: `.swiper-${swiperId} .swiper-project-pagination`,
                        clickable: true,
                    },
                });
            }
        });
});

document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const imageId = this.getAttribute("data-image-id");
            const input = this.nextElementSibling;
            const icon = this.querySelector("i");

            // Toggle checkbox hidden
            if (input.disabled) {
                input.disabled = false;
                this.style.backgroundColor = "gray";
                icon.classList.remove("bx-trash");
                icon.classList.add("bx-check"); // Ganti ikon ke ceklis
            } else {
                input.disabled = true;
                this.style.backgroundColor = "red";
                icon.classList.remove("bx-check");
                icon.classList.add("bx-trash"); // Kembali ke ikon silang
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".swiper-container-project")
        .forEach(function (swiperElement) {
            const swiperId = swiperElement.getAttribute("data-swiper-id");

            if (swiperElement) {
                new Swiper(".swiper-" + swiperId, {
                    // Target berdasarkan class unik
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loop: true, // Aktifkan loop
                    autoplay: {
                        // Tambahkan autoplay
                        delay: 3000, // 3000ms (3 detik) per slide
                        disableOnInteraction: false, // Autoplay tetap berjalan meski ada interaksi
                    },
                    navigation: {
                        nextEl: `.swiper-${swiperId} .swiper-button-next`,
                        prevEl: `.swiper-${swiperId} .swiper-button-prev`,
                    },
                    pagination: {
                        el: `.swiper-${swiperId} .swiper-project-pagination`,
                        clickable: true,
                    },
                });
            }
        });
});

document
    .getElementById("skill_ratio")
    .addEventListener("keydown", function (event) {
        event.preventDefault();
    });

document
    .getElementById("skill_ratio")
    .addEventListener("change", function (event) {
        let value = parseInt(this.value);
        if (value % 10 !== 0) {
            this.value = Math.round(value / 10) * 10;
        }
    });
