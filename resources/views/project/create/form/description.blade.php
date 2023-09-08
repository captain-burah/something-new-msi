

<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="basicpill-meta_title-input">Description (EN)</label>
            <div class="w-100 ">
                <div class="my-4">
                    @error('description_en')
                        <div class="text-danger text-xs" >{{ $message }}</div>
                    @enderror
                    <textarea name="description_en" id="description_en" class="w-100">{{ old('description_en') }}</textarea>
                </div>
            </div>
        </div>
    </div>

</div>
