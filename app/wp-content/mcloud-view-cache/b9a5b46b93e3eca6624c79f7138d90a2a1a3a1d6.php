<?php $__env->startSection('main'); ?>
    <?php if (\MediaCloud\Plugin\Utilities\LicensingManager::ActivePlan('pro')): ?>
    <form action='edit.php?action=update_media_cloud_network_options' method='post' autocomplete="off">
	    <?php
	    settings_fields( $group );
	    ?>
        <div class="ilab-settings-section ilab-settings-features">
            <table class="form-table">
                    <tr>
                        <td class="toggle">
                            <div class="ic-Super-toggle--on-off">
                                <?php echo $__env->make('base/fields/checkbox', ['name' => 'mcloud-network-mode', 'value' => $networkMode, 'description' => '', 'conditions' => null], \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="title">
                                Network Mode
                            </div>
                        </td>
                        <td class="description">
                            <p>Turning this value on means that all sites in your network will share the same Media Cloud configuration.  Additionally, the individual sites will not be able to see or change this configuration.  The use of the plugin will be, for the most part, transparent to them.  They will still have access to certain batch tools and direct uploads.</p>
                        </td>
                    </tr>
            </table>
        </div>
        <div class="ilab-settings-button">
			<?php submit_button(); ?>
        </div>
    </form>
    <?php else: ?>
    <div class="upgrade-feature">
        <h2>Upgrade to Pro for Network Mode</h2>
        <p>Network mode in Media Cloud Pro provides more multisite features:</p>
        <ul>
            <li>All of the sites in your network can share the same Media Cloud configuration.</li>
            <li>Individual sites will not be able to see or change this configuration.</li>
            <li>Control access to the Storage Browser and other features.</li>
        </ul>
        <div class="button-container">
            <a href="<?php echo e(network_admin_url('admin.php?page=media-cloud-pricing')); ?>">Upgrade Now!</a>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../templates/sub-page', \MediaCloud\Vendor\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views/base/network.blade.php ENDPATH**/ ?>