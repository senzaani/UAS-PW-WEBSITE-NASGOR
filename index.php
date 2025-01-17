<?php
include 'db.php';

$sql = "SELECT * FROM menus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Nasi Goreng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-red-600">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-white font-bold text-2xl" href="#">
                        <h1>Nasi Goreng Pak Gento</h1>
                    </a>
                </div>

                <div class="hidden md:block" id="nav-menu">
                    <nav aria-label="Global">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-white transition hover:text-gray-500/75" href="/about.php"> About </a>
                            </li>
                            <li>
                                <a class="text-white transition hover:text-gray-500/75" href="/team.php"> Team </a>
                            </li>
                            <li>
                                <a class="text-white transition hover:text-gray-500/75" href="/menu.php"> Menu </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a class="rounded-md bg-white px-5 py-2.5 hover:bg-indigo-900 hover:text-white text-sm font-medium text-indigo-900 shadow"
                            href="admin/index.php">
                            Admin
                        </a>
                    </div>

                    <div class="block md:hidden">
                        <button id="hamburger-btn"
                            class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <nav aria-label="Global">
                <ul class="flex flex-col items-start gap-4 p-4 text-sm bg-red-600 text-white">
                    <li>
                        <a class="transition hover:text-gray-500/75" href="/about.php"> About </a>
                    </li>
                    <li>
                        <a class="transition hover:text-gray-500/75" href="/team.php"> Team </a>
                    </li>
                    <li>
                        <a class="transition hover:text-gray-500/75" href="/blog.php"> Blog </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="p-6 bg-gray-50" style="
      background-image: url('uploads/nasi-goreng.png');
      background-size: cover; /* Memastikan gambar mencakup seluruh elemen */
      background-position: center; /* Pusatkan gambar */
      background-repeat: no-repeat; /* Hindari pengulangan gambar */
      height: 60vh; /* Pastikan tinggi sesuai layar penuh */
    ">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex h-600 lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl text-black font-extrabold sm:text-5xl">
                    Warung Nasi Goreng
                    <strong class="font-extrabold text-black sm:block"> Pak Gento </strong>
                </h1>

                <p class="mt-4 text-black font-bold sm:text-xl/relaxed">
                    Menyajikan Berbagai menu Nasi Goreng dan Minuman
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-red-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
                        href="menu.php">
                        Get Started
                    </a>

                    <a class="block w-full rounded px-12 py-3 text-sm font-medium text-white shadow hover:text-red-700 focus:outline-none focus:ring active:text-red-500 sm:w-auto"
                        href="about.php">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Menu Nasi Goreng</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"
                    class="w-full h-64 object-cover rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-gray-800"><?php echo $row['name']; ?></h2>
                <p class="text-gray-600 mt-2"><?php echo $row['description']; ?></p>
                <p class="text-yellow-500 font-bold mt-2 text-lg">
                    Rp<?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                <a href="https://wa.me/6282132964106?text=Halo, saya ingin pesan <?php echo $row['name']; ?>."
                    class="inline-block mt-4 bg-green-500 text-white px-6 py-2 rounded-lg text-center hover:bg-green-600 transition-colors duration-200">
                    Pesan Sekarang
                </a>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p class="text-gray-700 text-center col-span-3">Tidak ada menu tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="bg-red-600">
        <div class="mx-auto max-w-screen-xl px-4 pb-8 pt-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-5xl">WARUNG NASI GORENG PAK GENTO</h2>

                <p class="mx-auto mt-4 max-w-sm text-xl text-white">
                    Menyediakan berbagai menu nasi goreng dan minuman
                </p>

                <a href="https://wa.me/6282132964106?"
                    class="mt-8 inline-block rounded-full border border-white px-12 py-3 text-sm font-medium text-white hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500">
                    pesan sekarang
                </a>
            </div>

            <div class="mt-16 border-t border-gray-100 pt-8 sm:flex sm:items-center sm:justify-between lg:mt-24">
                <ul class="flex flex-wrap justify-center gap-4 text-xs lg:justify-end">
                    <li>
                        <a href="#" class="text-white transition hover:opacity-75"> Terms & Conditions </a>
                    </li>

                    <li>
                        <a href="#" class="text-white transition hover:opacity-75"> Privacy Policy </a>
                    </li>

                    <li>
                        <a href="#" class="text-white transition hover:opacity-75"> Cookies </a>
                    </li>
                </ul>

                <ul class="mt-8 flex justify-center gap-6 sm:mt-0 lg:justify-end">

                    <li>
                        <a href="https://www.instagram.com/senzanirazak/#" rel="noreferrer" target="_blank"
                            class="text-white transition hover:opacity-75">
                            <span class="sr-only">Instagram</span>

                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/senzanirazak/#" rel="noreferrer" target="_blank"
                            class="text-white transition hover:opacity-75">
                            <span class="sr-only">Twitter</span>

                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/senzanirazak/#" rel="noreferrer" target="_blank"
                            class="text-white transition hover:opacity-75">
                            <span class="sr-only">GitHub</span>

                            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
    document.getElementById('hamburger-btn').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    </script>
</body>

</html>