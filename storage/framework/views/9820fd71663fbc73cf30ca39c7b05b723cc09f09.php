

<?php $__env->startSection('title', 'Logs'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card shadow">
        <div class="PaymentTable_wrapper" style="background-color: #fff; border-radius: 12px; padding: 16px; border: 1px #a09d9d; box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .45)!important;">
            <table id="logs" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%; font-size: 11px !important;">
                <thead>
                    <tr>
                        <td>Sr.no</td>
                        <td>Customer Name</td>
                        <td>Category</td>
                        <td>Request Data</td>
                        <td>Response Data</td>
                        <td>Request at</td>
                    </tr>
                    <tr id="search_input">
                        <td>Sr.no</td>
                        <td>Customer Name</td>
                        <td>Category</td>
                        <td>Request Data</td>
                        <td>Response Data</td>
                        <td>Request at</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="log-request-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <pre lang="js" id="request-modal-data"></pre>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="log-response-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <pre lang="js" id="response-modal-data"></pre>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
    var LogRoute = '<?php echo e(route('admin.logs')); ?>';
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<?php echo e(Html::script('assets/admin/js/logs/index.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/logs/index.blade.php ENDPATH**/ ?>