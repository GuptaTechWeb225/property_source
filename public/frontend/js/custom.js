function addToCart(property_id, amount) {
    console.log("add to cart calling ....");

    var adType = $('#advertisementType').val();
    if (adType == '') {
        return confirm('Please select advertisement type first!!');
    }
    var daterange = $('#daterange').val();
    var advertisementType = $('#advertisementType').val();
    if (advertisementType == 1) {
        if (daterange == '') {
            return confirm('Please select Date Range!!');
        }
    }


// return false;

    var type = $('#advertisementType').val();

    var daterange = $('#dateRange').val();

    const datesArray = daterange.split(' - ');
    console.log(datesArray);
    var formData = {
        property_id: property_id,
        type: type,
        amount: amount,
        start_date: datesArray[0],
        end_date: datesArray[1],
    };


    $.ajax({
        type: "post",
        dataType: "json",
        data: formData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/cart/store",
        success: function (data) {
            if (data.status == true) {
                // alert('added');
                // Toast.fire({
                //     icon: 'success',
                //     title: data.message
                // })
            } else {
                console.log(data);
                toastr.success("Property Already Added", "Success");
                // alert('error');
                // Toast.fire({
                //     icon: 'error',
                //     title: data.message
                // })
            }

            $(".cart-view").html(data.data.count);
            location.reload();
            toastr.success("Property Added Successfully", "Success");
        },
        error: function (data) {
            console.log(data);
            toastr.Error("Something Went Wrong", "Error");
        },
    });
}

//check property status
$('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
    console.log("Selected date range: " + picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
    var propertyID = $('#propertyID').val();
    var formData = {
        property_id: propertyID,
        start_date: picker.startDate.format('YYYY-MM-DD'),
        end_date: picker.endDate.format('YYYY-MM-DD'),
    };

    $.ajax({
        type: "post",
        dataType: "json",
        data: formData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/property/check",
        success: function (data) {
            console.log(data);
            if (data.status == 0) {
                $('#CheckoutBtn').removeClass('disabled_link');
                document.getElementById('addToCartBtn').classList.remove('disabled_link');


            } else {
                $('#CheckoutBtn').addClass('disabled_link');
                toastr.error("Property Not available within this Date.", "Error");
                document.getElementById('addToCartBtn').classList.add('disabled_link');

            }
        },
        error: function (data) {
            console.log(data);
            toastr.Error("Something Went Wrong", "Error");
        },
    });
});

function addToWishlist(property_id) {
    console.log("add to wishlist calling ....");

    var formData = {
        property_id: property_id,
    };
    $.ajax({
        type: "post",
        dataType: "json",
        data: formData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/wishlist/store",
        success: function (data) {
            if (data.status == true) {

                $(".wish-view").html(data.data.count);
                toastr.success("Property added to wishlist", "Success");

                setTimeout(function () {
                    location.reload();
                }, 3000);

            } else {

                toastr.error("Login require to added wishlist.", "Error");

            }


        },
        error: function (data) {
            console.log(data);
            toastr.Error("Something Went Wrong", "Error");
        },
    });
}


// ---------------------------------------------------------------- Language Start ----------------------------------------------------------------
$('.language-change').on('change', function (e) {
    e.preventDefault();
    var url = $('#url').val();
    var code = $(this).val();

    var formData = {
        code: code,
    }
    $.ajax({
        type: "GET",
        dataType: 'html',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url + '/languages/change',
        success: function (data) {
            location.reload();
        },
        error: function (data) {
        }
    });


});
// ---------------------------------------------------------------- Language End ----------------------------------------------------------------
