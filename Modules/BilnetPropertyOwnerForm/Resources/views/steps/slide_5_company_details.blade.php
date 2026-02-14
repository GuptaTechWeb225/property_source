<div id="slide5" class="form-slide slide">
    <div class="slide-number">5/21</div>
    <h2>Organization/Joint Ownership</h2>
    <br>


    <div class="form-group">
        <label>Company Name <span class="required">*</span></label>
        <input type="text" name="company_name" r>
    </div>

    <!-- Company Category  -->
    <div class="form-group">
        <label>Company Category</label>
        <div class="radio-group">
            <label for="company_category_government">
                <input type="radio" name="company_category" id="company_category_government"
                    value="Government">
                <span>Government</span>
            </label>
            <label for="company_category_Private">
                <input type="radio" name="company_category" id="company_category_Private"
                    value="Private" checked>
                <span>Private</span>
            </label>
            <label for="company_category_ngo">
                <input type="radio" name="company_category" id="company_category_ngo" value="NGO">
                <span>NGO</span>
            </label>
        </div>
    </div>
    <div class="hr"></div>


    <div class="form-group">
        <label>Company Email <span class="required">*</span></label>
        <input type="text" name="company_email" required>
        <a href="https://mail.google.com/" target="_blank">
            <h6>(Click here to create a free email if you don’t have one)</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Company Website/URL</label>
        <input type="text" name="company_url">
        <a href="#" onclick="getVerifiedDocumentNo('company_url')">
            <h6>Click here to create a free Online office Store & website if you don’t have one)</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Company Phone <span class="required">*</span></label>
        <input type="text" name="company_phone" required>
        <a href="#" onclick="getVerifiedDocumentNo('company_phone')">
            <h6>(Click here to get one landline for free if you don’t have one)</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Company Reg No <span class="required">*</span></label>
        <input type="text" name="company_reg_no" required>
    </div>

    <!-- Company Type -->
    <div class="form-group">
        <label>Company Type</label>
        <div class="radio-group">
            <label for="company_type_government">
                <input type="radio" name="company_type" id="company_type_government"
                    value="Government">
                <span>Government</span>
            </label>
            <label for="company_type_Private">
                <input type="radio" name="company_type" id="company_type_Private" value="Private">
                <span>Private</span>
            </label>
            <label for="company_type_ngo">
                <input type="radio" name="company_type" id="company_type_ngo" value="NGO">
                <span>NGO</span>
            </label>
        </div>
    </div>
    <div class="hr"></div>

    <!-- Company Activities -->

    <div class="form-group">
        <label>Company TIN</label>
        <input type="text" name="company_tin">
        <a href="#" onclick="getVerifiedDocumentNo('company_tin')">
            <h6>(Click here to get a free TIN if you don’t have one)</h6>
        </a>
    </div>

    <div class="form-group">
        <label>Company Representative ID</label>
        <input type="text" name="company-representative-id">
    </div>

</div>
