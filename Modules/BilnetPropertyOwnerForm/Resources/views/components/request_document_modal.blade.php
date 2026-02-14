<input type="hidden" id="send_request_for_document_url" value="{{ route('send_document_request') }}">

<div class="modal-container">
    <div class="modal-overlay" id="requestDocumentmodalOverlay">
        <div class="modal">
            <span class="modal-close" id="closeDocumentModal"></span>
            <div class="modal-header">Send request for <span id="document_type"></span></div>
            <p class="modal-paragraph message"></p>
            <p class="modal-paragraph inform-to">Please check your email in <b id="inform_to_email"></b> or sms in <b
                    id="inform_to_phone"></b></p>

            <div class="modal-form">
                <button type="button" id="submit_request" style="margin-top: 10px">Send Request</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const requestDocumentmodalOverlay = $("#requestDocumentmodalOverlay");
        const closeDocumentModal = $("#closeDocumentModal");

        const documents = {
            ssnit_no: {
                name: "SSNIT Number",
                message: `We will get one for you for free within 24hours.`,
            },
            nhis_no: {
                name: "NHIS Number",
                message: `We will get one for you for free within 24hours.`,
            },
            company_url: {
                name: "Company Website",
                message: `We will get one for you for you as soon as possible.`,
            },
            company_phone: {
                name: "Company Phone",
                message: `We will get one for you for you as soon as possible.`,
            },
            company_tin: {
                name: "Company Phone",
                message: `We will get one for you for free within 10 minutes`,
            },
            digital_address: {
                name: "Digital Address",
                message: `If you are a foreigner and you want to do business in Ghana and you need an office to start with and you don’t even want to come to Ghana here, we can get you an office space with all the tools you will need to work with, ranging from human being to machines within 5 minutes`,
            },
            yellow_card: {
                name: "Yellow Card",
                message: `We will help you to create a yellow card as soon as possible.`,
            },
            new_concurrence: {
                name: "New Concurrence",
                message: `We will help you to create a yellow card as soon as possible.`,
            },
            birth_certificate: {
                name: "Ward/inhabitant birth certificate",
                message: `We will help you to create a yellow card as soon as possible.`,
            },
            id_card: {
                name: "ID Card",
                message: `We will help you to create a ID card or Passport as soon as possible.`,
            },
        };

        let isRequestInProgress = false; // Flag to prevent multiple requests

        //send documents
        function getVerifiedDocumentNo(documentType) {
            $("#document_type").text(documents[documentType].name);
            $(".modal-paragraph.message").text(documents[documentType].message);

            const email = $("#currently_updating_info_email").text();
            const phone = $("#currently_updating_info_phone").text();

            $("#inform_to_email").text(email);
            $("#inform_to_phone").text(phone);

            requestDocumentmodalOverlay.addClass("active");

            closeDocumentModal.on("click", () => {
                requestDocumentmodalOverlay.removeClass("active");
            });

            requestDocumentmodalOverlay.on("click", (e) => {
                if (e.target === requestDocumentmodalOverlay[0]) {
                    requestDocumentmodalOverlay.removeClass("active");
                }
            });

            // Remove any previously attached click event listeners
            $('#submit_request').off('click');

            // Attach the click event listener once
            $('#submit_request').on('click', async function() {
                if (isRequestInProgress) return; // Prevent sending multiple requests

                isRequestInProgress = true; // Set flag to true
                $('#submit_request').prop('disabled', true);
                $('#submit_request').text('Sending');

                const formToken = localStorage.getItem("form_token");

                const response = await sendRequest(formToken, documents[documentType]
                    .name);

                if (response.success) {
                    requestDocumentmodalOverlay.removeClass("active");
                    toastr.success(`Request for ${documents[documentType].name} successfully sent!`, "Success");
                } else {
                    toastr.error(`Request for ${documents[documentType].name} failed! Try again!`, "Error");
                }

                $('#submit_request').prop('disabled', false);
                $('#submit_request').text('Send Request');
                isRequestInProgress = false; // Reset flag after request is done
            });
        }

        const sendRequest = async (token, request_for) => {
            const URL = $("#send_request_for_document_url").val();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

            const payload = {
                token,
                request_for,
            };

            const headers = {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": CSRF_TOKEN,
            };

            try {
                const response = await fetch(URL, {
                    method: "POST",
                    headers: headers,
                    body: JSON.stringify(payload), // Convert the payload to JSON
                });

                if (!response.ok) {
                    // Parse the error response and return it
                    const errorData = await response.json();
                    return {
                        success: false,
                        status: response.status,
                        message: errorData.message || "An error occurred",
                    };
                }

                const data = await response.json(); // Parse the JSON response

                return {
                    success: true,
                    status: response.status,
                    message: data.message || "OTP successfully verified!",
                };
            } catch (error) {
                // Handle network or unexpected errors
                return {
                    success: false,
                    status: 500,
                    message: error.message || "An unexpected error occurred",
                };
            }
        };
    </script>
@endpush
