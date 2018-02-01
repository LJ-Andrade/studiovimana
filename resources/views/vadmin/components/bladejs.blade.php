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
    | UPDATE MODIFICABLE INPUTS UI
    |--------------------------------------------------------------------------
    */

    // Modificable Stock Input
    $('.Modificable-Stock-Input').click(function(){
        var actualElement = $(this);
        modificableInput(actualElement, ".DisplayStockData", ".UpdateStockBtn");
    });

    // Modificable Price Input
    $('.Modificable-Price-Input').click(function(){
        var actualElement = $(this);
        modificableInput(actualElement, ".DisplayPriceData", ".UpdatePriceBtn");
    });

    // Modificable Discount Input
    $('.Modificable-Discount-Input').click(function(){
        var actualElement = $(this);
        modificableInput(actualElement, ".DisplayDiscountData", ".UpdateDiscountBtn");
    });

    function modificableInput(actualElement, displayDiv, btn){
        // Show All Display Items
        $(".DisplayPriceData").removeClass('Hidden');
        $(".DisplayStockData").removeClass('Hidden');
        $(".DisplayDiscountData").removeClass('Hidden');
        $(".Extra-Data").removeClass('Hidden');
        // Hide All Unused Items
        $(".UpdatePriceBtn").addClass('Hidden');
        $(".UpdateStockBtn").addClass('Hidden');
        $(".UpdateDiscountBtn").addClass('Hidden');
        $("Input").addClass('Hidden');
        $(btn).addClass('Hidden');

        var button    = actualElement.children(btn);
        var display   = actualElement.children(displayDiv);
        var data      = actualElement.children(displayDiv).html();
        var input     = actualElement.children("Input");
        var extraData = actualElement.children(".Extra-Data");

        extraData.addClass("Hidden");
        display.addClass("Hidden");
        button.removeClass('Hidden');
        input.removeClass("Hidden");
        input.focus();
        input.val(data);
        //input.attr("placeholder", data);
    }

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    // UPDATE TRIGGERS

    // Update Stock -------------------------------------------------------
    $(".UpdateStockInput").on("keypress", function(e) {
        if(e.which == 13) {
            $(this).siblings('.UpdateStockBtn').click();
        }
    });

    $(".UpdateStockBtn").click(function(){
        var id     = $(this).data('id');
        var route  = "{{ url('vadmin/update_catalog_stock') }}/"+id+"";
        var value  = $(this).siblings(".UpdateStockInput").val();
        $(this).siblings(".DisplayData").removeClass("Hidden");
        $(this).siblings(".DisplayData").removeClass("Hidden");
        $(this).siblings(".DisplayData").html(value);
        var action = "reload";
        if(validateInt(value)){
            var loader = $(this).parent().html("<img src='{{ asset('images/gral/loader-sm.svg') }}'>");
            updateStock(route, id, value, action, loader);
        }
    });

    // Update Price -------------------------------------------------------
    $(".UpdatePriceInput").on("keypress", function(e) {
        if(e.which == 13) {
            $(this).siblings('.UpdatePriceBtn').click();
        }
    });

    $(".UpdatePriceBtn").click(function(){
        var id     = $(this).data('id');
        var route  = "{{ url('vadmin/update_catalog_price') }}/"+id+"";
        var value  = $(this).siblings(".UpdatePriceInput").val();
        $(this).siblings(".DisplayPriceData").removeClass("Hidden");
        $(this).siblings(".DisplayPriceData").removeClass("Hidden");
        $(this).siblings(".DisplayPriceData").html(value);
        var action = "reload";
        if(validateIntOrFloat(value)){
            var loader = $(this).parent().html("<img src='{{ asset('images/gral/loader-sm.svg') }}'>");
            updatePrice(route, id, value, action, loader);
        }
    });

    // Update Discount -------------------------------------------------------
    $(".UpdateDiscountInput").on("keypress", function(e) {
        if(e.which == 13) {
            $(this).siblings('.UpdateDiscountBtn').click();
        }
    });

    $(".UpdateDiscountBtn").click(function(){
        var id     = $(this).data('id');
        var route  = "{{ url('vadmin/update_catalog_discount') }}/"+id+"";
        var value  = $(this).siblings(".UpdateDiscountInput").val();
        $(this).siblings(".DisplayDiscountData").removeClass("Hidden");
        $(this).siblings(".DisplayDiscountData").removeClass("Hidden");
        $(this).siblings(".DisplayDiscountData").html(value);
        var action = "reload";
        if(validateIntOrFloat(value)){
            var loader = $(this).parent().html("<img src='{{ asset('images/gral/loader-sm.svg') }}'>");
            updateDiscount(route, id, value, action, loader);
        }
    });

    // Delete Image -------------------------------------------------------
    $(document).on('click', '.Delete-Product-Img', function(e) {
        var id    = $(this).data('imgid');
        console.log(id);
        var route = "{{ url('vadmin') }}/destroy_product_image";
        deleteAndReload(id,route,"Atención","Desea eliminar esta imágen?");
    });

    $(document).on('click', '.Delete-Porfolio-Img', function(e) {
        var id    = $(this).data('imgid');
        var route = "{{ url('vadmin') }}/destroy_portfolio_image";
        // console.log(id + ' | ' + route);
        deleteAndReload(id,route,"Atención","Desea eliminar esta imágen?");
    });

    // Product Catalogue Featured Image ------------------------------------
    $(document).ready(function() {
        $('#ChangeFeaturedImg').click(function(){
            $('#ThumbnailUploader').click();
        });       
    
        // Change Thumbnail image and file input
        function readURL(input) {

            var fileTypes = ['jpg', 'jpeg', 'png']; 
            if (input.files && input.files[0]) {
                // Validate extensions
                var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
                isSuccess = fileTypes.indexOf(extension) > -1;

                if (isSuccess) { //yes
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.Featured-Image-Container').attr('src', e.target.result);
                        $('.ActionContainer').removeClass('Hidden');
                    }  
                    reader.readAsDataURL(input.files[0]);
                } else {
                    swal(
                        'Ups',
                        'No se acepta ese tipo de archivo',
                        'error'
                    );
                    $('#ThumbnailUploader').val('');
                }  
            }
        }
        $("#ThumbnailUploader").change(function(){
            readURL(this);
        });
    });

    /*
    |--------------------------------------------------------------------------
    | CUSTOMERS
    |--------------------------------------------------------------------------
    */
    
    //$('.ModifyPassword').css('display', 'none');

    /*
    |--------------------------------------------------------------------------
    | UPDATES
    |--------------------------------------------------------------------------
    */

    // Update Status ---------------------------------------------------------
    function updateStatus(id, route, status, user, action)
	{
		$.ajax({	
			url: route,
			method: 'POST',             
			dataType: 'JSON',
			data: { id: id, status: status, user: user },
			success: function(data){
                if(data.response == true){
                    switch(action) {
                        case 'reload':
                            location.reload();
                            break;
                        case 'show':
                            console.log('Mostrar algo');
                            break;
                        case 'none':
                            console.log('Actualizado - Sin Acción');
                        default:
                            console.log('No hay acción');
                            break;
                    }   
                } 
			},
			error: function(data){
                //$('#Error').html(data.responseText);
                console.log(data);
			}
		});
	}

    // Update Stock  ---------------------------------------------------------
    function updateStock(route, id, value, action, loader){
        var data = { route: route, id: id, value: value, action: action};
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            beforeSend: function(){
                loader;
            },
            success: function(data){
                if(data.action == "reload"){
                    location.reload();
                }
            },
            error: function(data){
                console.log(data);
                //$('#Error').html(data.responseText);
            }
        }); 
    }

    // Update Price  ---------------------------------------------------------
    function updatePrice(route, id, value, action, loader){
        var data = { route: route, id: id, value: value, action: action};
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            beforeSend: function(){
                loader;
            },
            success: function(data){
                console.log(data);
                if(data.action == "reload"){
                    location.reload();
                }
            },
            error: function(data){
                console.log(data);
                //$('#Error').html(data.responseText);
            }
        }); 
    }

    // Update Discount  ---------------------------------------------------------
    function updateDiscount(route, id, value, action, loader){
        var data = { route: route, id: id, value: value, action: action};
        $.ajax({
            url: route,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            beforeSend: function(){
                loader;
            },
            success: function(data){
                console.log(data);
                if(data.action == "reload"){
                    location.reload();
                }
            },
            error: function(data){
                console.log(data);
                //$('#Error').html(data.responseText);
            }
        }); 
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATIONS
    |--------------------------------------------------------------------------
    */

    function validateIntOrFloat(value){
        if(parseInt(value) == value){
            return true;
            }
            else if(parseFloat(value) == value){
                return true;
            }
            else{
                alert_error('Ups','Debe ingresar un número');
                return false;
        } 
    }

    function validateInt(value){
        if(parseInt(value) == value){
            return true;
            }
            else if(parseFloat(value) == value){
                alert_error('Ups','Debe ingresar un número entero');
                return false;
            }
            else{
                alert_error('Ups','Debe ingresar un número');
                return false;
        } 
    }
    

    /*
    |--------------------------------------------------------------------------
    | ALERTS
    |--------------------------------------------------------------------------
    */

    function alert_ok(bigtext, smalltext){
        swal(
            bigtext,
            smalltext,
            'success'
        );    
    }
        
    function alert_error(bigtext, smalltext){
        swal(
            bigtext,
            smalltext,
            'error'
        );
    }

    function alert_info(bigtext, smalltext){

        swal({
                title: bigtext,
            type: 'info',
            html: smalltext,
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText:
                '<i class="ion-checkmark-round"></i> Ok!'
            });
    }


</script>