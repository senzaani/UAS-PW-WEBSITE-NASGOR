<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO menus (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        $conn->query($sql);
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
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
                            href="index.php">
                            Back home
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
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">Tambah Menu</h1>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="text" name="name" placeholder="Nama Menu" required
                class="block w-full px-4 py-2 border rounded">
            <textarea name="description" placeholder="Deskripsi" required
                class="block w-full px-4 py-2 border rounded"></textarea>
            <input type="number" name="price" placeholder="Harga" required
                class="block w-full px-4 py-2 border rounded">
            <input type="file" name="image" required class="block w-full px-4 py-2">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</body>

</html>