@extends('layouts.app')

@section('head_meta')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection

@section('content')
<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url({{ asset('assets/img/bg/photo28@2x.jpg') }});">
    <div class="push-50-t push-15">
        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
        <h2 class="h5 text-white-op animated zoomIn">Welcome {{ Auth::user()->name }}</h2>
    </div>	

</div>
<!-- END Page Header -->

<div class="content">
    <div class="row">
        
    </div>
</div>
@endsection

@section('footer_scripts')
<script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjsv2/Chart.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.5/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js" defer=""></script>
<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


@endsection