
$('.btnClose').click(function(){
    $(this).parent().addClass('Hidden');
});


var searchFilters = $('#SearchFilters');
searchFilters.hide();

$('#SearchFiltersBtn').on('click', function(){
    searchFilters.toggle(100);
});