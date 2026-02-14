    <script>
        $(document).ready(function() {
            // Listen to changes in the select element
            $('.o_land_select6').on('change', function() {
                // Get the selected month value and cart ID
                var selectedMonth = $(this).val();
                var cartId = $(this).data('cart-id');
                $.ajax({
                    url: "{{ route('customer.checkOutProcess') }}",
                    method: 'POST',
                    data: {
                        month: selectedMonth,
                        cart_id: cartId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                        // Update the HTML on the page with the updated data
                        $('#updated-amount').html(response.data.totalAmount);
                    }
                });

                // Calculate the total amount for the selected cart
                var rentAmount = $('#rent-amount-' + cartId).text().replace(/[^\d]/g,
                    ''); // remove non-numeric characters from rent amount
                var totalAmount = rentAmount * selectedMonth;
                $('#total-amount-' + cartId).text('৳' + totalAmount);

                // Calculate the grand total amount for all carts
                var grandTotal = 0;
                $('.total-amount').each(function() {
                    var totalAmount = $(this).text().replace(/[^\d]/g,
                        ''); // remove non-numeric characters from total amount
                    grandTotal += parseInt(totalAmount);
                });
                $('#grand-total').text('৳' + grandTotal);
            });
        });
    </script>
