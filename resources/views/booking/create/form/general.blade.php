
<div class="row">

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label text-muted">Project Status</label>
            <select
                class="form-control select2-search-disable select2-hidden-accessible  border border-solid border-muted text-muted
                @error('status') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="status"
                disabled
            >
                <option value="">Choose ...</option>
                <option value="1">Active</option>
                <option value="2" selected>Drafts</option>
            </select>
            @error('status')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror


        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Off Plan / Ready</label>


            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('property_release_id') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="property_release_id"
            >
                <option selected value="">Choose ...</option>
                @if(isset($project_status))
                    @foreach($project_status as $data)
                        <option value="{{$data->id}}">{{ $data->type_name_en }}</option>
                    @endforeach
                @endif
            </select>
            @error('property_release_id')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror


        </div>
    </div>


</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Community</label>

            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('community') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="community"
            >
                <option selected value="">Choose ...</option>
                @if(isset($communities))
                    @foreach($communities as $data)
                        <option value="{{$data->id}}">{{ $data->type_name_en }}</option>
                    @endforeach
                @endif
            </select>
            @error('community')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Category</label>

            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('category') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="category"
            >
                <option selected value="">Choose ...</option>
                @if(isset($project_type))
                    @foreach($project_type as $data)
                        <option value="{{$data->id}}">{{ $data->type_name_en }}</option>
                    @endforeach
                @endif
            </select>
            @error('category')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>




<div class="row mt-5">

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Emirate</label>


            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('emirates') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="emirates"
            >
                <option selected value="">Choose ...</option>
                @if(isset($cities))
                    @foreach($cities as $data)
                        <option value="{{$data->id}}">{{ $data->type_name_en }}</option>
                    @endforeach
                @endif
            </select>
            @error('emirates')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Surrounding Location</label>
            <select
                class="form-control select2-search-disable select2-hidden-accessible
                @error('location') border border-solid border-danger  @enderror"
                data-select2-id="basicpill-status-input"
                tabindex="-1"
                aria-hidden="true"
                name="location"
            >
                <option selected value="">Choose ...</option>
                @if(isset($location))
                    @foreach($location as $data)
                        <option value="{{$data->id}}">{{ $data->type_name_en }}</option>
                    @endforeach
                @endif
            </select>
            @error('location')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

</div>

{{-- <hr class="my-5 "> --}}

<div class="row mt-5">
    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Longitude</label>
            <input
                type="text"
                name="longitude"
                class="form-control
                @error('longitude') border border-solid border-danger  @enderror"
                id="longitude"
                placeholder="55.**"
                value="{{ old('longitude') }}"
            >
            @error('longitude')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="col-md-6">
        <div data-select2-id="15">
            <label class="form-label">Latitude</label>
            <input
                type="text"
                name="latitude"
                class="form-control
                @error('latitude') border border-solid border-danger  @enderror"
                id="latitude"
                placeholder="24.**"
                value="{{ old('latitude') }}"
            >
            @error('latitude')
                <div class="text-danger text-xs">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>
