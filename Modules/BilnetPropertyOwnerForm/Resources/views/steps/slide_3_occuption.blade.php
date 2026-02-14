<!-- Section 3: Occupation -->
<div id="slide3" class="form-slide slide">
    <div class="slide-number">3/21</div>
    <h2>Occupation</h2>
    <br>
    <div class="form-group">
        <label>Category</label>
        <div class="radio-group">
            <label for="category_employed">
                <input type="radio" name="occupation_category" id="category_employed" value="Employed" checked>
                <span>Employed</span>
            </label>
            <label for="category_unemployed">
                <input type="radio" name="occupation_category" id="category_unemployed" value="Unemployed">
                <span>Unemployed</span>
            </label>
            <label for="category_student">
                <input type="radio" name="occupation_category" id="category_student" value="Student">
                <span>Student</span>
            </label>
            <label for="category_work_school">
                <input type="radio" name="occupation_category" id="category_work_school"
                    value="Work & School, Apprenticeship">
                <span>Work & School, Apprenticeship</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Business/Institution Name</label>
        <input type="text" name="business_institution_name">
    </div>

    <div class="form-group">
        <label>Sector</label>
        <div class="radio-group">
            <label for="sector_government">
                <input type="radio" name="occupation_sector" id="sector_government" value="Government">
                <span>Government</span>
            </label>
            <label for="sector_private">
                <input type="radio" name="occupation_sector" id="sector_private" value="Private" checked>
                <span>Private</span>
            </label>
            <label for="sector_both">
                <input type="radio" name="occupation_sector" id="sector_both" value="Both">
                <span>Both</span>
            </label>
            <label for="sector_ngo">
                <input type="radio" name="occupation_sector" id="sector_ngo" value="NGO">
                <span>NGO</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>TIN/Reg/Lic No</label>
        <input type="text" name="tin_reg_lic_no">
    </div>

    <div class="form-group">
        <label>Position</label>
        <input type="text" name="position">
    </div>

    <div class="form-group">
        <label>Work Id No</label>
        <input type="text" name="work_id_no">
    </div>

    <div class="form-group">
        <label>Work Address</label>
        <input type="text" name="work_address">
    </div>

    <div class="form-group">
        <label>Marital Status</label>
        <div class="radio-group">
            <label for="ms_single">
                <input type="radio" name="marital_status" id="ms_single" value="Single"
                    onchange="handleMaritalStatusChange()" checked>
                <span>Single</span>
            </label>
            <label for="ms_married">
                <input type="radio" name="marital_status" id="ms_married" value="Married"
                    onchange="handleMaritalStatusChange()">
                <span>Married</span>
            </label>
            <label for="ms_separated">
                <input type="radio" name="marital_status" id="ms_separated" value="Separated"
                    onchange="handleMaritalStatusChange()">
                <span>Separated</span>
            </label>
            <label for="ms_dont_want_to_say">
                <input type="radio" name="marital_status" id="ms_dont_want_to_say" value="I don't want to say"
                    onchange="handleMaritalStatusChange()">
                <span>I don't want to say</span>
            </label>
            <label for="ms_knocking">
                <input type="radio" name="marital_status" id="ms_knocking" value="Knocking"
                    onchange="handleMaritalStatusChange()">
                <span>Knocking</span>
            </label>
            <label for="ms_cohabitation">
                <input type="radio" name="marital_status" id="ms_cohabitation" value="Co-habitation"
                    onchange="handleMaritalStatusChange()">
                <span>Co-habitation</span>
            </label>
        </div>
    </div>

    <!-- Dynamic Details Fields -->
    <div class="form-group hidden" id="knockingDetails">
        <label for="knockingWith">Knocking: With who?</label>
        <input type="text" id="knockingWith" name="knockingDetails" placeholder="Enter name">
    </div>

    <div class="form-group hidden" id="cohabitationDetails">
        <label for="cohabitationWith">Co-habitation: With who?</label>
        <input type="text" id="cohabitationWith" name="cohabitationDetails" placeholder="Enter name">
    </div>


    <div class="form-group">
        <label>Religion, Belief & Faith (RBF) <span class="required">*</span></label>
        <select name="rbf" required>
            <option value="">Select RBF</option>
            <option value="Islam">Islam</option>
            <option value="Christianity">Christianity</option>
            <option value="African Traditional Religions">African Traditional Religions</option>
            <option value="Secular">Secular</option>
            <option value="Non-Religious">Non-Religious</option>
            <option value="Agnostic">Agnostic</option>
            <option value="Atheist">Atheist</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Buddhism">Buddhism</option>
            <option value="Chinese Traditional Religions">Chinese Traditional Religion</option>
            <option value="Ethnic Religions">Ethnic Religions</option>
            <option value="Eckanker">Eckanker</option>
            <option value="Sikhism">Sikhism</option>
            <option value="Spiritism">Spiritism</option>
            <option value="Judaism">Judaism</option>
            <option value="Bahai">Bahai</option>
            <option value="Jainism">Jainism</option>
            <option value="Shinto">Shinto</option>
            <option value="Cao Dai">Cao Dai</option>
            <option value="Zoroastrainism">Zoroastrainism</option>
            <option value="Tenrikyo">Tenrikyo</option>
            <option value="Animism">Animism</option>
            <option value="Neo-Paganism">Neo-Paganism</option>
            <option value="Unitarian Universalism">Unitarian Universalism</option>
            <option value="Rastafari">Rastafari</option>
            <option value="None">None</option>

        </select>
    </div>

    <div class="form-group">
        <label>RBF Denomination Name <span class="required">*</span></label>
        <select name="rbf_denomination_name" id="rbf_denomination_name" required onchange="toggleOtherRbfField()">
            <option value="">Select RBF Denomination Name</option>
            <option value="Charismatic">Charismatic</option>
            <option value="Pentecostal">Pentecostal</option>
            <option value="Catholic">Catholic</option>
            <option value="Orthodox">Orthodox</option>
            <option value="others">Other</option>
        </select>
        <div id="otherRbfField" class="conditional-field hidden">
            <input type="text" id="other_rbf_input" name="other_rbf_denomination"
                placeholder="Specify other RBF denomination name">
        </div>
    </div>


    <div class="form-group">
        <label>RBF Branch Name</label>
        <input type="text" name="rbf_branch_name">
    </div>

    <div class="form-group">
        <label>Branch ID No</label>
        <input type="text" name="rbf_branch_id_no">
    </div>

    <div class="form-group">
        <label for="languages">Languages Spoken</label>
        <div class="multiple-select">
            <select id="languageDropdown" class="select-dropdown" onchange="handleLanguageSelection()">
                <option value="" disabled selected>Select a language</option>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="Dutch">Dutch</option>
                <option value="French">French</option>
                <option value="Twi">Twi</option>
                <option value="Ewe">Ewe</option>
                <option value="Ga">Ga</option>
                <option value="Ga Dangme">Ga Dangme</option>
                <option value="Hausa">Hausa</option>
                <option value="Dagomba">Dagomba</option>
                <option value="Yoruba">Yoruba</option>
                <option value="Igbo">Igbo</option>
                <option value="Other">Other (Please specify)</option>
            </select>
        </div>
        <div id="otherLanguageInput" class="conditional-field hidden">
            <input type="text" id="otherLanguage" placeholder="Specify language" />
            <button class="upload-btn" type="button" onclick="addOtherLanguage()">Add Language</button>
        </div>
        <div id="selectedLanguages">
            <!-- Selected languages will appear here -->
        </div>
        <input type="hidden" name="spoken_languages" id="spoken_languages">
    </div>

    <div class="form-group">
        <label>SSNIT No</label>
        <input type="text" name="ssnit_no">
        <a href="#" onclick="getVerifiedDocumentNo('ssnit_no')">
            <h6>(Click here to get SSNIT if you don’t have one)</h6>
        </a>
    </div>

    <div class="form-group">
        <label>NHIS No</label>
        <input type="text" name="nhis_no">
        <a href="#" onclick="getVerifiedDocumentNo('nhis_no')">
            <h6>(Click here to get NHIS if you don’t have one)</h6>
        </a>
    </div>

</div>
