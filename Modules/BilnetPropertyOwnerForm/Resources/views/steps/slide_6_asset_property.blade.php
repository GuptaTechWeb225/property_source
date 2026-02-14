<div id="slide6" class="form-slide slide">
    <div class="slide-number">6/21</div>
    <h2>Property/Asset Information</h2>
    <br>

    <!-- Property/Asset Type Selection -->
    <div class="form-group">
        <label>Type of Property/Asset</label>
        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="type_of_propery" value="Bare land" id="bareLandCheckbox"
                    onclick="togglePropertyFields()"> Bare Land
            </label>
            <label>
                <input type="checkbox" name="type_of_propery" value="Building" id="buildingCheckbox"
                    onclick="togglePropertyFields()"> Building
            </label>
            <label>
                <input type="checkbox" name="type_of_propery" value="Property" id="property_ip"
                    onclick="togglePropertyFields()"> IP
            </label>
            <label>
                <input type="checkbox" name="type_of_propery" value="Others" id="property_others"
                    onclick="togglePropertyFields()" checked> Others
            </label>
        </div>
    </div>
    <div class="hr"></div>
    <div class="form-group">
        <label>Status of Property/Asset</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="completion_status" value="completed"> Completed
            </label>
            <label>
                <input type="radio" name="completion_status" value="uncompleted"> Uncompleted
            </label>
            <label>
                <input type="radio" name="completion_status" value="new" checked> New
            </label>
        </div>
    </div>

    <!-- Property/Asset Address Form -->
    <div id="propertyFields" class="conditional-field hidden">
        <h3>Property/Asset Address</h3>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="asset_address" name="asset_address" placeholder="Click here to enter text.">
        </div>
        <div class="form-group">
            <label for="asset_house_number">House Number <span class="required">*</span></label>
            <input type="text" id="asset_house_number" name="asset_house_number" placeholder="Click here to enter text.">
        </div>
        <div class="form-group">
            <label for="locality">Locality <span class="required">*</span></label>
            <input type="text" id="asset_locality" name="asset_locality" placeholder="Click here to enter text.">
        </div>
        <div class="form-group">
            <label for="town">Town <span class="required">*</span></label>
            <select id="town" name="asset_town" >
                <option value="">Select Town</option>
                <option value="Kukurantumi">Kukurantumi</option>
                <option value="Kibi">Kibi</option>
                <option value="Achiase">Achiase</option>
                <option value="Akropong">Akropong</option>
                <option value="Aburi">Aburi</option>
                <option value="Ofoase">Ofoase</option>
                <option value="Manso">Manso</option>
                <option value="Atimpoku">Atimpoku</option>
                <option value="Anyinam">Anyinam</option>
                <option value="Kwabeng">Kwabeng</option>
                <option value="Coaltar">Coaltar</option>
                <option value="Akim Oda">Akim Oda</option>
                <option value="New Abirem">New Abirem</option>
                <option value="Akim Swedru">Akim Swedru</option>
                <option value="Akwatia">Akwatia</option>
                <option value="Begoro">Begoro</option>
                <option value="Osino">Osino</option>
                <option value="Kade">Kade</option>
                <option value="Donkorkrom">Donkorkrom</option>
                <option value="Tease, Ghana">Tease, Ghana</option>
                <option value="Abetifi">Abetifi</option>
                <option value="Mpraeso">Mpraeso</option>
                <option value="Nkawkaw">Nkawkaw</option>
                <option value="Krobo Odumase">Krobo Odumase</option>
                <option value="Effiduase">Effiduase</option>
                <option value="Koforidua">Koforidua</option>
                <option value="Nsawam">Nsawam</option>
                <option value="Adukrom">Adukrom</option>
                <option value="Suhum">Suhum</option>
                <option value="Asesewa">Asesewa</option>
                <option value="Adeiso">Adeiso</option>
                <option value="Asamankese">Asamankese</option>
                <option value="Somanya">Somanya</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="form-group">
            <label for="district">Municipal/District <span class="required">*</span></label>
            <select id="asset_district" name="asset_district" >
                <option value="">Select Municipal/District</option>
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
            <label>Region<span class="required">*</span></label>
            <select name="property_asset_region" id="property_asset_region" onchange="toggleOtherRegionField()">
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
                <option value="Other">Other</option>
            </select>
            <div id="otherPropertyAssetRegionField" class="conditional-field hidden">
                <input type="text" name="other_asset_region" id="other_asset_region"
                    placeholder="Specify Region">
            </div>
        </div>


        <div class="form-group">
            <label for="digitalAddress">Digital Address <span class="required">*</span></label>
            <input type="text" id="asset_digital_address" name="asset_digital_address"
                placeholder="Click here to enter text." >
            <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
                <h6>(Click here for your free digital address and office space.)</h6>
            </a>
        </div>
        <div class="form-group">
            <label for="asset_longitude">Logngitude No</label>
            <input type="text" id="asset_longitude" name="asset_longitude" placeholder="Generated asset_longitude">
            <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
                <h6>(Click here for your free digital address and office space.)</h6>
            </a>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude No</label>
            <input type="text" id="asset_latitude" name="asset_latitude" placeholder="Generated Latitude">
            <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
                <h6>(Click here for your free digital address and office space.)</h6>
            </a>
        </div>
        <div class="form-group">
            <label for="asset_po_box">P. O. Box/PMB Number</label>
            <input type="text" id="asset_po_box" name="asset_po_box" placeholder="Click here to enter text.">
        </div>
        <div class="form-group">
            <label for="asset_site_plan_number">Site Plan Number</label>
            <input type="text" id="asset_site_plan_number" name="asset_site_plan_number"
                placeholder="Click here to enter text.">
        </div>
        <div class="form-group">
            <label for="asset_land_size">Land Size</label>
            <input type="text" id="asset_land_size" name="asset_land_size" placeholder="x feet by x feet">
        </div>

        <div class="form-group">
            <label>Site Plan Attachment</label>
            <div class="radio-group">
                <div class="attachment-container">
                    <div class="card-grid">
                        <div class="card" data-type="front">
                            <h3>Site Plan QR Image</h3>
                            <p>Open camera to scan QR code</p>
                            <button class="upload-btn" type="button">Upload Image</button>
                            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                                id="assset_site_plan_qr_image" data-multiple="false">
                            <input type="hidden" class="store_file original_path" name="assset_site_plan_qr_image">
                            <div class="loader" style="display: none;">Uploading...</div>
                            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                        </div>

                        <div class="card" data-type="back">
                            <h3>Attach Site Plan</h3>
                            <p>Open camera to snap site plan or attach site plan image</p>
                            <button class="upload-btn" type="button" id="asset_attach_site_plan">Upload
                                Image</button>
                            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                                id="assset_attach_site_plan" data-multiple="false">
                            <input type="hidden" class="store_file original_path" name="assset_attach_site_plan">
                            <div class="loader" style="display: none;">Uploading...</div>
                            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
