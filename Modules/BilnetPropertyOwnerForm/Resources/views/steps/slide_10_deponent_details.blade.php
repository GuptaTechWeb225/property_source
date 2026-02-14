<div id="slide10" class="form-slide slide">
    <div class="slide-number">10/21</div>
    <h2>Deponent Details</h2>
    <br>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="deponent_name">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="deponent_digital_address">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="deponent_id_number">
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="phone_number" name="deponent_phone">
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('deponent_phone','phone')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="deponent_phone_otp" required>
            <button type="button" onclick="handleVerifyOTP('deponent_phone', 'deponent_phone_otp', 'phone')">Verify
                OTP</button>
        </div>
    </div>


    <div class="form-group">
        <label>Email</label>
        <input type="text" class="email_address" name="deponent_email">
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('deponent_email','email')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="deponent_email_otp" required>
            <button type="button" onclick="handleVerifyOTP('deponent_email', 'deponent_email_otp', 'email')">Verify
                OTP</button>
        </div>
    </div>

    <div class="form-group email_otp_section" style="display: none;">
        <label>Enter OTP</label>
        <input type="text" class="email_otp_input" name="email_otp" required>
    </div>

    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="deponent_living_yes">
                <input type="radio" name="deponent_living" id="deponent_living_yes" value="Yes">
                <span>Yes</span>
            </label>
            <label for="deponent_living_no">
                <input type="radio" name="deponent_living" id="deponent_living_no" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="deponent_digital_signature">
    </div>

    <h3>Indenture Details</h3>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Indenture Files</h3>
            <p>Open camera to snap files/attach files from external source About 100 Attachment can be attached here</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="indenture_files"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="indenture_files" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>


    <div class="form-group">
        <label>Term <span class="required">*</span></label>
        <select name="term" required>
            <option value="">Select Number of years</option>
            <option value="1-10 Years">1-10 Years</option>
            <option value="10-20 Years">10-20 Years</option>
            <option value="20-30 Years">20-30 Years</option>
            <option value="30-40 Years">30-40 Years</option>
            <option value="40-50 Years">40-50 Years</option>
            <option value="50-60 Years">50-60 Years</option>
            <option value="60-70 Years">60-70 Years</option>
            <option value="70-80 Years">70-80 Years</option>
            <option value="80-90 Years">80-90 Years</option>
            <option value="10 Years">90-200 Years</option>
        </select>
    </div>

    <div class="form-group">
        <label>Start Period</label>
        <input type="date" name="start_period">
    </div>

    <div class="form-group">
        <label>End Period</label>
        <input type="date" name="end_period">
    </div>


    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Agreement Files</h3>
            <p>Click to add Files and Click to add Images</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="agreement_files" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="agreement_files" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>




    <div class="form-group">
        <label>Agreement Text</label>
        <textarea name="agreement_text" style="resize: vertical;"></textarea>
    </div>


    <h3>Solicitor's Personal Details</h3>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="solicitor_name">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="solicitor_digital_address">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="solicitor_id_number">
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="phone_number" name="solicior_phone">
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('solicior_phone','phone')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="solicior_phone_otp" required>
            <button type="button" onclick="handleVerifyOTP('solicior_phone', 'solicior_phone_otp', 'phone')">Verify
                OTP</button>
        </div>
    </div>



    <div class="form-group">
        <label>Email</label>
        <input type="text" class="email_address" name="solicitor_email">
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('solicitor_email','email')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="solicitor_email_otp" required>
            <button type="button" onclick="handleVerifyOTP('solicitor_email', 'solicitor_email_otp', 'email')">Verify
                OTP</button>
        </div>
    </div>


    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="solicitor_living_yes">
                <input type="radio" name="solicitor_living" id="solicitor_living_yes" value="Yes">
                <span>Yes</span>
            </label>
            <label for="solicitor_living_no">
                <input type="radio" name="solicitor_living" id="solicitor_living_no" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="solicitor_digital_signature">
    </div>

</div>
