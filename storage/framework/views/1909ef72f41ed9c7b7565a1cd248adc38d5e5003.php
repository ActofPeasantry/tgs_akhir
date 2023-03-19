<?php if(isset($balance->id)): ?>
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Diterima</label>
        <input id="date_received" type="date" class="form-control <?php $__errorArgs = ['date_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_received"
        value="<?php echo e(old('date_received', $balance->date_received->format('Y-m-d'))); ?>"
        required autocomplete="date_received">

        <?php $__errorArgs = ['date_received'];
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

    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <input id="description" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description"
        value="<?php echo e(old('description', $balance->description)); ?>"
        required autocomplete="description">

        <?php $__errorArgs = ['description'];
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
        <label class="form-label" for="no_invoice">Nomor Invoice</label>

        <input id="no_invoice" type="number" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_invoice"
        value="<?php echo e(old('no_invoice', $balance->no_invoice)); ?>"
        required autocomplete="no_invoice">

        <?php $__errorArgs = ['no_invoice'];
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
        <label class="form-label" for="balance_category_id">Kategori</label>
        <select name="balance_category_id" id="balance_category_id" class="form-control">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php echo e(old('balance_category_id', $balance) === $value ? "selected" : ""); ?>><?php echo e($category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value="0" <?php echo e(old('debit_credit', $balance->debit_credit) == 0 ? "selected" : ''); ?>>Debet</option>
            <option value="1" <?php echo e(old('debit_credit', $balance->debit_credit) == 1 ? "selected" : ''); ?>>Kredit</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="total_amount">Jumlah Dana (Rp)</label>
        <input id="total_amount" type="number" class="form-control <?php $__errorArgs = ['total_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="total_amount"
        value="<?php echo e(old('total_amount', $balance->total_amount)); ?>"
        required autocomplete="total_amount">

        <?php $__errorArgs = ['total_amount'];
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
    <input type="hidden"  id="user_id" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
<?php else: ?>
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Diterima</label>
        <input id="date_received" type="date" class="form-control <?php $__errorArgs = ['date_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_received"
        value="<?php echo e(old('date_received')); ?>"
        required autocomplete="date_received">

        <?php $__errorArgs = ['date_received'];
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

    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <input id="description" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description"
        value="<?php echo e(old('description')); ?>"
        required autocomplete="description">

        <?php $__errorArgs = ['description'];
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
        <label class="form-label" for="no_invoice">Nomor Invoice</label>
        <input id="no_invoice" type="number" class="form-control <?php $__errorArgs = ['no_invoice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_invoice"
        value="<?php echo e(old('no_invoice')); ?>"
        required autocomplete="no_invoice">

        <?php $__errorArgs = ['no_invoice'];
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
        <label class="form-label" for="balance_category_id">Kategori</label>
        <select name="balance_category_id" id="balance_category_id" class="form-control">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($value); ?>><?php echo e($category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value=0>Debet</option>
            <option value=1>Kredit</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="total_amount">Jumlah Dana (Rp)</label>
        <input id="total_amount" type="number" class="form-control <?php $__errorArgs = ['total_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="total_amount"
        value="<?php echo e(old('total_amount')); ?>"
        required autocomplete="total_amount">

        <?php $__errorArgs = ['total_amount'];
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
    <input type="hidden"  id="user_id" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/include/balance_form.blade.php ENDPATH**/ ?>