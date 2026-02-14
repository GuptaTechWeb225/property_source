<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{ @globalAsset(setting('favicon')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$property->name}} Video Verification</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/custom.css">
    <script src="{{ asset('backend') }}/assets/js/jquery-3.7.0.min.js"></script>

</head>

<body>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="startRecord">Start Recording</button>
    <button id="stopRecord" disabled>Stop Recording</button>
    <button id="uploadVideo" disabled>Upload Video</button>

    <script>
        let videoStream;
        let mediaRecorder;
        let recordedChunks = [];

        $(document).ready(function () {
            const videoElement = document.getElementById('video');
            const startRecordButton = $('#startRecord');
            const stopRecordButton = $('#stopRecord');
            const uploadButton = $('#uploadVideo');

            // Call startRecording() when the page loads
            startRecording();

            stopRecordButton.on('click', stopRecording);
            uploadButton.on('click', uploadVideo);

            async function startRecording() {
                try {
                    videoStream = await navigator.mediaDevices.getUserMedia({
                        video: true
                    });
                    videoElement.srcObject = videoStream;

                    mediaRecorder = new MediaRecorder(videoStream);
                    mediaRecorder.ondataavailable = function (event) {
                        recordedChunks.push(event.data);
                    };

                    mediaRecorder.start();
                    startRecordButton.prop('disabled', true);
                    stopRecordButton.prop('disabled', false);
                    uploadButton.prop('disabled', true);
                } catch (error) {
                    console.error('Error accessing webcam:', error);
                }
            }

            function stopRecording() {
                mediaRecorder.stop();
                startRecordButton.prop('disabled', false);
                stopRecordButton.prop('disabled', true);
                uploadButton.prop('disabled', false);
                // uploadVideo();

            }

            function uploadVideo() {
                const blob = new Blob(recordedChunks, {
                    type: 'video/webm'
                }); // Create a blob from recorded chunks
                const formData = new FormData(); // Create a FormData object to send the blob to the server

                formData.append('video', blob,
                    'recorded_video.webm',
                    ); // Append the blob to form data with a filename

                $.ajax({
                    url: "{{route('uploadVideo',$property->id)}}",
                    type: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },

                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting contentType
                    success: function (response) {
                        alert('Video Verification File Submit to Admin');
                        // window.location.reload('/new-page');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error uploading video:', error);
                    }
                });
            }

        });
    </script>
</body>

</html>
