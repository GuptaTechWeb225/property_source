<div id="slide13" class="form-slide slide">
    <div class="slide-number">13/21</div>
    <h2>Building Permit Details</h2>
    <br>
    <div class="form-group">
        <label for="land_title_number">Building Permit Number:</label>
        <input type="text" id="land_title_number" name="land_title_number" placeholder="Enter Building Permit Number">
    </div>


    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Building Permit Image</h3>
            <p>photos to be taken or attached</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="building_permit_images" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="building_permit_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>





    <div class="form-group">
        <label>Building Permit Status</label>
        <div>
            <label for="apply_for_new">
                <input type="radio" name="building_permit_status" id="apply_for_new"
                    value="Apply for new building Permit">
                <span>Apply for new building Permit</span>
            </label>
            <label for="renew">
                <input type="radio" name="building_permit_status" id="renew" value="Renew building permit">
                <span>Renew building permit</span>
            </label>
            <a href="#" target="_blank">
                <h6>(Click here to pay)</h6>
            </a>
        </div>
    </div>
    <!-- Payment Code -->
    <div class="form-group">
        <label for="payment_code_for_permit">Payment Code:</label>
        <input type="text" id="payment_code_for_permit" name="payment_code_for_permit" placeholder="Enter Payment Code">
    </div>

    <div class="form-group">
        <h3>Permit Details (Optional)</h3>

        <!-- Permits Details Container -->
        <div id="permitDetailsContainer">
            <!-- Permit 1 -->
            <div class="permit-details" id="permit-1">
                <h4>Permit 1</h4>
                <div class="form-group">
                    <label for="permit_name_1">Permit Name:</label>
                    <input type="text" id="permit_name_1" name="permit_name_1" placeholder="Enter permit name">
                </div>
                <div class="form-group">
                    <label for="permit_issuer_1">Issuer:</label>
                    <input type="text" id="permit_issuer_1" name="permit_issuer_1" placeholder="Enter issuer">
                </div>
                <div class="form-group">
                    <label>Region:</label>
                    <select id="region" name="permit_region_1">
                        <option value="">Select Region</option>
                        <option value="Eastern">Eastern Region</option>
                        <option value="Ahafo">Ahafo Region</option>
                        <option value="Bono">Bono Region</option>
                        <option value="BonoEast">Bono East</option>
                        <option value="Central">Central Region</option>
                        <option value="GreaterAccra">Greater Accra Region</option>
                        <option value="NorthEast">North East Region</option>
                        <option value="Northern">Northern Region</option>
                        <option value="Oti">Oti Region</option>
                        <option value="Savannah">Savannah Region</option>
                        <option value="UpperEast">Upper East Region</option>
                        <option value="UpperWest">Upper West Region</option>
                        <option value="Volta">Volta Region</option>
                        <option value="Western">Western Region</option>
                    </select>

                </div>
                <div class="form-group">
                    <label>District/Municipal/Metro:</label>
                    <select id="district" name="permit_district_1">
                        <option value="">Select District/Municipal/Metro</option>
                        <option value="Abuakwa North Muncipal">Abuakwa North Muncipal</option>
                        <option value="Abuakwa South Muncipal">Abuakwa South Muncipal</option>
                        <option value="Achiase">Achiase</option>
                        <option value="Akuapim South">Akuapim South</option>
                        <option value="Akyemansa">Akyemansa</option>
                        <option value="Asene Manso Akroso">Asene Manso Akroso</option>
                        <option value="Asuogyaman">Asuogyaman</option>
                        <option value="Atiwa East">Atiwa East</option>
                        <option value="Atiwa West">Atiwa West</option>
                        <option value="Ayensuano">Ayensuano</option>
                        <option value="Birim Central Municipal">Birim Central Municipal</option>
                        <option value="Birim North">Birim North</option>
                        <option value="Birim South">Birim South</option>
                        <option value="Denkyembour">Denkyembour</option>
                        <option value="Fanteakwa North">Fanteakwa North</option>
                        <option value="Fanteakwa South">Fanteakwa South</option>
                        <option value="Kwaebibirem Municipal">Kwaebibirem Municipal</option>
                        <option value="Kwahu Afram Plains North">Kwahu Afram Plains North</option>
                        <option value="Kwahu Afram Plains South">Kwahu Afram Plains South</option>
                        <option value="Kwahu East">Kwahu East</option>
                        <option value="Kwahu South">Kwahu South</option>
                        <option value="Kwahu West Municipal">Kwahu West Municipal</option>
                        <option value="Lower Manya Krobo Municipal">Lower Manya Krobo Municipal</option>
                        <option value="New Juaben North Municipal">New Juaben North Municipal</option>
                        <option value="New Juaben South Municipal">New Juaben South Municipal</option>
                        <option value="Nsawam Adoagyire Municipal">Nsawam Adoagyire Municipal</option>
                        <option value="Okere">Okere</option>
                        <option value="Suhum Municipal">Suhum Municipal</option>
                        <option value="Upper Manya Krobo">Upper Manya Krobo</option>
                        <option value="Upper West Akim">Upper West Akim</option>
                        <option value="West Akim Municipal">West Akim Municipal</option>
                        <option value="Yilo Krobo Municipal">Yilo Krobo Municipal</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="permit_purpose_1">Permit Purpose:</label>
                    <input type="text" id="permit_purpose_1" name="permit_purpose_1"
                        placeholder="Enter permit purpose">
                </div>
                <div class="form-group">
                    <label for="permit_issuing_date_1">Issuing Date:</label>
                    <input type="date" id="permit_issuing_date_1" name="permit_issuing_date_1" value="2024-12-09">
                </div>
                <div class="form-group">
                    <label for="permit_expiry_date_1">Expiry Date:</label>
                    <input type="date" id="permit_expiry_date_1" name="permit_expiry_date_1" value="2024-12-09">
                </div>
                <div class="form-group">
                    <label for="permit_cost_1">Permit Cost:</label>
                    <input type="text" id="permit_cost_1" name="permit_cost_1" placeholder="Enter permit cost">
                </div>
                <div class="form-group">
                    <label for="payment_code_for_permit_1">Payment Code:</label>
                    <input type="text" id="payment_code_for_permit_1" name="payment_code_for_permit_1"
                        placeholder="Enter payment code">
                </div>
                <div class="form-group">
                    <label for="permit_issuing_officer_1">Issuing Officer:</label>
                    <input type="text" id="permit_issuing_officer_1" name="permit_issuing_officer_1"
                        placeholder="Enter issuing officer">
                </div>
            </div>
        </div>

        <!-- Add More Permit Button -->
        <button id="addPermitBtn" class="upload-btn" onclick="addPermit()">Click here to add more
            permit</button>
    </div>
</div>
