<div id="slide9" class="form-slide slide">
    <div class="slide-number">9/21</div>
    <h2>Indenture Details (B)</h2>
    <br>
    <div class="form-group">
        <br>
        <h5>This indenture is in between</h5>
        <br>
        <h3>PARTY "B" REP</h3>
    </div>

    <div class="form-group">
        <label>Representing As</label>
        <div class="radio-group">
            <label for="ra_lessor_b">
                <input type="radio" name="representing_as_b" id="ra_lessor_b" value="Lessor">
                <span>Lessor</span>
            </label>
            <label for="ra_lessee_b">
                <input type="radio" name="representing_as_b" id="ra_lessee_b" value="Lessee">
                <span>Lessee</span>
            </label>
            <label for="ra_agent_b">
                <input type="radio" name="representing_as_b" id="ra_agent_b" value="Agent">
                <span>Agent</span>
            </label>
        </div>
    </div>
    <div class="hr"></div>
    <div class="form-group">
        <label>Representing For</label>
        <div class="radio-group">
            <label for="rf_individual_b">
                <input type="radio" name="representing_for_b" id="rf_individual_b" value="Individual">
                <span>Individual</span>
            </label>
            <label for="rf_organization_b">
                <input type="radio" name="representing_for_b" id="rf_organization_b" value="Organization">
                <span>Organization</span>
            </label>
            <label for="rf_stool_b">
                <input type="radio" name="representing_for_b" id="rf_stool_b" value="Stool">
                <span>Stool</span>
            </label>
            <label for="rf_community_b">
                <input type="radio" name="representing_for_b" id="rf_community_b" value="Community">
                <span>Community</span>
            </label>
            <label for="rf_clan_b">
                <input type="radio" name="representing_for_b" id="rf_clan_b" value="Clan">
                <span>Clan</span>
            </label>
            <label for="rf_family_b">
                <input type="radio" name="representing_for_b" id="rf_family_b" value="Family">
                <span>Family</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Title <span class="required">*</span></label>
        <select name="rep_title_b" required>
            <option value="">Select Title</option>
            <option value="PARAMOUNT CHIEF">PARAMOUNT CHIEF</option>
            <option value="SUB CHIEF">SUB CHIEF</option>
            <option value="QUEENMOTHER">QUEENMOTHER</option>
            <option value="FAMILY HEAD">FAMILY HEAD</option>
            <option value="FAMILY REP">FAMILY REP</option>
        </select>
    </div>

    <div class="form-group">
        <label>Title Numerals <span class="required">*</span></label>
        <select name="rep_title_numerals_b" required>
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
        <input type="text" name="rep_name_b">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="rep_digital_address_b">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="rep_id_number_b">
    </div>

    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label>
        <input type="text" class="phone_number" name="rep_phone_b" required>
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('rep_phone_b', 'phone')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_phone_b_otp" required>
            <button type="button"
            onclick="handleVerifyOTP('rep_phone_b', 'rep_phone_b_otp', 'phone')">Verify
            OTP</button>
        </div>

    </div>


    <div class="form-group">
        <label>Email <span class="required">*</span></label>
        <input type="text" class="email_address" name="rep_email_b" required>
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('rep_email_b', 'email')">Send
            OTP</button>


        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_email_b_otp">
            <button type="button"
            onclick="handleVerifyOTP('rep_email_b', 'rep_email_b_otp', 'email')">Verify
            OTP</button>
        </div>

    </div>


    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="living_yes_b">
                <input type="radio" name="living_b" id="living_yes_b" value="Yes">
                <span>Yes</span>
            </label>
            <label for="living_no_b">
                <input type="radio" name="living_b" id="living_no_b" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="digital_signature_b">
    </div>

    <!-- PARTY B WITNESSES -->
    <div class="form-group">
        <h3>PARTY "B" REP Witnesses</h3>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="rep_witness_name_b">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="rep_witness_digital_address_b">
    </div>

    <div class="form-group">
        <label>ID Number</label>
        <input type="text" name="rep_witness_id_number_b">
    </div>
    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label>

        <input type="text" class="email_address" name="rep_witness_phone_b" required>
        <button type="button" class="send_email_otp_btn"
            onclick="handleSendOTP('rep_witness_phone_b', 'phone')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_witness_phone_b_otp">
            <button type="button"
            onclick="handleVerifyOTP('rep_witness_phone_b', 'rep_witness_phone_b_otp', 'phone')">Verify
            OTP</button>
        </div>
    </div>

    <div class="form-group">
        <label>Email <span class="required">*</span></label>
        <input type="text" class="email_address" name="rep_witness_email_b" required>

        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('rep_witness_email_b','email')">Send
            OTP</button>

        <div class="form-group otp_section  mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="rep_witness_email_b_otp">
            <button type="button"
            onclick="handleVerifyOTP('rep_witness_email_b', 'rep_witness_email_b_otp', 'email')">Verify
            OTP</button>
        </div>
    </div>

    <div class="Living">
        <label>Living</label>
        <div class="radio-group">
            <label for="living_witness_yes_b">
                <input type="radio" name="living_witness_b" id="living_witness_yes_b" value="Yes">
                <span>Yes</span>
            </label>
            <label for="living_witness_no_b">
                <input type="radio" name="living_witness_b" id="living_witness_no_b" value="No">
                <span>No</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Digital Signature</label>
        <input type="text" name="witness_digital_signature_b">
    </div>

</div>
