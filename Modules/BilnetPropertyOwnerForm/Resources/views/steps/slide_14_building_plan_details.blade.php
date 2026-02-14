<div id="slide14" class="form-slide slide">
    <div class="slide-number">14/21</div>
    <h2>Building Plan Details</h2>
    <br>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>BOQ Files</h3>
            <p>More files can be attached</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="building_plan_images"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="building_plan_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>


    <div class="form-group">
        <label>Storey</label>
        <input type="number" name="storey" min=0 max=1000>
    </div>



    <div class="form-group">
        <div class="card" data-type="back">
            <h3>BOQ Files</h3>
            <p>More files can be attached</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="boq_images"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="boq_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>


    <div class="form-group">
        <label>Current Building Status</label>
        <div class="radio-group">
            <label for="completed_with_finishes">
                <input type="radio" name="current_building_status" id="completed_with_finishes"
                    value="Completed With Finishes">
                <span>Completed With Finishes</span>
            </label>
            <label for="completed_without_finishes">
                <input type="radio" name="current_building_status" id="completed_without_finishes"
                    value="Completed Without Finishes">
                <span>Completed Without Finishes</span>
            </label>
            <label for="uncompleted">
                <input type="radio" name="current_building_status" id="uncompleted" value="Uncompleted">
                <span>Uncompleted</span>
            </label>
        </div>
    </div>

    <h4>Architech Details</h4>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="architect_first_name">
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="architect_last_name">
    </div>

    <div class="form-group">
        <label>Other Names</label>
        <input type="text" name="architect_other_name">
    </div>
    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="architect_id_number">
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="phone_number" name="architech_phone">
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('architech_phone', 'phone')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="architech_phone_otp" required>
            <button type="button" onclick="handleVerifyOTP('architech_phone', 'architech_phone_otp', 'phone')">Verify
                OTP</button>
        </div>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="phone_number" name="architech_email">
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('architech_email', 'email')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="architech_email_otp" required>
            <button type="button" onclick="handleVerifyOTP('architech_email', 'architech_email_otp', 'email')">Verify
                OTP</button>
        </div>
    </div>

    <h2>Building Color</h2>
    <br>
    <!-- Exterior Color Scheme -->
    <div class="form-group">
        <h4>Exterior: Color Scheme</h4>
        <div class="building-color-checkbox-group">
            <label>
                <input type="checkbox" name="exteriorColors" value="White"> White
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Yellow"> Yellow
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Cream"> Cream
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Red"> Red
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Blue"> Blue
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Brown"> Brown
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Black"> Black
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Grey"> Grey
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Pink"> Pink
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Purple"> Purple
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Green"> Green
            </label>
            <label>
                <input type="checkbox" name="exteriorColors" value="Others"
                    onclick="toggleOtherField('exteriorColors')"> Others
            </label>
        </div>
        <input type="text" id="exteriorColors-other" class="other-field building-color-custom hidden"
            placeholder="Specify other colors">
    </div>

    <!-- Interior Color Scheme -->
    <div class="form-group">
        <h4>Interior: Color Scheme</h4>
        <div class="building-color-checkbox-group">
            <label>
                <input type="checkbox" name="interiorColors" value="White"> White
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Yellow"> Yellow
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Cream"> Cream
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Red"> Red
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Blue"> Blue
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Brown"> Brown
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Black"> Black
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Grey"> Grey
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Pink"> Pink
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Purple"> Purple
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Green"> Green
            </label>
            <label>
                <input type="checkbox" name="interiorColors" value="Others"
                    onclick="toggleOtherField('interiorColors')"> Others
            </label>
        </div>
        <input type="text" id="interiorColors-other" class="other-field building-color-custom hidden"
            placeholder="Specify other colors">
    </div>


    <h2>Utilities</h2>
    <br>
    <!-- Electricity Supply -->
    <div class="form-group">
        <h4>Electricity Supply</h4>
        <div class="utilities-checkbox-group">
            <label>
                <input type="checkbox" name="electricitySupply" value="ECG"> ECG
            </label>
            <label>
                <input type="checkbox" name="electricitySupply" value="Solar"> SOLAR
            </label>
            <label>
                <input type="checkbox" name="electricitySupply" value="IDEIST"> IDEIST
            </label>
            <label>
                <input type="checkbox" name="electricitySupply" value="Others"
                    onclick="toggleOtherField('electricitySupply')"> OTHERS
            </label>
        </div>
        <input type="text" id="electricitySupply-other" class="other-field utilities-other-field hidden"
            placeholder="Specify other electricity supply">

        <hr>
        <div class="form-group">
            <label>Meter Type</label>
            <div class="utilities-checkbox-group">
                <label><input type="checkbox" name="electricityMeter" value="Prepaid"> Prepaid</label>
                <label><input type="checkbox" name="electricityMeter" value="Postpaid"> Postpaid</label>
                <label><input type="checkbox" name="electricityMeter" value="Smart"> Smart</label>
                <label><input type="checkbox" name="electricityMeter" value="QR Code/Image"> QR
                    Code/Image</label>
            </div>
        </div>
        <div class="form-group">
            <label for="electricityDeviceId">Meter/Device ID Number:</label>
            <input type="text" id="electricityDeviceId" placeholder="Enter meter/device ID">
        </div>
    </div>

    <!-- Water Supply -->
    <div class="form-group">
        <h4>Water Supply</h4>
        <div class="utilities-checkbox-group">
            <label>
                <input type="checkbox" name="waterSupply" value="GWCL"> GWCL
            </label>
            <label>
                <input type="checkbox" name="waterSupply" value="Borehole"> Borehole
            </label>
            <label>
                <input type="checkbox" name="waterSupply" value="Well"> Well
            </label>
            <label>
                <input type="checkbox" name="waterSupply" value="Community Water Supply"> Community Water
                Supply
            </label>
            <label>
                <input type="checkbox" name="waterSupply" value="Water Car Supply"> Water Car Supply
            </label>
            <label>
                <input type="checkbox" name="waterSupply" value="Others" onclick="toggleOtherField('waterSupply')">
                Others
            </label>
        </div>
        <input type="text" id="waterSupply-other" class="other-field utilities-other-field hidden"
            placeholder="Specify other water supply">
        <br>
        <div class="form-group">
            <label for="gwclMeterNumber">GWCL Meter Number:</label>
            <input type="text" id="gwclMeterNumber" placeholder="Enter GWCL Meter Number">
        </div>
        <div class="form-group">
            <label>Meter Type</label>
            <div class="utilities-checkbox-group">
                <label><input type="checkbox" name="waterMeter" value="Prepaid"> Prepaid</label>
                <label><input type="checkbox" name="waterMeter" value="Postpaid"> Postpaid</label>
                <label><input type="checkbox" name="waterMeter" value="Smart"> Smart</label>
                <label><input type="checkbox" name="waterMeter" value="QR Code/Image"> QR
                    Code/Image</label>
            </div>
        </div>
        <div class="form-group">
            <label for="waterDeviceId">Meter/Device ID Number:</label>
            <input type="text" id="waterDeviceId" placeholder="Enter meter/device ID">
        </div>
    </div>

    <!-- Gas Supply -->
    <div class="form-group">
        <h4>Gas Supply</h4>
        <div class="utilities-checkbox-group">
            <label>
                <input type="checkbox" name="gasSupply" value="Home Delivery"> Home Delivery
            </label>
            <label>
                <input type="checkbox" name="gasSupply" value="Domestic Gas Supply"> Domestic Gas Supply
            </label>
        </div>
        <div class="form-group">
            <label for="gasMeterNumber">Gas Meter Number:</label>
            <input type="text" id="gasMeterNumber" placeholder="Enter gas meter number">
        </div>
        <div class="form-group">
            <label>Meter Type</label>
            <div class="utilities-checkbox-group">
                <label><input type="checkbox" name="gasMeter" value="Prepaid"> Prepaid</label>
                <label><input type="checkbox" name="gasMeter" value="Postpaid"> Postpaid</label>
                <label><input type="checkbox" name="gasMeter" value="Smart"> Smart</label>
                <label><input type="checkbox" name="gasMeter" value="QR Code/Image"> QR Code/Image</label>
            </div>
        </div>
        <div class="form-group">
            <label for="gasDeviceId">Meter/Device ID Number:</label>
            <input type="text" id="gasDeviceId" placeholder="Enter meter/device ID">
        </div>
    </div>
</div>
