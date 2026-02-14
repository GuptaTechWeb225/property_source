<div id="slide19" class="form-slide slide">
    <div class="slide-number">19/21</div>
    <h2>Rent & Property Control Tenant Online Form</h2>
    <br>
    <div class="form-group">
        <label for="facility_property_address">Property Address</label>
        <input type="text" id="facility_property_address" name="facility_property_address">
    </div>
    <div class="form-group">
        <h4>Please note that this page is analytically designed and all your information are private and
            encrypted and can’t be shared to anyone even Rent & Property Control Department and the property
            owner won’t be able to have access to these information without your password permission.</h4>

        <h4>Click here to read the property owner and Rent & Property Control Department Terms & Condition
            before continuing.</h4>

        <h4>Please click to understand the Terms and Conditions here (Text, Audio, and Video version is
            available here for applicant to click on to understand before continuing).</h4>
    </div>

    <hr>

    <h3>Primary Tenant Profile Details</h3>

    <div class="form-group">
        <label for="primay_tenant_id">Tenant ID</label>
        <input type="text" id="primay_tenant_id" name="primay_tenant_id">
    </div>

    <div class="form-group">
        <label for="primay_tenant_phone">Tenant Phone</label>
        <input type="text" id="primay_tenant_phone" name="primay_tenant_phone">
    </div>

    <div class="form-group">
        <label for="primay_tenant_email">Tenant Email</label>
        <input type="text" id="primay_tenant_email" name="primay_tenant_email">
    </div>


    <div class="form-group">
        <label>How do you earn</label>
        <div class="radio-group">
            <label for="how_you_earn_minutes">
                <input type="radio" name="how_you_earn" id="how_you_earn_minutes" value="Minutes">
                <span>Minutes</span>
            </label>
            <label for="how_you_earn_hourly">
                <input type="radio" name="how_you_earn" id="how_you_earn_hourly" value="Hourly">
                <span>Hourly</span>
            </label>
            <label for="how_you_earn_daily">
                <input type="radio" name="how_you_earn" id="how_you_earn_daily" value="Daily">
                <span>Daily</span>
            </label>
            <label for="how_you_earn_weekly">
                <input type="radio" name="how_you_earn" id="how_you_earn_weekly" value="Weekly">
                <span>Weekly</span>
            </label>
            <label for="how_you_earn_monthly">
                <input type="radio" name="how_you_earn" id="how_you_earn_monthly" value="Monthly">
                <span>Monthly</span>
            </label>
            <label for="how_you_earn_annually">
                <input type="radio" name="how_you_earn" id="how_you_earn_annually" value="Annually">
                <span>Annually</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="primay_tenant_email">Amount Range</label>
        <input type="number" id="amount_range" name="amount_range">
    </div>

    <div class="form-group">
        <label>Currency</label>
        <div class="radio-group">
            <label for="tenant_currency_ghc">
                <input type="radio" name="tenant_currency" id="tenant_currency_ghc" value="GH¢">
                <span>GH¢</span>
            </label>
            <label for="tenant_currency_usd">
                <input type="radio" name="tenant_currency" id="tenant_currency_usd" value="USD">
                <span>USD</span>
            </label>
            <label for="tenant_currency_gbp">
                <input type="radio" name="tenant_currency" id="tenant_currency_gbp" value="GBP">
                <span>GBP</span>
            </label>
            <label for="tenant_currency_euro">
                <input type="radio" name="tenant_currency" id="tenant_currency_euro" value="EURO">
                <span>EURO</span>
            </label>
            <label for="tenant_currency_naira">
                <input type="radio" name="tenant_currency" id="tenant_currency_naira" value="NAIRA">
                <span>NAIRA</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <h3>Loan Details</h3>

        <!-- Are you on Loan -->
        <div class="form-group">
            <label>Are you on Loan:</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="onLoan" value="Yes"
                        onclick="toggleLoanFields(true)"> Yes
                </label>
                <label>
                    <input type="radio" name="onLoan" value="No"
                        onclick="toggleLoanFields(false)"> No
                </label>
            </div>
        </div>

        <!-- Loan Details (Shown if Yes) -->
        <div class="form-group hidden" id="loanDetails">
            <label for="loanAmount">Loan Amount:</label>
            <input type="number" id="loanAmount" name="loanAmount" placeholder="Enter loan amount">

            <label for="loanInterest">Loan Interest (%):</label>
            <input type="number" id="loanInterest" name="loanInterest"
                placeholder="Enter loan interest percentage">

            <label>Loan Period:</label>
            <div>
                From: <input type="date" id="loanStartDate" name="loanStartDate">
                End Period: <input type="date" id="loanEndDate" name="loanEndDate">
            </div>

            <!-- Have you started paying -->
            <div class="form-group">
                <label>Have you started paying:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="startedPaying" value="Yes"
                            onclick="togglePaymentFields(true)"> Yes
                    </label>
                    <label>
                        <input type="radio" name="startedPaying" value="No"
                            onclick="togglePaymentFields(false)"> No
                    </label>
                </div>
            </div>

            <!-- Payment Details (Shown if Yes to Started Paying) -->
            <div class="form-group hidden" id="paymentDetails">
                <label for="paymentDate">When:</label>
                <input type="date" id="paymentDate" name="paymentDate">

                <label for="amountPaid">Amount Paid:</label>
                <input type="number" id="amountPaid" name="amountPaid" placeholder="Enter amount paid">

                <label for="remainingBalance">Remaining Balance:</label>
                <input type="number" id="remainingBalance" name="remainingBalance"
                    placeholder="Enter remaining balance">

                <label for="estimatedFinishDate">When do you intend/estimate to finish paying:</label>
                <input type="date" id="estimatedFinishDate" name="estimatedFinishDate">

                <label>Is the Lender aware of your intentions:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="lenderAware" value="Yes"
                            onclick="toggleProofField(true)"> Yes
                    </label>
                    <label>
                        <input type="radio" name="lenderAware" value="No"
                            onclick="toggleProofField(false)"> No
                    </label>
                </div>

                <!-- Proof Attachment (Shown if Yes to Lender Aware) -->
                <div class="form-group hidden" id="proofField">
                    <div class="card" data-type="front">
                        <h3>Attach Proof</h3>
                        <br>
                        <p>Take or attach a photo</p>
                        <button class="upload-btn">Upload Image</button>
                        <input type="file" id="proofAttachment" name="proofAttachment"
                            accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;">
                    </div>
                </div>
            </div>

            <!-- Loan Institution/Lender Details -->
            <div class="form-group">
                <h4>Loan Institution/Lender Details:</h4>
                <label for="lenderName">Name:</label>
                <input type="text" id="lenderName" name="lenderName"
                    placeholder="Enter lender's name">

                <label for="lenderAddress">Address:</label>
                <input type="text" id="lenderAddress" name="lenderAddress"
                    placeholder="Enter lender's address">

                <label for="lenderPhone">Phone:</label>
                <input type="tel" id="lenderPhone" name="lenderPhone"
                    placeholder="Enter lender's phone">
            </div>
        </div>
    </div>
</div>
