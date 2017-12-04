// ------------ Tags ------------ //
$('.Select-Tags').chosen({
    placeholder_text_multiple: 'Seleccione las etiquetas',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado la etiqueta'
});

$('.Select-Atribute').chosen({
    placeholder_text_multiple: 'Seleccionar',
    // max_selected_options: 3,
    search_contains: true,
    no_results_text: 'No se ha encontrado'
});

$('.Select-Category').chosen({
    placeholder_text_single: 'Seleccione una categoría',
});

$('.Select-Chosen').chosen({
    placeholder_text_single: 'Seleccione una categoría',
});

// --------- Slug sanitizer -------- //
$(".SlugInput").keyup(function(){
    var Text     = $(this).val();
    Text         = Text.toLowerCase();
    var regExp   = /\s+/g;
    Text         = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g,'');
    Text         = Text.replace(regExp,'-');
    Text         = Text.replace('ñ', 'n') ;
    Text         = Text.replace('á', 'a') ;
    Text         = Text.replace('é', 'e') ;
    Text         = Text.replace('í', 'i') ;
    Text         = Text.replace('ó', 'o') ;
    Text         = Text.replace('ú', 'u') ;
    
    $(".SlugInput").val(Text);   
});

// --------- Slug AutoFillnput from title --------- //
$("#TitleInput").keyup(function(event) {
    var stt = $(this).val();
    var Text     = $(this).val();
    Text         = Text.toLowerCase();
    var regExp   = /\s+/g;
    Text         = Text.replace(/[&\/\\#,¡!´#+()$~%.'":*?<>{}]/g,'');
    Text         = Text.replace(regExp,'-');
    Text         = Text.replace('ñ', 'n') ;
    Text         = Text.replace('á', 'a') ;
    Text         = Text.replace('é', 'e') ;
    Text         = Text.replace('í', 'i') ;
    Text         = Text.replace('ó', 'o') ;
    Text         = Text.replace('ú', 'u') ;
    $(".SlugInput").val(Text);   
});

// $(document).ready(function() {
// 	$('#Multi_Images').filer({
// 		// limit: 3,
// 		maxSize: 3,
// 		extensions: ['jpg', 'jpeg', 'png', 'gif'],
// 		changeInput: true,
// 		showThumbs: true,
// 		addMore: true
// 	});
// });

//////////////////////////////
// 							//
//      CREATE FORM         //
//                          //
//////////////////////////////

// Show Notes Text Area
$('.ShowNotesTextArea').click(function(){
    var notes = $('.NotesTextArea');
    if (notes.hasClass('Hidden')){
        notes.removeClass('Hidden');
    } else {
        notes.addClass('Hidden');
    }
});

// Add Another Address
$('.AddAnotherAddressBtn').click(function(){
    var addressInput = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";
    var locInput     = "<input class='form-control' placeholder='Ingrese otro teléfono' name='deliveryaddress[]' type='text' style='margin-top:5px'>";

    $('.AnotherAddress').append(addressInput);
    $('.AnotherLoc').append(locInput);
});


//////////////////////////////
// 							//
//   EDITORS AND FIELDS     //
//                          //
//////////////////////////////

$('#Multi_Images').fileuploader({
    extensions: ['jpg', 'jpeg', 'png', 'gif'],
    limit: null,
    addMore: true,
    maxSize: 1,
    captions: {
        button: function(options) { return 'Seleccionar ' + (options.limit == 1 ? 'Imágenes' : 'Imágen'); },
        feedback: function(options) { return 'Agregar imágenes...'; },
        feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? ' imágenes seleccionadas' : ' imágen seleccionada'); },
        drop: 'Arrastre las imágenes aquí',
        paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
        removeConfirmation: 'Eliminar?',
        errors: {
            filesLimit: 'Solo es posible subir ${limit} imágen.',
            filesType: 'Solo se aceptan los formatos: ${extensions}.',
            fileSize: '${name} es muy grandes! Seleccione una de ${fileMaxSize}MB. como máximo',
            filesSizeAll: '${name} son muy grandes! Seleccione unas de ${fileMaxSize}MB. como máximo',
            fileName: 'La imágen con el nombre ${name} ya está seleccionada.',
            folderUpload: 'No está permitido subir carpetas.'
        },
        dialogs: {
            // alert dialog
            alert: function(text) {
                return alert_confirm(text);
            },
            // confirm dialog
            confirm: function(text, callback) {
                'confirm(text) ? callback() : null;'
            }
        },
    }
});

$('#Single_Image').fileuploader({
    extensions: ['jpg', 'jpeg', 'png'],
    limit: 1,
    addMore: false,
    captions: {
        button: function(options) { return 'Seleccionar ' + (options.limit == 1 ? 'Imágen' : 'Imágen'); },
        feedback: function(options) { return 'Agregar imágenes...'; },
        feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? ' imágenes seleccionadas' : ' imágen seleccionada'); },
        drop: 'Arrastre las imágenes aquí',
        paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
        removeConfirmation: 'Eliminar?',
        errors: {
            filesLimit: 'Solo es posible subir ${limit} imágen.',
            filesType: 'Solo se aceptan los formatos: ${extensions}.',
            fileSize: 'La imágen pesa mucho! Elija una de ${fileMaxSize}MB como máximo.',
            fileName: 'La imágen con ese nombre ya ha sido elegida',
            folderUpload: 'No está permitido subir carpetas.',
        },
        dialogs: {
            // alert dialog
            alert: function(text) {
                return alert(text);
            },
            // confirm dialog
            confirm: function(text, callback) {
                'confirm(text) ? callback() : null;'
            }
        },
    }
});
