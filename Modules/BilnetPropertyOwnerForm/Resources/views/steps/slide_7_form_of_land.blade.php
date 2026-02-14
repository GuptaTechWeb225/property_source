<div id="slide7" class="form-slide slide">
    <div class="slide-number">7/21</div>
    <h2>Land Details</h2>
    <br>
    <div class="form-group">
        <table class="plan-of-land-table">
            <!-- First Row -->
            <tr>
                <td colspan="3" class="center">
                    <p>Plan of Land</p>
                    <p>For: <input type="text" id="plan_for" name="plan_for" placeholder="Enter text"></p>
                </td>
            </tr>

            <!-- Second Row -->
            <tr>
                <td>
                    <label>Scale:</label> <input type="text" id="scale" name="scale" placeholder="Enter scale">
                </td>
                <td>
                    <label>Area:</label><input type="text" id="area" name="area" placeholder="Enter area">
                </td>
            </tr>

            <!-- Third Row -->
            <tr>
                <td class="center">
                    <label>Locality:</label> <input type="text" id="locality" name="locality"
                        placeholder="Enter locality">
                </td>
                <td>
                    <label>District/Metro/Municipal:</label>
                    <select id="plan_for_district" name="plan_for_district">
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
                </td>
                <td>
                    <label>Region:</label>
                    <select id="plan_for_region" name="plan_for_region">
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
                </td>
            </tr>

            <!-- Fourth Row -->
            <tr>
                <td colspan="3" class="empty-row"></td>
            </tr>

            <!-- Fifth Row -->
            <tr>
                <!-- First Column -->
                <td>
                    <p>
                        <span>I,</span> <input type="text" id="surveyor_name" name="surveyor_name"
                            placeholder="Enter your name">. Licensed
                        surveyor hereby certify
                        that this plan is faithfully and correctly executed and accurately shows the land within
                        the limits of
                        the description given to me by my client.
                    </p>
                    <p>
                        Date: <input type="date" id="surveyor_date" name="surveyor_date">
                    </p>
                </td>

                <!-- Second Column -->
                <td>
                    <div class="card" data-type="back">
                        <p>Approved Seal</p>
                        <p>Upload Signature (file field):</p>
                        {{-- <input type="file" id="signature" accept="image/png, image/jpeg, image/webp" capture="camera"> --}}
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="camera" style="display: none;"
                            id="property_asset_signature" data-multiple="false">
                        <input type="hidden" class="store_file original_path" name="property_asset_signature">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>

                    <p>Lic. Surveyor’s Number:</p>
                    <input type="text" id="license_number" name="license_number"
                        placeholder="Enter license number">
                </td>

                <!-- Third Column -->
                <td>
                    <p>Approved by</p>
                    <p>
                        Regional Surveyor Ghana Card ID. Number:
                        <input type="text" id="ghana_card" name="ghana_card" placeholder="Enter Ghana Card ID">
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="form-container">
        <h3>Pillar Details</h3>

        <!-- Pillar Details Container -->
        <div id="pillarDetailsContainer">
            <!-- Pillar 1 Details -->
            <div class="pillar-details" id="pillar-1">
                <h4>Pillar 1 Details</h4>
                <div class="form-group">
                    <label for="pillar_number_1">Pillar Number 1:</label>
                    <input type="text" id="pillar_number_1" name="pillar_number_1"
                        placeholder="Enter pillar number">
                    <a href="#" target="_blank">
                        <h6>(Click this link to generate Pillar digital address number )</h6>
                    </a>
                </div>
                <div class="form-group">
                    <label for="pillar_address_1">Pillar 1 Digital Address Number:</label>
                    <input type="text" id="pillar_address_1" name="pillar_address_1"
                        placeholder="Enter digital address number">
                </div>
                <div class="form-group">
                    <div class="card" data-type="back">
                        <h3>Pillar Images</h3>
                        <p>2 photos to be taken or attached</p>
                        <button class="upload-btn" type="button">Upload Image</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="pillar_image_1" data-multiple="true" data-min="2" data-max="2" multiple>
                        <input type="hidden" class="store_file original_path" name="pillar_image_1"
                            data-multiple="true">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                </div>
            </div>

            <!-- Pillar 2 Details -->
            <div class="pillar-details" id="pillar-2">
                <h4>Pillar 2 Details</h4>
                <div class="form-group">
                    <label for="pillar_number_2">Pillar Number 2:</label>
                    <input type="text" id="pillar_number_2" name="pillar_number_2"
                        placeholder="Enter pillar number">
                    <a href="#" target="_blank">
                        <h6>(Click this link to generate Pillar digital address number )</h6>
                    </a>
                </div>
                <div class="form-group">
                    <label for="pillar_address_2">Pillar 2 Digital Address Number:</label>
                    <input type="text" id="pillar_address_2" name="pillar_address_2"
                        placeholder="Enter digital address number">
                </div>
                <div class="form-group">
                    <div class="card" data-type="back">
                        <h3>Pillar Images</h3>
                        <p>2 photos to be taken or attached</p>
                        <button class="upload-btn" type="button">Upload Image</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="pillar_image_2" data-multiple="true" data-min="2" data-max="2" multiple>
                        <input type="hidden" class="store_file original_path" name="pillar_image_2"
                            data-multiple="true">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                </div>

            </div>

            <!-- Pillar 3 Details -->
            <div class="pillar-details" id="pillar-3">
                <h4>Pillar 3 Details</h4>
                <div class="form-group">
                    <label for="pillar_number_3">Pillar Number 3:</label>
                    <input type="text" id="pillar_number_3" name="pillar_number_3"
                        placeholder="Enter pillar number">
                    <a href="#" target="_blank">
                        <h6>(Click this link to generate Pillar digital address number )</h6>
                    </a>
                </div>
                <div class="form-group">
                    <label for="pillar_address_3">Pillar 3 Digital Address Number:</label>
                    <input type="text" id="pillar_address_3" name="pillar_address_3"
                        placeholder="Enter digital address number">
                </div>
                <div class="form-group">
                    <div class="card" data-type="back">
                        <h3>Pillar Images</h3>
                        <p>2 photos to be taken or attached</p>
                        <button class="upload-btn" type="button">Upload Image</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="pillar_image_3" data-multiple="true" data-min="2" data-max="2" multiple>
                        <input type="hidden" class="store_file original_path" name="pillar_image_3"
                            data-multiple="true">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                </div>

            </div>

            <!-- Pillar 4 Details -->
            <div class="pillar-details" id="pillar-4">
                <h4>Pillar 4 Details</h4>
                <div class="form-group">
                    <label for="pillar_number_4">Pillar Number 4:</label>
                    <input type="text" id="pillar_number_4" name="pillar_number_4"
                        placeholder="Enter pillar number">
                    <a href="#" target="_blank">
                        <h6>(Click this link to generate Pillar digital address number )</h6>
                    </a>
                </div>
                <div class="form-group">
                    <label for="pillar_address_4">Pillar 4 Digital Address Number:</label>
                    <input type="text" id="pillar_address_4" name="pillar_address_4"
                        placeholder="Enter digital address number">
                </div>
                <div class="form-group">
                    <div class="card" data-type="back">
                        <h3>Pillar Images</h3>
                        <p>2 photos to be taken or attached</p>
                        <button class="upload-btn" type="button">Upload Image</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="pillar_image_4" data-multiple="true" data-min="2" data-max="2" multiple>
                        <input type="hidden" class="store_file original_path" name="pillar_image_4"
                            data-multiple="true">
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Add More Button -->
        <button id="addPillarBtn" class="upload-btn" onclick="addPillar()">Add More Pillar Details
            (+)</button>
    </div>


</div>
