<?php
/**
 * base_footer.php
 *
 * Author: pixelcave
 *
 * The footer of each page (Backend)
 *
 */
?>
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
        <div class="pull-left">
            <a class="font-w600" href="https://www.mineral.co.id" target="_blank"><?php echo $one->name . ' ' . $one->version; ?></a> &copy; MINERAL <span class="js-year-copy"></span>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps Block -->
            <div class="block block-themed block-transparent">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Apps</h3>
                </div>
                <div class="block-content">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="base_pages_dashboard.php">
                                <div class="block-content text-white bg-default">
                                    <i class="si si-speedometer fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Backend</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="frontend_home.php">
                                <div class="block-content text-white bg-modern">
                                    <i class="si si-rocket fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Frontend</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Block -->
        </div>
    </div>
</div>
<!-- END Apps Modal -->

<script type="text/javascript">
    
jQuery(function(){
    jQuery('#easteregg').on('click',function(){
        
        jQuery('#easteregg_text').text('Click again!');

        var _obj = $(this);
        var arr = ['bounce','flash','pulse','rubberBand','shake','swing','tada','wobble'];
        var rand = arr[Math.floor(Math.random() * arr.length)];

        jQuery.each(arr,function(i,v){
            _obj.removeClass(v);
        });

        _obj.addClass(rand);
    });
});

</script>
