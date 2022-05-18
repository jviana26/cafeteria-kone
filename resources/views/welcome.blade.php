<!-- google fonts lato -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>




<style>
    html,
    body {
        background-image: url('theme\images\index.jpg');
        position: relative;
        height: 100%;
        margin: 0;
        padding: 0;

    }

    .loaded {
        overflow-y: auto;
    }

    .main {
        display: none;
    }

    /* top left*/
    .tl {
        top: 0;
        top: -50%;
        left: -50%;
    }

    /* top right*/
    .tr {
        top: -50%;
        left: 50%;
    }

    /* botton left*/
    .bl {
        top: 50%;
        left: 50%;
    }

    /* botton right*/
    .br {
        top: 50%;
        left: -50%;
    }

    .enter:after,
    .enter:hover:after,
    .enter,
    .enter:hover {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;
    }

    .enter {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 100px;
        height: 100px;
        background-color: #2A2A2B;
        background-color: rgba(17, 17, 17, 0.67);
        z-index: 999999999;
        text-align: center;
        line-height: 100px;
        text-decoration: none;
        color: #FFF;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        -webkit-box-shadow: 0 0 15px 2px #000;
        -moz-box-shadow: 0 0 15px 2px #000;
        box-shadow: 0 0 15px 2px #000;
    }

    .enter:after {
        content: " ";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 80px;
        height: 80px;
        background-color: #3FB4BE;
        background-color: rgba(0, 235, 255, 0.44);
        z-index: 999999999;
        text-align: center;
        line-height: 80px;
        text-decoration: none;
        color: #FFF;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        -webkit-box-shadow: 0 0 15px 2px #000;
        -moz-box-shadow: 0 0 15px 2px #000;
        box-shadow: 0 0 15px 2px #000;
    }

    .enter:hover {
        -webkit-box-shadow: 0 0 4px 4px #3FB4BE;
        -moz-box-shadow: 0 0 4px 4px #3FB4BE;
        box-shadow: 0 0 4px 4px #3FB4BE;
    }

    .enter:hover:after {
        background-color: #2A2A2B;
        background-color: rgba(17, 17, 17, 0.67);
    }

    .hideThis {
        -webkit-box-shadow: 0 0 0 0 #3FB4BE;
        -moz-box-shadow: 0 0 0 0 #3FB4BE;
        box-shadow: 0 0 0 0 #3FB4BE;
        opacity: 0;
        z-index: -5;
    }

    /* Layout
============================== */

    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    ::-webkit-scrollbar {
        background-color: #000;
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-thumb {
        height: 10px;
        background-color: #333;
    }

</style>


    <style>

        .vertical-centered-box {
            position: absolute;
            text-align: center;
            transition: all .3s;
            width: 100%;
            height: 100%;
            background: #fff !important
        }

        .vertical-centered-box:after {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -.25em
        }

        .vertical-centered-box .content {
            box-sizing: border-box;
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            font-size: 0
        }

        .vertical-centered-box .content .loader-circle {
            position: absolute;
            left: 50%;
            top: 50%;
            border-radius: 50%;
            box-shadow: inset 0 0 0 1px rgb(8 189 230 / 10%);
            margin-left: -61px;
            margin-top: -59px;
            width: 120px;
            height: 120px;
        }

        .vertical-centered-box .content .loader-line-mask {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -60px;
            margin-top: -60px;
            overflow: hidden;
            transform-origin: 60px 60px;
            -webkit-mask-image: -webkit-linear-gradient(top, rgb(14, 196, 202), rgba(0, 0, 0, 0));
            animation: 1.2s infinite linear;
            animation-name: rotate;
            width: 60px;
            height: 120px
        }

        .vertical-centered-box .content .loader-line {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            box-shadow: inset 0 0 0 3px #08d8ce
        }

        .vertical-centered-box .content img {
            animation: 1.5s infinite linear;
            animation-name: float
        }

        @keyframes rotate {
            0% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes fade {
            0% {
                opacity: 1
            }

            50% {
                opacity: .25
            }
        }

        @keyframes fade-in {
            0% {
                opacity: 1
            }

            100% {
                opacity: 0
            }
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotateZ(.001deg);
                animation-timing-function: ease-in-out
            }

            50% {
                transform: translate(0, 6px) rotateZ(.001deg);
                animation-timing-function: ease-in-out
            }

            100% {
                transform: translate(0, 0) rotateZ(.001deg);
                animation-timing-function: ease-in-out
            }
        }
    </style>



<body style="touch-action:manipulation">
</div> <a href="/login" class="enter">ENTER</a>
    <div id="root">
        <div class="vertical-centered-box" id="loadergif">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                   
                    <div class="loader-line">
                </div>
            </div>
        </div>
    </div>
    <div id="portal"></div>

