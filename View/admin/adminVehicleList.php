<?php
include("../header.php");

$makes = get_makes();
$types = get_types();
$classes = get_classes();
?>

<main>
    <section id="dropdown-group" class="flex flex-col text-nowrap text-xl">
        <!-- Combined Form for Sorting and Filtering -->
        <form action="admin_controller.php" method="POST" class="flex flex-col space-y-4 mb-4">
            <div class="flex flex-col">
                <label for="sortBy" class="mb-2 font-bold">Sort by:</label>
                <select id="sortBy" name="sort_order" class="mb-3 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 w-full">
                    <option value="price_desc" <?= ($sort_order == 'price_desc' ? 'selected' : '') ?>>Price High to Low</option>
                    <option value="year_desc" <?= ($sort_order == 'year_desc' ? 'selected' : '') ?>>Year New to Old</option>
                </select>
            </div>
            <div class="flex flex-row space-x-4">
                <div class="flex flex-col w-1/3">
                    <label for="selectMake" class="mb-2">Select Make:</label>
                    <select id="selectMake" name="make_id" class="py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Makes</option>
                        <?php foreach ($makes as $make) : ?>
                            <option value="<?= $make['id'] ?>" <?= ($make_id == $make['id'] ? 'selected' : '') ?>><?= htmlspecialchars($make['make']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col w-1/3">
                    <label for="selectType" class="mb-2">Select Type:</label>
                    <select id="selectType" name="type_id" class="py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Types</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= $type['id'] ?>" <?= ($type_id == $type['id'] ? 'selected' : '') ?>><?= htmlspecialchars($type['type']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col w-1/3">
                    <label for="selectClass" class="mb-2">Select Class:</label>
                    <select id="selectClass" name="class_id" class="py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Classes</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?= $class['id'] ?>" <?= ($class_id == $class['id'] ? 'selected' : '') ?>><?= htmlspecialchars($class['class']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 py-1 px-3" type="submit" name="action" value="list_vehicles">Apply</button>
        </form>
    </section>

    <!-- Responsive table -->
    <section id="customer-vehicle-table" class="text-nowrap text-center overflow-auto scrollbar-thumb-gray-400 scrollbar-track-gray-300">
        <table class="table-auto w-full border-collapse border border-slate-600">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="px-2 py-2">Year</th>
                    <th class="px-2 py-2">Model</th>
                    <th class="px-2 py-2">Price</th>
                    <th class="px-2 py-2">Type</th>
                    <th class="px-2 py-2">Class</th>
                    <th class="px-2 py-2">Make</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-orange-300">
                <?php if (!empty($vehicles)) : ?>
                    <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["year"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["model"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["price"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["type"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["class"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?= htmlspecialchars($vehicle["make"]) ?></td>
                        <td class="px-4 py-2 border border-slate-600">
                            <form action="admin_controller.php" method="POST">
                                <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>"> 
                                <input type="hidden" name="action" value="delete_vehicle">
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">No vehicles available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <!-- Link to View/Edit Courses Page -->
    <p><a class="text-blue-500 underline" href="admin_controller.php?action=list_types">Click Here to view Vehicle Type List</a></p>

    <!-- Link to View/Edit Courses Page -->
    <p><a class="text-blue-500 underline" href="admin_controller.php?action=list_classes">Click Here to view Vehicle Class List</a></p>

    <!-- Link to View/Edit Courses Page -->
    <p><a class="text-blue-500 underline" href="admin_controller.php?action=list_makes">Click Here to view Vehicle Make List</a></p>
</footer>

<?php
include("../footer.php");
?>
