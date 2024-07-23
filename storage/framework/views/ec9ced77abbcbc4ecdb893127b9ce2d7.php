<div class="mt-4">
  
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(url('product')); ?>">Daftar Produk</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
    </ol>
  </nav>
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <form class="row g-3" wire:submit="store" enctype="multipart/form-data">
                <div class="col-md-6">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" wire:model="name">
                  <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2">
                        <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="col-md-6">
                  <label for="stock" class="form-label">Stok</label>
                  <input type="number" class="form-control" id="stock" wire:model="stock">
                  <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2">
                        <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="col-md-6">
                  <label for="cost_price" class="form-label">Harga Modal</label>
                  <input type="text" class="form-control" id="cost_price" wire:model="cost_price">
                  <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cost_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2">
                        <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="col-md-6">
                  <label for="harga_jual" class="form-label">Harga Jual</label>
                  <input type="text" class="form-control" id="harga_jual" wire:model="selling_price">
                  <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2">
                        <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
               
                <div class="col-md-12">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" wire:model="description"></textarea>
                </div>
                <div class="col-md-12">
                  <label for="description" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image" wire:model="image">
                  <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2">
                        <?php echo e($message); ?>

                    </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
               
                
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
        
            </div>
        </div>
    </div>
  </div>
   </div>
<?php /**PATH C:\bang yohan\kasir\resources\views/livewire/product-create.blade.php ENDPATH**/ ?>