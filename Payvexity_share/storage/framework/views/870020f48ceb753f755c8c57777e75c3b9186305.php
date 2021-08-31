
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', __('views.admin.company.invoice.index.title')); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
<div class="pull-right">
    <?php if(isAdmin()): ?>
    <a href="<?php echo e(route('admin.company.invoice.add')); ?>"><button type="button" class="btn btn-success">Add Invoice</button></a>
    <span data-href="/payvexitylive/admin/invoice/export/csv" id="export" class="btn btn-info btn-sm" onclick="exportTasks(event.target);">Export Csv</span>

    <?php endif; ?>
</div>
</div>
<div class="row table-responsive">
    <table class="table table-striped table-bordered dt-responsive nowrap" id="comapny_invoice" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_0')); ?></td>
                <td>Amount</td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_6')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_1')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_2')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_3')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_4')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_5')); ?></td>
                <td>Actions</td>
            </tr>
            <tr id="search_input">
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_0')); ?></td>
                <td>Amount</td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_6')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_1')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_2')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_3')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_4')); ?></td>
                <td><?php echo e(__('views.admin.company.invoice.index.table_header_5')); ?></td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="pull-right">

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script>
        var InvoiceUrl = '<?php echo e(route('admin.company.invoices.list')); ?>';
        function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <?php echo e(Html::script('assets/admin/js/invoice/index.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/invoice/index.blade.php ENDPATH**/ ?>