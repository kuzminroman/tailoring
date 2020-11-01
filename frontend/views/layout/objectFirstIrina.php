<?php
/* @var $this yii\web\View */
$this->title = 'Ателье Ирина';
?>

<style>
    ul{
        list-style: none outside none;
        padding-left: 0;
        margin: 0;
    }
    .demo .item{
        margin-bottom: 60px;
    }
    .content-slider li{
        background-color: #ed3020;
        text-align: center;
        color: #FFF;
    }
    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }
    .demo{
        width: 800px;
    }
    img {
        width: 467px;
    }
</style>



<div class="demo">
    <div class="item">
        <div class="clearfix" style="max-width:474px;">
            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>
                <li data-thumb="/images/preview/2_1.jpg">
                    <img src="/images/preview/2_1.jpg" />
                </li>

            </ul>
        </div>
    </div>

</div>
<button class="town">Click Me</button>
