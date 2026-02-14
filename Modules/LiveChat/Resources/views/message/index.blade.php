@extends('frontend.layouts.master')
@push('style')
    <style>
        /* New Chat Box Area S t a r t */
        .chat-box-area {
            padding: 20px;
            background-color: white;
            margin-bottom: 24px;
        }

        .chat-box-area .chatWrapper {
            background: #ffffff;
            -webkit-box-shadow: 0px 1px 80px 12px rgba(26, 40, 68, 0.06);
            box-shadow: 0px 1px 80px 12px rgba(26, 40, 68, 0.06);
            border-radius: 12px;
            padding: 20px;
            border-radius: 8px;
            height: 100vh;
        }

        .chat-box-area .chat-body {
            height: 100%;
            height: calc(100vh - 0px);
            overflow: hidden;
            position: relative;
            background: #f9f9f9;
        }

        .chat-box-area .chat-search-wrapper {
            margin-bottom: 20px;
        }

        .chat-box-area .chat-search-wrapper.style-two .searchBox .icon {
            position: absolute;
            top: 50%;
            left: auto;
            right: 7px;
        }

        .chat-box-area .chat-search-wrapper.style-two .search-form input {
            padding: 0 19px;
            border: none;
        }

        .chat-box-area .chat-search-wrapper .searchBox {
            width: 100%;
            background: none;
            height: 43px;
            position: relative;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .chat-box-area .chat-search-wrapper .searchBox input {
            width: 100%;
            height: 100%;
        }

        .chat-box-area .chat-search-wrapper .searchBox .icon {
            position: absolute;
            top: 50%;
            left: 7px;
            font-size: 21px;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            line-height: 1;
            color: #ddd;
        }

        .chat-box-area .chat-search-wrapper .search-form input {
            padding: 0 34px;
            border: none;
            font-weight: 300;
        }

        .chat-box-area .chat-search-wrapper .search-form input::-webkit-input-placeholder {
            font-weight: 300;
        }

        .chat-box-area .chat-search-wrapper .search-form input::-moz-placeholder {
            font-weight: 300;
        }

        .chat-box-area .chat-search-wrapper .search-form input:-ms-input-placeholder {
            font-weight: 300;
        }

        .chat-box-area .chat-search-wrapper .search-form input::-ms-input-placeholder {
            font-weight: 300;
        }

        .chat-box-area .chat-search-wrapper .search-form input::placeholder {
            font-weight: 300;
        }

        .chat-box-area .chat-list-wrapper {
            height: calc(100vh - 70px);
            overflow: hidden;
        }

        @media (max-width: 575px) {
            .chat-box-area .chat-list-wrapper {
                height: 100%;
                border-bottom: 1px solid var(--ot-primary-border);
                padding-bottom: 21px;
                margin-bottom: 40px;
            }
        }

        .chat-box-area .chat-list-wrapper .chat-list {
            height: calc(100vh - 170px);
            overflow-y: auto;
        }

        @media (max-width: 575px) {
            .chat-box-area .chat-list-wrapper .chat-list {
                height: 100%;
            }
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat {
            background: #f9f9f9;
            padding: 13px;
            padding-bottom: 8px;
            border-radius: 10px;
            border: 1px solid transparent;
            position: relative;
            margin-bottom: 12px;
            cursor: pointer;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        @media (max-width: 1199px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat:last-child {
            margin: 0;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat:last-child::before {
            position: unset;
            width: 0;
            height: 0px;
            background-color: none;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat::before {
            content: "";
            bottom: -17px;
            left: 0;
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: var(--ot-secondary-border);
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            gap: 15px;
        }

        @media only screen and (min-width: 576px) and (max-width: 767px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img {
            max-width: 44px;
            min-width: 44px;
            width: 44px;
            height: 44px;
            background: #e3e3e3;
            border-radius: 50%;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img img {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            margin: 4px;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img.online {
            position: relative;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img.online::after {
            content: "";
            top: 0px;
            right: 0;
            position: absolute;
            width: 10px;
            height: 10px;
            background: green;
            border-radius: 50%;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img.off-online {
            position: relative;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-img.off-online::after {
            content: "";
            top: 0px;
            right: 0;
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgb(222, 144, 60);
            border-radius: 50%;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .user-name {
            margin-bottom: 0;
            line-height: 1;
            font-weight: 500;
            font-size: 15px;
            display: block;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .user-name {
                font-size: 15px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .user-name {
                font-size: 16px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .user-name {
                font-size: 18px;
            }
        }

        @media (max-width: 575px) {
            .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .user-name {
                font-size: 15px;
            }
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .chat {
            font-size: 12px;
            margin-bottom: 0px;
            font-weight: 500;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-cap .user-chat-caption .on-off-line {
            font-size: 12px;
            font-weight: 700;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-timer {
            text-align: center;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-timer .time {
            color: var(--ot-primary-paragraph);
            font-size: 10px;
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat .chat-timer .chat-count {
            display: block;
            color: #ffffff;
            background: var(--primary-color);
            font-weight: 300;
            width: 22px;
            height: 22px;
            line-height: 22px;
            border-radius: 50%;
            text-align: center;
            font-size: 11px;
            margin: 0 auto;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active {
            background: #d3a56c4a !important;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .checkWrap .checkmark {
            background-color: var(--white);
            border: 1px solid transparent !important;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .checkWrap .checkmark:after {
            display: block !important;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .time {
            color: #5186eb;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .chat-count {
            background: #c89c66;
            color: #fff;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .user-chat-caption .on-off-line {
            color: #c89c66;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .user-chat-caption .user-name {
            color: #c89c66;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.active .user-chat-caption .chat {
            color: #c89c66;
        }

        .chat-box-area .chat-list-wrapper .chat-list .single-chat.unseen-chat {
            background: var(--white);
        }

        .chat-box-area .current-chat-user {
            background: #fff;
            border-bottom: 1px solid var(--ot-secondary-border);
            padding-left: 12px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            cursor: pointer;
        }

        @media (max-width: 1199px) {
            .chat-box-area .current-chat-user {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
        }

        .chat-box-area .current-chat-user .chat-cap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            margin-bottom: 20px;
            cursor: pointer;
            left: auto;
            gap: 20px;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .current-chat-user .chat-cap {
                padding: 10px;
            }
        }

        @media (max-width: 991px) {
            .chat-box-area .current-chat-user .chat-cap {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-bottom: 10px;
            }
        }

        .chat-box-area .current-chat-user .chat-cap .user-img {
            max-width: 44px;
            min-width: 44px;
            width: 44px;
            height: 44px;
            background: #e3e3e3;
            border-radius: 50%;
        }

        .chat-box-area .current-chat-user .chat-cap .user-img img {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            margin: 4px;
        }

        @media (max-width: 575px) {
            .chat-box-area .current-chat-user .chat-cap .user-img {
                margin-bottom: 15px;
            }
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .current-chat-user .chat-cap .user-img {
                width: 29%;
                margin-right: 9px;
            }
        }

        .chat-box-area .current-chat-user .chat-cap .user-chat-caption .user-name {
            margin-bottom: 1px;
            line-height: 1.5;
            color: var(--ot-primary-title);
            font-weight: 700;
            font-size: 12px;
            display: block;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .current-chat-user .chat-cap .user-chat-caption .user-name {
                font-size: 15px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .chat-box-area .current-chat-user .chat-cap .user-chat-caption .user-name {
                font-size: 21px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .chat-box-area .current-chat-user .chat-cap .user-chat-caption .user-name {
                font-size: 18px;
            }
        }

        @media (max-width: 575px) {
            .chat-box-area .current-chat-user .chat-cap .user-chat-caption .user-name {
                font-size: 18px;
            }
        }

        .chat-box-area .current-chat-user .chat-cap .user-chat-caption .chat-status {
            font-family: var(--ot-primary-paragraph);
            font-weight: 400;
            font-size: 14px;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .current-chat-user .chat-cap .user-chat-caption .chat-status {
                font-size: 12px;
            }
        }

        .chat-box-area .current-chat-user .flag .icon {
            font-size: 26px;
            margin: 0 4px;
        }

        .chat-box-area .chatBox-message {
            height: calc(100vh - 110px);
            overflow: hidden;
            padding: 20px 12px;
            overflow-x: auto;
        }

        @media (max-width: 575px) {
            .chat-box-area .chatBox-message {
                height: calc(100vh - 80px);
            }
        }

        .chat-box-area .chatBox-message .chatShow {
            padding: 0 12px;
            margin-bottom: 20px;
            max-height: 100vh;
            height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat {
            margin-bottom: 24px;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat .chatText {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatImg {
            max-width: 44px;
            min-width: 44px;
            width: 44px;
            height: 44px;
            background: #e3e3e3;
            border-radius: 50%;
            overflow: hidden;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption {
            width: 90%;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption .chatPera {
            font-size: 15px;
            margin-bottom: 5px;
            font-weight: 400;
            display: inline-block;
            padding: 18px 18px;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption .chatPera {
                font-size: 12px;
                margin-bottom: 7px;
            }
        }

        @media only screen and (min-width: 576px) and (max-width: 767px) {
            .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption .chatPera {
                font-size: 12px;
            }
        }

        @media (max-width: 575px) {
            .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption .chatPera {
                font-size: 12px;
            }
        }

        .chat-box-area .chatBox-message .chatShow .single-chat .chatText .chatCaption .sendTime {
            color: rgba(var(--primary-rgb), 0.8);
            display: block;
            font-size: 13px;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.userMessage .chatText .chatCaption {
            text-align: left;
            margin-right: auto;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.userMessage .chatText .chatCaption .chatPera {
            -webkit-box-shadow: rgba(100, 100, 111, 0.07) 0px 7px 29px 0px;
            box-shadow: rgba(100, 100, 111, 0.07) 0px 7px 29px 0px;
            border-radius: 10px;
            background: #fff;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.userMessage .chatText .chatCaption .sendTime {
            text-align: left;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.adminMessage .chatText {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
            cursor: pointer;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.adminMessage .chatText .chatCaption {
            text-align: right;
            margin-left: auto;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.adminMessage .chatText .chatCaption .chatPera {
            border-radius: 10px;
            background: #c89c66;
            box-shadow: rgba(100, 100, 111, 0.07) 0px 7px 29px 0px;
            color: #fff;
        }

        .chat-box-area .chatBox-message .chatShow .single-chat.adminMessage .chatText .chatCaption .sendTime {
            text-align: right;
        }

        .chat-box-area .chatSend-wrapper {
            border-top: 1px solid var(--ot-primary-border);
            position: absolute;
            bottom: 15px;
            left: 16px;
            right: 16px;
            margin-top: 20px;
            overflow: hidden;
            z-index: 999;
            border-radius: 7px;
        }

        @media (max-width: 575px) {
            .chat-box-area .chatSend-wrapper {
                background: none;
            }
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input {
            border-radius: 8px;
            border: 1px solid #c89c66;
            width: 100%;
            height: 52px;
            padding: 10px 20px;
            padding-right: 100px;
            background: var(--white);
        }

        @media (max-width: 575px) {
            .chat-box-area .chatSend-wrapper .sendMessage .input {
                padding-right: 20px;
            }
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input::-webkit-input-placeholder {
            font-size: 14px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input::-moz-placeholder {
            font-size: 14px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input:-ms-input-placeholder {
            font-size: 14px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input::-ms-input-placeholder {
            font-size: 14px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .input::placeholder {
            font-size: 14px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .imgSlector {
            position: absolute;
            right: 102px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 24px;
            border-radius: 30px;
        }

        .chat-box-area .chatSend-wrapper .sendMessage .imgSlector .icon {
            border-radius: 30px;
        }

        @media (max-width: 575px) {
            .chat-box-area .chatSend-wrapper .sendMessage .imgSlector {
                position: relative;
                right: 8px;
                top: 30px;
                float: right;
            }
        }

        .chat-box-area .chat-admin {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            margin-bottom: 20px;
            cursor: pointer;
            left: auto;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .chat-admin {
                padding: 10px;
            }
        }

        @media (max-width: 991px) {
            .chat-box-area .chat-admin {
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-bottom: 10px;
            }
        }

        .chat-box-area .chat-admin .profile-wrap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            gap: 15px;
        }

        .chat-box-area .chat-admin .user-img {
            max-width: 44px;
            min-width: 44px;
            width: 44px;
            height: 44px;
            background: #e3e3e3;
            border-radius: 50%;
            border-radius: 50%;
        }

        .chat-box-area .chat-admin .user-img img {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            margin: 4px;
        }

        .chat-box-area .chat-admin .user-chat-caption .user-name {
            margin-bottom: 1px;
            line-height: 1.5;
            /* color: var(--ot-primary-title); */
            font-weight: 500;
            font-size: 16px;
            display: block;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .chat-admin .user-chat-caption .user-name {
                font-size: 15px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .chat-box-area .chat-admin .user-chat-caption .user-name {
                font-size: 21px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .chat-box-area .chat-admin .user-chat-caption .user-name {
                font-size: 18px;
            }
        }

        @media (max-width: 575px) {
            .chat-box-area .chat-admin .user-chat-caption .user-name {
                font-size: 18px;
            }
        }

        .chat-box-area .chat-admin .user-chat-caption .chat-status {
            font-family: var(--heading-font);
            font-weight: 400;
            font-size: 14px;
            padding: 0;
        }

        @media only screen and (min-width: 1600px) and (max-width: 1799px) {
            .chat-box-area .chat-admin .user-chat-caption .chat-status {
                font-size: 12px;
            }
        }

        .chat-box-area .custom-dropdown button {
            background: none;
            padding: 0;
            border: 0;
            font-size: 40px;
            color: #ddd;
            line-height: 1;
        }

        .chat-box-area .custom-dropdown button::after {
            display: none;
        }

        .chat-box-area .btn-wrapper .btn-rounded2 {
            position: absolute;
            top: 5px;
            right: 5px;
            height: 42px;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            padding: 10px 20px;
            font-size: 16px;
            background: #c89c66;
            color: #fff;
            font-weight: 600;
            line-height: 1;
            border: 0;
        }
        .single-chat .chatText .chatImg .img-cover {
            border-radius: 50%;
            height: 35px;
            width: 35px;
            margin: 4px;
        }
    </style>
@endpush

@section('content')
    <div class="o_landy_dashboard_area dashboard_bg section_spacing6">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-xl-9 col-lg-9">
                    <input type="text" hidden id="receiver_id" value="{{ encrypt(auth()->id()) }}">
                    <input type="text" hidden id="app_key" value="{{ env('PUSHER_APP_KEY') }}">
                    <audio id="message_sound">
                        <source src="{{ asset('sample_file/sound.mp3') }}" type="audio/mpeg">
                    </audio>

                    <!-- Chat box Area two s t a r t-->
                    <div class="chat-box-area card-body">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-5 col-sm-5">
                                <!-- Chat left side-bar -->
                                <div class="chat-left-sidebar">
                                    <!-- Admin Profile -->
                                    <div class="chat-admin">
                                        <!-- Profile -->
                                        <div class="profile-wrap">
                                            <div class="user-img">
                                                <img src="{{ @globalAsset(auth()->user()->image->path) }}" alt="img"
                                                     class="img-cover">
                                            </div>
                                            <div class="user-chat-caption">
                                                <h5 class="user-name">{{ auth()->user()->name }}</h5>
                                                <p class="chat-status">{{ _trans('common.Active') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- My Listings -->
                                    <div class="chat-list-wrapper ">
                                        <div class="search-chat mb-3">
                                            <input class="form-control ot-input" type="text" id="chat_search" onkeyup="searchChat()"
                                                   placeholder="{{ _trans('common.Search') }}">
                                        </div>
                                        <div class="chat-list" data-url="{{ route('livechat.chat_list') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xxl-9 col-xl-8 col-lg-6 col-md-7 col-sm-7">
                                <div class="chat-body">
                                    <!-- curren-chat-user -->
                                    <div class="current-chat-user">
                                        <div class="chat-cap">
                                            <div class="user-img">
                                                <img src="{{ @globalAsset(@$data['user']->avatar_id) }}" alt="img"
                                                     class="img-cover">
                                            </div>
                                            <div class="user-chat-caption" id="current_user"
                                                 data-id="{{ encrypt(@$data['user']->id) }}">
                                                <h5><a href="javascript:;" class="user-name">{{ @$data['user']->name }}</a></h5>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End-of Show product -->
                                    <!-- MessageBox -->
                                    <div class="chatBox-message">
                                        <div class="chatShow">
                                            <!-- userMessage -->

                                        @foreach ($data['messages'] as $message)
                                            <!-- adminMessage -->
                                                @if (@$message->sender->id == auth()->user()->id)
                                                        <div class="single-chat adminMessage" id="message-{{ $message->id }}">
                                                        <div class="chatText">
                                                            <div class="chatImg">
                                                                <img src="{{ @globalAsset(@$message->sender->image->path) }}"
                                                                     alt="img" class="img-cover" height="40" width="40">
                                                            </div>
                                                            <div class="chatCaption">
                                                                <p class="chatPera"> {{ $message->message }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="single-chat userMessage" id="message-{{ $message->id }}">
                                                        <div class="chatText">
                                                            <div class="chatImg">
                                                                <img src="{{ @globalAsset(@$message->receiver->image->path) }}"
                                                                     alt="img" class="img-cover">
                                                            </div>
                                                            <div class="chatCaption">
                                                                <p class="chatPera">{{ $message->message }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- chatSend input box-->
                                        <div class="chatSend-wrapper">
                                            <div class="sendMessage">
                                                <input class="input" type="text" id="chat_text" name="chat"
                                                       placeholder="Write your chat...">
                                                <div class="btn-wrapper form-icon">
                                                    <button class="btn-rounded2" type="submit" name="submit" id="message_sent"
                                                            data-url="{{ route('livechat.store', encrypt(@$data['user']->id)) }}">{{ _trans('common.Send') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End-of Chat Box Area -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ url('frontend/js/app.js') }}"></script>
@endsection
