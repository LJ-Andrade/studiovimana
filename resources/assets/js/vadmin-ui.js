
var searchFilters = $('#SearchFilters');
searchFilters.hide();

$('.btnClose').click(function(){
    $(this).parent().addClass('Hidden');
});
   

$('#SearchFiltersBtn').on('click', function(){
    searchFilters.removeClass('Hidden');
    searchFilters.show(100);
});