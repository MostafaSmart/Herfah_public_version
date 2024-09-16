<style>


    .parent {
        direction: rtl;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 50;
        justify-content: space-around
    }

    .card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 320px;
        border-radius: 24px;
        line-height: 1.6;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
        margin: 50px 20px;
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 24px;
        padding: 36px;
        border-radius: 22px;
        color: #000000;
        overflow: hidden;
        background: #ffb600;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content::before {
        position: absolute;
        content: "";
        top: -4%;
        left: 50%;
        width: 90%;
        height: 90%;
        transform: translate(-50%);
        background: #ced8ff;
        z-index: -1;
        transform-origin: bottom;

        border-radius: inherit;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content::after {
        position: absolute;
        content: "";
        top: -8%;
        left: 50%;
        width: 80%;
        height: 80%;
        transform: translate(-50%);
        background: #e7ecff;
        z-index: -2;
        transform-origin: bottom;
        border-radius: inherit;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content svg {
        width: 48px;
        height: 48px;
    }

    .content .para {
        z-index: 1;
        opacity: 1;
        font-size: 18px;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content .link {
        z-index: 1;
        color: #fea000;
        text-decoration: none;
        font-family: inherit;
        font-size: 16px;
        transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .content .link:hover {
        text-decoration: underline;
    }

    .card:hover {
        transform: translate(0px, -16px);
    }

    .card:hover .content::before {
        rotate: -8deg;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .card:hover .content::after {
        rotate: 8deg;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .inputbox {
        position: relative;
        width: 196px;
    }

    .inputbox input {
        position: relative;
        width: 100%;
        padding: 20px 10px 10px;
        background: transparent;
        outline: none;
        box-shadow: none;
        border: none;
        color: white;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
        z-index: 5;
    }

    .inputbox span {
        position: absolute;
        left: 0;
        padding: 20px 10px 10px;
        font-size: 1em;
        color: #8f8f8f;
        letter-spacing: 00.05em;
        transition: 0.5s;
        pointer-events: none;
    }

    .inputbox input:focus~span {
        display: none;
    }

    .inputbox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: black;
        border-radius: 4px;
        transition: 0.5s;
        pointer-events: none;
        z-index: 9;
    }

    /* .inputbox input:valid ~i,
.inputbox input:focus ~i {
height: 44px;
} */
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

    .css-button-sliding-to-bottom--black {
        min-width: 130px;
        height: 40px;
        color: #fff;
        padding: 5px 10px;
        font-weight: bold;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border-radius: 5px;
        z-index: 0;
        background: #fff;
        overflow: hidden;
        border: 2px solid black;
        color: black;

    }

    .css-button-sliding-to-bottom--yellow:hover:after {
        height: 100%;
    }

    .css-button-sliding-to-bottom--yellow:after {
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

    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
