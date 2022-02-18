<meta charset="utf-8">
{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
<meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
<meta name="author" content="ThemeSelect">
<script src="{{asset('/app-assets/vendors/js/tables/jquery-1.12.3.js')}}" type="text/javascript"></script>
<script>
    $(function ()
    {
        siteUrl = '<?php echo URL::to('/') ?>/';
        // {{--itemSlug = '<?php echo AdminCommonHelper::$s3_images_slug; ?>';--}}

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>
