<x-front.master-layout>
<div class=" tab-box-content tab-box-content--active bg-blue border-img-top border-img-top--blue border-img-bottom border-img-bottom--blue js-tabContent " data-content="tab-2">
    <section class="border-img-top border-img-top--orange border-img-bottom border-img-bottom--orange border-img-top--hide-on-mobile ">
        <div class="toggle-wrapper toggle-wrapper__tour-gallery">
            <label class="toggle" for="gallery-toggle">
                <span>
                <h2 class="headline-2"> Gallery </h2>
                </span>
            </label>
        </div>
        <div class="tour-gallery tour-gallery--orange pt-0em" data-gallery-active-category="activities">
            <div class="tour-gallery__inner" data-gallery-content-category="activities">
                <div class="tour-gallery__images js-gallery-images" data-gallery-day="1" data-gallery-category="activities">
                <figure class="tour-gallery__preview-wrapper">
                    <a href="" class="js-popup" title="">
                    <img class="tour-gallery__preview-ratio js-gallery-preview lazy loaded" data-src="" alt="" src="{{ asset('admin/uploads/gallry_images/'.$singleImage->gallry_images) }}" data-was-processed="true"> 
                    </a>
                    <div>
                        <figcaption class=" tour-gallery__preview-caption  tour-gallery__preview-caption--empty  js-gallery-description ">
                        </figcaption>
                    </div>
                </figure>
                <ul class="tour-gallery__image-list" data-id="galleryList">
                    @foreach($gallary as $value)
                    <li class="tour-gallery__image-list-item"> 
                        <button type="button" class="js-thumb-button tour-gallery__image-list-button {{ $loop->first ? 'active' : '' }}" onclick="App.updatePreview(this, 'activities', 1);" data-description="" data-popup-img-url="{{ asset('admin/uploads/gallry_images/'.$value->gallry_images) }}">
                        <img class="tour-gallery__image-list-thumb rotate-left lazy loaded" data-src="{{ asset('admin/uploads/gallry_images/'.$value->gallry_images) }}" alt="" src="{{ asset('admin/uploads/gallry_images/'.$value->gallry_images) }}" data-was-processed="true"> 
                        </button> 
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </section>
</div>
 </x-front.master-layout>
 <script src="{{asset ('assets/front/scripts/vendor7369.js?v=m0Wgcip88r')}}"></script>