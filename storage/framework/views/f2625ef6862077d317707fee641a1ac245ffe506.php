<?php if($loggedin->level != 'admin' && $item['header'] == 'Daftar Pengguna'): ?>
    
<?php else: ?>
<li <?php if(isset($item['id'])): ?> id="<?php echo e($item['id']); ?>" <?php endif; ?> class="nav-header <?php echo e($item['class'] ?? ''); ?>">

    <?php echo e(is_string($item) ? $item : $item['header']); ?>


</li>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\v2\resources\views/vendor/adminlte/partials/sidebar/menu-item-header.blade.php ENDPATH**/ ?>