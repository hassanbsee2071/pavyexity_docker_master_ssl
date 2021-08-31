

<?php $__env->startSection('title', __('views.admin.company.index.title')); ?>

<?php $__env->startSection('content'); ?>

<div class="row pull-right">
    <a href="<?php echo e(route('admin.company.add')); ?>"><button type="button" class="btn btn-success">Add Company</button></a>
</div>
<div id="companyFieldList">
        <div class="mb-4">
            <div class="">
                <h3>Fields to display</h3>
                
                <div class="list_view">
                <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="0" checked> Email </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="1" checked> Phone </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="2" checked> Company admin </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="3" checked> Company name </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="4" > EIN </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="5" > Address </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="6" > API Key </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="7" > API user </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="8" > Accept Payment </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="9" checked> Created at </label>
                    <label style="font-size: 16px; margin-right: 6px;"><input type="checkbox" name="list" data-target="10" checked> Action </label>
                </div><br>
                
            </div>
        </div>
    </div>
<div class="row" >

    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" id="CompanyTable"
           width="100%">
        <thead>
            <tr>
                <th>Email</th>
                <th>Phone</th>
                <th>Company admin</th>
                <th>Company name</th>
                <th>EIN</th>
                <th>Address</th>
                <th>API Key</th>
                <th>API user</th>
                <th>Accept Payment</th>
                <th>Created at</th>
                <!-- <th>Actions</th> -->
            </tr>
            <tr id="search">
                <td>Email</td>
                <td>Phone</td>
                <td>Company admin</td>
                <td>Company name</td>
                <td>EIN</td>
                <td>Address</td>
                <td>API Key</td>
                <td>API user</td>
                <td>Accept Payment</td>
                <td>Created at</td>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <!-- <tfoot>
            <tr>
                <td>Email</td>
                <td>Phone</td>
                <td>Company admin</td>
                <td>Company name</td>
                <td>Address</td>
                <td>Created at</td>
                <td>Accept Payment</td>
            </tr>
        </tfoot> -->
    </table>
    <script>
    </script>
    <div class="pull-right">
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
var CompanySettingList = '<?php echo e(route('admin.company')); ?>';

</script>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##

<?php echo e(Html::script('assets/admin/js/company/add.js')); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\dev_repos\payvexity\resources\views/admin/company/index.blade.php ENDPATH**/ ?>