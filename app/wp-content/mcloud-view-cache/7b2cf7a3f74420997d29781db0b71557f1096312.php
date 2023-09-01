<?php /** @var \MediaCloud\Plugin\Tools\ToolsManager $manager */ ?>


<?php
        /** @var \MediaCloud\Plugin\Tools\Network\NetworkSettings $settings */
        $settings = class_exists('\\MediaCloud\\Plugin\\Tools\\Network\\NetworkSettings') ? \MediaCloud\Plugin\Tools\Network\NetworkSettings::instance() : null;

        /** @var \MediaCloud\Plugin\Tasks\Task[] $tasks */
        $tasks = \MediaCloud\Plugin\Tasks\TaskManager::registeredTasks();
?>

<?php $__env->startSection('main'); ?>
    <?php if(!empty($manager->multisiteTools())): ?>
        <h2>Tools</h2>
        <?php $__currentLoopData = $manager->multisiteTools(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="ilab-settings-section ilab-settings-features">
            <h4><?php echo e($tool->toolInfo['name']); ?></h4>
            <p><?php echo $tool->toolInfo['description']; ?></p>
            <a class="button" href="<?php echo e(admin_url('admin.php?page='.$tool->optionsPage())); ?>">Launch Tool</a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if((empty($settings) || empty($settings->hideBatchTools)) && !empty($tasks)): ?>
        <h2>Batch Tools</h2>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskId => $taskClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty($taskClass::userTask())) continue; ?>
            <?php if(empty($taskClass::showInMenu())) continue; ?>
            <div class="ilab-settings-section ilab-settings-features">
                <h4><?php echo e($taskClass::title()); ?></h4>
                <?php if(!empty($taskClass::instructionView())): ?>
                <?php echo $__env->make($taskClass::instructionView(), ['description' => true], \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <a class="button" href="<?php echo e(admin_url('admin.php?page=mcloud-task-'.$taskClass::identifier())); ?>">Launch Tool</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../templates/sub-page', \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views/base/multisite-landing.blade.php ENDPATH**/ ?>