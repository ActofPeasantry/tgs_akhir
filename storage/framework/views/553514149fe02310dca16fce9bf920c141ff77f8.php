<?php if(isset($asset->id)): ?>
    <div class="form-group col-mb-3">
        <label class="form-label" for="asset_name">Nama Aset</label>
        <input id="asset_name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="asset_name"
        value="<?php echo e(old('asset_name', $asset->asset_name)); ?>"
        required autocomplete="asset_name">

        <?php $__errorArgs = ['asset_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="asset_categories_id">Jenis Aset</label>
        <select name="asset_categories_id" id="asset_categories_id" class="form-control">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php echo e(old('asset_categories_id', $asset) === $value ? "selected" : ""); ?>><?php echo e($category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <input type="hidden"  id="user_id" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
<?php else: ?>
    <div class="form-group col-mb-3">
        <label class="form-label" for="asset_name">Nama Aset</label>
        <input id="asset_name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="asset_name"
        value="<?php echo e(old('asset_name')); ?>"
        required autocomplete="asset_name">

        <?php $__errorArgs = ['asset_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="asset_categories_id">Jenis Aset</label>
        <select name="asset_categories_id" id="asset_categories_id" class="form-control">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($value); ?>><?php echo e($category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <input type="hidden"  id="user_id" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/include/asset_form.blade.php ENDPATH**/ ?>