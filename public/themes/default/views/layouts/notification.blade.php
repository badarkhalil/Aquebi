$(document).ready(function(){
  $.notify({
    // Oprions
    icon: 'fas fa-{{ $icon ?? 'paw' }}',
    title: "<strong>{{ trans('theme.' . $type) }}:</strong> ",
    message: '{{ $message ?? '' }}'
  },{
    // Settings
    type: '{{ $type ?? 'info' }}',
    delay: 400,
    placement: {
      from: "bottom",
      align: "center"
    }
  });
});
