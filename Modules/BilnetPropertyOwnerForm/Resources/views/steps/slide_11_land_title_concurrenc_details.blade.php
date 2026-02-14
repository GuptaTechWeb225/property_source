<div id="slide11" class="form-slide slide">
    <div class="slide-number">11/21</div>
    <h2>Land Title/Concurrence Details (Optional)</h2>
    <br>
    <div class="form-group">
        <label for="landTitleNumber">Land Title Number:</label>
        <input type="text" id="landTitleNumber" name="landTitleNumber"
            placeholder="Enter Land Title Number">
    </div>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Land Title/Concurrence Image</h3>
            <p>Photos to be taken or attached</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="landTitle_images"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="landTitle_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>

    <div class="form-group">
        <label>Land Title Status</label>
        <div>
            <label for="dont">
                <input type="radio" name="land_title_status" id="dont"
                    value="I don't have Land Title/Concurrence yet">
                <span>I don't have Land Title/Concurrence yet</span>
            </label>
            <label for="havent">
                <input type="radio" name="land_title_status" id="havent"
                    value="I haven’t applied for Title/Concurrence yet">
                <span>I haven’t applied for Title / Concurrence yet</span>
            </label>
            <label for="dontneed">
                <input type="radio" name="land_title_status" id="dontneed"
                    value="I don’t need a Title/Concurrence yet">
                <span>I don’t need a Title/Concurrence yet</span>
            </label>
            <label for="willapply">
                <input type="radio" name="land_title_status" id="willapply"
                    value="I will apply for a Title/Concurrence later">
                <span>I will apply for a Title/Concurrence later</span>
            </label>
            <label for="applied">
                <input type="radio" name="land_title_status" id="applied"
                    value="I applied for a new Title/Concurrence on" onclick="toggleConcurrenceDate(true)">
                <span>I applied for a new Title/Concurrence on</span>
            </label>
            <input type="date" id="yellow_card_date" name="yellow_card_date"
                style="display: none; margin-left: 10px;" />

        </div>
    </div>
    <div class="hr"></div>
    <!-- Payment Platform Link -->
    <div class="form-group">
        <label>I want a Title/Concurrence in</label>
        <div>
            <label for="Basic">
                <input type="radio" name="land_title_time" id="Basic"
                    value="Basic: Duration: 12 months, Fee: GH¢500.00">
                <span>Basic: Duration: 12 months, Fee: GH¢500.00</span>
            </label>
            <label for="Standard">
                <input type="radio" name="land_title_time" id="Standard"
                    value="Standard: Duration: 6 months, Fee: GH¢2,500.00">
                <span>Standard: Duration: 6 months, Fee: GH¢2,500.00</span>
            </label>
            <label for="Fast Track">
                <input type="radio" name="land_title_time" id="Fast Track"
                    value="Fast Track: Duration: 3 months, Fee: GH¢2,500.00">
                <span>Fast Track: Duration: 3 months, Fee: GH¢2,500.00</span>
            </label>
            <label for="Gold">
                <input type="radio" name="land_title_time" id="Gold"
                    value="Gold: Duration: 1 month Fee GH¢10,000.00">
                <span>Gold: Duration: 1 month Fee GH¢10,000.00</span>
            </label>
            <label for="Prestige">
                <input type="radio" name="land_title_time" id="Prestige"
                    value="Prestige:You will be contacted for Estimated Time of Completion and Cost">
                <span>Prestige:You will be contacted for Estimated Time of Completion and Cost</span>
            </label>
        </div>
        <a href="#" onclick="getVerifiedDocumentNo('new_concurrence')">
            <h6>(Click here to apply for new Title/Concurrence)</h6>
        </a>
    </div>

    <!-- Payment Code -->
    <div class="form-group">
        <label for="paymentCode">Payment Code:</label>
        <input type="text" id="paymentCode" name="paymentCode" placeholder="Enter Payment Code">
    </div>

</div>
