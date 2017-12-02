<script>
    /*
    |--------------------------------------------------------------------------
    | LISTS
    |--------------------------------------------------------------------------
    */

    // List Edit Row Trigger
    $(document).on("click", "#EditBtn", function(e){
        var id    = $('#EditId').val();
        var model = $('#ModelName').val();
        var route = "{{ url('vadmin') }}/"+model+"/"+id+"/edit";
        location.replace(route);
    });

    $(document).on('click', '#DeleteBtn', function(e) { 
        var id    = $('#RowsToDeletion').val();
        var model = $('#ModelName').val();
        var route = "{{ url('vadmin') }}/destroy_"+model;
        deleteAndReload(id, route, 'Cuidado!','Está seguro?');
    });

    // Pause Item
    
    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */
    // Delete Image
    
    $(document).on('click', '.Delete-Product-Img', function(e) {
        var id    = $(this).data('imgid');
        console.log(id);
        var route = "{{ url('vadmin') }}/destroy_product_image";
        deleteAndReload(id,route,"Atención","Desea eliminar esta imágen?");
    });

    // Product Catalogue Featured Image    
    $(document).ready(function() {
        $('#ChangeFeaturedImg').click(function(){
            $('#Single_Image').click();
        });       
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.Featured-Image-Container').attr('src', e.target.result);
                $('.ActionContainer').removeClass('Hidden');
            }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#Single_Image").change(function(){
        readURL(this);
        $('.UpdateAvatarForm').removeClass('Hidden');
    });
    

</script>