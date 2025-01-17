<?php
include '../db.php';

$sql = "SELECT * FROM menus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
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
                            href="/">
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
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Admin Menu</h1>
        <div class="flex justify-end mb-6">
            <a href="add.php"
                class="bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-300">Tambah
                Menu</a>
        </div>
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Harga</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4"><?php echo $row['id']; ?></td>
                    <td class="px-6 py-4"><?php echo $row['name']; ?></td>
                    <td class="px-6 py-4">Rp<?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                    <td class="px-6 py-4 flex space-x-4">
                        <a href="edit.php?id=<?php echo $row['id']; ?>"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300"
                            onclick="return confirm('Hapus menu ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>