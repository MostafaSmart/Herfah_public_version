<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    .overlay_dialog{
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0,0.5);
        z-index: 9;
    }
    dialog .title {
        color: #ffb600;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    dialog .content {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    dialog i {
        color: #ffb600;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    dialog {
        z-index: 10000;
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        /* display: inline-block; */
        margin: 0 auto;
        border: none;
    }
    .css-button-sliding-to-bottom--yellow {
        min-width: 130px;
        height: 40px;
        color: #fff;
        padding: 5px 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border-radius: 5px;
        z-index: 0;
        background: #fff;
        overflow: hidden;
        border: 2px solid #ffb600;
        color: #ffb600;

    }

     dialog .css-button-sliding-to-bottom--yellow:hover:after {
        height: 100%;
    }

    dialog .css-button-sliding-to-bottom--yellow:after {
        content: "";
        position: absolute;
        z-index: -1;
        transition: all 0.3s ease;
        left: 0;
        top: 0;
        height: 0;
        width: 100%;
        background: #ffd819;
    }

   dialog .center-container {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <div class="overlay_dialog"></div>
    <dialog class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5;" class="center-container ">
            <i class="checkmark">✓</i>
        </div>
        <h1 class="title center-container">@yield('state', 'Success')</h1>
        <p class="content center-container">@yield('dialogcon', 'تم الإرسال بنجاح')</p>
        <div class="center-container">
            <button class="css-button-sliding-to-bottom--yellow" onclick="hide()">Close</button>
            <i></i>
        </div>
    </dialog>
</body>

</html>
<script>
    function hide(){
        const dialog = document.querySelector("dialog");
        const overlay=document.querySelector(".overlay_dialog");
        dialog.close() ;
        overlay.style.display="none";// Closes the dialog
    }
</script>
