<div class="modal-container">
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <span class="modal-close" id="closeModal">&times;</span>
            <div class="modal-header">Retrieve Your Incomplete Form</div>
            <p class="modal-paragraph">If you started filling out a form earlier, you can pick up right where you
                left off. Choose how you'd like to verify your details and continue.</p>
            <small class="modal-warning">On submitting the current form data will be replaced with the new
                data</small>
            <form class="modal-form" id="verificationForm">
                <div class="radio-group">
                    <label><input type="radio" name="retrive_via" value="token" checked> Token</label>
                    <label><input type="radio" name="retrive_via" value="email"> Email</label>
                    <label><input type="radio" name="retrive_via" value="phone"> Phone</label>
                </div>
                <label for="identifier">Enter your details:</label>
                <input type="text" id="identifier" name="identifier" placeholder="Enter valid identifier"
                    required>
                <button type="submit">Retrieve</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const modalOverlay = $('#modalOverlay');
        const openModal = $('#openModal');
        const closeModal = $('#closeModal');

        openModal.on('click', () => {
            modalOverlay.addClass('active');
        });

        closeModal.on('click', () => {
            modalOverlay.removeClass('active');
        });

        modalOverlay.on('click', (e) => {
            if (e.target === modalOverlay[0]) {  // Check if the click target is the modal overlay itself
                modalOverlay.removeClass('active');
            }
        });
    </script>
@endpush
