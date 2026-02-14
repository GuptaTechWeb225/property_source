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
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="id_attachment_4_left_fpc" data-multiple="false">
                        <input type="hidden" class="store_file original_path" name="id_attachment_4_left_fpc_front" required>
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>

                    <div class="card" data-type="back">
                        <h3>Left Thumb fingers Capture <span class="required">*</span></h3>
                        <p>Click to snap live image OR attach ID Photo from your files</p>
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="environment" style="display: none;"
                            id="id_attachment_left_tfc_back" data-multiple="false">
                        <input type="hidden" class="store_file original_path" name="id_attachment_left_tfc_back" required>
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>

                    <div class="card" data-type="front-holding">
                        <h3>Four Right Fingers & Palm Capture <span class="required">*</span></h3>
                        <p>Click to open camera to snap live image of you holding front of ID to your chest</p>
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="user" style="display: none;"
                            id="id_attachment_4_right_fpc_front_hold" data-multiple="false">
                        <input type="hidden" class="store_file original_path"
                            name="id_attachment_4_right_fpc_front_hold" required>
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>


                    <div class="card" data-type="back-holding">
                        <h3>Right Thumb fingers Capture <span class="required">*</span></h3>
                        <p>Click to open camera to snap live image of you holding back of ID to your chest</p>
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="user" style="display: none;"
                            id="id_attachment_left_tfc_back_hold" data-multiple="false">
                        <input type="hidden" class="store_file original_path" name="id_attachment_left_tfc_back_hold" required>
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>

                    <div class="card" data-type="back-holding">
                        <h3>Face ID capture <span class="required">*</span></h3>
                        <p>Click to open camera to snap live image of you holding back of ID to your chest</p>
                        <button class="upload-btn" type="button">Take Photo</button>
                        <input type="file" accept="image/png, image/jpeg, image/webp" capture="user" style="display: none;"
                            id="id_attachment_fic_back_hold" data-multiple="false">
                        <input type="hidden" class="store_file original_path" name="id_attachment_fic_back_hold" required>
                        <div class="loader" style="display: none;">Uploading...</div>
                        <img class="preview" style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Create Password <span class="required">*</span></label>
        <input type="text" name="password" id="password" required>
    </div>
    <div class="form-group">
        <label>Digital Signation/Stamp <span class="required">*</span></label>
        <input type="text" name="digital_signature" required>
    </div>

</div>
