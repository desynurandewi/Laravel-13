<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - SantriKoding.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10 mb-10 px-4">
        <div class="grid grid-cols-1">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">DATA PRODUCTS</h3>
                    <a href="<?php echo e(route('products.create')); ?>" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                        ADD PRODUCT
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left text-sm uppercase font-semibold">
                                <th class="px-4 py-3 border border-gray-200">IMAGE</th>
                                <th class="px-4 py-3 border border-gray-200">TITLE</th>
                                <th class="px-4 py-3 border border-gray-200">PRICE</th>
                                <th class="px-4 py-3 border border-gray-200">STOCK</th>
                                <th class="px-4 py-3 border border-gray-200 text-center" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <td class="px-4 py-3 text-center border border-gray-200">
                                        <img src="<?php echo e(asset('/storage/products/'.$product->image)); ?>" class="rounded w-32 mx-auto">
                                    </td>
                                    <td class="px-4 py-3 border border-gray-200 font-medium text-gray-900">
                                        <?php echo e($product->title); ?>

                                    </td>
                                    <td class="px-4 py-3 border border-gray-200">
                                        <?php echo e("Rp " . number_format($product->price, 2, ',', '.')); ?>

                                    </td>
                                    <td class="px-4 py-3 border border-gray-200">
                                        <?php echo e($product->stock); ?>

                                    </td>
                                    <td class="px-4 py-3 text-center border border-gray-200">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="flex justify-center space-x-2">
                                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="bg-gray-700 hover:bg-gray-800 text-white text-xs py-1 px-2 rounded shadow">SHOW</a>
                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="bg-blue-500 hover:bg-blue-600 text-white text-xs py-1 px-2 rounded shadow">EDIT</a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs py-1 px-2 rounded shadow">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center px-4 py-6 text-gray-500 border border-gray-200">
                                        Data Produk Belum Tersedia.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Menampilkan pesan sukses/gagal dari session flash data
        <?php if(session()->has('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL!',
                text: '<?php echo e(session('success')); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php elseif(session()->has('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'GAGAL!',
                text: '<?php echo e(session('error')); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>
    </script>

</body>
</html><?php /**PATH /Users/macbookair2020/laravel-13/resources/views/products/index.blade.php ENDPATH**/ ?>