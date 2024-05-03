<?php
include("../header.php");
?>
<main>


    <p class=" font-bold text-orange-400 text-xl text-left text-nowrap my-4">Vehicle Class List</p>

    <!-- Responsive table -->
    <section id="customer-vehicle-table" class=" text-nowrap overflow-auto scrollbar-thumb-gray-400 scrollbar-track-gray-300">
        <table class="table-auto w-3/12 border-collapse border border-slate-600">
            <thead>
                <tr class="bg-slate-800  text-white">
                    <th class="px-2 py-2">Type</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-orange-300">
                <!-- Sample data, replace with actual data -->
                <?php
                foreach ($classes as $class) { ?>
                    <tr>
                        <td class=" px-4 py-2 border border-slate-600"><?php echo $class["class"] ?></td>
                        <td class=" px-4 py-2 border border-slate-600">
                            <form action="." method="POST">
                                <button name="action" class="bg-red-500 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Remove</button>
                            </form>
                        </td>
                    <tr>
                    <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<p class=" font-bold text-orange-400 text-xl text-left text-nowrap my-4">Add Vehicle Classes </p>
<form action="">
    <input type="text" name="add_vehicle" placeholder="" class="block w-48 mb-3 mt-2 py-1 px-3 border border-gray-300 bg-white rounded shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    <button class="bg-blue-300 rounded-lg drop-shadow-lg mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
</form>

<footer>

    <p><a class=" text-blue-500 underline" href="">view Full Vehicle List</a></p>

    <!-- Link to View/Edit Admin Vehicle Types Page -->
    <p><a class=" text-blue-500 underline" href="?action=list_types">view Vehicle Types List</a></p>

    <!-- Link to View/Edit Admin Vehicle Makes Page-->
    <p><a class=" text-blue-500 underline" href="?action=list_classes">View Vehicle Class List</a></p>
</footer>
<?php
include("../footer.php");
?>