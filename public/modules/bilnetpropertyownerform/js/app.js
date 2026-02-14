const url = new URL(window.location);
const fullDomain = window.location.origin;

let isConfirmedToLeave = false;
// Listen for the unload event to clean the local storage if confirmed
window.addEventListener("unload", function () {
    isConfirmedToLeave = true;
});

const conditionalFields = [
    ["#genderOther", "#otherGenderField"],
    ["#foreignerNationality", "#foreignerCountryField"],
    ["#dualCitizenship", "#dualCitizenshipCountries"],
    ["#nonIdHolder", "#nonIdHolderDetails"],
    ["#knocking", "#knockingDetails"],
    ["#cohabitation", "#cohabitationDetails"],
];

const setupConditionalField = (triggerSelector, targetSelector) => {
    const trigger = document.querySelector(triggerSelector);
    const target = document.querySelector(targetSelector);
    if (trigger && target) {
        trigger.addEventListener("change", function () {
            if (target.classList.contains("conditional-field")) {
                target.style.display =
                    this.checked ||
                    (this.type === "radio" && this.value === "other")
                        ? "block"
                        : "none";
                if (
                    this.checked ||
                    (this.type === "radio" && this.value === "other")
                ) {
                    target.classList.add("block");
                }
            }
        });
    }
};

const setupConditionalFieldDynamic = (triggerSelector, targetSelector) => {
    $(triggerSelector).on("change", function () {
        const target = $(targetSelector);
        if (target.hasClass("conditional-field")) {
            if (
                this.checked ||
                (this.type === "radio" && this.value === "other")
            ) {
                target.show().addClass("block");
            } else {
                target.hide().removeClass("block");
            }
        }
    });
};

//condtional fields
$(document).ready(function () {
    // Helper function to handle parent's alive status and toggle guardian container visibility
    function handleParentStatusForRelationshipProof(inputName, isAlive) {
        const parent = $(`input[name='${inputName}']`).closest(".form-group");
        // const siblings = parent.siblings().not("#inhabitant_father_name, #inhabitant_mother_name");
        const siblings = parent.siblings().filter(function () {
            return !$(this).find(
                "#inhabitant_father_name, #inhabitant_mother_name"
            ).length;
        });

        // Check if the parent is alive or not
        if (isAlive === "yes") {
            siblings.removeClass("hidden").find("input").prop("required", true);
        } else {
            siblings.addClass("hidden").find("input").prop("required", false);
        }

        // Check if both parents are not alive and toggle guardian container visibility
        const fatherStatus = $(
            "input[name='is_inhabitant_father_alive']:checked"
        ).val();
        const motherStatus = $(
            "input[name='is_inhabitant_mother_alive']:checked"
        ).val();

        if (fatherStatus === "No" && motherStatus === "No") {
            $(".inhabitant-guardian-container")
                .removeClass("hidden")
                .find("input")
                .prop("required", true);
        } else {
            $(".inhabitant-guardian-container")
                .addClass("hidden")
                .find("input")
                .prop("required", false);
        }
    }

    // When proof_of_relationship changes
    $("input[name='proof_of_relationship']").on("change", function (e) {
        const value = e.target.value;
        const birthCertificateContainer = $(
            "#proof_of_relationship_birth_certificate"
        );
        const guardianContainer = $(".inhabitant-guardian-container");

        if (value === "Birth Certificate") {
            birthCertificateContainer.removeClass("hidden");
            guardianContainer.removeClass("hidden");
            $("#inhabitant_father_name").attr("required", true);
            $("#inhabitant_mother_name").attr("required", true);

            // Handle the change for father's alive status
            $("input[name='is_inhabitant_father_alive']").on(
                "change",
                function (e) {
                    handleParentStatusForRelationshipProof(
                        "is_inhabitant_father_alive",
                        e.target.value
                    );
                }
            );

            // Handle the change for mother's alive status
            $("input[name='is_inhabitant_mother_alive']").on(
                "change",
                function (e) {
                    handleParentStatusForRelationshipProof(
                        "is_inhabitant_mother_alive",
                        e.target.value
                    );
                }
            );
        } else {
            birthCertificateContainer.addClass("hidden");
            guardianContainer.addClass("hidden");
            $("#inhabitant_father_name").attr("required", false);
            $("#inhabitant_mother_name").attr("required", false);
            guardianContainer.find("input").prop("required", false);
        }
    });
});

// Define the event listener function
function beforeUnloadListener(e) {
    e.preventDefault();
    isConfirmedToLeave = true;
    e.returnValue = ""; // For modern browsers
    const confirmationMessage = "Are you sure you want to leave?";
    e.returnValue = confirmationMessage; // For legacy browsers
    return confirmationMessage; // For modern browsers
}

// Add the event listener
window.addEventListener("beforeunload", beforeUnloadListener);

// Function to disable the event listener before loading
function disableBeforeUnload() {
    window.removeEventListener("beforeunload", beforeUnloadListener);
}

// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let cookieArr = document.cookie.split(";"); // Split cookies into an array
    for (let i = 0; i < cookieArr.length; i++) {
        let cookie = cookieArr[i].trim(); // Remove whitespace
        // Check if the cookie starts with the name
        if (cookie.startsWith(name + "=")) {
            return cookie.substring(name.length + 1); // Return the value
        }
    }
    return null; // Return null if not found
}

function toggleInhabitantOtherField(fieldName) {
    const selectElement = document.getElementById(fieldName);
    const otherField = document.getElementById(`${fieldName}-other`);

    if (selectElement.value === "Others") {
        otherField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        otherField.classList.add("hidden"); // Hide the "Other" text field
        otherField.value = ""; // Clear the input field
    }
}

function toggleLoanFields(show) {
    const loanDetails = document.getElementById("loanDetails");
    if (show) {
        loanDetails.classList.remove("hidden"); // Show the loan details
    } else {
        loanDetails.classList.add("hidden"); // Hide the loan details
        resetLoanFields(); // Clear loan-related inputs
    }
}

function togglePaymentFields(show) {
    const paymentDetails = document.getElementById("paymentDetails");
    if (show) {
        paymentDetails.classList.remove("hidden"); // Show the payment details
    } else {
        paymentDetails.classList.add("hidden"); // Hide the payment details
        resetPaymentFields(); // Clear payment-related inputs
    }
}

function toggleTribe() {
    const otherTribeValue = document.getElementById("otherTribeField");
    const tribeValue = document.getElementById("tribeSelect").value;
    if (tribeValue === "Other") {
        console.log(tribeValue);
        otherTribeValue.classList.remove("hidden");
    } else {
        otherTribeValue.classList.add("hidden");
    }
}

function handleMaritalStatusChange() {
    // Get the selected marital status
    const selectedStatus = document.querySelector(
        'input[name="marital_status"]:checked'
    ).value;

    // Get the detail fields
    const knockingDetails = document.getElementById("knockingDetails");
    const cohabitationDetails = document.getElementById("cohabitationDetails");

    // Reset visibility of detail fields
    knockingDetails.classList.add("hidden");
    cohabitationDetails.classList.add("hidden");

    // Show relevant field based on selection
    if (selectedStatus === "Knocking") {
        knockingDetails.classList.remove("hidden");
    } else if (selectedStatus === "Co-habitation") {
        cohabitationDetails.classList.remove("hidden");
    }
}

document.querySelectorAll('input[name="hair_color"]').forEach((radio) => {
    radio.addEventListener("change", () => {
        const otherField = document.getElementById("hair_color_specify");
        if (radio.value === "other" && radio.checked) {
            otherField.classList.remove("hidden"); // Show text field
        } else {
            otherField.classList.add("hidden"); // Hide text field
            otherField.value = ""; // Clear the input field
        }
    });
});

document.querySelectorAll('input[name="disability"]').forEach((radio) => {
    radio.addEventListener("change", () => {
        const otherField = document.getElementById("disability_specify");
        if (radio.value === "other" && radio.checked) {
            otherField.classList.remove("hidden"); // Show text field
        } else {
            otherField.classList.add("hidden"); // Hide text field
            otherField.value = ""; // Clear the input field
        }
    });
});

function toggleProofField(show) {
    const proofField = document.getElementById("proofField");
    if (show) {
        proofField.classList.remove("hidden"); // Show the proof attachment field
    } else {
        proofField.classList.add("hidden"); // Hide the proof attachment field
        document.getElementById("proofAttachment").value = ""; // Clear the input
    }
}

function resetLoanFields() {
    document.getElementById("loanAmount").value = "";
    document.getElementById("loanInterest").value = "";
    document.getElementById("loanStartDate").value = "";
    document.getElementById("loanEndDate").value = "";
    resetPaymentFields();
}

function resetPaymentFields() {
    document.getElementById("paymentDate").value = "";
    document.getElementById("amountPaid").value = "";
    document.getElementById("remainingBalance").value = "";
    document.getElementById("estimatedFinishDate").value = "";
    toggleProofField(false); // Reset proof field visibility
}

// Function to toggle the Smoking Options
function toggleSmokingOptions(show) {
    const smokingTypeOptions = document.getElementById("smokingTypeOptions");
    if (show) {
        smokingTypeOptions.classList.remove("hidden"); // Show the smoking type options
    } else {
        smokingTypeOptions.classList.add("hidden"); // Hide the smoking type options
        resetSmokingOptions(); // Clear any selections or inputs
    }
}

// Function to toggle the "Others" field for Smoking Type
function toggleOtherField(fieldName) {
    const otherField = document.getElementById(`${fieldName}-other`);
    const checkboxes = document.getElementsByName("smokeType");
    const othersChecked = Array.from(checkboxes).some(
        (checkbox) => checkbox.value === "Others" && checkbox.checked
    );

    if (othersChecked) {
        otherField.classList.remove("hidden"); // Show the "Others" text field
    } else {
        otherField.classList.add("hidden"); // Hide the "Others" text field
        otherField.value = ""; // Clear the input field
    }
}

// Function to reset Smoking Options
function resetSmokingOptions() {
    // Uncheck all checkboxes
    const checkboxes = document.getElementsByName("smokeType");
    checkboxes.forEach((checkbox) => (checkbox.checked = false));

    // Hide and clear the "Others" text field
    const otherField = document.getElementById("smoking-other");
    otherField.classList.add("hidden");
    otherField.value = "";
}

function togglePetsNumber(show) {
    const petsNumberField = document.getElementById("petsNumberField");
    if (show) {
        petsNumberField.classList.remove("hidden"); // Show the number field
    } else {
        petsNumberField.classList.add("hidden"); // Hide the number field
        document.getElementById("numberOfPets").value = ""; // Clear the input
    }
}

const tribeDropdown = document.getElementById("tribeDropdown");
const selectedTribesContainer = document.getElementById("selectedTribes");
const selectedTribesWrapper = document.getElementById("selectedTribesWrapper");

// Store selected tribes
let selectedTribes = [];

// Event listener for dropdown changes
tribeDropdown.addEventListener("change", () => {
    const selectedValue = tribeDropdown.value;

    // Ensure a valid option is selected
    if (selectedValue && !selectedTribes.includes(selectedValue)) {
        // Check if "Others" is selected
        if (selectedValue === "Others") {
            addTribe(selectedValue, true); // Pass true for custom input
        } else {
            addTribe(selectedValue);
        }
    }

    // Reset dropdown value after selection
    tribeDropdown.value = "";

    if (selectedTribes.length > 0) {
        selectedTribesWrapper.classList.remove("hidden");
        selectedTribesContainer.classList.remove("hidden");
    } else {
        selectedTribesWrapper.classList.add("hidden");
        selectedTribesContainer.classList.add("hidden");
    }
});

// Function to add a tribe to the selected list
function addTribe(value, isCustom = false) {
    selectedTribes.push(value);

    // Create a container for the tribe
    const tribeItem = document.createElement("div");
    tribeItem.className = "tribe-item";
    tribeItem.dataset.value = value;

    // Add the tribe name or input field
    if (isCustom) {
        const customInput = document.createElement("input");
        customInput.type = "text";
        customInput.placeholder = "Specify other tribe";
        customInput.className = "custom-tribe-input";
        tribeItem.appendChild(customInput);
    } else {
        const span = document.createElement("span");
        span.textContent = value;
        tribeItem.appendChild(span);
    }

    // Add remove button
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.addEventListener("click", () => removeTribe(value, tribeItem));
    tribeItem.appendChild(removeButton);

    // Append to the selected tribes container
    selectedTribesContainer.appendChild(tribeItem);
}

function toggleOtherSanitationField() {
    const sanitationOtherField = document.getElementById(
        "sanitationOtherField"
    );
    const otherRadio = document.getElementById("sanitation_other");

    if (otherRadio.checked) {
        sanitationOtherField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        sanitationOtherField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("sanitation_other_input").value = ""; // Clear the input field
    }
}

function toggleOtherCurrencyField() {
    const sanitationOtherField = document.getElementById("currencyOtherField");
    const otherRadio = document.getElementById("currency_other");

    if (otherRadio.checked) {
        sanitationOtherField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        sanitationOtherField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("currency_other_field_input").value = ""; // Clear the input field
    }
}

// Function to remove a tribe from the selected list
function removeTribe(value, tribeItem) {
    selectedTribes = selectedTribes.filter((tribe) => tribe !== value);
    selectedTribesContainer.removeChild(tribeItem);

    if (selectedTribes.length > 0) {
        selectedTribesWrapper.classList.remove("hidden");
        selectedTribesContainer.classList.remove("hidden");
    } else {
        selectedTribesWrapper.classList.add("hidden");
        selectedTribesContainer.classList.add("hidden");
    }
}

function toggleOtherSanitationFacilityField() {
    const sanitationOtherFacilityField = document.getElementById(
        "sanitationOtherFacilityField"
    );
    const otherFacilityRadio = document.getElementById(
        "sanitation_other_facility"
    );

    if (otherFacilityRadio.checked) {
        sanitationOtherFacilityField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        sanitationOtherFacilityField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("sanitation_other_facility_input").value = ""; // Clear the input field
    }
}

// Function to toggle the "Other" field visibility
function toggleOtherField(fieldName) {
    const checkboxGroup = document.getElementsByName(fieldName);
    const otherField = document.getElementById(`${fieldName}-other`);

    // Check if "Others" is checked
    const othersChecked = Array.from(checkboxGroup).some(
        (checkbox) => checkbox.value === "Others" && checkbox.checked
    );

    if (othersChecked) {
        otherField.classList.remove("hidden"); // Show text field
    } else {
        otherField.classList.add("hidden"); // Hide text field
        otherField.value = ""; // Clear the input field
    }
}

const facilityDropdown = document.getElementById("facilityDropdown");
const selectedFacilitiesContainer =
    document.getElementById("selectedFacilities");
const selectedFacilitiesWrapper = document.getElementById(
    "selectedFacilitiesWrapper"
);

// Store selected facilities
let selectedFacilities = [];

// Event listener for dropdown changes
facilityDropdown.addEventListener("change", () => {
    const selectedValue = facilityDropdown.value;
    // Check if "Others" is selected
    if (selectedValue === "Others" && !selectedFacilities.includes("Others")) {
        addFacility(selectedValue, true); // Pass true for custom input
    } else if (
        !selectedFacilities.includes(selectedValue) &&
        selectedValue !== ""
    ) {
        addFacility(selectedValue);
    }

    // Reset dropdown value after selection
    facilityDropdown.value = "";

    if (selectedFacilities.length > 0) {
        selectedFacilitiesWrapper.classList.remove("hidden");
        selectedFacilitiesContainer.classList.remove("hidden");
    } else {
        selectedFacilitiesWrapper.classList.add("hidden");
        selectedFacilitiesContainer.classList.add("hidden");
    }
});

// Function to add a facility to the selected list
function addFacility(value, isCustom = false) {
    selectedFacilities.push(value);

    // Create a container for the facility
    const facilityItem = document.createElement("div");
    facilityItem.className = "facility-item";
    facilityItem.dataset.value = value;

    // Add the facility name or input field
    if (isCustom) {
        const customInput = document.createElement("input");
        customInput.type = "text";
        customInput.placeholder = "Specify other facilities";
        customInput.className = "custom-facility-input";
        facilityItem.appendChild(customInput);
    } else {
        const span = document.createElement("span");
        span.textContent = value;
        facilityItem.appendChild(span);
    }

    // Add remove button
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.addEventListener("click", () =>
        removeFacility(value, facilityItem)
    );
    facilityItem.appendChild(removeButton);

    // Append to the selected facilities container
    selectedFacilitiesContainer.appendChild(facilityItem);
}

// Function to remove a facility from the selected list
function removeFacility(value, facilityItem) {
    selectedFacilities = selectedFacilities.filter(
        (facility) => facility !== value
    );
    selectedFacilitiesContainer.removeChild(facilityItem);

    if (selectedFacilities.length > 0) {
        selectedFacilitiesWrapper.classList.remove("hidden");
        selectedFacilitiesContainer.classList.remove("hidden");
    } else {
        selectedFacilitiesWrapper.classList.add("hidden");
        selectedFacilitiesContainer.classList.add("hidden");
    }
}

// Generalized function to toggle "Others" field
function setupOtherFieldToggle(
    groupSelector,
    otherCheckboxValue,
    otherFieldSelector
) {
    const group = document.querySelector(groupSelector);
    const otherField = document.querySelector(otherFieldSelector);

    if (group && otherField) {
        group.addEventListener("change", (event) => {
            const target = event.target;

            // Check if the clicked checkbox is the "Other" checkbox
            if (
                target.type === "checkbox" &&
                target.value === otherCheckboxValue
            ) {
                if (target.checked) {
                    otherField.style.display = "block"; // Show text field
                } else {
                    otherField.style.display = "none"; // Hide text field
                    otherField.value = ""; // Clear the input field
                }
            }
        });
    }
}

// Initialize for the Security Type group
setupOtherFieldToggle(
    ".security-checkbox-group",
    "Other",
    "#security-other-input"
);

setupOtherFieldToggle(
    ".service-checkbox-group",
    "Others",
    "#service-other-input"
);

function toggleCustomColor(section) {
    const inputField = document.getElementById(
        `building-color-${section}-custom`
    );
    const checkbox = Array.from(
        document.querySelectorAll(`[name="${section}Colors"]`)
    ).find((cb) => cb.value === "Others");

    if (checkbox.checked) {
        inputField.classList.remove("hidden");
    } else {
        inputField.value = ""; // Clear the text field
        inputField.classList.add("hidden");
    }
}

let permitCount = 1; // Start with 1 permit

function appendPermit(data) {
    let maxPermit = 0;
    Object.keys(data).forEach((key) => {
        const match = key.match(/permit_([^_]+)?_(\d+)/);
        if (match) {
            const permitNum = parseInt(match[2], 10);
            maxPermit = Math.max(maxPermit, permitNum);
        }
    });

    // Only add details for permits beyond the first one
    for (let permitCount = 2; permitCount <= maxPermit; permitCount++) {
        const container = document.createElement("div");
        container.className = "permit-details";
        container.id = `permit-${permitCount}`;

        // Add the content for the new permit
        container.innerHTML = `
            <h4>Permit ${permitCount}</h4>
            <div class="form-group">
                <label for="permit_name_${permitCount}">Permit Name:</label>
                <input type="text" id="permit_name_${permitCount}" name="permit_name_${permitCount}" placeholder="Enter permit name" value="${
            data[`permit_name_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_issuer_${permitCount}">Issuer:</label>
                <input type="text" id="permit_issuer_${permitCount}" name="permit_issuer_${permitCount}" placeholder="Enter issuer" value="${
            data[`permit_issuer_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_region_${permitCount}">Region:</label>
                <input type="text" id="permit_region_${permitCount}" name="permit_region_${permitCount}" placeholder="Enter region" value="${
            data[`permit_region_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_district_${permitCount}">District/Municipal/Metro:</label>
                <input type="text" id="permit_district_${permitCount}" name="permit_district_${permitCount}" placeholder="Enter district" value="${
            data[`permit_district_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_purpose_${permitCount}">Permit Purpose:</label>
                <input type="text" id="permit_purpose_${permitCount}" name="permit_purpose_${permitCount}" placeholder="Enter permit purpose" value="${
            data[`permit_purpose_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_issuing_date_${permitCount}">Issuing Date:</label>
                <input type="date" id="permit_issuing_date_${permitCount}" name="permit_issuing_date_${permitCount}" value="${
            data[`permit_issuing_date_${permitCount}`] || "2024-12-09"
        }">
            </div>
            <div class="form-group">
                <label for="permit_expiry_date_${permitCount}">Expiry Date:</label>
                <input type="date" id="permit_expiry_date_${permitCount}" name="permit_expiry_date_${permitCount}" value="${
            data[`permit_expiry_date_${permitCount}`] || "2024-12-09"
        }">
            </div>
            <div class="form-group">
                <label for="permit_cost_${permitCount}">Permit Cost:</label>
                <input type="text" id="permit_cost_${permitCount}" name="permit_cost_${permitCount}" placeholder="Enter permit cost" value="${
            data[`permit_cost_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_payment_code_${permitCount}">Payment Code:</label>
                <input type="text" id="permit_payment_code_${permitCount}" name="permit_payment_code_${permitCount}" placeholder="Enter payment code" value="${
            data[`permit_payment_code_${permitCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <label for="permit_issuing_officer_${permitCount}">Issuing Officer:</label>
                <input type="text" id="permit_issuing_officer_${permitCount}" name="permit_issuing_officer_${permitCount}" placeholder="Enter issuing officer" value="${
            data[`permit_issuing_officer_${permitCount}`] || ""
        }">
            </div>
        `;

        // Append the new permit container to the permit details container
        document
            .getElementById("permitDetailsContainer")
            .appendChild(container);
    }
}

function addPermit() {
    permitCount++;

    // Create a new container for the permit
    const container = document.createElement("div");
    container.className = "permit-details";
    container.id = `permit-${permitCount}`;

    // Add the content for the new permit
    container.innerHTML = `
        <h4>Permit ${permitCount}</h4>
        <div class="form-group">
            <label for="permit_name_${permitCount}">Permit Name:</label>
            <input type="text" id="permit_name_${permitCount}" name="permit_name_${permitCount}" placeholder="Enter permit name">
        </div>
        <div class="form-group">
            <label for="permit_issuer_${permitCount}">Issuer:</label>
            <input type="text" id="permit_issuer_${permitCount}" name="permit_issuer_${permitCount}" placeholder="Enter issuer">
        </div>
        <div class="form-group">
            <label for="permit_region_${permitCount}">Region:</label>
            <input type="text" id="permit_region_${permitCount}" name="permit_region_${permitCount}" placeholder="Enter region">
        </div>
        <div class="form-group">
            <label for="permit_district_${permitCount}">District/Municipal/Metro:</label>
            <input type="text" id="permit_district_${permitCount}" name="permit_district_${permitCount}" placeholder="Enter district">
        </div>
        <div class="form-group">
            <label for="permit_purpose_${permitCount}">Permit Purpose:</label>
            <input type="text" id="permit_purpose_${permitCount}" name="permit_purpose_${permitCount}" placeholder="Enter permit purpose">
        </div>
        <div class="form-group">
            <label for="permit_issuing_date_${permitCount}">Issuing Date:</label>
            <input type="date" id="permit_issuing_date_${permitCount}" name="permit_issuing_date_${permitCount}" value="2024-12-09">
        </div>
        <div class="form-group">
            <label for="permit_expiry_date_${permitCount}">Expiry Date:</label>
            <input type="date" id="permit_expiry_date_${permitCount}" name="permit_expiry_date_${permitCount}" value="2024-12-09">
        </div>
        <div class="form-group">
            <label for="permit_cost_${permitCount}">Permit Cost:</label>
            <input type="text" id="permit_cost_${permitCount}" name="permit_cost_${permitCount}" placeholder="Enter permit cost">
        </div>
        <div class="form-group">
            <label for="permit_payment_code_${permitCount}">Payment Code:</label>
            <input type="text" id="permit_payment_code_${permitCount}" name="permit_payment_code_${permitCount}" placeholder="Enter payment code">
        </div>
        <div class="form-group">
            <label for="permit_issuing_officer_${permitCount}">Issuing Officer:</label>
            <input type="text" id="permit_issuing_officer_${permitCount}" name="permit_issuing_officer_${permitCount}" placeholder="Enter issuing officer">
        </div>
        `;

    // Append the new permit container to the permit details container
    document.getElementById("permitDetailsContainer").appendChild(container);
}

// Initialize selected countries array

let pillarCount = 4; // Start with 4 pillars

function appendPillar(data) {
    let maxPillar = 0;
    Object.keys(data).forEach((key) => {
        const match = key.match(/pillar_(number|address|image)_(\d+)/);
        if (match) {
            const pillarNum = parseInt(match[2], 10);
            maxPillar = Math.max(maxPillar, pillarNum);
        }
    });

    // Only add details for pillars beyond 4
    for (let pillarCount = 5; pillarCount <= maxPillar; pillarCount++) {
        const container = document.createElement("div");
        container.className = "pillar-details";
        container.id = `pillar-${pillarCount}`;

        const imageData = (() => {
            try {
                const parsedData = JSON.parse(
                    data[`pillar_image_${pillarCount}`] || "[]"
                );
                return Array.isArray(parsedData) ? parsedData : [];
            } catch (error) {
                return [];
            }
        })();

        let imageMarkup = ``;

        imageData?.forEach((item) => {
            const imageSrc = fullDomain + "/storage/" + item;
            imageMarkup += `<img src="${imageSrc}" style="display: block; max-width: 100%; margin-top: 10px;">`;
        });

        // Add the content for the new pillar
        container.innerHTML = `
            <h4>Pillar ${pillarCount} Details</h4>
            <div class="form-group">
                <label for="pillar_number_${pillarCount}">Pillar Number ${pillarCount}:</label>
                <input type="text" id="pillar_number_${pillarCount}" name="pillar_number_${pillarCount}" placeholder="Enter pillar number" value="${
            data[`pillar_number_${pillarCount}`] || ""
        }">
                <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number )</h6></a>
            </div>
            <div class="form-group">
                <label for="pillar_address_${pillarCount}">Pillar ${pillarCount} Digital Address Number:</label>
                <input type="text" id="pillar_address_${pillarCount}" name="pillar_address_${pillarCount}" placeholder="Enter digital address number" value="${
            data[`pillar_address_${pillarCount}`] || ""
        }">
            </div>
            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Pillar Images</h3>
                    <p>2 photos to be taken or attached</p>
                    <button class="upload-btn" type="button">Upload Image</button>
                    <input type="file" accept="image/*" capture="environment" style="display: none;"
                        id="pillar_image_${pillarCount}" data-multiple="true" data-min="2" data-max="2" multiple>
                    <input type="hidden" class="store_file original_path" name="pillar_image_${pillarCount}" data-multiple="true" value='${
            data[`pillar_image_${pillarCount}`] || ""
        }'>
                    <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;">
                    ${imageMarkup}
                    <div class="loader" style="display: none;">Uploading...</div>
                    <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                </div>
            </div>
        `;

        // Append the new pillar container to the pillar details container
        document
            .getElementById("pillarDetailsContainer")
            .appendChild(container);
        initImageCardForAddedItem(container);
    }

    // Initialize image cards
}

function addPillar() {
    pillarCount++;

    // Create a new container for the pillar
    const container = document.createElement("div");
    container.className = "pillar-details";
    container.id = `pillar-${pillarCount}`;

    // Add the content for the new pillar
    container.innerHTML = `
<h4>Pillar ${pillarCount} Details</h4>
<div class="form-group">
    <label for="pillar_number_${pillarCount}">Pillar Number ${pillarCount}:</label>
    <input type="text" id="pillar_number_${pillarCount}" name="pillar_number_${pillarCount}" placeholder="Enter pillar number">
    <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number )</h6></a>
</div>
<div class="form-group">
    <label for="pillar_address${pillarCount}">Pillar ${pillarCount} Digital Address Number:</label>
    <input type="text" id="pillar_address${pillarCount}" name="pillar_address${pillarCount}" placeholder="Enter digital address number">
</div>

                <div class="form-group">
                    <div class="card" data-type="back">
                        <h3>Pillar Images</h3>
                        <p>2 photos to be taken or attached</p>
                        <button class="upload-btn" type="button">Upload Image</button>
                        <input type="file" accept="image/*" capture="environment" style="display: none;"
                            id="pillar_image_${pillarCount}" data-multiple="true" data-min="2" data-max="2" multiple>
                        <input type="hidden" class="store_file original_path" name="pillar_image_${pillarCount}"
                            data-multiple="true">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                </div>
`;

    // Append the new pillar container to the pillar details container
    document.getElementById("pillarDetailsContainer").appendChild(container);
    initImageCardForAddedItem(container);
}

function togglePropertyFields() {
    const bareLandCheckbox = document.getElementById("bareLandCheckbox");
    const buildingCheckbox = document.getElementById("buildingCheckbox");
    const propertyFields = document.getElementById("propertyFields");

    // Fields to toggle the required attribute
    const requiredFields = [
        "asset_houseNumber",
        "asset_locality",
        "asset_town",
        "asset_district",
        "property_asset_region",
        "asset_digital_address",
        "asset_town",
    ];

    // Check if both checkboxes are checked
    if (bareLandCheckbox.checked && buildingCheckbox.checked) {
        propertyFields.classList.remove("hidden");

        // Make fields required
        requiredFields.forEach((fieldId) => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.setAttribute("required", "true");
            }
        });
    } else {
        propertyFields.classList.add("hidden");

        // Remove required attribute
        requiredFields.forEach((fieldId) => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.removeAttribute("required");
            }
        });
    }
}

let selectedCountries = [];

// Toggle visibility of the dropdown and selected countries section
function toggleDualCitizenship() {
    const checkbox = document.getElementById("dualCitizenship");
    const conditionalField = document.getElementById(
        "dualCitizenshipCountries"
    );
    if (checkbox.checked) {
        conditionalField.classList.remove("hidden");
    } else {
        conditionalField.classList.add("hidden");
        resetCountries(); // Clear the selected countries when unchecked
    }
}

function toggleOtherCarrierField() {
    const carrierDropdown = document.getElementById("momo_network_carrier");
    const otherCarrierField = document.getElementById("otherCarrierField");

    if (carrierDropdown.value === "Other") {
        otherCarrierField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        otherCarrierField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("other_carrier_input").value = ""; // Clear the input field
    }
}

function toggleOtherRegionField() {
    const regionDropdown = document.getElementById("property_asset_region");
    const otherField = document.getElementById("otherPropertyAssetRegionField");

    if (regionDropdown.value === "Other") {
        otherField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        otherField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("other_asset_region").value = ""; // Clear the input field
    }
}

function toggleOtherRbfField() {
    const rbfDropdown = document.getElementById("rbf_denomination_name");
    const otherRbfField = document.getElementById("otherRbfField");

    if (rbfDropdown.value === "others") {
        otherRbfField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        otherRbfField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("other_rbf_input").value = ""; // Clear the input field
    }
}

// Handle country selection from the dropdown
function handleCountrySelection(event) {
    const dropdown = document.getElementById("countryDropdown");
    const selectedValue = dropdown.value;

    // Prevent more than two selections
    if (selectedCountries.length > 2) {
        toastr.error("You can only select up to two countries.");
        dropdown.value = ""; // Reset the dropdown
        return;
    }

    // Add the selected country if not already selected
    if (!selectedCountries.includes(selectedValue)) {
        if (selectedValue !== "" && selectedCountries.length < 2) {
            selectedCountries.push(selectedValue);
        }
        updateSelectedCountries();
    }
    dropdown.value = "";
}

// Update the UI with the selected countries
function updateSelectedCountries() {
    const container = document.getElementById("selectedCountries");
    container.innerHTML = ""; // Clear the existing display

    selectedCountries.forEach((country) => {
        // Create a container for each selected country
        const countryElement = document.createElement("div");
        countryElement.className = "selected-option";
        countryElement.innerHTML = `
    <span>${country}</span>
    <button class="remove-btn" onclick="removeCountry('${country}')">Remove</button>
`;
        container.appendChild(countryElement);
    });

    $("#dual_citizenship_countries").val(JSON.stringify(selectedCountries));
}

function initializeSelectedCountries() {
    toggleDualCitizenship();
    const dualCountriesElement = $("#dual_citizenship_countries");

    const countries = dualCountriesElement.val();

    let countriesParsed = [];

    try {
        // Check if languages is a valid JSON string or array
        if (countries && typeof countries === "string") {
            countriesParsed = JSON.parse(countries);
        } else if (Array.isArray(countries)) {
            countriesParsed = countries;
        }
    } catch (error) {
        console.error("Failed to parse countries:", error);
    }

    selectedCountries = countriesParsed; // adds the parsed languages
    updateSelectedCountries(); // updates the UI or relevant logic
}

// Remove a selected country
function removeCountry(country) {
    selectedCountries = selectedCountries.filter((c) => c !== country); // Remove from array
    updateSelectedCountries(); // Update the UI
}

// Reset the selected countries
function resetCountries() {
    selectedCountries = [];
    updateSelectedCountries();
}

// Initialize selected languages array
let selectedLanguages = [];

// Handle language selection from dropdown
function handleLanguageSelection() {
    const dropdown = document.getElementById("languageDropdown");
    const selectedValue = dropdown.value;

    if (selectedValue === "Other") {
        // Show the input field for adding a custom language
        document
            .getElementById("otherLanguageInput")
            .classList.remove("hidden");
    } else if (!selectedLanguages.includes(selectedValue) && selectedValue) {
        // Add the selected language to the list if it's not already selected
        selectedLanguages.push(selectedValue);
        updateSelectedLanguages();
    }

    // Reset the dropdown selection
    dropdown.value = "";
}

// Add custom language entered in the "Other" input field
function addOtherLanguage() {
    const otherLanguageInput = document.getElementById("otherLanguage");
    const otherLanguage = otherLanguageInput.value.trim();

    if (otherLanguage && !selectedLanguages.includes(otherLanguage)) {
        // Add the custom language to the list
        selectedLanguages.push(otherLanguage);
        updateSelectedLanguages();

        // Clear the input field and hide it
        otherLanguageInput.value = "";
        document.getElementById("otherLanguageInput").classList.add("hidden");
    }
}

// Update the UI with the selected languages
function updateSelectedLanguages() {
    const container = document.getElementById("selectedLanguages");
    container.innerHTML = ""; // Clear the existing display

    selectedLanguages.forEach((language) => {
        // Create a container for each selected language
        const languageElement = document.createElement("div");
        languageElement.className = "selected-option";
        languageElement.innerHTML = `
    <span>${language}</span>
    <button class="remove-btn" onclick="removeLanguage('${language}')">Remove</button>
`;
        $("#spoken_languages").val(JSON.stringify(selectedLanguages));
        container.appendChild(languageElement);
    });
}

function initializeSelectedLanguage() {
    const spokenLanguagesElement = $("#spoken_languages");

    const languages = spokenLanguagesElement.val();

    let languageParsed = [];

    try {
        // Check if languages is a valid JSON string or array
        if (languages && typeof languages === "string") {
            languageParsed = JSON.parse(languages);
        } else if (Array.isArray(languages)) {
            languageParsed = languages;
        }
    } catch (error) {
        console.error("Failed to parse languages:", error);
    }

    selectedLanguages = languageParsed; // adds the parsed languages
    updateSelectedLanguages(); // updates the UI or relevant logic
}

// Remove a selected language
function removeLanguage(language) {
    selectedLanguages = selectedLanguages.filter((l) => l !== language); // Remove from array
    updateSelectedLanguages(); // Update the UI
}

// Add event listener for dropdown selection
// document
//     .getElementById("countryDropdown")
//     .addEventListener("change", handleCountrySelection);

document.addEventListener("DOMContentLoaded", () => {
    // Region selection handler
    const regionSelect = document.getElementById("regionSelect");
    const otherRegionField = document.getElementById("otherRegionField");

    if (regionSelect && otherRegionField) {
        regionSelect.addEventListener("change", function () {
            otherRegionField.style.display =
                this.value === "Other" ? "block" : "none";
        });
    }

    // Slide navigation logic
    let slides = document.getElementsByClassName("slide");
    const totalSlides = slides.length;
    let slideNo = url.searchParams.get("slide_no");

    let currentSlide = slideNo ? Number(slideNo) : 1;

    initForm(currentSlide);

    async function initForm(slide_no) {
        clearRequiredAttrAndValueOtpInputs();

        const formToken = localStorage.getItem("form_token");

        if (!formToken) {
            // slide_no = 21;
            slide_no = 1;
            assignValuesToFields(slide_no);
        }

        let response = await getSingleFormData(formToken, slide_no);

        if (response?.data?.owner?.last_completed_slide_no < slide_no) {
            slide_no = response?.data?.owner?.last_completed_slide_no;
            response = await getSingleFormData(formToken, slide_no);
        }

        // Process form data items
        if (response?.data?.items) {
            const formInputs = response.data.items.reduce(
                (acc, { key, value }) => {
                    acc[key] = value;
                    return acc;
                },
                {}
            );
            localStorage.setItem(
                `slide_${slide_no}`,
                JSON.stringify(formInputs)
            );
        }

        // Show owner info
        const { owner } = response?.data || {};
        if (owner) {
            const { token, phone, email } = owner;
            showCurrentlyUpdatingFormInfo(token, phone, email);
        }

        currentSlide = slide_no;

        // Finalize UI updates
        assignValuesToFields(slide_no);
        $(".form-slide.slide").removeClass("active");
        $(`#slide${slide_no}`).addClass("active");
        updateProgressBar(slide_no, totalSlides);
        updateNavButtons();
        updateQueryRoute(slide_no);
        initializeSelectedCountries();
        initializeSelectedLanguage();
    }

    // Safe function to get element
    const getSlideElement = (slideNumber) => {
        const element = document.getElementById(`slide${slideNumber}`);
        if (!element) {
            console.error(`Slide ${slideNumber} not found`);
        }
        return element;
    };

    // Change slide function with additional error handling
    window.changeSlide = async function (direction) {
        let nextAllowed = true;
        const currentSlideElement = getSlideElement(currentSlide);
        const formData = getAndStoreSlideFormData(currentSlide);
        const formToken = localStorage.getItem("form_token");
        let nextSlide = currentSlide;

        // Validate if necessary
        if (direction === 1 && !validateCurrentSlide()) return;

        // Update slide number with boundary checks
        nextSlide = Math.max(1, Math.min(nextSlide + direction, totalSlides));

        try {
            if (formToken) {
                const currentSliderData = localStorage.getItem(
                    `slide_${currentSlide}`
                );
                const currentParsedSliderData = currentSliderData
                    ? JSON.parse(currentSliderData)
                    : null;

                if (direction === 1) {
                    const updated = await updateOwnerFormData(
                        formToken,
                        currentSlide,
                        currentParsedSliderData
                    );

                    if (!updated) {
                        return 0;
                    }
                }

                const response = await getSingleFormData(formToken, nextSlide);

                if (response?.data) {
                    const formInputs = response.data?.items?.reduce(
                        (acc, item) => {
                            acc[item?.key] = item?.value;
                            return acc;
                        },
                        {}
                    );
                    localStorage.setItem(
                        `slide_${nextSlide}`,
                        JSON.stringify(formInputs)
                    );
                }
            } else if (currentSlide === 2 && direction === 1) {
                const response = await initiateTemporaryOwnerForm(formData);
                console.log("initiateTemporaryOwnerForm");
                console.log(response);
                if (response) {
                    assignValuesToFields(currentSlide);
                } else {
                    nextAllowed = false;
                }
            }

            if (nextAllowed) {
                // Remove current slide's active class
                if (currentSlideElement)
                    currentSlideElement.classList.remove("active");

                // Get new slide element
                const newSlideElement = getSlideElement(nextSlide);
                // Show new slide if exists
                if (newSlideElement) newSlideElement.classList.add("active");

                initializeSelectedCountries();
                initializeSelectedLanguage();

                // Assign values to fields and update UI elements
                clearRequiredAttrAndValueOtpInputs();
                assignValuesToFields(nextSlide);
                updateQueryRoute(nextSlide);
                updateProgressBar(nextSlide, totalSlides);
                currentSlide = nextSlide;
                updateNavButtons();
            }
        } catch (error) {
            console.error("Error during slide change:", error);
        }
    };

    function updateQueryRoute(currentSlide = 1, form_id = null) {
        const url = new URL(window.location);
        url.searchParams.set("slide_no", currentSlide);
        if (form_id !== null) {
            url.searchParams.set("form_id", form_id);
        } else {
            url.searchParams.delete("form_id");
        }

        window.history.pushState({}, "", url);
    }

    conditionalFields.forEach(([trigger, target]) => {
        setupConditionalField(trigger, target);
    });

    function getAndStoreSlideFormData(slideNumber) {
        const element = document.getElementById(`slide${slideNumber}`);
        const formData = {};
        const checkboxes = {};

        // Iterate over all input elements within the slide
        element.querySelectorAll("input, select, textarea").forEach((input) => {
            if (input.name) {
                if (input.type === "radio") {
                    // For checkboxes and radio buttons, store the value only if checked
                    if (input.checked) {
                        formData[input.name] = input.value;
                    }
                } else if (input.type === "checkbox") {
                    // For checkboxes, store the values in an array if checked
                    if (input.checked) {
                        if (!checkboxes[input.name]) {
                            checkboxes[input.name] = [];
                        }
                        checkboxes[input.name].push(input.value);
                    }
                } else {
                    // For other input types, store the value
                    formData[input.name] = input.value;
                }
            }
        });

        for (let key in checkboxes) {
            formData[key] = JSON.stringify(checkboxes[key]);
        }

        // Store the form data in localStorage with the key 'slide_{slideNumber}'
        localStorage.setItem(`slide_${slideNumber}`, JSON.stringify(formData));

        return formData;
    }

    // Progress bar update function
    function updateProgressBar(currentSlide, totalSlides) {
        const progress = document.getElementById("progressBar");
        const progressText = document.getElementById("progressPercentage");

        if (progress && progressText) {
            // Calculate progress percentage
            const progressPercentage = Math.round(
                ((currentSlide - 1) / (totalSlides - 1)) * 100
            );

            // Update progress bar width
            progress.style.width = `${progressPercentage}%`;

            // Update progress text
            progressText.textContent = `${progressPercentage}%`;
        }
    }

    // Navigation buttons update function
    function updateNavButtons() {
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        if (prevBtn) {
            prevBtn.style.display = currentSlide === 1 ? "none" : "block";
        }

        if (nextBtn) {
            if (currentSlide === totalSlides) {
                nextBtn.textContent = "Submit";
                nextBtn.onclick = () => submitForm();
            } else {
                nextBtn.textContent = "Next";
                nextBtn.onclick = () => changeSlide(1);
            }
        }
    }

    // // Current slide validation
    // Current slide validation
    function validateCurrentSlide() {
        const currentSlideElement = getSlideElement(currentSlide);
        if (!currentSlideElement) return false;

        const requiredFields =
            currentSlideElement.querySelectorAll("[required]");
        let isValid = true;

        for (let field of requiredFields) {
            // Remove any existing error messages
            const errorElement = field.nextElementSibling;
            if (
                errorElement &&
                errorElement.classList.contains("error-message")
            ) {
                errorElement.remove();
            }

            // Check if the field is empty
            if (!field.value.trim()) {
                isValid = false;
                showError(field, "This field is required.");
                continue;
            }

            // Check field-specific validation
            if (field.type === "number" && isNaN(Number(field.value))) {
                isValid = false;
                showError(field, "Please enter a valid number.");
            } else if (field.type === "email" && !validateEmail(field.value)) {
                isValid = false;
                showError(field, "Please enter a valid email address.");
            } else if (field.type === "url" && !validateURL(field.value)) {
                isValid = false;
                showError(field, "Please enter a valid URL.");
            }
        }

        return isValid;
    }

    // Helper function to validate email
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Helper function to validate URL
    function validateURL(url) {
        try {
            new URL(url);
            return true;
        } catch {
            return false;
        }
    }

    function resetErrorOnChange() {
        const requiredFields = document.querySelectorAll("[required]");

        requiredFields.forEach((field) => {
            field.addEventListener("input", () => {
                const errorElement = field.nextElementSibling;
                if (
                    errorElement &&
                    errorElement.classList.contains("error-message")
                ) {
                    errorElement.remove();
                }
            });
        });
    }

    // Call resetErrorOnChange once when the script loads
    resetErrorOnChange();

    // Form submission function
    async function submitForm() {
        // Final validation
        if (validateCurrentSlide()) {
            const formToken = localStorage.getItem("form_token");
            getAndStoreSlideFormData(totalSlides);

            const currentSliderData = localStorage.getItem(
                `slide_${totalSlides}`
            );
            const currentParsedSliderData = currentSliderData
                ? JSON.parse(currentSliderData)
                : null;

            const updated = await updateOwnerFormData(
                formToken,
                totalSlides,
                currentParsedSliderData
            );

            if (updated) {
                await ownerFormSubmission(formToken);
            }
        }
    }

    // Initialize UI
    updateProgressBar(currentSlide, totalSlides);
    updateNavButtons();
});

document.querySelectorAll(".validate-text").forEach(function (input) {
    input.addEventListener("keyup", function () {
        var txt = /[^a-zA-Z ]/gi;
        this.value = this.value.replace(txt, "");
    });
});

function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "");
}

function OtherBankField() {
    const otherBank = document.getElementById("name_of_bank");
    const otherField = document.getElementById("otherBankField");

    if (otherBank.value === "Other") {
        otherField.classList.remove("hidden"); // Show the "Other" text field
    } else {
        otherField.classList.add("hidden"); // Hide the "Other" text field
        document.getElementById("other_bank_name").value = ""; // Clear the input field
    }
}

const verifyOtp = async (identifier, type, otp) => {
    const URL = $("#verify_otp_url").val();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    const payload = {
        identifier,
        type,
        otp,
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
                data: errorData,
            };
        }

        const data = await response.json(); // Parse the JSON response

        return {
            success: true,
            status: response.status,
            message: data.message || "OTP successfully verified!",
            data: data,
        };
    } catch (error) {
        // Handle network or unexpected errors
        return {
            success: false,
            status: 500,
            message: error.message || "An unexpected error occurred",
            data: null,
        };
    }
};

// Function to validate phone number
const sendOTP = async (identifier, type) => {
    const URL = $("#send_otp_url").val();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    const payload = {
        identifier,
        type,
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
                data: errorData,
            };
        }

        const data = await response.json(); // Parse the JSON response

        return {
            success: true,
            status: response.status,
            message: data.message || "OTP sent successfully!",
            data: data,
        };
    } catch (error) {
        // Handle network or unexpected errors
        return {
            success: false,
            status: 500,
            message: error.message || "An unexpected error occurred",
            data: null,
        };
    }
};

// Function to handle Send OTP button click for email and phone
async function handleVerifyOTP(identifierSelectorName, otpSelectorName, type) {
    // Find input by name attribute
    const identifierSelector = `[name="${identifierSelectorName}"]`;
    const inputSelector = `[name="${otpSelectorName}"]`;
    const identifierElement = $(identifierSelector);
    const inputElement = $(inputSelector);
    const otpSection = inputElement.closest(".form-group").find(".otp_section");

    if (!inputElement.length) {
        toastr.error(
            `${
                type.charAt(0).toUpperCase() + type.slice(1)
            } input or OTP section element not found.`
        );
        return;
    }

    const inputValue = inputElement.val().trim();
    const identifierValue = identifierElement.val().trim();

    const phoneRe =
        /^(\+?\d{1,3}[-\s]?)?\(?\d{1,4}\)?[-\s]?\d{1,4}[-\s]?\d{1,4}$/;

    // Check if the OTP is numeric
    if (type === "phone" && (isNaN(inputValue) || !phoneRe.test(inputValue))) {
        showOtpError(
            inputSelector,
            otpSection,
            "Please enter a valid phone number."
        );
        return;
    }

    // Call sendOTP function to simulate sending OTP (this should be an API call)
    const otpVerified = await verifyOtp(identifierValue, type, inputValue);

    if (otpVerified?.success) {
        showOtpError(inputSelector, otpSection, "OTP sent successfully.", true); // Success
    } else if (!otpVerified?.success && otpVerified?.status === 400) {
        // Handle case for already verified phone or email
        showOtpError(
            inputSelector,
            otpSection,
            `This ${type} is already verified.`,
            false
        );
    } else {
        showOtpError(
            inputSelector,
            otpSection,
            "Failed to verify OTP. Please try again.",
            false
        );
    }
}

// Helper function to show error message
function showOtpError(inputSelector, otpSection, message, isSuccess = false) {
    const messageClass = isSuccess ? "success-message" : "error-message";

    // Remove any previous success or error messages
    $(inputSelector)
        .closest(".form-group")
        .find(".success-message, .error-message")
        .remove();

    // Display the new message
    $(inputSelector).after(
        `<div class="${messageClass}" style="color: ${
            isSuccess ? "green" : "red"
        }; margin-top: 5px; font-size: 14px;">${message}</div>`
    );

    if (isSuccess) {
        // Show OTP section and make OTP input required
        $(otpSection).show();
        const otpInput = otpSection.find(".otp_input");
        otpInput.prop("required", true); // Make OTP input required
        otpInput.val(""); // Clear OTP input
    } else {
        // Hide OTP section if there's an error
        $(otpSection).hide();
    }
}

// Helper function to handle OTP section visibility and input requirements
function handleOTPSection(otpSection, isVisible) {
    otpSection = $(otpSection);
    otpSection.css("display", isVisible ? "block" : "none");

    // Find the OTP input inside the section and set the required attribute
    const otpInput = otpSection.find("input");
    if (otpInput.length) {
        otpInput.prop("required", isVisible);
    }
}

// Function to handle Send OTP button click for email and phone
async function handleSendOTP(selector, type) {
    // Find input by name attribute
    const inputSelector = `[name="${selector}"]`;
    const inputElement = $(inputSelector);
    const otpSection = inputElement.closest(".form-group").find(".otp_section");

    if (!inputElement.length) {
        `${
            type.charAt(0).toUpperCase() + type.slice(1)
        } input or OTP section element not found.`;
        return;
    }

    const inputValue = inputElement.val().trim();

    if (inputValue === "") {
        showOtpError(
            inputSelector,
            otpSection,
            `Please enter your ${
                type === "email" ? "email address" : "phone number"
            }.`
        );
        return;
    }

    // Validate phone number with regex if the type is "phone"
    if (type === "phone") {
        const phoneRe =
            /^(\+?\d{1,3}[-\s]?)?\(?\d{1,4}\)?[-\s]?\d{1,4}[-\s]?\d{1,4}$/;
        if (!phoneRe.test(inputValue)) {
            showOtpError(
                inputSelector,
                otpSection,
                "Please enter a valid phone number."
            );
            return;
        }
    }

    // Call sendOTP function to simulate sending OTP (this should be an API call)
    const otpSent = await sendOTP(inputValue, type);

    if (otpSent?.success) {
        showOtpError(inputSelector, otpSection, "OTP sent successfully.", true); // Success
    } else if (!otpSent?.success && otpSent?.status === 400) {
        // Handle case for already verified phone or email
        showOtpError(
            inputSelector,
            otpSection,
            `This ${type} is already verified.`,
            false
        );
    } else {
        showOtpError(
            inputSelector,
            otpSection,
            "Failed to send OTP. Please try again.",
            false
        );
    }
}

// Attach event listener to the Verify OTP button
document.querySelectorAll(".verify_email_otp_btn").forEach((button) => {
    button.addEventListener("click", function () {
        const otpInput = document.querySelector(".email_otp_input");

        if (!otpInput) {
            console.error("Email OTP input element not found.");
            return;
        }

        const otpValue = otpInput.value.trim();

        // Simulate OTP verification (replace this with actual verification logic)
        if (otpValue === "") {
            toastr.error("Please enter the OTP.");
        } else {
            toastr.success("Verifying OTP:", otpValue);
        }
    });
});

//function called when a radio button "i applied for a new Title/Concurrence on" is clicked
function toggleConcurrenceDate(showDateInput) {
    const dateInput = document.getElementById("yellow_card_date");
    if (showDateInput) {
        dateInput.style.display = "inline-block";
    } else {
        dateInput.style.display = "none";
        dateInput.value = ""; // Reset value when hidden
    }
}

// Add event listeners to other radio buttons
document
    .querySelectorAll('input[name="yellow_card_status"]')
    .forEach((radio) => {
        if (radio.id !== "applied_yellow") {
            radio.addEventListener("click", () => toggleYellowCardDate(false));
        }
    });

function toggleYellowCardDate(showDateInput) {
    const dateInput = document.getElementById("yellow_card_date");
    if (showDateInput) {
        dateInput.style.display = "inline-block";
    } else {
        dateInput.style.display = "none";
        dateInput.value = ""; // Reset value when hidden
    }
}

// Add event listeners to other radio buttons
document
    .querySelectorAll('input[name="yellow_card_status"]')
    .forEach((radio) => {
        if (radio.id !== "applied_yellow") {
            radio.addEventListener("click", () => toggleYellowCardDate(false));
        }
    });

document.addEventListener("DOMContentLoaded", () => {
    initImageCard();
});

function initImageCard() {
    const cards = document.querySelectorAll(".card");

    cards.forEach((card) => {
        const button = card.querySelector(".upload-btn");
        const input = card.querySelector('input[type="file"]');
        const loader = card.querySelector(".loader");
        const preview = card.querySelector(".preview");
        const hiddenInput = card.querySelector('input[type="hidden"]');

        // Event listener for the upload button
        button.addEventListener("click", () => {
            if (
                card?.dataset?.type &&
                card?.dataset?.type?.includes("holding")
            ) {
                // For holding ID cards, try using the camera directly
                if (card?.dataset?.type?.includes("front")) {
                    input.setAttribute("capture", "user");
                } else if (card?.dataset?.type?.includes("back")) {
                    input.setAttribute("capture", "user");
                }

                input.removeAttribute("accept");

                // Check if the capture attribute works, else fallback
                if (!isCaptureSupported()) {
                    fallbackCameraCapture(card);
                } else {
                    input.click();
                }
            } else {
                input.removeAttribute("capture");
                input.setAttribute("accept", "image/*");
                input.click();
            }
        });

        input.addEventListener("change", (e) => {
            const card = input.closest(".card");
            const isMultiple = input.dataset.multiple === "true";
            const loader = card.querySelector(".loader");
            const previewContainer = card.querySelector(".preview");
            const hiddenInput = card.querySelector(
                "input.store_file.original_path"
            );

            const minFileCount = input?.dataset?.min;
            const maxFileCount = input?.dataset?.max;

            const files = Array.from(e.target.files); // Convert FileList to Array

            if (!files.length) return;

            const count = files.length;
            if (
                (minFileCount && count < minFileCount) ||
                (maxFileCount && count > maxFileCount)
            ) {
                toastr.error(
                    `File count must be between minimum ${
                        minFileCount || 0
                    } and maximum ${maxFileCount || Infinity}`
                );
                return;
            }

            // Validate file types
            const invalidFiles = files.filter(
                (file) => !file.type.startsWith("image/")
            );
            if (invalidFiles.length) {
                toastr.error("Please select only valid image files.");

                return;
            }

            // Show loader
            loader.style.display = "block";
            $(loader).siblings(".preview").remove();

            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            const URL = $("#form_file_uploader_url").val();

            // Create FormData to send files via AJAX
            const formData = new FormData();

            if (isMultiple) {
                files.forEach((file, index) => {
                    formData.append(`images[${index}]`, file);
                });
            } else {
                formData.append("image", files[0]);
            }

            formData.append("_token", CSRF_TOKEN);
            formData.append("type", card.dataset.type);

            // AJAX Request
            $.ajax({
                url: URL,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": CSRF_TOKEN,
                },
                success: function (response) {
                    // Hide loader
                    loader.style.display = "none";

                    // Remove previous previews
                    if (previewContainer) {
                        previewContainer.innerHTML = ""; // Clear previews
                    }

                    const originalPaths = [];

                    if (isMultiple) {
                        // Handle multiple uploads
                        response.paths.forEach((item, index) => {
                            // Add preview
                            const img = document.createElement("img");
                            img.src = item.path;
                            img.style.maxWidth = "100%";
                            img.style.display = "block";
                            img.style.marginTop = "10px";
                            img.classList.add("preview"); // Add the "preview" class
                            if (loader) {
                                loader.after(img);
                            }

                            // Add new hidden input for each image
                            originalPaths.push(item.original_path);
                        });

                        hiddenInput.value = JSON.stringify(originalPaths);
                    } else {
                        // Handle single upload
                        const img = document.createElement("img");
                        img.src = response.path;
                        img.style.maxWidth = "100%";
                        img.style.marginTop = "10px";
                        img.src = response.path;
                        img.classList.add("preview"); // Add the "preview" class

                        if (loader) {
                            loader.after(img);
                        }

                        // Update hidden input with new value
                        hiddenInput.value = response.original_path;
                    }
                },
                error: function (xhr, status, error) {
                    loader.style.display = "none";
                    toastr.error("Error uploading file: " + error);
                },
            });
        });

        // Function to check if capture attribute is supported
        function isCaptureSupported() {
            return "capture" in input.attributes;
        }

        // Fallback method for camera capture using getUserMedia if capture doesn't work
        function fallbackCameraCapture(card) {
            const video = document.createElement("video");
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            // Attempt to access the camera
            navigator.mediaDevices
                .getUserMedia({ video: true })
                .then((stream) => {
                    // Show the video stream in the video element
                    video.srcObject = stream;
                    video.play();
                    document.body.appendChild(video);

                    // Add a capture button to take a snapshot
                    const captureButton = document.createElement("button");
                    captureButton.textContent = "Capture Image";
                    document.body.appendChild(captureButton);

                    captureButton.addEventListener("click", () => {
                        // Draw the video frame to the canvas
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        context.drawImage(
                            video,
                            0,
                            0,
                            canvas.width,
                            canvas.height
                        );

                        // Convert the canvas to an image and display it
                        const imageUrl = canvas.toDataURL("image/png");
                        preview.setAttribute("src", imageUrl);
                        preview.style.display = "block";

                        // Stop the video stream
                        stream.getTracks().forEach((track) => track.stop());

                        // Set the hidden input value to the captured image data
                        hiddenInput.value = imageUrl;

                        // Hide video and button after capture
                        video.style.display = "none";
                        captureButton.style.display = "none";
                    });
                })
                .catch((err) => {
                    console.error("Camera access error:", err);
                    toastr.error("Camera access failed. Please try again.");
                });
        }
    });
}

// Function to initialize image card logic for a specific pillar
function initImageCardForAddedItem(container) {
    const card = container.querySelector(".card");

    if (card) {
        const button = card.querySelector(".upload-btn");
        const input = card.querySelector('input[type="file"]');
        const loader = card.querySelector(".loader");
        const preview = card.querySelector(".preview");
        const hiddenInput = card.querySelector('input[type="hidden"]');

        // Event listener for the upload button
        button.addEventListener("click", () => {
            if (
                card?.dataset?.type &&
                card?.dataset?.type?.includes("holding")
            ) {
                // For holding ID cards, try using the camera directly
                if (card?.dataset?.type?.includes("front")) {
                    input.setAttribute("capture", "user");
                } else if (card?.dataset?.type?.includes("back")) {
                    input.setAttribute("capture", "user");
                }

                input.removeAttribute("accept");

                // Check if the capture attribute works, else fallback
                if (!isCaptureSupported()) {
                    fallbackCameraCapture(card);
                } else {
                    input.click();
                }
            } else {
                input.removeAttribute("capture");
                input.setAttribute("accept", "image/*");
                input.click();
            }
        });

        input.addEventListener("change", (e) => {
            const card = input.closest(".card");
            const isMultiple = input.dataset.multiple === "true";
            const loader = card.querySelector(".loader");
            const previewContainer = card.querySelector(".preview");
            const hiddenInput = card.querySelector(
                "input.store_file.original_path"
            );

            const minFileCount = input?.dataset?.min;
            const maxFileCount = input?.dataset?.max;

            const files = Array.from(e.target.files); // Convert FileList to Array

            if (!files.length) return;

            const count = files.length;
            if (
                (minFileCount && count < minFileCount) ||
                (maxFileCount && count > maxFileCount)
            ) {
                toastr.error(
                    `File count must be between minimum ${
                        minFileCount || 0
                    } and maximum ${maxFileCount || Infinity}`
                );
                return;
            }

            // Validate file types
            const invalidFiles = files.filter(
                (file) => !file.type.startsWith("image/")
            );
            if (invalidFiles.length) {
                toastr.error("Please select only valid image files.");
                return;
            }

            // Show loader
            loader.style.display = "block";
            $(loader).siblings(".preview").remove();

            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            const URL = $("#form_file_uploader_url").val();

            // Create FormData to send files via AJAX
            const formData = new FormData();

            if (isMultiple) {
                files.forEach((file, index) => {
                    formData.append(`images[${index}]`, file);
                });
            } else {
                formData.append("image", files[0]);
            }

            formData.append("_token", CSRF_TOKEN);
            formData.append("type", card.dataset.type);

            // AJAX Request
            $.ajax({
                url: URL,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": CSRF_TOKEN,
                },
                success: function (response) {
                    // Hide loader
                    loader.style.display = "none";

                    // Remove previous previews
                    if (previewContainer) {
                        previewContainer.innerHTML = ""; // Clear previews
                    }

                    const originalPaths = [];

                    if (isMultiple) {
                        // Handle multiple uploads
                        response.paths.forEach((item, index) => {
                            // Add preview
                            const img = document.createElement("img");
                            img.src = item.path;
                            img.style.maxWidth = "100%";
                            img.style.display = "block";
                            img.style.marginTop = "10px";
                            img.classList.add("preview"); // Add the "preview" class
                            if (loader) {
                                loader.after(img);
                            }

                            // Add new hidden input for each image
                            originalPaths.push(item.original_path);
                        });

                        hiddenInput.value = JSON.stringify(originalPaths);
                    } else {
                        // Handle single upload
                        const img = document.createElement("img");
                        img.src = response.path;
                        img.style.maxWidth = "100%";
                        img.style.marginTop = "10px";
                        img.src = response.path;
                        img.classList.add("preview"); // Add the "preview" class

                        if (loader) {
                            loader.after(img);
                        }

                        // Update hidden input with new value
                        hiddenInput.value = response.original_path;
                    }
                },
                error: function (xhr, status, error) {
                    loader.style.display = "none";
                    toastr.error("Error uploading file: " + error);
                },
            });
        });

        // Function to check if capture attribute is supported
        function isCaptureSupported() {
            return "capture" in input.attributes;
        }

        // Fallback method for camera capture using getUserMedia if capture doesn't work
        function fallbackCameraCapture(card) {
            const video = document.createElement("video");
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            navigator.mediaDevices
                .getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;
                    video.play();
                    document.body.appendChild(video);

                    const captureButton = document.createElement("button");
                    captureButton.textContent = "Capture Image";
                    document.body.appendChild(captureButton);

                    captureButton.addEventListener("click", () => {
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        context.drawImage(
                            video,
                            0,
                            0,
                            canvas.width,
                            canvas.height
                        );

                        const imageUrl = canvas.toDataURL("image/png");
                        preview.setAttribute("src", imageUrl);
                        preview.style.display = "block";

                        stream.getTracks().forEach((track) => track.stop());
                        hiddenInput.value = imageUrl;

                        video.style.display = "none";
                        captureButton.style.display = "none";
                    });
                })
                .catch((err) => {
                    toastr.error("Camera access failed. Please try again.");
                });
        }
    }
}

function assignValuesToFields(slideNumber) {
    const element = document.getElementById(`slide${slideNumber}`);
    const storedData = localStorage.getItem(`slide_${slideNumber}`);

    if (storedData) {
        const formData = JSON.parse(storedData);

        // Iterate over all input elements within the slide
        element.querySelectorAll("input, select, textarea").forEach((input) => {
            if (input.name && formData[input.name] !== undefined) {
                if (input.type === "radio") {
                    input.checked = formData[input.name] === input.value;

                    // Trigger the 'onclick' handler directly
                    const onclickHandler = input.getAttribute("onclick");
                    if (onclickHandler && input.checked) {
                        eval(onclickHandler);
                    }

                    const inputId = `#${input.id}`;

                    conditionalFields.forEach(([trigger, target]) => {
                        if (trigger == inputId || trigger == target) {
                            setupConditionalFieldDynamic(trigger, target);
                        }
                    });
                } else if (input.type === "checkbox") {
                    if (Array.isArray(formData[input.name])) {
                        input.checked = formData[input.name].includes(
                            input.value
                        );
                    } else {
                        try {
                            const parsedData = JSON.parse(formData[input.name]);
                            if (Array.isArray(parsedData)) {
                                input.checked = parsedData.includes(
                                    input.value
                                );
                            } else {
                                input.checked = false;
                            }
                        } catch (e) {
                            input.checked = false;
                        }
                    }

                    // Trigger the 'onclick' handler directly
                    const onclickHandler = input.getAttribute("onclick");
                    if (onclickHandler && input.checked) {
                        eval(onclickHandler);
                    }

                    const inputId = `#${input.id}`;

                    conditionalFields.forEach(([trigger, target]) => {
                        if (trigger == inputId || trigger == target) {
                            setupConditionalFieldDynamic(trigger, target);
                        }
                    });
                } else {
                    // Check if the input has the class 'original_path'
                    if (input.classList.contains("original_path")) {
                        if (input.dataset.multiple === "true") {
                            const preview = input
                                .closest(".card")
                                .querySelector(".preview");

                            const siblingImages = [
                                ...input.parentElement.querySelectorAll(
                                    "img[src]"
                                ),
                            ].filter(
                                (img) =>
                                    img.getAttribute("src") &&
                                    img.getAttribute("src").trim() !== ""
                            );

                            siblingImages.forEach((img) => img.remove());

                            if (preview && formData[input.name]) {
                                try {
                                    const parsedData = JSON.parse(
                                        formData[input.name]
                                    );
                                    if (Array.isArray(parsedData)) {
                                        // Loop through parsedData
                                        parsedData.forEach((item) => {
                                            // Create a new image element
                                            const img =
                                                document.createElement("img");

                                            // Set the image src to the current item from parsedData
                                            img.src =
                                                fullDomain + "/storage/" + item;

                                            // Ensure the image is displayed and apply styles
                                            img.style.display = "block";
                                            img.style.maxWidth = "100%"; // Optional, set max width if needed
                                            img.style.marginTop = "10px"; // Optional, add margin
                                            // Append the image after the preview element
                                            preview.after(
                                                img,
                                                preview.nextSibling
                                            );
                                        });
                                    }
                                } catch (e) {
                                    // Handle case where JSON parsing fails
                                    console.error(
                                        "Failed to parse formData:",
                                        e
                                    );
                                }
                            }
                        } else {
                            const preview = input
                                .closest(".card")
                                .querySelector(".preview");

                            // Set the 'src' attribute of the preview
                            if (preview && formData[input.name]) {
                                preview.style.display = "block";
                                preview.src =
                                    fullDomain +
                                    "/storage/" +
                                    formData[input.name];
                            }
                        }
                    }
                    input.value = formData[input.name];
                }
            }
        });

        appendPillar(formData);
        appendPermit(formData);
    }
}

async function initiateTemporaryOwnerForm(data) {
    const sliderOneData = localStorage.getItem("slide_1");
    const parsedData = sliderOneData ? JSON.parse(sliderOneData) : null;

    if (data && parsedData) {
        try {
            const response = await createTemporaryOwnerForm(
                {
                    slider_1: parsedData,
                    slider_2: data,
                },
                data?.phone,
                data?.email
            );

            return response; // Return the response (true or false)
        } catch (error) {
            console.error("Error in creating temporary owner form:", error);

            return false; // Return false in case of error
        }
    }

    return false; // Return false if data or parsedData is not available
}

function showError(field, message) {
    const existingError = field.nextElementSibling;
    if (existingError && existingError.classList.contains("error-message")) {
        existingError.remove();
    }

    // Create a new error message
    const errorMessage = document.createElement("div");
    errorMessage.textContent = message;
    errorMessage.classList.add("error-message");
    errorMessage.style.color = "red";
    errorMessage.style.marginTop = "5px";
    errorMessage.style.fontSize = "14px";

    // Add the new error message after the field
    field.after(errorMessage);
}

async function getSingleFormData(formToken, slide_no) {
    try {
        const URL = $("#proper_owner_form_base_url").val();
        const response = await fetch(`${URL}/${formToken}/${slide_no}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        return null;
    }
}

function createTemporaryOwnerForm(items, phone, email) {
    return new Promise((resolve, reject) => {
        $("#prevBtn").attr("disabled", true);
        $("#nextBtn").attr("disabled", true);
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        const URL = $("#create_temporary_owner_url").val();

        let formData = {
            _token: CSRF_TOKEN,
            items: items,
            phone: phone,
            email: email,
            verified_via: "phone",
            last_updated_slide_no: 2,
            last_completed_slide_no: 2,
        };

        $.ajax({
            url: URL, // Replace with the actual route
            type: "POST",
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
            success: function (response) {
                if (response.success) {
                    console.log("before form");
                    console.log(response);

                    localStorage.setItem("form_token", response?.data?.token);
                    showCurrentlyUpdatingFormInfo(
                        response?.data?.token,
                        response?.data?.phone,
                        response?.data?.email
                    );
                }

                $("#prevBtn").attr("disabled", false);
                $("#nextBtn").attr("disabled", false);

                resolve(true); // Resolving the promise with true
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Validation errors
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = "Validation errors:\n";
                    $.each(errors, function (key, value) {
                        const field = $(`input[name='${key}']`);
                        showError(field, value.join(", "));
                        errorMessage += `${key}: ${value.join(", ")}\n`;
                    });

                    $("#prevBtn").attr("disabled", false);
                    $("#nextBtn").attr("disabled", false);

                    return false;
                }

                $("#prevBtn").attr("disabled", false);
                $("#nextBtn").attr("disabled", false);

                reject(false); // Rejecting the promise with false
            },
        });
    });
}

async function updateOwnerFormData(formToken, slide_no, items) {
    const BASE_URL = $("#proper_owner_form_base_url").val();
    const URL = `${BASE_URL}/${formToken}/${slide_no}`;
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $("#prevBtn, #nextBtn").attr("disabled", true); // Disable buttons

    try {
        const response = await $.ajax({
            url: URL,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                items: items,
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
        });

        if (response.success) {
            return true;
        } else {
            console.error("Unexpected response format:", response);
            return false;
        }
    } catch (xhr) {
        if (xhr.status === 422) {
            // Validation errors
            let errors = xhr.responseJSON.errors;
            let errorMessage = "Validation errors:\n";
            $.each(errors, function (key, value) {
                const field = $(`input[name='${key}']`);
                showError(field, value.join(", "));
                errorMessage += `${key}: ${value.join(", ")}\n`;
            });
            return false;
        } else {
            console.error(
                "An error occurred:",
                xhr.statusText || "Unknown error"
            );
        }
        return false;
    } finally {
        $("#prevBtn, #nextBtn").attr("disabled", false); // Re-enable buttons
    }
}

$(document).on("submit", "#verificationForm", async function () {
    // Prevent form submission to handle it via JavaScript
    event.preventDefault();

    // Get the values of the fields
    const identifier = $("#verificationForm input[name='identifier']").val();
    const retrive_via = $(
        "#verificationForm input[name='retrive_via']:checked"
    ).val();

    const submitButton = $(this).find("button[type='submit']");
    submitButton.attr("disabled", true);
    submitButton.text("Retrieving...");

    await retriveProgress(retrive_via, identifier);

    // Re-enable the submit button and reset the text
    submitButton.attr("disabled", false);
    submitButton.text("Retrieve");
});

async function retriveProgress(retrive_via, identifier) {
    const retrive_progress_url = $("#retrive_progress_url").val();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    $("#verificationForm .modal-warning").remove();

    let formData = {
        _token: CSRF_TOKEN,
        retrive_via,
        identifier,
    };

    $.ajax({
        url: retrive_progress_url,
        type: "POST",
        data: formData,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
        success: function (response) {
            if (response.success) {
                if (response?.data) {
                    cleanLocalStorage();
                    const { owner, items } = response?.data;
                    if (owner?.token) {
                        localStorage.setItem("form_token", owner?.token);
                    }

                    if (owner?.last_completed_slide_no) {
                        // Get the current URL
                        let currentUrl = window.location.href;

                        // Create a URL object
                        let url = new URL(currentUrl);

                        localStorage.setItem(
                            `slide_${owner?.last_completed_slide_no}`,
                            JSON.stringify(items)
                        );

                        let searchParams = url.searchParams;
                        if (searchParams.has("slide_no")) {
                            searchParams.set(
                                "slide_no",
                                owner?.last_completed_slide_no
                            );
                        }
                        window.location.href = url.toString();
                    }
                }
            }
            return true;
        },
        error: function (xhr) {
            if (xhr.status === 404) {
                const error = `<small class="modal-warning">No form found!</small>`;
                $("#verificationForm #identifier").after(error);
                return false;
            }

            const error = `<small class="modal-warning">Something went wrong!</small>`;
            $("#verificationForm #identifier").after(error);
            return false;
        },
    });
}

async function ownerFormSubmission(token) {
    const owner_form_submit_url = $("#owner_form_submit_url").val();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    let formData = {
        _token: CSRF_TOKEN,
        token,
    };

    $.ajax({
        url: owner_form_submit_url,
        type: "POST",
        data: formData,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
        success: function (response) {
            if (response.success) {
                if (response?.data) {
                    disableBeforeUnload();
                    cleanLocalStorage();
                    let currentUrl = window.location.href;
                    let url = new URL(currentUrl);
                    let searchParams = url.searchParams;
                    searchParams.set("slide_no", 1);

                    // window.location.href = url.toString();
                    window.location.href = response?.redirect_url;
                }
            }
            return true;
        },
        error: function (xhr) {
            toastr.error("Something went wrong!");
            return false;
        },
    });
}

$(document).on("click", "#submitNew", function () {
    submitNewForm();
});

function submitNewForm() {
    let currentUrl = window.location.href;
    let url = new URL(currentUrl);
    let searchParams = url.searchParams;
    searchParams.set("slide_no", 1);
    window.location.href = url.toString();
    if (isConfirmedToLeave) {
        cleanLocalStorage();
    }
}

function showCurrentlyUpdatingFormInfo(token, phone, email) {
    $("#currently_updating_info").show();
    $("#currently_updating_info #currently_updating_info_token").text(token);
    $("#currently_updating_info #currently_updating_info_phone").text(phone);
    $("#currently_updating_info #currently_updating_info_email").text(email);
}

function cleanLocalStorage() {
    for (let i = 1; i <= 21; i++) {
        localStorage.removeItem(`slide_${i}`);
    }
    localStorage.removeItem("form_token");
}

function clearRequiredAttrAndValueOtpInputs() {
    const emailOtpInputs = document.querySelectorAll(
        ".email_otp_section input"
    );
    const otpInputs = document.querySelectorAll(".otp_section input");

    const allInputs = [...emailOtpInputs, ...otpInputs];

    allInputs.forEach((input) => {
        input.value = "";
        input.required = false;
    });
}
