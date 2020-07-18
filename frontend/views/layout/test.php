<?php
use yii\helpers\Html;?>
<style>
    @import url("../../web/source/dist/test1.css");
    @import url("../../web/source/dist/test2.css");
    @import url("../../web/source/dist/test3.css");
</style>
<section class="hero">
<!--    <header>
        <div class="wrapper">
            <a href="#"><img src="/images/other/logo.png" class="logo" alt="" titl=""/></a>
            <a href="#" class="hamburger"></a>
            <nav>
                <ul>
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Sell</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <a href="#" class="login_btn">Login</a>
            </nav>
        </div>
    </header>  end header section  -->

    <section class="caption">
        <h2 class="caption">Find Dream Home</h2>
        <h3 class="properties">Appartements - Houses - Mansions</h3>
    </section>
</section><!--  end hero section  -->

<section class="search">
    <div class="wrapper">
        <form action="#" method="post">
            <input type="text" id="search" name="search" placeholder="What are you looking for?"  autocomplete="off"/>
            <input type="submit" id="submit_search" name="submit_search"/>
        </form>
        <a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
    </div>

    <div class="advanced_search">
        <div class="wrapper">
            <span class="arrow"></span>
            <form action="#" method="post">
                <div class="search_fields">
                    <input type="text" class="float" id="check_in_date" name="check_in_date" placeholder="Check In Date"  autocomplete="off">

                    <hr class="field_sep float"/>

                    <input type="text" class="float" id="check_out_date" name="check_out_date" placeholder="Check Out Date"  autocomplete="off">
                </div>
                <div class="search_fields">
                    <input type="text" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

                    <hr class="field_sep float"/>

                    <input type="text" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
                </div>
                <input type="text" id="keywords" name="keywords" placeholder="Keywords"  autocomplete="off">
                <input type="submit" id="submit_search" name="submit_search"/>
            </form>
        </div>
    </div><!--  end advanced search section  -->
</section><!--  end search section  -->

<section class="listings">
    <div class="wrapper">
        <ul class="properties_list">
            <li>
                <a href="#">
                    <img src="/images/preview/property_1.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$2500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_2.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$1000</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_3.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_1.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$2500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_2.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$1000</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_3.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_1.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$2500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_1.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$1000</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
            <li>
                <a href="#">
                    <img src="/images/preview/property_1.jpg" alt="" title="" class="property_img"/>
                </a>
                <span class="price">$500</span>
                <div class="property_details">
                    <h1>
                        <a href="#">Fuisque dictum tortor at purus libero</a>
                    </h1>
                    <h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
                </div>
            </li>
        </ul>
        <div class="more_listing">
            <a href="#" class="more_listing_btn">View More Listings</a>
        </div>
    </div>
</section>	<!--  end listing section  -->