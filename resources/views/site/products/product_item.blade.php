<form class="variants product-action" data-id="product-actions-31228544" enctype="multipart/form-data">
    <a class="image_thumb scale_hover" href="{{ route('front.show-product-detail', $product->slug) }}"
        title="{{ $product->name }}">
        <img width="480" height="480" class="lazyload image1"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
            data-src="{{ $product->image ? $product->image->path : '' }}" alt="{{ $product->name }}">
    </a>
    {{-- <div class="vendoritem">
        <img width="250" height="54" class="lazyload"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABJIAAACWBAMAAAB3Hb8pAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAGCElEQVR4nO3dy2/bNgDHcerhx9F0l3RHK03XHONtHXaUF7fbMc6Aoke7LZAe7axId4w7oPu3x5celunEQ2bEC78foJIcWoIK/EBSpCQLAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAkEbSt1l59e7wx+0PUUrfZO/z+5wX/m8WsrHZkoVe8el0u0NM7G5Pi+0nuzlj7KehbGyuJmmmNw63O8SwSlLbbE13c8rYR6mUjc2VJLkP51sdYlYlyVZPBzs8ceyZpEpS4knSUvY//ZrJb7c6RJWkrpQvxldS3uzwzLFX0mGZpGIz/WxNdPdopluo9q3NW3WI7MDs+KnYY0bzForu77oaaW46w76pW3LTfOVbHELIb4q/Ls3mqPoDHrfEtEbNTaurm7TEXn8NN3eUavulposu7A6npoyOUiBuS1KswxDbHtJSDrY4RLf6VmZ6SF3Z/89PGXvptiRNdIs2suGIy2YqM5VNrbmr7dcpx51SF6Fsc6uIRyUdj8dF01Rt2s+mZVrYcCR2tNH8QWeqXTVbtf1aZRvYcYOSQznf6fljn9TiU09SYmqjiQ1Hq0xObDKylMeeQyRlborvT24fiMKjsiFJSxMLV6l0yomPrhkjmq3WNW6/try5zr7TJUUdtrhrngWPyIYkDU1PZ2bHFrvVgJIeI+o0etJuv1h+UV2m/lxnyg5lLhlQCog/SamtVbIiSWV0RiokcWPM2+0XyWKKJC6TNNjRWWP/+JNku0nFxVdaJSlR1dOiUdW4/UZukmVeXuuNSFJA/Eka2b6yLJJUn+adZ435NFe6lPJt+lWqFEVlknoCofAnaWIjVM6D1EueN288cqULeWKWT1SSbIIikhQQf5KyJyt/qZXEUjan01zpxFRVLVWPkaQQeZPUcZfx662bKlq7XcmV/vanWWVyTusWIm+S2i4C6z1uPQ7QnE1bvYdgIk/pcYfIm6SRuzpbHwXQHevmDP9qktSlP6MAIfImaeEGsddHJvW4d/O+t9UkqYqIkckQeZM0c5P4a7MlZr6kOS+7miTVzWa2JES+JKVFtbM2g2ufGhlsPIQwSWIGN0S+JBWXbkWl0i7vKtEt1rtmR2mtdSvqsBl3lQTEl6R2MWK0dqeb7oT/Lfu55xCtoxPzaSGn3OkWIl+Syqv39btvO6rhyxqNlt2vqMj0Td/cfRsgX5LKa67yiYCy56yztWwMcrunm1znSt/BVDwRwPPcAfElqewprz+lNFEhazcS4vazFVGiKyKeUgqQL0mzcrK/+eRkqmucbuPh2nLe7dgsD3hyMki+JFV1UPNp7sQXker+pLfjr2aMgKe5A+RJUm2arfmGiaUJ1ag2KlDtV7xQ4EbwhokQeZJUnxxpvPVm5rrSKxdlq2+YMPUXb70JjydJ9SHtZOVNXLYHbm6c9BzCfPcwN9tD3sSFVWezO98OWHr1rv/+xm6mP0neDggAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO4tcv+A+yFJ+Ddkf9M7WRtJ6qlPkZRS9IWIe8L+VvBZdinEa/lBRAMhst2eKfZbL/1hQ4knSWZ5eCOuXZLS5/lfajG+yKOPojPb/dlif/XEL+L7ZyLOO2qjdXQqooueXiVHE1UaXTwT7bkqqSXp6VRcuiQl53bROo2uRXvxkP8PPDSVpNaH1+fJfCT+EG/GL0X0wazejHUVE6mi7kC8FLUk9U66A5ekOLeLdBDFN1/oVAVNtW5xng66pxfzn8Wxqn2i3KyOxUiVRqpIXKp/+scQ9M8h6CRdt+cuSVGx6EWd6SVJCprqcZuqZnAyHei06GDoVa/oJ/XEl0T/vEZVJ8VXYr1OEi8GJCloPR0FXfFMP06F/o06lQe9qtVJ8YX7oktS60Cs95PE5JwkBU0lQveTxMX86lxc52c6LnpV9ZNE56n7okuS+WCWtWs3weBT4HQi1LWbWOajXHSyE50Hvaqu3URn4L5YT5JtAc9kMZ4kSBLu0p7f/R3gblcPfQJ4HKKThz4DAAAAAACwn/4ByLvPrpIItisAAAAASUVORK5CYII="
            data-src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/thuonghieu_1.jpg?1740037266911"
            alt="Daikin" />
    </div> --}}
    <div class="group_action">
        <input type="hidden" name="variantId" value="{{ $product->variant_id }}" />
        <button class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
            title="Mua ngay" ng-click="addToCart({{ $product->id }})">
            <img width="24" height="24"
                src="/site/images/cart-add.svg" alt="Mua ngay" />
        </button>
        <a title="Xem nhanh" href="javascript:void(0);" ng-click="showQuickView({{ $product->id }})"
            class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
            <img width="24" height="24"
                src="/site/images/view.svg" alt="Xem nhanh" />
        </a>
    </div>
    @if ($product->base_price > 0 && $product->price > 0)
        <div class="item-discount"
            style="">
            {{ round((($product->base_price - $product->price) / $product->base_price) * 100) }}%
        </div>
    @endif

    {{-- <p class="result-label temp1">
        <img width="20" height="20" alt="Giảm sốc"
            src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/icon_gs.png?1740037266911"><span>Giảm
            sốc</span>
    </p> --}}
</form>
<div class="product-info">
    <h3 class="product-name"><a href="{{ route('front.show-product-detail', $product->slug) }}"
            title="{{ $product->name }}">{{ $product->name }}</a></h3>
    <div class="price-box">
        @if ($product->base_price > 0 && $product->price > 0)
            <span class="price">{{ formatCurrency($product->price) }}₫</span>
            <span class="compare-price">{{ formatCurrency($product->base_price) }}₫</span>
            {{-- <span
                class="smart">({{ round((($product->base_price - $product->price) / $product->base_price) * 100) }}%)</span> --}}
        @elseif ($product->base_price > 0 && $product->price == 0)
            <span class="price">{{ formatCurrency($product->base_price) }}₫</span>
        @else
            <span class="price">{{ formatCurrency($product->price) }}₫</span>
        @endif
    </div>
    {{-- <div class="productcount">
        <div class="countitem visible">
            <span class="a-center">Đã bán {{ rand(100, 1000) }} sp</span>
            <div class="countdown" style="width: 66% ;"><span></span></div>
        </div>
        <div class="sale-bar"></div>
    </div> --}}
</div>
