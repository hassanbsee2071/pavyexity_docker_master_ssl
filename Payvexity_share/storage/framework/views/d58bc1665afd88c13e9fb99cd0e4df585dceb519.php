<?php $__env->startComponent('mail::message'); ?>
Hello **<?php echo e($name); ?>**,  
Thank you for choosing Payvexity!

Your account is registered with **Payvexity** by <?php echo e($sender); ?>


Your account details are:
**Email**: <?php echo e($email); ?>

**Password**: <?php echo e($password); ?>


You can click this button to use your login
<?php $__env->startComponent('mail::button', ['url' => $link]); ?>
Login
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Sincerely,  
Payvexity team.
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/emails/account-create.blade.php ENDPATH**/ ?>