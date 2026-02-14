<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprehensive Registration Form</title>
    <style>
        :root {
            --primary-color: #087c7c;
            --bg-color-1: #0d1117;
            --bg-color-2: #161b22;
            --card-bg: #24292f;
            --text-color: #f4f5f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-family: Garamond;
        }

        .asterik {
            color: maroon;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background-color: white;
            color: black;
            border-radius: 50%;
            padding: 4px;
        }

        .room-space-checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .room-space-checkbox-group label {
            display: flex;
            align-items: center; /* Align checkbox and text */
        }

        body {
            font-family: Garamond;
            background-color: var(--bg-color-1);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            overflow: auto;
        }

        h6 {
            display: inline;
            font-size: 12px;
            color: var(--primary-color);
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }

        .registration-container {
            background-color: var(--bg-color-2);
            border-radius: 10px;
            width: 100%;
            max-width: 700px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }

        .form-slide {
            display: none;
            animation: slideIn 0.5s ease;
            overflow: auto;
        }

        .form-slide.active {
            display: block;
            overflow: auto;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--primary-color);
            background-color: var(--bg-color-1);
            color: var(--text-color);
            border-radius: 5px;
        }

        .slide {
            position: relative;
        }

        .slide-number {
            position: absolute;
            right: 0px;
            color: var(--primary-color);
            font-weight: bold;
        }

        textarea:focus {
            border: none;
            outline: 1px solid var(--primary-color);
        }

        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .radio-group label, .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            background-color: var(--primary-color);
            color: var(--text-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Container for the progress bar */
        .progress-bar-container {
            position: relative;
            width: 100%;
            margin-top: 20px;
        }

        /* Background of the progress bar */
        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: var(--bg-color-1);
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        /* Foreground of the progress bar */
        .progress {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 5px 0 0 5px;
            transition: width 0.3s ease-in-out;
        }

        /* Text overlay for the percentage */
        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: bold;
            color: var(--text-color);
            white-space: nowrap;
        }


        .card-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        .conditional-field {
            margin-top: 10px;
        }

        .multiple-select {
            position: relative;
        }

        .multiple-select-dropdown {
            position: absolute;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background-color: var(--card-bg);
            border: 1px solid var(--primary-color);
            z-index: 10;
        }

        .multiple-select-dropdown label {
            display: block;
            padding: 5px 10px;
            cursor: pointer;
        }

        .multiple-select-dropdown label:hover {
            background-color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .conditional-field {
            margin-top: 15px;
        }

        .multiple-select {
            position: relative;
        }

        .select-dropdown {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #24292f;
            color: #f4f5f6;
            border: 1px solid #087c7c;
        }

        .select-dropdown option {
            padding: 10px;
        }

        .selected-countries,
        #selectedLanguages {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .selected-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            background-color: #161b22;
            color: #f4f5f6;
            border: 1px solid #087c7c;
            border-radius: 5px;
        }

        .selected-option .remove-btn {
            background-color: #087c7c;
            color: #f4f5f6;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .selected-option .remove-btn:hover {
            background-color: #065a5a;
        }

        .radiobox-group {
            display: grid;
            grid-template-columns: auto auto;
        }

        input[type=radio] {
            --s: 0.8em; /* control the size */
            --c: #009688; /* the active color */

            height: var(--s);
            width: 0.8em;
            aspect-ratio: 1;
            border: calc(var(--s) / 8) solid #939393;
            padding: calc(var(--s) / 8);
            background: radial-gradient(farthest-side, var(--c) 94%, #0000) 50%/0 0 no-repeat content-box;
            border-radius: 50%;
            outline-offset: calc(var(--s) / 10);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            font-size: inherit;
            transition: .3s;
        }

        input[type=radio]:disabled {
            background: linear-gradient(#939393 0 0) 50%/100% 20% no-repeat content-box;
            opacity: .5;
            cursor: not-allowed;
        }

        input[type=radio]:checked {
            border-color: var(--c);
            background: radial-gradient(farthest-side, var(--c) 94%, #0000) 50%/100% 100% no-repeat;
        }

        /* Disabled state for the radio button */
        input[type=radio]:disabled {
            background: linear-gradient(#939393 0 0) 50%/100% 20% no-repeat content-box;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .attachment-container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #24292f;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card h3 {
            margin-top: 0;
            color: #f4f5f6;
        }

        .card p {
            margin-bottom: 20px;
            color: #f4f5f6;
        }

        .upload-btn {
            background-color: #087c7c;
            color: #f4f5f6;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upload-btn:hover {
            background-color: #065a5a;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-container {
            background-color: #161b22;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        h3, h4 {
            color: #009688;
            margin-bottom: 20px;
        }

        .pillar-details {
            margin-bottom: 30px;
            padding: 15px;
            background-color: #24292f;
            border-radius: 8px;
        }

        .form-group > label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .form-group input:not([type="radio"]):not([type="checkbox"]),
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            background-color: #0d1117;
            color: #f4f5f6;
            font-size: 16px;
        }

        .required {
            color: #ff4d4f;
            margin-left: 4px;
        }


        input[type=checkbox] {
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        /* Focus styles */
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #087c7c;
        }

        /* Hover styles */
        .form-group input:hover,
        .form-group select:hover {
            border-color: #087c7c;
        }

        .hr {
            width: 100%;
            height: 0.5px;
            opacity: 0.5;
            background-color: var(--text-color);
            margin: 20px 0;
        }

        hr {
            margin: 20px 0;
        }

        @media print {
            input[type=radio] {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto;
                background: none;
            }
        }

        label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 5px 0;
            cursor: pointer;
        }


        .plan-of-land-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .plan-of-land-table td {
            padding: 10px;
            vertical-align: top;
            border: 1px solid #30363d;
        }

        .plan-of-land-table td.center {
            text-align: center;
        }


        .plan-of-land-table input[type="file"] {
            padding: 5px;
        }

        .plan-of-land-table .empty-row {
            height: 20px;
            background-color: #161b22;
        }

        .building-color-checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        }

        .security-checkbox-group {
            display: grid;
            grid-template-columns: auto auto auto
        }

        .security-checkbox-group label {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .building-color-checkbox-group label {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Align to the left, or change to 'center' if you want to center horizontally */
            cursor: pointer;
            font-size: 14px;
        }

        .building-color-custom {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            border: 1px solid #30363d;
            background-color: #24292f;
            color: #f4f5f6;
        }

        .building-color-custom.hidden {
            display: none;
        }

        #selectedFacilities {
            margin-top: 10px;
            padding: 10px;
            background-color: var(--card-bg);
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: var(--bg-color-1);
        }

        .facility-item span {
            margin-right: 10px;
        }

        .facility-item button {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        #selectedTribes {
            margin-top: 10px;
            padding: 10px;
            background-color: var(--card-bg);
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .tribe-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: var(--bg-color-1);
        }

        .tribe-item span {
            margin-right: 10px;
        }

        .tribe-item button {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .table-container {
            overflow-x: auto; /* Ensure responsiveness for smaller screens */
            margin: 20px auto;
            max-width: 100%;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }

        .schedule-table th, .schedule-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .schedule-table th {
            background-color: #009688;
            color: #fff;
        }

        .tribe-item button:hover {
            background-color: #d32f2f;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .registration-container {
                padding: 15px;
            }

            .card-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="registration-container">
    <form id="registrationForm" method="POST" action="" enctype="multipart/form-data">
    {{ csrf_field() }}

    <!-- Section 1: Personal Details -->
        <div id="slide1" class="form-slide active slide">
            <div class="slide-number">1/21</div>
            <h2>Personal Details</h2>
            <br>
            <div class="form-group">
                <label>Title <span class="required">*</span></label>
                <select name="title" required>
                    <option value="">Select Title</option>
                    <option value="MR">MR</option>
                    <option value="MRS">MRS</option>
                    <option value="MISS">MISS</option>
                    <option value="DR">DR</option>
                    <option value="CHIEF">CHIEF</option>
                    <option value="PASTOR">PASTOR</option>
                    <option value="PROF">PROF</option>
                    <option value="QUEENMOTHER">QUEENMOTHER</option>
                    <option value="BISHOP">BISHOP</option>
                    <option value="PRINCE">PRINCE</option>
                    <option value="PRINCESS">PRINCESS</option>
                    <option value="FATHER">FATHER</option>
                    <option value="CHEF">CHEF</option>
                    <option value="SRGT">SRGT</option>
                    <option value="HON">HON</option>
                    <option value="COL">COL</option>
                    <option value="LFT COL">LFT COL</option>
                    <option value="B.GEN">B.GEN</option>
                    <option value="CPT">CPT</option>
                    <option value="NANA">NANA</option>
                    <option value="TORGBE">TORGBE</option>
                </select>
            </div>

            <div class="form-group">
                <label>First Name <span class="required">*</span></label>
                <input id="name-field1" type="text" name="first_name" required>
            </div>

            <div class="form-group">
                <label>Last Name <span class="required">*</span></label>
                <input id="name-field1" type="text" name="last_name" required>
            </div>

            <div class="form-group">
                <label>Other Names</label>
                <input id="name-field1" type="text" name="other_names">
            </div>

            <div class="form-group">
                <label>Date of Birth <span class="required">*</span></label>
                <input type="date" name="dob" required>
            </div>

            <div class="form-group">
                <label>Gender <span class="required">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="male" required> Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female" required> Female
                    </label>
                    <label>
                        <input type="radio" name="gender" value="other" id="genderOther" required> Other
                    </label>
                </div>
                <div id="genderOtherField" class="conditional-field hidden">
                    <input type="text" name="gender_other" placeholder="Specify your gender">
                </div>
            </div>
            <div class="hr"></div>
            <div class="form-group">
                <label>Nationality <span class="required">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="nationality" value="ghanian" required> Ghanian
                    </label>
                    <label>
                        <input type="radio" name="nationality" value="foreigner" id="foreignerNationality" required>
                        Foreigner
                    </label>
                </div>
                <div id="foreignCountryField" class="conditional-field hidden">
                    <select name="foreign_country">
                        <option value="">Select Country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                        </option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                        </option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                            Republic of
                        </option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                            Sandwich Islands
                        </option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                        </option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
            </div>
            <div class="hr"></div>

            <div class="form-group">
                <label for="dualCitizenship">Dual Citizenship</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="dual_citizenship" id="dualCitizenship"
                               onclick="toggleDualCitizenship()"> Yes
                    </label>
                </div>
                <div id="dualCitizenshipCountries" class="conditional-field hidden">
                    <div class="multiple-select">
                        <select id="countryDropdown" class="select-dropdown" onchange="handleCountrySelection()">
                            <option value="" disabled selected>Select a country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of
                                The
                            </option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic
                                of
                            </option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                                Republic of
                            </option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                                Sandwich Islands
                            </option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                            </option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                    <div id="selectedCountries">
                        <!-- Selected countries will appear here -->
                    </div>
                </div>
            </div>
            <div class="hr"></div>

            <div class="form-group">
                <label>Non ID Holder</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="non_id_holder" id="nonIdHolder"> Yes
                    </label>
                </div>
                <div id="nonIdHolderDetails" class="conditional-field hidden">
                    <h3>Non ID Holder Guarantor's Details</h3>
                    <input type="text" name="guarantor_name" placeholder="Guarantor's Name">
                    <input type="text" name="guarantor_id_no" placeholder="Guarantor's ID No">
                </div>
            </div>

            <div class="hr"></div>

            <div class="form-group">
                <label>ID Type</label>
                <div class="radio-group">
                    <label for="id_type_gh">
                        <input type="radio" name="id_type" id="id_type_gh" value="Ghana Card">
                        <span>Ghana Card</span>
                    </label>
                    <label for="id_type_pp">
                        <input type="radio" name="id_type" id="id_type_pp" value="Passport"> Passport
                    </label>
                    <label for="id_type_fp">
                        <input type="radio" name="id_type" id="id_type_fp" value="Foreigner Passport"> Foreigner
                        Passport
                    </label>
                    <label for="id_type_ovi">
                        <input type="radio" name="id_type" id="id_type_ovi" value="Other Valid Id"> Other Valid Id
                    </label>
                    <label for="id_type_nin">
                        <input type="radio" name="id_type" id="id_type_nin" value="NIN for Nigerians"> NIN for Nigerians
                    </label>
                </div>
            </div>

            <div class="hr"></div>

            <div class="form-group">
                <label>ID Attachment</label>
                <div class="radio-group">
                    <div class="attachment-container">
                        <div class="card-grid">
                            <div class="card" data-type="front">
                                <h3>Front of card</h3>
                                <p>Click to snap live image OR attach ID Photo from your files</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" accept="image/*" capture="environment" style="display: none;">
                            </div>
                            <div class="card" data-type="back">
                                <h3>Back of card</h3>
                                <p>Click to snap live image OR attach ID Photo from your files</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" accept="image/*" capture="environment" style="display: none;">
                            </div>
                            <div class="card" data-type="front-holding">
                                <h3>Front of card</h3>
                                <p>Click to open camera to snap live image of you holding front of ID to your chest</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="user" style="display: none;">
                            </div>
                            <div class="card" data-type="back-holding">
                                <h3>Back of card</h3>
                                <p>Click to open camera to snap live image of you holding back of ID to your chest</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="user" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-container">
                <div class="form-group">
                    <label for="idNo">ID NO <span class="required">*</span></label>
                    <input type="text" id="idNo" name="idNo" required>
                </div>
                <div class="form-group">
                    <label for="idIssuer">ID Issuer <span class="required">*</span></label>
                    <input type="text" id="idIssuer" name="idIssuer" required>
                </div>
                <div class="form-group">
                    <label for="countryOfIssue">Country of Issue <span class="required">*</span></label>
                    <select id="countryOfIssue" name="countryOfIssue" required>
                        <option value="">Select a country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                        </option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                        </option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                            Republic of
                        </option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                            Sandwich Islands
                        </option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                        </option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="idIssuingDate">ID Issuing Date <span class="required">*</span></label>
                    <input type="date" id="idIssuingDate" name="idIssuingDate" required>
                </div>
                <div class="form-group">
                    <label for="idExpiryDate">ID Expiry Date <span class="required">*</span></label>
                    <input type="date" id="idExpiryDate" name="idExpiryDate" required>
                </div>
            </div>


        </div>

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
                <label>Street Name <span class="required">*</span></label>
                <input type="text" name="street_name">
            </div>

            <div class="form-group card">
                <div class="card" data-type="front">
                    <h3>Digital Address QR Image</h3>
                    <p>Click to snap live image OR attach ID Photo from your files</p>
                    <button class="upload-btn">Take Photo</button>
                    <input type="file" name="digital_address_qr" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
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
                        <input type="radio" name="hair_color" id="hair_color_brown" value="brown">
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
                <input type="text" id="hair_color_specify" class="hidden" placeholder="Specify other hair color">
            </div>

            <div class="hr"></div>
            <div class="form-group">
                <label>Disability</label>
                <div class="radio-group">
                    <label for="disability_none">
                        <input type="radio" name="disability" id="disability_none" value="none">
                        <span>None</span>
                    </label>
                    <label for="disability_visually_impaired">
                        <input type="radio" name="disability" id="disability_visually_impaired"
                               value="visually impaired">
                        <span>Visually Impaired</span>
                    </label>
                    <label for="disability_other">
                        <input type="radio" name="disability" id="disability_other" value="other">
                        <span>Other (Kindly Specify)</span>
                    </label>
                </div>
                <input type="text" id="disability_specify" class="hidden" placeholder="Specify other disability">
            </div>

            <div class="hr"></div>

            <div class="form-group">
                <label>Phone Number <span class="required">*</span></label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>
            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>

            </div>

            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>
            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>
        </div>

        <!-- Section 3: Occupation -->
        <div id="slide3" class="form-slide slide">
            <div class="slide-number">3/21</div>
            <h2>Occupation</h2>
            <br>
            <div class="form-group">
                <label>Category</label>
                <div class="radio-group">
                    <label for="category_employed">
                        <input type="radio" name="occupation_category" id="category_employed" value="Employed">
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
                        <input type="radio" name="occupation_sector" id="sector_private" value="Private">
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
                               onchange="handleMaritalStatusChange()">
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
                <select name="rbf_denomination_name" id="rbf_denomination_name" required
                        onchange="toggleOtherRbfField()">
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
                    <input type="text" id="otherLanguage" placeholder="Specify language"/>
                    <button class="upload-btn" type="button" onclick="addOtherLanguage()">Add Language</button>
                </div>
                <div id="selectedLanguages">
                    <!-- Selected languages will appear here -->
                </div>
            </div>

            <div class="form-group">
                <label>SSNIT No</label>
                <input type="text" name="ssnit_no">
                <a href="#" target="_blank"><h6>(Click here to get SSNIT if you don’t have one)</h6></a>
            </div>

            <div class="form-group">
                <label>NHIS No </label>
                <input type="text" name="nhis_no">
                <a href="#" target="_blank"><h6>(Click here to get NHIS if you don’t have one)</h6></a>
            </div>

        </div>

        <!-- Section 4: Biometric Capture -->
        <div id="slide4" class="form-slide slide">
            <div class="slide-number">4/21</div>
            <h2>Biometric Capture</h2>
            <br>
            <div class="form-group">
                <label>ID Attachment</label>
                <div class="radio-group">
                    <div class="attachment-container">
                        <div class="card-grid">
                            <div class="card" data-type="front">
                                <h3>Four Left fingers & Palm Capture <span class="required">*</span></h3>
                                <p>Click to snap live image OR attach ID Photo from your files</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="environment" style="display: none;">
                            </div>
                            <div class="card" data-type="back">
                                <h3>Left Thumb fingers Capture <span class="required">*</span></h3>
                                <p>Click to snap live image OR attach ID Photo from your files</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="environment" style="display: none;">
                            </div>
                            <div class="card" data-type="front-holding">
                                <h3>Four Right Fingers & Palm Capture <span class="required">*</span></h3>
                                <p>Click to open camera to snap live image of you holding front of ID to your chest</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="user" style="display: none;">
                            </div>
                            <div class="card" data-type="back-holding">
                                <h3>Right Thumb fingers Capture <span class="required">*</span></h3>
                                <p>Click to open camera to snap live image of you holding back of ID to your chest</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="user" style="display: none;">
                            </div>
                            <div class="card" data-type="back-holding">
                                <h3>Face ID capture <span class="required">*</span></h3>
                                <p>Click to open camera to snap live image of you holding back of ID to your chest</p>
                                <button class="upload-btn">Take Photo</button>
                                <input type="file" accept="image/*" capture="user" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Create Password <span class="required">*</span></label>
                <input type="text" name="createPassword">
            </div>
            <div class="form-group">
                <label>Digital Signation/Stamp <span class="required">*</span></label>
                <input type="text" name="digitalSignature">
            </div>

        </div>

        <!-- Section 5: Biometric Capture -->
        <div id="slide5" class="form-slide slide">
            <div class="slide-number">5/21</div>
            <h2>Organization/Joint Ownership</h2>
            <br>


            <div class="form-group">
                <label>Company Name <span class="required">*</span></label>
                <input type="text" name="company-name">
            </div>

            <!-- Company Category  -->
            <div class="form-group">
                <label>Company Category</label>
                <div class="radio-group">
                    <label for="company_category_government">
                        <input type="radio" name="company_category" id="company_category_government" value="Government">
                        <span>Government</span>
                    </label>
                    <label for="company_category_Private">
                        <input type="radio" name="company_category" id="company_category_Private" value="Private">
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
                <input type="text" name="company-email">
                <a href="#" target="_blank"><h6>(Click here to create a free email if you don’t have one)</h6></a>
            </div>
            <div class="form-group">
                <label>Company Website/URL</label>
                <input type="text" name="company-url">
                <a href="#" target="_blank"><h6>(Click here to create a free website if you don’t have one)</h6></a>
            </div>
            <div class="form-group">
                <label>Company Phone <span class="required">*</span></label>
                <input type="text" name="company-phone">
                <a href="#" target="_blank"><h6>(Click here to get one landline for free if you don’t have one)</h6></a>
            </div>
            <div class="form-group">
                <label>Company Reg No <span class="required">*</span></label>
                <input type="text" name="company-reg-no">
            </div>

            <!-- Company Type -->
            <div class="form-group">
                <label>Company Type</label>
                <div class="radio-group">
                    <label for="company_type_government">
                        <input type="radio" name="company_type" id="company_type_government" value="Government">
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
                <input type="text" name="company-phone">
                <a href="#" target="_blank"><h6>(Click here to get a free TIN if you don’t have one)</h6></a>
            </div>

            <div class="form-group">
                <label>Company Representative ID</label>
                <input type="text" name="company-representative-id">
            </div>

        </div>

        <!-- Section 6: Property/Asset  -->
        <div id="slide6" class="form-slide slide">
            <div class="slide-number">6/21</div>
            <h2>Property/Asset Information</h2>
            <br>

            <!-- Property/Asset Type Selection -->
            <div class="form-group">
                <label>Type of Property/Asset</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" id="bareLandCheckbox" onclick="togglePropertyFields()"> Bare Land
                    </label>
                    <label>
                        <input type="checkbox" id="buildingCheckbox" onclick="togglePropertyFields()"> Building
                    </label>
                    <label>
                        <input type="checkbox" id="property_ip" onclick="togglePropertyFields()"> IP
                    </label>
                    <label>
                        <input type="checkbox" id="property_others" onclick="togglePropertyFields()"> Others
                    </label>
                </div>
            </div>
            <div class="hr"></div>
            <div class="form-group">
                <label>Status of Property/Asset</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="completion_status" value="completed"> Completed
                    </label>
                    <label>
                        <input type="radio" name="completion_status" value="uncompleted"> Uncompleted
                    </label>
                    <label>
                        <input type="radio" name="completion_status" value="new"> New
                    </label>
                </div>
            </div>

            <!-- Property/Asset Address Form -->
            <div id="propertyFields" class="conditional-field hidden">
                <h3>Property/Asset Address</h3>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Click here to enter text.">
                </div>
                <div class="form-group">
                    <label for="houseNumber">House Number <span class="required">*</span></label>
                    <input type="text" id="houseNumber" name="houseNumber" placeholder="Click here to enter text.">
                </div>
                <div class="form-group">
                    <label for="locality">Locality <span class="required">*</span></label>
                    <input type="text" id="locality" name="locality" placeholder="Click here to enter text.">
                </div>
                <div class="form-group">
                    <label for="town">Town <span class="required">*</span></label>
                    <select id="town" name="town">
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
                    <label for="district">Municipal/District <span class="required">*</span></label>
                    <select id="district" name="district">
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
                    <label>Region</label>
                    <select name="property_asset_region" id="property_asset_region" onchange="toggleOtherRegionField()">
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
                    <div id="otherPropertyAssetRegionField" class="conditional-field hidden">
                        <input type="text" name="other_asset_region" id="other_asset_region"
                               placeholder="Specify Region">
                    </div>
                </div>


                <div class="form-group">
                    <label for="digitalAddress">Digital Address <span class="required">*</span></label>
                    <input type="text" id="digitalAddress" name="digitalAddress"
                           placeholder="Click here to enter text.">
                    <a href="#" target="_blank"><h6>(Click link to generate Digital Address )</h6></a>
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude No</label>
                    <input type="text" id="longitude" name="longitude" placeholder="Generated Longitude">
                    <a href="#" target="_blank"><h6>(Click link to generate Digital Address )</h6></a>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude No</label>
                    <input type="text" id="latitude" name="latitude" placeholder="Generated Latitude">
                    <a href="#" target="_blank"><h6>(Click link to generate Digital Address )</h6></a>
                </div>
                <div class="form-group">
                    <label for="poBox">P. O. Box/PMB Number</label>
                    <input type="text" id="poBox" name="poBox" placeholder="Click here to enter text.">
                </div>
                <div class="form-group">
                    <label for="sitePlanNumber">Site Plan Number</label>
                    <input type="text" id="sitePlanNumber" name="sitePlanNumber"
                           placeholder="Click here to enter text.">
                </div>
                <div class="form-group">
                    <label for="landSize">Land Size</label>
                    <input type="text" id="landSize" name="landSize" placeholder="x feet by x feet">
                </div>

                <div class="form-group">
                    <label>Site Plan Attachment</label>
                    <div class="radio-group">
                        <div class="attachment-container">
                            <div class="card-grid">
                                <div class="card" data-type="front">
                                    <h3>Site Plan QR Image</h3>
                                    <br>
                                    <p>Open camera to scan QR code</p>
                                    <button class="upload-btn">Upload Image</button>
                                    <input type="file" accept="image/*" capture="environment" style="display: none;">
                                </div>
                                <div class="card" data-type="back">
                                    <h3>Attach Site Plan</h3>
                                    <br>
                                    <p>Open camera to snap site plan or attach site plan image</p>
                                    <button class="upload-btn">Upload Image</button>
                                    <input type="file" accept="image/*" capture="environment" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 7: Form of land  -->
        <div id="slide7" class="form-slide slide">
            <div class="slide-number">7/21</div>
            <h2>Property/Asset Information</h2>
            <br>
            <div class="form-group">
                <table class="plan-of-land-table">
                    <!-- First Row -->
                    <tr>
                        <td colspan="3" class="center">
                            <p>Plan of Land</p>
                            <p>For: <input type="text" id="planFor" placeholder="Enter text"></p>
                        </td>
                    </tr>

                    <!-- Second Row -->
                    <tr>
                        <td>
                            <label>Scale:</label> <input type="text" id="scale" placeholder="Enter scale">
                        </td>
                        <td>
                            <label>Area:</label><input type="text" id="area" placeholder="Enter area">
                        </td>
                    </tr>

                    <!-- Third Row -->
                    <tr>
                        <td class="center">
                            <label>Locality:</label> <input type="text" id="locality" placeholder="Enter locality">
                        </td>
                        <td>
                            <label>District/Metro/Municipal:</label>
                            <select id="district">
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
                        </td>
                        <td>
                            <label>Region:</label>
                            <select id="region">
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
                            </select>
                        </td>
                    </tr>

                    <!-- Fourth Row -->
                    <tr>
                        <td colspan="3" class="empty-row"></td>
                    </tr>

                    <!-- Fifth Row -->
                    <tr>
                        <!-- First Column -->
                        <td>
                            <p>
                                <span>I,</span> <input type="text" id="surveyorName" placeholder="Enter your name">.
                                Licensed surveyor hereby certify
                                that this plan is faithfully and correctly executed and accurately shows the land within
                                the limits of
                                the description given to me by my client.
                            </p>
                            <p>
                                Date: <input type="date" id="date">
                            </p>
                        </td>

                        <!-- Second Column -->
                        <td>
                            <p>Approved Seal</p>
                            <p>Upload Signature (file field):</p>
                            <input type="file" id="signature" accept="image/*" capture="camera">
                            <p>Lic. Surveyor’s Number:</p>
                            <input type="text" id="licenseNumber" placeholder="Enter license number">
                        </td>

                        <!-- Third Column -->
                        <td>
                            <p>Approved by</p>
                            <p>
                                Regional Surveyor Ghana Card ID. Number:
                                <input type="text" id="ghanaCard" placeholder="Enter Ghana Card ID">
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-container">
                <h3>Pillar Details</h3>

                <!-- Pillar Details Container -->
                <div id="pillarDetailsContainer">
                    <!-- Pillar 1 Details -->
                    <div class="pillar-details" id="pillar-1">
                        <h4>Pillar 1 Details</h4>
                        <div class="form-group">
                            <label for="pillarNumber1">Pillar Number 1:</label>
                            <input type="text" id="pillarNumber1" name="pillarNumber1"
                                   placeholder="Enter pillar number">
                            <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number
                                    )</h6></a>
                        </div>
                        <div class="form-group">
                            <label for="pillarAddress1">Pillar 1 Digital Address Number:</label>
                            <input type="text" id="pillarAddress1" name="pillarAddress1"
                                   placeholder="Enter digital address number">
                        </div>
                        <div class="form-group">
                            <div class="card" data-type="back">
                                <h3>Pillar Images</h3>
                                <p>2 photos to be taken or attached</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" id="pillarImages1" name="pillarImages1[]" accept="image/*"
                                       capture="camera" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- Pillar 2 Details -->
                    <div class="pillar-details" id="pillar-2">
                        <h4>Pillar 2 Details</h4>
                        <div class="form-group">
                            <label for="pillarNumber2">Pillar Number 2:</label>
                            <input type="text" id="pillarNumber2" name="pillarNumber2"
                                   placeholder="Enter pillar number">
                            <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number
                                    )</h6></a>
                        </div>
                        <div class="form-group">
                            <label for="pillarAddress2">Pillar 2 Digital Address Number:</label>
                            <input type="text" id="pillarAddress2" name="pillarAddress2"
                                   placeholder="Enter digital address number">
                        </div>
                        <div class="form-group">
                            <div class="card" data-type="back">
                                <h3>Pillar Images</h3>
                                <p>2 photos to be taken or attached</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" id="pillarImages2" name="pillarImages2[]" accept="image/*"
                                       capture="camera" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- Pillar 3 Details -->
                    <div class="pillar-details" id="pillar-3">
                        <h4>Pillar 3 Details</h4>
                        <div class="form-group">
                            <label for="pillarNumber3">Pillar Number 3:</label>
                            <input type="text" id="pillarNumber3" name="pillarNumber3"
                                   placeholder="Enter pillar number">
                            <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number
                                    )</h6></a>
                        </div>
                        <div class="form-group">
                            <label for="pillarAddress3">Pillar 3 Digital Address Number:</label>
                            <input type="text" id="pillarAddress3" name="pillarAddress3"
                                   placeholder="Enter digital address number">
                        </div>
                        <div class="form-group">
                            <div class="card" data-type="back">
                                <h3>Pillar Images</h3>
                                <p>2 photos to be taken or attached</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" id="pillarImages3" name="pillarImages3[]" accept="image/*"
                                       capture="camera" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- Pillar 4 Details -->
                    <div class="pillar-details" id="pillar-4">
                        <h4>Pillar 4 Details</h4>
                        <div class="form-group">
                            <label for="pillarNumber4">Pillar Number 4:</label>
                            <input type="text" id="pillarNumber4" name="pillarNumber4"
                                   placeholder="Enter pillar number">
                            <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number
                                    )</h6></a>
                        </div>
                        <div class="form-group">
                            <label for="pillarAddress4">Pillar 4 Digital Address Number:</label>
                            <input type="text" id="pillarAddress4" name="pillarAddress4"
                                   placeholder="Enter digital address number">
                        </div>
                        <div class="form-group">
                            <div class="card" data-type="back">
                                <h3>Pillar Images</h3>
                                <p>2 photos to be taken or attached</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" id="pillarImages4" name="pillarImages4[]" accept="image/*"
                                       capture="camera" style="display: none;" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add More Button -->
                <button id="addPillarBtn" class="upload-btn" onclick="addPillar()">Add More Pillar Details (+)</button>
            </div>


        </div>

        <!-- Section 8: PARTY A / Witness  -->
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
                        <input type="radio" name="representing_as_a" id="ra_lessor_a" value="Lessor">
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
                        <input type="radio" name="representing_for_a" id="rf_individual_a" value="Individual">
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
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>

            <div class="Living">
                <label>Living</label>
                <div class="radio-group">
                    <label for="living_yes_a">
                        <input type="radio" name="living_a" id="living_yes_a" value="Yes">
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
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
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

        <!-- Section 9: PARTY B / Witness  -->
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
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
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
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>
            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>

            </div>

            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>
            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
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

        <!-- Section 10: Deponent Details  -->
        <div id="slide10" class="form-slide slide">
            <div class="slide-number">10/21</div>
            <h2>Deponent Details</h2>
            <br>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="deponent_name">
            </div>

            <div class="form-group">
                <label>Digital Address</label>
                <input type="text" name="deponent_digital_address">
            </div>

            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="deponent_id_number">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>

            <div class="Living">
                <label>Living</label>
                <div class="radio-group">
                    <label for="deponent_living_yes">
                        <input type="radio" name="deponent_living" id="deponent_living_yes" value="Yes">
                        <span>Yes</span>
                    </label>
                    <label for="deponent_living_no">
                        <input type="radio" name="deponent_living" id="deponent_living_no" value="No">
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Digital Signature</label>
                <input type="text" name="deponent_digital_signature">
            </div>

            <h3>Indenture Details</h3>
            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Indenture Files</h3>
                    <p>Open camera to snap files/attach files from external source About 100 Attachment can be attached
                        here</p>
                    <button class="upload-btn">Upload Image</button>
                    <input type="file" id="indentureFiles" name="indentureFiles[]" accept="image/*" capture="camera"
                           style="display: none;" multiple>
                </div>
            </div>

            <div class="form-group">
                <label>Term <span class="required">*</span></label>
                <select name="term" required>
                    <option value="">Select Number of years</option>
                    <option value="1-10 Years">1-10 Years</option>
                    <option value="10-20 Years">10-20 Years</option>
                    <option value="20-30 Years">20-30 Years</option>
                    <option value="30-40 Years">30-40 Years</option>
                    <option value="40-50 Years">40-50 Years</option>
                    <option value="50-60 Years">50-60 Years</option>
                    <option value="60-70 Years">60-70 Years</option>
                    <option value="70-80 Years">70-80 Years</option>
                    <option value="80-90 Years">80-90 Years</option>
                    <option value="10 Years">90-200 Years</option>
                </select>
            </div>

            <div class="form-group">
                <label>Start Period</label>
                <input type="date" name="start_period">
            </div>

            <div class="form-group">
                <label>End Period</label>
                <input type="date" name="end_period">
            </div>

            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Agreement Files</h3>
                    <p>Click to add Files and Click to add Images</p>
                    <button class="upload-btn">Upload Image</button>
                    <input type="file" id="agreementFiles" name="agreementFiles[]" accept="image/*" capture="camera"
                           style="display: none;" multiple>
                </div>
            </div>

            <div class="form-group">
                <label>Agreement Text</label>
                <textarea name="agreement_text" style="resize: vertical;"></textarea>
            </div>


            <h3>Solicitor's Personal Details</h3>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="solicitor_name">
            </div>

            <div class="form-group">
                <label>Digital Address</label>
                <input type="text" name="solicitor_digital_address">
            </div>

            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="solicitor_id_number">
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>


            <div class="Living">
                <label>Living</label>
                <div class="radio-group">
                    <label for="solicitor_living_yes">
                        <input type="radio" name="solicitor_living" id="solicitor_living_yes" value="Yes">
                        <span>Yes</span>
                    </label>
                    <label for="solicitor_living_no">
                        <input type="radio" name="solicitor_living" id="solicitor_living_no" value="No">
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Digital Signature</label>
                <input type="text" name="solicitor_digital_signature">
            </div>

        </div>

        <!-- Section 11: Land Title/Concurrence details (Optional)  -->
        <div id="slide11" class="form-slide slide">
            <div class="slide-number">11/21</div>
            <h2>Land Title/Concurrence Details (Optional)</h2>
            <br>
            <div class="form-group">
                <label for="landTitleNumber">Land Title Number:</label>
                <input type="text" id="landTitleNumber" name="landTitleNumber" placeholder="Enter Land Title Number">
            </div>

            <div class="card" data-type="back">
                <h3>Land Title/Concurrence Image</h3>
                <p>Photos to be taken or attached</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" id="landTitleImages" name="landTitleImages[]" accept="image/*" capture="camera"
                       style="display: none;" multiple>
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
                           style="display: none; margin-left: 10px;"/>

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
                <a href="#" target="_blank"><h6>(Click here to apply for new Title/Concurrence)</h6></a>
            </div>

            <!-- Payment Code -->
            <div class="form-group">
                <label for="paymentCode">Payment Code:</label>
                <input type="text" id="paymentCode" name="paymentCode" placeholder="Enter Payment Code">
            </div>

        </div>

        <!-- Section 12: Yellow Card details (Optional)  -->
        <div id="slide12" class="form-slide slide">
            <div class="slide-number">12/21</div>
            <h2>Yellow Card Details (Optional)</h2>
            <br>
            <div class="form-group">
                <label for="landTitleNumber">Yellow card Number:</label>
                <input type="text" id="landTitleNumber" name="landTitleNumber" placeholder="Enter Land Title Number">
            </div>

            <div class="card" data-type="back">
                <h3>Yellow Card Image</h3>
                <p>photos to be taken or attached</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" id="yellowCardImages" name="yellowCardImages[]" accept="image/*" capture="camera"
                       style="display: none;" multiple>
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
                           style="display: none; margin-left: 10px;"/>

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
                <a href="#" target="_blank"><h6>(Click here to apply for new Yellow Card)</h6></a>
            </div>

            <!-- Payment Code -->
            <div class="form-group">
                <label for="paymentCode">Payment Code:</label>
                <input type="text" id="paymentCode" name="paymentCode" placeholder="Enter Payment Code">
            </div>

        </div>

        <!-- Section 13: Building Permit details   -->
        <div id="slide13" class="form-slide slide">
            <div class="slide-number">13/21</div>
            <h2>Building Permit Details</h2>
            <br>
            <div class="form-group">
                <label for="landTitleNumber">Building Permit Number:</label>
                <input type="text" id="landTitleNumber" name="landTitleNumber"
                       placeholder="Enter Building Permit Number">
            </div>

            <div class="card" data-type="back">
                <h3>Building Permit Image</h3>
                <p>photos to be taken or attached</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" id="buildingPermitImages" name="buildingPermitImages[]" accept="image/*"
                       capture="camera" style="display: none;" multiple>
            </div>

            <div class="form-group">
                <label>Building Permit Status</label>
                <div>
                    <label for="apply_for_new">
                        <input type="radio" name="building_permit_status" id="apply_for_new"
                               value="Apply for new building Permit">
                        <span>Apply for new building Permit</span>
                    </label>
                    <label for="renew">
                        <input type="radio" name="building_permit_status" id="renew" value="Renew building permit">
                        <span>Renew building permit</span>
                    </label>
                    <a href="#" target="_blank"><h6>(Click here to pay)</h6></a>
                </div>
            </div>
            <!-- Payment Code -->
            <div class="form-group">
                <label for="paymentCode">Payment Code:</label>
                <input type="text" id="paymentCode" name="paymentCode" placeholder="Enter Payment Code">
            </div>

            <div class="form-group">
                <h3>Permit Details (Optional)</h3>

                <!-- Permits Details Container -->
                <div id="permitDetailsContainer">
                    <!-- Permit 1 -->
                    <div class="permit-details" id="permit-1">
                        <h4>Permit 1</h4>
                        <div class="form-group">
                            <label for="permitName1">Permit Name:</label>
                            <input type="text" id="permitName1" name="permitName1" placeholder="Enter permit name">
                        </div>
                        <div class="form-group">
                            <label for="permitIssuer1">Issuer:</label>
                            <input type="text" id="permitIssuer1" name="permitIssuer1" placeholder="Enter issuer">
                        </div>
                        <div class="form-group">
                            <label>Region:</label>
                            <select id="region">
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
                            </select>

                        </div>
                        <div class="form-group">
                            <label>District/Municipal/Metro:</label>
                            <select id="district">
                                <option value="">Select District/Municipal/Metro</option>
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
                            <label for="permitPurpose1">Permit Purpose:</label>
                            <input type="text" id="permitPurpose1" name="permitPurpose1"
                                   placeholder="Enter permit purpose">
                        </div>
                        <div class="form-group">
                            <label for="issuingDate1">Issuing Date:</label>
                            <input type="date" id="issuingDate1" name="issuingDate1" value="2024-12-09">
                        </div>
                        <div class="form-group">
                            <label for="expiryDate1">Expiry Date:</label>
                            <input type="date" id="expiryDate1" name="expiryDate1" value="2024-12-09">
                        </div>
                        <div class="form-group">
                            <label for="permitCost1">Permit Cost:</label>
                            <input type="text" id="permitCost1" name="permitCost1" placeholder="Enter permit cost">
                        </div>
                        <div class="form-group">
                            <label for="paymentCode1">Payment Code:</label>
                            <input type="text" id="paymentCode1" name="paymentCode1" placeholder="Enter payment code">
                        </div>
                        <div class="form-group">
                            <label for="issuingOfficer1">Issuing Officer:</label>
                            <input type="text" id="issuingOfficer1" name="issuingOfficer1"
                                   placeholder="Enter issuing officer">
                        </div>
                    </div>
                </div>

                <!-- Add More Permit Button -->
                <button id="addPermitBtn" class="upload-btn" onclick="addPermit()">Click here to add more permit
                </button>
            </div>
        </div>

        <!-- Section 14: Building Permit details   -->
        <div id="slide14" class="form-slide slide">
            <div class="slide-number">14/21</div>
            <h2>Building Plan Details</h2>
            <br>
            <div class="card" data-type="back">
                <h3>Building Plan Files</h3>
                <p>More files can be attached</p>
                <button class="upload-btn">Upload Files</button>
                <input type="file" id="buildingPlanImages" name="buildingPlanImages[]" accept="image/*" capture="camera"
                       style="display: none;" multiple>
            </div>

            <div class="form-group">
                <label>Storey</label>
                <input type="number" name="storey" min=0 max=1000>
            </div>

            <div class="card" data-type="back">
                <h3>BOQ Files</h3>
                <p>More files can be attached</p>
                <button class="upload-btn">Upload Files</button>
                <input type="file" id="BOQImages" name="BOQImages[]" accept="image/*" capture="camera"
                       style="display: none;" multiple>
            </div>

            <div class="form-group">
                <label>Current Building Status</label>
                <div class="radio-group">
                    <label for="completed_with_finishes">
                        <input type="radio" name="current_building_status" id="completed_with_finishes"
                               value="Completed With Finishes">
                        <span>Completed With Finishes</span>
                    </label>
                    <label for="completed_without_finishes">
                        <input type="radio" name="current_building_status" id="completed_without_finishes"
                               value="Completed Without Finishes">
                        <span>Completed Without Finishes</span>
                    </label>
                    <label for="uncompleted">
                        <input type="radio" name="current_building_status" id="uncompleted" value="Uncompleted">
                        <span>Uncompleted</span>
                    </label>
                </div>
            </div>

            <h4>Architech Details</h4>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="architect_first_name">
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="architect_last_name">
            </div>

            <div class="form-group">
                <label>Other Names</label>
                <input type="text" name="architect_other_name">
            </div>
            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="architect_id_number">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="email_address" name="rep_email_a" required>
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>

            <div class="form-group email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>

            <h2>Building Color</h2>
            <br>
            <!-- Exterior Color Scheme -->
            <div class="form-group">
                <h4>Exterior: Color Scheme</h4>
                <div class="building-color-checkbox-group">
                    <label>
                        <input type="checkbox" name="exteriorColors" value="White"> White
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Yellow"> Yellow
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Cream"> Cream
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Red"> Red
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Blue"> Blue
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Brown"> Brown
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Black"> Black
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Grey"> Grey
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Pink"> Pink
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Purple"> Purple
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Green"> Green
                    </label>
                    <label>
                        <input type="checkbox" name="exteriorColors" value="Others"
                               onclick="toggleOtherField('exteriorColors')"> Others
                    </label>
                </div>
                <input type="text" id="exteriorColors-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>

            <!-- Interior Color Scheme -->
            <div class="form-group">
                <h4>Interior: Color Scheme</h4>
                <div class="building-color-checkbox-group">
                    <label>
                        <input type="checkbox" name="interiorColors" value="White"> White
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Yellow"> Yellow
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Cream"> Cream
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Red"> Red
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Blue"> Blue
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Brown"> Brown
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Black"> Black
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Grey"> Grey
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Pink"> Pink
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Purple"> Purple
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Green"> Green
                    </label>
                    <label>
                        <input type="checkbox" name="interiorColors" value="Others"
                               onclick="toggleOtherField('interiorColors')"> Others
                    </label>
                </div>
                <input type="text" id="interiorColors-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>


            <h2>Utilities</h2>
            <br>
            <!-- Electricity Supply -->
            <div class="form-group">
                <h4>Electricity Supply</h4>
                <div class="utilities-checkbox-group">
                    <label>
                        <input type="checkbox" name="electricitySupply" value="ECG"> ECG
                    </label>
                    <label>
                        <input type="checkbox" name="electricitySupply" value="Solar"> SOLAR
                    </label>
                    <label>
                        <input type="checkbox" name="electricitySupply" value="IDEIST"> IDEIST
                    </label>
                    <label>
                        <input type="checkbox" name="electricitySupply" value="Others"
                               onclick="toggleOtherField('electricitySupply')"> OTHERS
                    </label>
                </div>
                <input type="text" id="electricitySupply-other" class="other-field utilities-other-field hidden"
                       placeholder="Specify other electricity supply">

                <hr>
                <div class="form-group">
                    <label>Meter Type</label>
                    <div class="utilities-checkbox-group">
                        <label><input type="checkbox" name="electricityMeter" value="Prepaid"> Prepaid</label>
                        <label><input type="checkbox" name="electricityMeter" value="Postpaid"> Postpaid</label>
                        <label><input type="checkbox" name="electricityMeter" value="Smart"> Smart</label>
                        <label><input type="checkbox" name="electricityMeter" value="QR Code/Image"> QR
                            Code/Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="electricityDeviceId">Meter/Device ID Number:</label>
                    <input type="text" id="electricityDeviceId" placeholder="Enter meter/device ID">
                </div>
            </div>

            <!-- Water Supply -->
            <div class="form-group">
                <h4>Water Supply</h4>
                <div class="utilities-checkbox-group">
                    <label>
                        <input type="checkbox" name="waterSupply" value="GWCL"> GWCL
                    </label>
                    <label>
                        <input type="checkbox" name="waterSupply" value="Borehole"> Borehole
                    </label>
                    <label>
                        <input type="checkbox" name="waterSupply" value="Well"> Well
                    </label>
                    <label>
                        <input type="checkbox" name="waterSupply" value="Community Water Supply"> Community Water Supply
                    </label>
                    <label>
                        <input type="checkbox" name="waterSupply" value="Water Car Supply"> Water Car Supply
                    </label>
                    <label>
                        <input type="checkbox" name="waterSupply" value="Others"
                               onclick="toggleOtherField('waterSupply')"> Others
                    </label>
                </div>
                <input type="text" id="waterSupply-other" class="other-field utilities-other-field hidden"
                       placeholder="Specify other water supply">
                <br>
                <div class="form-group">
                    <label for="gwclMeterNumber">GWCL Meter Number:</label>
                    <input type="text" id="gwclMeterNumber" placeholder="Enter GWCL Meter Number">
                </div>
                <div class="form-group">
                    <label>Meter Type</label>
                    <div class="utilities-checkbox-group">
                        <label><input type="checkbox" name="waterMeter" value="Prepaid"> Prepaid</label>
                        <label><input type="checkbox" name="waterMeter" value="Postpaid"> Postpaid</label>
                        <label><input type="checkbox" name="waterMeter" value="Smart"> Smart</label>
                        <label><input type="checkbox" name="waterMeter" value="QR Code/Image"> QR Code/Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="waterDeviceId">Meter/Device ID Number:</label>
                    <input type="text" id="waterDeviceId" placeholder="Enter meter/device ID">
                </div>
            </div>

            <!-- Gas Supply -->
            <div class="form-group">
                <h4>Gas Supply</h4>
                <div class="utilities-checkbox-group">
                    <label>
                        <input type="checkbox" name="gasSupply" value="Home Delivery"> Home Delivery
                    </label>
                    <label>
                        <input type="checkbox" name="gasSupply" value="Domestic Gas Supply"> Domestic Gas Supply
                    </label>
                </div>
                <div class="form-group">
                    <label for="gasMeterNumber">Gas Meter Number:</label>
                    <input type="text" id="gasMeterNumber" placeholder="Enter gas meter number">
                </div>
                <div class="form-group">
                    <label>Meter Type</label>
                    <div class="utilities-checkbox-group">
                        <label><input type="checkbox" name="gasMeter" value="Prepaid"> Prepaid</label>
                        <label><input type="checkbox" name="gasMeter" value="Postpaid"> Postpaid</label>
                        <label><input type="checkbox" name="gasMeter" value="Smart"> Smart</label>
                        <label><input type="checkbox" name="gasMeter" value="QR Code/Image"> QR Code/Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gasDeviceId">Meter/Device ID Number:</label>
                    <input type="text" id="gasDeviceId" placeholder="Enter meter/device ID">
                </div>
            </div>


        </div>

        <!-- Section 15: Building Permit details   -->
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
                <input type="text" name="sanitation-trash-bin-number" min=0 max=1000>
            </div>

            <div class="card" data-type="back">
                <h3>Sanitation Trash Bin QR Code/Image</h3>
                <p></p>
                <button class="upload-btn">Upload Files</button>
                <input type="file" id="sanitationQRCode" name="sanitationQRCode[]" accept="image/*" capture="camera"
                       style="display: none;" multiple>
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
                        <input type="checkbox" name="security_type" value="I don't want to talk about it"> Prefer not to
                        say
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
                        <input type="radio" name="internet_type" id="internet_dont"
                               value="I don’t want to talk about it">
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

        <!-- Section 16: Building Permit details   -->
        <div id="slide16" class="form-slide slide">
            <div class="slide-number">16/21</div>
            <h2>Room/Space Registration</h2>
            <br>


            <!-- Room/Space Options -->
            <div class="form-group">
                <label>Add Room/Space:</label>
                <button class="upload-btn">Add</button>
                <button class="upload-btn">Renovate</button>
            </div>

            <!-- Room Details -->
            <div class="form-group">
                <label>Number of Rooms/Space:</label>
                <input type="text" name="number_of_rooms" placeholder="Enter number of rooms/space">
            </div>
            <div class="form-group">
                <label>Room Name:</label>
                <select name="room_name">
                    <option value="">Select a room type</option>
                    <option value="Bedroom">Bedroom</option>
                    <option value="Kitchen">Kitchen</option>
                    <option value="Dining">Dining</option>
                    <option value="Toilet">Toilet</option>
                    <option value="Bathroom">Bathroom</option>
                    <option value="Garage">Garage</option>
                    <option value="Garden">Garden</option>
                    <option value="Store Room">Store Room</option>
                    <option value="Balcony">Balcony</option>
                    <option value="Living Room">Living Room</option>
                    <option value="Master Bedroom">Master Bedroom</option>
                    <option value="Cinema Room">Cinema Room</option>
                    <option value="Study Room">Study Room</option>
                    <option value="Others">Others (Please specify)</option>
                </select>
                <input type="text" name="room_name_other" placeholder="Specify if others">
            </div>

            <!-- Digital Address -->
            <div class="form-group">
                <label>Space/Room Digital Address</label>
                <input type="text" name="digital_address" placeholder="Enter digital address">
                <a href="https://www.ghanapostgps.com/map/" target="_blank"><h6>Click here to generate Space/Room
                        digital address</h6></a>
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="longitude" placeholder="Enter longitude">
                <a href="https://www.ghanapostgps.com/map/" target="_blank"><h6>Click here to generate</h6></a>
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="latitude" placeholder="Enter latitude">
                <a href="https://www.ghanapostgps.com/map/" target="_blank"><h6>Click here to generate</h6></a>
            </div>
            <div class="form-group">
                <label>Space/Room Google Location Link</label>
                <input type="text" name="latitude" placeholder="Enter latitude">
                <a href="https://www.google.com/maps/place/Accra,+Ghana/@5.5841833,-0.2385148,15376m/data=!3m1!1e3!4m6!3m5!1s0xfdf9084b2b7a773:0xbed14ed8650e2dd3!8m2!3d5.5592846!4d-0.1974306!16zL20vMGZueWM?entry=ttu&g_ep=EgoyMDI0MTIwMi4wIKXMDSoASAFQAw%3D%3D"
                   target="_blank"><h6>Click here to generate</h6></a>
            </div>

            <!-- Room/Space Size -->
            <div class="form-group">
                <label>Space/Room Size:</label>
                <input type="text" name="room_size" placeholder="x by x">
                <label>
                    <input type="checkbox" name="dimension" value="Ft"> Ft
                </label>
                <label>
                    <input type="checkbox" name="dimension" value="Mt"> Mt
                </label>
                <label>
                    <input type="checkbox" name="dimension" value="Cm"> Cm
                </label>
            </div>
            <hr>
            <!-- Room/Space Color -->
            <div class="form-group">

                <label>Space/Room Color</label>
                <div class="room-space-checkbox-group">
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="White"> White
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Yellow"> Yellow
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Cream"> Cream
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Red"> Red
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Blue"> Blue
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Brown"> Brown
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Black"> Black
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Grey"> Grey
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Pink"> Pink
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Purple"> Purple
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Green"> Green
                    </label>
                    <label>
                        <input type="checkbox" name="roomSpaceColors" value="Others"
                               onclick="toggleOtherField('roomSpaceColors')"> Others
                    </label>
                </div>
                <input type="text" id="roomSpaceColors-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>

            <hr>
            <div class="form-group">

                <label>Floor Type</label>
                <div class="room-space-checkbox-group">
                    <label>
                        <input type="checkbox" name="floorType" value="None"> None
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Concrete"> Concrete
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="tiles"> tiles
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="wooden"> wooden
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="grass"> grass
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Astroturf"> Astroturf
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Stones"> Stones
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Metal"> Metal
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Rug"> Rug
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Plastic"> Plastic
                    </label>
                    <label>
                        <input type="checkbox" name="floorType" value="Others" onclick="toggleOtherField('floorType')">
                        Others
                    </label>
                </div>
                <input type="text" id="floorType-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>


            <hr>
            <div class="form-group" style="display: flex; flex-direction: column;">

                <label>Roof Type</label>
                <div class="room-space-checkbox-group">
                    <label>
                        <input type="checkbox" name="roofType" value="Thatch"> Thatch
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Long span"> Long span
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Asbestos"> Asbestos
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Asphalt shingles"> Asphalt shingles
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Wood"> Wood
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Clay"> Clay
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Ceramic"> Ceramic
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Metal"> Metal
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="T&G"> T&G
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Concrete Plastic"> Concrete Plastic
                    </label>
                    <label>
                        <input type="checkbox" name="roofType" value="Others" onclick="toggleOtherField('roofType')">
                        Others
                    </label>
                </div>
                <input type="text" id="roofType-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>

            <hr>
            <div class="form-group">

                <label>Ceiling Type</label>
                <div class="room-space-checkbox-group">
                    <label>
                        <input type="checkbox" name="ceilingType" value="Wood"> Wood
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="Concrete"> Concrete
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="Local Mat"> Local Mat
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="Thatch"> Thatch
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="POP"> POP
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="T&G"> T&G
                    </label>
                    <label>
                        <input type="checkbox" name="ceilingType" value="Plastic"> Plastic
                    </label>

                    <label>
                        <input type="checkbox" name="ceilingType" value="Others"
                               onclick="toggleOtherField('ceilingType')"> Others
                    </label>
                </div>
                <input type="text" id="ceilingType-other" class="other-field building-color-custom hidden"
                       placeholder="Specify other colors">
            </div>

            <div class="form-group">
                <div class="card" data-type="front">
                    <h3>Space/Room Pictures</h3>
                    <br>
                    <p>Take or attach images</p>
                    <button class="upload-btn">Upload Images</button>
                    <input type="file" name="spaceRoomImages[]" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
            </div>

            <div class="form-group">
                <div class="card" data-type="front">
                    <h3>Space/Room Videos</h3>
                    <br>
                    <p>Take or attach videos</p>
                    <button class="upload-btn">Upload Videos</button>
                    <input type="file" name="spaceRoomVideos[]" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
            </div>

            <!-- Room Facilities -->
            <h3>Space/Room Facilities</h3>

            <!-- Facilities Multi-Select Dropdown -->
            <div class="form-group">
                <label for="facilityDropdown">Facilities:</label>
                <select id="facilityDropdown" multiple>
                    <option value="Bed">Bed</option>
                    <option value="Sofa">Sofa</option>
                    <option value="Shower">Shower</option>
                    <option value="Wardrobe">Wardrobe</option>
                    <option value="Heater">Heater</option>
                    <option value="Vehicle">Vehicle</option>
                    <option value="Fan">Fan</option>
                    <option value="AC">AC</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Bicycle">Bicycle</option>
                    <option value="Desk">Desk</option>
                    <option value="Bathtub">Bathtub</option>
                    <option value="Water Closet">Water Closet</option>
                    <option value="Hand Washing Basin">Hand Washing Basin</option>
                    <option value="Floor Tiles">Floor Tiles</option>
                    <option value="Curtains">Curtains</option>
                    <option value="Flower Pot">Flower Pot</option>
                    <option value="Drylines">Drylines</option>
                    <option value="Water Storage Tank">Water Storage Tank</option>
                    <option value="Washing Machine">Washing Machine</option>
                    <option value="Cooking Stove">Cooking Stove</option>
                    <option value="Gas Stove">Gas Stove</option>
                    <option value="Television">Television</option>
                    <option value="Computer and Mobile">Computer and Mobile</option>
                    <option value="Sound System">Sound System</option>
                    <option value="Cabinet">Cabinet</option>
                    <option value="Fridge">Fridge</option>
                    <option value="Dressing Mirror">Dressing Mirror</option>
                    <option value="Shelves">Shelves</option>
                    <option value="Pets and Livestock">Pets and Livestock</option>
                    <option value="Rack">Rack</option>
                    <option value="Massage Chair">Massage Chair</option>
                    <option value="Book Shelves">Book Shelves</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <!-- Selected Facilities List -->
            <div id="selectedFacilitiesWrapper" class="form-group hidden">
                <label>Selected Facilities:</label>
                <div class="hidden" id="selectedFacilities"></div>
            </div>


            <!-- Utilities -->
            <h3>Utilities</h3>
            <div class="form-group">
                <label>Electricity Supply:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="electricity" value="None"> None</label>
                    <label><input type="checkbox" name="electricity" value="ECG"> ECG</label>
                    <label><input type="checkbox" name="electricity" value="Solar"> Solar</label>
                    <label><input type="checkbox" name="electricity" value="IDEIST"> IDEIST</label>
                    <label><input type="checkbox" name="electricity" value="Others"
                                  onclick="toggleOtherField('electricity')"> Others</label>
                </div>
                <input type="text" id="electricity-other" class="other-field hidden"
                       placeholder="Specify other electricity supply">
            </div>

            <!-- Water Supply -->
            <div class="form-group">
                <label>Water Supply:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="water" value="GWCL"> GWCL</label>
                    <label><input type="checkbox" name="water" value="Borehole"> Borehole</label>
                    <label><input type="checkbox" name="water" value="Others" onclick="toggleOtherField('water')">
                        Others</label>
                </div>
                <input type="text" id="water-other" class="other-field hidden" placeholder="Specify other water supply">
            </div>

            <h4>Sanitation</h4>

            <div class="form-group">
                <label>Sanitation Type</label>
                <div class="radio-group">
                    <label for="sanitation_zoomlion_facility">
                        <input type="radio" name="sanitation_type_facility" id="sanitation_zoomlion_facility"
                               value="Zoomlion" onchange="toggleOtherSanitationFacilityField()">
                        <span>Zoomlion</span>
                    </label>
                    <label for="sanitation_none_facility">
                        <input type="radio" name="sanitation_type_facility" id="sanitation_none_facility" value="None"
                               onchange="toggleOtherSanitationFacilityField()">
                        <span>None</span>
                    </label>
                    <label for="sanitation_other_facility">
                        <input type="radio" name="sanitation_type_facility" id="sanitation_other_facility" value="Other"
                               onchange="toggleOtherSanitationFacilityField()">
                        <span>Other</span>
                    </label>
                </div>
                <div id="sanitationOtherFacilityField" class="conditional-field hidden">
                    <input type="text" name="sanitation_other_facility" id="sanitation_other_facility_input"
                           placeholder="Specify other sanitation type">
                </div>
            </div>


            <div class="form-group">
                <label>Sanitation Trash Bin Number</label>
                <input type="text" name="sanitation-trash-bin-number-facility" min=0 max=1000>
            </div>

            <div class="card" data-type="back">
                <h3>Sanitation Trash Bin QR Code/Image</h3>
                <p></p>
                <button class="upload-btn">Upload Files</button>
                <input type="file" id="sanitationFacilityQRCode" name="sanitationFacilityQRCode[]" accept="image/*"
                       capture="camera" style="display: none;" multiple>
            </div>

            <div class="form-group">
                <label for="security_facility">Security</label>
                <input type="text" id="security_facility" name="security_facility">
            </div>

            <div class="form-group">
                <label for="security_company_facility">Security Company</label>
                <input type="text" id="security_company_facility" name="security_company_facility">
            </div>
        </div>

        <!-- Section 17: House/Space Purpose Registration   -->
        <div id="slide17" class="form-slide slide">
            <div class="slide-number">17/21</div>
            <h2>House/Space Purpose Registration</h2>
            <br>

            <div class="form-group">
                <label>Room/Space Owner</label>
                <div class="radio-group">
                    <label for="same_as_property_owner">
                        <input type="radio" name="property_owner" id="same_as_property_owner"
                               value="Same as property owner">
                        <span>Same as property owner</span>
                    </label>
                    <label for="different_owner">
                        <input type="radio" name="property_owner" id="different_owner" value="Different Owner">
                        <span>Different Owner</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="owner_name">Name</label>
                <input type="text" id="owner_name" name="owner_name">
            </div>

            <div class="form-group">
                <label for="owner_id_number">ID Number</label>
                <input type="text" id="owner_id_number" name="owner_id_number">
            </div>

            <div class="form-group">
                <label>Purpose</label>
                <div class="radio-group">
                    <label for="property_personal_use">
                        <input type="radio" name="property_purpose" id="property_personal_use" value="Personal use">
                        <span>Personal Use</span>
                    </label>
                    <label for="property_residential">
                        <input type="radio" name="property_purpose" id="property_residential" value="Residential">
                        <span>Residential</span>
                    </label>
                    <label for="property_caretaking">
                        <input type="radio" name="property_purpose" id="property_caretaking" value="Caretaking">
                        <span>Caretaking</span>
                    </label>
                    <label for="property_will">
                        <input type="radio" name="property_purpose" id="property_will" value="Will">
                        <span>Will</span>
                    </label>
                    <label for="property_collateral">
                        <input type="radio" name="property_purpose" id="property_collateral" value="Collateral">
                        <span>Collateral</span>
                    </label>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label>Commercial</label>
                <div class="radio-group">
                    <label for="commercial_rent">
                        <input type="radio" name="commercial_purpose" id="commercial_rent" value="Rent">
                        <span>Rent</span>
                    </label>
                    <label for="commercial_sell">
                        <input type="radio" name="commercial_purpose" id="commercial_sell" value="Sell">
                        <span>Sell</span>
                    </label>
                    <label for="commercial_lease">
                        <input type="radio" name="commercial_purpose" id="commercial_lease" value="Lease">
                        <span>Lease</span>
                    </label>
                    <label for="commercial_mortgage">
                        <input type="radio" name="commercial_purpose" id="commercial_mortgage" value="Mortgage">
                        <span>Mortgage</span>
                    </label>
                    <label for="commercial_auction">
                        <input type="radio" name="commercial_purpose" id="commercial_auction" value="Auction">
                        <span>Auction</span>
                    </label>
                    <label for="commercial_caretaking">
                        <input type="radio" name="commercial_purpose" id="commercial_caretaking" value="Caretaking">
                        <span>Caretaking</span>
                    </label>
                    <label for="commercial_will">
                        <input type="radio" name="commercial_purpose" id="commercial_will" value="Will">
                        <span>Will</span>
                    </label>
                    <label for="commercial_collateral">
                        <input type="radio" name="commercial_purpose" id="commercial_collateral" value="Collateral">
                        <span>Collateral</span>
                    </label>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label>Mixed Use</label>
                <div class="radio-group">
                    <label for="mixed_personal_use">
                        <input type="radio" name="mixed_purpose" id="mixed_rent" value="Personal Use">
                        <span>Personal Use</span>
                    </label>
                    <label for="mixed_rent">
                        <input type="radio" name="mixed_purpose" id="mixed_rent" value="Rent">
                        <span>Rent</span>
                    </label>
                    <label for="mixed_sell">
                        <input type="radio" name="mixed_purpose" id="mixed_sell" value="Sell">
                        <span>Sell</span>
                    </label>
                    <label for="mixed_lease">
                        <input type="radio" name="mixed_purpose" id="mixed_lease" value="Lease">
                        <span>Lease</span>
                    </label>
                    <label for="mixed_mortgage">
                        <input type="radio" name="mixed_purpose" id="mixed_mortgage" value="Mortgage">
                        <span>Mortgage</span>
                    </label>
                    <label for="mixed_auction">
                        <input type="radio" name="mixed_purpose" id="mixed_auction" value="Auction">
                        <span>Auction</span>
                    </label>
                    <label for="mixed_caretaking">
                        <input type="radio" name="mixed_purpose" id="mixed_caretaking" value="Caretaking">
                        <span>Caretaking</span>
                    </label>
                    <label for="mixed_will">
                        <input type="radio" name="mixed_purpose" id="mixed_will" value="Will">
                        <span>Will</span>
                    </label>
                    <label for="cmixed_collateral">
                        <input type="radio" name="mixed_purpose" id="mixed_collateral" value="Collateral">
                        <span>Collateral</span>
                    </label>
                </div>
            </div>

            <h3>Payment Plan</h3>
            <div class="form-group">
                <label>Rent Mode</label>
                <div class="radio-group">
                    <label for="rent_mode_hourly">
                        <input type="radio" name="rent_mode" id="rent_mode_hourly" value="Hourly">
                        <span>Hourly</span>
                    </label>
                    <label for="rent_mode_daily">
                        <input type="radio" name="rent_mode" id="rent_mode_daily" value="Daily">
                        <span>Daily</span>
                    </label>
                    <label for="rent_mode_weekly">
                        <input type="radio" name="rent_mode" id="rent_mode_weekly" value="Weekly">
                        <span>Weekly</span>
                    </label>
                    <label for="rent_mode_monthly">
                        <input type="radio" name="rent_mode" id="rent_mode_monthly" value="Monthly">
                        <span>Monthly</span>
                    </label>
                    <label for="rent_mode_annually">
                        <input type="radio" name="rent_mode" id="rent_mode_annually" value="Annually">
                        <span>Annually</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Rent Mode Duration</label>
                <input type="number" name="digital_address" placeholder="Enter Rent Mode Duration" min=1>
            </div>

            <div class="form-group">
                <label>Rent Currency</label>
                <div class="radio-group">
                    <label for="rent_currency_ghc">
                        <input type="radio" name="rent_currency" id="rent_currency_ghc" value="GH¢">
                        <span>GH¢</span>
                    </label>
                    <label for="rent_currency_usd">
                        <input type="radio" name="rent_currency" id="rent_currency_usd" value="USD">
                        <span>USD</span>
                    </label>
                    <label for="rent_currency_gbp">
                        <input type="radio" name="rent_currency" id="rent_currency_gbp" value="GBP">
                        <span>GBP</span>
                    </label>
                    <label for="rent_currency_euro">
                        <input type="radio" name="rent_currency" id="rent_currency_euro" value="EURO">
                        <span>EURO</span>
                    </label>
                    <label for="rent_currency_naira">
                        <input type="radio" name="rent_currency" id="rent_currency_naira" value="NAIRA">
                        <span>NAIRA</span>
                    </label>

                    <label for="currency_other">
                        <input type="radio" name="currency_type" id="currency_other" value="Other"
                               onchange="toggleOtherCurrencyField()">
                        <span>Other</span>
                    </label>
                </div>
                <div id="currencyOtherField" class="conditional-field hidden">
                    <input type="text" name="currency_other_field_input" id="currency_other_field_input"
                           placeholder="Specify other currency">
                </div>
            </div>

            <div class="form-group">
                <label for="payment_mode">Payment Mode</label>
                <select id="payment_mode" name="payment_mode">
                    <option value="">Select a payment mode</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Momo">Momo</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>

            <h4>Momo</h4>
            <div class="form-group">
                <label for="momo_network_carrier">Select Network Carrier</label>
                <select id="momo_network_carrier" name="momo_network_carrier" onchange="toggleOtherCarrierField()">
                    <option value="">Select a network carrier</option>
                    <option value="MTN">MTN</option>
                    <option value="Telecel">Telecel</option>
                    <option value="Airtel Tigo">Airtel Tigo</option>
                    <option value="Other">Other (please specify)</option>
                </select>
                <div id="otherCarrierField" class="conditional-field hidden">
                    <input type="text" id="other_carrier_input" name="other_carrier"
                           placeholder="Specify other network carrier">
                </div>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required>
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn">Verify OTP</button>
            </div>


            <h4>Bank Transfer</h4>
            <div class="form-group">
                <label for="name_of_bank">Name of Bank</label>
                <select id="name_of_bank" name="name_of_bank" onchange="OtherBankField()">
                    <option value="">Select a bank name</option>
                    <option value="ABSA Bank">ABSA Bank</option>
                    <option value="ADB">ADB</option>
                    <option value="ACCESS BANK">ACCESS BANK</option>
                    <option value="CAL BANK">CAL BANK</option>
                    <option value="GT BANK">GT BANK</option>
                    <option value="J.P. Morgan Chase & Co.">J.P. Morgan Chase & Co.</option>
                    <option value="Bank of America">Bank of America</option>
                    <option value="CitiGroup">CitiGroup</option>
                    <option value="HSBC">HSBC</option>
                    <option value="Standard Chartered">Standard Chartered</option>
                    <option value="Nedbank">Nedbank</option>
                    <option value="African Bank Limited">African Bank Limited</option>
                    <option value="Ecobank">Ecobank</option>
                    <option value="Investec">Investec</option>
                    <option value="Wells Fargo">Wells Fargo</option>
                    <option value="Royal Bank of Canada">Royal Bank of Canada</option>
                    <option value="Citibank">Citibank</option>
                    <option value="United Bank for Africa">United Bank for Africa</option>
                    <option value="Attijariwafa Bank">Attijariwafa Bank</option>
                    <option value="Banque Misr">Banque Misr</option>
                    <option value="Habib Bank AG Zurich">Habib Bank AG Zurich</option>
                    <option value="Zenith Bank">Zenith Bank</option>
                    <option value="Fidelity Bank PLC">Fidelity Bank PLC</option>
                    <option value="Access Bank">Access Bank</option>
                    <option value="Standard Bank">Standard Bank</option>
                    <option value="Banque Populaire du Maroc">Banque Populaire du Maroc</option>
                    <option value="Guaranty Trust Bank Limited">Guaranty Trust Bank Limited</option>
                    <option value="Capitec Bank">Capitec Bank</option>
                    <option id="bank_other_id" value="Other">Other</option>

                </select>
                <div id="otherBankField" class="conditional-field hidden">
                    <input type="text" name="other_bank_name" id="other_bank_name" placeholder="Specify Bank Name">
                </div>
            </div>

            <div class="form-group">
                <label>Account Name</label>
                <input type="text" name="purpose_account_name">
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="purpose_account_number">
            </div>

            <h4>Cheque Payment</h4>

            <div class="form-group">
                <label>Cheque Number</label>
                <input type="text" name="purpose_cheque_number">
            </div>
            <div class="form-group">
                <label>Cheque Date</label>
                <input type="date" name="purpose_cheque_date">
            </div>
            <div class="form-group">
                <label>Cheque Digital Signature</label>
                <input type="text" name="purpose_cheque_digital_signature">
            </div>

            <div class="card" data-type="front">
                <h3>Cheque QR Image</h3>
                <br>
                <p>Open camera to scan QR code</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" name="chequeQRImage" accept="image/*" capture="environment" style="display: none;">
            </div>
            <br>
            <div class="card" data-type="front">
                <h3>Cheque Image</h3>
                <br>
                <p>Take or attach a photo</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" name="chequeImage" accept="image/*" capture="environment" style="display: none;">
            </div>

            <h4>Tenants Information</h4>

            <div class="form-group">
                <label>Tenants Members Mode</label>
                <input type="text" name="tenants_members_mode">
            </div>

            <div class="form-group">
                <label>Tenants Sex Mode</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="tenants_sex_mode" value="Male">Male</label>
                    <label><input type="checkbox" name="tenants_sex_mode" value="Female"> Female</label>
                    <label><input type="checkbox" name="tenants_sex_mode" value="Others"
                                  onclick="toggleOtherField('tenants_sex_mode')">Other</label>
                </div>
                <input type="text" id="tenants_sex_mode-other" class="other-field hidden"
                       placeholder="Specify other sex mode">
            </div>

            <div class="form-group">
                <label>Foreigners Allowed</label>
                <div class="radio-group">
                    <label for="foreigners_allowed_yes">
                        <input type="radio" name="foreigners_allowed" id="foreigners_allowed_yes" value="Yes">
                        <span>Yes</span>
                    </label>
                    <label for="foreigners_allowed_no">
                        <input type="radio" name="foreigners_allowed" id="foreigners_allowed_no" value="No">
                        <span>No</span>
                    </label>
                </div>
            </div>

            <!-- Tribes Allowed -->
            <div class="form-group">
                <!-- Tribe Selection Dropdown -->
                <div class="form-group">
                    <label for="tribeDropdown">Tribes Allowed</label>
                    <select id="tribeDropdown">
                        <option value="">Select a tribe</option>
                        <option value="Except Ewes">Except Ewes</option>
                        <option value="Ga">Ga</option>
                        <option value="Akan">Akan</option>
                        <option value="Fante">Fante</option>
                        <option value="Hausa">Hausa</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <!-- Selected Tribes -->
                <div id="selectedTribesWrapper" class="form-group hidden">
                    <label>Selected Tribes:</label>
                    <div id="selectedTribes"></div>
                </div>
            </div>


            <div class="form-group">
                <label for="tenants_age_group">Tenants Age Group</label>
                <select id="tenants_age_group" name="tenants_age_group">
                    <option value="">Select age group</option>
                    <option value="1 Year">1-10 Years</option>
                    <option value="2 Years">10-20 Years</option>
                    <option value="3 Years">20-30 Years</option>
                    <option value="4 Years">30-40 Years</option>
                    <option value="5 Years">40-50 Years</option>
                    <option value="6 Years">50-60 Years</option>
                    <option value="7 Years">60-70 Years</option>
                    <option value="8 Years">70-80 Years</option>
                    <option value="9 Years">80-90 Years</option>
                    <option value="10 Years">90-200 Years</option>
                </select>
            </div>

            <h4>Tenants expected Income Range</h4>
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
                    <label for="currency_other">
                        <input type="radio" name="currency_type" id="currency_other" value="Other"
                               onchange="toggleOtherCurrencyField()">
                        <span>Other</span>
                    </label>
                </div>
                <div id="currencyOtherField" class="conditional-field hidden">
                    <input type="text" name="currency_other_field_input" id="currency_other_field_input"
                           placeholder="Specify other currency">
                </div>
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="tenant_amount" min=0>
            </div>

            <!-- Livestock -->
            <div class="form-group">
                <label>Pets/Livestock All Allowed</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="petsAllowed" value="Yes" onclick="togglePetsNumber(true)"> Yes
                    </label>
                    <label>
                        <input type="radio" name="petsAllowed" value="No" onclick="togglePetsNumber(false)"> No
                    </label>
                </div>
            </div>

            <!-- Number Field for Pets -->
            <div class="form-group hidden" id="petsNumberField">
                <label for="numberOfPets">If Yes, How Many:</label>
                <input type="number" id="numberOfPets" name="numberOfPets" placeholder="Enter number of pets" min="1">
            </div>

            <hr>

            <div class="form-group">
                <label>Categories</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="livestock_categories" value="Domestic"> Domestic
                    </label>
                    <label>
                        <input type="radio" name="livestock_categories" value="Wild"> Wild
                    </label>
                    <label>
                        <input type="radio" name="livestock_categories" value="Mixed"> Mixed
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label>Types of Pets/Livestock Allowed</label>
                <div class="utilities-checkbox-group">
                    <label>All Allowed Except</label>
                    <label><input type="checkbox" name="allowed_pets" value="Dog"> Dog</label>
                    <label><input type="checkbox" name="allowed_pets" value="Cat"> Cat</label>
                    <label><input type="checkbox" name="allowed_pets" value="Cattle"> Cattle</label>
                    <label><input type="checkbox" name="allowed_pets" value="Pig"> Pig</label>
                    <label><input type="checkbox" name="allowed_pets" value="Goat"> Goat</label>
                    <label><input type="checkbox" name="allowed_pets" value="Sheep"> Sheep</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <label>Smoking Allowed</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="smokingAllowed" value="Yes" onclick="toggleSmokingOptions(true)">
                            Yes
                        </label>
                        <label>
                            <input type="radio" name="smokingAllowed" value="No" onclick="toggleSmokingOptions(false)">
                            No
                        </label>
                    </div>
                </div>

                <!-- Smoking Type Options -->
                <div class="form-group hidden" id="smokingTypeOptions">
                    <label>Type of Smoke Allowed:</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="smokeType" value="Marijuana"> Marijuana</label>
                        <label><input type="checkbox" name="smokeType" value="Cigarette"> Cigarette</label>
                        <label><input type="checkbox" name="smokeType" value="Tobacco"> Tobacco</label>
                        <label><input type="checkbox" name="smokeType" value="Electronic"> Electronic</label>
                        <label>
                            <input type="checkbox" name="smokeType" value="Others"
                                   onclick="toggleOtherField('smokeType')"> Others
                        </label>
                    </div>
                    <input type="text" id="smokeType-other" class="other-field hidden"
                           placeholder="Specify other type of smoke">
                </div>
            </div>

            <div class="form-group">
                <label>Byelaws and Agreement</label>
                <textarea name="byelaws_and_agreement" style="resize: vertical;"></textarea>
            </div>

            <div class="form-group">
                <div class="card" data-type="front">
                    <h3>Attach Byelaws and Agreement Files/Media Files</h3>
                    <br>
                    <button class="upload-btn">Upload Image</button>
                    <input type="file" name="byelaws_files[]" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
            </div>

            <div class="form-group">
                <label>Rent Control Law</label>
                <textarea name="byelaws_and_agreement" style="resize: vertical;"></textarea>
                <a href="#" target="_blank"><h6>(Click here to visit Rent Control Website)</h6></a>
            </div>

            <div class="form-group">
                <div class="card" data-type="front">
                    <h3>Attach Rent Control Files/Media Files</h3>
                    <br>
                    <button class="upload-btn">Upload Image</button>
                    <input type="file" name="rent_control_files[]" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
            </div>

        </div>

        <!-- Section 18: House/Space Purpose Registration   -->
        <div id="slide18" class="form-slide slide">
            <div class="slide-number">18/21</div>
            <h2>Facility Registration Form</h2>
            <br>

            <div class="form-group">
                <label for="facility_name">Facility Name</label>
                <input type="text" id="facility_name" name="facility_name">
            </div>

            <div class="form-group">
                <label for="facility_type">Facility Type</label>
                <input type="text" id="facility_type" name="facility_type">
            </div>

            <div class="form-group">
                <label for="facility_make">Facility Make</label>
                <input type="text" id="facility_make" name="facility_make">
            </div>

            <div class="form-group">
                <label for="facility_model">Facility Model</label>
                <input type="text" id="facility_model" name="facility_model">
            </div>

            <div class="form-group">
                <label for="facility_serial_number">Serial Number</label>
                <input type="text" id="facility_serial_number" name="facility_serial_number">
            </div>

            <div class="form-group">
                <label for="facility_manufacturing_date">Facility Manufacturing Date</label>
                <input type="date" id="facility_manufacturing_date" name="facility_manufacturing_date">
            </div>

            <div class="form-group">
                <label for="facility_expiry_date">Expiry Date</label>
                <input type="date" id="facility_expiry_date" name="facility_expiry_date">
            </div>

            <div class="form-group">
                <div class="card" data-type="front">
                    <h3>Facility Media File</h3>
                    <br>
                    <p>Take or attach a photo</p>
                    <button class="upload-btn">Upload Image</button>
                    <input type="file" name="facility_media_files[]" accept="image/*" capture="environment"
                           style="display: none;">
                </div>
            </div>

            <div class="form-group">
                <label for="serial_number_of_facilities">Serial Number of The Facilities Entered</label>
                <input type="text" id="serial_number_of_facilities" name="serial_number_of_facilities">
            </div>

            <div class="form-group">
                <label for="receipt_number_of_facility">Document/Receipt Number</label>
                <input type="text" id="receipt_number_of_facility" name="receipt_number_of_facility">
            </div>

        </div>

        <!-- Section 19: House/Space Purpose Registration   -->
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
                            <input type="radio" name="onLoan" value="Yes" onclick="toggleLoanFields(true)"> Yes
                        </label>
                        <label>
                            <input type="radio" name="onLoan" value="No" onclick="toggleLoanFields(false)"> No
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
                                <input type="radio" name="lenderAware" value="Yes" onclick="toggleProofField(true)"> Yes
                            </label>
                            <label>
                                <input type="radio" name="lenderAware" value="No" onclick="toggleProofField(false)"> No
                            </label>
                        </div>

                        <!-- Proof Attachment (Shown if Yes to Lender Aware) -->
                        <div class="form-group hidden" id="proofField">
                            <div class="card" data-type="front">
                                <h3>Attach Proof</h3>
                                <br>
                                <p>Take or attach a photo</p>
                                <button class="upload-btn">Upload Image</button>
                                <input type="file" id="proofAttachment" name="proofAttachment" accept="image/*"
                                       capture="environment" style="display: none;">
                            </div>
                        </div>
                    </div>

                    <!-- Loan Institution/Lender Details -->
                    <div class="form-group">
                        <h4>Loan Institution/Lender Details:</h4>
                        <label for="lenderName">Name:</label>
                        <input type="text" id="lenderName" name="lenderName" placeholder="Enter lender's name">

                        <label for="lenderAddress">Address:</label>
                        <input type="text" id="lenderAddress" name="lenderAddress" placeholder="Enter lender's address">

                        <label for="lenderPhone">Phone:</label>
                        <input type="tel" id="lenderPhone" name="lenderPhone" placeholder="Enter lender's phone">
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 20: House/Space Purpose Registration   -->
        <div id="slide20" class="form-slide slide">
            <div class="slide-number">20/21</div>
            <h2>Work Information</h2>
            <br>

            <div class="form-group">
                <label>How many Hours do you work/School daily on these days <span class="required">*</span></label>
                <select name="work_hours" required>
                    <option value="">Select number of hours</option>
                    <?php
                    for ($x = 1; $x <= 24; $x++) {
                        $hourStr = $x == 1 ? "Hour" : "Hours";
                        echo "<option value=$x $hourStr>$x $hourStr</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>How many days do you work in a week <span class="required">*</span></label>
                <select name="work_days" required>
                    <option value="">Select number of days</option>
                    <?php
                    for ($x = 1; $x <= 7; $x++) {
                        $dayStr = $x == 1 ? "Day" : "Days";
                        echo "<option value=$x $dayStr>$x $dayStr</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>How many weeks do you work in a month <span class="required">*</span></label>
                <select name="work_weeks" required>
                    <option value="">Select number of weeks</option>
                    <?php
                    for ($x = 1; $x <= 4; $x++) {
                        $weekStr = $x == 1 ? "Week" : "Weeks";
                        echo "<option value=$x $weekStr>$x $weekStr</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>How many months do you work in a year <span class="required">*</span></label>
                <select name="work_months" required>
                    <option value="">Select number of months</option>
                    <?php
                    for ($x = 1; $x <= 12; $x++) {
                        $monthStr = $x == 1 ? "Month" : "Months";
                        echo "<option value=$x $monthStr>$x $monthStr</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table class="schedule-table">
                    <!-- Table Header -->
                    <thead>
                    <tr>
                        <th>Days</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Hours Row -->
                    <tr>
                        <th>Hours</th>
                        @for ($y=1;$y<=7;$y++)
                            @php
                                $fromHoursString = "";
                                    $toHoursString = "";
                                    if ($y == 1){
                                        $fromHoursString = "monday_hours_from";
                                        $toHoursString = "monday_hours_to";
                                    }else if ($y == 2){
                                        $fromHoursString = "tuesday_hours_from";
                                        $toHoursString = "tuesday_hours_to";
                                    }else if ($y == 3) {
                                        $fromHoursString = "wednesday_hours_from";
                                        $toHoursString = "wednesday_hours_to";
                                    }else if ($y == 4) {
                                        $fromHoursString = "thursday_hours_from";
                                        $toHoursString = "thursday_hours_to";
                                    }else if ($y == 5) {
                                        $fromHoursString = "friday_hours_from";
                                        $toHoursString = "friday_hours_to";
                                    }else if ($y == 6) {
                                        $fromHoursString = "saturday_hours_from";
                                        $toHoursString = "saturday_hours_to";
                                    }else if ($y == 7) {
                                        $fromHoursString = "sunday_hours_from";
                                        $toHoursString = "sunday_hours_to";
                                    }
                            @endphp
                            <td>
                                <label>From</label>
                                <select name="{{ $fromHoursString  }}">
                                    <option value="">Select</option>
                                    <?php
                                    for ($x = 1; $x <= 24; $x++) {
                                        $hourStr = $x == 1 ? "Hour" : "Hours";
                                        echo "<option value=$x $hourStr>$x $hourStr</option>";
                                    }
                                    ?>
                                </select>
                                <label>To</label>
                                <select name="monday_hours_to">
                                    <option value="">Select number of hours</option>
                                    <?php
                                    for ($x = 1; $x <= 24; $x++) {
                                        $hourStr = $x == 1 ? "Hour" : "Hours";
                                        echo "<option value=$x $hourStr>$x $hourStr</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        @endfor
                    </tr>

                    <!-- Morning Row -->
                    <tr>
                        <th>Morning</th>
                        @for ($x = 1; $x <= 7; $x++)
                            @php
                                $activityString = "";
                                    if ($x == 1){
                                        $activityString = "monday_morning_activity";
                                    }else if ($y == 2){
                                        $activityString = "tuesday_morning_activity";
                                    }else if ($y == 3) {
                                        $activityString = "wednesday_morning_activity";
                                    }else if ($y == 4) {
                                        $activityString = "thursday_morning_activity";
                                    }else if ($y == 5) {
                                        $activityString = "friday_morning_activity";
                                    }else if ($y == 6) {
                                        $activityString = "saturday_morning_activity";
                                    }else if ($y == 7) {
                                        $activityString = "sunday_morning_activity";
                                    }
                            @endphp
                            <td>
                                <label>Activity</label>
                                <select name="{{ $activityString }}"
                                        onchange="toggleOtherActivity(this, 'morning', $x)">
                                    <option value="">Select</option>
                                    <option value="Yoga">Yoga</option>
                                    <option value="Meditation">Meditation</option>
                                    <option value="School">School</option>
                                    <option value="Church">Church</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="Club">Club</option>
                                    <option value="Break">Break</option>
                                    <option value="Tea Break">Tea Break</option>
                                    <option value="Smoking Break">Smoking Break</option>
                                    <option value="Work">Work</option>
                                    <option value="Sleep">Sleep</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Online Class">Online Class</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Family Meeting">Family Meeting</option>
                                    <option value="Sanitation">Sanitation</option>
                                    <option value="Party">Party</option>
                                    <option value="Quaran Study">Quaran Study</option>
                                    <option value="Bible Study">Bible Study</option>
                                    <option value="Other Studies">Other Studies</option>
                                    <option value="Political Party Meeting">Political Party Meeting</option>
                                    <option value="Friends Get together">Friends Get together</option>
                                    <option value="Skating Classes">Skating Classes</option>
                                    <option value="Taekwondo Classes">Taekwondo Classes</option>
                                    <option value="Soccer Training">Soccer Training</option>
                                    <option value="Basketball Training">Basketball Training</option>
                                    <option value="I Can't Tell">I Can't Tell</option>
                                    <option value="I Don't Want To Say">I Don't Want To Say</option>
                                    <option value="I Will Think About It Later">I Will Think About It Later</option>
                                    <option value="I Am Not So Sure">I Am Not So Sure</option>
                                </select>
                                <input type="text" class="hidden morning-other-1" placeholder="Add activity">
                            </td>
                        @endfor

                    </tr>

                    <tr>
                        <th>Afternoon</th>
                        <!-- Repeat same structure as Morning -->
                        @for ($x=1;$x<=7;$x++)
                            @php
                                $activityString = "";
                                    if ($x == 1){
                                        $activityString = "monday_afternoon_activity";
                                    }else if ($y == 2){
                                        $activityString = "tuesday_afternoon_activity";
                                    }else if ($y == 3) {
                                        $activityString = "wednesday_afternoon_activity";
                                    }else if ($y == 4) {
                                        $activityString = "thursday_afternoon_activity";
                                    }else if ($y == 5) {
                                        $activityString = "friday_afternoon_activity";
                                    }else if ($y == 6) {
                                        $activityString = "saturday_afternoon_activity";
                                    }else if ($y == 7) {
                                        $activityString = "sunday_afternoon_activity";
                                    }
                            @endphp
                            <td>
                                <label>Activity:</label>
                                <select name="{{ $activityString }}"
                                        onchange="toggleOtherActivity(this, 'afternoon', $x)">
                                    <option value="">Select</option>
                                    <option value="Yoga">Yoga</option>
                                    <option value="Meditation">Meditation</option>
                                    <option value="School">School</option>
                                    <option value="Church">Church</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="Club">Club</option>
                                    <option value="Break">Break</option>
                                    <option value="Tea Break">Tea Break</option>
                                    <option value="Smoking Break">Smoking Break</option>
                                    <option value="Work">Work</option>
                                    <option value="Sleep">Sleep</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Online Class">Online Class</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Family Meeting">Family Meeting</option>
                                    <option value="Sanitation">Sanitation</option>
                                    <option value="Party">Party</option>
                                    <option value="Quaran Study">Quaran Study</option>
                                    <option value="Bible Study">Bible Study</option>
                                    <option value="Other Studies">Other Studies</option>
                                    <option value="Political Party Meeting">Political Party Meeting</option>
                                    <option value="Friends Get together">Friends Get together</option>
                                    <option value="Skating Classes">Skating Classes</option>
                                    <option value="Taekwondo Classes">Taekwondo Classes</option>
                                    <option value="Soccer Training">Soccer Training</option>
                                    <option value="Basketball Training">Basketball Training</option>
                                    <option value="I Can't Tell">I Can't Tell</option>
                                    <option value="I Don't Want To Say">I Don't Want To Say</option>
                                    <option value="I Will Think About It Later">I Will Think About It Later</option>
                                    <option value="I Am Not So Sure">I Am Not So Sure</option>
                                </select>
                                <input type="text" class="hidden afternoon-other-1" placeholder="Add activity">
                            </td>
                        @endfor

                    </tr>

                    <!-- Evening Row -->
                    <tr>
                        <th>Evening</th>
                        @for ($x=1;$x<=7;$x++)
                            @php
                                $activityString = "";
                                    if ($x == 1){
                                        $activityString = "monday_evening_activity";
                                    }else if ($y == 2){
                                        $activityString = "tuesday_evening_activity";
                                    }else if ($y == 3) {
                                        $activityString = "wednesday_evening_activity";
                                    }else if ($y == 4) {
                                        $activityString = "thursday_evening_activity";
                                    }else if ($y == 5) {
                                        $activityString = "friday_evening_activity";
                                    }else if ($y == 6) {
                                        $activityString = "saturday_evening_activity";
                                    }else if ($y == 7) {
                                        $activityString = "sunday_evening_activity";
                                    }
                            @endphp
                            <td>
                                <label>Activity:</label>
                                <select name="{{ $activityString }}"
                                        onchange="toggleOtherActivity(this, 'evening', $x)">
                                    <option value="">Select</option>
                                    <option value="Yoga">Yoga</option>
                                    <option value="Meditation">Meditation</option>
                                    <option value="School">School</option>
                                    <option value="Church">Church</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="Club">Club</option>
                                    <option value="Break">Break</option>
                                    <option value="Tea Break">Tea Break</option>
                                    <option value="Smoking Break">Smoking Break</option>
                                    <option value="Work">Work</option>
                                    <option value="Sleep">Sleep</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Online Class">Online Class</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Family Meeting">Family Meeting</option>
                                    <option value="Sanitation">Sanitation</option>
                                    <option value="Party">Party</option>
                                    <option value="Quaran Study">Quaran Study</option>
                                    <option value="Bible Study">Bible Study</option>
                                    <option value="Other Studies">Other Studies</option>
                                    <option value="Political Party Meeting">Political Party Meeting</option>
                                    <option value="Friends Get together">Friends Get together</option>
                                    <option value="Skating Classes">Skating Classes</option>
                                    <option value="Taekwondo Classes">Taekwondo Classes</option>
                                    <option value="Soccer Training">Soccer Training</option>
                                    <option value="Basketball Training">Basketball Training</option>
                                    <option value="I Can't Tell">I Can't Tell</option>
                                    <option value="I Don't Want To Say">I Don't Want To Say</option>
                                    <option value="I Will Think About It Later">I Will Think About It Later</option>
                                    <option value="I Am Not So Sure">I Am Not So Sure</option>
                                </select>
                                <input type="text" class="hidden evening-other-1" placeholder="Add activity">
                            </td>
                        @endfor
                    </tr>
                    </tbody>
                </table>
            </div>


            <h3>Income Details</h3>
            <h4>The income that will be entered here must match or exceed the amount entered on the property
                registration form by the property owner (So let’s assume the property owner’s expected income is $10,
                you must enter $11 or more)</h4>


            <div class="form-group">
                <label>How do you earn</label>
                <div class="radio-group">
                    <label for="income_details_minutes">
                        <input type="radio" name="income_details" id="income_details_minutes" value="Minutes">
                        <span>Minutes</span>
                    </label>
                    <label for="income_details_hourly">
                        <input type="radio" name="income_details" id="income_details_hourly" value="Hourly">
                        <span>Hourly</span>
                    </label>
                    <label for="income_details_daily">
                        <input type="radio" name="income_details" id="income_details_daily" value="Daily">
                        <span>Daily</span>
                    </label>
                    <label for="income_details_weekly">
                        <input type="radio" name="income_details" id="income_details_weekly" value="Weekly">
                        <span>Weekly</span>
                    </label>
                    <label for="income_details_monthly">
                        <input type="radio" name="income_details" id="income_details_monthly" value="Monthly">
                        <span>Monthly</span>
                    </label>
                    <label for="income_details_annually">
                        <input type="radio" name="income_details" id="income_details_annually" value="Annually">
                        <span>Annually</span>
                    </label>
                    <label for="income_details_not_really_precise">
                        <input type="radio" name="income_details" id="income_details_not_really_precise"
                               value="Not Really Precise">
                        <span>Not Really Precise</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="income_details_amount">Amount Range</label>
                <input type="number" id="income_details_amount" name="income_details_amount">
            </div>

            <div class="form-group">
                <label>Are you on Loan:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="incomeDetailsonLoan" value="Yes"> Yes
                    </label>
                    <label>
                        <input type="radio" name="incomeDetailsonLoan" value="No"> No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="">If Yes, Since When</label>
                <input type="date" name="loanStartDate">
            </div>

            <div class="form-group">
                <label for="incomeDetailslenderName">Loan Interest %</label>
                <input type="text" id="incomeDetailsloanPercentage" name="incomeDetailsloanPercentage"
                       placeholder="Enter loan percentage">
            </div>

            <div class="form-group">
                <h3>Lender's Details</h3>
                <label for="incomeDetailslenderName">Name</label>
                <input type="text" id="incomeDetailslenderName" name="incomeDetailslenderName"
                       placeholder="Enter lender's name">

                <label for="incomeDetailslenderAddress">Digital Address</label>
                <input type="text" id="incomeDetailslenderAddress" name="incomeDetailslenderAddress"
                       placeholder="Enter lender'sn digital address">

                <label for="incomeDetailslenderPhone">Phone</label>
                <input type="tel" id="incomeDetailslenderPhone" name="incomeDetailslenderPhone"
                       placeholder="Enter lender's phone">
            </div>
        </div>

        <!-- Section 21: House/Space Purpose Registration   -->
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
                <input type="text" id="inhabitant_first_name" class="validate-text" name="inhabitant_first_name">
            </div>

            <div class="form-group">
                <label for="inhabitant_last_name">Last Name <span class="required">*</span></label>
                <input type="text" id="inhabitant_last_name" class="validate-text" name="inhabitant_last_name">
            </div>

            <div class="form-group">
                <label for="inhabitant_other_name">Other Names </label>
                <input type="text" id="inhabitant_other_name" class="validate-text" name="inhabitant_other_name">
            </div>

            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Passport Size Photo</h3>
                    <p>Take or attach photo</p>
                    <button class="upload-btn">Upload Photo</button>
                    <input type="file" id="passport_size_photo" name="passport_size_photo" accept="image/*"
                           capture="camera" style="display: none;">
                </div>
            </div>

            <div class="form-group">
                <label>Sex <span class="required">*</span></label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="inhabitant_sex" value="Male">Male</label>
                    <label><input type="checkbox" name="inhabitant_sex" value="Female"> Female</label>
                    <label><input type="checkbox" name="inhabitant_sex" value="Others"
                                  onclick="toggleOtherField('inhabitant_sex')">Other</label>
                </div>
                <input type="text" id="inhabitant_sex-other" class="other-field hidden"
                       placeholder="Specify other inhabitant sex">
            </div>

            <div class="form-group">
                <label>Nationality <span class="required">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="inhabitantNationality" value="Ghanaian"> Ghanaian
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
                <label for="inhabitant_id_number">ID Number</label>
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


            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Photo of Card</h3>
                    <p>Take or attach photo</p>
                    <button class="upload-btn" onclick="document.getElementById('card_photo').click(); return false;">
                        Upload Photo
                    </button>
                    <input type="file" id="inhabitant_card_photo" name="inhabitant_card_photo" accept="image/*"
                           capture="camera" style="display: none;">
                </div>
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
                <input type="text" id="inhabitant_relationship-other" class="other-field hidden"
                       placeholder="Specify other relationship">
            </div>

            <div class="form-group">
                <label>Proof of Relationship</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="proof_of_relationship" value="Birth Certificate"> Birth Certificate
                    </label>
                    <label>
                        <input type="radio" name="proof_of_relationship" value="Marriage Certificate"> Marriage
                        Certificate
                    </label>
                    <label>
                        <input type="radio" name="proof_of_relationship" value="Immigration Certificate"> Immigration
                        Certificate
                    </label>
                    <label>
                        <input type="radio" name="proof_of_relationship" value="Appointment Letter as Worker">
                        Appointment Letter as Worker
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="inhabitant_organization_name">Organization Name <span class="required">*</span></label>
                <input type="text" id="inhabitant_organization_name" class="validate-text"
                       name="inhabitant_organization_name">
            </div>

            <div class="form-group">
                <label for="inhabitant_other_relationship_proof">Other Relationship Proof Please Specify</label>
                <input type="text" class="validate-text" id="inhabitant_other_relationship_proof"
                       name="inhabitant_other_relationship_proof">
            </div>

            <div class="form-group">
                <div class="card" data-type="back">
                    <h3>Add Proof of Relationship</h3>
                    <p>Take or attach photo</p>
                    <button class="upload-btn">Upload Photo</button>
                    <input type="file" id="inhabitant_card_photo" name="inhabitant_card_photo" accept="image/*"
                           capture="camera" style="display: none;">
                </div>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="phone_number" name="purpose_phone_number" required
                       placeholder="Enter your phone number">
                <button type="button" class="send_otp_btn" onclick="handleSendOTP()">Send OTP</button>
            </div>

            <div class="form-group otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="otp_input" name="otp" required>
                <button type="button" class="verify_otp_btn" onclick="handleVerifyOTP()">Verify OTP</button>
            </div>


            <div class="form-group">
                <label>Email</label>
                <input type="email" class="email_address" name="rep_email_a" required
                       placeholder="ex:myname@example.com">
                <button type="button" class="send_email_otp_btn" onclick="handleSendEmailOTP()">Send OTP</button>
            </div>
            <div class="form-group" class="email_otp_section" style="display: none;">
                <label>Enter OTP</label>
                <input type="text" class="email_otp_input" name="email_otp" required>
            </div>

            <div class="form-group">
                <label for="inhabitant_reason_for_accommodation">Reason for Accommodation</label>
                <textarea class="validate-text" name="inhabitant_reason_for_accommodation"
                          style="resize: vertical;"></textarea>
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


        <!-- Navigation Buttons -->
        <div class="navigation-buttons">
            <button type="button" id="prevBtn" class="btn" onclick="changeSlide(-1)" style="display:none;">Previous
            </button>
            <button type="button" id="nextBtn" class="btn" onclick="changeSlide(1)">Next</button>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar-container">
            <div class="progress-bar">
                <div id="progressBar" class="progress"></div>
            </div>
            <span id="progressPercentage" class="progress-text">0%</span>
        </div>

    </form>
</div>

<!-- JAVA SCRIPT CODE -->

<script>

    function toggleInhabitantOtherField(fieldName) {
        const selectElement = document.getElementById(fieldName);
        const otherField = document.getElementById(`${fieldName}-other`);

        if (selectElement.value === "Others") {
            otherField.classList.remove("hidden"); // Show the "Other" text field
        } else {
            otherField.classList.add("hidden"); // Hide the "Other" text field
            otherField.value = ""; // Clear the input field
        }
    }

    function toggleLoanFields(show) {
        const loanDetails = document.getElementById('loanDetails');
        if (show) {
            loanDetails.classList.remove('hidden'); // Show the loan details
        } else {
            loanDetails.classList.add('hidden'); // Hide the loan details
            resetLoanFields(); // Clear loan-related inputs
        }
    }

    function togglePaymentFields(show) {
        const paymentDetails = document.getElementById('paymentDetails');
        if (show) {
            paymentDetails.classList.remove('hidden'); // Show the payment details
        } else {
            paymentDetails.classList.add('hidden'); // Hide the payment details
            resetPaymentFields(); // Clear payment-related inputs
        }
    }

    function toggleTribe() {
        const otherTribeValue = document.getElementById('otherTribeField');
        const tribeValue = document.getElementById('tribeSelect').value;
        if (tribeValue === 'Other') {
            console.log(tribeValue)
            otherTribeValue.classList.remove('hidden');
        } else {
            otherTribeValue.classList.add('hidden');
        }
    }

    function handleMaritalStatusChange() {
        // Get the selected marital status
        const selectedStatus = document.querySelector('input[name="marital_status"]:checked').value;

        // Get the detail fields
        const knockingDetails = document.getElementById('knockingDetails');
        const cohabitationDetails = document.getElementById('cohabitationDetails');

        // Reset visibility of detail fields
        knockingDetails.classList.add('hidden');
        cohabitationDetails.classList.add('hidden');

        // Show relevant field based on selection
        if (selectedStatus === "Knocking") {
            knockingDetails.classList.remove('hidden');
        } else if (selectedStatus === "Co-habitation") {
            cohabitationDetails.classList.remove('hidden');
        }
    }


    document.querySelectorAll('input[name="hair_color"]').forEach((radio) => {
        radio.addEventListener('change', () => {
            const otherField = document.getElementById('hair_color_specify');
            if (radio.value === "other" && radio.checked) {
                otherField.classList.remove('hidden'); // Show text field
            } else {
                otherField.classList.add('hidden'); // Hide text field
                otherField.value = ''; // Clear the input field
            }
        });
    });

    document.querySelectorAll('input[name="disability"]').forEach((radio) => {
        radio.addEventListener('change', () => {
            const otherField = document.getElementById('disability_specify');
            if (radio.value === "other" && radio.checked) {
                otherField.classList.remove('hidden'); // Show text field
            } else {
                otherField.classList.add('hidden'); // Hide text field
                otherField.value = ''; // Clear the input field
            }
        });
    });


    function toggleProofField(show) {
        const proofField = document.getElementById('proofField');
        if (show) {
            proofField.classList.remove('hidden'); // Show the proof attachment field
        } else {
            proofField.classList.add('hidden'); // Hide the proof attachment field
            document.getElementById('proofAttachment').value = ''; // Clear the input
        }
    }

    function resetLoanFields() {
        document.getElementById('loanAmount').value = '';
        document.getElementById('loanInterest').value = '';
        document.getElementById('loanStartDate').value = '';
        document.getElementById('loanEndDate').value = '';
        resetPaymentFields();
    }

    function resetPaymentFields() {
        document.getElementById('paymentDate').value = '';
        document.getElementById('amountPaid').value = '';
        document.getElementById('remainingBalance').value = '';
        document.getElementById('estimatedFinishDate').value = '';
        toggleProofField(false); // Reset proof field visibility
    }


    // Function to toggle the Smoking Options
    function toggleSmokingOptions(show) {
        const smokingTypeOptions = document.getElementById('smokingTypeOptions');
        if (show) {
            smokingTypeOptions.classList.remove('hidden'); // Show the smoking type options
        } else {
            smokingTypeOptions.classList.add('hidden'); // Hide the smoking type options
            resetSmokingOptions(); // Clear any selections or inputs
        }
    }

    // Function to toggle the "Others" field for Smoking Type
    function toggleOtherField(fieldName) {
        const otherField = document.getElementById(`${fieldName}-other`);
        const checkboxes = document.getElementsByName('smokeType');
        const othersChecked = Array.from(checkboxes).some(
            (checkbox) => checkbox.value === "Others" && checkbox.checked
        );

        if (othersChecked) {
            otherField.classList.remove('hidden'); // Show the "Others" text field
        } else {
            otherField.classList.add('hidden'); // Hide the "Others" text field
            otherField.value = ''; // Clear the input field
        }
    }

    // Function to reset Smoking Options
    function resetSmokingOptions() {
        // Uncheck all checkboxes
        const checkboxes = document.getElementsByName('smokeType');
        checkboxes.forEach((checkbox) => (checkbox.checked = false));

        // Hide and clear the "Others" text field
        const otherField = document.getElementById('smoking-other');
        otherField.classList.add('hidden');
        otherField.value = '';
    }

    function togglePetsNumber(show) {
        const petsNumberField = document.getElementById('petsNumberField');
        if (show) {
            petsNumberField.classList.remove('hidden'); // Show the number field
        } else {
            petsNumberField.classList.add('hidden'); // Hide the number field
            document.getElementById('numberOfPets').value = ''; // Clear the input
        }
    }


    const tribeDropdown = document.getElementById('tribeDropdown');
    const selectedTribesContainer = document.getElementById('selectedTribes');
    const selectedTribesWrapper = document.getElementById('selectedTribesWrapper');

    // Store selected tribes
    let selectedTribes = [];

    // Event listener for dropdown changes
    tribeDropdown.addEventListener('change', () => {
        const selectedValue = tribeDropdown.value;

        // Ensure a valid option is selected
        if (selectedValue && !selectedTribes.includes(selectedValue)) {
            // Check if "Others" is selected
            if (selectedValue === 'Others') {
                addTribe(selectedValue, true); // Pass true for custom input
            } else {
                addTribe(selectedValue);
            }
        }

        // Reset dropdown value after selection
        tribeDropdown.value = '';

        if (selectedTribes.length > 0) {
            selectedTribesWrapper.classList.remove('hidden')
            selectedTribesContainer.classList.remove('hidden')
        } else {
            selectedTribesWrapper.classList.add('hidden');
            selectedTribesContainer.classList.add('hidden');
        }
    });

    // Function to add a tribe to the selected list
    function addTribe(value, isCustom = false) {
        selectedTribes.push(value);

        // Create a container for the tribe
        const tribeItem = document.createElement('div');
        tribeItem.className = 'tribe-item';
        tribeItem.dataset.value = value;

        // Add the tribe name or input field
        if (isCustom) {
            const customInput = document.createElement('input');
            customInput.type = 'text';
            customInput.placeholder = 'Specify other tribe';
            customInput.className = 'custom-tribe-input';
            tribeItem.appendChild(customInput);
        } else {
            const span = document.createElement('span');
            span.textContent = value;
            tribeItem.appendChild(span);
        }

        // Add remove button
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', () => removeTribe(value, tribeItem));
        tribeItem.appendChild(removeButton);

        // Append to the selected tribes container
        selectedTribesContainer.appendChild(tribeItem);
    }

    function toggleOtherSanitationField() {
        const sanitationOtherField = document.getElementById('sanitationOtherField');
        const otherRadio = document.getElementById('sanitation_other');

        if (otherRadio.checked) {
            sanitationOtherField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            sanitationOtherField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('sanitation_other_input').value = ''; // Clear the input field
        }
    }

    function toggleOtherCurrencyField() {
        const sanitationOtherField = document.getElementById('currencyOtherField');
        const otherRadio = document.getElementById('currency_other');

        if (otherRadio.checked) {
            sanitationOtherField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            sanitationOtherField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('currency_other_field_input').value = ''; // Clear the input field
        }
    }


    // Function to remove a tribe from the selected list
    function removeTribe(value, tribeItem) {
        selectedTribes = selectedTribes.filter(tribe => tribe !== value);
        selectedTribesContainer.removeChild(tribeItem);

        if (selectedTribes.length > 0) {
            selectedTribesWrapper.classList.remove('hidden')
            selectedTribesContainer.classList.remove('hidden')
        } else {
            selectedTribesWrapper.classList.add('hidden');
            selectedTribesContainer.classList.add('hidden');
        }
    }

    function toggleOtherSanitationFacilityField() {
        const sanitationOtherFacilityField = document.getElementById('sanitationOtherFacilityField');
        const otherFacilityRadio = document.getElementById('sanitation_other_facility');

        if (otherFacilityRadio.checked) {
            sanitationOtherFacilityField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            sanitationOtherFacilityField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('sanitation_other_facility_input').value = ''; // Clear the input field
        }
    }


    // Function to toggle the "Other" field visibility
    function toggleOtherField(fieldName) {
        const checkboxGroup = document.getElementsByName(fieldName);
        const otherField = document.getElementById(`${fieldName}-other`);

        // Check if "Others" is checked
        const othersChecked = Array.from(checkboxGroup).some(
            (checkbox) => checkbox.value === "Others" && checkbox.checked
        );

        if (othersChecked) {
            otherField.classList.remove("hidden"); // Show text field
        } else {
            otherField.classList.add("hidden"); // Hide text field
            otherField.value = ""; // Clear the input field
        }
    }


    const facilityDropdown = document.getElementById('facilityDropdown');
    const selectedFacilitiesContainer = document.getElementById('selectedFacilities');
    const selectedFacilitiesWrapper = document.getElementById('selectedFacilitiesWrapper');

    // Store selected facilities
    let selectedFacilities = [];

    // Event listener for dropdown changes
    facilityDropdown.addEventListener('change', () => {
        const selectedValue = facilityDropdown.value;
        // Check if "Others" is selected
        if (selectedValue === 'Others' && !selectedFacilities.includes('Others')) {
            addFacility(selectedValue, true); // Pass true for custom input
        } else if (!selectedFacilities.includes(selectedValue) && selectedValue !== '') {
            addFacility(selectedValue);
        }

        // Reset dropdown value after selection
        facilityDropdown.value = '';

        if (selectedFacilities.length > 0) {
            selectedFacilitiesWrapper.classList.remove('hidden')
            selectedFacilitiesContainer.classList.remove('hidden')
        } else {
            selectedFacilitiesWrapper.classList.add('hidden');
            selectedFacilitiesContainer.classList.add('hidden');
        }
    });

    // Function to add a facility to the selected list
    function addFacility(value, isCustom = false) {
        selectedFacilities.push(value);

        // Create a container for the facility
        const facilityItem = document.createElement('div');
        facilityItem.className = 'facility-item';
        facilityItem.dataset.value = value;

        // Add the facility name or input field
        if (isCustom) {
            const customInput = document.createElement('input');
            customInput.type = 'text';
            customInput.placeholder = 'Specify other facilities';
            customInput.className = 'custom-facility-input';
            facilityItem.appendChild(customInput);
        } else {
            const span = document.createElement('span');
            span.textContent = value;
            facilityItem.appendChild(span);
        }

        // Add remove button
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', () => removeFacility(value, facilityItem));
        facilityItem.appendChild(removeButton);

        // Append to the selected facilities container
        selectedFacilitiesContainer.appendChild(facilityItem);
    }

    // Function to remove a facility from the selected list
    function removeFacility(value, facilityItem) {
        selectedFacilities = selectedFacilities.filter(facility => facility !== value);
        selectedFacilitiesContainer.removeChild(facilityItem);

        if (selectedFacilities.length > 0) {
            selectedFacilitiesWrapper.classList.remove('hidden')
            selectedFacilitiesContainer.classList.remove('hidden')
        } else {
            selectedFacilitiesWrapper.classList.add('hidden');
            selectedFacilitiesContainer.classList.add('hidden');
        }
    }


    // Generalized function to toggle "Others" field
    function setupOtherFieldToggle(groupSelector, otherCheckboxValue, otherFieldSelector) {
        const group = document.querySelector(groupSelector);
        const otherField = document.querySelector(otherFieldSelector);

        if (group && otherField) {
            group.addEventListener('change', (event) => {
                const target = event.target;

                // Check if the clicked checkbox is the "Other" checkbox
                if (target.type === 'checkbox' && target.value === otherCheckboxValue) {
                    if (target.checked) {
                        otherField.style.display = 'block'; // Show text field
                    } else {
                        otherField.style.display = 'none'; // Hide text field
                        otherField.value = ''; // Clear the input field
                    }
                }
            });
        }
    }

    // Initialize for the Security Type group
    setupOtherFieldToggle('.security-checkbox-group', 'Other', '#security-other-input');


    setupOtherFieldToggle('.service-checkbox-group', 'Others', '#service-other-input');


    function toggleCustomColor(section) {
        const inputField = document.getElementById(`building-color-${section}-custom`);
        const checkbox = Array.from(document.querySelectorAll(`[name="${section}Colors"]`)).find(cb => cb.value === "Others");

        if (checkbox.checked) {
            inputField.classList.remove('hidden');
        } else {
            inputField.value = ''; // Clear the text field
            inputField.classList.add('hidden');
        }
    }

    let permitCount = 1; // Start with 1 permit

    function addPermit() {
        permitCount++;

        // Create a new container for the permit
        const container = document.createElement('div');
        container.className = 'permit-details';
        container.id = `permit-${permitCount}`;

        // Add the content for the new permit
        container.innerHTML = `
        <h4>Permit ${permitCount}</h4>
        <div class="form-group">
            <label for="permitName${permitCount}">Permit Name:</label>
            <input type="text" id="permitName${permitCount}" name="permitName${permitCount}" placeholder="Enter permit name">
        </div>
        <div class="form-group">
            <label for="permitIssuer${permitCount}">Issuer:</label>
            <input type="text" id="permitIssuer${permitCount}" name="permitIssuer${permitCount}" placeholder="Enter issuer">
        </div>
        <div class="form-group">
            <label for="permitRegion${permitCount}">Region:</label>
            <input type="text" id="permitRegion${permitCount}" name="permitRegion${permitCount}" placeholder="Enter region">
        </div>
        <div class="form-group">
            <label for="permitDistrict${permitCount}">District/Municipal/Metro:</label>
            <input type="text" id="permitDistrict${permitCount}" name="permitDistrict${permitCount}" placeholder="Enter district">
        </div>
        <div class="form-group">
            <label for="permitPurpose${permitCount}">Permit Purpose:</label>
            <input type="text" id="permitPurpose${permitCount}" name="permitPurpose${permitCount}" placeholder="Enter permit purpose">
        </div>
        <div class="form-group">
            <label for="issuingDate${permitCount}">Issuing Date:</label>
            <input type="date" id="issuingDate${permitCount}" name="issuingDate${permitCount}" value="2024-12-09">
        </div>
        <div class="form-group">
            <label for="expiryDate${permitCount}">Expiry Date:</label>
            <input type="date" id="expiryDate${permitCount}" name="expiryDate${permitCount}" value="2024-12-09">
        </div>
        <div class="form-group">
            <label for="permitCost${permitCount}">Permit Cost:</label>
            <input type="text" id="permitCost${permitCount}" name="permitCost${permitCount}" placeholder="Enter permit cost">
        </div>
        <div class="form-group">
            <label for="paymentCode${permitCount}">Payment Code:</label>
            <input type="text" id="paymentCode${permitCount}" name="paymentCode${permitCount}" placeholder="Enter payment code">
        </div>
        <div class="form-group">
            <label for="issuingOfficer${permitCount}">Issuing Officer:</label>
            <input type="text" id="issuingOfficer${permitCount}" name="issuingOfficer${permitCount}" placeholder="Enter issuing officer">
        </div>
    `;

        // Append the new permit container to the permit details container
        document.getElementById('permitDetailsContainer').appendChild(container);
    }

    // Initialize selected countries array

    let pillarCount = 4; // Start with 4 pillars

    function addPillar() {
        pillarCount++;

        // Create a new container for the pillar
        const container = document.createElement('div');
        container.className = 'pillar-details';
        container.id = `pillar-${pillarCount}`;

        // Add the content for the new pillar
        container.innerHTML = `
        <h4>Pillar ${pillarCount} Details</h4>
        <div class="form-group">
            <label for="pillarNumber${pillarCount}">Pillar Number ${pillarCount}:</label>
            <input type="text" id="pillarNumber${pillarCount}" name="pillarNumber${pillarCount}" placeholder="Enter pillar number">
            <a href="#" target="_blank"><h6>(Click this link to generate Pillar digital address number )</h6></a>
        </div>
        <div class="form-group">
            <label for="pillarAddress${pillarCount}">Pillar ${pillarCount} Digital Address Number:</label>
            <input type="text" id="pillarAddress${pillarCount}" name="pillarAddress${pillarCount}" placeholder="Enter digital address number">
        </div>
        <div class="form-group">
            <div class="card" data-type="back">
                <h3>Pillar Images</h3>
                <p>2 photos to be taken or attached</p>
                <button class="upload-btn">Upload Image</button>
                <input type="file" id="pillarImages${pillarCount}" name="pillarImages${pillarCount}[]" accept="image/*" capture="camera" style="display: none;" multiple>
            </div>
        </div>
    `;

        // Append the new pillar container to the pillar details container
        document.getElementById('pillarDetailsContainer').appendChild(container);
    }


    function togglePropertyFields() {
        const bareLandCheckbox = document.getElementById('bareLandCheckbox');
        const buildingCheckbox = document.getElementById('buildingCheckbox');
        const propertyFields = document.getElementById('propertyFields');

        if (bareLandCheckbox.checked && buildingCheckbox.checked) {
            propertyFields.classList.remove('hidden');
        } else {
            propertyFields.classList.add('hidden');
        }
    }

    let selectedCountries = [];


    // Toggle visibility of the dropdown and selected countries section
    function toggleDualCitizenship() {
        const checkbox = document.getElementById('dualCitizenship');
        const conditionalField = document.getElementById('dualCitizenshipCountries');
        if (checkbox.checked) {
            conditionalField.classList.remove('hidden');
        } else {
            conditionalField.classList.add('hidden');
            resetCountries(); // Clear the selected countries when unchecked
        }
    }

    function toggleOtherCarrierField() {
        const carrierDropdown = document.getElementById('momo_network_carrier');
        const otherCarrierField = document.getElementById('otherCarrierField');

        if (carrierDropdown.value === "Other") {
            otherCarrierField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            otherCarrierField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('other_carrier_input').value = ''; // Clear the input field
        }
    }


    function toggleOtherRegionField() {
        const regionDropdown = document.getElementById('property_asset_region');
        const otherField = document.getElementById('otherPropertyAssetRegionField');

        if (regionDropdown.value === "Other") {
            otherField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            otherField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('other_asset_region').value = ''; // Clear the input field
        }
    }

    function toggleOtherRbfField() {
        const rbfDropdown = document.getElementById('rbf_denomination_name');
        const otherRbfField = document.getElementById('otherRbfField');

        if (rbfDropdown.value === "others") {
            otherRbfField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            otherRbfField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('other_rbf_input').value = ''; // Clear the input field
        }
    }


    // Handle country selection from the dropdown
    function handleCountrySelection(event) {
        const dropdown = document.getElementById('countryDropdown');
        const selectedValue = dropdown.value;

        // Prevent more than two selections
        if (selectedCountries.length > 2) {
            alert('You can only select up to two countries.');
            dropdown.value = ''; // Reset the dropdown
            return;
        }

        // Add the selected country if not already selected
        if (!selectedCountries.includes(selectedValue)) {
            if (selectedValue !== "" && selectedCountries.length < 2) {
                selectedCountries.push(selectedValue);
            }
            updateSelectedCountries();
        }
        dropdown.value = '';
    }

    // Update the UI with the selected countries
    function updateSelectedCountries() {
        const container = document.getElementById('selectedCountries');
        container.innerHTML = ''; // Clear the existing display

        selectedCountries.forEach(country => {
            // Create a container for each selected country
            const countryElement = document.createElement('div');
            countryElement.className = 'selected-option';
            countryElement.innerHTML = `
            <span>${country}</span>
            <button class="remove-btn" onclick="removeCountry('${country}')">Remove</button>
        `;
            container.appendChild(countryElement);
        });
    }

    // Remove a selected country
    function removeCountry(country) {
        selectedCountries = selectedCountries.filter(c => c !== country); // Remove from array
        updateSelectedCountries(); // Update the UI
    }

    // Reset the selected countries
    function resetCountries() {
        selectedCountries = [];
        updateSelectedCountries();
    }

    // Initialize selected languages array
    let selectedLanguages = [];

    // Handle language selection from dropdown
    function handleLanguageSelection() {
        const dropdown = document.getElementById('languageDropdown');
        const selectedValue = dropdown.value;

        if (selectedValue === 'Other') {
            // Show the input field for adding a custom language
            document.getElementById('otherLanguageInput').classList.remove('hidden');
        } else if (!selectedLanguages.includes(selectedValue) && selectedValue) {
            // Add the selected language to the list if it's not already selected
            selectedLanguages.push(selectedValue);
            updateSelectedLanguages();
        }

        // Reset the dropdown selection
        dropdown.value = '';
    }

    // Add custom language entered in the "Other" input field
    function addOtherLanguage() {
        const otherLanguageInput = document.getElementById('otherLanguage');
        const otherLanguage = otherLanguageInput.value.trim();

        if (otherLanguage && !selectedLanguages.includes(otherLanguage)) {
            // Add the custom language to the list
            selectedLanguages.push(otherLanguage);
            updateSelectedLanguages();

            // Clear the input field and hide it
            otherLanguageInput.value = '';
            document.getElementById('otherLanguageInput').classList.add('hidden');
        }
    }

    // Update the UI with the selected languages
    function updateSelectedLanguages() {
        const container = document.getElementById('selectedLanguages');
        container.innerHTML = ''; // Clear the existing display

        selectedLanguages.forEach(language => {
            // Create a container for each selected language
            const languageElement = document.createElement('div');
            languageElement.className = 'selected-option';
            languageElement.innerHTML = `
            <span>${language}</span>
            <button class="remove-btn" onclick="removeLanguage('${language}')">Remove</button>
        `;
            container.appendChild(languageElement);
        });
    }

    // Remove a selected language
    function removeLanguage(language) {
        selectedLanguages = selectedLanguages.filter(l => l !== language); // Remove from array
        updateSelectedLanguages(); // Update the UI
    }


    // Add event listener for dropdown selection
    document.getElementById('countryDropdown').addEventListener('change', handleCountrySelection);

    document.addEventListener('DOMContentLoaded', () => {
        // Conditional field handlers
        const setupConditionalField = (triggerSelector, targetSelector) => {
            const trigger = document.querySelector(triggerSelector);
            const target = document.querySelector(targetSelector);

            if (trigger && target) {
                trigger.addEventListener('change', function () {
                    if (target.classList.contains('conditional-field')) {
                        target.style.display = this.checked ||
                        (this.type === 'radio' && this.value === 'other') ? 'block' : 'none';
                    }
                });
            }
        };

        // Setup conditional fields
        const conditionalFields = [
            ['#genderOther', '#otherGenderField'],
            ['#foreignerNationality', '#foreignerCountryField'],
            ['#dualCitizenship', '#dualCitizenshipCountries'],
            ['#nonIdHolder', '#nonIdHolderDetails'],
            ['#knocking', 'knockingDetails'],
            ['#cohabitation', 'cohabitationDetails'],
        ];

        conditionalFields.forEach(([trigger, target]) => {
            setupConditionalField(trigger, target);
        });

        // Region selection handler
        const regionSelect = document.getElementById('regionSelect');
        const otherRegionField = document.getElementById('otherRegionField');

        if (regionSelect && otherRegionField) {
            regionSelect.addEventListener('change', function () {
                otherRegionField.style.display = this.value === 'Other' ? 'block' : 'none';
            });
        }

        // Slide navigation logic
        let slides = document.getElementsByClassName('slide');
        const totalSlides = slides.length;
        let currentSlide = 1;

        // Safe function to get element
        const getSlideElement = (slideNumber) => {
            const element = document.getElementById(`slide${slideNumber}`);
            if (!element) {
                console.error(`Slide ${slideNumber} not found`);
            }
            return element;
        };

        // Change slide function with additional error handling
        window.changeSlide = function (direction) {
            // Validate current slide before moving
            if (!validateCurrentSlide()) return;

            // Safely handle current slide
            const currentSlideElement = getSlideElement(currentSlide);
            if (currentSlideElement) {
                currentSlideElement.classList.remove('active');
            }

            // Update slide number
            currentSlide += direction;

            // Boundary checks
            currentSlide = Math.max(1, Math.min(currentSlide, totalSlides));

            // Safely show new slide
            const newSlideElement = getSlideElement(currentSlide);
            if (newSlideElement) {
                newSlideElement.classList.add('active');
            }

            // Update UI elements
            updateProgressBar(currentSlide, totalSlides);
            updateNavButtons();
        };

        // Progress bar update function
        function updateProgressBar(currentSlide, totalSlides) {
            const progress = document.getElementById('progressBar');
            const progressText = document.getElementById('progressPercentage');

            if (progress && progressText) {
                // Calculate progress percentage
                const progressPercentage = Math.round(((currentSlide - 1) / (totalSlides - 1)) * 100);

                // Update progress bar width
                progress.style.width = `${progressPercentage}%`;

                // Update progress text
                progressText.textContent = `${progressPercentage}%`;
            }
        }


        // Navigation buttons update function
        function updateNavButtons() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (prevBtn) {
                prevBtn.style.display = currentSlide === 1 ? 'none' : 'block';
            }

            if (nextBtn) {
                if (currentSlide === totalSlides) {
                    nextBtn.textContent = 'Submit';
                    nextBtn.onclick = submitForm;
                } else {
                    nextBtn.textContent = 'Next';
                    nextBtn.onclick = () => changeSlide(1);
                }
            }
        }

        // Current slide validation
        function validateCurrentSlide() {
            const currentSlideElement = getSlideElement(currentSlide);
            if (!currentSlideElement) return false;

            const requiredFields = currentSlideElement.querySelectorAll('[required]');

            for (let field of requiredFields) {
                if (!field.value) {
                    alert('Please fill out all required fields.');
                    return false;
                }
            }
            return true;
        }

        // Form submission function
        function submitForm() {
            // Final validation
            if (validateCurrentSlide()) {
                const form = document.getElementById('registrationForm');
                if (form) {
                    form.submit();
                }
            }
        }

        // Initialize UI
        updateProgressBar(currentSlide, totalSlides);
        updateNavButtons();
    });
    document.querySelectorAll('.validate-text').forEach(function (input) {
        input.addEventListener('keyup', function () {
            var txt = /[^a-zA-Z ]/gi;
            this.value = this.value.replace(txt, "");
        });
    });

    function numberonly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "");

    }

    function OtherBankField() {
        const otherBank = document.getElementById('name_of_bank');
        const otherField = document.getElementById('otherBankField');

        if (otherBank.value === "Other") {
            otherField.classList.remove('hidden'); // Show the "Other" text field
        } else {
            otherField.classList.add('hidden'); // Hide the "Other" text field
            document.getElementById('other_bank_name').value = ''; // Clear the input field
        }
    }


    // Function to validate phone number
    function handleSendOTP() {
        const phoneInput = document.querySelector(".phone_number"); // Use querySelector for a single element
        const otpSection = document.querySelector(".otp_section");

        if (!phoneInput) {
            console.error("Phone input element not found.");
            return;
        }
        if (!otpSection) {
            console.error("OTP section element not found.");
            return;
        }

        const phoneNumber = phoneInput.value;

        // Regular expression for phone number validation
        const re = /^(\+?\d{1,3}[-\s]?)?\(?\d{1,4}\)?[-\s]?\d{1,4}[-\s]?\d{1,4}$/;

        // Check if phone number matches the regex
        if (!re.test(phoneNumber)) {
            alert("Please enter a valid phone number.");
            return;
        }

        // Display the OTP section
        otpSection.style.display = "block";
    }

    // Function to handle the Verify OTP button click
    function handleVerifyOTP() {
        const otpInput = document.querySelector(".otp_input"); // Use querySelector for a single element

        if (!otpInput) {
            console.error("OTP input element not found.");
            return;
        }

        const otpValue = otpInput.value.trim();

        // Simulate OTP verification (replace with your actual logic to verify OTP)
        if (otpValue === "") {
            alert("Please enter the OTP.");
            return;
        }

        console.log("Verifying OTP:", otpValue);
        alert("OTP verified successfully!");
    }

    // Function to handle Send OTP button click for email
    function handleSendEmailOTP() {
        const emailInput = document.querySelector(".email_address");
        const otpSection = document.querySelector(".email_otp_section"); // Fixed missing quote

        if (!emailInput) {
            console.error("Email input element not found.");
            return;
        }
        if (!otpSection) {
            console.error("Email OTP section element not found.");
            return;
        }

        // Check if the email input is empty
        if (emailInput.value.trim() === "") {
            alert("Please enter your email address.");
            return;
        }

        // Show the OTP input section
        otpSection.style.display = "block";
    }

    // Attach event listener to the Verify OTP button
    document.querySelectorAll(".verify_email_otp_btn").forEach((button) => {
        button.addEventListener("click", function () {
            const otpInput = document.querySelector(".email_otp_input");

            if (!otpInput) {
                console.error("Email OTP input element not found.");
                return;
            }

            const otpValue = otpInput.value.trim();

            // Simulate OTP verification (replace this with actual verification logic)
            if (otpValue === "") {
                alert("Please enter the OTP.");
            } else {
                console.log("Verifying OTP:", otpValue);
                alert("OTP verified successfully!");
            }
        });
    });

    //function called when a radio button "i applied for a new Title/Concurrence on" is clicked
    function toggleConcurrenceDate(showDateInput) {
        const dateInput = document.getElementById('yellow_card_date');
        if (showDateInput) {
            dateInput.style.display = 'inline-block';
        } else {
            dateInput.style.display = 'none';
            dateInput.value = ''; // Reset value when hidden
        }
    }

    // Add event listeners to other radio buttons
    document.querySelectorAll('input[name="yellow_card_status"]').forEach(radio => {
        if (radio.id !== 'applied_yellow') {
            radio.addEventListener('click', () => toggleYellowCardDate(false));
        }
    });

    function toggleYellowCardDate(showDateInput) {
        const dateInput = document.getElementById('yellow_card_date');
        if (showDateInput) {
            dateInput.style.display = 'inline-block';
        } else {
            dateInput.style.display = 'none';
            dateInput.value = ''; // Reset value when hidden
        }
    }

    // Add event listeners to other radio buttons
    document.querySelectorAll('input[name="yellow_card_status"]').forEach(radio => {
        if (radio.id !== 'applied_yellow') {
            radio.addEventListener('click', () => toggleYellowCardDate(false));
        }
    });


    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const button = card.querySelector('.upload-btn');
            const input = card.querySelector('input[type="file"]');

            button.addEventListener('click', () => {
                if (card.dataset.type.includes('holding')) {
                    // For holding ID cards, we'll use the camera directly
                    input.setAttribute('capture', 'user');
                    input.removeAttribute('accept');
                } else {
                    // For regular ID cards, we'll allow both camera and file upload
                    input.removeAttribute('capture');
                    input.setAttribute('accept', 'image/*');
                }
                input.click();
            });

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('image', file);
                    formData.append('type', card.dataset.type);

                    // Send the image to the server
                    fetch('upload.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Image uploaded successfully!');
                                // You can update the UI here to show the uploaded image
                            } else {
                                alert('Failed to upload image. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                }
            });
        });
    });

</script>
</body>
</html>
