<div class="min-h-screen flex items-center justify-center mt-9 px-4 sm:px-6 lg:px-8" id="call">
    <div class="w-full max-w-lg">
        <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">Hubungi Pandai Digital untuk Diskusi
            Lebih Lanjut</h2>
        <form action="https://formspree.io/f/xpwagrpp" method="POST" class="bg-white space-y-4 sm:space-y-6 p-4 sm:p-6">
            <div class="grid grid-cols-1 gap-4 sm:gap-6">
                <label for="nama" class="font-bold text-sm sm:text-base">Nama
                    <input type="text" name="nama" id="nama" required
                        class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                </label>
                <label for="jabatan" class="font-bold text-sm sm:text-base">Jabatan
                    <input type="text" name="jabatan" id="jabatan" required
                        class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                </label>
                <label for="perusahaan" class="font-bold text-sm sm:text-base">Perusahaan
                    <input type="text" name="perusahaan" id="perusahaan" required
                        class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                </label>
                <label for="email" class="font-bold text-sm sm:text-base">Email Resmi
                    <input type="email" name="email" id="email" required
                        class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                </label>
                <label for="no-hp" class="font-bold text-sm sm:text-base">No. HP / WhatsApp
                    <input type="text" name="no-hp" id="no-hp" required
                        class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                </label>
                <label for="layanan" class="font-bold text-sm sm:text-base">Pilih Layanan</label>
                <select name="layanan" id="layanan" required
                    class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                    <option value="" disabled selected hidden>Pilih layanan</option>
                    <option value="corporate-training">Corporate Training</option>
                    <option value="performance-management-software">Performance Management Software</option>
                    <option value="employee-learning-development">Employee Learning and Development</option>
                    <option value="consulting-services">Consulting Services</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label for="pesan" class="font-bold text-sm sm:text-base">Pesan</label>
                <textarea name="pesan" id="pesan" required
                    class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg mt-2 text-sm sm:text-base h-32 sm:h-40"></textarea>
            </div>
            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-x-4 sm:space-y-0">
                <button type="submit"
                    class="w-full sm:w-auto px-4 py-2 bg-gray-300 text-white font-bold rounded-lg">Kirim</button>
                <p class="text-xs sm:text-sm">Silahkan lengkapi form di atas untuk mengirim pesan</p>
            </div>
        </form>

    </div>
</div>
