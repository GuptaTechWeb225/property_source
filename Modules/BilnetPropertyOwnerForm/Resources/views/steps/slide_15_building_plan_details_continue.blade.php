<div id="slide15" class="form-slide slide">
    <div class="slide-number">15/21</div>
    <h2>Building Plan Details (Continued)</h2>
    <br>


    <h3>Sanitation</h3>

    <div class="form-group">
        <label>Sanitation Type</label>
        <div class="radio-group">
            <label for="sanitation_zoomlion">
                <input type="radio" name="sanitation_type" id="sanitation_zoomlion" value="Zoomlion"
                    onchange="toggleOtherSanitationField()">
                <span>Zoomlion</span>
            </label>
            <label for="sanitation_none">
                <input type="radio" name="sanitation_type" id="sanitation_none" value="None"
                    onchange="toggleOtherSanitationField()">
                <span>None</span>
            </label>
            <label for="sanitation_other">
                <input type="radio" name="sanitation_type" id="sanitation_other" value="Other"
                    onchange="toggleOtherSanitationField()">
                <span>Other</span>
            </label>
        </div>
        <div id="sanitationOtherField" class="conditional-field hidden">
            <input type="text" name="sanitation_other" id="sanitation_other_input"
                placeholder="Specify other sanitation type">
        </div>
    </div>


    <div class="form-group">
        <label>Sanitation Trash Bin Number</label>
        <input type="text" name="sanitation_trash_bin_number" min=0 max=1000>
    </div>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Sanitation Trash Bin QR Code/Image</h3>
            <p></p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="sanitation_qr_code"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="sanitation_qr_code" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>


    <br>
    <h3>Security</h3>
    <!-- Exterior Color Scheme -->
    <div class="form-group">
        <div class="security-checkbox-group">
            <label>
                <input type="checkbox" name="security_type" value="Dog"> Dog
            </label>
            <label>
                <input type="checkbox" name="security_type" value="Fence Wire"> Fence Wire
            </label>
            <label>
                <input type="checkbox" name="security_type" value="Police"> Police
            </label>
            <label>
                <input type="checkbox" name="security_type" value="CCTV"> CCTV
            </label>
            <label>
                <input type="checkbox" name="security_type" value="Fire Arms"> Fire Arms
            </label>
            <label>
                <input type="checkbox" name="security_type" value="Private Security"> Private Security
            </label>
            <label>
                <input type="checkbox" name="security_type" value="None"> None
            </label>
            <label>
                <input type="checkbox" name="security_type" value="I don't want to talk about it"> Prefer
                not to say
            </label>
            <label>
                <input type="checkbox" name="security_type" value="Other"> Other
            </label>
        </div>
        <input type="text" id="security-other-input" class="building-color-custom hidden"
            placeholder="Specify other security means">
    </div>

    <h3>Internet Supply</h3>

    <div class="form-group">
        <label>Internet Type</label>
        <div class="radio-group">
            <label for="internet_satelite">
                <input type="radio" name="internet_type" id="internet_satelite" value="Satellite">
                <span>Satellite</span>
            </label>
            <label for="internet_broadband">
                <input type="radio" name="internet_type" id="internet_broadband" value="Broadband">
                <span>Broadband</span>
            </label>
            <label for="internet_ideist">
                <input type="radio" name="internet_type" id="internet_ideist" value="IDEIST">
                <span>IDEIST</span>
            </label>
            <label for="internet_none">
                <input type="radio" name="internet_type" id="internet_none" value="None">
                <span>None</span>
            </label>
            <label for="internet_dont">
                <input type="radio" name="internet_type" id="internet_dont" value="I don’t want to talk about it">
                <span>Prefer not to say</span>
            </label>
        </div>
    </div>
    <div class="hr"></div>
    <div class="form-group">
        <label>Service Provider</label>
        <div class="service-checkbox-group">

            <label>
                <input type="checkbox" name="service_provider" value="Telecel"> Telecel
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="A&T"> A&T
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="IDEIST"> IDEIST
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="Glo"> Glo
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="Starlink"> Starlink
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="None"> None
            </label>
            <label>
                <input type="checkbox" name="service_provider" value="Others"> Others
            </label>
        </div>
        <input type="text" id="service-other-input" class="service-other-field hidden"
            placeholder="Specify other service providers">
    </div>

</div>
