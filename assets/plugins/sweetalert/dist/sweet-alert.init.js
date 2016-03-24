
/**
* Theme: Moltran Admin Template
* Author: Coderthemes
* SweetAlert - 
* Usage: $.SweetAlert.methodname
*/

!function($) {
    "use strict";

    var base_url = window.location.origin;
    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {



        $('#tab-attribute').click(function(){
            if (!$('#idMenu').val()) {
                swal("Peringatan !","Silahkan isi menu terlebih dahulu",'warning');
            };
        });

        $('#tab-detail').click(function(){
            if (!$('#idMenu').val()) {
                swal("Peringatan !","Silahkan isi menu terlebih dahulu",'warning');
            };
        });

        $('#tab-combination').click(function(){
            if (!$('#idCatalog').val()) {
                swal("Peringatan !","Silahkan isi produk terlebih dahulu",'warning');
            };
        });

        $('#tab-quantity').click(function(){
            if (!$('#idCatalog').val()) {
                swal("Peringatan !","Silahkan isi produk terlebih dahulu",'warning');
            };
        });

    //Basic
    $('#sa-basic').click(function(){
        swal("Here's a message!");
    });

    //A title with a text under
    $('#sa-title').click(function(){
        swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
    });

    //Success Message
    $('#sa-success').click(function(){
        swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
    });

    //Warning Message
    $('#sa-warning').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
        });
    });

    //Parameter
    $('.sa-params').click(function(){
        var parent = $(this).data("id");
        swal({   
            title: "Apa anda yakin untuk menghapus modul ini?",   
            text: "Data dan folder modul akan terhapus serta tak bisa dikembalikan",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya, silahkan!",   
            cancelButtonText: "Batalkan!",   
            closeOnConfirm: false,   
            closeOnCancel: true 
        }, function() {
            $.ajax(
            {
                crossOrigin: true,
                crossDomain: true,
                headers: {
                 "Content-type" : "application/json"
             },
             type: "post",
             url: "http://localhost/cms/setting/module/delete/"+parent,
             data: parent,
             success: function(data){
             }
         })
            .done(function(data) {
                swal("Canceled!", 'Modul berhasil dihapus', "success");
            })
            .error(function(data) {
                swal("Oops", "We couldn't connect to the server!", "error");
            });
        });
});

$('.delete-user').click(function(e){
    var parent = $(this).data("id");
    swal({   
        title: "Apa anda yakin untuk menghapus modul ini?",   
        text: "Data dan folder modul akan terhapus serta tak bisa dikembalikan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya, silahkan!",   
        cancelButtonText: "Batalkan!",   
        closeOnConfirm: false,   
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    }, function() {
        $.ajax(
        {
            crossOrigin: true,
            crossDomain: true,
            headers: {
             "Content-type" : "application/json"
         },
         type: "post",
         url: "http://localhost:8080/karani/setting/user/delete/"+parent,
         data: parent,
         success: function(data){
         }
     })
        .done(function(data) {
            swal("Canceled!", 'User berhasil dihapus', "success");
            window.setTimeout(function(){location.reload()},2000);
        })
        .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
        });
    });
});

$('.delete-category').click(function(e){
    var parent = $(this).data("id");
    var module = $(this).data("module");
    var controller = $(this).data("controller");
    swal({   
        title: "Apa anda yakin untuk menghapus kategori ini?",   
        text: "Data kategori beserta data terkait seperti produk,dll akan terhapus serta tak bisa dikembalikan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya, silahkan!",   
        cancelButtonText: "Batalkan!",   
        closeOnConfirm: false,   
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    }, function() {
        $.ajax(
        {
            crossOrigin: true,
            crossDomain: true,
            headers: {
             "Content-type" : "application/json"
         },
         type: "post",
         url: base_url+"/karani/"+module+"/"+controller+"/delete/"+parent,
         data: parent,
         success: function(data){
         }
     })
        .done(function(data) {
            swal("Canceled!", 'Kategori berhasil dihapus'+data, "success");
            window.setTimeout(function(){location.reload()},2000);
        })
        .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
        });
    });
});

$('.delete').click(function(e){
    var parent = $(this).data("id");
    var module = $(this).data("module");
    var controller = $(this).data("controller");
    swal({   
        title: "Apa anda yakin untuk menghapus kategori ini?",   
        text: "Data beserta data terkait akan terhapus serta tak bisa dikembalikan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya, silahkan!",   
        cancelButtonText: "Batalkan!",   
        closeOnConfirm: false,   
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    }, function() {
        $.ajax(
        {
            crossOrigin: true,
            crossDomain: true,
            headers: {
             "Content-type" : "application/json"
         },
         type: "post",
         url: base_url+"/karani/"+module+"/"+controller+"/delete/"+parent,
         data: parent,
         success: function(data){
         }
     })
        .done(function(data) {
            swal("Canceled!", 'Data berhasil dihapus', "success");
            window.setTimeout(function(){location.reload()},2000);
        })
        .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
        });
    });
});

$('.delete-attribute').click(function(e){
    var parent = $(this).data("id");
    swal({   
        title: "Apa anda yakin untuk menghapus atribut ini?",   
        text: "Atribut beserta data di dalamnya akan terhapus serta tak bisa dikembalikan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Ya, silahkan!",   
        cancelButtonText: "Batalkan!",   
        closeOnConfirm: false,   
        closeOnCancel: true,
        showLoaderOnConfirm: true,
    }, function() {
        $.ajax(
        {
            crossOrigin: true,
            crossDomain: true,
            headers: {
             "Content-type" : "application/json"
         },
         type: "post",
         url: base_url+"/karani/catalog/attributes/delete/"+parent,
         data: parent,
         success: function(data){
         }
     })
        .done(function(data) {
            swal("Canceled!", 'Atribut berhasil dihapus'+data, "success");
            window.setTimeout(function(){location.reload()},2000);
        })
        .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
        });
    });
});

    //Custom Image
    $('#sa-image').click(function(){
        swal({   
            title: "Sweet!",   
            text: "Here's a custom image.",   
            imageUrl: "assets/sweet-alert/thumbs-up.jpg" 
        });
    });

    //Auto Close Timer
    $('#sa-close').click(function(){
       swal({   
        title: "Auto close alert!",   
        text: "I will close in 2 seconds.",   
        timer: 2000,   
        showConfirmButton: false 
    });
   });


},
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);