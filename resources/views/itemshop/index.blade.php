<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script> 
        <meta property="og:image" content="{{ asset('assets/images/koa_banner.png') }}" />
        <!-- <link rel="stylesheet" href="{{ asset('itemshop/assets/css/style.css') }}"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            html {
                background-color: #090101;
            }

            body {
                font-family: 'Poppins', sans-serif;
                width: 1015px !important;
                height: 655px !important;
                background-color: #1b0606;
                color: white !important;
            }
            #search:focus {
                outline: none;
            }
            #buy {
                background-image: url('/itemshop/assets/img/Reg_Button.png');
                background-repeat: no-repeat;
                background-size: cover;
                width: 175px;
                height: 35px;
            }
            #bottomBrush {
                transform: scale(1, -1)
            }

            .sidebar::after {
                content: '';
                position: absolute;
                width: 383px;
                height: 227px;
                background-image: url('/itemshop/assets/img/brush_bottom.png');
                bottom: 0px;
            }

            .sidebar {
                overflow: hidden;
            }

            .navbar::after {
                content: '';
                position: absolute;
                width: 374px;
                height: 70px;
                background-image: url('/itemshop/assets/img/brushtopnav.png');
                top: 0px;
            }

            .navbar {
                overflow: hidden;
            }

            .category {
                background: #110303;
                text-align: center;
                padding: 14px;
                border: 1px solid #1f0909;
                margin: 10px;
                color: #772c2d;
                position: relative;
                transition: all 0.3s;
                cursor: pointer;
                z-index: 1;
            }

            .category i {
                font-size: 30pt;
                margin-bottom: 10px;
            }

            .category::after {
                content: '';
                position: absolute;
                bottom: -4px;
                background-image: url('/itemshop/assets/img/category_element.png');
                width: 144px;
                height: 7px;
                left: 15px;
            }

            .category.active {
                background-image: url('/itemshop/assets/img/active_category.png');
                background-position: 0px 18px;
                background-repeat: no-repeat;
                color: #b75354;
            }

            .category:hover {
                border-color: #401515;
            }

            .loading-shine {
                background: #140304;
                background: linear-gradient(110deg, #140304 15%, #fff0 30%, #140304 40%);
                background-size: auto;
                background-size: auto;
                background-size: 200% 100%;
                border-radius: 10px;
                animation: 1.5s shine linear infinite;
            }

            @keyframes shine {
                to {
                    background-position-x: -200%;
                }
            }

            .btn {
                background-color: #7b2e2e61;
                /* box-shadow: 0px 0px 9px #b7535433; */
                border: 1px solid #7b2e2e;
                color: #f29395;
            }

        </style>
        <title>Kingdom of Ash - ItemShop</title>
        <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
        <meta name="copyright" content="(c) Kingdom of Ash">
        <meta name="keywords" content="Metin2,Pserver,P Server,metin2 pserver, metin 2 pserver,mt2 p server,metin p server, koa2, koa, kingdom of ash">
        <meta name="description" content="Kingdom of ash - Private Metin2 server with a lot of PVM/PVP content">
    </head>
    <body>
        <div class="h-[70px] w-full bg-[#1b0606]">
            <div class="flex w-full h-full items-center navbar">
                <div class="flex items-center min-w-[40%]">
                    <img src="{{ asset('itemshop/assets/img/koa_logo_transparent.png') }}" class="h-[100px] w-[115px] ml-[45px] z-[1]">
                    <div class="text-white text-[13px] ml-[22px]">
                        <p id="monede" class="flex items-center font-semibold"> <img class="mr-[10px]" src="{{ asset('itemshop/assets/img/md.png') }}"> {{ Auth::user()->coins }}</p>
                        <p id="jd" class="flex items-center font-semibold mt-[5px]"> <img class="mr-[10px]" src="{{ asset('itemshop/assets/img/jd.png') }}"> {{ Auth::user()->jcoins }}</p>
                    </div>
                </div>
                <div class="flex w-[60%] pr-[50px] h-full items-center justify-between">
                    <div class="relative">
                        <i class="absolute top-[12px] left-[20px] fa-solid fa-magnifying-glass text-[#712828]"></i>
                        <input name="search" id="search" type="text" placeholder="Cauta obiect..." class="placeholder-[#401515] w-[250px] h-[40px] px-[10px] text-[14px] text-white bg-transparent rounded-full border-[1px] border-[#401515] pl-[50px]">
                    </div>
                    <button id="buy"></button>
                </div>
            </div>
        </div>
        <div class="absolute w-[200px] h-[585px] bg-[#110303] border-r border-r-[#401515] sidebar">
            @foreach($categories as $category)
            <div onclick="sortProductByCategoryId({{ $category->id }})" class="category" id="category_{{ $category->id }}">
                <i class="{{ $category->icon }}"></i>
                <h3>{{ $category->name }}</h3>
            </div>
            @endforeach
        </div>
        
        <div class="ml-[201px] overflow-y-scroll h-[585px]">
            <div id="loading" class="grid grid-cols-3 gap-4 m-8">
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
                <div class="w-full h-[160px] loading-shine"></div>
            </div>
            <div id="products" class="grid grid-cols-3 gap-4 m-8" style="display: none"></div>
        </div>
        <div class="absolute top-[68px] left-[200px] w-[800px]">
            <img src="{{ asset('itemshop/assets/img/border.png') }}">
        </div>
    </body>
    <script>
        let productsDOM = document.getElementById('products')
        let loadingDOM = document.getElementById('loading')
        let searchInput = document.getElementById('search')
        let productDict
        let currentCategoryId

        fetch('{{ route("app.itemshop.products") }}', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => response.text())
        .then((text) => {
            let products = JSON.parse(text)
            productDict = products
            updateItems(products)
            sortProductByCategoryId(1)
        })

        searchInput.addEventListener("input", (e) => {
            const value = e.target.value
            let newDict = []
            productDict.forEach((product) => {
                let productName = product.Name.toLowerCase()
                let productNameUpper = product.Name.toUpperCase()
                if(productName.includes(value) || product.Name.includes(value) || productNameUpper.includes(value))
                    newDict.push(product)
            })
            if(value.length > 0)
                updateItems(newDict)
            else {
                sortProductByCategoryId(currentCategoryId)
            }
        })

        function sortProductByCategoryId(categoryId) {
            currentCategoryId = categoryId
            let categoryBtn = document.getElementById('category_' + categoryId)
            if(productDict != null) {
                let newProducts = productDict.filter((product) => {
                    return product.Category_Id == categoryId
                })
                updateCategoriesStyle()
                categoryBtn.classList.add('active')
                updateItems(newProducts)
            } else {
                console.error('Something went wrong! Please try again')
            }
        }
        function updateItems(products) {
            productsDOM.innerHTML = ''
            products.forEach((product) => {
                const element = document.createElement('div')
                element.className = 'bg-[#140304] w-full h-[160px] rounded-[10px] p-4 flex items-center border border-[#401515]'
                element.innerHTML = `<img src="/itemshop/assets/img/items/00010.png"/>\n
                <div class="text-[11px] ml-4 flex flex-col">
                    <p class="text-[13px] text-[#f4d987]">${product.Name}</p>
                    <ul>
                        <li class="text-[orange]">47% Paguba Medie</li>
                        <li class="text-[orange]">47% Paguba Medie</li>
                        <li class="text-[orange]">47% Paguba Medie</li>
                        <li class="text-[orange]">47% Paguba Medie</li>
                    </ul>
                    <div class="flex mt-[8px]">
                        <button class="py-[6px] px-4 rounded-[6px] flex btn"><img class="mr-[6px]" src="{{ asset('itemshop/assets/img/md.png') }}">150</button>
                        <button class="py-[6px] px-4 rounded-[6px] flex btn ml-[10px]"><img class="mr-[6px]" src="{{ asset('itemshop/assets/img/jd.png') }}">150</button>
                    </div>
                </div>`
                loadingDOM.style = "display: none;"
                productsDOM.style = "display: grid;"
                productsDOM.appendChild(element)
            });
        }
        function updateCategoriesStyle() {
            for(let i = 1; i < 5; i++) {
                let category = document.getElementById('category_' + i)
                if(category != null) {
                    category.className = "category"
                }
            }
        }
    </script>
</html>