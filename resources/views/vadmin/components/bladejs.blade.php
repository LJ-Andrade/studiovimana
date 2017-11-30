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

    $(document).on('click', '.Make-Thumb-Img', function(e) {
        var id    = $(this).data('imgid');
        console.log(id);
        var route = "{{ url('vadmin/catalog_make_thumb') }}/"+id+"";
        $.ajax({
			url: route,
			method: 'POST',             
			dataType: 'JSON',
			beforeSend: function(){
			},
			success: function(data){
				console.log(data);
			},
			error: function(data)
			{
                $('#Error').html(data.responseText);
				console.log(data);	
			},
			complete: function()
			{
			}
		});


    });

   

</script>