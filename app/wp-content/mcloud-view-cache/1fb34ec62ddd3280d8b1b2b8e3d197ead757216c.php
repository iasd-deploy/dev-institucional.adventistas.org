<?php /** @var string $taskClass */ ?>
<?php echo $__env->make('tasks.batch-info', [
    'instructionsView' => $taskClass::instructionView(),
    'commandLine' => 'wp mediacloud:storage unlink [--limit=<number>] [--offset=<number>] [--page=<number>]',
    'commandTitle' => 'Unlink From Cloud Storage',
    'commandLink'=> 'https://docs.mediacloud.press/articles/advanced-usage/command-line/unlink-from-cloud-storage',
    'warning' => $warning,
    'taskClass' => $taskClass
], \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views/tasks/batch/unlink-media-task.blade.php ENDPATH**/ ?>