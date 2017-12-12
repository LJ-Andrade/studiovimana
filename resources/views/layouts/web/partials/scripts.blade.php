<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.3.1.min.js')}} "></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/tether.min.js')}} "></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/bootstrap3/bootstrap.min.js')}} "></script>
<script type="text/javascript" src="{{ asset('plugins/wow/script.wow.js')}} "></script>
<script type="text/javascript" src="{{ asset('js/web.js') }} "></script>
<script>

    $(document).ready(function(){
        $(window).scroll(function(){
            if ($(window).scrollTop() > 500){
                $('.Contact-Tab').show(200);
            } else {
                $('.Contact-Tab').hide(200);
            }
        });
    });


</script>