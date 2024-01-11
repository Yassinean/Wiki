<div class="bg-no-repeat bg-cover bg-center relative" id="loginFormContainer" style="background-image: url(/wiki/assets/img/bg-wiki.jpg);">
<div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
    <div class="flex justify-center self-center  z-10">
        <form class="p-12 bg-white mx-auto rounded-2xl w-100" action="index.php?page=login" method="POST">
            <div class="mb-4">
                <h3 class="font-semibold text-2xl text-gray-800">Login</h3>
            </div>
            <div class="space-y-5">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                    <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" name="email" placeholder="mail@gmail.com">
                </div>
                <div class="space-y-2">
                    <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                        Password
                    </label>
                    <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" name="password" type="password" placeholder="Enter your password">
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        Vous n'avez pas de compte?
                        <a href="index.php?page=signup" class="text-sky-400 hover:text-sky-500">
                            Créer un compte
                        </a>
                    </div>
                </div>
                <div>
                    <button type="submit" name="login" class="w-full flex justify-center bg-sky-400  hover:bg-sky-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                        Sign in
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>