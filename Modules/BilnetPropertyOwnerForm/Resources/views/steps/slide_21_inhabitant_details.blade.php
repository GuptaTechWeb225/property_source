<div id="slide21" class="form-slide slide">
    <div class="slide-number">21/21</div>
    <h2>Inhabitant Details</h2>
    <br>

    <div class="form-group">
        <label>Inhabitant Type <span class="required">*</span></label>
        <div class="radio-group">
            <label>
                <input type="radio" name="inhabitantType" value="Company"> Company
            </label>
            <label>
                <input type="radio" name="inhabitantType" value="Individual"> Individual
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="inhabitant_first_name">First Name <span class="required">*</span></label>
        <input type="text" id="inhabitant_first_name" class="validate-text" name="inhabitant_first_name" required>
    </div>

    <div class="form-group">
        <label for="inhabitant_last_name">Last Name <span class="required">*</span></label>
        <input type="text" id="inhabitant_last_name" class="validate-text" name="inhabitant_last_name" required>
    </div>

    <div class="form-group">
        <label for="inhabitant_other_name">Other Names </label>
        <input type="text" id="inhabitant_other_name" class="validate-text" name="inhabitant_other_name">
    </div>


    <div class="card" data-type="front">
        <h3>Passport Size Photo</h3>
        <p>Take or attach photo</p>
        <button class="upload-btn" type="button">Upload Image</button>
        <input type="file" accept="image/png, image/jpeg, image/webp" capture="camera" style="display: none;" id="passport_size_photo"
            data-multiple="false">
        <input type="hidden" class="store_file original_path" name="passport_size_photo">
        <div class="loader" style="display: none;">Uploading...</div>
        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
    </div>


    <div class="form-group">
        <label>Sex <span class="required">*</span></label>
        <div class="radio-group">
            <label><input type="radio" name="inhabitant_sex" value="Male" checked>Male</label>
            <label><input type="radio" name="inhabitant_sex" value="Female"> Female</label>
            <label><input type="radio" name="inhabitant_sex" value="Others"
                    onclick="toggleOtherField('inhabitant_sex')">Other</label>
        </div>
        <input type="text" id="inhabitant_sex-other" class="other-field hidden"
            placeholder="Specify other inhabitant sex">
    </div>

    <div class="form-group">
        <label>Nationality <span class="required">*</span></label>
        <div class="radio-group">
            <label>
                <input type="radio" name="inhabitantNationality" value="Ghanaian" checked> Ghanaian
            </label>
            <label>
                <input type="radio" name="inhabitantNationality" value="Foreigner"> Foreigner
            </label>
            <label>
                <input type="radio" name="inhabitantNationality" value="Mixed"> Mixed
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="inhabitant_TN">TN</label>
        <input type="text" id="inhabitant_TN" name="inhabitant_TN">
    </div>

    <div class="form-group">
        <label for="inhabitant_id_number">ID Number <span class="required">*</span></label>
        <input required type="text" id="inhabitant_id_number" name="inhabitant_id_number">
    </div>

    <div class="form-group">
        <label>ID Type (Government Issued ID)</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="inhabitant_id_type" value="Ghana Card"> Ghana card
            </label>
            <label>
                <input type="radio" name="inhabitant_id_type" value="Passport"> Passport
            </label>
            <label>
                <input type="radio" name="inhabitant_id_type" value="Others" value="Others"
                    onclick="toggleOtherField('inhabitant_id_type')"> Other
            </label>
        </div>
        <input type="text" id="inhabitant_id_type-other" class="other-field hidden"
            placeholder="Specify other id type">
    </div>



    <div class="card" data-type="front">
        <h3>Photo of Card</h3>
        <p>Take or attach photo</p>
        <button class="upload-btn" type="button">Upload Image</button>
        <input type="file" accept="image/png, image/jpeg, image/webp" capture="camera" style="display: none;" id="inhabitant_card_photo"
            data-multiple="false">
        <input type="hidden" class="store_file original_path" name="inhabitant_card_photo">
        <div class="loader" style="display: none;">Uploading...</div>
        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
    </div>



    <div class="form-group">
        <label>Relationship</label>
        <div class="checkbox-group">
            <select name="inhabitant_relationship" id="inhabitant_relationship"
                onchange="toggleInhabitantOtherField('inhabitant_relationship')">
                <option value="">Select Relationship</option>
                <option value="Daughter">Daughter</option>
                <option value="Son">Son</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Uncle">Uncle</option>
                <option value="Aunty">Aunty</option>
                <option value="Nephew">Nephew</option>
                <option value="Niece">Niece</option>
                <option value="Co-worker">Co-worker</option>
                <option value="Grandfather">Grandfather</option>
                <option value="Grandmother">Grandmother</option>
                <option value="Grandchild">Grandchild</option>
                <option value="Wife">Wife</option>
                <option value="Husband">Husband</option>
                <option value="Pastor">Pastor</option>
                <option value="Imam">Imam</option>
                <option value="Priest">Priest</option>
                <option value="Religious Mentor">Religious Mentor</option>
                <option value="Guardian">Guardian</option>
                <option value="Adopted Son">Adopted Son</option>
                <option value="Adopted Daughter">Adopted Daughter</option>
                <option value="Friend">Friend</option>
                <option value="Distant Relative">Distant Relative</option>
                <option value="Guest">Guest</option>
                <option value="Trainee">Trainee</option>
                <option value="Trainer">Trainer</option>
                <option value="Househelp">Househelp</option>
                <option value="Driver">Driver</option>
                <option value="Worker">Worker</option>
                <option value="Devotee">Devotee</option>
                <option value="Apprentice">Apprentice</option>
                <option value="Messenger">Messenger</option>
                <option value="Lawyer">Lawyer</option>
                <option value="Doctor">Doctor</option>
                <option value="Security Personnel">Security Personnel</option>
                <option value="Student">Student</option>
                <option value="Others">Other</option>
            </select>
        </div>
        <input type="text" id="inhabitant_relationship-other" id="inhabitant_relationship_other"
            class="other-field hidden" placeholder="Specify other relationship">
    </div>

    <div class="form-group">
        <label>Proof of Relationship</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="proof_of_relationship" value="Birth Certificate"> Birth
                Certificate
            </label>
            <label>
                <input type="radio" name="proof_of_relationship" value="Marriage Certificate"> Marriage
                Certificate
            </label>
            <label>
                <input type="radio" name="proof_of_relationship" value="Immigration Certificate">
                Immigration Certificate
            </label>
            <label>
                <input type="radio" name="proof_of_relationship" value="Appointment Letter as Worker">
                Appointment Letter as Worker
            </label>
        </div>

        <a href="#" onclick="getVerifiedDocumentNo('birth_certificate')">
            <h6>(Click to get your ward/inhabitant birth certificate)</h6>
        </a>
    </div>

    <div id="proof_of_relationship_birth_certificate" class="hidden">
        <div class="inhabitant-father-container">
            <div class="form-group">
                <label for="inhabitant_father_name">Father Name <span class="required">*</span></label>
                <input type="text" id="inhabitant_father_name" class="validate-text"
                    name="inhabitant_father_name">
            </div>

            <div class="form-group">
                <label>Father Alive</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="is_inhabitant_father_alive" value="yes"> Yes
                    </label>
                    <label>
                        <input type="radio" name="is_inhabitant_father_alive" value="No" checked> No
                    </label>
                </div>
            </div>

            <div class="form-group if-is-alive hidden">
                <label for="inhabitant_father_phone">Father Phone <span class="required">*</span></label>
                <input type="text" id="inhabitant_father_phone"
                    name="inhabitant_father_phone">

                <button type="button" class="send_otp_btn"
                    onclick="handleSendOTP('inhabitant_father_phone', 'phone')">Send
                    OTP</button>

                <div class="form-group otp_section mt-2" style="display: none;">
                    <label>Enter OTP</label>
                    <input type="text" class="otp_input" name="inhabitant_father_phone_otp">
                    <button type="button"
                        onclick="handleVerifyOTP('inhabitant_father_phone', 'inhabitant_father_phone_otp', 'phone')">Verify
                        OTP</button>
                </div>

            </div>

            <div class="form-group if-is-alive hidden">
                <label for="inhabitant_father_occupation">Father Occupation <span class="required">*</span></label>
                <input type="text" id="inhabitant_father_occupation" class="validate-text"
                    name="inhabitant_father_occupation">
            </div>

        </div>

        <div class="inhabitant-mother-container">
            <div class="form-group">
                <label for="inhabitant_mother_name">Mother Name <span class="required">*</span></label>
                <input type="text" id="inhabitant_mother_name" class="validate-text"
                    name="inhabitant_mother_name">
            </div>


            <div class="form-group">
                <label>Mother Alive</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="is_inhabitant_mother_alive" value="yes"> Yes
                    </label>
                    <label>
                        <input type="radio" name="is_inhabitant_mother_alive" value="No" checked> No
                    </label>
                </div>
            </div>


            <div class="form-group if-is-alive hidden">
                <label for="inhabitant_mother_phone">Mother phone <span class="required">*</span></label>
                <input type="text" id="inhabitant_mother_phone"
                    name="inhabitant_mother_phone">


                <button type="button" class="send_otp_btn"
                    onclick="handleSendOTP('inhabitant_mother_phone', 'phone')">Send
                    OTP</button>

                <div class="form-group otp_section mt-2" style="display: none;">
                    <label>Enter OTP</label>
                    <input type="text" class="otp_input" name="inhabitant_mother_phone_otp">
                    <button type="button"
                        onclick="handleVerifyOTP('inhabitant_mother_phone', 'inhabitant_mother_phone_otp', 'phone')">Verify
                        OTP</button>
                </div>

            </div>

            <div class="form-group if-is-alive hidden">
                <label for="inhabitant_mother_occupation">Mother Occupation <span class="required">*</span></label>
                <input type="text" id="inhabitant_mother_occupation" class="validate-text"
                    name="inhabitant_mother_occupation">
            </div>
        </div>


        <div class="inhabitant-guardian-container hidden">
            <div class="form-group">
                <label for="inhabitant_guardian_name">Guardian Name <span class="required">*</span></label>
                <input type="text" id="inhabitant_guardian_name" class="validate-text"
                    name="inhabitant_guardian_name">
            </div>

            <div class="form-group">
                <label for="inhabitant_guardian_phone">Guardian phone <span class="required">*</span></label>
                <input type="text" id="inhabitant_guardian_phone"
                    name="inhabitant_guardian_phone">

                <button type="button" class="send_otp_btn"
                    onclick="handleSendOTP('inhabitant_guardian_phone', 'phone')">Send
                    OTP</button>

                <div class="form-group otp_section mt-2" style="display: none;">
                    <label>Enter OTP</label>
                    <input type="text" class="otp_input" name="inhabitant_guardian_phone_otp">
                    <button type="button"
                        onclick="handleVerifyOTP('inhabitant_guardian_phone', 'inhabitant_guardian_phone_otp', 'phone')">Verify
                        OTP</button>
                </div>

            </div>

            <div class="form-group">
                <label for="inhabitant_guardian_occupation">Guardian Occupation <span
                        class="required">*</span></label>
                <input type="text" id="inhabitant_guardian_occupation" class="validate-text"
                    name="inhabitant_guardian_occupation">
            </div>

        </div>

    </div>

    <div class="form-group">
        <label for="inhabitant_organization_name">Organization Name <span class="required">*</span></label>
        <input type="text" id="inhabitant_organization_name" class="validate-text"
            name="inhabitant_organization_name" required>
    </div>

    <div class="form-group">
        <label for="inhabitant_other_relationship_proof">Other Relationship Proof Please Specify</label>
        <input type="text" class="validate-text" id="inhabitant_other_relationship_proof"
            name="inhabitant_other_relationship_proof">
    </div>

    <div class="card" data-type="front">
        <h3>Add Proof of Relationship</h3>
        <p>Take or attach photo</p>
        <button class="upload-btn" type="button">Upload Image</button>
        <input type="file" accept="image/png, image/jpeg, image/webp" capture="camera" style="display: none;" id="add_proof_relationbship"
            data-multiple="false">
        <input type="hidden" class="store_file original_path" name="add_proof_relationbship">
        <div class="loader" style="display: none;">Uploading...</div>
        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
    </div>

    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label></label>
        <input type="text" class="phone_number" name="inhabitant_phone" required>
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('inhabitant_phone', 'phone')">Send
            OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="inhabitant_phone_otp">
            <button type="button"
                onclick="handleVerifyOTP('inhabitant_phone', 'inhabitant_phone_otp', 'phone')">Verify
                OTP</button>
        </div>

    </div>

    <div class="form-group">
        <label>Email <span class="required">*</span></label></label>
        <input type="text" class="email_address" name="inhabitant_email" required>
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('inhabitant_email','email')">Send
            OTP</button>

        <div class="form-group otp_section  mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="text" class="otp_input" name="inhabitant_email_otp">
            <button type="button"
                onclick="handleVerifyOTP('inhabitant_email', 'inhabitant_email_otp', 'email')">Verify
                OTP</button>
        </div>
    </div>



    <div class="form-group">
        <label for="inhabitant_reason_for_accommodation">Reason for Accommodation</label>
        <textarea class="validate-text" name="inhabitant_reason_for_accommodation" style="resize: vertical;"></textarea>
    </div>

    <div class="form-group">
        <label>Accommodation Duration <span class="required">*</span></label>
        <select name="term" required>
            <option value="">Select Number of days</option>
            <option value="1 day">1 Day</option>
            <option value="2 days">2 Days</option>
            <option value="3 days">3 Days</option>
            <option value="4 days">4 Days</option>
            <option value="5 days">5 Days</option>
            <option value="6 days">6 Days</option>
            <option value="7 days">7 Days</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inhabitant_accommodation_start_date">Accommodation Start Date</label>
        <input type="date" id="inhabitant_accommodation_start_date" name="inhabitant_accommodation_start_date">
    </div>

    <div class="form-group">
        <label for="inhabitant_accommodation_end_date">Accommodation End Date</label>
        <input type="date" id="inhabitant_accommodation_end_date" name="inhabitant_accommodation_end_date">
    </div>

</div>
