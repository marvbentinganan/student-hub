<script src="{{ asset('plugins/lobibox/js/notifications.js') }}"></script>
<script>
  function notify(msg, type, icon) {
    Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
        soundPath: '{{ asset('plugins/lobibox/sounds') }}/',
    });
    var d = "mini";
    Lobibox.notify(type, {
        size: d,
        rounded: false,
        msg: msg,
        icon: icon,
    });
  };
</script>
@if(Session::has('flash_message_success'))
  <script>
    notify('{{ Session::get('flash_message_success') }}', 'success', 'check icon');
  </script>
@endif
@if(Session::has('flash_message_info'))
  <script>
    notify('{{ Session::get('flash_message_info') }}', 'info', 'info icon');
  </script>
@endif
@if(Session::has('flash_message_error'))
  <script>
    notify('{{ Session::get('flash_message_error') }}', 'error', 'remove icon');
  </script>
@endif
