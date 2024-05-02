<?php
include("./View/header.php");
?>
<main>
    <section id="dropdown-group" class="flex flex-col text-nowrap text-xl">
        <!-- Form with select type dropdown -->
        <form action="index.php" method="POST" class="flex flex-row space-x-3 ">
            <label for="selectType" class="block mb-3 mt-2">Select Type</label>
            <select id="selectType" name="selectType" class="block w-48 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="price">Price</option>
                <option value="year">Year</option>
            </select>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
        </form>

        <!-- Form with select class dropdown -->
        <form action="index.php" method="POST" class="flex flex-row space-x-3">
            <label for="selectClass" class="block mb-3 mt-2">Select Class</label>
            <select id="selectClass" name="selectClass" class="block w-40 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="price">Price</option>
                <option value="year">Year</option>
            </select>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
        </form>

        <!-- Form with select make dropdown -->
        <form action="index.php" method="POST" class="flex flex-row space-x-3">
            <label for="selectMake" class="block mb-3 mt-2">Select Make</label>
            <select id="selectMake" name="selectMake" class="block w-40 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="price">Price</option>
                <option value="year">Year</option>
            </select>
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
        </form>
    </section>

    <section id="sort-by-form" class="flex flex-row justify-center items-center text-nowrap text-xl">
        <!-- Form with radio buttons  -->
        <form action="index.php" method="POST" class="flex justify-center items-center space-x-3 mb-4 ">
            <label>Sort bY:</label>
            <label>Price</label>
            <input type="radio" id="sortByPrice" name="sortBy" value="price">
            <label>Year</label>
            <input type="radio" id="sortBYYear" name="sortBy" value="year">
            <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
        </form>
    </section>

    <!-- Responsive table -->
    <section id="customer-vehicle-table" class=" text-nowrap text-center text-xl overflow-auto scrollbar-thumb-gray-400 scrollbar-track-gray-300">
        <table class="table-auto w-full border-collapse border border-slate-600">
            <thead>
                <tr class="bg-slate-800  text-white">
                    <th class="px-2 py-2">Year</th>
                    <th class="px-2 py-2"> Model</th>
                    <th class="px-2 py-2">Price</th>
                    <th class="px-2 py-2">Type</th>
                    <th class="px-2 py-2">Class</th>
                    <th class="px-2 py-2">Make</th>
                </tr>
            </thead>
            <tbody class="bg-orange-300">
                <!-- Sample data, replace with actual data -->
                <?php
                foreach ($vehicles as $vehicle) { ?>
                    <tr>
                        <td class="px-4 py-2 border border-slate-600"><?php echo $vehicle["year"] ?></td>
                        <td class=" px-4 py-2 border border border-slate-600"><?php echo $vehicle["model"] ?></td>
                        <td class="px-4 py-2 border border-slate-600"><?php echo $vehicle["price"] ?></td>
                        <td class=" px-4 py-2 border border-slate-600"><?php echo $vehicle["type"] ?></td>
                        <td class=" px-4 py-2 border border-slate-600"><?php echo $vehicle["class"] ?></td>
                        <td class=" px-4 py-2 border border-slate-600"><?php echo $vehicle["make"] ?></td>
                    <tr>
                    <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<?php
include("./View/footer.php");
?>