var host = "http://laravel.dev:8000/";



function save_user() {


    var name = $('#name_txt').val();
    var email = $('#email_txt').val();
    var age = $('#age_txt').val();
    var url = host + "ajax_save_user";

    $.ajax({

        url: url,
        data: {name: name, email: email, age: age},
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (response) {


        console.log(response.status);
    })


}


$(document).ready(function () {

    console.log("document ready");


    $("#regForm").submit(function (event) {
        event.preventDefault();
        var $form = $(this),
            data = $form.serialize(),
            url = host + "/ajaxRegister";
        console.log("registration form " + host);

        var email = $(this).find('input[name=email]').val();
        var password = $(this).find('input[name=password]').val();
        var rpassword = $(this).find('input[name=password_confirmation]').val();

        $.ajax({
            type: "POST",
            url: url,
            data: {email: email, password: password, rpassword: rpassword},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function (response) {

            response.error == 0 ? window.location(response.path) : function () {

                console.log("Error--> " + response.error);
                console.log("errors---> " + response.msg);


            }();


        });


    });


    $('#login_form').on('submit', function (e) {

        console.log("host --->" + host);
        console.log("login form submitted");
        e.preventDefault();


        var email = $(this).find('input[name=email]').val();
        var password = $(this).find('input[name=password]').val();

        $.ajax({
            type: "POST",
            url: host + 'ajaxLogin',
            data: {email: email, password: password},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function (response) {

            if (response.error == 0) {

                window.location.href = response.path;

            } else {

                console.log("errors---> " + response.msg);
                console.log("Error--> " + response.error);
            }


        });

    });
});


var auth_fn = {


    set_lang: function (lang) {

        $.ajax({
            type: "get",
            url: host + 'set_lang/' + lang,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (msg) {
                location.reload();
            }
        });
    },

    ajax_log: function () {


        var email = $()

        $.ajax({
            type: "post",
            url: host + 'ajaxLogin',
            data: {email: email, password: password},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (msg) {

                alert("errors--->" + msg.errors);
            }
        });
    },


};


var articles_fn = {


    add_art: function () {

        console.log("inside articles.blade");
        $('#add_art_form').on('submit', function (e) {

            console.log("ajax form clicked");
            e.preventDefault();
            var title = $('#titre').val();
            var price = $('#prix').val();
            console.log("price ----->" + price);
            $.ajax({
                type: "POST",
                url: host + 'add_art',
                data: {titre: title, prix: price},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (msg) {
                    $(".list-group").prepend("<li class='list-group-item'><b>" + msg.saved_title + "</b>" + msg.saved_price + "</li>");
                    console.log("success---->" + msg.saved_title);
                    console.log("success---->" + msg.saved_title);

                }
            });
        });

    },

    delete_art: function (id) {

        console.log("success----> article deleted");

    },
    update_art: function (id, data) {

        console.log("success");

    },
    get_art: function (id) {

        console.log("success");

    },
    get_all_arts: function () {

        console.log("success");

    }


};






