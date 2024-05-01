<?php
include("./Model/database.php");

// Fetch all items from the database to display
$query = "SELECT * FROM vehicles";
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Inventory</title>
    <!-- Include Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col justify-center items-center bg-slate-200 h-screen ">
    <div id="app-container" class="container w-screen flex-flex-col bg-slate-200">
        <section id="dropdown-group" class="flex flex-col">
            <!-- Form with select type dropdown -->
            <form action="index.php" method="POST" class="flex flex-row space-x-3 ">
                <label for="selectType" class="block mb-3 mt-2">Select Type</label>
                <select id="selectType" name="selectType" class="block w-40 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="price">Price</option>
                    <option value="year">Year</option>
                </select>
                <button class="bg-blue-300 rounded shadow mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
            </form>

            <!-- Form with select class dropdown -->
            <form action="index.php" method="POST" class="flex flex-row space-x-3">
                <label for="selectClass" class="block mb-3 mt-2">Select Class</label>
                <select id="selectClass" name="selectClass" class="block w-40 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="price">Price</option>
                    <option value="year">Year</option>
                </select>
                <button class="bg-blue-300 rounded shadow mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
            </form>

            <!-- Form with select make dropdown -->
            <form action="index.php" method="POST" class="flex flex-row space-x-3">
                <label for="selectMake" class="block mb-3 mt-2">Select Make</label>
                <select id="selectMake" name="selectMake" class="block w-40 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="price">Price</option>
                    <option value="year">Year</option>
                </select>
                <button class="bg-blue-300 rounded shadow mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
            </form>
        </section>

        <section id="sort-by-form" class="flex flex-row justify-center items-center">
            <!-- Form with radio buttons  -->
            <form action="index.php" method="POST" class="flex justify-center items-center space-x-3 mb-4 ">
                <label>Sort bY:</label>
                <label>Price</label>
                <input type="radio" id="sortByPrice" name="sortBy" value="price">
                <label>Year</label>
                <input type="radio" id="sortBYYear" name="sortBy" value="year">

                <button class="bg-blue-300 rounded shadow mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
            </form>
        </section>

        <!-- Responsive table -->
        <section id="customer-vehicle-table" class="overflow-x-auto">
            <table class="table-auto w-full overflow-scroll border-collapse border border-gray-200 ">
                <thead>
                    <tr class="bg-gray-900 text-white">
                        <?php
                        echo '<th class="px-4 py-2  border border-gray-200">Year</th>
                            <th class=" px-4 py-2"> Model</th>
                            <th class="px-4 py-2 border border-gray-200">Price</th>
                            <th class="px-4 py-2  border border-gray-200">Type</th>
                            <th class="px-4 py-2  border border-gray-200">Class</th>
                            <th class="px-4 py-2 border border-gray-200">Make</th>
                           
                            ';
                        ?>

                    </tr>
                </thead>
                <tbody class="bg-orange-300">
                    <!-- Sample data, replace with actual data -->
                    <?php
                    foreach ($results as $result) { ?>
                        <tr>
                            <td class="px-4 py-2 border border-gray-200"><?php echo $result["year"] ?></td>
                            <td class="px-4 py-2 border border-gray-200"><?php echo $result["model"] ?></td>
                            <td class="px-4 py-2 border border-gray-200"><?php echo $result["price"] ?></td>
                            <td class=" px-4 py-2 border border-gray-200"><?php echo $result["type_id"] ?></td>
                            <td class="px-4 py-2 border border-gray-200"><?php echo $result["class_id"] ?></td>
                            <td class="px-4 py-2 border border-gray-200"><?php echo $result["make_id"] ?></td>
                        <tr>
                        <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

</body>

</html>