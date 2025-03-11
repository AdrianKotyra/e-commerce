

getTotal()

// first double check if total amount exists on the server if yes display paypal button

function getTotal() {
    return new Promise((resolve, reject) => {
        const data = "";
        SendDataAjax(data, "paypal/get_total_ajax.php")
            .then(response => {
                const total = parseInt(response, 10); // Ensure total is an integer
                if (isNaN(total) || total <= 0) {
                    reject("Invalid total amount received.");
                } else {
                    resolve(total);
                    paypal.Buttons({

                        createOrder: function (data, actions) {

                            return   actions.order.create({
                                purchase_units: [
                                    {
                                        amount: {
                                            value: total,
                                            currency_code: 'GBP',
                                        },
                                    },
                                ],
                            }) ;


                        },
                        onApprove: function (data, actions) {
                            // Handle when the payment is approved
                            return actions.order.capture().then(function (details) {



                                // Get payer's details
                                const payerName = details.payer.name.given_name + ' ' + details.payer.name.surname;
                                const payerEmail = details.payer.email_address;
                                const payerID = details.payer.payer_id;
                                const payerPhone = details.payer.phone ? details.payer.phone.phone_number.national_number : '';
                                const payerCountry = details.payer.address.country_code;

                                // shipping address details:
                                const shippingAddress = details.purchase_units[0].shipping.address;
                                const shippingStreet = shippingAddress.address_line_1;
                                const shippingCity = shippingAddress.admin_area_2;
                                const shippingState = shippingAddress.admin_area_1;
                                const shippingPostalCode = shippingAddress.postal_code;
                                const shippingCountry = shippingAddress.country_code;

                                // Get transaction details
                                const transaction = details.purchase_units[0].payments.captures[0];
                                const transactionID = transaction.id;
                                const transactionStatus = transaction.status;
                                const transactionAmount = transaction.amount.value;
                                const transactionCurrency = transaction.amount.currency_code;
                                const transactionTime = transaction.create_time;


                                // -----------------paypal--------------ajax sql
                                $.ajax({
                                    method: "POST",
                                    url: "paypal/paypal_ajax.php",
                                    data: {
                                        transaction_id: transactionID,
                                        transaction_status: transactionStatus,
                                        transaction_amount: transactionAmount,
                                        transaction_currency: transactionCurrency,
                                        transaction_time: transactionTime,

                                        payer_name: payerName,
                                        payer_email: payerEmail,
                                        payer_id: payerID,
                                        payer_phone: payerPhone,
                                        payer_country: payerCountry,

                                        shipping_street: shippingStreet,
                                        shipping_city: shippingCity,
                                        shipping_state: shippingState,
                                        shipping_postal_code: shippingPostalCode,
                                        shipping_country: shippingCountry
                                    },
                                    success: function(response) {
                                        if (response == 1) {
                                            displayModalTranscation(payerName);
                                        } else {
                                            alert('Failed to process payment');
                                            console.log(response);
                                        }
                                    }
                                });


                                displayModalTranscation(payerName);
                            });
                        },


                        onError: function (error) {
                            // Handle errors and display an error message to the user
                            console.log(error);
                            alert(error + 'An error occurred while processing the payment. Please try again later.');
                        },
                    })
                    .render('#paypal-button-container');
                    // Render the PayPal button in the specified container




                }
            })
            .catch(error => {
                reject("Error fetching total: " + error);
            });
    });
}
