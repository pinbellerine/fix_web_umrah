<div class="p-6 space-y-6 mx-5 my-8 mb-8">

                    <!-- Header -->

                    <div class="flex items-center justify-center flex-col space-y-2">
                    <h1 class="font-bold leading-tight tracking-tight mt-4 mb-2 text-transparent bg-clip-text bg-gradient-to-b from-[#27A1FF] to-[#3285D8] text-3xl">
                        Atur Ulang Kata Sandi
                    </h1>

                        <p class="text-sm text-center">Silahkan masukkan kata sandi baru untuk akun Anda</p>
                    </div>

                    <!-- Form Login -->

                    <form class="space-y-4 md:space-y-4">
                    

                    <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata sandi</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan kata sandi baru"
                                   class="bg-white border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                   required>
                        </div>  

                    <div>
                            <label for="newpassword" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Kata Sandi</label>
                            <input type="newpassword" name="newpassword" id="password" placeholder="Konfirmasi kata sandi baru"
                                class="bg-white border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                required>
                        </div>


                        <div class="flex justify-center">
                            <button id="btn-masuk3" type="button" class="text-white mt-3 bg-gradient-to-b from-[#7CABCF] to-[#3285D8] hover:from-primary-600 hover:to-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-7 py-2.5 text-center dark:from-primary-600 dark:to-primary-800 dark:hover:from-primary-700 dark:hover:to-primary-900 dark:focus:ring-primary-800 shadow-[0px_5px_15px_rgba(0,0,0,0.3)]">
                                Masuk
                            </button>
                        </div>
                    </form>

                    <div class="flex items-center gap-2 justify-center text-sm text-[#27A1FF]">
                        <i class="fa-solid fa-angle-left"></i>
                        <a href="/login">Kembali ke Masuk</a>
                    </div>

                </div>