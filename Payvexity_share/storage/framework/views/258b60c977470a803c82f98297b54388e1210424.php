<?php $__env->startComponent('mail::message'); ?>
Hello **<?php echo e($name); ?>**,  
Thank you for choosing Payvexity!

Your account is registered with **Payvexity** with admin role assigned to  **<?php echo e($root); ?>**
<?php echo $body; ?>

Your account is associated with:
Email: <?php echo e($email); ?>


Sincerely,  
Payvexity team.
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/emails/company-create.blade.php ENDPATH**/ ?>