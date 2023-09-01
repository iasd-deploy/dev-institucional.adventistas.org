<?php /** @var string $taskClass */ ?>
<?php echo $__env->make('tasks.batch-info', [
    'instructionsView' => $taskClass::instructionView(),
    'warning' => $warning,
    'taskClass' => $taskClass
], \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views/tasks/batch/fix-metadata.blade.php ENDPATH**/ ?>