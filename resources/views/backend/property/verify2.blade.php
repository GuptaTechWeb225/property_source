<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Recorder</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/custom.css">
    <script src="{{ asset('backend') }}/assets/js/jquery-3.7.0.min.js"></script>
</head>
<body>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="startRecord" >Start Recording</button>
    <button id="stopRecord" disabled>Stop Recording</button>
    <button id="uploadVideo" disabled>Upload Video</button>

    <script>
        let videoStream;
        let mediaRecorder;
        let recordedChunks = [];
        let recordTimeout;

        $(document).ready(function () {
            const videoElement = document.getElementById('video');
            const startRecordButton = $('#startRecord');
            const stopRecordButton = $('#stopRecord');
            const uploadButton = $('#uploadVideo');

            startRecordButton.on('click', startRecording);
            stopRecordButton.on('click', stopRecording);
            uploadButton.on('click', uploadVideo);

            startRecording(); // Start recording when the page loads

            function startRecording() {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        videoStream = stream;
                        videoElement.srcObject = videoStream;

                        mediaRecorder = new MediaRecorder(videoStream);
                        mediaRecorder.ondataavailable = function(event) {
                            recordedChunks.push(event.data);
                        };

                        mediaRecorder.start();
                        startRecordButton.prop('disabled', true);
                        stopRecordButton.prop('disabled', false);
                        uploadButton.prop('disabled', true);

                        // Set a timeout to stop recording after 30 seconds
                        recordTimeout = setTimeout(stopRecording, 30000); // 30 seconds
                    })
                    .catch(function(error) {
                        console.error('Error accessing webcam:', error);
                    });
            }

            function stopRecording() {
                mediaRecorder.stop();
                clearTimeout(recordTimeout); // Clear the timeout
                startRecordButton.prop('disabled', false);
                stopRecordButton.prop('disabled', true);
                uploadButton.prop('disabled', false);
                videoElement.controls = true; // Enable video controls to playback recorded video
                videoElement.src = URL.createObjectURL(new Blob(recordedChunks));
                videoElement.play(); // Play the recorded video
            }

            function uploadVideo() {
                const blob = new Blob(recordedChunks, { type: 'video/webm' });
                const formData = new FormData();
                formData.append('video', blob, 'recorded_video.webm');

                $.ajax({
                    url: "{{ route('uploadVideo') }}",
                    type: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error uploading video:', error);
                    }
                });
            }
        });
    </script>
</body>
</html>
