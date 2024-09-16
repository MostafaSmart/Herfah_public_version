<style>
    .parent1 {
        direction: rtl;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
        gap: 50px;
        margin:10px 100px;
    }

    .card {
        --background: linear-gradient(to left, #f7ba2b 0%, #ea5358 100%);
        width: 490px;
        height: 354px;
        padding: 5px;
        border-radius: 1rem;
        overflow: visible;
        background: #f7ba2b;
        background: var(--background);
        position: relative;
        z-index: 1;
        margin: 20px 40px;
    }

    .card::after {
        position: absolute;
        content: "";
        top: 30px;
        left: 0;
        right: 0;
        z-index: -1;
        height: 100%;
        width: 100%;
        transform: scale(0.8);
        filter: blur(25px);
        background: #f7ba2b;
        background: var(--background);
        transition: opacity .5s;
    }

    .card-info {
        --color: #181818;
        background: var(--color);
        color: var(--color);
        width: 100%;
        height: 100%;
        overflow: visible;
        border-radius: .7rem;
        padding: 30px;
    }


    /* Hover */
    .card:hover::after {
        opacity: 0;
    }

    .card:hover .card-info {
        color: #f7ba2b;
        transition: color 1s;
    }
    textarea{
        display: block;
        margin-bottom: 20px;
        width:100% ;
        height: 200;
        padding: 10px;
        border: none;
        background-color: #ffb600;
        border-radius:6px;
    }
    .file{
        display: block;
        margin-bottom: 20px;
        width: 100;
        padding: 10px;
        border: none;
        background-color: #ffb600;
        border-radius:6px;
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
    .Imagesport{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
