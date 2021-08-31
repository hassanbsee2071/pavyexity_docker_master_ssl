<?php $__env->startComponent('mail::message'); ?>
Hello **<?php echo e($name); ?>**,  
Thank you for choosing Payvexity!

You have received recurring payment from **<?php echo e($sender); ?>** 

Your Recurring Payment amount is **<?php echo e($amount); ?>** 

Your Recurring Payment type is **<?php echo e($type); ?>** 


Sincerely,  
Payvexity team.
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/emails/payment-receive-2-rec.blade.php ENDPATH**/ ?>