<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Inventory</title>
    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Form with dropdown -->
        <form class="mb-4">
            <label for="sortBy" class="block mb-2">Sort By:</label>
            <select id="sortBy" name="sortBy" class="block w-40 py-1 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="price">Price</option>
                <option value="year">Year</option>
            </select>
            <button class="bg-blue-300 rounded mt-3 mb-3 py-1 px-3" type="submit">Submit</button>
        </form>

        <!-- Responsive table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full overflow-scroll bg-teal-500 border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-900 text-white">
                        <th class=" px-4 py-2">Car Make</th>
                        <th class="px-4 py-2  border border-gray-200">Model</th>
                        <th class="px-4 py-2  border border-gray-200">Year</th>
                        <th class="px-4 py-2 border border-gray-200">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data, replace with actual data -->
                    <tr>
                        <td class="px-4 py-2 border border-gray-200">Toyota</td>
                        <td class=" px-4 py-2 border border-gray-200">Camry</td>
                        <td class="px-4 py-2 border border-gray-200">2018</td>
                        <td class="px-4 py-2 border border-gray-200">$20,000</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-200">Honda</td>
                        <td class="px-4 py-2 border border-gray-200">Civic</td>
                        <td class="px-4 py-2 border border-gray-200">2019</td>
                        <td class="px-4 py-2 border border-gray-200">$18,000</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border border-gray-200">Ford</td>
                        <td class="px-4 py-2 border border-gray-200">Fusion</td>
                        <td class="px-4 py-2 border border-gray-200">2020</td>
                        <td class="px-4 py-2 border border-gray-200">$22,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>