<div class="card">
    <div class="card-body">
        <h3 class="mb-1">Unit Launch</h3>
        <p class="mb-0 text-justify text-muted">
            When you embark on a new real estate project, you're not just building structures; you're creating opportunities, shaping communities and crafting dreams into reality.
        </p>


        <form class="contact-form" id="getInTouch" method="post" action="{{ route('units.update', ['unit' => $unit->id]) }}">
            @csrf
            @method('PATCH')
            <div class="flex-none w-100 mt-3 ">
                <a href="{{ route('units.index') }}" class="btn btn-sm btn-outline-dark mt-3 my-auto">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>
                <button
                    type="submit"
                    class="btn btn-sm btn-dark my-auto">
                    Submit to Draft
                </button>
            </div>
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#general" type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false">Details</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="description-tab" data-toggle="tab" data-target="#description" type="button" role="tab" aria-controls="contact" aria-selected="false">Description</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button style="width: auto" class="nav-link" id="location-tab" data-toggle="tab" data-target="#seo" type="button" role="tab" aria-controls="contact" aria-selected="false">SEO</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4" id="general" role="tabpanel" aria-labelledby="home-tab">
                    @include('unit.update.form.general')
                </div>

                <div class="tab-pane fade p-4" id="details" role="tabpanel" aria-labelledby="details-tab">
                    @include('unit.update.form.details')
                </div>

                <div class="tab-pane fade p-4" id="description" role="tabpanel" aria-labelledby="description-tab">
                    @include('unit.update.form.description')
                </div>

                <div class="tab-pane fade p-4" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    @include('unit.update.form.seo')
                </div>
            </div>
        </form>

    </div>
    <!-- end card body -->
</div>
