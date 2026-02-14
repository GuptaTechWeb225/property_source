<div id="slide12" class="form-slide slide">
    <div class="slide-number">12/21</div>
    <h2>Yellow Card Details (Optional)</h2>
    <br>
    <div class="form-group">
        <label for="landTitleNumber">Yellow card Number:</label>
        <input type="text" id="landTitleNumber" name="landTitleNumber"
            placeholder="Enter Land Title Number">
    </div>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Yellow Card Image</h3>
            <p>photos to be taken or attached</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;" id="yellow_card_images"
                data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="yellow_card_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>



    <div class="form-group">
        <label>Land Title Status</label>
        <div>
            <label for="dont_yellow">
                <input type="radio" name="yello_card_status" id="dont_yellow"
                    value="I don't have Land Yellow Card yet">
                <span>I don't have Yellow Card yet</span>
            </label>
            <label for="havent_yellow">
                <input type="radio" name="yello_card_status" id="havent_yellow"
                    value="I haven’t applied for Yellow Card yet">
                <span>I haven’t applied for Yellow Card yet</span>
            </label>
            <label for="dontneed_yellow">
                <input type="radio" name="yello_card_status" id="dontneed_yellow"
                    value="I don’t need a Yellow Card yet">
                <span>I don’t need a Yellow Card yet</span>
            </label>
            <label for="willapply_yellow">
                <input type="radio" name="yello_card_status" id="willapply_yellow"
                    value="I will apply for a Yellow Card later">
                <span>I will apply for a Yellow Card later</span>
            </label>
            <label for="applied_yellow">
                <input type="radio" name="yello_card_status" id="applied_yellow"
                    value="I applied for a new Yellow Card on" onclick="toggleYellowCardDate(true)">
                <span>I applied for a new Yellow Card on</span>
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
            <label for="Basic_yellow">
                <input type="radio" name="yello_card_time" id="Basic_yellow"
                    value="Basic: Duration: 12 months, Fee: GH¢500.00">
                <span>Basic: Duration: 12 months, Fee: GH¢500.00</span>
            </label>
            <label for="Standard_yellow">
                <input type="radio" name="yello_card_time" id="Standard_yellow"
                    value="Standard: Duration: 6 months, Fee: GH¢2,500.00">
                <span>Standard: Duration: 6 months, Fee: GH¢2,500.00</span>
            </label>
            <label for="Fast Track_yellow">
                <input type="radio" name="yello_card_time" id="Fast Track_yellow"
                    value="Fast Track: Duration: 3 months, Fee: GH¢2,500.00">
                <span>Fast Track: Duration: 3 months, Fee: GH¢2,500.00</span>
            </label>
            <label for="Gold_yellow">
                <input type="radio" name="yello_card_time" id="Gold_yellow"
                    value="Gold: Duration: 1 month Fee GH¢10,000.00">
                <span>Gold: Duration: 1 month Fee GH¢10,000.00</span>
            </label>
            <label for="Prestige_yellow">
                <input type="radio" name="yello_card_time" id="Prestige_yellow"
                    value="Prestige:You will be contacted for Estimated Time of Completion and Cost">
                <span>Prestige:You will be contacted for Estimated Time of Completion and Cost</span>
            </label>
        </div>
        <a href="#" onclick="getVerifiedDocumentNo('yellow_card')">
            <h6>(Click here to apply for new Yellow Card)</h6>
        </a>
    </div>

    <!-- Payment Code -->
    <div class="form-group">
        <label for="paymentCode">Payment Code:</label>
        <input type="text" id="paymentCode" name="paymentCode" placeholder="Enter Payment Code">
    </div>

</div>
