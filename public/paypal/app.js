

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
                                // Show a success message to the user
                                const transaction = details.purchase_units[0].payments.captures[0];

                                // Get payer's details
                                const payerName = details.payer.name.given_name + ' ' + details.payer.name.surname; // Full payer name
                                const shippingAddress = details.purchase_units[0].shipping.address;

                                // Example of extracting shipping address details:
                                const shippingStreet = shippingAddress.address_line_1;
                                const shippingCity = shippingAddress.city;
                                const shippingPostalCode = shippingAddress.postal_code;
                                const shippingCountry = shippingAddress.country_code;




                                $.ajax({
                                    method: "POST",
                                    url: "paypal.php",
                                    data: {
                                        transaction_id: transaction.id,
                                        transaction_status: transaction.status,
                                        payer_name: payerName,  // Send payer's full name
                                        shipping_street: shippingStreet,  // Send shipping address details
                                        shipping_city: shippingCity,
                                        shipping_postal_code: shippingPostalCode,
                                        shipping_country: shippingCountry
                                    },
                                    success: function(response) {
                                        if(response == 1) {
                                            alert("Transaction Completed by " + payerName + ". Payment successful");
                                        } else {
                                            alert('Failed to process payment');
                                            console.log(response);
                                        }
                                    }
                                });

                                // Optionally, show a message to the user
                                alert('Transaction completed by ' + payerName + '. Payment successful');
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
