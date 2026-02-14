<div id="slide18" class="form-slide slide">
    <div class="slide-number">18/21</div>
    <h2>Facility Registration Form</h2>
    <br>

    <div class="form-group">
        <label for="facility_name">Facility Name</label>
        <input type="text" id="facility_name" name="facility_name">
    </div>

    <div class="form-group">
        <label for="facility_type">Facility Type</label>
        <input type="text" id="facility_type" name="facility_type">
    </div>

    <div class="form-group">
        <label for="facility_make">Facility Make</label>
        <input type="text" id="facility_make" name="facility_make">
    </div>

    <div class="form-group">
        <label for="facility_model">Facility Model</label>
        <input type="text" id="facility_model" name="facility_model">
    </div>

    <div class="form-group">
        <label for="facility_serial_number">Serial Number</label>
        <input type="text" id="facility_serial_number" name="facility_serial_number">
    </div>

    <div class="form-group">
        <label for="facility_manufacturing_date">Facility Manufacturing Date</label>
        <input type="date" id="facility_manufacturing_date" name="facility_manufacturing_date">
    </div>

    <div class="form-group">
        <label for="facility_expiry_date">Expiry Date</label>
        <input type="date" id="facility_expiry_date" name="facility_expiry_date">
    </div>

    <div class="card" data-type="back">
        <h3>Facility Media File</h3>
        <br>
        <p>Take or attach a photo</p>
        <button class="upload-btn" type="button">Upload Image</button>
        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="facility_media_file"
            data-multiple="false">
        <input type="hidden" class="store_file original_path" name="facility_media_file">
        <div class="loader" style="display: none;">Uploading...</div>
        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
    </div>


    <div class="form-group">
        <label for="serial_number_of_facilities">Serial Number of The Facilities Entered</label>
        <input type="text" id="serial_number_of_facilities" name="serial_number_of_facilities">
    </div>

    <div class="form-group">
        <label for="receipt_number_of_facility">Document/Receipt Number</label>
        <input type="text" id="receipt_number_of_facility" name="receipt_number_of_facility">
    </div>

</div>
