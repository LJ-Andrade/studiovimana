<script>
        /*
        |--------------------------------------------------------------------------
        | WHISH-LISTS
        |--------------------------------------------------------------------------
        */
 		// Add Article to WishList
        $(document).on("click", ".AddToFavs", function(e){
            e.preventDefault();
            var articleid  = $(this).data('id');
            var customerid = $(this).data('customerid');
            var favid      = $(this).data('favid');
            action         = 'show';
            displayButton  = $(this);
            addArticleToFavs(favid, articleid, customerid, action, displayButton);
        });

        // Remove Article from WishList
        $(document).on("click", ".RemoveFromFavs", function(e){
            e.preventDefault();
            var favid      = $(this).data('favid');
            action         = 'reload';
            removeArticleFromFavs(favid, action);
        });

        $(document).on("click", ".RemoveAllFromFavs", function(e){
            e.preventDefault();
            var customerid = $(this).data('customerid');
            action         = 'reload';
            removeArticlesFromFavs(customerid, action);
        });

        function addArticleToFavs(favid, articleid, customerid, action, displayButton){
            $.ajax({	
                url: "{{ route('customer.addArticleToFavs') }}",
                method: 'POST',             
                dataType: 'JSON',
                data: { fav_id: favid, client_id: customerid, article_id: articleid },
                success: function(data){
					$('#Error').html(data.responseText);
					console.log(data);
                    if(data.response == true && data.result == 'added'){
                        switch(action) {
                            case 'reload':
                                location.reload();
                                break;
                            case 'show':
                                displayButton.addClass('addedToFavs');
                                break;
                            case 'none':
                                console.log('Actualizado - Sin Acción');
                            default:
                                console.log('No hay acción');
                                break;
                        } 
                    } else if(data.response == true && data.result == 'removed') {
                            displayButton.removeClass('addedToFavs');
                    }  else {
                    $('#Error').html(data.message['errorInfo']);
                    console.log(data);
                    }
                },
                error: function(data){
                    $('#Error').html(data.responseText);
                    console.log(data);
                }
            });
        }

        function removeArticleFromFavs(favid, action){
            $.ajax({	
                url: "{{ route('customer.removeArticleFromFavs') }}",
                method: 'POST',             
                dataType: 'JSON',
                data: { fav_id: favid },
                success: function(data){
					$('#Error').html(data.responseText);
					console.log(data);
                    if(data.response == true){
                        switch(action) {
                            case 'reload':
                                location.reload();
                                break;
                            default:
                                console.log('No hay acción');
                                break;
                        } 
                    } else {
                    $('#Error').html(data.message['errorInfo']);
                    console.log(data);
                    }
                },
                error: function(data){
                    $('#Error').html(data.responseText);
                    console.log(data);
                }
            });
        }
        
        function removeArticlesFromFavs(customerid, action){
            console.log('iojd');
            $.ajax({	
                url: "{{ route('customer.removeAllArticlesFromFavs') }}",
                method: 'POST',             
                dataType: 'JSON',
                data: { customer_id: customerid },
                success: function(data){
					$('#Error').html(data.responseText);
					console.log(data);
                    if(data.response == true){
                        switch(action) {
                            case 'reload':
                                location.reload();
                                break;
                            default:
                                console.log('No hay acción');
                                break;
                        } 
                    } else {
                    $('#Error').html(data.message['errorInfo']);
                    console.log(data);
                    }
                },
                error: function(data){
                    $('#Error').html(data.responseText);
                    console.log(data);
                }
            });
        }
</script>