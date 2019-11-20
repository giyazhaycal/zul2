<?php require resource_path('views/layouts/inc/config.php'); ?>

@if(!empty($page_title))
	@php($one->title = $page_title.' - '.$one->title)
@endif

<?php require resource_path('views/layouts/inc/views/template_head_start.php'); ?>

@yield('head_meta')

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        'baseUrl' => url('/').'/',
        'webUrl' => env('WEB_BASE_URL')
    ]); ?>
</script>

<?php require resource_path('views/layouts/inc/views/template_head_end.php'); ?>
<?php require resource_path('views/layouts/inc/views/base_head.php'); ?>

@yield('content')

<?php require resource_path('views/layouts/inc/views/template_footer_start.php'); ?>
<?php require resource_path('views/layouts/inc/views/base_footer.php'); ?>

<!-- Small Modal -->
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Are you sure?</h3>
                </div>
                <div class="block-content">
                    <p><span id="modal-action">Remove</span> <span id="modal-confirm-caption"></span>?</p>
                </div>
            </div>
            <div class="modal-footer">
            	<form method="post">
            		{{ csrf_field() }}
            		<input type="hidden" name="cid" id="modal-confirm-cid" />
	                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
	                <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Small Modal -->

@yield('footer_scripts')

<script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<script type="text/javascript">

$(function(){

    @if(Session::has('notif'))
    jQuery.notify({
        icon: 'fa fa-check',
        message: '{{ Session::get('notif') }}',
        url: ''
    },
    {
        element: 'body',
        type: 'success',
        allow_dismiss: true,
        newest_on_top: true,
        showProgressbar: false,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: 20,
        spacing: 10,
        z_index: 1033,
        delay: 5000,
        timer: 1000,
        animate: {
            enter: 'animated fadeIn',
            exit: 'animated fadeOutDown'
        }
    });
    @elseif(Session::has('error'))
    jQuery.notify({
        icon: 'fa fa-close',
        message: '{{ Session::get('error') }}',
        url: ''
    },
    {
        element: 'body',
        type: 'danger',
        allow_dismiss: true,
        newest_on_top: true,
        showProgressbar: false,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: 20,
        spacing: 10,
        z_index: 1033,
        delay: 5000,
        timer: 1000,
        animate: {
            enter: 'animated fadeIn',
            exit: 'animated fadeOutDown'
        }
    });
    @endif

    $('.upload-preview').on('change',function(){
        var _this = $(this);
        var _this_input = $(this)[0];
        var img = _this.parents('.form-material').find('img');
        var video = _this.parents('.form-material').find('video');

        if (_this_input.files && _this_input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                // console.log(e.target)

                if (e.target.result.indexOf('data:video') >= 0) { // video
                    img.hide();
                    video.show();
                    video.find('source').attr('src', e.target.result);
                    video[0].load();
                    video[0].play();
                } else {
                    video.hide();
                    img.show();
                    img.attr('width',250);
                    img.attr('src', e.target.result);
                }
            }

            reader.readAsDataURL(_this_input.files[0]);
        }    
    });

    if( $('.js-dataTable-mineral').length) {

        $('.nav-main a').on('click',function(){
            $('.js-dataTable-mineral').DataTable().state.clear();
        });
    }
});
	
function mineral_confirm(caption,cid,action){
	$('#modal-confirm').find('#modal-confirm-caption').html(caption);
    $('#modal-confirm').find('#modal-confirm-cid').val(cid);
    if(action) {
    	$('#modal-confirm').find('#modal-action').html(action);
    }
	$('#modal-confirm').modal('show');
}

</script>

<?php require resource_path('views/layouts/inc/views/template_footer_end.php'); ?>

