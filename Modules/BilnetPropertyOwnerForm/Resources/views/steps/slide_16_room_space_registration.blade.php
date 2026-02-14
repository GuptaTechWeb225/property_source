<div id="slide16" class="form-slide slide">
    <div class="slide-number">16/21</div>
    <h2>Room/Space Registration</h2>
    <br>


    <!-- Room/Space Options -->
    {{-- <div class="form-group">
        <label>Add Room/Space:</label>
        <button class="upload-btn">Add</button>
        <button class="upload-btn">Renovate</button>
    </div> --}}

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
        <input type="text" name="room_space_digital_address" placeholder="Enter digital address">
        <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
            <h6>Click here to generate Space/Room digital address</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" placeholder="Enter longitude">
        <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
            <h6>Click here to generate</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" placeholder="Enter latitude">
        <a href="#" onclick="getVerifiedDocumentNo('digital_address')">
            <h6>Click here to generate</h6>
        </a>
    </div>
    <div class="form-group">
        <label>Space/Room Google Location Link</label>
        <input type="text" name="latitude" placeholder="Enter latitude">
        <a href="https://www.google.com/maps/place/Accra,+Ghana/@5.5841833,-0.2385148,15376m/data=!3m1!1e3!4m6!3m5!1s0xfdf9084b2b7a773:0xbed14ed8650e2dd3!8m2!3d5.5592846!4d-0.1974306!16zL20vMGZueWM?entry=ttu&g_ep=EgoyMDI0MTIwMi4wIKXMDSoASAFQAw%3D%3D"
            target="_blank">
            <h6>Click here to generate</h6>
        </a>
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
                <input type="checkbox" name="roofType" value="Others" onclick="toggleOtherField('roofType')"> Others
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
                <input type="checkbox" name="ceilingType" value="Others" onclick="toggleOtherField('ceilingType')">
                Others
            </label>
        </div>
        <input type="text" id="ceilingType-other" class="other-field building-color-custom hidden"
            placeholder="Specify other colors">
    </div>

    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Space/Room Pictures</h3>
            <br>
            <p>Take or attach images</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="space_room_images" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="space_room_images" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
    </div>


    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Space/Room Videos</h3>
            <br>
            <p>Take or attach images</p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="space_room_videos" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="space_room_videos" data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
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
        <input type="text" name="sanitation_trash_bin_number_facility" min=0 max=1000>
    </div>



    <div class="form-group">
        <div class="card" data-type="back">
            <h3>Sanitation Trash Bin QR Code/Image</h3>
            <p></p>
            <button class="upload-btn" type="button">Upload Image</button>
            <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                id="sanitation_facility_qrcode" data-multiple="true" multiple>
            <input type="hidden" class="store_file original_path" name="sanitation_facility_qrcode"
                data-multiple="true">
            <div class="loader" style="display: none;">Uploading...</div>
            <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
        </div>
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
