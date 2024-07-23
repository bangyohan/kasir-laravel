<div class="mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
        </ol>
    </nav>

    <!-- Alert Message -->
    <div class="row mb-3">
        <div class="col-md-12">
            <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <!-- Product Management -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Action Buttons and Search Bar -->
                    <div class="row align-items-center mb-3">
                        <div class="col-md-8">
                            <a href="<?php echo e(url('product/create')); ?>" class="btn btn-primary">+ Tambah Produk</a>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input wire:model.live.debounce.300ms='search' type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                    </div>

                    <!-- Product Table -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga Modal</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo e($item->image_url); ?>" style="width: 80px; height: 80px;" class="img-fluid rounded" alt="Product Image" />
                                        </td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->stock); ?></td>
                                        <td><?php echo e(number_format($item->cost_price, 0, ',', '.')); ?></td>
                                        <td><?php echo e(number_format($item->selling_price, 0, ',', '.')); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?php echo e(url('product/edit', ['id' => $item->id])); ?>" class="btn btn-warning me-2">Edit</a>
                                                <button wire:click="destroy('<?php echo e($item->id); ?>')" class="btn btn-danger" onclick="return confirm('Yakin menghapus produk ini ?')">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination and Items Per Page -->
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Per Page</label>
                            <select wire:model.live='perPage' class="form-select" id="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-md-10">
                            <?php echo e($products->links('pagination::bootstrap-5')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\bang yohan\kasir\resources\views/livewire/product-list.blade.php ENDPATH**/ ?>