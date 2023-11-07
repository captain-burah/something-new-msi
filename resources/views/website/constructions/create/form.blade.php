<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Add Construction Update </h3>
        <p class="mb-0 text-justify text-muted">
            When you embark on a new real estate project, you're not just building structures; you're creating opportunities, shaping communities, and crafting dreams into reality.
        </p>


    <form class="contact-form" method="post" action="{{ route('website-constructions.store') }}" enctype="multipart/form-data" id="dropzone">
            @csrf
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('website-constructions.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
                <button
                    type="submit"
                    class="btn btn-sm btn-dark my-auto">
                    Submit
                </button>
            </div>
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link active" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false">Details</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="location-tab" data-toggle="tab" data-target="#seo" type="button" role="tab" aria-controls="contact" aria-selected="false">SEO</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="location-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="contact" aria-selected="false">Media</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active p-4" id="details" role="tabpanel" aria-labelledby="details-tab">
                    @include('website.constructions.create.form.details')
                </div>

                <div class="tab-pane fade p-4" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    @include('website.constructions.create.form.seo')
                </div>

                <div class="tab-pane fade p-4" id="image" role="tabpanel" aria-labelledby="image-tab">
                    @include('website.constructions.create.form.image')
                </div>
            </div>
        </form>

    </div>
    <!-- end card body -->
</div>
