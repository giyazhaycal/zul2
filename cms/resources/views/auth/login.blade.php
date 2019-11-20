<?php require resource_path('views/layouts/inc/config.php'); ?>
<?php
// Specific Page Options
//$one->body_bg = $one->assets_folder . '/img/bg/photo28@2x.jpg';
$one->title = config('app.name').' Administrator Login';
?>
<?php require resource_path('views/layouts/inc/views/template_head_start.php'); ?>
<?php require resource_path('views/layouts/inc/views/template_head_end.php'); ?>

<!-- Lock Screen Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <!-- Lock Screen Block -->
            <div class="block block-themed animated bounceIn">
                <div class="block-header bg-primary">
                    <h3 class="block-title">Administrator Login</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Lock Screen Avatar -->
                    <div class="text-center push-15-t push-15">
                        <?php $one->get_avatar('10', '', 96); ?>
                    </div>
                    <!-- END Lock Screen Avatar -->

                    <!-- Lock Screen Form -->
                    <!-- jQuery Validation (.js-validation-lock class is initialized in js/pages/base_pages_lock.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-lock form-horizontal push-30-t push-30{{ $errors->has('email') ? ' has-error' : '' }}" method="post" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="email" id="lock-email" name="email" placeholder="Please enter your email" value="{{ old('email') }}" required />
                                    <label for="lock-email">Email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="password" id="lock-password" name="password" placeholder="Please enter your password" name="password" required />
                                    <label for="lock-password">Password</label>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-block btn-default" type="submit"> Login</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Lock Screen Form -->
                </div>
            </div>
            <!-- END Lock Screen Block -->
        </div>
    </div>
</div>
<!-- END Lock Screen Content -->

<!-- Lock Screen Footer -->
<div class="push-10-t text-center animated fadeInUp">
    <small class="text-black-op font-w600"><span class="js-year-copy"></span> &copy; <?php echo $one->name . ' ' . $one->version; ?></small>
</div>
<!-- END Lock Screen Footer -->

<?php require resource_path('views/layouts/inc/views/template_footer_start.php'); ?>

<?php require resource_path('views/layouts/inc/views/template_footer_end.php'); ?>