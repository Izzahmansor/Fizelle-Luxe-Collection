
        const menuOpenButton = document.querySelector("#menu-open-button");
        const menuCloseButton = document.querySelector("#menu-close-button");

        // Toggle mobile menu visibility when the open button is clicked
        menuOpenButton.addEventListener("click", () => {
        // Add class to show the mobile menu
        document.body.classList.add("show-mobile-menu");
        });

        // Close mobile menu when the close button is clicked
        menuCloseButton.addEventListener("click", () => {
        // Remove class to hide the mobile menu
        document.body.classList.remove("show-mobile-menu");
        });

        
        // Function to show login form
        function showLoginForm() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("signUpForm").style.display = "none";
        document.getElementById("formTitle").textContent = "Please log in using your personal information to stay connected with us.";
        }

        // Function to show sign-up form
        function showSignUpForm() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("signUpForm").style.display = "block";
        document.getElementById("formTitle").textContent = "Create your account to join us.";
        }

        // Open the form when the page loads
        window.onload = function() {
        showLoginForm();  // Default to show login form on page load
}


        const swiper = new Swiper('.slider-wrapper', {
                loop: true,
                grabCursor: true,
                spaceBetween: 25, // Adjust the space between reviews
                slidesPerView: 3, // Adjust the number of visible slides

                pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                },

                navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                },

                breakpoints: {
                        0: {
                                slidesPerView: 1,
                        },

                        768: {
                                slidesPerView: 2,
                        },

                        1024: {
                                slidesPerView: 3,
                        }
                }
                });