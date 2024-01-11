<div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(/wiki/assets/img/bg-wiki.jpg);">
    <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
        <div class="flex justify-center self-center  z-10">
            <form class="p-12 bg-white mx-auto rounded-2xl w-100" id="signupForm" action="index.php?page=signup" method="POST">
                <div class="mb-4">
                    <h3 class="font-semibold text-2xl text-gray-800">Sign In </h3>
                    <p class="text-gray-500">Please sign in to your account.</p>
                </div>
                <div class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 tracking-wide">Full Name</label>
                        <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" id="validateNameInput" name="name">
                        <small></small>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                        <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" id="validateEmailInput" name="email" placeholder="mail@gmail.com">
                        <small></small>
                    </div>
                    <div class="space-y-2">
                        <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                            Password
                        </label>
                        <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" id="validatePasswordInput" name="password" type="password" placeholder="Enter your password">
                        <small></small>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm">
                            Avez vous déja un compte?
                            <a href="index.php?page=login" class="text-sky-400 hover:text-sky-500">
                                Se connecter
                            </a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="signup" class="w-full flex justify-center bg-sky-600  hover:bg-sky-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let form = document.querySelector("#signupForm");

    // Add event listeners to input fields
    form
        .querySelector("#validateNameInput")
        .addEventListener("change", function() {
            validateName(this);
        });

    form
        .querySelector("#validateEmailInput")
        .addEventListener("change", function() {
            validateEmail(this);
        });

    form
        .querySelector("#validatePasswordInput")
        .addEventListener("change", function() {
            validatePassword(this);
        });

    // Reusable function for input validation
    const validateInput = function(inputElement, regex, errorMessage) {
        let small = inputElement.nextElementSibling;
        if (regex.test(inputElement.value)) {
            small.innerHTML = "<b>Valid</b>";
            small.classList.remove("text-red-400");
            small.classList.add("text-green-400");
        } else {
            small.innerHTML = errorMessage;
            small.classList.remove("text-green-400");
            small.classList.add("text-red-400");
        }
    };

    // Validation functions for each input
    // Validation function for name
    const validateName = function(inputElement) {
        validateInput(
            inputElement,
            /^[A-Za-z]+\s[A-Za-z]+$/,
            "<b>Name is not valid</b>"
        );
    };

    // Validation function for email
    const validateEmail = function(inputElement) {
        validateInput(
            inputElement,
            /^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$/,
            "<b>Email is not valid</b>"
        );
    };

    // Validation function for password
    const validatePassword = function(inputElement) {
        validateInput(
            inputElement,
            /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/,
            "<b>Password must be at least 8 characters and include at least one letter and one number.</b>"
        );
    };
</script>