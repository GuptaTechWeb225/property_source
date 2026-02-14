<div id="slide17" class="form-slide slide">
    <div class="slide-number">17/21</div>
    <h2>House/Space Purpose Registration</h2>
    <br>

    <div class="form-group">
        <label>Room/Space Owner</label>
        <div class="radio-group">
            <label for="same_as_property_owner">
                <input type="radio" name="property_owner" id="same_as_property_owner" value="Same as property owner"
                    checked>
                <span>Same as property owner</span>
            </label>
            <label for="different_owner">
                <input type="radio" name="property_owner" id="different_owner" value="Different Owner">
                <span>Different Owner</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="owner_name">Name</label>
        <input type="text" id="owner_name" name="owner_name">
    </div>

    <div class="form-group">
        <label for="owner_id_number">ID Number</label>
        <input type="text" id="owner_id_number" name="owner_id_number">
    </div>

    <div class="form-group">
        <label>Purpose</label>
        <div class="radio-group">
            <label for="property_personal_use">
                <input type="radio" name="property_purpose" id="property_personal_use" value="Personal use" checked>
                <span>Personal Use</span>
            </label>
            <label for="property_residential">
                <input type="radio" name="property_purpose" id="property_residential" value="Residential">
                <span>Residential</span>
            </label>
            <label for="property_caretaking">
                <input type="radio" name="property_purpose" id="property_caretaking" value="Caretaking">
                <span>Caretaking</span>
            </label>
            <label for="property_will">
                <input type="radio" name="property_purpose" id="property_will" value="Will">
                <span>Will</span>
            </label>
            <label for="property_collateral">
                <input type="radio" name="property_purpose" id="property_collateral" value="Collateral">
                <span>Collateral</span>
            </label>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <label>Commercial</label>
        <div class="radio-group">
            <label for="commercial_rent">
                <input type="radio" name="commercial_purpose" id="commercial_rent" value="Rent" checked>
                <span>Rent</span>
            </label>
            <label for="commercial_sell">
                <input type="radio" name="commercial_purpose" id="commercial_sell" value="Sell">
                <span>Sell</span>
            </label>
            <label for="commercial_lease">
                <input type="radio" name="commercial_purpose" id="commercial_lease" value="Lease">
                <span>Lease</span>
            </label>
            <label for="commercial_mortgage">
                <input type="radio" name="commercial_purpose" id="commercial_mortgage" value="Mortgage">
                <span>Mortgage</span>
            </label>
            <label for="commercial_auction">
                <input type="radio" name="commercial_purpose" id="commercial_auction" value="Auction">
                <span>Auction</span>
            </label>
            <label for="commercial_caretaking">
                <input type="radio" name="commercial_purpose" id="commercial_caretaking" value="Caretaking">
                <span>Caretaking</span>
            </label>
            <label for="commercial_will">
                <input type="radio" name="commercial_purpose" id="commercial_will" value="Will">
                <span>Will</span>
            </label>
            <label for="commercial_collateral">
                <input type="radio" name="commercial_purpose" id="commercial_collateral" value="Collateral">
                <span>Collateral</span>
            </label>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <label>Mixed Use</label>
        <div class="radio-group">
            <label for="mixed_personal_use">
                <input type="radio" name="mixed_purpose" id="mixed_rent" value="Personal Use" checked>
                <span>Personal Use</span>
            </label>
            <label for="mixed_rent">
                <input type="radio" name="mixed_purpose" id="mixed_rent" value="Rent">
                <span>Rent</span>
            </label>
            <label for="mixed_sell">
                <input type="radio" name="mixed_purpose" id="mixed_sell" value="Sell">
                <span>Sell</span>
            </label>
            <label for="mixed_lease">
                <input type="radio" name="mixed_purpose" id="mixed_lease" value="Lease">
                <span>Lease</span>
            </label>
            <label for="mixed_mortgage">
                <input type="radio" name="mixed_purpose" id="mixed_mortgage" value="Mortgage">
                <span>Mortgage</span>
            </label>
            <label for="mixed_auction">
                <input type="radio" name="mixed_purpose" id="mixed_auction" value="Auction">
                <span>Auction</span>
            </label>
            <label for="mixed_caretaking">
                <input type="radio" name="mixed_purpose" id="mixed_caretaking" value="Caretaking">
                <span>Caretaking</span>
            </label>
            <label for="mixed_will">
                <input type="radio" name="mixed_purpose" id="mixed_will" value="Will">
                <span>Will</span>
            </label>
            <label for="cmixed_collateral">
                <input type="radio" name="mixed_purpose" id="mixed_collateral" value="Collateral">
                <span>Collateral</span>
            </label>
        </div>
    </div>

    <h3>Payment Plan</h3>
    <div class="form-group">
        <label>Rent Mode</label>
        <div class="radio-group">
            <label for="rent_mode_hourly">
                <input type="radio" name="rent_mode" id="rent_mode_hourly" value="Hourly" checked>
                <span>Hourly</span>
            </label>
            <label for="rent_mode_daily">
                <input type="radio" name="rent_mode" id="rent_mode_daily" value="Daily">
                <span>Daily</span>
            </label>
            <label for="rent_mode_weekly">
                <input type="radio" name="rent_mode" id="rent_mode_weekly" value="Weekly">
                <span>Weekly</span>
            </label>
            <label for="rent_mode_monthly">
                <input type="radio" name="rent_mode" id="rent_mode_monthly" value="Monthly">
                <span>Monthly</span>
            </label>
            <label for="rent_mode_annually">
                <input type="radio" name="rent_mode" id="rent_mode_annually" value="Annually">
                <span>Annually</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Rent Mode Duration</label>
        <input type="number" name="digital_address" placeholder="Enter Rent Mode Duration" min=1>
    </div>

    <div class="form-group">
        <label>Rent Currency</label>
        <div class="radio-group">
            <label for="rent_currency_ghc">
                <input type="radio" name="rent_currency" id="rent_currency_ghc" value="GH¢" checked>
                <span>GH¢</span>
            </label>
            <label for="rent_currency_usd">
                <input type="radio" name="rent_currency" id="rent_currency_usd" value="USD">
                <span>USD</span>
            </label>
            <label for="rent_currency_gbp">
                <input type="radio" name="rent_currency" id="rent_currency_gbp" value="GBP">
                <span>GBP</span>
            </label>
            <label for="rent_currency_euro">
                <input type="radio" name="rent_currency" id="rent_currency_euro" value="EURO">
                <span>EURO</span>
            </label>
            <label for="rent_currency_naira">
                <input type="radio" name="rent_currency" id="rent_currency_naira" value="NAIRA">
                <span>NAIRA</span>
            </label>

            <label for="currency_other">
                <input type="radio" name="currency_type" id="currency_other" value="Other"
                    onchange="toggleOtherCurrencyField()">
                <span>Other</span>
            </label>
        </div>
        <div id="currencyOtherField" class="conditional-field hidden">
            <input type="text" name="currency_other_field_input" id="currency_other_field_input"
                placeholder="Specify other currency">
        </div>
    </div>

    <div class="form-group">
        <label for="payment_mode">Payment Mode</label>
        <select id="payment_mode" name="payment_mode">
            <option value="">Select a payment mode</option>
            <option value="Electronic">Electronic</option>
            <option value="Momo">Momo</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Cheque">Cheque</option>
        </select>
    </div>

    <h4>Momo</h4>
    <div class="form-group">
        <label for="momo_network_carrier">Select Network Carrier</label>
        <select id="momo_network_carrier" name="momo_network_carrier" onchange="toggleOtherCarrierField()">
            <option value="">Select a network carrier</option>
            <option value="MTN">MTN</option>
            <option value="Telecel">Telecel</option>
            <option value="Airtel Tigo">Airtel Tigo</option>
            <option value="Other">Other (please specify)</option>
        </select>
        <div id="otherCarrierField" class="conditional-field hidden">
            <input type="text" id="other_carrier_input" name="other_carrier"
                placeholder="Specify other network carrier">
        </div>
    </div>


    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="phone_number" name="network_carrier_phone">
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('network_carrier_phone', 'phone')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="network_carrier_phone_otp" required>
            <button type="button"
                onclick="handleVerifyOTP('network_carrier_phone', 'network_carrier_phone_otp', 'phone')">Verify
                OTP</button>
        </div>
    </div>

    <h4>Bank Transfer</h4>
    <div class="form-group">
        <label for="name_of_bank">Name of Bank</label>
        <select id="name_of_bank" name="name_of_bank" onchange="OtherBankField()">
            <option value="">Select a bank name</option>
            <option value="ABSA Bank">ABSA Bank</option>
            <option value="ADB">ADB</option>
            <option value="ACCESS BANK">ACCESS BANK</option>
            <option value="CAL BANK">CAL BANK</option>
            <option value="GT BANK">GT BANK</option>
            <option value="J.P. Morgan Chase & Co.">J.P. Morgan Chase & Co.</option>
            <option value="Bank of America">Bank of America</option>
            <option value="CitiGroup">CitiGroup</option>
            <option value="HSBC">HSBC</option>
            <option value="Standard Chartered">Standard Chartered</option>
            <option value="Nedbank">Nedbank</option>
            <option value="African Bank Limited">African Bank Limited</option>
            <option value="Ecobank">Ecobank</option>
            <option value="Investec">Investec</option>
            <option value="Wells Fargo">Wells Fargo</option>
            <option value="Royal Bank of Canada">Royal Bank of Canada</option>
            <option value="Citibank">Citibank</option>
            <option value="United Bank for Africa">United Bank for Africa</option>
            <option value="Attijariwafa Bank">Attijariwafa Bank</option>
            <option value="Banque Misr">Banque Misr</option>
            <option value="Habib Bank AG Zurich">Habib Bank AG Zurich</option>
            <option value="Zenith Bank">Zenith Bank</option>
            <option value="Fidelity Bank PLC">Fidelity Bank PLC</option>
            <option value="Access Bank">Access Bank</option>
            <option value="Standard Bank">Standard Bank</option>
            <option value="Banque Populaire du Maroc">Banque Populaire du Maroc</option>
            <option value="Guaranty Trust Bank Limited">Guaranty Trust Bank Limited</option>
            <option value="Capitec Bank">Capitec Bank</option>
            <option id="bank_other_id" value="Other">Other</option>

        </select>
        <div id="otherBankField" class="conditional-field hidden">
            <input type="text" name="other_bank_name" id="other_bank_name" placeholder="Specify Bank Name">
        </div>
    </div>

    <div class="form-group">
        <label>Account Name</label>
        <input type="text" name="purpose_account_name">
    </div>
    <div class="form-group">
        <label>Account Number</label>
        <input type="text" name="purpose_account_number">
    </div>

    <h4>Cheque Payment</h4>

    <div class="form-group">
        <label>Cheque Number</label>
        <input type="text" name="purpose_cheque_number">
    </div>
    <div class="form-group">
        <label>Cheque Date</label>
        <input type="date" name="purpose_cheque_date">
    </div>
    <div class="form-group">
        <label>Cheque Digital Signature</label>
        <input type="text" name="purpose_cheque_digital_signature">
    </div>

    <!-- Back of Card -->
    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Cheque QR Image</h3>
            <br>
            <p>Open camera to scan QR code</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="cheque_qr_image" data-multiple="false">
            <input type="hidden" class="store_file original_path" name="cheque_qr_image">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>

    <!-- Back of Card -->
    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Cheque Image</h3>
            <br>
            <p>Take or attach a photo</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="cheque_image"
                data-multiple="false">
            <input type="hidden" class="store_file original_path" name="cheque_image">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>

    <h4>Tenants Information</h4>

    <div class="form-group">
        <label>Tenants Members Mode</label>
        <input type="text" name="tenants_members_mode">
    </div>

    <div class="form-group">
        <label>Tenants Sex Mode</label>
        <div class="radio-group">
            <label><input type="radio" name="tenants_sex_mode" value="Male">Male</label>
            <label><input type="radio" name="tenants_sex_mode" value="Female"> Female</label>
            <label><input type="radio" name="tenants_sex_mode" value="Others"
                    onclick="toggleOtherField('tenants_sex_mode')">Other</label>
        </div>
        <input type="text" id="tenants_sex_mode-other" class="other-field hidden"
            placeholder="Specify other sex mode">
    </div>

    <div class="form-group">
        <label>Foreigners Allowed</label>
        <div class="radio-group">
            <label for="foreigners_allowed_yes">
                <input type="radio" name="foreigners_allowed" id="foreigners_allowed_yes" value="Yes" checked>
                <span>Yes</span>
            </label>
            <label for="foreigners_allowed_no">
                <input type="radio" name="foreigners_allowed" id="foreigners_allowed_no" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <!-- Tribes Allowed -->
    <div class="form-group">
        <!-- Tribe Selection Dropdown -->
        <div class="form-group">
            <label for="tribeDropdown">Tribes Allowed</label>
            <select id="tribeDropdown">
                <option value="">Select a tribe</option>
                <option value="Except Ewes">Except Ewes</option>
                <option value="Ga">Ga</option>
                <option value="Akan">Akan</option>
                <option value="Fante">Fante</option>
                <option value="Hausa">Hausa</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <!-- Selected Tribes -->
        <div id="selectedTribesWrapper" class="form-group hidden">
            <label>Selected Tribes:</label>
            <div id="selectedTribes"></div>
        </div>
    </div>



    <div class="form-group">
        <label for="tenants_age_group">Tenants Age Group</label>
        <select id="tenants_age_group" name="tenants_age_group">
            <option value="">Select age group</option>
            <option value="1 Year">1-10 Years</option>
            <option value="2 Years">10-20 Years</option>
            <option value="3 Years">20-30 Years</option>
            <option value="4 Years">30-40 Years</option>
            <option value="5 Years">40-50 Years</option>
            <option value="6 Years">50-60 Years</option>
            <option value="7 Years">60-70 Years</option>
            <option value="8 Years">70-80 Years</option>
            <option value="9 Years">80-90 Years</option>
            <option value="10 Years">90-200 Years</option>
        </select>
    </div>

    <h4>Tenants expected Income Range</h4>
    <div class="form-group">
        <label>Currency</label>
        <div class="radio-group">
            <label for="tenant_currency_ghc">
                <input type="radio" name="tenant_currency" id="tenant_currency_ghc" value="GH¢" checked>
                <span>GH¢</span>
            </label>
            <label for="tenant_currency_usd">
                <input type="radio" name="tenant_currency" id="tenant_currency_usd" value="USD">
                <span>USD</span>
            </label>
            <label for="tenant_currency_gbp">
                <input type="radio" name="tenant_currency" id="tenant_currency_gbp" value="GBP">
                <span>GBP</span>
            </label>
            <label for="tenant_currency_euro">
                <input type="radio" name="tenant_currency" id="tenant_currency_euro" value="EURO">
                <span>EURO</span>
            </label>
            <label for="tenant_currency_naira">
                <input type="radio" name="tenant_currency" id="tenant_currency_naira" value="NAIRA">
                <span>NAIRA</span>
            </label>
            <label for="currency_other">
                <input type="radio" name="currency_type" id="currency_other" value="Other"
                    onchange="toggleOtherCurrencyField()">
                <span>Other</span>
            </label>
        </div>
        <div id="currencyOtherField" class="conditional-field hidden">
            <input type="text" name="currency_other_field_input" id="currency_other_field_input"
                placeholder="Specify other currency">
        </div>
    </div>

    <div class="form-group">
        <label>Amount</label>
        <input type="number" name="tenant_amount" min=0>
    </div>

    <!-- Livestock -->
    <div class="form-group">
        <label>Pets/Livestock All Allowed</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="petsAllowed" value="Yes" onclick="togglePetsNumber(true)"> Yes
            </label>
            <label>
                <input type="radio" name="petsAllowed" value="No" onclick="togglePetsNumber(false)" checked>
                No
            </label>
        </div>
    </div>

    <!-- Number Field for Pets -->
    <div class="form-group hidden" id="petsNumberField">
        <label for="numberOfPets">If Yes, How Many:</label>
        <input type="number" id="numberOfPets" name="numberOfPets" placeholder="Enter number of pets"
            min="1">
    </div>

    <hr>

    <div class="form-group">
        <label>Categories</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="livestock_categories" value="Domestic"> Domestic
            </label>
            <label>
                <input type="radio" name="livestock_categories" value="Wild"> Wild
            </label>
            <label>
                <input type="radio" name="livestock_categories" value="Mixed"> Mixed
            </label>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label>Types of Pets/Livestock Allowed</label>
        <div class="utilities-checkbox-group">
            <label>All Allowed Except</label>
            <label><input type="checkbox" name="allowed_pets" value="Dog"> Dog</label>
            <label><input type="checkbox" name="allowed_pets" value="Cat"> Cat</label>
            <label><input type="checkbox" name="allowed_pets" value="Cattle"> Cattle</label>
            <label><input type="checkbox" name="allowed_pets" value="Pig"> Pig</label>
            <label><input type="checkbox" name="allowed_pets" value="Goat"> Goat</label>
            <label><input type="checkbox" name="allowed_pets" value="Sheep"> Sheep</label>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="form-group">
            <label>Smoking Allowed</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="smokingAllowed" value="Yes" onclick="toggleSmokingOptions(true)">
                    Yes
                </label>
                <label>
                    <input type="radio" name="smokingAllowed" value="No"
                        onclick="toggleSmokingOptions(false)"> No
                </label>
            </div>
        </div>

        <!-- Smoking Type Options -->
        <div class="form-group hidden" id="smokingTypeOptions">
            <label>Type of Smoke Allowed:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="smokeType" value="Marijuana"> Marijuana</label>
                <label><input type="checkbox" name="smokeType" value="Cigarette"> Cigarette</label>
                <label><input type="checkbox" name="smokeType" value="Tobacco"> Tobacco</label>
                <label><input type="checkbox" name="smokeType" value="Electronic"> Electronic</label>
                <label>
                    <input type="checkbox" name="smokeType" value="Others" onclick="toggleOtherField('smokeType')">
                    Others
                </label>
            </div>
            <input type="text" id="smokeType-other" class="other-field hidden"
                placeholder="Specify other type of smoke">
        </div>
    </div>

    <div class="form-group">
        <label>Byelaws and Agreement</label>
        <textarea name="byelaws_and_agreement" style="resize: vertical;"></textarea>
    </div>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Attach Byelaws and Agreement Files/Media Files</h3>
            <br>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="byelaws_files"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="byelaws_files" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>



    <div class="form-group">
        <label>Rent Control Law</label>
        <textarea name="byelaws_and_agreement" style="resize: vertical;"></textarea>
        <a href="https://www.mwh.gov.gh/rcd/" target="_blank">
            <h6>(Click here to visit Rent Control Website)</h6>
        </a>
    </div>


    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Attach Byelaws and Agreement Files/Media Files</h3>
            <br>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="rent_control_files" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="rent_control_files" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>



</div>
