<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="{{ asset('itemshop/assets/css/style.css') }}">
    <title>Kingdom of Ash - ItemShop</title>
</head>
<body>
    <!-- <div class="w-[1000px] max-w-[1000px] h-[562px] bg-[#1b0606]"> -->
        <div class="h-[70px] w-full bg-[#1b0606]">
            <div class="flex w-full h-full items-center">
                <div class="flex items-center gap-[70px] min-w-[40%]">
                    <div class="h-[120px] w-[120px] mt-[20px] ml-[40px]">
                        <img src="{{ asset('itemshop/assets/img/koa_logo_transparent.png') }}" class="absolute h-[100px] w-[115px] z-[1]">
                        <div class="absolute top-[0] left-[0] max-h-[70px] w-[250px]">
                            <img src="{{ asset('itemshop/assets/img/brushtopnav.png') }}" class="object-none z-0">
                        </div>
                    </div>
                    
                    <div class="text-white text-[13px]">
                        <p id="monede" class="flex gap-[10px] items-center"> <img src="{{ asset('itemshop/assets/img/md.png') }}"> 0</p>
                        <p id="monedeTitle" class="ml-[25px]">Monede</p>
                    </div>
                </div>

                <div class="flex w-[60%] pr-[50px] h-full items-center justify-between">
                    <input type="text" name="search" id="search" placeholder="Cauta obiect.." class=" w-[200px] h-[32px] px-[10px] text-[14px] text-white bg-transparent rounded-full border-[1px] border-[#690e0e]">
                    <div class=" w-[200px] h-[70px]" id="buy"></div>
                </div>
            </div>
            
        </div>
        <div class="absolute w-[200px] h-[491px] bg-[#110303] border-r border-r-[#690e0e]">
            <div class="absolute bottom-[0] left-[0] max-h-[70px] w-[250px]" id="bottomBrush">
                <img src="{{ asset('itemshop/assets/img/brushtopnav.png') }}" class="object-none">
            </div>
        </div>
    <!-- </div> -->
    <div class="ml-[201px] overflow-y-scroll">
        <div class="grid grid-cols-3 gap-4 m-8">
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
            <div class="bg-white w-full h-[160px]"></div>
        </div>
    </div>

    <!-- <div class="absolute top-0 max-h-[490px] h-[490px] w-[800px] flex justify-center items-center flex-wrap gap-[10px] overflow-y-scroll max-w-[1000px] mt-[71px] ml-[201px] pt-[50px]">
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>

        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>
        <div class="w-[300px] h-[300px] bg-white"></div>

    </div> -->

    <div class="absolute top-[68px] left-[200px] w-[800px]">
        <img src="{{ asset('itemshop/assets/img/border.png') }}">
    </div>
</body>
</html>