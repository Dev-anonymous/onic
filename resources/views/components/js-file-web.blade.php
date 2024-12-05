<div class="scroll-to-top scroll-to-target" data-target=".header-top">
    <span class="icon fa fa-angle-up"></span>
</div>

<script src="{{ asset('ressources/plugins/jquery.js') }}"></script>
<script src="{{ asset('ressources/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('ressources/plugins/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('ressources/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('ressources/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<script src="{{ asset('ressources/plugins/validate.js') }}"></script>
<script src="{{ asset('ressources/plugins/wow.js') }}"></script>
<script src="{{ asset('ressources/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('ressources/plugins/timePicker.js') }}"></script>
<script src="{{ asset('ressources/js/script.js') }}"></script>
<script>
    $('#bcont').click(function() {
        console.log('ff');
        $("html, body").animate({
                scrollTop: $('#contact').offset().top
            },
            1200
        );
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Authorization': 'Bearer ' + localStorage.getItem('_t'),
            'Accept': 'application/json'
        }
    });
    $('[logout]').click(function() {
        event.preventDefault();
        var rl = $(this);
        rl.closest('li').html('<span class="bx bx-spin bx-loader ml-3 p-3"></span>');
        $.post('{{ route('auth-logout') }}', function() {
            location.reload();
        })
    })
</script>
