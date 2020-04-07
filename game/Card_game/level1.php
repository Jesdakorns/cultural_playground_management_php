<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Level1</title>
    <!-- Your CSS -->
    <link rel="stylesheet" type="text/css" href="css/Switches.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;

    }

    header {
        padding: 1% 0% 1% 0%;
    }

    section {
        padding: 0%;
    }

    footer {
        padding: 6% 0% 1% 0%;
    }

    .bg_header {
        font-weight: bold;
        font-size: 48px;
        background-image: url('./Assets/Images/cardgame_image/tour-bg.png');
        background-repeat: repeat-x;
    }

    .bg_footer {
        width: 100%;
        background-image: url('./Assets/Images/cardgame_image/desk.png');
        background-repeat: repeat-x;
        /* background-attachment: fixed; */
        /* background-position: bottom; */
    }

    .page-title {
        color: #FF6D00;
        /* font-family: Creepy, serif; */
        font-weight: normal;
        text-align: center;
        font-size: 6em;
    }

    .game-info-container {
        grid-column: 1 / -1;
        display: flex;
        justify-content: space-between;
    }

    .game-container {
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-gap: 10px;
        justify-content: center;
        perspective: 500px;
    }

    .card {
        position: relative;
        height: 190px;
        width: 140px;
        border: 0px solid rgb(167, 155, 147);
        border-radius: 25px;
        background: #ffff0000;
    }

    .card-back {
        background: rgb(255, 255, 255);
        border-color: rgb(255, 255, 255);
        transform: rotateY(0);
        border: none;
    }

    .card-front {

        background: rgb(255, 255, 255);
        border-color: #333;
        transform: rotateY(180deg);
        border: 2px solid rgb(167, 155, 147);
    }

    .bg-size-card {
        width: 100%;
        height: 100%;
    }

    .card.visible .card-back {
        transform: rotateY(-180deg);
    }

    .card-back:hover .spider {
        transform: translateY(0);
    }

    .card.visible .card-front {
        transform: rotateY(0);
    }

    .cob-web {
        position: absolute;
        transition: width 10ms ease-in-out, height 100ms ease-in-out;
        width: 47px;
        height: 47px;
    }

    .card-face:hover .cob-web {
        width: 52px;
        height: 52px;
    }

    .cob-web-top-left {
        transform: rotate(270deg);
        top: 0;
        left: 0;
    }

    .cob-web-top-right {
        top: 0;
        right: 0;
    }

    .cob-web-bottom-left {
        transform: rotate(180deg);
        bottom: 0;
        left: 0;
    }

    .cob-web-bottom-right {
        transform: rotate(90deg);
        bottom: 0;
        right: 0;
    }

    .spider {
        align-self: flex-start;
        transition: transform 100ms ease-in-out;
        transform: translateY(-10px);
    }

    .card-face {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        border-width: 2px;
        border-style: solid;
        overflow: hidden;
        transition: transform 500ms ease-in-out;
        backface-visibility: hidden;
    }

    .card-value {
        position: relative;
        transition: transform 100ms ease-in-out;
        transform: scale(.9);
        height: 69%;
        width: 100%;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -69px;
        margin-top: -35px;
        border: 2px solid rgb(167, 155, 147);
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .overlay-text {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100;
        display: none;
        position: fixed;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: #FF6D00;
        /* font-family: Creepy, serif; */
        transition: background-color 500ms, font-size 500ms;
    }

    .overlay-text-medium {
        font-size: .7em;
    }

    .overlay-text.visible {
        display: flex;
        animation: overlay-grow 500ms forwards;
    }

    .btn {
        width: 13%;
        height: 50px;
    }

    .overlay-text-over {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100;
        display: none;
        position: fixed;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: background-color 500ms, font-size 500ms;
    }

    .overlay-text-over.visible {
        display: flex;
        animation: overlay-grow 500ms forwards;
    }

    .overlay-text-victory {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100;
        display: none;
        position: fixed;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: background-color 500ms, font-size 500ms;
    }

    .overlay-text-victory.visible {
        display: flex;
        animation: overlay-grow 500ms forwards;
    }

    .box-over {
        padding: 2%;
        background: #fff5ea;
        width: 24%;
        height: 445px;
        font-size: 18px;
        border-radius: 10%;
        border: 5px solid #6b6fbf;
    }

    .box-victory {
        background: #FFFF;
        width: 24%;
        height: 445px;
        font-size: 18px;
        border-radius: 10%;
        border: 5px solid #ccffff;
    }

    .btn_padding_try_again {
        padding: 2%;

    }

    .btn_padding_home {
        padding: 2%;

    }

    .btn_padding {
        padding: 1%;
    }

    .text-over-score {
        font-size: 38px;
        color: #ff3300;
    }

    .text-over-score1 {
        font-size: 28px;
        color: #ff3300;
    }

    .text-victory-score {
        font-size: 38px;
        color: #009933;
    }

    .text-victory-score1 {
        font-size: 28px;
        color: #009933;
    }

    .try_again {

        background: -webkit-linear-gradient(#ff791552, #ff7600, #ff7600, #ff791552);
        border-radius: 15px;
        border: 5px solid #fff;
        width: 100%;
        height: auto;
        box-shadow: 0 3px 7px rgb(0, 0, 0);
    }

    .next {
        background: -webkit-linear-gradient(#a7e6aa52, #009933, #009933, #a7e6aa52);
        border-radius: 15px;
        border: 5px solid #fff;
        width: 100%;
        height: auto;
        box-shadow: 0 3px 7px rgb(0, 0, 0);
    }

    .home {
        padding: 0 0 0 0;
        background: -webkit-linear-gradient(#b0b0b052, #949494, #949494, #b0b0b052);
        border-radius: 15px;
        border: 5px solid #fff;
        width: 100%;
        height: auto;
        box-shadow: 0 3px 7px rgb(0, 0, 0);
    }

    .bg-text {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        font-size: 22px;
    }

    .game-info-container {
        font-size: 42px;

    }

    .btn-volue-up {
        color: #FFFF;
        background: #009933;
        font-size: 25px
    }

    .btn-volue-mute {
        color: #FFFF;
        background: #ff3300;
        font-size: 25px;
    }

    .material-icons {
        font-size: 36px;
        color: white;
    }

    .fa-home {
        font-size: 36px;
        color: white;
    }

    .home_padding {
        padding: 2px 13px 0px 13px;
    }



    .checkbox-label:before,
    *:after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        /*transition*/
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
        outline: none;
        font-family: Helvetica Neue, helvetica, arial, verdana, sans-serif;
    }

    #toggles {
        width: 60px;
        margin: 50px auto;
        text-align: center;
    }

    .ios-toggle,
    .ios-toggle:active {
        position: absolute;
        top: -5000px;
        height: 0;
        width: 0;
        opacity: 0;
        border: none;
        outline: none;
    }

    .checkbox-label {
        display: block;
        position: relative;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        line-height: 16px;
        width: 100%;
        height: 36px;
        /*border-radius*/
        -webkit-border-radius: 18px;
        -moz-border-radius: 18px;
        border-radius: 18px;
        background: #f8f8f8;
        cursor: pointer;
    }

    .checkbox-label:before {
        content: '';
        display: block;
        position: absolute;
        z-index: 1;
        line-height: 34px;
        text-indent: 40px;
        height: 36px;
        width: 36px;
        /*border-radius*/
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        top: 0px;
        left: 0px;
        right: auto;
        background: white;
        /*box-shadow*/
        -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
        -moz-box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
        box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
    }

    .checkbox-label:after {
        content: attr(data-off);
        display: block;
        position: absolute;
        z-index: 0;
        top: 0;
        left: -300px;
        padding: 10px;
        height: 100%;
        width: 300px;
        text-align: right;
        color: #bfbfbf;
        white-space: nowrap;
    }

    .ios-toggle:checked+.checkbox-label {
        /*box-shadow*/
        -webkit-box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
        -moz-box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
        box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
    }

    .ios-toggle:checked+.checkbox-label:before {
        left: calc(100% - 36px);
        /*box-shadow*/
        -webkit-box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
        -moz-box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
        box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
    }

    .ios-toggle:checked+.checkbox-label:after {
        content: attr(data-on);
        left: 60px;
        width: 36px;
    }

    /* GREEN CHECKBOX */

    #checkbox1+.checkbox-label {
        /*box-shadow*/
        -webkit-box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd;
        -moz-box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd;
        box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd;
    }

    #checkbox1:checked+.checkbox-label {
        /*box-shadow*/
        -webkit-box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
        -moz-box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
        box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
    }

    #checkbox1:checked+.checkbox-label:after {
        color: rgba(19, 191, 17, 1);
    }





    @keyframes dance {

        0%,
        100% {
            transform: rotate(0)
        }

        25% {
            transform: rotate(-30deg)
        }

        75% {
            transform: rotate(30deg)
        }
    }

    @keyframes overlay-grow {
        from {
            background-color: rgba(0, 0, 0, 0);
            font-size: 0;
        }

        to {
            background-color: rgba(0, 0, 0, .8);
            font-size: 10em;
        }
    }

    @media (orientation: portrait) {
        @media (max-width: 1300px) {
            header {
                padding: 1% 0% 0% 0%;

            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -22%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 180px;
                width: 160px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 58px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 13%;
                height: 50px;
            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 25px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 25px;
            }

            .game-info-container {
                font-size: 42px;
                /* color: #ff33cc; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 22px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .img {
                width: 200px;
                height: 200px;
            }

            .box-over {
                width: 50%;
                height: auto;
            }

            .text-over-score {
                font-size: 60px;
            }

            .text-over-score1 {
                font-size: 42px;
            }

            .text-victory-score {
                font-size: 60px;
            }

            .text-victory-score1 {
                font-size: 42px;
            }

            .try_again {
                width: 100%;
                height: 53px;
            }

            .next {
                width: 100%;
                height: 53px;
            }

            .home {
                width: 100%;
                height: 53px;
            }

            .fa-home {
                font-size: 40px;
                color: white;
            }

            .material-icons {
                font-size: 45px;
                color: white;
            }
        }

        @media (max-width: 800px) {
            header {
                padding: 1% 0% 0% 0%;

            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -28%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 150px;
                width: 130px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 48px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 13%;
                height: 50px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 25px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 25px;
            }

            .game-info-container {
                font-size: 32px;
                /* color: #99ccff; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 18px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                width: 50%;
                height: auto;
            }

            .img {
                width: 150px;
                height: 150px;
            }

            .text-over-score {
                font-size: 38px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 38px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .fa-home {
                font-size: 32px;
                color: white;
            }
        }

        @media (max-width: 500px) {
            header {
                padding: 1% 0% 0% 0%;

            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -45%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 100px;
                width: 80px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 25px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 14px;
            }

            .game-info-container {
                font-size: 22px;
                /* color: #ff3300; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 14px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                width: 85%;
                height: auto;
            }

            .text-over-score {
                font-size: 38px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 38px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .fa-home {
                font-size: 32px;
                color: white;
            }
        }

        @media (max-width: 450px) {
            header {
                padding: 1% 0% 0% 0%;

            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -55%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 100px;
                width: 80px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 37px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 13px;
            }

            .game-info-container {
                font-size: 22px;
                /* color: yellow; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 14px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                width: 85%;
                height: auto;
            }

            .text-over-score {
                font-size: 38px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 38px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .fa-home {
                font-size: 32px;
                color: white;
            }
        }

        @media (max-width: 375px) {
            header {
                padding: 1% 0% 0% 0%;
            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -65%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 90px;
                width: 70px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 32px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 14px;
            }

            .game-info-container {
                font-size: 22px;
                /* color: #ff9933; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 12px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                height: auto;
                width: 85%;
            }

            .img {
                width: 150px;
                height: 150px;
            }

            .text-over-score {
                font-size: 38px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 38px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .fa-home {
                font-size: 32px;
                color: white;
            }
        }

        @media (max-width: 320px) {

            header {
                padding: 1% 0% 0% 0%;
                color: #009933;
            }

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -80%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 80px;
                width: 60px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 25px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 14px;
            }

            .game-info-container {
                font-size: 18px;
                /* color: #009933; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 8px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                height: auto;
                width: 85%;
            }

            .img {
                width: 150px;
                height: 150px;
            }

            .text-over-score {
                font-size: 38px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 38px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .fa-home {
                font-size: 32px;
                color: white;
            }
        }
    }


    @media (orientation: landscape) {
        .btn_padding {
            padding: 1%;
        }

        @media (max-width: 1400px) {
            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -28%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 160px;
                width: 130px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 54px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 13%;
                height: 50px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 25px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 25px;
            }

            .game-info-container {
                font-size: 32px;
                /* color: #f87; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 21px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                width: 430px;
                height: auto;
            }

            .img {
                width: 180px;
                height: 180px;
            }

            .text-over-score {
                font-size: 52px;
            }

            .text-over-score1 {
                font-size: 30px;
            }

            .text-victory-score {
                font-size: 52px;
            }

            .text-victory-score1 {
                font-size: 30px;
            }

            .try_again {
                width: 100%;
                height: 52px;
            }

            .next {
                width: 100%;
                height: 52px;
            }

            .home {
                width: 100%;
                height: 52px;
            }

            .btn_padding_try_again {
                padding: 2%;

            }

            .btn_padding_home {
                padding: 2%;

            }

            .material-icons {
                font-size: 42px;
                color: white;
            }

            .fa-home {
                font-size: 38px;
                color: white;
            }
        }

        @media (max-width: 1024px) {
            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -28%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 140px;
                width: 110px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 48px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 13%;
                height: 50px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 25px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 25px;
            }

            .game-info-container {
                font-size: 32px;
                /* color: #99ccff; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 18px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                width: 350px;
                height: auto;
            }

            .img {
                width: 150px;
                height: 150px;
            }

            .text-over-score {
                font-size: 40px;
            }

            .text-over-score1 {
                font-size: 28px;
            }

            .text-victory-score {
                font-size: 40px;
            }

            .text-victory-score1 {
                font-size: 28px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .btn_padding_try_again {
                padding: 1%;

            }

            .btn_padding_home {
                padding: 1%;

            }
        }

        @media (max-width: 823px) {
            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -55%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 100px;
                width: 80px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 37px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 13px;
            }

            .game-info-container {
                font-size: 22px;
                /* color: #ff0; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 13px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                height: auto;
                width: 260px;
            }

            .img {
                width: 80px;
                height: 80px;
            }

            .text-over-score {
                font-size: 20px;
            }

            .text-over-score1 {
                font-size: 18px;
            }

            .text-victory-score {
                font-size: 20px;
            }

            .text-victory-score1 {
                font-size: 18px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .btn_padding_home {
                width: 50%;
                margin-left: 52%;
                margin-top: -27%;

            }

            .btn_padding_try_again {
                width: 50%;
                margin-right: 50%;

            }

            .fa-home {
                font-size: 31px;
                color: white;
            }
        }

        @media (max-width: 736px) {
            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -65%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 90px;
                width: 70px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 32px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 14px;
            }

            .game-info-container {
                font-size: 22px;
                /* color: #ff9933; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 12px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 36px;
                color: white;
            }

            .fa-home {
                font-size: 36px;
                color: white;
            }

            .box-over {
                height: auto;
                width: 260px;
            }

            .img {
                width: 80px;
                height: 80px;
            }

            .text-over-score {
                font-size: 20px;
            }

            .text-over-score1 {
                font-size: 18px;
            }

            .text-victory-score {
                font-size: 20px;
            }

            .text-victory-score1 {
                font-size: 18px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .btn_padding_home {
                width: 50%;
                margin-left: 52%;
                margin-top: -27%;

            }

            .btn_padding_try_again {
                width: 50%;
                margin-right: 50%;

            }

            .fa-home {
                font-size: 31px;
                color: white;
            }
        }

        @media (max-width: 568px) {

            section {
                padding: 1%;
            }

            footer {
                padding: 0% 0% 1% 0%;
            }

            .bg_header {
                font-size: 18px;
            }

            .bg_footer {
                height: 250px;
                margin-top: -80%;
            }

            .game-container {
                grid-template-columns: repeat(4, auto);
            }

            .card {
                height: 80px;
                width: 60px;
            }

            .card-value {
                position: relative;
                transition: transform 100ms ease-in-out;
                transform: scale(.9);
                position: absolute;
                top: 25px;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border: 2px solid rgb(167, 155, 147);
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .btn {
                width: 15%;
                height: 30px;

            }

            .btn-volue-up {
                color: #FFFF;
                background: #009933;
                font-size: 14px
            }

            .btn-volue-mute {
                color: #FFFF;
                background: #ff3300;
                font-size: 14px;
            }

            .game-info-container {
                font-size: 18px;
                /* color: #009933; */
            }

            .bg-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                font-size: 8px;
            }

            .text-over {
                font-size: 46px;
                color: #ff3300;
            }

            .material-icons {
                font-size: 28px;
                color: white;
            }

            .fa-home {
                font-size: 28px;
                color: white;
            }

            .box-over {
                height: auto;
                width: 260px;
            }

            .img {
                width: 80px;
                height: 80px;
            }

            .text-over-score {
                font-size: 20px;
            }

            .text-over-score1 {
                font-size: 18px;
            }

            .text-victory-score {
                font-size: 20px;
            }

            .text-victory-score1 {
                font-size: 18px;
            }

            .try_again {
                width: 100%;
                height: 45px;
            }

            .next {
                width: 100%;
                height: 45px;
            }

            .home {
                width: 100%;
                height: 45px;
            }

            .btn_padding_home {
                width: 50%;
                margin-left: 52%;
                margin-top: -26%;

            }

            .btn_padding_try_again {
                width: 50%;
                margin-right: 50%;

            }

            .fa-home {
                font-size: 31px;
                color: white;
            }
        }
    }
</style>
<?php
error_reporting(-1);
ini_set('display_errors', 'Off');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
include('js/database.php');

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM datamuseum WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url = $row["Url"];
        $count = $row["sumCount"];
        $count++;
    }
}
$sql = "UPDATE datamuseum SET sumCount=$count WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
$conn->close();
$json = file_get_contents($url);
$obj = json_decode($json);
?>

<body>
    <div class="container-fluid ">
        <!-- <div id="" class="overlay-text-b">
            <span class="icon-b" ><img src="./Assets/Images/logo.png" alt=""></span>
            <p class="text-icon-b">โปรดหมุนอุปกรณ์ของคุณ</p>
        </div> -->
        <div class="overlay-text visible text-center" id="btnGetJson">
            <span class="overlay-text-medium" id="timestart">3</span>
        </div>
        <div id="game-over-text" class="text-center overlay-text-over">
            <div class="box-over">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <span class="text-over"><img class="img" src="./Assets/Images/unnamed.png" alt="" width="150px" height="150px"></span>
                        </div>
                        <div class="col-12">
                            <span id="text-over-score" class="text-over-score">0</span>
                        </div>
                        <div class="col-12">
                            <span class="text-over-score1">คะแนน</span>
                        </div>
                    </div>
                    <div class="row btn_padding">
                        <div class="col-12">
                            <button class="try_again"><i class="material-icons">refresh</i></button>
                        </div>
                        <div class="col-12 home_padding">
                            <button class="home"><i class="fa fa-home"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="victory-text" class="text-center overlay-text-victory">
            <div class="box-over">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12 text_padding">
                            <span class="text-over"><img class="img" src="./Assets/Images/unnamed1.png" alt="" width="150px" height="150px"></span>
                        </div>
                        <div class="col-12">
                            <span id="text-victory-score" class="text-victory-score">0</span>
                        </div>
                        <div class="col-12">
                            <span class="text-victory-score1">คะแนน</span>
                        </div>
                    </div>
                    <div class="row justify-content-between ">
                        <div class="col-5">
                            <button class="try_again text-center"><i class="material-icons">refresh</i></button>
                        </div>
                        <div class="col-5">
                            <button class="next text-center"><i class="material-icons">skip_next</i></button>
                        </div>
                    </div>

                    <div class="row justify-content-between btn_padding">
                        <div class="col-11 ">
                            <button class="home"><i class="fa fa-home"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header>
            <h1 class="bg_header">

                <div class="row justify-content-center">

                    <div class="col-">
                        <!-- <h5 class="text-center">เสียงประกอบ</h5>  -->
                        <div class="switch switch--horizontal">

                            <input id="radio-a" type="radio" name="first-switch" value="off">
                            <label for="radio-a" value="ALUMINUM">ปิดเสียง</label>
                            <input id="radio-b" type="radio" name="first-switch" checked="checked" value="on">
                            <label for="radio-b">เปิดเสียง</label>
                            <span class="toggle-outside">
                                <span class="toggle-inside"></span>
                            </span>
                        </div>
                    </div>
                </div>

    </div>
    </h1>
    </header>
    <section>
        <div class="game-container">
            <div class="game-info-container">
                <div class="game-info time">เวลา <span id="time-remaining">60 </span> วิ</div>
                <div></div>
                <!-- <div class="game-info">คะแนน <span id="flips">0</span></div> -->
            </div>
            <?php foreach ($obj as $result) { ?>
                <!-- Loop file json -->
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="card">
                        <div class="card-back card-face">
                            <img class="bg-size-card" src="Assets/Images/anurak.png">
                        </div>
                        <div class="card-front card-face">
                            <div>
                                <p class="bg-text text-center"><?php echo $result[$i]->title; ?></p>
                                <img class="card-value" src="<?php echo $result[$i]->image; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-back card-face">
                            <img class="bg-size-card" src="Assets/Images/anurak.png">
                        </div>
                        <div class="card-front card-face">
                            <div>
                                <p class="bg-text text-center"><?php echo $result[$i]->title; ?></p>
                                <img class="card-value" src="<?php echo $result[$i]->image; ?>">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
    <!-- <footer class="bg_footer">
               
                </footer> -->




    </div>


    <!-- Your JavaScript -->
    <?php include('js/js.php') ?>
    <!-- <script src="js/main.js"></script> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
</body>

</html>