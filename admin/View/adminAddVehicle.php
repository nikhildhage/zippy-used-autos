<?php
include("../View/header.php");

$makes = get_makes();
$types = get_types();
$classes = get_classes();
?>

<main class="flex flex-col items-center my-8">
    <h1 class="text-lg font-bold mb-4">Add Vehicle</h1>
    <form action="admin_controller.php" method="post" class="w-full max-w-md">
        <input type="hidden" name="action" value="add_vehicle">

        <!-- Vehicle Year -->
        <div class="mb-4">
            <label for="year" class="block text-sm font-bold mb-2">Year:</label>
            <input type="text" id="year" name="year" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Vehicle Model -->
        <div class="mb-4">
            <label for="model" class="block text-sm font-bold mb-2">Model:</label>
            <input type="text" id="model" name="model" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Vehicle Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-bold mb-2">Price:</label>
            <input type="text" id="price" name="price" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Vehicle Make -->
        <div class="mb-4">
            <label for="make_id" class="block text-sm font-bold mb-2">Make:</label>
            <select id="make_id" name="make_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <?php foreach ($makes as $make) { ?>
                    <option value="<?= $make['id'] ?>"><?= htmlspecialchars($make['make']) ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Vehicle Type -->
        <div class="mb-4">
            <label for="type_id" class="block text-sm font-bold mb-2">Type:</label>
            <select id="type_id" name="type_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['type']) ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Vehicle Class -->
        <div class="mb-6">
            <label for="class_id" class="block text-sm font-bold mb-2">Class:</label>
            <select id="class_id" name="class_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <?php foreach ($classes as $class) { ?>
                    <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['class']) ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Vehicle</button>
    </form>
</main>

<footer class="w-full text-center border-t border-grey p-4 pin-b">
    <!-- Link to View/Edit Vehicles Page -->
    <p><a class="text-blue-500 underline" href="../admin/admin_controller.php?action=list_vehicle">Click Here to view Vehicle List</a></p>

    <!-- Link to View/Edit Type Page -->
    <p><a class="text-blue-500 underline" href="./controllers/types.php?action=list_types">Click Here to view Vehicle Type List</a></p>

    <!-- Link to View/Edit Class Page -->
    <p><a class="text-blue-500 underline" href="./controllers/classes.php?action=list_classes">Click Here to view Vehicle Class List</a></p>

    <!-- Link to View/Edit Make Page -->
    <p><a class="text-blue-500 underline" href="./controllers/makes.php?action=list_makes">Click Here to view Vehicle Make List</a></p>
</footer>

<?php
include("../View/footer.php");
?>
