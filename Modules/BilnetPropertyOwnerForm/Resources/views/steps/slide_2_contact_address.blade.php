<!-- Section 2: Current Address -->
<div id="slide2" class="form-slide slide">
    <div class="slide-number">2/21</div>
    <h2>Current Address</h2>
    <br>
    <div class="form-group">
        <label>House Number</label>
        <input type="text" name="house_number">
    </div>

    <div class="form-group">
        <label>Digital Address</label>
        <input type="text" name="digital_address">
    </div>

    <div class="form-group">
        <label>Region</label>
        <select name="region" id="regionSelect">
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
        <div id="otherRegionField" class="conditional-field hidden">
            <input type="text" name="other_region" placeholder="Specify Region">
        </div>
    </div>

    <div class="form-group">
        <label>Municipal/District</label>
        <select name="municipal_district">
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
        <label>Town</label>
        <select name="town">
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
        <label>Locality</label>
        <input type="text" name="locality">
    </div>

    <div class="form-group">
        <label>Street Name</label>
        <input type="text" name="street_name">
    </div>



    <div class="card" data-type="front">
        <h3>Digital Address QR Image</h3>
        <p>Click to snap live image OR attach ID Photo from your files</p>
        <button class="upload-btn" type="button">Take Photo</button>
        <input type="file" id="digital_address_qr_front" accept="image/png, image/jpeg, image/webp" capture="environment"
            style="display: none;" data-multiple="false">
        <input type="hidden" class="store_file original_path" name="digital_address_qr_front">
        <div class="loader" style="display: none;">Uploading...</div>
        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
    </div>


    <div class="form-group">
        <label>Tribe</label>
        <select name="tribe" id="tribeSelect" onchange="toggleTribe()">
            <option value="">Select Tribe</option>
            <option value="EWE">EWE</option>
            <option value="AKAN">AKAN</option>
            <option value="HAUSA">HAUSA</option>
            <option value="GA_DANGME">GA DANGME</option>
            <option value="FANTE">FANTE</option>
            <option value="DAGOMBA">DAGOMBA</option>
            <option value="Other">OTHER</option>
        </select>
        <div id="otherTribeField" class="conditional-field hidden">
            <input type="text" name="other_tribe" placeholder="Specify Tribe">
        </div>
    </div>

    <div class="form-group">
        <label>Home Town</label>
        <input type="text" name="home_town">
    </div>

    <div class="form-group">
        <label>Hair Color</label>
        <div class="radio-group">
            <label for="hair_color_brown">
                <input type="radio" name="hair_color" id="hair_color_brown" value="brown" checked>
                <span>Brown</span>
            </label>
            <label for="hair_color_black">
                <input type="radio" name="hair_color" id="hair_color_black" value="black">
                <span>Black</span>
            </label>
            <label for="hair_color_grey">
                <input type="radio" name="hair_color" id="hair_color_grey" value="grey">
                <span>Grey</span>
            </label>
            <label for="hair_color_other">
                <input type="radio" name="hair_color" id="hair_color_other" value="other">
                <span>Other (Kindly Specify)</span>
            </label>
        </div>
        <input type="text" id="hair_color_specify" name="hair_color_specify" class="hidden" placeholder="Specify other hair color">
    </div>

    <div class="hr"></div>
    <div class="form-group">
        <label>Disability</label>
        <div class="radio-group">
            <label for="disability_none">
                <input type="radio" name="disability" id="disability_none" value="none" checked>
                <span>None</span>
            </label>
            <label for="disability_visually_impaired">
                <input type="radio" name="disability" id="disability_visually_impaired" value="visually impaired">
                <span>Visually Impaired</span>
            </label>
            <label for="disability_other">
                <input type="radio" name="disability" id="disability_other" value="other">
                <span>Other (Kindly Specify)</span>
            </label>
        </div>
        <input type="text" id="disability_specify" name="disability_specify"  class="hidden" placeholder="Specify other disability">
    </div>

    <div class="hr"></div>

    <div class="form-group">
        <label>Phone Number <span class="required">*</span></label>
        <input type="text" class="phone_number" name="phone" required>
        <button type="button" class="send_otp_btn" onclick="handleSendOTP('phone','phone')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="number" class="otp_input" name="otp">
            <button type="button" onclick="handleVerifyOTP('phone', 'otp', 'phone')">Verify OTP</button>

        </div>
    </div>

    <div class="form-group">
        <label>Email <span class="required">*</span></label>
        <input type="email" class="email_address" name="email" required>
        <button type="button" class="send_email_otp_btn" onclick="handleSendOTP('email','email')">Send OTP</button>

        <div class="form-group otp_section mt-2" style="display: none;">
            <label>Enter OTP</label>
            <input type="number" class="otp_input" name="email_otp">
            <button type="button" onclick="handleVerifyOTP('email', 'email_otp', 'email')">Verify OTP</button>
        </div>
    </div>

</div>
