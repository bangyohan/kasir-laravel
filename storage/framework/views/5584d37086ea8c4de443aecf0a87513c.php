<div class="row mt-4 mb-4">
    <div class="col-lg-8 mt-2">
        <!-- Search Bar -->
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input wire:model.live.debounce.300ms='search' type="text" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>

        <!-- Products List -->
        <div class="row">
            <?php if(count($products) > 0): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:click="updateCart('<?php echo e($item->id); ?>')" class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="card h-100">
                            <img src="<?php echo e(Str::startsWith($item->image, ['http://', 'https://']) ? $item->image : asset('/storage/product/' . $item->image)); ?>" class="card-img-top" alt="Product Image" style="height: 120px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($item->name); ?></h5>
                                <p class="card-text"><?php echo e($item->selling_price_formatted); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <div class="col-12 mt-4">
                    <div class="alert alert-danger text-center" role="alert">
                        Produk masih kosong, input produk terlebih dahulu.
                    </div>
                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <?php echo e($products->links('pagination::bootstrap-5')); ?>

        </div>
    </div>

    <!-- Cart and Order Summary -->
    <div class="col-lg-4 mt-2">
        <div class="card h-100">
            <div class="card-header text-center">
                <!--[if BLOCK]><![endif]--><?php if($order): ?>
                    Code Pesanan : <?php echo e($order->invoice_number); ?>

                <?php else: ?>
                    Aplikasi Kasir
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="card-body">
                <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                    <div class="alert alert-success text-center">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($order): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <img src="<?php echo e(Str::startsWith($item->product->image, ['http://', 'https://']) ? $item->product->image : asset('/storage/product/' . $item->product->image)); ?>" style="width: 80px; height: 80px;" />
                                <div>
                                    <span><?php echo e($item->product->name); ?></span><br>
                                    <span class="text-muted"><?php echo e($item->product->selling_price_formatted); ?></span>
                                </div>
                                <div class="d-flex align-items-center me-2">
                                    <button class="btn btn-sm btn-warning me-2" wire:click="updateCart('<?php echo e($item->product->id); ?>', false)">-</button>
                                    <span><?php echo e($item->quantity); ?></span>
                                    <button class="btn btn-sm btn-primary ms-2" wire:click="updateCart('<?php echo e($item->product->id); ?>')">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php if(count($products) > 0): ?>
                        <div class="text-center">
                            <p>Keranjang masih kosong</p>
                            <button wire:click="createOrder()" class="btn btn-primary btn-block">Mulai Transaksi</button>
                        </div>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($total_price != 0): ?>
                    <h4 class="text-center mt-3">Total : Rp <?php echo e(number_format($total_price, 0, ',', '.')); ?></h4>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </div>

            <!--[if BLOCK]><![endif]--><?php if($order): ?>
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Pembayaran
                    </button>
                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" wire:submit.prevent="done">
                        <div class="col-md-12">
                            <label for="paid_amount" class="form-label">Uang yang dibayarkan</label>
                            <input type="number" class="form-control" id="paid_amount" wire:model="paid_amount">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['paid_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mt-2"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\bang yohan\kasir\resources\views/livewire/pos.blade.php ENDPATH**/ ?>