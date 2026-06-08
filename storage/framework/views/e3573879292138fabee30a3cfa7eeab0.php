<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Detail Product - SantriKoding.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 mb-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-md flex justify-center items-center">
                <img src="<?php echo e(asset('/storage/products/'.$product->image)); ?>" class="w-full rounded-md object-cover shadow-sm">
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-2 flex flex-col justify-between">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo e($product->title); ?></h3>
                    <hr class="mb-4 border-gray-200">
                    
                    <div class="flex space-x-6 mb-6">
                        <div>
                            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Price</span>
                            <span class="text-xl font-bold text-green-600"><?php echo e("Rp " . number_format($product->price, 2, ',', '.')); ?></span>
                        </div>
                        <div class="border-l border-gray-200 pl-6">
                            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Stock</span>
                            <span class="text-xl font-bold text-gray-700"><?php echo e($product->stock); ?></span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Description</span>
                        <div class="text-gray-600 leading-relaxed text-sm">
                            <?php echo $product->description; ?>

                        </div>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-100 pt-4">
                    <a href="<?php echo e(route('products.index')); ?>" class="inline-block bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded shadow transition duration-200 text-sm">
                        BACK TO LIST
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
</html><?php /**PATH /Users/macbookair2020/laravel-13/resources/views/products/show.blade.php ENDPATH**/ ?>