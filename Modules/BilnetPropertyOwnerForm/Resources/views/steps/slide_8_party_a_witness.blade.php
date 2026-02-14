<div id="slide8" class="form-slide slide">
    <div class="slide-number">8/21</div>
    <h2>Indenture Details (A)</h2>
    <br>
    <div class="form-group">
        <br>
        <h5>This indenture is in between</h5>
        <br>
        <h3>PARTY "A" REP</h3>
    </div>

    <div class="form-group">
        <label>Representing As</label>
        <div class="radio-group">
            <label for="ra_lessor_a">
                <input type="radio" name="representing_as_a" id="ra_lessor_a" value="Lessor" checked>
                <span>Lessor</span>
            </label>
            <label for="ra_lessee_a">
                <input type="radio" name="representing_as_a" id="ra_lessee_a" value="Lessee">
                <span>Lessee</span>
            </label>
            <label for="ra_agent_a">
                <input type="radio" name="representing_as_a" id="ra_agent_a" value="Agent">
                <span>Agent</span>
            </label>
        </div>
    </div>
    <div class="hr"></div>
    <div class="form-group">
        <label>Representing For</label>
        <div class="radio-group">
            <label for="rf_individual_a">
                <input type="radio" name="representing_for_a" id="rf_individual_a" value="Individual" checked>
                <span>Individual</span>
            </label>
            <label for="rf_organization_a">
                <input type="radio" name="representing_for_a" id="rf_organization_a" value="Organization">
                <span>Organization</span>
            </label>
            <label for="rf_stool_a">
                <input type="radio" name="representing_for_a" id="rf_stool_a" value="Stool">
                <span>Stool</span>
            </label>
            <label for="rf_community_a">
                <input type="radio" name="representing_for_a" id="rf_community_a" value="Community">
                <span>Community</span>
            </label>
            <label for="rf_clan_a">
                <input type="radio" name="representing_for_a" id="rf_clan_a" value="Clan">
                <span>Clan</span>
            </label>
            <label for="rf_family_a">
                <input type="radio" name="representing_for_a" id="rf_family_a" value="Family">
                <span>Family</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Title <span class="required">*</span></label>
        <select name="rep_title_a" required>
            <option value="">Select Title</option>
            <option value="PARAMOUNT CHIEF">PARAMOUNT CHIEF</option>
            <option value="SUB CHIEF">SUB CHIEF</option>
            <option value="QUEENMOTHER">QUEENMOTHER</option>
            <option value="PRINCIPAL LANDOWNER">PRINCIPAL LANDOWNER</option>
            <option value="JOINT LANDOWNER">JOINT LANDOWNER</option>
            <option value="LAND ALLOCATOR">LAND ALLOCATOR</option>
            <option value="CORPORATE PROPERTY MANAGER">CORPORATE PROPERTY MANAGER</option>
            <option value="CUSTOMARY TRUSTEE">CUSTOMARY TRUSTEE</option>
            <option value="COMPANY ADMINISTRATOR">COMPANY ADMINISTRATOR</option>
            <option value="TRUST ADMINISTRATOR">TRUST ADMINISTRATOR</option>
            <option value="DEVELOPMENT REPRESENTATIVE">DEVELOPMENT REPRESENTATIVE</option>


        </select>
    </div>

    <div class="form-group">
        <label>Title Numerals <span class="required">*</span></label>
        <select name="rep_title_numerals_a" required>
            <option value="">Select Title</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
            <option value="IX">IX</option>
            <option value="X">X</option>
            <option value="NONE">NONE</option>
        </select>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="rep_name_a">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="rep_digital_address_a">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="rep_id_number_a">
    </div>

    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label>
        <input type="text" class="phone_number" name="rep_phone_a" required>
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('rep_phone_a', 'phone')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_phone_a_otp">
            <button type="button" onclick="handleVerifyOTP('rep_phone_a', 'rep_phone_a_otp', 'phone')">Verify
                OTP</button>
        </div>

    </div>

    <div class="form-group">
        <label>Email <span class="required">*</span></label>
        <input type="text" class="email_address" name="rep_email_a" required>
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('rep_email_a', 'email')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_email_a_otp">
            <button type="button" onclick="handleVerifyOTP('rep_email_a', 'rep_email_a_otp', 'email')">Verify
                OTP</button>
        </div>

    </div>

    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="living_yes_a">
                <input type="radio" name="living_a" id="living_yes_a" value="Yes" required>
                <span>Yes</span>
            </label>
            <label for="living_no_a">
                <input type="radio" name="living_a" id="living_no_a" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="digital_signature_a">
    </div>

    <!-- PARTY A WITNESSES -->
    <div class="form-group">
        <h3>PARTY "A" REP Witnesses</h3>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="rep_witness_name_a">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="rep_witness_digital_address_a">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="rep_witness_id_number_a">
    </div>

    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label>
        <input type="text" class="phone_number" name="rep_witness_phone_a" required>
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('rep_witness_phone_a', 'phone')">Send
            OTP</button>
        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_witness_phone_a_otp">
            <button type="button"
                onclick="handleVerifyOTP('rep_witness_phone_a', 'rep_witness_phone_a_otp', 'phone')">Verify
                OTP</button>
        </div>

    </div>

    <div class="form-group">
        <label>Email <span class="required">*</span></label>
        <input type="text" class="email_address" name="rep_witness_email_a" required>
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('rep_witness_email_a','email')">Send
            OTP</button>

        <div class="form-group otp_section  mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_witness_email_a_otp">
            <button type="button"
                onclick="handleVerifyOTP('rep_witness_email_a', 'rep_witness_email_a_otp', 'email')">Verify
                OTP</button>
        </div>
    </div>



    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="living_witness_yes_a">
                <input type="radio" name="living_witness_a" id="living_witness_yes_a" value="Yes">
                <span>Yes</span>
            </label>
            <label for="living_witness_no_a">
                <input type="radio" name="living_witness_a" id="living_witness_no_a" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="witness_digital_signature_a">
    </div>

</div>
