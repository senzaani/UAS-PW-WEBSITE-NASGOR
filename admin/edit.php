<?php
include '../db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM menus WHERE id = $id";
$result = $conn->query($sql);
$menu = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE menus SET name='$name', description='$description', price='$price', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE menus SET name='$name', description='$description', price='$price' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
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
        <h1 class="text-3xl font-bold mb-6">Edit Menu</h1>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="text" name="name" value="<?php echo $menu['name']; ?>" required
                class="block w-full px-4 py-2 border rounded">
            <textarea name="description" required
                class="block w-full px-4 py-2 border rounded"><?php echo $menu['description']; ?></textarea>
            <input type="number" name="price" value="<?php echo $menu['price']; ?>" required
                class="block w-full px-4 py-2 border rounded">
            <input type="file" name="image" class="block w-full px-4 py-2">
            <img src="../uploads/<?php echo $menu['image']; ?>" alt="Menu Image" class="w-32 h-32 object-cover mt-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</body>

</html>