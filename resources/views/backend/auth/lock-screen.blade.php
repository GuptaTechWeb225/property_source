<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/lock-screen.css') }}">
</head>

<body>
    <div class="lock_sreen_warraper">
        <div class="lock_screen_box">
            <div class="lock_screen_box_heading">
                <a href="{{ url('/') }}">
                    <img 
                        class="logo"
                        src="{{ userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png') }}"
                        alt="logo" 
                    />
                </a>
                <h3 class="lock_screen_box_title">Lock screen</h3>
            </div>
            <form action="#" method="POST" class="lock_screen_box_form">
                <img class="lock_screen_box_avatar" src="{{ asset('backend/assets/images/icons/user1.png') }}" alt="profile">
                <input type="password" class="lock_screen_box_input" placeholder="Enter your password" autocomplete="off" required>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="arrow_icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>                      
                </button>
            </form>
        </div>
    </div>
</body>
</html>