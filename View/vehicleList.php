<?php
include("./View/header.php");
?>
<main>
    <section id="dropdown-group" class="flex flex-col text-nowrap text-xl">
        <!-- Form for sorting -->
        <form action="index.php" method="POST" class="flex flex-row space-x-3 mb-4">
            <label for="sortBy" class="block mb-3 mt-2">Sort By:</label>
            <select id="sortBy" name="sort_order" class="block w-48 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="price_desc" <?= ($sort_order == 'price_desc' ? 'selected' : '') ?>>Price High to Low</option>
                <option value="year_desc" <?= ($sort_order == 'year_desc' ? 'selected' : '') ?>>Year New to Old</option>
            </select>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Sort</button>
        </form>

        <!-- Form for filtering by Make, Type, and Class -->
        <form action="index.php" method="GET" class="flex flex-row space-x-3 mb-4">
            <div>
                <label for="selectMake" class="block mb-2">Select Make:</label>
                <select id="selectMake" name="make_id" class="block w-40 mb-3 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Makes</option>
                    <!-- Populate this with data from database -->
                </select>
            </div>
            <div>
                <label for="selectType" class="block mb-2">Select Type:</label>
                <select id="selectType" name="type_id" class="block w-40 mb-3 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Types</option>
                    <!-- Populate this with data from database -->
                </select>
            </div>
            <div>
                <label for="selectClass" class="block mb-2">Select Class:</label>
                <select id="selectClass" name="class_id" class="block w-40 mb-3 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Classes</option>
                    <!-- Populate this with data from database -->
                </select>
            </div>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 py-1 px-3" type="submit">Filter</button>
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
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No vehicles available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

<?php
include("./View/footer.php");
?>
