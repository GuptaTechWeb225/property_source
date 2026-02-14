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
                $hourStr = $x == 1 ? 'Hour' : 'Hours';
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
                $dayStr = $x == 1 ? 'Day' : 'Days';
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
                $weekStr = $x == 1 ? 'Week' : 'Weeks';
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
                $monthStr = $x == 1 ? 'Month' : 'Months';
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
                    @for ($y = 1; $y <= 7; $y++)
                        @php
                            $fromHoursString = '';
                            $toHoursString = '';
                            if ($y == 1) {
                                $fromHoursString = 'monday_hours_from';
                                $toHoursString = 'monday_hours_to';
                            } elseif ($y == 2) {
                                $fromHoursString = 'tuesday_hours_from';
                                $toHoursString = 'tuesday_hours_to';
                            } elseif ($y == 3) {
                                $fromHoursString = 'wednesday_hours_from';
                                $toHoursString = 'wednesday_hours_to';
                            } elseif ($y == 4) {
                                $fromHoursString = 'thursday_hours_from';
                                $toHoursString = 'thursday_hours_to';
                            } elseif ($y == 5) {
                                $fromHoursString = 'friday_hours_from';
                                $toHoursString = 'friday_hours_to';
                            } elseif ($y == 6) {
                                $fromHoursString = 'saturday_hours_from';
                                $toHoursString = 'saturday_hours_to';
                            } elseif ($y == 7) {
                                $fromHoursString = 'sunday_hours_from';
                                $toHoursString = 'sunday_hours_to';
                            }
                        @endphp
                        <td>
                            <label>From</label>
                            <select name="{{ $fromHoursString }}">
                                <option value="">Select</option>
                                <?php
                                for ($x = 1; $x <= 24; $x++) {
                                    $hourStr = $x == 1 ? 'Hour' : 'Hours';
                                    echo "<option value=$x $hourStr>$x $hourStr</option>";
                                }
                                ?>
                            </select>
                            <label>To</label>
                            <select name="monday_hours_to">
                                <option value="">Select number of hours</option>
                                <?php
                                for ($x = 1; $x <= 24; $x++) {
                                    $hourStr = $x == 1 ? 'Hour' : 'Hours';
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
                            $activityString = '';
                            if ($x == 1) {
                                $activityString = 'monday_morning_activity';
                            } elseif ($y == 2) {
                                $activityString = 'tuesday_morning_activity';
                            } elseif ($y == 3) {
                                $activityString = 'wednesday_morning_activity';
                            } elseif ($y == 4) {
                                $activityString = 'thursday_morning_activity';
                            } elseif ($y == 5) {
                                $activityString = 'friday_morning_activity';
                            } elseif ($y == 6) {
                                $activityString = 'saturday_morning_activity';
                            } elseif ($y == 7) {
                                $activityString = 'sunday_morning_activity';
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
                                <option value="I Will Think About It Later">I Will Think About It Later
                                </option>
                                <option value="I Am Not So Sure">I Am Not So Sure</option>
                            </select>
                            <input type="text" class="hidden morning-other-1"
                                placeholder="Add activity">
                        </td>
                    @endfor

                </tr>

                <tr>
                    <th>Afternoon</th>
                    <!-- Repeat same structure as Morning -->
                    @for ($x = 1; $x <= 7; $x++)
                        @php
                            $activityString = '';
                            if ($x == 1) {
                                $activityString = 'monday_afternoon_activity';
                            } elseif ($y == 2) {
                                $activityString = 'tuesday_afternoon_activity';
                            } elseif ($y == 3) {
                                $activityString = 'wednesday_afternoon_activity';
                            } elseif ($y == 4) {
                                $activityString = 'thursday_afternoon_activity';
                            } elseif ($y == 5) {
                                $activityString = 'friday_afternoon_activity';
                            } elseif ($y == 6) {
                                $activityString = 'saturday_afternoon_activity';
                            } elseif ($y == 7) {
                                $activityString = 'sunday_afternoon_activity';
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
                                <option value="I Will Think About It Later">I Will Think About It Later
                                </option>
                                <option value="I Am Not So Sure">I Am Not So Sure</option>
                            </select>
                            <input type="text" class="hidden afternoon-other-1"
                                placeholder="Add activity">
                        </td>
                    @endfor

                </tr>

                <!-- Evening Row -->
                <tr>
                    <th>Evening</th>
                    @for ($x = 1; $x <= 7; $x++)
                        @php
                            $activityString = '';
                            if ($x == 1) {
                                $activityString = 'monday_evening_activity';
                            } elseif ($y == 2) {
                                $activityString = 'tuesday_evening_activity';
                            } elseif ($y == 3) {
                                $activityString = 'wednesday_evening_activity';
                            } elseif ($y == 4) {
                                $activityString = 'thursday_evening_activity';
                            } elseif ($y == 5) {
                                $activityString = 'friday_evening_activity';
                            } elseif ($y == 6) {
                                $activityString = 'saturday_evening_activity';
                            } elseif ($y == 7) {
                                $activityString = 'sunday_evening_activity';
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
                                <option value="I Will Think About It Later">I Will Think About It Later
                                </option>
                                <option value="I Am Not So Sure">I Am Not So Sure</option>
                            </select>
                            <input type="text" class="hidden evening-other-1"
                                placeholder="Add activity">
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
                <input type="radio" name="income_details" id="income_details_annually"
                    value="Annually">
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
